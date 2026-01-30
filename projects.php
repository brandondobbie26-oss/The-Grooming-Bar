<?php include 'include/head.php'; ?>
<?php include 'include/header.php'; ?>

<main>
    <!-- Page Header -->
    <section class="hero"
        style="min-height: 50vh; background-image: url('image/braidscut.jpeg'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="hero-content reveal">
                <h1>OUR WORK.</h1>
                <p>A showcase of style, precision, and happy clients.</p>
            </div>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="projects">
        <div class="container">
            <div class="section-header reveal">
                <h2>Gallery</h2>
                <p>Browse through our latest haircuts, nail designs, and salon transformations.</p>
            </div>

            <div class="gallery-grid">
                <div class="gallery-item reveal">
                    <img src="image/tgb_shop.jpg" alt="The Grooming Bar Shop Vibe">
                    <div class="gallery-overlay">
                        <span>Shop Floor</span>
                        <h3>Our Team in Action</h3>
                    </div>
                </div>
                <div class="gallery-item reveal">
                    <img src="image/tgb_fade.jpg" alt="Precision Kid's Fade">
                    <div class="gallery-overlay">
                        <span>Barber</span>
                        <h3>Precision Kid's Fade</h3>
                    </div>
                </div>
                <div class="gallery-item reveal">
                    <img src="image/tgb_client.jpg" alt="Client Selfie After Fade">
                    <div class="gallery-overlay">
                        <span>Happy Client</span>
                        <h3>Look & Feel Your Best</h3>
                    </div>
                </div>
                <div class="gallery-item reveal">
                    <img src="image/kid.jpeg" alt="Kids Cut">
                    <div class="gallery-overlay">
                        <span>Kids</span>
                        <h3>Fresh Look</h3>
                    </div>
                </div>
                <div class="gallery-item reveal">
                    <img src="image/fade3.jpeg" alt="Hair Design">
                    <div class="gallery-overlay">
                        <span>Barber</span>
                        <h3>Creative Design</h3>
                    </div>
                </div>
                <div class="gallery-item reveal">
                    <video autoplay muted loop playsinline style="width: 100%; height: 100%; object-fit: cover;">
                        <source src="videos/nail-video.mp4" type="video/mp4">
                    </video>
                    <div class="gallery-overlay">
                        <span>Nails</span>
                        <h3>Premium Artistry</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section
        style="background: var(--color-primary); color: white; padding: var(--space-xl) 0; overflow: hidden; position: relative;">
        <div class="container" style="position: relative; z-index: 2;">
            <div class="reveal" style="text-align: center;">
                <h2 style="color: white; font-size: 3rem; margin-bottom: var(--space-md);">LIKE WHAT YOU SEE?
                </h2>
                <p style="margin-bottom: var(--space-md);">Book your appointment today and let us work our magic.</p>
                <a href="contact.php" class="btn btn-primary" style="background: var(--color-accent);">Book Now</a>
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