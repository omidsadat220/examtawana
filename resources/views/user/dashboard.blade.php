<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>TST Exam Center</title>
    <!-- Bootstrap icons CDN for icons used in cards -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cssanimation.io/?animation=ca__fx-clipCircleCollapseOut&category=Clip-Path&theme=dark" />

    <!-- Favicon -->
    <link href="{{ asset('backend/assets/img/fav4.png') }}" rel="icon" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        body {
            background-color: #121212;
            /* Dark background */
            color: #e0e0e0;
            /* Light text color */
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Top navbar style */
        .topbar {
            max-width: 90%;
            background: #1f1f1f;
            /* Darker navbar */
            color: #e0e0e0;
            padding: 0.5rem 1rem;
            margin: 1rem auto;
        }

        .topbar .title {
            font-weight: 700;
            font-size: 1.3rem;
            letter-spacing: 1px;
            padding: 2px 8px;
        }

        .topbar .user-info a {
            color: #e0e0e0;
            text-decoration: none;
            font-weight: 700;
            margin-left: 8px;
        }

        /* User Profile Dropdown Styles */
        .user-profile-dropdown {
            position: relative;
        }

        .user-avatar {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            border-radius: 25px;
            /* background: rgba(76, 175, 80, 0.1); */
            /* border: 1px solid rgba(76, 175, 80, 0.3); */
            transition: all 0.3s ease;
        }

        .user-avatar:hover {
            /* background: rgba(76, 175, 80, 0.2); */
            /* border-color: rgba(76, 175, 80, 0.5); */
            transform: translateY(-2px);
        }

        .avatar-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #4caf50;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .avatar-img:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.4);
        }

        .user-name {
            color: #e0e0e0;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .dropdown-arrow {
            color: #4caf50;
            font-size: 0.8rem;
            transition: transform 0.3s ease;
        }

        .user-avatar.active .dropdown-arrow {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: -15px;
            margin-top: 8px;
            background: #2c2c2c;
            border: 1px solid #4caf50;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-20px) scale(0.95);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            overflow: hidden;
        }

        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 20px;
            color: #e0e0e0;
            font-weight: 500;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .dropdown-item a {
            text-decoration: none;
            color: #e0e0e0;
            font-weight: 500;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .dropdown-item:hover {
            background: rgba(76, 175, 80, 0.1);
            color: #4caf50;
            transform: translateX(5px);
        }

        .dropdown-item i {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .dropdown-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #4caf50, transparent);
            margin: 8px 0;
        }

        /* Responsive adjustments for dropdown */
        @media (max-width: 768px) {
            .user-avatar {
                padding: 6px 10px;
            }

            .user-name {
                font-size: 0.85rem;
            }

            .dropdown-menu {
                right: -20px;
                min-width: 180px;
            }
        }

        /* Main banner container and content */
        .banner-container {
            max-width: 90%;
            height: 50vh;
            margin: 1rem auto;
            background: #1f1f1f;
            /* Dark background for banner */
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            overflow: hidden;
            display: flex;
            align-items: center;
            border-bottom: 10px double #2e7d32;
            /* Green border */
            border-top: 10px double #2e7d32;
            /* Green border */
        }

        /* Left image side */
        .banner-image {
            flex: 1 1 60%;
            filter: grayscale(100%);
            max-height: 95%;
            object-fit: cover;
            display: block;
            width: 100%;
        }

        /* Right background area with text */
        .banner-text-area {
            flex: 1 1 40%;
            background: linear-gradient(135deg,
                    #4caf50,
                    #2e7d32);
            /* Green gradient */
            color: white;
            font-weight: 700;
            font-size: 1.8rem;
            font-family: "Tempus Sans ITC";
            letter-spacing: 1px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 95%;
            clip-path: polygon(13% 0, 100% 0%, 100% 100%, 0% 100%);
            padding: 0 1rem;
            text-align: center;
        }

        /* Section title "Home" */
        .section-title {
            max-width: 90%;
            margin: 2rem auto 1rem;
            font-weight: 700;
            font-size: 1.25rem;
        }

        /* Cards container */
        .cards-container {
            max-width: 90%;
            margin: 0 auto 3rem;
            display: flex;
            gap: 1.25rem;
            flex-wrap: wrap;
            justify-content: start;
        }

        /* Each card styling */
        .card-custom {
            flex: 1 1 180px;
            max-width: 25%;
            border-radius: 1rem;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            cursor: pointer;
            transform: scale(1.05) rotateY(15deg);
            filter: drop-shadow(inset 5px 5px 50px rgba(74, 222, 128, 0.3));
            box-shadow: inset 0 6.7px 5.3px rgba(0, 0, 0, 0.1),
                0 12.5px 10px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            /* background: rgba(8, 221, 15, 0.349);
        box-shadow: 0 0px 15px rgba(10, 244, 57, 0.628),
          0 0px 15px rgba(10, 244, 57, 0.627); */
            color: #fff;
        }

        .card-custom:hover {
            transform: translateY(-2px);
        }

        /* Left text inside cards */
        .card-text {
            flex-grow: 1;
            font-weight: 700;
            font-size: 1rem;
            color: #e0e0e0;
            /* Light text color */
        }

        .card-text a {
            text-decoration: none;
            color: #4caf50;
            /* Green link color */
            border-bottom: 1.5px solid #4caf50;
            /* Green underline */
        }

        /* Arrow icon next to text */
        .arrow-icon {
            font-weight: 700;
            font-size: 1.2rem;
            margin-left: 4px;
            color: #4caf50;
            /* Green arrow color */
        }

        /* Icon container on right side of card */
        .icon-container {
            background: linear-gradient(145deg,
                    #4caf50,
                    #2e7d32);
            /* Green gradient */
            border-radius: 0.5rem;
            padding: 8px 10px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            width: 40px;
            height: 40px;
            user-select: none;
        }

        /* Responsive tweaks */
        @media (max-width: 1024px) {
            body {
                padding: 0 1rem;
                /* Add padding for smaller screens */
            }

            .banner-container {
                flex-direction: column;
                height: auto;
            }

            .topbar {
                width: 100%;
                /* Full width on smaller screens */
                padding: 0.5rem;
                /* Adjust padding */
                display: flex;
                flex-direction: row;
                align-items: center;
            }

            .banner-image {
                flex: unset;
                width: 100%;
                height: 180px;
            }

            .banner-text-area {
                flex: unset;
                width: 100%;
                height: 80px;
            }

            .banner-text-area {
                font-size: 1.4rem;
            }

            .cards-container {
                justify-content: center;
            }
        }

        /* Responsive tweaks */
        @media (max-width: 768px) {
            body {
                padding: 0 1rem;
                /* Add padding for smaller screens */
            }

            .topbar {
                width: 100%;
                /* Full width on smaller screens */
                padding: 0.5rem;
                /* Adjust padding */
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .banner-container {
                flex-direction: column;
                height: auto;
            }

            .banner-image {
                flex: unset;
                width: 100%;
                height: 180px;
            }

            .banner-text-area {
                font-size: 1.4rem;
            }

            .cards-container {
                justify-content: center;
                flex-wrap: wrap;
            }

            .wrapper .button:hover {
                height: 60px;
                width: 60px;
                border: none;
            }
        }

        /* Cards container */
        .cards-container {
            max-width: 90%;
            margin: 0 auto 3rem;
            display: flex;
            gap: 1.25rem;
            flex-wrap: wrap;
            justify-content: start;
        }

        /* Each card styling */
        .card-custom {
            flex: 1 1 180px;
            max-width: 25%;
            border-radius: 1rem;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            cursor: pointer;
            /* background-color:rgba(10, 244, 57, 0.628); */
            transform: scale(1.05) rotateY(15deg);
            /* filter: drop-shadow(inset 5px 5px 50px rgba(74, 222, 128, 0.3)); */
            box-shadow: inset0 0px 15px rgba(10, 244, 57, 0.628),
                0 0px 15px rgba(10, 244, 57, 0.627);
            transition: all 0.3s ease;
            /* background: rgba(8, 221, 15, 0.349); */
            /* box-shadow: 0 0px 15px rgba(10, 244, 57, 0.628),
          0 0px 15px rgba(10, 244, 57, 0.627); */
            box-shadow: 0 0px 15px rgba(10, 244, 57, 0.628),
                0 0px 15px rgba(10, 244, 57, 0.627);
            color: #fff;
        }

        .card-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 0px 15px rgba(10, 244, 57, 0.628),
                0 0px 15px rgba(10, 244, 57, 0.627);
        }

        /* حالت ریسپانسیو در 768px → دو کارت در هر ردیف */
        @media (max-width: 768px) {
            .card-custom {
                flex: 1 1 calc(50% - 1.25rem);
                max-width: calc(50% - 1.25rem);
            }
        }

        /* حالت ریسپانسیو در 480px → یک کارت در هر ردیف */
        @media (max-width: 480px) {
            .card-custom {
                flex: 1 1 100%;
                max-width: 100%;
            }
        }

        /* social media css start ------------------------------------------------ */
        .wrapper {
            max-width: 90%;
            width: 90%;
            min-height: 100px;
            margin: 1rem auto;
            /* border: 1px solid green; */
            /* background-color: rgba(60, 255, 0, 0.308); */
            display: flex;
            flex-direction: row;
            justify-content: center;
            /* position: absolute;
        bottom: 5%; */
        }

        .wrapper .button {
            display: inline-block;
            height: 60px;
            width: 60px;
            float: left;
            text-decoration: none;
            margin: 0 5px;
            overflow: hidden;
            background: transparent;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-out;
            border: 1px solid green;
            background: #16a34a15;
        }

        .wrapper .button:hover {
            width: 200px;
            /* border: none; */
            background: #16a34a15;
        }

        .wrapper .button .icon {
            display: inline-block;
            height: 60px;
            width: 60px;
            color: #16a34a;
            text-align: center;
            border-radius: 50px;
            box-sizing: border-box;
            line-height: 60px;
            transition: all 0.3s ease-out;
        }

        .wrapper .button:nth-child(1):hover {
            border: 1px solid #4267b2;
        }

        .wrapper .button:nth-child(2):hover {
            border: 1px solid #1da1f2;
        }

        .wrapper .button:nth-child(3):hover {
            border: 1px solid#e1306c;
        }

        .wrapper .button:nth-child(4):hover {
            border: 1px solid#4267b2;
        }

        .wrapper .button:nth-child(5):hover {
            border: 1px solid#ff0000;
        }

        .wrapper .button:nth-child(1):hover .icon {
            background: #4267b2;
        }

        .wrapper .button:nth-child(2):hover .icon {
            background: #1da1f2;
        }

        .wrapper .button:nth-child(3):hover .icon {
            background: #e1306c;
        }

        .wrapper .button:nth-child(4):hover .icon {
            background: #4267b2;
        }

        .wrapper .button:nth-child(5):hover .icon {
            background: #ff0000;
        }

        .wrapper .button .icon i {
            font-size: 25px;
            line-height: 60px;
            transition: all 0.3s ease-out;
        }

        .wrapper .button:hover .icon i {
            color: #fff;
        }

        .wrapper .button span {
            font-size: 20px;
            font-weight: 500;
            line-height: 60px;
            margin-left: 10px;
            transition: all 0.3s ease-out;
        }

        .wrapper .button:nth-child(1) span {
            color: #4267b2;
        }

        .wrapper .button:nth-child(2) span {
            color: #1da1f2;
        }

        .wrapper .button:nth-child(3) span {
            color: #e1306c;
        }

        .wrapper .button:nth-child(4) span {
            color: #fff;
        }

        .wrapper .button:nth-child(5) span {
            color: #ff0000;
        }

        /* social media css end ----------------------------------------------- */
        /*  body animation datted css start-----------  */
        /* Container for particles */
        .floating-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            /* Allow clicks through */
            z-index: -1;
            /* Behind all elements */
            overflow: hidden;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
        }

        /* Each particle */
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: #00ff88;
            border-radius: 50%;
            opacity: 0;
            animation: float linear infinite;
        }

        /* Float animation */
        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-50px) rotate(360deg);
                opacity: 0;
            }
        }

        /*  body animation datted css end------------  */
    </style>
