<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verify OTP | Tawana Exam Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('favicon-32x32.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    
    <style>
        * {
            font-family: "IranSans", sans-serif;
            box-sizing: border-box;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html,
        body {
            overflow-x: hidden;
            width: 100%;
            max-width: 100vw;
            background: linear-gradient(135deg,
                    #0a0a0a 0%,
                    #1a1a1a 50%,
                    #0f0f0f 100%);
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .auth-container {
            overflow-x: hidden !important;
            overflow-y: hidden;
            background-size: cover;
            animation: gradientShift 15s ease infinite;
            height: 100vh;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .auth-card {
            background-color: rgb(38, 38, 38);
            border: 1px solid rgba(0, 255, 94, 0.5);
            width: 22rem;
            min-height: 28rem;
            border-radius: 12px;
            position: relative;
            box-shadow: 0 8px 32px rgba(0, 255, 94, 0.1);
        }

        .auth-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(34, 197, 94, 0.1),
                    transparent);
            transition: left 0.5s;
        }

        .auth-card:hover::before {
            left: 100%;
        }

        .auth-card::after {
            content: "";
            position: absolute;
            top: -20px;
            left: -20px;
            right: -20px;
            bottom: -20px;
            background: radial-gradient(circle at center,
                    rgba(34, 197, 94, 0.3) 0%,
                    transparent 70%);
            z-index: -1;
            filter: blur(20px);
            animation: glowPulse 3s ease-in-out infinite;
        }

        @keyframes glowPulse {

            0%,
            100% {
                opacity: 0.5;
                transform: scale(1);
            }

            50% {
                opacity: 0.8;
                transform: scale(1.05);
            }
        }

        .tab-selector {
            background: linear-gradient(135deg,
                    rgba(30, 41, 59, 0.9) 0%,
                    rgba(15, 23, 42, 0.9) 100%);
            border-bottom: 1px solid rgba(34, 197, 94, 0.2);
            position: relative;
            display: flex;
            width: 100%;
            overflow: hidden;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .tab-item {
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            flex: 1;
            text-align: center;
            padding: 1rem;
            cursor: pointer;
            color: white;
            background-color: rgb(38, 38, 38);
        }

        .tab-item.active {
            background-color: rgba(34, 197, 94, 0.1);
        }

        .tab-item::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, #22c55e, #16a34a);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateX(-50%);
        }

        .tab-item.active::before {
            width: 100%;
        }

        .tab-item:hover {
            background: rgba(34, 197, 94, 0.1);
            transform: translateY(-1px);
        }

        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-field {
            width: 100%;
            padding: 0.7rem 1rem 0.7rem 4rem;
            background: rgba(30, 41, 59, 0.6);
            border: 2px solid rgba(34, 197, 94, 0.2);
            border-radius: 12px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            box-sizing: border-box;
        }

        .input-field:focus {
            outline: none;
            border-color: #22c55e;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1),
                0 8px 25px rgba(34, 197, 94, 0.2);
            transform: translateY(-2px);
        }

        .input-field::placeholder {
            color: #16a34a;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #22c55e;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .input-field:focus+.input-icon {
            color: #16a34a;
            transform: translateY(-50%) scale(1.1);
        }

        /* OTP Input Fields */
        .otp-container {
            display: flex;
            justify-content: space-between;
            gap: 0.75rem;
            margin: 1.5rem 0;
        }

        .otp-input {
            width: 2.5rem;
            height: 3.5rem;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            background: rgba(30, 41, 59, 0.6);
            border: 2px solid rgba(34, 197, 94, 0.2);
            border-radius: 1px;
            color: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            box-sizing: border-box;
        }

        .otp-input:focus {
            outline: none;
            border-color: #22c55e;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1),
                0 8px 25px rgba(34, 197, 94, 0.2);
            transform: scale(1.05);
        }

        .otp-input.active {
            border-color: #22c55e;
            background: rgba(34, 197, 94, 0.1);
        }

        .auth-btn {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            border: none;
            width: 100%;
            border-radius: 12px;
            padding: 0.7rem 1rem;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.3);
        }

        .auth-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(34, 197, 94, 0.4),
                0 0 0 1px rgba(34, 197, 94, 0.2);
        }

        .auth-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none !important;
        }

        .auth-btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, 0.2),
                    transparent);
            transition: left 0.5s;
        }

        .auth-btn:hover:not(:disabled)::before {
            left: 100%;
        }

        .message-box {
            background-color: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.3);
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            color: #d1fae5;
        }

        .alert-success {
            background-color: rgba(34, 197, 94, 0.2);
            border-color: #22c55e;
            color: #86efac;
        }

        .alert-error {
            background-color: rgba(239, 68, 68, 0.2);
            border-color: #ef4444;
            color: #fca5a5;
        }

        .back-link {
            color: #22c55e;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            color: #16a34a;
            transform: translateX(-5px);
        }

        .timer-text {
            color: #22c55e;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .resend-link {
            color: #22c55e;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .resend-link:hover {
            color: #16a34a;
            text-decoration: underline;
        }

        .resend-link.disabled {
            color: #6b7280;
            cursor: not-allowed;
            text-decoration: none;
        }

        .email-display {
            color: #22c55e;
            font-weight: 600;
            background: rgba(34, 197, 94, 0.1);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            margin: 1rem 0;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        /* Loading animation */
        .loader {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(34, 197, 94, 0.2);
            border-top: 3px solid #22c55e;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .auth-card {
                width: 90%;
                max-width: 400px;
            }

            .input-field {
                padding: 0.7rem 1rem 0.7rem 3.5rem;
            }

            .input-icon {
                left: 0.8rem;
            }

            .otp-input {
                width: 3rem;
                height: 3rem;
                font-size: 1.25rem;
            }
        }

        @media (max-width: 480px) {
            .auth-card {
                width: 95%;
                min-width: 300px;
            }

            .tab-item {
                padding: 0.75rem 0.5rem;
                font-size: 0.9rem;
            }

            .otp-container {
                gap: 0.5rem;
            }

            .otp-input {
                width: 2.5rem;
                height: 2.5rem;
                font-size: 1.1rem;
            }
        }
    </style>
    <link href="{{ asset('backend/assets/img/fav4.png') }}" rel="icon" />

