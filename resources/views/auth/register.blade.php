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
            The Terms of Service (TOS) is a legal agreement that outlines the rules and guidelines for using the service or website. By accessing or using the service, users agree to abide by these terms. Below is a general overview of what a typical TOS covers:
        </p>
    </div>

    <div class="section">
        <h2 class="section-title">Terms</h2>
        <p class="section-content">
            By accessing or using the service, users agree to comply with the TOS. If users do not agree with the terms, they must refrain from using the service. 
            These terms are binding upon any and all users who create accounts, register, or use the service in any capacity.
        </p>
    </div>

    <div class="section">
        <h2 class="section-title">Responsibilities</h2>
        <p class="section-content">
            <strong>Account Creation:</strong> Users must provide accurate, current, and complete information when creating an account. They are responsible for keeping their account credentials secure and private.
        </p>
        <p class="section-content">
            <strong>Appropriate Use:</strong> Users must use the service only for legal, ethical, and intended purposes. Any unlawful activities, including spamming, hacking, or distributing malware, are strictly prohibited.
        </p>
        <p class="section-content">
            <strong>Content Responsibility:</strong> Users are responsible for the content they upload or manage on the platform. This includes ensuring they respect intellectual property rights, not uploading illegal content, and not violating third-party rights.
        </p>
        <p class="section-content">
            <strong>Admin Role:</strong> If you are an admin user, you are responsible for managing user accounts, ensuring proper registration and compliance with platform rules. Admins must verify user information and ensure the security and accuracy of the registration process.
        </p>
    </div>

    <div class="section">
        <h2 class="section-title">Limitations of Liability</h2>
        <p class="section-content">
            We are not responsible for any loss of data, disruptions to service, or any damage arising from the use of our service, unless explicitly stated in these Terms of Service.
        </p>
        <p class="section-content">
            We do not guarantee the availability, accuracy, or reliability of the service at all times. While we strive to maintain a reliable service, interruptions may occur due to maintenance or unforeseen technical issues.
        </p>
        <p class="section-content">
            Under no circumstances will we be liable for indirect, incidental, special, or consequential damages, including loss of profits, reputation, or data, that may arise from using or being unable to use the service.
        </p>
    </div>

    <div class="section">
        <h2 class="section-title">Intellectual Property</h2>
        <p class="section-content">
            The service provider retains ownership of all intellectual property associated with the service, including trademarks, copyrights, patents, and proprietary technologies. Users may not use or replicate these intellectual properties without explicit permission.
        </p>
        <p class="section-content">
            The content, features, and services available through the platform, including designs and code, are protected by copyright and intellectual property laws.
        </p>
    </div>

    <div class="section">
        <h2 class="section-title">Privacy and Data Collection</h2>
        <p class="section-content">
            <strong>Personal Data:</strong> The service collects personal data such as account information and usage data as described in the Privacy Policy. Admin users are also responsible for ensuring that users are aware of how their data is being collected and used.
        </p>
        <p class="section-content">
            <strong>Data Use:</strong> The collected data is used to provide and improve the service and personalize the user experience. It may also be used for marketing purposes, provided that the user has consented to such use.
        </p>
        <p class="section-content">
            <strong>Data Sharing:</strong> Personal data may be shared with third-party vendors, partners, or in compliance with legal obligations (e.g., if required by law or to protect against fraud).
        </p>
        <p class="section-content">
            As an admin, you must respect user privacy and adhere to data protection laws when managing user data. You must not misuse or share sensitive user data without explicit consent.
        </p>
    </div>

    <div class="section">
        <h2 class="section-title">User Termination and Suspension</h2>
        <p class="section-content">
            <strong>Admin Rights:</strong> Admins have the right to suspend or terminate user accounts if there are violations of these Terms of Service, illegal activities, or failure to comply with platform rules.
        </p>
        <p class="section-content">
            <strong>User Termination:</strong> Users may request account deletion at any time. Admins are required to process these requests promptly while ensuring all legal obligations regarding data retention are met.
        </p>
        <p class="section-content">
            <strong>Suspension or Banning:</strong> Users who engage in harmful activities, violate intellectual property rights, or misuse the platform may be suspended or banned by an admin. Admins must follow platform guidelines when implementing these actions.
        </p>
    </div>

    <div class="section">
        <h2 class="section-title">Account Security</h2>
        <p class="section-content">
            <strong>Admin Responsibilities:</strong> Admin users are responsible for maintaining the security of their admin accounts, including safeguarding login credentials and ensuring that unauthorized access does not occur.
        </p>
        <p class="section-content">
            <strong>Two-Factor Authentication:</strong> We recommend using two-factor authentication (2FA) for added security, especially for admins managing user accounts.
        </p>
    </div>

    <div class="section">
        <h2 class="section-title">Modifications to the Terms of Service</h2>
        <p class="section-content">
            We reserve the right to modify, update, or change these Terms of Service at any time. Any changes will be communicated to the admin, and the revised terms will be posted here.
        </p>
        <p class="section-content">
            It is the admin’s responsibility to regularly review these terms. Continuing to use the service after changes have been made constitutes acceptance of those changes.
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
