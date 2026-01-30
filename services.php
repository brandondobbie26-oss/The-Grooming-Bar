<?php include 'include/head.php'; ?>
<?php include 'include/header.php'; ?>

<main>
    <!-- Page Header -->
    <section class="hero"
        style="min-height: 50vh; background-image: url('image/fade1.jpeg'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="hero-content reveal">
                <h1>OUR SERVICES.</h1>
                <p>From precision fades to luxury manicures, we offer a full range of grooming services designed to make you look and feel your best.</p>
            </div>
        </div>
    </section>

    <!-- detailed services start -->
    <section class="services-detail" style="padding: var(--space-xl) 0;">
        <div class="container">

            <!-- Barber Section -->
            <div id="barber" class="service-columns reveal">
                <div class="service-column">
                    <div class="image-placeholder" style="height: 300px; background: url('image/fade2.jpeg') center/cover; margin-bottom: 2rem;"></div>
                    <div class="icon-box"><i data-lucide="scissors"></i></div>
                    <h2>Barbering & Haircuts</h2>
                    <p>Our barbers are masters of their craft. Whether you want a classic gentleman's cut, a skin fade, or a hot towel shave, we deliver precision and style every time.</p>
                </div>
                <div class="service-column">
                    <h3>Barber Services</h3>
                    <ul class="detail-list">
                        <li><i data-lucide="check-circle"></i> Classic Haircuts & Styling</li>
                        <li><i data-lucide="check-circle"></i> Skin Fades & Tapers</li>
                        <li><i data-lucide="check-circle"></i> Beard Trims & Sculpting</li>
                        <li><i data-lucide="check-circle"></i> Hot Towel Shaves</li>
                        <li><i data-lucide="check-circle"></i> Hair Design & Art</li>
                        <li><i data-lucide="check-circle"></i> Kids' Cuts</li>
                    </ul>
                </div>
            </div>

            <hr style="margin: var(--space-xl) 0; border: 0; border-top: 2px solid var(--color-neutral);">

            <!-- Nails Section -->
            <div id="nails" class="service-columns reveal">
                <div class="service-column">
                    <div class="image-placeholder" style="height: 300px; background: url('image/nails.jpeg') center/cover; margin-bottom: 2rem;"></div>
                    <div class="icon-box"><i data-lucide="sparkles"></i></div>
                    <h2>Nail Bar</h2>
                    <p>Relax and unwind while we take care of your hands and feet. Our nail technicians use high-quality products to ensure long-lasting, beautiful results.</p>
                </div>
                <div class="service-column">
                    <h3>Nail Services</h3>
                    <ul class="detail-list">
                        <li><i data-lucide="check-circle"></i> Manicures & Pedicures</li>
                        <li><i data-lucide="check-circle"></i> Gel Polish & Removal</li>
                        <li><i data-lucide="check-circle"></i> Acrylic Stamps & Overlays</li>
                        <li><i data-lucide="check-circle"></i> Nail Art & Embellishments</li>
                        <li><i data-lucide="check-circle"></i> Paraffin Wax Treatments</li>
                        <li><i data-lucide="check-circle"></i> Hand & Foot Massage</li>
                    </ul>
                </div>
            </div>

            <hr style="margin: var(--space-xl) 0; border: 0; border-top: 2px solid var(--color-neutral);">

             <!-- Salon Section -->
             <div id="salon" class="service-columns reveal">
                <div class="service-column">
                    <div class="image-placeholder" style="height: 300px; background: url('image/colley.jpeg') center/cover; margin-bottom: 2rem;"></div>
                    <div class="icon-box"><i data-lucide="wind"></i></div>
                    <h2>Beauty Salon</h2>
                    <p>Enhance your natural beauty with our salon services. From hair treatments to facial grooming, we start where the barber leaves off.</p>
                </div>
                <div class="service-column">
                    <h3>Salon Services</h3>
                    <ul class="detail-list">
                        <li><i data-lucide="check-circle"></i> Hair Washing & Treatments</li>
                        <li><i data-lucide="check-circle"></i> Dreadlocks & Braids</li>
                        <li><i data-lucide="check-circle"></i> Eyebrow Tinting & Shaping</li>
                        <li><i data-lucide="check-circle"></i> Facial Waxing</li>
                        <li><i data-lucide="check-circle"></i> Scalp Treatments</li>
                    </ul>
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