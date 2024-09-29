<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <form class="login-form" action="{{ route('login') }}" method="POST">
            @csrf
            <h2>Login In Account</h2>
            <div class="form-group">
                <div class="input-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon">
                    <i class="fas fa-eye" id="togglePassword" onclick="togglePassword()"></i>
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror 
                </div>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
            <button type="submit">Login</button>
            <div class="form-links">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forgot Password?</a>
            @endif
            <span>  </span>
            </div>
            <br>
            <div class="terms-container ">
              <span>By selecting "Create Account", you agree to our <a href="">Terms</a> and you have read and acknowledge our <a href="">Global Privacy Statement</a>.</span>
          </div>          
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePassword');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>


