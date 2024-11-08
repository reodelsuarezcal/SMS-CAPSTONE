<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Register Page</title>
</head>
<body>
    <div class="container">
        <form class="register-form" action="{{ route('register') }}" method="POST">
            @csrf
            <h2>Sign Up</h2>
            <div class="form-group">
                <div class="input-icon">
                    <i class="fas fa-user"></i>
                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                </div>
                @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="input-icon">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                </div>
                @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

        


            <div class="form-group">
    <div class="input-icon">
        <i class="fas fa-eye" id="togglePassword" onclick="togglePassword()"></i>
        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password" minlength="8">
        <span class="error-message" id="password-error" style="display: none;">Password must be at least 8 characters</span>
        @error('password')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group">
    <div class="input-icon">
        <i class="fas fa-eye" id="togglePasswordConfirm" onclick="togglePasswordConfirm()"></i>
        <input id="password-confirm" type="password" class="@error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" minlength="8">
        <span class="error-message" id="confirm-password-error" style="display: none;">Password must be at least 8 characters</span>
        @error('password_confirmation')
        <span class="invalid-feedback">{{ $message }}</span>
            </span>
        @enderror
    </div>
</div>


            <div class="terms-container">
    <input type="checkbox" id="terms" required>
    <label for="terms">I agree to the <a href="#" class="terms-link">Terms & Conditions</a></label>
</div>     

            <button type="submit">REGISTER</button>

            <div class="form-links">
                <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
            </div>
            <br>    
        </form>
    </div>

    <div id="termsModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="modal-back">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <h2 class="modal-title">Terms of Service</h2>
                <p class="last-updated">Last updated: 12th November 2024</p>
            </div>

            <div class="modal-body">
                <div class="section">
                    <h2 class="section-title">Summary</h2>
                    <p class="section-content">
                    The Terms of Service (TOS) is a legal agreement that outlines the rules and guidelines for using a service or website. By using the service, users agree to abide by these terms. Below is a general overview of what a typical TOS covers:
                    </p>
                </div>
                <div class="section">
                    <h2 class="section-title">Terms</h2>
                    <p class="section-content">
                    By accessing or using the service, users agree to comply with the TOS. If users do not agree with the terms, they must refrain from using the service.
                    </p>
                    <h2 class="section-title">Responsibilities</h2>
                    <p class="section-content">
                    Account Creation: Users must provide accurate, current, and complete information when creating an account. They are also responsible for maintaining the security of their account credentials.
                    </p>
                    <p class="section-content">
                    Appropriate Use: Users must use the service only for legal and ethical purposes, and not engage in activities like spamming, hacking, or distributing malware.
                    </p>
                    <p class="section-content">
                    Content Responsibility: Users are responsible for the content they upload or edit through the service, and they must respect intellectual property rights.
                    </p>
                    <h2 class="section-title">Limitations of Liability</h2>
                    <p class="section-content">
                    We are not responsible for any loss of data, disruptions to service, or any damage arising from the use of our service, unless explicitly stated.
                    </p>
                    <p class="section-content">
                    We do not guarantee the availability, accuracy, or reliability of the service at all times. While we strive to maintain a reliable service, there may be interruptions due to maintenance or unforeseen issues.
                    </p>
                    <p class="section-content">
                    Under no circumstances will we be liable for indirect, incidental, special, or consequential damages (such as loss of profits, reputation, etc.) that may arise from using or being unable to use the service.
                    </p>
                    <h2 class="section-title">Intellectual Property</h2>
                    <p class="section-content">
                    The service provider retains ownership of all intellectual property associated with the service, including trademarks, copyrights, and patents. Users may not use these without explicit permission.
                    </p>
                    <p class="section-content">
                    We do not guarantee the availability, accuracy, or reliability of the service at all times. While we strive to maintain a reliable service, there may be interruptions due to maintenance or unforeseen issues.
                    </p>
                    <p class="section-content">
                    Under no circumstances will we be liable for indirect, incidental, special, or consequential damages (such as loss of profits, reputation, etc.) that may arise from using or being unable to use the service.
                    </p>
                    <h2 class="section-title">Privacy and Data Collection</h2>
                    <p class="section-content">
                    Personal Data: The service may collect personal data, such as account information, and usage data, as described in the privacy policy.
                    </p>
                    <p class="section-content">
                    Data Use: The data collected is used to provide and improve the service, and to personalize user experiences. It may also be used for marketing purposes if the user has consented.
                    </p>
                    <p class="section-content">
                    Data Sharing: Personal data may be shared with third-party vendors, partners, or for legal reasons (e.g., if required by law).
                    </p>
                </div>
            </div>


            <div class="modal-footer">
                <button class="btn-modal btn-decline" id="declineTerms">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Decline
                </button>
                <button class="btn-modal btn-accept" id="acceptTerms">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Accept
                </button>
            </div>
        </div>
    </div>

    <script>
const modal = document.getElementById('termsModal');
        const backBtn = document.querySelector('.modal-back');
        const acceptBtn = document.getElementById('acceptTerms');
        const declineBtn = document.getElementById('declineTerms');
        
        function updateTermsCheckbox(accepted) {
            const termsCheckbox = document.querySelector('input[type="checkbox"]');
            if (termsCheckbox) {
                termsCheckbox.checked = accepted;
                termsCheckbox.dispatchEvent(new Event('change'));
            }
        }

        function closeModal() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
            document.body.style.touchAction = 'auto';
        }

        function openModal() {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            document.body.style.touchAction = 'none';
        }

        document.querySelectorAll('.terms-link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                openModal();
            });
        });

        let startY = 0;
        let currentY = 0;
        const modalContent = modal.querySelector('.modal-content');

        modalContent.addEventListener('touchstart', (e) => {
            startY = e.touches[0].clientY;
        });

        modalContent.addEventListener('touchmove', (e) => {
            if (window.innerWidth <= 767) {
                currentY = e.touches[0].clientY;
                let deltaY = currentY - startY;
                
                if (deltaY > 0) {
                    modalContent.style.transform = `translateY(${deltaY}px)`;
                }
            }
        });

        modalContent.addEventListener('touchend', (e) => {
            if (window.innerWidth <= 767) {
                const deltaY = currentY - startY;
                if (deltaY > 100) {
                    closeModal();
                    updateTermsCheckbox(false);
                } else {
                    modalContent.style.transform = '';
                }
            }
        });

        backBtn.addEventListener('click', () => {
            closeModal();
            updateTermsCheckbox(false);
        });

        acceptBtn.addEventListener('click', () => {
            updateTermsCheckbox(true);
            closeModal();
        });

        declineBtn.addEventListener('click', () => {
            updateTermsCheckbox(false);
            closeModal();
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
                updateTermsCheckbox(false);
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeModal();
                updateTermsCheckbox(false);
            }
        });

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

        function togglePasswordConfirm() {
            const passwordConfirmInput = document.getElementById('password-confirm');
            const toggleIcon = document.getElementById('togglePasswordConfirm');
            if (passwordConfirmInput.type === 'password') {
                passwordConfirmInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordConfirmInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