</head>

<body class="auth-container">
    <div id="container_login">
        <!-- OTP Verification Card -->
        <div class="auth-card max-w-sm mx-auto rounded-2xl shadow-2xl overflow-hidden">
            <!-- Tab Selector -->
            <div class="tab-selector flex">
                <div class="tab-item flex-1 text-center py-4 cursor-pointer" onclick="window.location.href='{{ route('login') }}'">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </div>
            </div>

            <!-- Main Content -->
            <div class="px-8 py-6">
                <!-- Header -->
                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-white mb-2">Verify OTP</h2>
                    <p class="text-gray-400">
                        Enter the 6-digit code sent to your email
                    </p>
                    
                    <!-- Display Email if available -->
                    @if(session('email'))
                        <div class="email-display mt-3">
                            <i class="fas fa-envelope mr-2"></i>
                            {{ session('email') }}
                        </div>
                    @endif
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="message-box alert-success mb-4">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="message-box alert-error mb-4">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        @foreach ($errors->all() as $error)
                            <p class="mb-1">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- OTP Verification Form -->
                <form method="POST" action="{{ route('verify.otp') }}" id="otpForm">
                    @csrf

                    <!-- Hidden token field (if you want to use single input) -->
                    <input type="hidden" name="token" id="otpToken" value="">

                    <!-- OTP Input Boxes -->
                    <div class="otp-container" id="otpContainer">
                        @for($i = 1; $i <= 6; $i++)
                            <input type="text" 
                                   maxlength="1" 
                                   class="otp-input" 
                                   data-index="{{ $i }}"
                                   oninput="moveToNext(this)"
                                   onkeydown="moveToPrevious(event, this)"
                                   onpaste="handleOtpPaste(event)">
                        @endfor
                    </div>

                    <!-- Error message for OTP -->
                    @error('token')
                        <p class="text-sm text-red-400 mt-2 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                        </p>
                    @enderror

                    <!-- Timer and Resend -->
                    <div class="flex items-center justify-between mt-6 mb-4">
                        <div>
                            <span class="text-gray-400">Time remaining: </span>
                            <span id="timer" class="timer-text">02:00</span>
                        </div>
                        <button type="button" id="resendBtn" class="resend-link disabled" onclick="resendOtp()">
                            Resend OTP
                        </button>
                    </div>

                    <button type="submit" id="verifyBtn" class="auth-btn text-lg mb-4" disabled>
                        <i class="fas fa-check mr-2"></i>Verify OTP
                    </button>

                    <!-- Loading State (Hidden by default) -->
                    <div id="loadingState" class="hidden flex flex-col items-center justify-center py-4">
                        <div class="loader mb-4"></div>
                        <p class="text-gray-300">Verifying OTP...</p>
                    </div>

                    <!-- Back to Login Link -->
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="back-link">
                            <i class="fas fa-arrow-left"></i>
                            Back to Login
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Floating Particles Background -->
        <div class="floating-particles" id="particles"></div>
    </div>

    <script>
        // Create floating particles for background
        function createParticles(count = 30) {
            const container = document.getElementById("particles");
            if (!container) return;
            
            container.innerHTML = "";
            
            for (let i = 0; i < count; i++) {
                const p = document.createElement("div");
                p.className = "particle";
                p.style.cssText = `
                    position: absolute;
                    width: ${Math.random() * 3 + 2}px;
                    height: ${Math.random() * 3 + 2}px;
                    background: #00ff88;
                    border-radius: 50%;
                    left: ${Math.random() * 100}%;
                    animation: float linear infinite;
                    animation-delay: ${Math.random() * 5}s;
                    animation-duration: ${Math.random() * 3 + 3}s;
                    opacity: 0;
                `;
                container.appendChild(p);
            }
            
            // Add the animation keyframes
            const style = document.createElement('style');
            style.textContent = `
                @keyframes float {
                    0% {
                        transform: translateY(100vh) rotate(0deg);
                        opacity: 0;
                    }
                    10% {
                        opacity: 0.6;
                    }
                    90% {
                        opacity: 0.6;
                    }
                    100% {
                        transform: translateY(-100px) rotate(360deg);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        }

        // OTP Input Navigation
        function moveToNext(current) {
            const index = parseInt(current.dataset.index);
            
            // Update active state
            current.classList.add('active');
            
            // Move to next input if value entered
            if (current.value.length === 1 && index < 6) {
                const nextInput = document.querySelector(`.otp-input[data-index="${index + 1}"]`);
                if (nextInput) nextInput.focus();
            }
            
            // Update hidden token field and check if OTP is complete
            updateOtpToken();
            checkOtpComplete();
        }

        function moveToPrevious(event, current) {
            if (event.key === 'Backspace' && current.value.length === 0) {
                const index = parseInt(current.dataset.index);
                if (index > 1) {
                    const prevInput = document.querySelector(`.otp-input[data-index="${index - 1}"]`);
                    if (prevInput) {
                        prevInput.focus();
                        prevInput.classList.add('active');
                    }
                }
                current.classList.remove('active');
            }
            
            updateOtpToken();
            checkOtpComplete();
        }

        // Handle paste for OTP
        function handleOtpPaste(event) {
            event.preventDefault();
            const pasteData = event.clipboardData.getData('text').slice(0, 6);
            
            // Fill OTP inputs with pasted data
            const inputs = document.querySelectorAll('.otp-input');
            inputs.forEach((input, index) => {
                if (index < pasteData.length) {
                    input.value = pasteData[index];
                    input.classList.add('active');
                } else {
                    input.value = '';
                    input.classList.remove('active');
                }
            });
            
            // Focus last filled input
            if (pasteData.length > 0 && pasteData.length < 6) {
                inputs[pasteData.length].focus();
            } else if (pasteData.length === 6) {
                inputs[5].focus();
            }
            
            updateOtpToken();
            checkOtpComplete();
        }

        // Update hidden token field
        function updateOtpToken() {
            const inputs = document.querySelectorAll('.otp-input');
            let otp = '';
            inputs.forEach(input => {
                otp += input.value;
            });
            document.getElementById('otpToken').value = otp;
        }

        // Check if OTP is complete (all 6 digits)
        function checkOtpComplete() {
            const inputs = document.querySelectorAll('.otp-input');
            let complete = true;
            inputs.forEach(input => {
                if (input.value.length === 0) {
                    complete = false;
                }
            });
            
            const verifyBtn = document.getElementById('verifyBtn');
            if (complete) {
                verifyBtn.disabled = false;
            } else {
                verifyBtn.disabled = true;
            }
        }

        // Timer functionality
        let timerInterval;
        let timeLeft = 120; // 2 minutes in seconds

        function startTimer() {
            const timerElement = document.getElementById('timer');
            const resendBtn = document.getElementById('resendBtn');
            
            timerInterval = setInterval(() => {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                
                timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                
                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    resendBtn.classList.remove('disabled');
                    resendBtn.disabled = false;
                } else {
                    timeLeft--;
                }
            }, 1000);
        }

        // Resend OTP functionality
        function resendOtp() {
            const resendBtn = document.getElementById('resendBtn');
            const verifyBtn = document.getElementById('verifyBtn');
            const loadingState = document.getElementById('loadingState');
            const otpForm = document.getElementById('otpForm');
            
            // Show loading
            verifyBtn.classList.add('hidden');
            loadingState.classList.remove('hidden');
            
            // Reset timer
            clearInterval(timerInterval);
            timeLeft = 120;
            startTimer();
            resendBtn.classList.add('disabled');
            resendBtn.disabled = true;
            
            // Clear OTP inputs
            const inputs = document.querySelectorAll('.otp-input');
            inputs.forEach(input => {
                input.value = '';
                input.classList.remove('active');
            });
            
            // Reset hidden token and disable button
            document.getElementById('otpToken').value = '';
            verifyBtn.disabled = true;
            
            // Simulate API call to resend OTP
            setTimeout(() => {
                // In real implementation, you would make an AJAX call here
                // For now, we'll simulate success
                
                // Hide loading
                loadingState.classList.add('hidden');
                verifyBtn.classList.remove('hidden');
                
                // Show success message
                showMessage('OTP has been resent to your email.', 'success');
                
                // Focus first OTP input
                inputs[0].focus();
            }, 2000);
        }

        // Show message function
        function showMessage(message, type = 'info') {
            // Create message element
            const messageDiv = document.createElement('div');
            messageDiv.className = `message-box alert-${type} mb-4`;
            messageDiv.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'} mr-2"></i>
                ${message}
            `;
            
            // Insert after header
            const header = document.querySelector('.text-center.mb-6');
            header.parentNode.insertBefore(messageDiv, header.nextSibling);
            
            // Remove message after 5 seconds
            setTimeout(() => {
                messageDiv.remove();
            }, 5000);
        }

        // Form submission handler
        document.getElementById('otpForm').addEventListener('submit', function(e) {
            const verifyBtn = document.getElementById('verifyBtn');
            const loadingState = document.getElementById('loadingState');
            
            // Show loading state
            verifyBtn.classList.add('hidden');
            loadingState.classList.remove('hidden');
            
            // The form will continue to submit normally
            // Loading state will be removed when page reloads
        });

        // Run when page loads
        document.addEventListener("DOMContentLoaded", () => {
            createParticles(20);
            
            // Start the timer
            startTimer();
            
            // Focus first OTP input
            const firstInput = document.querySelector('.otp-input[data-index="1"]');
            if (firstInput) {
                firstInput.focus();
            }
            
            // Add focus/blur effects to OTP inputs
            const otpInputs = document.querySelectorAll('.otp-input');
            otpInputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.classList.add('active');
                });
                
                input.addEventListener('blur', function() {
                    if (!this.value) {
                        this.classList.remove('active');
                    }
                });
            });
            
            // Initialize OTP check
            checkOtpComplete();
        });
    </script>
</body>
</html>