<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password | Tawana Exam Center</title>
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
            min-height: 30rem;
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

        .auth-btn:hover::before {
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
        }
    </style>
    <link href="{{ asset('backend/assets/img/fav4.png') }}" rel="icon" />

</head>

<body class="auth-container">
    <div id="container_login">
        <!-- Reset Password Card -->
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
                        <i class="fas fa-key text-white text-2xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-white mb-2">Reset Password</h2>
                    <p class="text-gray-400">
                        Enter your email to receive a reset link
                    </p>
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

                <!-- Forgot Password Form -->
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="input-group">
                        <input type="email" id="email" name="email" class="input-field" 
                               placeholder="Enter your email" value="{{ old('email') }}" required autofocus />
                        <i class="fas fa-envelope input-icon"></i>
                        @error('email')
                            <p class="text-sm text-red-400 mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <button type="submit" class="auth-btn text-lg mb-4">
                        <i class="fas fa-paper-plane mr-2"></i>Send Reset Link
                    </button>
                </form>

                <!-- Back to Login Link -->
                <div class="text-center">
                    <a href="{{ route('login') }}" class="back-link">
                        <i class="fas fa-arrow-left"></i>
                        Back to Login
                    </a>
                </div>
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

        // Run when page loads
        document.addEventListener("DOMContentLoaded", () => {
            createParticles(20);
            
            // Add focus effect to email input
            const emailInput = document.getElementById('email');
            if (emailInput) {
                emailInput.addEventListener('focus', function() {
                    this.parentElement.querySelector('.input-icon').style.color = '#16a34a';
                    this.parentElement.querySelector('.input-icon').style.transform = 'translateY(-50%) scale(1.1)';
                });
                
                emailInput.addEventListener('blur', function() {
                    if (!this.value) {
                        this.parentElement.querySelector('.input-icon').style.color = '#22c55e';
                        this.parentElement.querySelector('.input-icon').style.transform = 'translateY(-50%)';
                    }
                });
            }
        });
    </script>
</body>
</html>