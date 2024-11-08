<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <form class="login-form" action="{{ route('login') }}" method="POST">
            @csrf
            <h2>Sign In</h2>
            <div class="form-group">
                <div class="input-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                </div>
                @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <div class="input-icon">
                    <i class="fas fa-eye" id="togglePassword" onclick="togglePassword()"></i>
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                
                    @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                   @enderror 
                </div>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
            <button type="submit">LOGIN</button>
            <div class="form-links">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                @endif
                <span>  </span>
                <a href="{{ route('register') }}">Create a New Account</a> 
            </div>
            <br>
            <div class="terms-container">
    <p>By logging in, you agree to our <a href="#" class="terms-link" onclick="showModal(event, 'terms')">Terms </a>and you have read our <a href="#" class="terms-link" onclick="showModal(event, 'privacy')">Privacy Policy</a>.</p>
</div>          
        </form>
    </div>

    <div id="termsModal" class="modal" style="display: none;">
        <div class="modal-content">
            <button class="modal-back">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <div class="modal-header">
    <h2 class="modal-title">Terms of Service</h2>
    <p class="last-updated">Last updated: 12th November 2024</p>
</div>

<div class="modal-body">
    <div class="section">
        <h2 class="section-title">Summary</h2>
        <p class="section-content">
            By logging in to the San Manuel Children's Malnutrition Monitoring System, you agree to our Terms of Service (TOS) and accept responsibility for keeping your account secure. You acknowledge that any updates to the TOS will apply to your continued use of the system. We are not liable for any indirect damages or consequences resulting from your use of the platform.
        </p>
    </div>

    <div class="section">
        <h2 class="section-title">Acceptance of Terms</h2>
        <p class="section-content">
            By logging in, you agree to comply with these Terms of Service and any related policies. Your use of the platform confirms your acceptance of these terms and obligations.
        </p>
    </div>

    <div class="section">
        <h2 class="section-title">Login Requirements</h2>
        <p class="section-content">
            You must log in using accurate credentials and are responsible for keeping them confidential. Immediately notify us of any unauthorized activity or suspicious behavior on your account.
        </p>
    </div>

    <div class="section">
        <h2 class="section-title">Account Security</h2>
        <p class="section-content">
            You are responsible for securing your account. This includes using strong passwords, logging out after use, and never sharing your credentials. We are not liable for any loss or damage resulting from a breach of your account security.
        </p>
    </div>

    <div class="section">
        <h2 class="section-title">User Responsibilities</h2>
        <p class="section-content">
              You agree to use the platform in accordance with applicable laws and not engage in any activity that could harm the system or violate its security measures.
        </p>
    </div>

    <div class="section">
        <h2 class="section-title">Modifications to Terms</h2>
        <p class="section-content">
            We may update these Terms at any time. Continued use of the platform means you accept the revised terms. Please review these terms periodically.
        </p>
    </div>

    <div class="section">
        <h2 class="section-title">Limitation of Liability</h2>
        <p class="section-content">
            We are not liable for any indirect, incidental, or consequential damages that may arise from your use of the platform or service interruptions.
        </p>
    </div>

    <div class="section">
        <h2 class="section-title">Contact Information</h2>
        <p class="section-content">
            If you have any questions or concerns about these Terms of Service, feel free to contact us:
        </p>
        <p><span style="color: #666;">Email:</span> <a href="mailto:cmmshc@doh.gov.ph" style="color: #007bff; text-decoration: none;">cmmshc@doh.gov.ph</a></p>
        <p><span style="color: #666;">Contact:</span> <a href="tel:+639516983253" style="color: #007bff; text-decoration: none;">+63 951 698 3253</a></p>
    </div>
</div>

<div class="modal-footer">
    <button class="btn btn-accept" id="acceptTerms">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        Accept
    </button>
</div>
        </div>
    </div>
