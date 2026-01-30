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
    <!-- Page Header -->
    <section class="hero"
        style="min-height: 60vh; background-image: url('image/colley.jpeg'); background-size: cover; background-position: center; position: relative;">
        <div class="hero-overlay-netflix"></div>
        <div class="container" style="position: relative; z-index: 3;">
            <div class="hero-content reveal">
                <h1><?php echo htmlspecialchars(getTextContent('about_hero_title', 'STYLE & CONFIDENCE.')); ?></h1>
                <p><?php echo htmlspecialchars(getTextContent('about_hero_desc', 'More than just a haircut. We provide an experience that leaves you feeling brand new.')); ?></p>
            </div>
        </div>
    </section>

    <!-- The TGB Story & Philosophy -->
    <section class="about-intro" style="padding: var(--space-xl) 0;">
        <div class="container">
            <div class="service-columns reveal" style="align-items: center;">
                <div class="service-column">
                    <h2><?php echo htmlspecialchars(getTextContent('about_story_title', 'Our Story')); ?></h2>
                    <p><?php echo htmlspecialchars(getTextContent('about_story_desc', 'The Grooming Barbershop (TGB) was established with a clear vision: to create a space where style, comfort, and professionalism meet. Founded in Vanderbijlpark, we set out to redefine the local grooming landscape by blending old-school craftsmanship with modern aesthetics.')); ?></p>
                    <p style="margin-top: 1rem;"><?php echo htmlspecialchars(getTextContent('about_story_desc_2', 'What began as a passion for the perfect finish has evolved into a premier destination for holistic grooming. We believe that our community deserves a space that feels like home, yet operates with the precision of a high-end studio. Every detail in our shop holds a story, and every client becomes part of the TGB legacy.')); ?></p>
                    
                    <h2 style="margin-top: 2.5rem;"><?php echo htmlspecialchars(getTextContent('about_philosophy_title', 'The TGB Philosophy')); ?></h2>
                    <p><?php echo htmlspecialchars(getTextContent('about_philosophy_desc', "At TGB, we understand that grooming is a vital form of self-care. It's not just about how you look in the mirror; it's about the confidence you carry when you walk out our doors. We see every session as an opportunity to help you reset and recharge.")); ?></p>
                    <p style="margin-top: 1rem;"><?php echo nl2br(htmlspecialchars(getTextContent('about_philosophy_desc_2', "Our approach is rooted in three pillars: **Precision** in our craft, **Presence** in our service, and **Passion** for our community. We don't just provide services; we cultivate confidence."))); ?></p>
                </div>
                <div class="service-column">
                    <div style="height: 800px; width: 100%; background: url('image/colley.jpeg') center/cover; border-radius: 10px; box-shadow: 20px 20px 0 var(--color-accent);"></div>
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