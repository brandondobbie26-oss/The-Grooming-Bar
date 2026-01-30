<?php include 'include/head.php'; ?>
<?php include 'include/header.php'; ?>

<main>
    <!-- Page Header -->
    <section class="hero"
        style="min-height: 12vh; background-image: url('image/fade1.jpeg'); background-size: cover; background-position: center; filter: grayscale(0.5);">
        <div class="container">
            <div class="hero-content reveal">
                <h1>BEARD GROOMING.</h1>
                <p>Sculpted precisely, groomed to perfection. The ultimate treatment for your facial hair.</p>
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
                    <h2>The Art of the Beard</h2>
                    <p>A well-groomed beard is a statement. Our specialists use premium oils, precise trimming techniques, and traditional hot towel treatments to ensure your beard looks sharp and feels healthy.</p>
                </div>
                <div class="service-column">
                    <h3>Beard Services</h3>
                    <ul class="detail-list">
                        <li><i data-lucide="check-circle"></i> Beard Trimming & Shaping</li>
                        <li><i data-lucide="check-circle"></i> Hot Towel Shave</li>
                        <li><i data-lucide="check-circle"></i> Beard Oil Treatment</li>
                        <li><i data-lucide="check-circle"></i> Straight Razor Line-up</li>
                        <li><i data-lucide="check-circle"></i> Mustache Grooming</li>
                        <li><i data-lucide="check-circle"></i> Skin Consultation</li>
                    </ul>

                    <div style="margin-top: 3rem;">
                        <h3>Why Local Beard Care?</h3>
                        <p>Environmental factors can take a toll on your facial hair. We provide treatments that not only style but also protect and nourish your skin and hair follicles.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section style="background: var(--color-accent); color: white; text-align: center; padding: var(--space-lg) 0;">
        <div class="container">
            <h2 style="color: white; margin-bottom: var(--space-md);">Ready for a Sharp Look?</h2>
            <a href="contact.php" class="btn btn-primary" style="background: var(--color-primary);">Book Beard Session</a>
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
