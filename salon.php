<?php include 'include/head.php'; ?>
<?php include 'include/header.php'; ?>

<main>
    <!-- Page Header -->
    <section class="hero"
        style="min-height: 12vh; background-image: url('image/colley.jpeg'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="hero-content reveal">
                <h1>BEAUTY & SALON SERVICES.</h1>
                <p>Enhance your natural beauty with our specialized salon treatments.</p>
            </div>
        </div>
    </section>

    <!-- Detailed Service -->
    <section style="padding: var(--space-xl) 0;">
        <div class="container">
            <div class="service-columns reveal">
                <div class="service-column">
                    <div class="image-placeholder" style="height: 650px; background: url('image/colley.jpeg') center/cover; margin-bottom: 2rem; box-shadow: 20px 20px 0 var(--color-accent);"></div>
                    <div class="icon-box"><i data-lucide="sparkles"></i></div>
                    <h2>Elevate Your Look</h2>
                    <p>At our Salon, we offer more than just styling. We provide a range of beauty services from hair washing and treatments to facial grooming, ensuring you feel refreshed and revitalized.</p>
                </div>
                <div class="service-column">
                    <h3>Salon Services</h3>
                    <ul class="detail-list">
                        <li><i data-lucide="check-circle"></i> Hair Washing & Blow Dry</li>
                        <li><i data-lucide="check-circle"></i> Deep Conditioning Treatments</li>
                        <li><i data-lucide="check-circle"></i> Dreadlocks & Braids</li>
                        <li><i data-lucide="check-circle"></i> Eyebrow Design & Tinting</li>
                        <li><i data-lucide="check-circle"></i> Facial Waxing</li>
                        <li><i data-lucide="check-circle"></i> Scalp Nourishment Sessions</li>
                    </ul>

                    <div style="margin-top: 3rem;">
                        <h3>Professional Care</h3>
                        <p>Our experienced stylists use high-end products to ensure the best care for your hair and skin. We tailor every treatment to your specific needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section style="background: var(--color-accent); color: white; text-align: center; padding: var(--space-lg) 0;">
        <div class="container">
            <h2 style="color: white; margin-bottom: var(--space-md);">Ready for a Glow Up?</h2>
            <a href="contact.php" class="btn btn-primary" style="background: var(--color-primary);">Book Salon Session</a>
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
