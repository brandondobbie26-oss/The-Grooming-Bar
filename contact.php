<?php include 'include/head.php'; ?>
<?php include 'include/header.php'; ?>

<main>
    <!-- Page Header -->
    <section class="hero" style="min-height: 50vh; background: #000;">
        <div class="container">
            <div class="hero-content reveal">
                <h1>GET IN TOUCH.</h1>
                <p>Ready to look your best? Book an appointment or visit us today.</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-details">
        <div class="container">
            <div class="contact-layout reveal">

                <!-- Contact Form -->
                <div class="contact-form">
                    <h2>Book Your Appointment</h2>
                    <form id="lead-form" action="appointment.php" method="POST" style="margin-top: var(--space-md);">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" placeholder="John Doe" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" placeholder="john@example.com" required>
                        </div>
                         <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="071 123 4567" required>
                        </div>
                        <div class="form-group">
                            <label for="service">Service Required</label>
                            <select id="service" name="service"
                                style="width: 100%; padding: 1rem; border: 1px solid var(--color-neutral); background: var(--color-neutral);">
                                <option value="haircut">Haircut / Fade</option>
                                <option value="beard">Beard Trim</option>
                                <option value="nails">Manicure / Pedicure</option>
                                <option value="salon">Salon Treatment</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message">Ideally Date & Time / Special Requests</label>
                            <textarea id="message" name="message" rows="5"
                                placeholder="I would like to book for Saturday at 10am..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Request Booking</button>
                    </form>
                </div>

                <!-- Sidebar Info -->
                <div class="contact-sidebar">
                    <div class="contact-info-card">
                        <h3>Visit Us</h3>
                        <p style="margin-bottom: 1rem;"><a href="tel:0714893052"
                                style="font-size: 1.5rem; font-family: var(--font-display);"><i data-lucide="phone"
                                    style="width: 20px;"></i> 071 489 3052</a></p>
                        <p><i data-lucide="mail" style="width: 16px;"></i> hello@thegroomingbar.com</p>

                        <h3 style="margin-top: var(--space-lg);">Opening Hours</h3>
                        <ul style="opacity: 0.8; font-size: 0.9rem;">
                            <li>Monday – Friday: 8:30 AM – 5:00 PM</li>
                            <li>Saturday: 8:30 AM – 3:00 PM</li>
                            <li>Sunday: Closed</li>
                        </ul>

                        <h3 style="margin-top: var(--space-lg);">Location</h3>
                        <p style="opacity: 0.8; font-size: 0.9rem;">No. 102 DF Malan Street<br>Vanderbijlpark<br>1911</p>
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