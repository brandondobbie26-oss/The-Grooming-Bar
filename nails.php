<?php include 'include/head.php'; ?>
<?php include 'include/header.php'; ?>

<main>
    <!-- Page Header -->
    <section class="hero" style="min-height: 12vh; background: #000;">
        <div class="container">
            <div class="hero-content reveal">
                <h1>NAIL CARE & ARTISTRY.</h1>
                <p>Luxurious manicures, pedicures, and custom nail art designed to express your unique style.</p>
            </div>
        </div>
    </section>

    <!-- Detailed Service -->
    <section style="padding: var(--space-xl) 0 0 0;">
        <div class="container">
            <div class="service-columns reveal">
                <div class="service-column">
                    <div class="image-placeholder"
                        style="background: url('image/nails.jpeg') center/cover; box-shadow: 20px 20px 0 var(--color-accent); margin-bottom: 2rem; height: 500px;">
                    </div>
                    <div class="icon-box"><i data-lucide="sparkles"></i></div>
                    <h2>Polished to Perfection</h2>
                    <p>Your hands and feet deserve the best care. At TGB, our certified nail technicians combine hygiene, precision, and creativity to deliver stunning results. Whether you want a simple cleanup or extravagant art, we have you covered.</p>
                </div>
                <div class="service-column">
                    <h3>Our Nail Services</h3>
                    <ul class="detail-list">
                        <li><i data-lucide="check"></i> Classic & Gel Manicures</li>
                        <li><i data-lucide="check"></i> Spa Pedicures</li>
                        <li><i data-lucide="check"></i> Acrylic & Hard Gel Extensions</li>
                        <li><i data-lucide="check"></i> Custom Nail Art & Design</li>
                        <li><i data-lucide="check"></i> Nail Repair & Strengthening</li>
                        <li><i data-lucide="check"></i> Paraffin Wax Treatments</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Modern Feature Showcase (Bento Grid) -->
    <section class="bento-showcase" style="background: var(--color-neutral);">
        <div class="container">
            <div class="section-header reveal" style="text-align: center; margin-bottom: 3rem;">
                <span style="color: var(--color-accent); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.85rem;">Style Guide</span>
                <h2 style="margin-top: 0.5rem;">Shape & Style Guide</h2>
                <p>Explore different nail shapes and styles to find your perfect match before you commit.</p>
            </div>
            <div class="bento-grid reveal">
                <!-- Almond -->
                <div class="bento-card image-card bento-lg">
                    <div class="card-bg" style="background: url('image/nail.jpeg') center/cover;"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <h3>Almond Shape</h3>
                        <p>[ ELEGANT ] A timeless choice for a sophisticated and feminine look.</p>
                    </div>
                </div>

                <!-- Square -->
                <div class="bento-card">
                    <div class="card-content">
                        <div class="card-icon"><i data-lucide="square"></i></div>
                        <h3>Square Shape</h3>
                        <p>[ CLASSIC ] Clean lines for a strong and professional appearance.</p>
                    </div>
                </div>

                <!-- Stiletto -->
                <div class="bento-card image-card bento-tall">
                    <div class="card-bg" style="background: url('image/nail2.jpeg') center/cover;"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <h3>Stiletto Shape</h3>
                        <p>[ FIERCE ] Bold and edgy for those who want to make a statement.</p>
                    </div>
                </div>

                <!-- Coffin -->
                <div class="bento-card accent-card">
                    <div class="card-content">
                        <div class="card-icon"><i data-lucide="gem"></i></div>
                        <h3>Coffin Shape</h3>
                        <p>[ TRENDY ] The ultimate modern shape for long, stylish nails.</p>
                    </div>
                </div>

                <!-- Acrylic -->
                <div class="bento-card image-card bento-lg">
                    <div class="card-bg">
                        <video autoplay muted loop playsinline>
                            <source src="videos/nail-video.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <h3>Premium Acrylics</h3>
                        <p>[ DURABLE ] Long-lasting strength combined with exquisite art.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    <!-- Lightbox Modal -->
    <div id="lightbox" class="lightbox-modal" onclick="closeLightbox(event)">
        <div class="lightbox-frame">
            <button class="close-lightbox" onclick="closeLightbox(event)">
                <i data-lucide="x" style="width: 32px; height: 32px;"></i>
            </button>
            <div class="lightbox-inner-black"></div>
            <div style="margin-top: 1.5rem; text-align: center;">
                <h3 style="margin-bottom: 0.5rem; color: var(--color-primary);">Nail Design</h3>
                <p style="font-size: 0.9rem; opacity: 0.7; color: var(--color-text);">Exquisite detail and durable finish.</p>
            </div>
        </div>
    </div>

    <!-- Final CTA -->
    <section style="background: var(--color-accent); color: white; text-align: center; padding: var(--space-lg) 0;">
        <div class="container">
            <h2 style="color: white; margin-bottom: var(--space-md);">Ready for a New Look?</h2>
            <a href="contact.php" class="btn btn-primary" style="background: var(--color-primary);">Book Nail Session</a>
        </div>
    </section>
</main>

<?php include 'include/footer.php'; ?>

<!-- Custom JS -->
<script src="js/app.js"></script>
<script>
    lucide.createIcons();

    function openLightbox() {
        const lb = document.getElementById('lightbox');
        lb.style.display = 'flex';
        setTimeout(() => {
            lb.classList.add('active');
        }, 10);
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox(e) {
        if (e.target.id === 'lightbox' || e.target.closest('.close-lightbox')) {
            const lb = document.getElementById('lightbox');
            lb.classList.remove('active');
            setTimeout(() => {
                lb.style.display = 'none';
                document.body.style.overflow = 'auto';
            }, 300);
        }
    }

    }
</script>
</body>
</html>