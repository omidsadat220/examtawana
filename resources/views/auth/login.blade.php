<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Advanced Authentication System | Service</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('favicon-32x32.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        :root {
            --primary-bg: #121212;
            --secondary-bg: #1e1e1e;
            --accent-color: #22c55e;
            --text-primary: #f5f5f5;
            --text-secondary: #bdbdbd;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--primary-bg);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Network Background Animation */
        #network-bg {
            position: fixed;
            inset: 0;
            z-index: 0;
        }

        /* Main Container */
        .auth-container {
            background-color: var(--secondary-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 30px;
            width: 100%;
            max-width: 500px;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
            backdrop-filter: blur(6px);
            margin: 0 auto;
        }

        /* Tab Navigation */
        .tab-selector {
            display: flex;
            background: #2c2c2c;
            border-radius: var(--border-radius);
            margin-bottom: 30px;
            overflow: hidden;
        }

        .tab-item {
            flex: 1;
            text-align: center;
            padding: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .tab-item.active {
            background-color: var(--accent-color);
            color: white;
        }

        /* Form Elements */
        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
            color: var(--accent-color);
        }

        .description {
            text-align: center;
            color: var(--text-secondary);
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .input-group {
            margin-bottom: 25px;
            position: relative;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-primary);
        }

        .input-wrapper {
            position: relative;
            display: flex;
        }

        .input-field {
            width: 100%;
            padding: 14px 15px 14px 40px;
            border: 1px solid #333;
            border-radius: var(--border-radius);
            background-color: #2c2c2c;
            color: var(--text-primary);
            font-size: 16px;
            transition: border 0.3s;
        }

        .input-field:focus {
            outline: none;
            border-color: var(--accent-color);
        }

        .icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--accent-color);
            z-index: 2;
        }

        /* Button */
        .auth-btn {
            width: 100%;
            padding: 14px;
            background-color: var(--accent-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .auth-btn:hover {
            background-color: #16a34a;
        }

        /* Forgot Password Link */
        .forgot-password {
            text-align: right;
            margin-top: 10px;
        }

        .forgot-password a {
            color: var(--accent-color);
            text-decoration: none;
            font-size: 14px;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        /* Social Login */
        .social-login {
            margin-top: 30px;
            text-align: center;
        }

        .social-login p {
            color: var(--text-secondary);
            margin-bottom: 15px;
            position: relative;
        }

        .social-login p::before,
        .social-login p::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 30%;
            height: 1px;
            background-color: #333;
        }

        .social-login p::before {
            left: 0;
        }

        .social-login p::after {
            right: 0;
        }

        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 1px solid #333;
            background-color: #2c2c2c;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            border-color: var(--accent-color);
            transform: translateY(-2px);
        }

        /* SVG icon styles */
        .svg-icon {
            width: 20px;
            height: 20px;
            fill: currentColor;
        }

        /* Remember Me */
        .remember-me {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 15px;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .checkbox-container input {
            width: 16px;
            height: 16px;
            accent-color: var(--accent-color);
        }
        
        

        /* Responsive Design */
        @media (max-width: 768px) {
            .auth-container {
                padding: 20px;
                max-width: 90%;
            }

            h2 {
                font-size: 24px;
            }

            .tab-item {
                padding: 12px;
                font-size: 14px;
            }

            .social-buttons {
                gap: 10px;
            }

            .social-btn {
                width: 45px;
                height: 45px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .auth-container {
                padding: 15px;
                max-width: 95%;
            }

            .tab-item {
                padding: 10px;
                font-size: 13px;
            }

            .input-field {
                padding: 12px 15px 12px 40px;
                font-size: 14px;
            }

            .auth-btn {
                padding: 12px;
                font-size: 14px;
            }

            .social-btn {
                width: 40px;
                height: 40px;
            }
        }

        /* Animation for form switching */
        .page {
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Error Message */
        .error-message {
            color: #f44336;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
    </style>
    <link href="{{ asset('backend/assets/img/fav4.png') }}" rel="icon" />
</head>

<body>
    <!-- Network Background Animation -->
    <canvas id="network-bg"></canvas>

    <!-- Main Auth Container -->
    <div class="auth-container">
        <!-- Tab Navigation -->
        <div class="tab-selector">
            <div class="tab-item active" onclick="showPage('loginPage')">
                <i class="fas fa-sign-in-alt"></i> Login
            </div>
            <div class="tab-item" onclick="showPage('signupPage')">
                <i class="fas fa-user-plus"></i> Sign Up
            </div>
        </div>

        <!-- Login Form -->
        <form method="POST" id="loginPage" class="page" action="{{ route('login') }}">
            @csrf
            <h2>Welcome Back</h2>
            <p class="description">Sign in to your account to continue</p>

            <div class="input-group">
                <div class="input-wrapper">
                    <span class="icon">
                        <svg class="svg-icon" viewBox="0 0 24 24">
                            <path d="M20,4H4C2.89,4 2,4.89 2,6V18C2,19.1 2.9,20 4,20H20C21.1,20 22,19.1 22,18V6C22,4.89 21.1,4 20,4M20,8L12,13L4,8V6L12,11L20,6V8Z" />
                        </svg>
                    </span>
                    <input type="email" id="loginEmail" name="email" class="input-field" placeholder="Enter your email" required />
                </div>
                <p id="loginEmailError" class="error-message">
                    <i class="fas fa-exclamation-circle"></i> Please enter a valid email
                </p>
            </div>

            <div class="input-group">
                <div class="input-wrapper">
                    <span class="icon">
                        <svg class="svg-icon" viewBox="0 0 24 24">
                            <path d="M12,17C10.89,17 10,16.1 10,15C10,13.89 10.89,13 12,13C13.1,13 14,13.9 14,15C14,16.1 13.1,17 12,17M18,20V10H6V20H18M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V10C4,8.89 4.89,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" />
                        </svg>
                    </span>
                    <input type="password" name="password" id="loginPassword" class="input-field" placeholder="Enter your password" required />
                    <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-green-500" onclick="togglePasswordVisibility('loginPassword')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <p id="loginPasswordError" class="error-message">
                    <i class="fas fa-exclamation-circle"></i> Password must be at least 8 characters
                </p>
            </div>

            <div class="remember-me">
                <label class="checkbox-container">
                    <input type="checkbox" id="rememberMe" name="remember">
                    <span>Remember me</span>
                </label>
                <div class="forgot-password">
                    <a href="{{ url('/forgot-password') }}">Forgot Password?</a>
                </div>
            </div>

            <button type="submit" class="auth-btn">
                <svg class="svg-icon" viewBox="0 0 24 24">
                    <path d="M10,17V14H3V10H10V7L15,12L10,17M10,2H19A2,2 0 0,1 21,4V20A2,2 0 0,1 19,22H10A2,2 0 0,1 8,20V18H10V20H19V4H10V6H8V4A2,2 0 0,1 10,2Z" />
                </svg>
                Sign In
            </button>

            <div class="social-login">
                <p>Or continue with</p>
                <div class="social-buttons">
                    <a href="/auth/google" class="social-btn" title="Google">
                        <i class="fab fa-google"></i>
                    </a>
                    <!--<a href="/auth/facebook" class="social-btn" title="Facebook">-->
                    <!--    <i class="fab fa-facebook-f"></i>-->
                    <!--</a>-->
                    <!--<a href="/auth/twitter" class="social-btn" title="Twitter">-->
                    <!--    <i class="fab fa-twitter"></i>-->
                    <!--</a>-->
                </div>
            </div>
        </form>

        <!-- Signup Form -->
        <form method="POST" action="{{ route('register') }}" id="signupPage" class="page hidden">
            @csrf
            <h2>Create Account</h2>
            <p class="description">Join our community today</p>

            <div class="input-group">
                <div class="input-wrapper">
                    <span class="icon">
                        <svg class="svg-icon" viewBox="0 0 24 24">
                            <path d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                        </svg>
                    </span>
                    <input type="text" name="name" id="name" class="input-field" placeholder="Enter your username" required />
                </div>
                <p id="signupUsernameError" class="error-message">
                    <i class="fas fa-exclamation-circle"></i> Username must be at least 3 characters
                </p>
            </div>

            <div class="input-group">
                <div class="input-wrapper">
                    <span class="icon">
                        <svg class="svg-icon" viewBox="0 0 24 24">
                            <path d="M20,4H4C2.89,4 2,4.89 2,6V18C2,19.1 2.9,20 4,20H20C21.1,20 22,19.1 22,18V6C22,4.89 21.1,4 20,4M20,8L12,13L4,8V6L12,11L20,6V8Z" />
                        </svg>
                    </span>
                    <input type="email" name="email" id="email" class="input-field" placeholder="Enter your email" required />
                </div>
                <p id="signupEmailError" class="error-message">
                    <i class="fas fa-exclamation-circle"></i> Please enter a valid email
                </p>
            </div>

            <div class="input-group">
                <div class="input-wrapper">
                    <span class="icon">
                        <svg class="svg-icon" viewBox="0 0 24 24">
                            <path d="M12,17C10.89,17 10,16.1 10,15C10,13.89 10.89,13 12,13C13.1,13 14,13.9 14,15C14,16.1 13.1,17 12,17M18,20V10H6V20H18M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V10C4,8.89 4.89,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" />
                        </svg>
                    </span>
                    <input type="password" name="password" id="signupPassword" class="input-field" placeholder="Create a strong password" required />
                    <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-green-500" onclick="togglePasswordVisibility('signupPassword')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <p id="signupPasswordError" class="error-message">
                    <i class="fas fa-exclamation-circle"></i> Password must be at least 8 characters
                </p>
            </div>

            <div class="input-group">
                <div class="input-wrapper">
                    <span class="icon">
                        <svg class="svg-icon" viewBox="0 0 24 24">
                            <path d="M12,17C10.89,17 10,16.1 10,15C10,13.89 10.89,13 12,13C13.1,13 14,13.9 14,15C14,16.1 13.1,17 12,17M18,20V10H6V20H18M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V10C4,8.89 4.89,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z" />
                        </svg>
                    </span>
                    <input type="password" name="password_confirmation" id="signupConfirmPassword" class="input-field" placeholder="Confirm password" required />
                    <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-green-500" onclick="togglePasswordVisibility('signupConfirmPassword')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <p id="signupConfirmPasswordError" class="error-message">
                    <i class="fas fa-exclamation-circle"></i> Passwords do not match
                </p>
            </div>

            <button type="submit" class="auth-btn">
                <svg class="svg-icon" viewBox="0 0 24 24">
                    <path d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M6,10V7H4V10H1V12H4V15H6V12H9V10M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12Z" />
                </svg>
                Create Account
            </button>
        </form>
    </div>

    <script>
        // Password visibility toggle
        function togglePasswordVisibility(inputId) {
            const input = document.getElementById(inputId);
            const icon = input.parentElement.querySelector("button i");

            if (input.type === "password") {
                input.type = "text";
                icon.className = "fas fa-eye-slash";
            } else {
                input.type = "password";
                icon.className = "fas fa-eye";
            }
        }

        // Show page function
        function showPage(pageId) {
            const pages = document.querySelectorAll(".page");
            const tabs = document.querySelectorAll(".tab-item");

            // Update tab states
            tabs.forEach((tab) => {
                tab.classList.remove("active");
            });

            if (pageId === "loginPage") {
                tabs[0].classList.add("active");
            } else if (pageId === "signupPage") {
                tabs[1].classList.add("active");
            }

            // Hide all pages
            pages.forEach((page) => {
                page.classList.add("hidden");
            });

            // Show target page
            setTimeout(() => {
                const targetPage = document.getElementById(pageId);
                targetPage.classList.remove("hidden");
            }, 100);
        }

        // Form validation
        function validateEmail(email, errorElementId) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const errorElement = document.getElementById(errorElementId);

            if (!email || !emailRegex.test(email)) {
                errorElement.style.display = "block";
                return false;
            } else {
                errorElement.style.display = "none";
                return true;
            }
        }

        function validatePassword(password, errorElementId, minLength = 8) {
            const errorElement = document.getElementById(errorElementId);

            if (!password || password.length < minLength) {
                errorElement.style.display = "block";
                return false;
            } else {
                errorElement.style.display = "none";
                return true;
            }
        }

        function validateName(name, errorElementId) {
            const errorElement = document.getElementById(errorElementId);

            if (!name || name.length < 3) {
                errorElement.style.display = "block";
                return false;
            } else {
                errorElement.style.display = "none";
                return true;
            }
        }

        // Real-time validation
        document.addEventListener("DOMContentLoaded", () => {
            // Login form validation
            document.getElementById("loginEmail").addEventListener("blur", () => {
                validateEmail(
                    document.getElementById("loginEmail").value,
                    "loginEmailError"
                );
            });

            document.getElementById("loginPassword").addEventListener("blur", () => {
                validatePassword(
                    document.getElementById("loginPassword").value,
                    "loginPasswordError"
                );
            });

            // Signup form validation
            document.getElementById("name").addEventListener("blur", () => {
                validateName(
                    document.getElementById("name").value,
                    "signupUsernameError"
                );
            });

            document.getElementById("email").addEventListener("blur", () => {
                validateEmail(
                    document.getElementById("email").value,
                    "signupEmailError"
                );
            });

            document.getElementById("signupPassword").addEventListener("blur", () => {
                validatePassword(
                    document.getElementById("signupPassword").value,
                    "signupPasswordError"
                );
            });

            document.getElementById("signupConfirmPassword").addEventListener("blur", () => {
                const password = document.getElementById("signupPassword").value;
                const confirmPassword = document.getElementById("signupConfirmPassword").value;
                const errorElement = document.getElementById("signupConfirmPasswordError");

                if (password !== confirmPassword) {
                    errorElement.style.display = "block";
                    return false;
                } else {
                    errorElement.style.display = "none";
                    return true;
                }
            });
        });

        // Network Background Animation
        const canvas = document.getElementById("network-bg");
        const ctx = canvas.getContext("2d");

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        const nodes = [];
        const NODE_COUNT = 300;

        // Create nodes
        for (let i = 0; i < NODE_COUNT; i++) {
            nodes.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                vx: (Math.random() - 0.5) * 0.6,
                vy: (Math.random() - 0.5) * 0.6,
            });
        }

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // Draw nodes
            nodes.forEach(n => {
                ctx.beginPath();
                ctx.arc(n.x, n.y, 2.5, 0, Math.PI * 2);
                ctx.fillStyle = "#22c55e";
                ctx.fill();
            });

            // Draw connections
            for (let i = 0; i < nodes.length; i++) {
                for (let j = i + 1; j < nodes.length; j++) {
                    const dx = nodes[i].x - nodes[j].x;
                    const dy = nodes[i].y - nodes[j].y;
                    const dist = Math.sqrt(dx * dx + dy * dy);

                    if (dist < 120) {
                        ctx.strokeStyle = "rgba(34, 197, 94, 0.15)";
                        ctx.beginPath();
                        ctx.moveTo(nodes[i].x, nodes[i].y);
                        ctx.lineTo(nodes[j].x, nodes[j].y);
                        ctx.stroke();
                    }
                }
            }

            // Move nodes
            nodes.forEach(n => {
                n.x += n.vx;
                n.y += n.vy;

                if (n.x < 0 || n.x > canvas.width) n.vx *= -1;
                if (n.y < 0 || n.y > canvas.height) n.vy *= -1;
            });

            requestAnimationFrame(draw);
        }

        draw();

        window.addEventListener("resize", () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });
    </script>
</body>
</html>