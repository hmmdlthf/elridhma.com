<?php include 'includes/header.php'; ?>

<!-- Contact Section -->
<section class="contact-section py-5">
  <div class="container">
    <h1 class="text-center mb-5" style="color:#7C3AED;">Contact Elridhma</h1>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="api/contact-form.php" method="post" class="bg-light p-4 rounded shadow">
          <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone (optional)</label>
            <input type="text" name="phone" id="phone" class="form-control">
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
          </div>
          <button type="submit" class="btn btn-lg" style="background:#FFD600; color:#7C3AED;">Send Message</button>
        </form>
        <div class="mt-4 text-center">
          <p><strong>Email:</strong> hello@elridhma.com</p>
          <p><strong>Phone:</strong> +94 77 300 9373</p>
          <p><strong>Address:</strong> Mavenella, Sri Lanka</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