<div id="privacyModal" class="modal" style="display: none;">
    <div class="modal-content">
        <button class="modal-back">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        
        <div class="modal-header">
            <h2 class="modal-title">Privacy Policy</h2>
            <p class="last-updated">Last updated: 12th November 2024</p>
        </div>

        <div class="modal-body">
        <div class="section">
    <h3 class="section-title">Summary</h3>
    <p class="section-content">
        By logging in to the San Manuel Children's Malnutrition Monitoring System, you agree to our Privacy Policy and consent to the collection, use, and protection of your personal data as outlined in this document. We are committed to safeguarding your privacy and ensuring the security of your information. By continuing to use the platform, you acknowledge that any updates to this Privacy Policy will apply to your continued use of the system.
    </p>
</div>

<div class="section">
    <h3 class="section-title">Information We Collect</h3>
    <p class="section-content">
        When you log in, we collect personal information such as your login credentials, contact details, and any data necessary for providing you with access to the system and its features. We may also collect usage data to improve the platform and enhance user experience.
    </p>
</div>

<div class="section">
    <h3 class="section-title">Use of Personal Data</h3>
    <p class="section-content">
        Your personal data is used to provide you with access to the system, manage your account, send notifications about system updates, and improve the services we offer. We do not share or sell your personal information to third parties without your explicit consent, except where required by law or in response to legal processes.
    </p>
</div>

<div class="section">
    <h3 class="section-title">Login and Account Security</h3>
    <p class="section-content">
        You are responsible for maintaining the confidentiality of your login credentials. Please ensure that you use a strong password and log out after using the platform. If you notice any unauthorized access or suspicious activity on your account, you must notify us immediately. We are not liable for any loss or damage caused by unauthorized access to your account.
    </p>
</div>

<div class="section">
    <h3 class="section-title">Data Protection</h3>
    <p class="section-content">
        We implement reasonable security measures to protect your personal data from unauthorized access, use, or disclosure. However, please note that no system is completely secure. By using the platform, you acknowledge that data transmission over the internet carries some inherent risks.
    </p>
</div>

<div class="section">
    <h3 class="section-title">Retention of Personal Data</h3>
    <p class="section-content">
        We retain your personal data only for as long as necessary to fulfill the purposes outlined in this Privacy Policy, unless a longer retention period is required or permitted by law. If you wish to request the deletion of your data, please contact us as outlined below.
    </p>
</div>

<div class="section">
    <h3 class="section-title">Modifications to Privacy Policy</h3>
    <p class="section-content">
        We may update this Privacy Policy from time to time. Any changes will be posted on this page with an updated "Last Revised" date. Continued use of the platform after such updates signifies your acceptance of the revised Privacy Policy. We encourage you to review this policy periodically to stay informed about how we protect your data.
    </p>
</div>

<div class="section">
    <h3 class="section-title">Your Rights</h3>
    <p class="section-content">
        You have the right to access, correct, or delete your personal data at any time. If you wish to exercise any of these rights, please contact us using the details provided below. We will respond to your request in accordance with applicable data protection laws.
    </p>
</div>

<div class="section">
    <h3 class="section-title">Contact Information</h3>
    <p class="section-content">
        If you have any questions or concerns about this Privacy Policy or our data practices, please contact us:
    </p>
    <p><span style="color: #666;">Email:</span> <a href="mailto:cmmshc@doh.gov.ph" style="color: #007bff; text-decoration: none;">cmmshc@doh.gov.ph</a></p>
    <p><span style="color: #666;">Contact:</span> <a href="tel:+639516983253" style="color: #007bff; text-decoration: none;">+63 951 698 3253</a></p>
</div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-accept" id="acceptPrivacy">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Accept
            </button>
        </div>
    </div>
</div>
    <div class="onboarding-container" id="onboarding">
        <div class="slide-container">
            <div class="slide active">
                <div class="slide-image">
                    <i class="fas fa-rocket"></i>
                </div>
                <div class="slide-content">
                    <h2>Welcome to Our Platform</h2>
                    <p>Discover a new way to manage your tasks and boost your productivity</p>
                </div>
            </div>

            <div class="slide">
                <div class="slide-image">
                    <i class="fas fa-tasks"></i>
                </div>
                <div class="slide-content">
                    <h2>Stay Organized</h2>
                    <p>Keep track children's nutrition and health progress, in one place.</p>
                </div>
            </div>

            <div class="slide">
                <div class="slide-image">
                    <i class="fas fa-users"></i>
                </div>
                <div class="slide-content">
                    <h2>Collaborate with Team</h2>
                    <p>Partner with health workers to boost children's nutrition.</p>
                </div>
            </div>
        </div>

        <div class="navigation-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>

        <div class="onboardbuttons">
            <button class="btn btn-skip" onclick="skipOnboarding()">Skip</button>
            <button class="btn btn-next" onclick="nextSlide()">Next</button>
        </div>
    </div>

    <script>
