<?php
$page_title = 'Get Started — Apply for Free Website';
$page_description = 'Apply for your free professional website. Tell us about your business and we\'ll get started right away.';
include 'includes/header.php';
?>

<!-- Page Intro -->
<section style="padding:5rem 1.5rem 2rem;text-align:center;">
  <div class="max-w-screen">
    <div class="section-tag fade-up">Apply Now</div>
    <h1 class="fade-up delay-1" style="font-size:clamp(2rem,4vw,3rem);margin:0.75rem 0 1rem;">Get your free website</h1>
    <p class="fade-up delay-2" style="color:#71717A;max-width:480px;margin:0 auto;line-height:1.75;">Tell us about your business and design preferences. We'll take it from there.</p>
  </div>
</section>

<!-- Wizard -->
<section style="padding:2rem 1.5rem 6rem;">
  <div class="max-w-screen" style="max-width:760px;">

    <!-- Progress track -->
    <div class="wizard-track" id="wizardTrack" style="margin-bottom:2.5rem;">
      <div class="wizard-line"><div class="wizard-fill" id="wizardFill" style="width:0%;"></div></div>
      <div class="wizard-step active" data-step="1"><div class="wizard-dot">1</div><div class="wizard-label">Business</div></div>
      <div class="wizard-step"        data-step="2"><div class="wizard-dot">2</div><div class="wizard-label">Package</div></div>
      <div class="wizard-step"        data-step="3"><div class="wizard-dot">3</div><div class="wizard-label">Design</div></div>
      <div class="wizard-step"        data-step="4"><div class="wizard-dot">4</div><div class="wizard-label">Content</div></div>
      <div class="wizard-step"        data-step="5"><div class="wizard-dot">5</div><div class="wizard-label">Domain</div></div>
    </div>

    <!-- Form card -->
    <div class="brand-card" style="padding:2.5rem;">
      <form action="api/package-inquiry.php" method="post" id="wizardForm">

        <!-- Step 1: Business Info -->
        <div class="wizard-panel active" id="panel1">
          <h3 style="font-size:1.15rem;margin-bottom:0.35rem;">Business Information</h3>
          <p style="font-size:0.875rem;color:#71717A;margin-bottom:1.75rem;">Tell us about your business so we can tailor your website.</p>
          <div style="display:flex;flex-direction:column;gap:1.1rem;">
            <div><label class="form-label">Business Name *</label><input type="text" name="business_name" class="form-input" placeholder="e.g. Selyn Textiles" required></div>
            <div><label class="form-label">Industry *</label><input type="text" name="industry" class="form-input" placeholder="e.g. Retail, Healthcare, Restaurant..." required></div>
            <div><label class="form-label">Current Website (if any)</label><input type="url" name="current_website" class="form-input" placeholder="https://yoursite.lk"></div>
          </div>
        </div>

        <!-- Step 2: Package -->
        <div class="wizard-panel" id="panel2">
          <h3 style="font-size:1.15rem;margin-bottom:0.35rem;">Package Selection</h3>
          <p style="font-size:0.875rem;color:#71717A;margin-bottom:1.75rem;">Which package suits your needs best?</p>
          <div style="display:flex;flex-direction:column;gap:0.75rem;">
            <label style="display:flex;align-items:flex-start;gap:1rem;background:#09090B;border:1px solid #27272A;border-radius:12px;padding:1.1rem;cursor:pointer;transition:border-color 0.2s;" onmouseover="this.style.borderColor='#8B5CF6'" onmouseout="this.style.borderColor='#27272A'">
              <input type="radio" name="package" value="free" checked style="margin-top:3px;accent-color:#8B5CF6;">
              <div><div style="font-weight:600;">FREE Starter <span style="font-size:0.75rem;font-weight:500;color:#8B5CF6;background:rgba(139,92,246,0.12);padding:2px 8px;border-radius:50px;margin-left:0.3rem;">Recommended</span></div><div style="font-size:0.82rem;color:#71717A;margin-top:0.2rem;">5 pages · Template design · Basic SEO · Contact form</div></div>
            </label>
            <label style="display:flex;align-items:flex-start;gap:1rem;background:#09090B;border:1px solid #27272A;border-radius:12px;padding:1.1rem;cursor:pointer;transition:border-color 0.2s;" onmouseover="this.style.borderColor='#8B5CF6'" onmouseout="this.style.borderColor='#27272A'">
              <input type="radio" name="package" value="standard" style="margin-top:3px;accent-color:#8B5CF6;">
              <div><div style="font-weight:600;">Standard — LKR 299/mo</div><div style="font-size:0.82rem;color:#71717A;margin-top:0.2rem;">10 pages · Custom design · Advanced SEO · Analytics</div></div>
            </label>
            <label style="display:flex;align-items:flex-start;gap:1rem;background:#09090B;border:1px solid #27272A;border-radius:12px;padding:1.1rem;cursor:pointer;transition:border-color 0.2s;" onmouseover="this.style.borderColor='#8B5CF6'" onmouseout="this.style.borderColor='#27272A'">
              <input type="radio" name="package" value="pro" style="margin-top:3px;accent-color:#8B5CF6;">
              <div><div style="font-weight:600;">Pro — LKR 599/mo</div><div style="font-size:0.82rem;color:#71717A;margin-top:0.2rem;">Unlimited pages · E-commerce · CRM integration · Priority support</div></div>
            </label>
            <label style="display:flex;align-items:flex-start;gap:1rem;background:#09090B;border:1px solid #27272A;border-radius:12px;padding:1.1rem;cursor:pointer;transition:border-color 0.2s;" onmouseover="this.style.borderColor='#8B5CF6'" onmouseout="this.style.borderColor='#27272A'">
              <input type="radio" name="package" value="enterprise" style="margin-top:3px;accent-color:#8B5CF6;">
              <div><div style="font-weight:600;">Enterprise — Custom pricing</div><div style="font-size:0.82rem;color:#71717A;margin-top:0.2rem;">Custom software · APIs · Dedicated support · SLA</div></div>
            </label>
          </div>
        </div>

        <!-- Step 3: Design -->
        <div class="wizard-panel" id="panel3">
          <h3 style="font-size:1.15rem;margin-bottom:0.35rem;">Design Preferences</h3>
          <p style="font-size:0.875rem;color:#71717A;margin-bottom:1.75rem;">Help us understand the look and feel you're going for.</p>
          <div style="display:flex;flex-direction:column;gap:1.1rem;">
            <div><label class="form-label">Preferred Colours</label><input type="text" name="color_scheme" class="form-input" placeholder="e.g. blue and white, warm earth tones..."></div>
            <div><label class="form-label">Style</label><select name="style" class="form-input"><option value="modern">Modern &amp; Minimalist</option><option value="bold">Bold &amp; Colourful</option><option value="elegant">Elegant &amp; Professional</option><option value="friendly">Friendly &amp; Approachable</option><option value="other">Other</option></select></div>
            <div><label class="form-label">Inspiration Websites (optional)</label><input type="text" name="inspiration_sites" class="form-input" placeholder="Websites you like the look of"></div>
          </div>
        </div>

        <!-- Step 4: Content -->
        <div class="wizard-panel" id="panel4">
          <h3 style="font-size:1.15rem;margin-bottom:0.35rem;">Business Content</h3>
          <p style="font-size:0.875rem;color:#71717A;margin-bottom:1.75rem;">We need this to write your website copy and set up the contact details.</p>
          <div style="display:flex;flex-direction:column;gap:1.1rem;">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
              <div><label class="form-label">Phone / WhatsApp *</label><input type="tel" name="contact_details" class="form-input" placeholder="+94 77 000 0000" required></div>
              <div><label class="form-label">Business Address *</label><input type="text" name="address" class="form-input" placeholder="Street, City, Sri Lanka" required></div>
            </div>
            <div><label class="form-label">About Your Business *</label><textarea name="business_text" class="form-input" rows="4" placeholder="What do you do? Who are your customers? What makes you different?" required style="resize:vertical;"></textarea></div>
          </div>
        </div>

        <!-- Step 5: Domain & Hosting -->
        <div class="wizard-panel" id="panel5">
          <h3 style="font-size:1.15rem;margin-bottom:0.35rem;">Domain &amp; Hosting</h3>
          <p style="font-size:0.875rem;color:#71717A;margin-bottom:1.75rem;">The only cost in the free plan is your domain and hosting.</p>
          <div style="display:flex;flex-direction:column;gap:1.1rem;">
            <div><label class="form-label">Preferred Domain Name *</label><input type="text" name="domain" class="form-input" placeholder="e.g. yourbusiness.lk or yourbusiness.com" required></div>
            <div><label class="form-label">Hosting Plan</label>
              <select name="hosting" class="form-input">
                <option value="basic">Basic Hosting — LKR 2,500/year (recommended for most)</option>
                <option value="premium">Premium Hosting — LKR 5,000/year (for high-traffic sites)</option>
              </select>
            </div>
            <div style="background:#09090B;border:1px solid #27272A;border-radius:12px;padding:1.1rem;">
              <p style="font-size:0.85rem;color:#71717A;line-height:1.7;margin:0;"><i class="fas fa-info-circle" style="color:#8B5CF6;margin-right:0.4rem;"></i>Domain and hosting prices are paid directly to the registrar/host. Elridhma charges nothing for design or development.</p>
            </div>
          </div>
        </div>

        <!-- Navigation buttons -->
        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:2rem;padding-top:1.5rem;border-top:1px solid #27272A;">
          <button type="button" id="prevBtn" onclick="changeStep(-1)" class="btn-outline" style="padding:0.65rem 1.5rem;" disabled>
            <i class="fas fa-arrow-left"></i> Back
          </button>
          <span id="stepLabel" style="font-size:0.82rem;color:#71717A;">Step 1 of 5</span>
          <button type="button" id="nextBtn" onclick="changeStep(1)" class="btn-gradient" style="padding:0.65rem 1.5rem;">
            Next <i class="fas fa-arrow-right"></i>
          </button>
        </div>

      </form>
    </div>
  </div>
