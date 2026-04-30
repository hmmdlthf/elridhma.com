<?php
$page_title = 'Contact Us';
$page_description = 'Get in touch with Elridhma. We\'d love to hear about your business and how we can help you grow online.';
include 'includes/header.php';
?>

<!-- Page Hero -->
<section style="padding:5rem 1.5rem 3rem;text-align:center;">
  <div class="max-w-screen">
    <div class="section-tag fade-up">Get In Touch</div>
    <h1 class="fade-up delay-1" style="font-size:clamp(2rem,4vw,3rem);margin:0.75rem 0 1rem;">Let's talk about your project</h1>
    <p class="fade-up delay-2" style="color:#71717A;max-width:480px;margin:0 auto;line-height:1.75;">Have a question or ready to get started? Send us a message and we'll get back within one business day.</p>
  </div>
</section>

<!-- Contact Section -->
<section style="padding:2rem 1.5rem 6rem;">
  <div class="max-w-screen">
    <div style="display:grid;grid-template-columns:1fr 1.5fr;gap:3rem;align-items:start;" class="contact-grid">

      <!-- Left: Info -->
      <div class="fade-up">
        <div style="display:flex;flex-direction:column;gap:1.5rem;margin-bottom:2rem;">
          <div style="display:flex;gap:1rem;align-items:flex-start;">
            <div class="feature-icon"><i class="fas fa-envelope"></i></div>
            <div>
              <div style="font-weight:600;margin-bottom:0.25rem;">Email</div>
              <a href="mailto:<?php echo COMPANY_EMAIL; ?>" style="color:#A1A1AA;font-size:0.9rem;transition:color 0.2s;" onmouseover="this.style.color='#8B5CF6'" onmouseout="this.style.color='#A1A1AA'"><?php echo COMPANY_EMAIL; ?></a>
            </div>
          </div>
          <div style="display:flex;gap:1rem;align-items:flex-start;">
            <div class="feature-icon cyan"><i class="fas fa-phone"></i></div>
            <div>
              <div style="font-weight:600;margin-bottom:0.25rem;">Phone</div>
              <a href="tel:<?php echo str_replace(' ','',COMPANY_PHONE); ?>" style="color:#A1A1AA;font-size:0.9rem;transition:color 0.2s;" onmouseover="this.style.color='#06B6D4'" onmouseout="this.style.color='#A1A1AA'"><?php echo COMPANY_PHONE; ?></a>
            </div>
          </div>
          <div style="display:flex;gap:1rem;align-items:flex-start;">
            <div class="feature-icon amber"><i class="fas fa-map-marker-alt"></i></div>
            <div>
              <div style="font-weight:600;margin-bottom:0.25rem;">Location</div>
              <span style="color:#A1A1AA;font-size:0.9rem;"><?php echo COMPANY_ADDRESS; ?></span>
            </div>
          </div>
          <div style="display:flex;gap:1rem;align-items:flex-start;">
            <div class="feature-icon"><i class="fas fa-clock"></i></div>
            <div>
              <div style="font-weight:600;margin-bottom:0.25rem;">Business Hours</div>
              <span style="color:#A1A1AA;font-size:0.9rem;">Monday – Friday, 9:00 AM – 6:00 PM</span>
            </div>
          </div>
        </div>

        <!-- WhatsApp CTA -->
        <a href="https://wa.me/<?php echo str_replace(['+', ' '], '', COMPANY_PHONE); ?>?text=Hi, I'd like to discuss a project"
           target="_blank" rel="noopener"
           style="display:flex;align-items:center;gap:0.75rem;background:#18181B;border:1px solid #27272A;border-radius:12px;padding:1rem 1.25rem;transition:border-color 0.2s;"
           onmouseover="this.style.borderColor='#25D366'" onmouseout="this.style.borderColor='#27272A'">
          <div style="width:40px;height:40px;border-radius:50%;background:#25D366;display:flex;align-items:center;justify-content:center;font-size:1.15rem;color:#fff;flex-shrink:0;">
            <i class="fab fa-whatsapp"></i>
          </div>
          <div>
            <div style="font-weight:600;font-size:0.9rem;">Chat on WhatsApp</div>
            <div style="font-size:0.8rem;color:#71717A;">Usually replies within an hour</div>
          </div>
        </a>
      </div>

      <!-- Right: Form -->
      <div class="brand-card fade-up delay-2" style="padding:2.5rem;">
        <h3 style="font-size:1.1rem;margin-bottom:1.5rem;">Send us a message</h3>
        <form action="api/contact-form.php" method="post" style="display:flex;flex-direction:column;gap:1.1rem;">
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
            <div>
              <label class="form-label" for="name">Your Name</label>
              <input type="text" name="name" id="name" class="form-input" placeholder="John Doe" required>
            </div>
            <div>
              <label class="form-label" for="email">Email Address</label>
              <input type="email" name="email" id="email" class="form-input" placeholder="you@example.com" required>
            </div>
          </div>
          <div>
            <label class="form-label" for="phone">Phone (optional)</label>
            <input type="tel" name="phone" id="phone" class="form-input" placeholder="+94 77 000 0000">
          </div>
          <div>
            <label class="form-label" for="message">Message</label>
            <textarea name="message" id="message" class="form-input" rows="5" placeholder="Tell us about your project..." required style="resize:vertical;"></textarea>
          </div>
          <button type="submit" class="btn-gradient" style="padding:0.8rem;font-size:0.95rem;width:100%;justify-content:center;">
            <i class="fas fa-paper-plane"></i> Send Message
          </button>
        </form>
      </div>

    </div>
  </div>
</section>

<style>@media(max-width:768px){.contact-grid{grid-template-columns:1fr!important;}}</style>

<?php include 'includes/footer.php'; ?>
