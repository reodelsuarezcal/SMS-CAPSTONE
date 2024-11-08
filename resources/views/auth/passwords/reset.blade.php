
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Create new password</h2>
        <p class="description">
            Your new password must be different from previous ones to ensure better security.
        </p>

        <!-- Laravel password reset form -->
        <form method="POST" action="{{ route('password.update') }}" id="resetForm">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email Input -->
            <div class="form-group">
                <div class="form-floating">
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder=" " 
                        value="{{ old('email', $email) }}" 
                        required 
                        autocomplete="email"
                        class="@error('email') is-invalid @enderror"
                    >
                    <label for="email">Email address</label>
                    <div class="icons-container">
                        <i class="fas fa-envelope icon"></i>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- New Password Input -->
            <div class="form-group">
                <div class="form-floating">
                    <input 
                        type="password" 
                        id="new-password" 
                        name="password" 
                        placeholder=" "
                        required
                        minlength="8"
                        class="@error('password') is-invalid @enderror"
                    >
                    <label for="new-password">New password</label>
                    <div class="icons-container">
                        <i class="fas fa-eye icon toggle-password"></i>
                        <span class="error-message">Password must be at least 8 characters</span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Confirm Password Input -->
            <div class="form-group">
                <div class="form-floating">
                    <input 
                        type="password" 
                        id="confirm-password" 
                        name="password_confirmation" 
                        placeholder=" "
                        required
                        minlength="8"
                    >
                    <label for="confirm-password">Confirm password</label>
                    <div class="icons-container">
                        <i class="fas fa-eye icon toggle-password"></i>
                    </div>
                </div>
                <div class="password-strength">
                    <div class="password-strength-bar"></div>
                </div>
            </div>

            <button type="submit">Reset Password</button>
            <div class="error-message-container">
                <span id="password-mismatch-error" class="error-message">Passwords do not match!</span>
            </div>
        </form>

        <div class="footer">
            Remember your password? <a href="{{ route('login') }}">Sign in</a>
        </div>
    </div>

    <script>
        // Password visibility toggle
        document.querySelectorAll('.toggle-password').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const input = this.closest('.form-floating').querySelector('input');
                const isPassword = input.type === 'password';
                
                input.type = isPassword ? 'text' : 'password';
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });

        // Button ripple effect
        document.querySelector('button').addEventListener('click', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const ripple = document.createElement('span');
            ripple.className = 'ripple';
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;

            this.appendChild(ripple);

            setTimeout(() => ripple.remove(), 600);
        });


        // Password strength checker
        document.getElementById('new-password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strengthBar = document.querySelector('.password-strength');
            
            strengthBar.classList.remove('strength-weak', 'strength-medium', 'strength-strong');

            if (password.length >= 8) {
                const hasUpperCase = /[A-Z]/.test(password);
                const hasLowerCase = /[a-z]/.test(password);
                const hasNumbers = /\d/.test(password);
                const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password);
                
                const strength = [hasUpperCase, hasLowerCase, hasNumbers, hasSpecialChar]
                    .filter(Boolean).length;

                if (strength <= 2) strengthBar.classList.add('strength-weak');
                else if (strength === 3) strengthBar.classList.add('strength-medium');
                else strengthBar.classList.add('strength-strong');
            }
        });

// Form validation and submission
document.getElementById('resetForm').addEventListener('submit', function(e) {
    e.preventDefault();  // Prevent default form submission

    const newPassword = document.getElementById('new-password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    const mismatchError = document.getElementById('password-mismatch-error');

    // Check if new password matches confirm password
    if (newPassword !== confirmPassword) {
        mismatchError.classList.add('show');  // Show mismatch error

        // Trigger fade-out effect after 1 second
        setTimeout(() => {
            mismatchError.classList.remove('show');  // Fade-out the error message
        }, 1000);

        return; // Stop form submission if passwords do not match
    } else {
        mismatchError.classList.remove('show');  // Hide mismatch error immediately
    }
    
    // Add loading state to button
    const button = this.querySelector('button');
    const originalText = button.textContent;
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
    button.disabled = true;

    // Proceed with the form submission after validation
    this.submit();  // Submit the form to the server

});

    </script>
</body>
</html>
