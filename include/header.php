<header>
    <style>
        .logo-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .site-logo {
            width: 68px;
            height: 68px;
            border-radius: 70%;
            object-fit: cover;
            display: block;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            background: var(--color-primary);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            z-index: 1002;
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: block;
            }

            .nav-right {
                position: fixed;
                top: 0;
                right: -100%;
                width: 280px;
                height: 100vh;
                background: var(--color-primary);
                flex-direction: column;
                padding: 100px 30px 30px;
                transition: right 0.3s ease;
                z-index: 1001;
                box-shadow: -5px 0 15px rgba(0,0,0,0.3);
            }

            .nav-right.active {
                right: 0;
            }

            .nav-links {
                flex-direction: column;
                width: 100%;
                gap: 0;
            }

            .nav-links a {
                color: white;
                padding: 15px 0;
                width: 100%;
                border-bottom: 1px solid rgba(255,255,255,0.1);
                font-size: 1rem;
            }

            .nav-links a:hover {
                color: var(--color-accent);
                padding-left: 10px;
            }

            .nav-right .btn {
                width: 100%;
                text-align: center;
                margin-top: 20px;
            }

            /* Mobile menu overlay */
            .mobile-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                background: rgba(0,0,0,0.5);
                z-index: 1000;
            }

            .mobile-overlay.active {
                display: block;
            }
        }
    </style>

    <div class="container nav-content">
        <a href="index.php" class="logo logo-wrap">
            <img src="image/logo.jpeg" alt="Grooming Bar Logo" class="site-logo">
        </a>

        <button class="mobile-menu-toggle" onclick="toggleMobileMenu()" aria-label="Toggle menu">
            <i data-lucide="menu" style="width: 24px; height: 24px;"></i>
        </button>

        <div class="nav-right" id="mobileNav">
            <nav class="nav-links">
                <a href="index.php">Home</a>
                <a href="haircuts.php">Haircuts</a>
                <a href="beard.php">Beard</a>
                <a href="nails.php">Nails</a>
                <a href="salon.php">Salon</a>
                <a href="store.php">Shop</a>
                <a href="projects.php">Gallery</a>
                <a href="about.php">About Us</a>
                <a href="contact.php">Contact</a>
            </nav>

            <div style="display: flex; gap: 15px; align-items: center;">
                <a href="admin/login.php" class="btn" title="Manager Login"
                   style="width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 1px solid var(--color-text); color: var(--color-text); padding: 0; transition: all 0.3s ease;">
                    <i data-lucide="user" style="width: 20px; height: 20px;"></i>
                </a>
                
                <!-- WhatsApp Header Icon -->
                <a href="https://wa.me/1234567890" target="_blank" class="btn" title="Contact on WhatsApp"
                   style="width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: #25D366; color: white; padding: 0; border: none; transition: transform 0.2s;">
                    <!-- Simple WhatsApp SVG -->
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" style="fill: white; stroke: none;"><path d="M17.49 17.49c-2.43 2.5-6.19 3-9.15 1.14l-4.22 1.1 1.11-4.08c-1.92-3.09-1.29-7.1 1.14-9.39 2.56-2.43 6.64-2.3 9.17.26 2.53 2.56 2.58 6.57-.05 8.97z"></path></svg>
                </a>
            </div>
        </div>
    </div>



    <!-- Mobile overlay -->
    <div class="mobile-overlay" id="mobileOverlay" onclick="toggleMobileMenu()"></div>

    <script>
        function toggleMobileMenu() {
            const nav = document.getElementById('mobileNav');
            const overlay = document.getElementById('mobileOverlay');
            nav.classList.toggle('active');
            overlay.classList.toggle('active');
            document.body.style.overflow = nav.classList.contains('active') ? 'hidden' : '';
        }

        // Close menu when clicking on a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    toggleMobileMenu();
                }
            });
        });
    </script>
</header>