</head>

<body>
    <!--  body animation datted html start -->
    <div class="floating-particles" id="particles"></div>
    <!--  body animation datted html end -->

    <!-- Top black navbar -->



    @php
        $user = Auth::user();
        if ($user && $user->role == 'user') {
            $profileData = $user;
        }
    @endphp



    <header class="header">
        <div class="topbar d-flex justify-content-between align-items-center">
            <div class="title">TAWANA | Exam Center</div>
            <div class="user-profile-dropdown">
                <div class="user-avatar">
                    <span class="user-name">{{ $profileData->name }} |</span>

                        @php
                        use App\Models\VoucherCode;

                        $newVoucherCount = VoucherCode::where('user_id', Auth::id())
                                            ->where('is_used', false)
                                            ->count();
                        @endphp


                    {{-- when we create the image folder you can incomment --}}
                    {{-- <img class="rounded-circle header-profile-user"
                        src="{{ (!empty($profileData->photo)) ? url('upload/client_images/'.$profileData->photo) : url('upload/no_image.jpg') }}"
                        --}} <div class="position-relative">
                                <img src="{{ Auth::user()->photo ? Auth::user()->photo : (Auth::user()->avatar ? Auth::user()->avatar : 'data:image/jpeg;base64,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') }}" class="avatar-img" id="userAvatar" class="avatar-img" id="userAvatar" />
                                
                                @if($newVoucherCount > 0)
                                    <div
                                class="bg-danger rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1" >
                                </div>

                                @endif

                               
                            </div>

                </div>
                <div class="dropdown-menu" id="userDropdown">
                    <div class="dropdown-item">
                        @if($newVoucherCount > 0)
                            <span class="p-1 bg-danger rounded-circle"></span>
                        @endif
                        <i class="fa-solid fa-user"></i>
                        <a href="{{ route('user.uprofile.userprofile') }}">Profile  </a>
                    </div>
                     
                    <div class="dropdown-item">
                        <i class="bi bi-gear"></i>
                        <a href="{{ route('user.uprofile.usereditprofile') }}">Settings</a>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-item">
                        <i class="bi bi-box-arrow-right"></i>
                        <a href="{{ route('user.logout') }}">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Banner section with image and text block -->
    <div class="banner-container shadow-sm">
        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/0ad2cb31-e920-484f-a8e0-0cd5b072859d.png"
            alt="Four diverse smiling students sitting in a row at computer desks in an exam center, grayscale photo"
            class="banner-image" />
        <div class="banner-text-area">Online Exam Made Easy</div>
    </div>

    <div class="option">
        <!-- Section title -->
        <h4 class="section-title">Home</h4>

        <!-- Cards container -->
        <!-- Cards container -->
        <div class="cards-container">
            <!-- Card 1: Take Test -->
            <div class="card-custom" role="button" tabindex="0" aria-label="Take Test">
                <div class="card-text">
                    <a href="{{route('user.unicode')}}">Final Exam</a>
                    <span class="arrow-icon">↻</span>
                </div>

                <div class="icon-container" aria-hidden="true">
                    <i class="bi bi-display-fill"></i>
                </div>
            </div>

            <!-- Card 2: Resume Test -->
            <div class="card-custom ca__fx-clipGridReveal" role="button" tabindex="0" aria-label="Resume Test">
                <div class="card-text">
                    <a href="{{ route('mock.exam') }}">Mock Exam</a>
                    <span class="arrow-icon">↻</span>
                </div>
                <div class="icon-container" aria-hidden="true">
                    <i class="bi bi-pencil-square"></i>
                </div>
            </div>

            <!-- Card 3: Test History -->
            <div class="card-custom" role="button" tabindex="0" aria-label="Test History">
                <div class="card-text">
                    <a href= "{{ route('user.get.certificate') }}">Certificate</a>
                    <span class="arrow-icon">↻</span>
                </div>
                <div class="icon-container" aria-hidden="true">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </div>
            </div>

            <!-- Card 4: Contact Us -->
            <div class="card-custom" role="button" tabindex="0" aria-label="Contact Us">
                <div class="card-text">
                    <a href="https://tawanatechnology.com/about">Contact Us</a> <span class="arrow-icon">↻</span>
                </div>
                <div class="icon-container" aria-hidden="true">
                    <i class="bi bi-telephone-fill"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- social media -->
    <div class="wrapper">
        <a href="https://www.facebook.com/ECDI1?mibextid=LQQJ4d" class="button">
            <div class="icon">
                <i class="fab fa-facebook-f"></i>
            </div>
            <span>Facebook</span>
        </a>
        <a href="https://twitter.com/CyberAcdi" class="button">
            <div class="icon">
                <i class="fa-brands fa-x-twitter"></i>
            </div>
            <span>Twitter</span>
        </a>
        <a href="https://www.instagram.com/tawana_technology" class="button">
            <div class="icon">
                <i class="fab fa-instagram"></i>
            </div>
            <span>Instagram</span>
        </a>
        <a href="https://t.me/KACDI" class="button">
            <div class="icon">
                <i class="fa-brands fa-telegram"></i>
            </div>
            <span>Telegram</span>
        </a>
        <a href="https://www.youtube.com/channel/UChtfH_vkJfThhBGduzmpBWw" class="button">
            <div class="icon">
                <i class="fab fa-youtube"></i>
            </div>
            <span>YouTube</span>
        </a>
    </div>

    <!-- Bootstrap 5 JavaScript Bundle with Popper - For future dynamic behavior if needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const userAvatar = document.getElementById("userAvatar");
            const userDropdown = document.getElementById("userDropdown");
            let isDropdownOpen = false;

            // Toggle dropdown on avatar click
            userAvatar.addEventListener("click", function (e) {
                e.stopPropagation();
                toggleDropdown();
            });

            // Close dropdown when clicking outside
            document.addEventListener("click", function (e) {
                if (
                    !userAvatar.contains(e.target) &&
                    !userDropdown.contains(e.target)
                ) {
                    closeDropdown();
                }
            });

            // Handle dropdown item clicks
            const dropdownItems = document.querySelectorAll(".dropdown-item");
            dropdownItems.forEach((item) => {
                item.addEventListener("click", function () {
                    const action = this.querySelector("span").textContent.toLowerCase();
                    handleDropdownAction(action);
                    closeDropdown();
                });
            });

            function toggleDropdown() {
                if (isDropdownOpen) {
                    closeDropdown();
                } else {
                    openDropdown();
                }
            }

            function openDropdown() {
                userDropdown.classList.add("show");
                userAvatar.classList.add("active");
                isDropdownOpen = true;
            }

            function closeDropdown() {
                userDropdown.classList.remove("show");
                userAvatar.classList.remove("active");
                isDropdownOpen = false;
            }

            function handleDropdownAction(action) {
                switch (action) {
                    case "profile":
                        window.location.href = "./edituser.html";
                        break;
                    case "settings":
                        // Add settings page navigation here
                        console.log("Settings clicked");
                        break;
                    case "logout":
                        window.location.href = "./1.html";
                        break;
                    default:
                        console.log("Unknown action:", action);
                }
            }

            // Close dropdown on escape key
            document.addEventListener("keydown", function (e) {
                if (e.key === "Escape" && isDropdownOpen) {
                    closeDropdown();
                }
            });
        });
    </script>

    <!--  body animation datted script start -->
    <script>
        function createParticles(count = 50) {
            const container = document.getElementById("particles");
            container.innerHTML = ""; // Clear existing particles

            for (let i = 0; i < count; i++) {
                const p = document.createElement("div");
                p.className = "particle";
                p.style.left = Math.random() * 100 + "%";
                p.style.animationDelay = Math.random() * 5 + "s";
                p.style.animationDuration = Math.random() * 3 + 3 + "s";
                container.appendChild(p);
            }
        }

        // Run after DOM is ready
        document.addEventListener("DOMContentLoaded", () => {
            createParticles(30); // You can change number of particles
        });
    </script>
    <!--  body animation datted script end -->
</body>

</html>