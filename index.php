<?php include 'include/head.php'; 
// Load Dynamic Content
$contentFile = __DIR__ . '/admin/data/content.json';
$content = file_exists($contentFile) ? json_decode(file_get_contents($contentFile), true) : [];

// Helper to get content with fallback
function getTextContent($key, $default) {
    global $content;
    return $content[$key] ?? $default;
}
?>
<?php include 'include/header.php'; ?>

<main>
    <!-- Hero Section -->
    <section class="hero index-hero">
        <div class="hero-bg-grid">
            <div class="grid-item" style="background-image: url('image/colley.jpeg');"></div>
            <div class="grid-item" style="background-image: url('image/nail.jpeg');"></div>
            <div class="grid-item" style="background-image: url('image/kid.jpeg');"></div>
            <div class="grid-item" style="background-image: url('image/nails.jpeg');"></div>
            <div class="grid-item" style="background-image: url('image/small.jpeg');"></div>
            <div class="grid-item" style="background-image: url('image/nail2.jpeg');"></div>
            <div class="grid-item" style="background-image: url('image/colley.jpeg'); background-position: top;"></div>
            <div class="grid-item" style="background-image: url('image/new product.jpeg');"></div>
        </div>
        <div class="hero-overlay-netflix"></div>
        <div class="container">
            <div class="hero-content reveal">
                <h1><?php echo htmlspecialchars(getTextContent('home_hero_title', 'LOOK & FEEL YOUR BEST.')); ?></h1>
                <p><?php echo htmlspecialchars(getTextContent('home_hero_desc', 'Premium barbering, beauty, and nail care services. Based in Vanderbijlpark, serving the community with style and confidence.')); ?></p>
                <div class="hero-btns" style="justify-content: center;">
                    <a href="contact.php" class="btn btn-primary">Book an Appointment</a>
                    <a href="tel:0714893052" class="btn btn-outline" style="border-color: white; color: white;">Call Now</a>
                </div>
            </div>
        </div>
    </section>


    <!-- Modern Feature Showcase (Bento Grid) -->
    <section class="bento-showcase">
        <div class="container">
            <div class="section-header reveal" style="text-align: center; margin-bottom: 3rem;">
                <span style="color: var(--color-accent); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.85rem;">Why Choose Us</span>
                <h2 style="margin-top: 0.5rem;"><?php echo htmlspecialchars(getTextContent('home_features_title', 'Precision, Style & Professionalism')); ?></h2>
                <p><?php echo htmlspecialchars(getTextContent('home_features_desc', 'We combine traditional techniques with modern trends to give you the ultimate grooming experience.')); ?></p>
            </div>

            <div class="bento-grid reveal">
                <!-- Main Featured Card -->
                <div class="bento-card image-card bento-lg">
                    <div class="card-bg" style="background-image: url('image/small.jpeg');"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <h3>Grooming for All Ages</h3>
                        <p>Our expert barbers deliver sharp, tailored cuts for everyone from kids to gentlemen.</p>
                    </div>
                </div>

                <!-- Icon Card -->
                <div class="bento-card">
                    <div class="card-content">
                        <div class="card-icon"><i data-lucide="shield-check"></i></div>
                        <h3>Certified Staff</h3>
                        <p>Fully trained and licensed professionals you can trust.</p>
                    </div>
                </div>

                <!-- Tall Image Card -->
                <div class="bento-card image-card bento-tall">
                    <div class="card-bg" style="background-image: url('image/fade2.jpeg');"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <h3>Modern Fade Mastery</h3>
                        <p>The latest trends executed with flawless detail.</p>
                    </div>
                </div>

                <!-- Accent Card -->
                <div class="bento-card accent-card">
                    <div class="card-content">
                        <div class="card-icon"><i data-lucide="sparkles"></i></div>
                        <h3>Premium Salon</h3>
                        <p>A relaxing sanctuary for your beauty transformations.</p>
                    </div>
                </div>

                <!-- Wide Image Card -->
                <div class="bento-card image-card bento-lg">
                    <div class="card-bg" style="background-image: url('image/kid.jpeg');"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <h3>Sharp Styles for Juniors</h3>
                        <p>We make sure the little ones leave looking just as fresh as the grown-ups.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


   <!-- About Section -->
