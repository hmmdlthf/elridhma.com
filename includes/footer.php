    </main>

    <!-- Footer -->
    <footer class="footer" style="background: linear-gradient(90deg, #FFD600 0%, #7C3AED 100%); color: #fff;">
        <!-- Main Footer Content -->
        <div class="container py-5">
            <div class="row">
                <!-- Company Info -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <img src="/assets/images/logo/logo.png" alt="<?php echo COMPANY_NAME; ?>" height="40" class="mb-3">
                    <p class="mb-3">Professional web design services for Sri Lankan businesses. Get your website designed for FREE – you only pay for domain and hosting.</p>
                    <div class="social-links">
                        <a href="https://facebook.com/elridhma" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://instagram.com/elridhma" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="https://linkedin.com/company/elridhma" class="text-white me-3"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-uppercase mb-3">Services</h6>
                    <ul class="list-unstyled">
                        <li><a href="/free-website.php" class="text-light text-decoration-none">Free Website</a></li>
                        <li><a href="/packages.php" class="text-light text-decoration-none">Packages</a></li>
                        <li><a href="/portfolio.php" class="text-light text-decoration-none">Portfolio</a></li>
                        <li><a href="/get-started.php" class="text-light text-decoration-none">Get Started</a></li>
                    </ul>
                </div>

                <!-- Company Links -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-uppercase mb-3">Company</h6>
                    <ul class="list-unstyled">
                        <li><a href="/about.php" class="text-light text-decoration-none">About Us</a></li>
                        <li><a href="/contact.php" class="text-light text-decoration-none">Contact</a></li>
                        <li><a href="/terms.php" class="text-light text-decoration-none">Terms</a></li>
                        <li><a href="/privacy.php" class="text-light text-decoration-none">Privacy</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h6 class="text-uppercase mb-3">Contact Info</h6>
                    <div class="contact-info">
                        <p class="mb-2">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <?php echo COMPANY_ADDRESS; ?>
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-phone me-2"></i>
                            <a href="tel:<?php echo str_replace(' ', '', COMPANY_PHONE); ?>" class="text-light text-decoration-none"><?php echo COMPANY_PHONE; ?></a>
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-envelope me-2"></i>
                            <a href="mailto:<?php echo COMPANY_EMAIL; ?>" class="text-light text-decoration-none"><?php echo COMPANY_EMAIL; ?></a>
                        </p>
                        <p class="mb-0">
                            <i class="fas fa-clock me-2"></i>
                            Mon - Fri: 9:00 AM - 6:00 PM GMT
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter Signup -->
        <div class="container-fluid bg-primary py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-0">Get Free Web Design Tips & Updates</h5>
                        <small>Join 1,000+ UK business owners getting our weekly newsletter</small>
                    </div>
                    <div class="col-md-6">
                        <form class="newsletter-form d-flex">
                            <input type="email" class="form-control me-2" placeholder="Enter your email address" required>
                            <button type="submit" class="btn btn-light">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="container-fluid bg-secondary py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-0">&copy; <?php echo date('Y'); ?> <?php echo COMPANY_NAME; ?>. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <small class="text-muted">
                            Registered in North West/England
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float Button -->
    <div class="whatsapp-float">
        <a href="https://wa.me/442012345678?text=Hi, I'm interested in your FREE website offer!" target="_blank" class="btn btn-success rounded-circle p-3">
            <i class="fab fa-whatsapp fa-lg"></i>
        </a>
    </div>

    <!-- Back to Top Button -->
    <!-- <button class="back-to-top" id="backToTop">
        <i class="fas fa-chevron-up"></i>
    </button> -->

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <?php if(isset($additional_js)): ?>
        <?php foreach($additional_js as $js): ?>
            <script src="<?php echo $js; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Cookie Consent Script -->
    <script>
        // Check if cookies are accepted
        if (!localStorage.getItem('cookiesAccepted')) {
            document.getElementById('cookie-consent').style.display = 'block';
        }

        function acceptCookies() {
            localStorage.setItem('cookiesAccepted', 'true');
            document.getElementById('cookie-consent').style.display = 'none';
            // Enable tracking
            gtag('consent', 'update', {
                'analytics_storage': 'granted'
            });
        }

        function rejectCookies() {
            localStorage.setItem('cookiesAccepted', 'false');
            document.getElementById('cookie-consent').style.display = 'none';
            // Disable tracking
            gtag('consent', 'update', {
                'analytics_storage': 'denied'
            });
        }
    </script>

    <!-- Live Chat Integration (Placeholder) -->
    <script>
        // Implement your preferred live chat solution here
        // Examples: Tawk.to, Intercom, Crisp, etc.
    </script>
</body>
</html>