</section>

<script>
var currentStep = 1;
var totalSteps  = 5;

function changeStep(dir) {
  var panels = document.querySelectorAll('.wizard-panel');
  var steps  = document.querySelectorAll('.wizard-step');

  // Validate current step inputs
  if (dir === 1) {
    var current = document.getElementById('panel' + currentStep);
    var required = current.querySelectorAll('[required]');
    for (var i = 0; i < required.length; i++) {
      if (!required[i].value.trim()) {
        required[i].focus();
        required[i].style.borderColor = '#EF4444';
        required[i].style.boxShadow   = '0 0 0 3px rgba(239,68,68,0.15)';
        return;
      }
      required[i].style.borderColor = '#27272A';
      required[i].style.boxShadow   = '';
    }
  }

  var nextStep = currentStep + dir;
  if (nextStep < 1 || nextStep > totalSteps) return;

  // Hide current, show next
  document.getElementById('panel' + currentStep).classList.remove('active');
  document.getElementById('panel' + nextStep).classList.add('active');

  // Update step indicators
  steps[currentStep - 1].classList.remove('active');
  if (dir === 1) steps[currentStep - 1].classList.add('done');
  else           steps[currentStep - 1].classList.remove('done');
  steps[nextStep - 1].classList.add('active');

  currentStep = nextStep;

  // Update progress fill
  var pct = ((currentStep - 1) / (totalSteps - 1)) * 100;
  document.getElementById('wizardFill').style.width = pct + '%';

  // Update buttons
  document.getElementById('prevBtn').disabled = (currentStep === 1);
  document.getElementById('stepLabel').textContent = 'Step ' + currentStep + ' of ' + totalSteps;

  if (currentStep === totalSteps) {
    document.getElementById('nextBtn').textContent = '';
    document.getElementById('nextBtn').innerHTML = '<i class="fas fa-paper-plane"></i> Submit';
    document.getElementById('nextBtn').setAttribute('type', 'submit');
    document.getElementById('nextBtn').setAttribute('onclick', '');
    document.getElementById('nextBtn').removeAttribute('type');
    document.getElementById('nextBtn').type = 'submit';
    document.getElementById('nextBtn').form = 'wizardForm';
  } else {
    document.getElementById('nextBtn').innerHTML = 'Next <i class="fas fa-arrow-right"></i>';
    document.getElementById('nextBtn').type = 'button';
    document.getElementById('nextBtn').setAttribute('onclick', 'changeStep(1)');
  }
}
</script>

<?php include 'includes/footer.php'; ?>