<section id="about" class="about" style="background: var(--color-white); padding: 60px 0;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-md); align-items: center;">
            
            <div class="section-header reveal">
                <h2><?php echo htmlspecialchars(getTextContent('home_about_title', 'Experience You Can Trust')); ?></h2>
                <p><?php echo htmlspecialchars(getTextContent('home_about_desc', 'At The Grooming Barbershop (TGB), we provide professional barbering, beauty, and nail services. Our team ensures you leave looking and feeling your best every time.')); ?></p>
                <p>From precision haircuts to relaxing grooming sessions, every service is delivered with care, passion, and style. We don’t just cut hair — we create confidence, boost your style, and make sure you leave with a smile. Your perfect look starts here!</p>
                <a href="contact.php" class="btn btn-primary" style="margin-top: 15px;">Book Your Appointment Today</a>
            </div>
            
            <div class="reveal" 
                 style="
                    background: url('image/braidscut.jpeg') center/cover no-repeat; 
                    height: 550px; 
                    width: 100%; 
                    clip-path: polygon(10% 0, 100% 0, 90% 100%, 0 100%);
                    border-radius: 20px;
                    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
                    overflow: hidden;
                 ">
            </div>

        </div>
    </div>
</section>


    <!-- Coming Soon Section -->
    <section class="coming-soon-section" style="background: linear-gradient(135deg, #1a4d3e 0%, #2d7a5f 100%); padding: 80px 0; position: relative; overflow: hidden;">
        <!-- Animated background elements -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.1; background: url('data:image/svg+xml,<svg width=\"100\" height=\"100\" xmlns=\"http://www.w3.org/2000/svg\"><circle cx=\"50\" cy=\"50\" r=\"2\" fill=\"white\"/></svg>') repeat;"></div>
        
        <div class="container">
            <div class="section-header reveal" style="text-align: center; margin-bottom: 50px;">
                <span style="display: inline-block; background: rgba(255,215,0,0.2); color: #FFD700; padding: 8px 20px; border-radius: 30px; font-size: 0.9rem; font-weight: 600; letter-spacing: 1px; margin-bottom: 15px;">
                    COMING SOON
                </span>
                <h2 style="color: #FFD700; font-size: 2.5rem; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 2px;">
                    Razor Bump Solution
                </h2>
                <p style="color: rgba(255,255,255,0.9); font-size: 1.2rem; max-width: 600px; margin: 0 auto;">
                    For Face & Head - Say Goodbye to Razor Bumps for Good!
                </p>
            </div>

            <div class="coming-soon-content reveal" style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; max-width: 1200px; margin: 0 auto;">
                
                <!-- Product Image -->
                <div class="product-image-container" style="position: relative;">
                    <div style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border-radius: 30px; padding: 40px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); border: 2px solid rgba(255,215,0,0.3);">
                        <img src="image/razor-bump-solution.jpg" 
                             alt="Razor Bump Solution - Coming Soon" 
                             style="width: 100%; height: auto; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.4);">
                    </div>
                    <!-- Glow effect -->
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 80%; height: 80%; background: radial-gradient(circle, rgba(255,215,0,0.3) 0%, transparent 70%); filter: blur(40px); z-index: -1;"></div>
                </div>

                <!-- Product Details -->
                <div class="product-details" style="color: white;">
                    <h3 style="color: #FFD700; font-size: 1.8rem; margin-bottom: 25px; font-weight: 700;">
                        Revolutionary Grooming Solution
                    </h3>
                    
                    <div class="benefits-list" style="margin-bottom: 30px;">
                        <div class="benefit-item" style="display: flex; align-items: start; margin-bottom: 20px; padding: 15px; background: rgba(255,255,255,0.1); border-radius: 15px; border-left: 4px solid #FFD700;">
                            <span style="color: #FFD700; font-size: 1.5rem; margin-right: 15px;">✓</span>
                            <div>
                                <strong style="display: block; font-size: 1.1rem; margin-bottom: 5px;">Eliminates Razor Bumps</strong>
                                <span style="opacity: 0.9; font-size: 0.95rem;">Say goodbye to irritation and ingrown hairs</span>
                            </div>
                        </div>
                        
                        <div class="benefit-item" style="display: flex; align-items: start; margin-bottom: 20px; padding: 15px; background: rgba(255,255,255,0.1); border-radius: 15px; border-left: 4px solid #FFD700;">
                            <span style="color: #FFD700; font-size: 1.5rem; margin-right: 15px;">✓</span>
                            <div>
                                <strong style="display: block; font-size: 1.1rem; margin-bottom: 5px;">Prevents Ingrown Hairs</strong>
                                <span style="opacity: 0.9; font-size: 0.95rem;">Keep your skin smooth and bump-free</span>
                            </div>
                        </div>
                        
                        <div class="benefit-item" style="display: flex; align-items: start; margin-bottom: 20px; padding: 15px; background: rgba(255,255,255,0.1); border-radius: 15px; border-left: 4px solid #FFD700;">
                            <span style="color: #FFD700; font-size: 1.5rem; margin-right: 15px;">✓</span>
                            <div>
                                <strong style="display: block; font-size: 1.1rem; margin-bottom: 5px;">Soothes Irritation & Redness</strong>
                                <span style="opacity: 0.9; font-size: 0.95rem;">Calming formula for sensitive skin</span>
                            </div>
                        </div>

                        <div class="benefit-item" style="display: flex; align-items: start; margin-bottom: 20px; padding: 15px; background: rgba(255,255,255,0.1); border-radius: 15px; border-left: 4px solid #FFD700;">
                            <span style="color: #FFD700; font-size: 1.5rem; margin-right: 15px;">✓</span>
                            <div>
                                <strong style="display: block; font-size: 1.1rem; margin-bottom: 5px;">Deep Skin Hydration</strong>
                                <span style="opacity: 0.9; font-size: 0.95rem;">Restores your skin's natural moisture balance</span>
                            </div>
                        </div>

                        <div class="benefit-item" style="display: flex; align-items: start; margin-bottom: 20px; padding: 15px; background: rgba(255,255,255,0.1); border-radius: 15px; border-left: 4px solid #FFD700;">
                            <span style="color: #FFD700; font-size: 1.5rem; margin-right: 15px;">✓</span>
                            <div>
                                <strong style="display: block; font-size: 1.1rem; margin-bottom: 5px;">Dermatologist Approved</strong>
                                <span style="opacity: 0.9; font-size: 0.95rem;">Safe, professional-grade formula for all skin types</span>
                            </div>
                        </div>
                    </div>

                    <div class="product-cta" style="margin-top: 35px;">
                        <p style="font-size: 1.1rem; margin-bottom: 20px; font-weight: 600; color: #FFD700;">
                            🎉 Stay Tuned for the Launch!
                        </p>
                        <p style="font-size: 1rem; margin-bottom: 25px; opacity: 0.95; line-height: 1.6;">
                            Available soon at <strong style="color: #FFD700;">thegroomingbar.co.za</strong>
                        </p>
                        <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                            <a href="contact.php" class="btn" style="background: #FFD700; color: #1a4d3e; padding: 15px 35px; border-radius: 50px; font-weight: 700; text-decoration: none; display: inline-block; transition: all 0.3s ease; box-shadow: 0 5px 20px rgba(255,215,0,0.4);">
                                Get Notified
                            </a>
                            <a href="tel:0714893052" class="btn" style="background: transparent; color: white; padding: 15px 35px; border-radius: 50px; font-weight: 700; text-decoration: none; display: inline-block; border: 2px solid white; transition: all 0.3s ease;">
                                Call for Details
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header reveal">
                <h2>What Our Clients Say</h2>
            </div>
            <div class="testimonial-carousel reveal">
                <div class="testimonial-track">
                    <!-- Slide 1 -->
                    <div class="testimonial-slide">
                        <div class="testimonial-card">
                            <p>"TGB gave me the perfect haircut and my nails have never looked better. Highly recommend!"</p>
                            <div class="author">Jessica M. — Client</div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="testimonial-slide">
                        <div class="testimonial-card">
                            <p>"Professional team, friendly staff, and amazing salon experience. I love this place!"</p>
                            <div class="author">Lerato K. — Client</div>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="testimonial-slide">
                        <div class="testimonial-card">
                            <p>"The Grooming Barbershop (TGB) never disappoints. Haircuts, beard trims, and nail care all top-notch."</p>
                            <div class="author">Thabo N. — Client</div>
                        </div>
                    </div>
                    <!-- Duplicate for Loop -->
                    <div class="testimonial-slide">
                        <div class="testimonial-card">
                            <p>"TGB gave me the perfect haircut and my nails have never looked better. Highly recommend!"</p>
                            <div class="author">Jessica M. — Client</div>
                        </div>
                    </div>
                    <div class="testimonial-slide">
                        <div class="testimonial-card">
                            <p>"Professional team, friendly staff, and amazing salon experience. I love this place!"</p>
                            <div class="author">Lerato K. — Client</div>
                        </div>
                    </div>
                    <div class="testimonial-slide">
                        <div class="testimonial-card">
                            <p>"The Grooming Barbershop (TGB) never disappoints. Haircuts, beard trims, and nail care all top-notch."</p>
                            <div class="author">Thabo N. — Client</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'include/footer.php'; ?>

<!-- Custom JS -->
<script src="js/app.js"></script>
<script>
    lucide.createIcons();
</script>
</body>
</html>
