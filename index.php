
<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="hero-section text-center py-5" style="background: linear-gradient(90deg, #FFD600 0%, #7C3AED 100%); color: #fff;">
  <div class="container">
    <h1 class="display-3 fw-bold mb-3">Get Your Professional Website <span style="color:#FFD600;">FREE</span></h1>
    <p class="lead mb-4">Sri Lanka's trusted software company. Pay only for domain & hosting. Limited time offer!</p>
    <a href="free-website.php" class="btn btn-lg" style="background:#7C3AED; color:#fff;">Get Started Now</a>
    <div class="mt-4">
      <img src="assets/images/logo/elridhma-logo.svg" alt="Elridhma Logo" height="60">
    </div>
  </div>
</section>

<!-- Package Showcase -->
<!-- <section class="package-showcase py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-5" style="color:#7C3AED;">Our Packages</h2>
    <div class="row justify-content-center">
      <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <img src="assets/images/packages/free-icon.svg" alt="Free" height="40" class="mb-3">
            <h3 class="card-title">FREE Starter</h3>
            <p class="card-text">5-page website, mobile responsive, basic SEO, contact form</p>
            <div class="mb-2"><strong>LKR 0</strong></div>
            <a href="free-website.php" class="btn btn-warning">Get Free Website</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <img src="assets/images/packages/standard-icon.svg" alt="Standard" height="40" class="mb-3">
            <h3 class="card-title">Standard</h3>
            <p class="card-text">10 pages, custom design, advanced SEO, analytics</p>
            <div class="mb-2"><strong>LKR 299</strong></div>
            <a href="packages.php" class="btn btn-outline-warning">See Details</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <img src="assets/images/packages/pro-icon.svg" alt="Pro" height="40" class="mb-3">
            <h3 class="card-title">Pro</h3>
            <p class="card-text">Unlimited pages, e-commerce, CRM integration</p>
            <div class="mb-2"><strong>LKR 599</strong></div>
            <a href="packages.php" class="btn btn-outline-warning">See Details</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <img src="assets/images/packages/enterprise-icon.svg" alt="Enterprise" height="40" class="mb-3">
            <h3 class="card-title">Enterprise</h3>
            <p class="card-text">Custom development, API integration, dedicated support</p>
            <div class="mb-2"><strong>LKR 1200</strong></div>
            <a href="packages.php" class="btn btn-outline-warning">See Details</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

<!-- Portfolio Section -->
<!-- <section class="portfolio-section py-5">
  <div class="container">
    <h2 class="text-center mb-5" style="color:#FFD600;">Sri Lankan Success Stories</h2>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h4 class="card-title">Selyn Handlooms (Kandy)</h4>
            <p class="card-text">E-commerce add-on, 200% online order increase</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h4 class="card-title">Smile Care Dental (Colombo)</h4>
            <p class="card-text">Booking system, 60% fewer phone calls</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h4 class="card-title">Curry Leaf (Galle)</h4>
            <p class="card-text">Online ordering, saved LKR 50,000/month</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

<!-- Contact Section -->
<section class="contact-section py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-4" style="color:#7C3AED;">Contact Us</h2>
    <form action="contact.php" method="post" class="row g-3 justify-content-center">
      <div class="col-md-5">
        <input type="text" name="name" class="form-control mb-3" placeholder="Your Name" required>
      </div>
      <div class="col-md-5">
        <input type="email" name="email" class="form-control mb-3" placeholder="Your Email" required>
      </div>
      <div class="col-10">
        <textarea name="message" class="form-control mb-3" rows="4" placeholder="Your Message" required></textarea>
      </div>
      <div class="col-10 text-center">
        <button type="submit" class="btn btn-lg" style="background:#FFD600; color:#7C3AED;">Send Message</button>
      </div>
    </form>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
