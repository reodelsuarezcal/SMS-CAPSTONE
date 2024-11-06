<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="{{ asset('css/email.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Forgot Password</title>
</head>
<body>
    <div class="container">
        <h2>Forgot Your Password?</h2>
        <p class="description">
        In order to reset your password, please enter the email associated with your Stripe account.
        </p>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="Email address"
                    required 
                    autocomplete="email" 
                    autofocus
                >
                <div class="error-message" id="emailError">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <button type="submit">Send Password Reset Link</button>
        </form>


        </p>

        <div class="footer">
        Already have an account? <a href="{{ route('login') }}">Log in</a>
        </div>
    </div>

    <script>
        // Show error message if it exists
        const errorMessage = document.getElementById('emailError');
        if (errorMessage.textContent.trim()) {
            errorMessage.style.display = 'block';
        }
    </script>
</body>
</html>