const hasSeenOnboarding = localStorage.getItem('hasSeenOnboarding');
        if (hasSeenOnboarding) {
            document.getElementById('onboarding').classList.add('onboarding-hidden');
            document.querySelector('.container').style.display = 'block';
        }

        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        const nextBtn = document.querySelector('.btn-next');

        let touchStartX = 0;
        let touchEndX = 0;

        document.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        });

        document.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;

            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {

                    nextSlide();
                } else {
     
                    previousSlide();
                }
            }
        }

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));
            
            slides[index].classList.add('active');
            dots[index].classList.add('active');

            if (index === slides.length - 1) {
                nextBtn.textContent = 'Get Started';
            } else {
                nextBtn.textContent = 'Next';
            }
        }

        function nextSlide() {
            currentSlide++;
            if (currentSlide >= slides.length) {
                completeOnboarding();
                return;
            }
            showSlide(currentSlide);
        }

        function previousSlide() {
            if (currentSlide > 0) {
                currentSlide--;
                showSlide(currentSlide);
            }
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });

        function skipOnboarding() {
            completeOnboarding();
        }

        function completeOnboarding() {
            localStorage.setItem('hasSeenOnboarding', 'true');
            document.getElementById('onboarding').classList.add('onboarding-hidden');
            document.querySelector('.container').style.display = 'block';
        }

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

        const modal = document.getElementById('termsModal');
const privacyModal = document.getElementById('privacyModal');
const modalContent = document.querySelector('.modal-content');
const backBtn = document.querySelectorAll('.modal-back');
const acceptTermsBtn = document.getElementById('acceptTerms');
const acceptPrivacyBtn = document.getElementById('acceptPrivacy');

function showModal(event, type) {
    if (event) event.preventDefault();

    modal.style.display = 'none';
    privacyModal.style.display = 'none';

    if (type === 'terms') {
        modal.style.display = 'flex';
    } else if (type === 'privacy') {
        privacyModal.style.display = 'flex';
    }

    document.body.style.overflow = 'hidden';
}

function closeModal() {
    modal.style.display = 'none';
    privacyModal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

backBtn.forEach(button => {
    button.addEventListener('click', closeModal);
});

acceptTermsBtn.addEventListener('click', () => {
    console.log('Terms accepted');
    closeModal();
});

acceptPrivacyBtn.addEventListener('click', () => {
    console.log('Privacy Policy accepted');
    closeModal();
});

window.addEventListener('click', (e) => {
    if (e.target === modal || e.target === privacyModal) {
        closeModal();
    }
});

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeModal();
    }
});

let startY = 0;
let currentY = 0;
let isDragging = false;
const closeThreshold = 100;

function addDragEventListeners(modalToDrag) {
    const modalContent = modalToDrag.querySelector('.modal-content');
    
    modalContent.addEventListener('touchstart', (e) => {
        if (window.innerWidth <= 767) {
            startY = e.touches[0].clientY;
            isDragging = true;
        }
    });

    modalContent.addEventListener('touchmove', (e) => {
        if (window.innerWidth <= 767 && isDragging) {
            currentY = e.touches[0].clientY;
            let deltaY = currentY - startY;

            e.preventDefault();

            if (deltaY > 0) {
                modalContent.style.transform = `translateY(${deltaY}px)`;
            }
        }
    });

    modalContent.addEventListener('touchend', () => {
        if (isDragging) {
            const deltaY = currentY - startY;
            if (deltaY > closeThreshold) {
                closeModal();
            } else {
                modalContent.style.transform = 'translateY(0)';
            }

            isDragging = false;
        }
    });
}

addDragEventListeners(modal);
addDragEventListeners(privacyModal);

    </script>
</body>
</html>
