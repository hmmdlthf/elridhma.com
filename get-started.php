<?php include 'includes/header.php'; ?>

<!-- Onboarding Wizard -->
<section class="onboarding-wizard py-5" style="background: linear-gradient(90deg, #FFD600 0%, #7C3AED 100%); color: #fff;">
  <div class="container">
    <h1 class="text-center mb-5">Get Started With Your FREE Website</h1>
    <form action="api/package-inquiry.php" method="post" class="row g-4 justify-content-center bg-white p-4 rounded shadow" style="color:#222;">
      <!-- Step 1: Business Information -->
      <div class="col-12">
        <h4 class="mb-3" style="color:#7C3AED;">1. Business Information</h4>
      </div>
      <div class="col-md-6">
        <input type="text" name="business_name" class="form-control mb-3" placeholder="Business Name" required>
      </div>
      <div class="col-md-6">
        <input type="text" name="industry" class="form-control mb-3" placeholder="Industry" required>
      </div>
      <div class="col-md-6">
        <input type="text" name="current_website" class="form-control mb-3" placeholder="Current Website (if any)">
      </div>
      <!-- Step 2: Package Selection -->
      <div class="col-12">
        <h4 class="mb-3" style="color:#7C3AED;">2. Package Selection</h4>
      </div>
      <div class="col-md-6">
        <select name="package" class="form-select mb-3" required>
          <option value="free">FREE Starter</option>
          <option value="standard">Standard</option>
          <option value="pro">Pro</option>
          <option value="enterprise">Enterprise</option>
        </select>
      </div>
      <!-- Step 3: Design Preferences -->
      <div class="col-12">
        <h4 class="mb-3" style="color:#7C3AED;">3. Design Preferences</h4>
      </div>
      <div class="col-md-6">
        <input type="text" name="color_scheme" class="form-control mb-3" placeholder="Preferred Colors (e.g. yellow, purple)">
      </div>
      <div class="col-md-6">
        <input type="text" name="style" class="form-control mb-3" placeholder="Style (e.g. modern, classic)">
      </div>
      <div class="col-12">
        <input type="text" name="inspiration_sites" class="form-control mb-3" placeholder="Inspiration Sites (optional)">
      </div>
      <!-- Step 4: Content Collection -->
      <div class="col-12">
        <h4 class="mb-3" style="color:#7C3AED;">4. Content Collection</h4>
      </div>
      <div class="col-md-6">
        <input type="text" name="contact_details" class="form-control mb-3" placeholder="Contact Details (phone, email)" required>
      </div>
      <div class="col-md-6">
        <input type="text" name="address" class="form-control mb-3" placeholder="Business Address" required>
      </div>
      <div class="col-12">
        <textarea name="business_text" class="form-control mb-3" rows="3" placeholder="Business Description, About, Services" required></textarea>
      </div>
      <!-- Step 5: Domain & Hosting -->
      <div class="col-12">
        <h4 class="mb-3" style="color:#7C3AED;">5. Domain & Hosting</h4>
      </div>
      <div class="col-md-6">
        <input type="text" name="domain" class="form-control mb-3" placeholder="Preferred Domain (.com/.lk)" required>
      </div>
      <div class="col-md-6">
        <select name="hosting" class="form-select mb-3" required>
          <option value="basic">Basic Hosting</option>
          <option value="premium">Premium Hosting</option>
        </select>
      </div>
      <div class="col-12 text-center">
        <button type="submit" class="btn btn-lg" style="background:#FFD600; color:#7C3AED;">Submit & Get Started</button>
      </div>
    </form>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
