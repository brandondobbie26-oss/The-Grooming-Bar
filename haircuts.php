<?php include 'include/head.php'; ?>
<?php include 'include/header.php'; ?>

<main>
    <!-- Page Header -->
    <section class="hero"
        style="min-height: 12vh; background-image: url('image/fade1.jpeg'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="hero-content reveal">
                <h1>BARBERING & HAIRCUTS.</h1>
                <p>Masterfully crafted styles and precision cuts tailored to your unique look.</p>
            </div>
        </div>
    </section>

    <!-- Detailed Service -->
    <section style="padding: var(--space-xl) 0;">
        <div class="container">
            <div class="service-columns reveal">
                <div class="service-column">
                    <div class="image-placeholder" style="height: 400px; background: url('image/fade2.jpeg') center/cover; margin-bottom: 2rem; box-shadow: 20px 20px 0 var(--color-accent);"></div>
                    <div class="icon-box"><i data-lucide="scissors"></i></div>
                    <h2>Precision & Style</h2>
                    <p>Our barbers are masters of their craft. Whether you want a classic gentleman's cut, a skin fade, or a modern crop, we deliver precision and style every time. We believe a great haircut is the foundation of confidence.</p>
                </div>
                <div class="service-column">
                    <h3>Our Barber Services</h3>
                    <ul class="detail-list">
                        <li><i data-lucide="check-circle"></i> Classic Haircuts & Styling</li>
                        <li><i data-lucide="check-circle"></i> Skin Fades & Tapers</li>
                        <li><i data-lucide="check-circle"></i> Scissor Cuts</li>
                        <li><i data-lucide="check-circle"></i> Hair Design & Art</li>
                        <li><i data-lucide="check-circle"></i> Kids' Cuts</li>
                        <li><i data-lucide="check-circle"></i> Neck Cleanups</li>
                    </ul>

                    <div style="margin-top: 3rem;">
                        <h3>Why Choose Our Barbering?</h3>
                        <p>We combine traditional techniques with modern trends to ensure you always walk out looking your absolute best. Every session includes a consultation to understand your style and hair type.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section style="background: var(--color-accent); color: white; text-align: center; padding: var(--space-lg) 0;">
        <div class="container">
            <h2 style="color: white; margin-bottom: var(--space-md);">Ready for a New Look?</h2>
            <a href="contact.php" class="btn btn-primary" style="background: var(--color-primary);">Book Your Appointment</a>
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
