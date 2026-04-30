<?php
$page_title = 'Pricing & Packages';
$page_description = 'Compare Elridhma pricing packages — Free Starter, Standard, Pro, and Enterprise. Affordable web design for Sri Lankan businesses.';
include 'includes/header.php';
?>

<!-- Page Hero -->
<section style="padding:5rem 1.5rem 3rem;text-align:center;">
  <div class="max-w-screen">
    <div class="section-tag fade-up">Pricing</div>
    <h1 class="fade-up delay-1" style="font-size:clamp(2rem,4vw,3rem);margin:0.75rem 0 1rem;">Simple, transparent pricing</h1>
    <p class="fade-up delay-2" style="color:#71717A;max-width:500px;margin:0 auto;line-height:1.7;">Start free. Upgrade only when your business is ready. No long-term contracts.</p>
  </div>
</section>

<!-- Pricing Cards -->
<section style="padding:2rem 1.5rem 6rem;">
  <div class="max-w-screen">
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1.25rem;align-items:start;" class="pkg-grid">

      <!-- FREE -->
      <div class="pricing-card fade-up">
        <div style="font-size:0.72rem;font-weight:700;letter-spacing:0.07em;text-transform:uppercase;color:#71717A;margin-bottom:0.7rem;">FREE Starter</div>
        <div style="font-size:2.2rem;font-weight:800;margin-bottom:0.2rem;">LKR 0</div>
        <p style="font-size:0.82rem;color:#71717A;margin-bottom:1.5rem;line-height:1.5;">Pay only domain &amp; hosting. Design is free.</p>
        <div style="border-top:1px solid #27272A;padding-top:1.1rem;margin-bottom:1.5rem;">
          <div class="check-item"><i class="fas fa-check check-icon"></i>5 pages</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Template-based design</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Mobile responsive</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Basic SEO</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Contact form</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Email support</div>
          <div class="check-item"><i class="fas fa-times cross-icon"></i>Custom design</div>
          <div class="check-item"><i class="fas fa-times cross-icon"></i>E-commerce</div>
          <div class="check-item"><i class="fas fa-times cross-icon"></i>CRM / APIs</div>
        </div>
        <a href="/get-started?package=free" class="btn-outline" style="width:100%;justify-content:center;">Get Started Free</a>
      </div>

      <!-- Standard -->
      <div class="pricing-card fade-up delay-1">
        <div style="font-size:0.72rem;font-weight:700;letter-spacing:0.07em;text-transform:uppercase;color:#71717A;margin-bottom:0.7rem;">Standard</div>
        <div style="display:flex;align-items:baseline;gap:0.3rem;margin-bottom:0.2rem;">
          <span style="font-size:2.2rem;font-weight:800;">LKR 7,900</span>
          <span style="font-size:0.8rem;color:#71717A;">/mo</span>
        </div>
        <div style="font-size:0.75rem;color:#52525B;margin-bottom:0.3rem;">≈ $26/mo</div>
        <p style="font-size:0.82rem;color:#71717A;margin-bottom:1.5rem;line-height:1.5;">Ideal for growing businesses wanting a unique brand.</p>
        <div style="border-top:1px solid #27272A;padding-top:1.1rem;margin-bottom:1.5rem;">
          <div class="check-item"><i class="fas fa-check check-icon"></i>10 pages</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Custom design</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Mobile responsive</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Advanced SEO</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Analytics setup</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Email + Chat support</div>
          <div class="check-item"><i class="fas fa-times cross-icon"></i>E-commerce</div>
          <div class="check-item"><i class="fas fa-times cross-icon"></i>CRM / APIs</div>
        </div>
        <a href="/get-started?package=standard" class="btn-outline" style="width:100%;justify-content:center;">Choose Standard</a>
      </div>

      <!-- Pro (featured) -->
      <div class="pricing-card featured fade-up delay-2" style="padding-top:2.5rem;">
        <div class="pricing-badge">Most Popular</div>
        <div style="font-size:0.72rem;font-weight:700;letter-spacing:0.07em;text-transform:uppercase;color:#8B5CF6;margin-bottom:0.7rem;">Pro</div>
        <div style="display:flex;align-items:baseline;gap:0.3rem;margin-bottom:0.2rem;">
          <span style="font-size:2.2rem;font-weight:800;">LKR 17,900</span>
          <span style="font-size:0.8rem;color:#71717A;">/mo</span>
        </div>
        <div style="font-size:0.75rem;color:#52525B;margin-bottom:0.3rem;">≈ $60/mo</div>
        <p style="font-size:0.82rem;color:#71717A;margin-bottom:1.5rem;line-height:1.5;">Everything you need to sell online and automate operations.</p>
        <div style="border-top:1px solid #3F3F46;padding-top:1.1rem;margin-bottom:1.5rem;">
          <div class="check-item"><i class="fas fa-check check-icon"></i>Unlimited pages</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Custom design</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Advanced SEO + Analytics</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>E-commerce</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>CRM integration</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Booking system</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Priority support</div>
          <div class="check-item"><i class="fas fa-times cross-icon"></i>Custom APIs</div>
        </div>
        <a href="/get-started?package=pro" class="btn-gradient" style="width:100%;justify-content:center;">Get Pro</a>
      </div>

      <!-- Enterprise -->
      <div class="pricing-card fade-up delay-3">
        <div style="font-size:0.72rem;font-weight:700;letter-spacing:0.07em;text-transform:uppercase;color:#71717A;margin-bottom:0.7rem;">Enterprise</div>
        <div style="font-size:2.2rem;font-weight:800;margin-bottom:0.2rem;">Custom</div>
        <p style="font-size:0.82rem;color:#71717A;margin-bottom:1.5rem;line-height:1.5;">Fully custom software for complex business needs.</p>
        <div style="border-top:1px solid #27272A;padding-top:1.1rem;margin-bottom:1.5rem;">
          <div class="check-item"><i class="fas fa-check check-icon"></i>Unlimited pages</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Fully custom development</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Enterprise SEO</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Custom APIs</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Advanced integrations</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>Dedicated account manager</div>
          <div class="check-item"><i class="fas fa-check check-icon"></i>SLA &amp; on-site support</div>
        </div>
        <a href="/contact" class="btn-outline" style="width:100%;justify-content:center;">Contact Us</a>
      </div>

    </div>
    <p class="fade-up" style="text-align:center;font-size:0.8rem;color:#52525B;margin-top:2rem;">All prices in Sri Lankan Rupees. Domain and hosting costs are separate.</p>
  </div>
</section>

<style>@media(max-width:1024px){.pkg-grid{grid-template-columns:repeat(2,1fr)!important;}}
@media(max-width:640px){.pkg-grid{grid-template-columns:1fr!important;}.pricing-card.featured{transform:none!important;}}</style>

<!-- CTA -->
<section class="cta-banner" style="padding:5rem 1.5rem;text-align:center;">
  <div class="max-w-screen" style="max-width:580px;">
    <h2 class="fade-up" style="font-size:clamp(1.5rem,3vw,2.2rem);margin-bottom:1rem;">Not sure which plan to pick?</h2>
    <p class="fade-up delay-1" style="color:#71717A;margin-bottom:1.75rem;">Talk to our team — we'll recommend the right fit for your business and budget.</p>
    <a href="/contact" class="btn-gradient fade-up delay-2" style="padding:0.85rem 2rem;font-size:0.95rem;">Talk to Our Team</a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
