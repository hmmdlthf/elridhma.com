</main>

<!-- Footer -->
<footer class="site-footer">
  <div class="max-w-screen" style="padding-top:3.5rem;padding-bottom:3.5rem;">
    <div style="display:grid;grid-template-columns:2fr 1fr 1fr 1.5fr;gap:3rem;" class="footer-grid">

      <!-- Brand column -->
      <div>
        <a href="/">
          <img src="/assets/images/logo/logo.png" alt="<?php echo COMPANY_NAME; ?>" style="height:30px;margin-bottom:1rem;filter:brightness(0) invert(1);opacity:0.85;">
        </a>
        <p style="font-size:0.875rem;color:#71717A;line-height:1.7;max-width:260px;margin-bottom:1.25rem;">
          Professional web design &amp; software development for Sri Lankan businesses — websites from LKR 0.
        </p>
        <div style="display:flex;gap:0.5rem;">
          <a href="https://facebook.com/elridhma"  class="social-link" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="https://instagram.com/elridhma" class="social-link" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="https://linkedin.com/company/elridhma" class="social-link" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>

      <!-- Services -->
      <div>
        <p style="font-size:0.75rem;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:#52525B;margin-bottom:1rem;">Services</p>
        <a href="/free-website" class="footer-link">Free Website</a>
        <a href="/packages"     class="footer-link">Packages</a>
        <a href="/portfolio"    class="footer-link">Portfolio</a>
        <a href="/get-started"  class="footer-link">Get Started</a>
      </div>

      <!-- Company -->
      <div>
        <p style="font-size:0.75rem;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:#52525B;margin-bottom:1rem;">Company</p>
        <a href="/about"   class="footer-link">About Us</a>
        <a href="/blog/"       class="footer-link">Blog</a>
        <a href="/contact" class="footer-link">Contact</a>
        <a href="/terms"   class="footer-link">Terms</a>
        <a href="/privacy" class="footer-link">Privacy</a>
      </div>

      <!-- Contact Info -->
      <div>
        <p style="font-size:0.75rem;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:#52525B;margin-bottom:1rem;">Contact</p>
        <div style="display:flex;flex-direction:column;gap:0.6rem;">
          <div style="display:flex;align-items:flex-start;gap:0.6rem;">
            <i class="fas fa-map-marker-alt" style="color:#8B5CF6;margin-top:3px;font-size:0.85rem;"></i>
            <span style="font-size:0.875rem;color:#71717A;"><?php echo COMPANY_ADDRESS; ?></span>
          </div>
          <div style="display:flex;align-items:center;gap:0.6rem;">
            <i class="fas fa-phone" style="color:#8B5CF6;font-size:0.85rem;"></i>
            <a href="tel:<?php echo str_replace(' ','',COMPANY_PHONE); ?>" style="font-size:0.875rem;color:#71717A;transition:color 0.2s;" onmouseover="this.style.color='#FAFAFA'" onmouseout="this.style.color='#71717A'"><?php echo COMPANY_PHONE; ?></a>
          </div>
          <div style="display:flex;align-items:center;gap:0.6rem;">
            <i class="fas fa-envelope" style="color:#8B5CF6;font-size:0.85rem;"></i>
            <a href="mailto:<?php echo COMPANY_EMAIL; ?>" style="font-size:0.875rem;color:#71717A;transition:color 0.2s;" onmouseover="this.style.color='#FAFAFA'" onmouseout="this.style.color='#71717A'"><?php echo COMPANY_EMAIL; ?></a>
          </div>
          <div style="display:flex;align-items:center;gap:0.6rem;">
            <i class="fas fa-clock" style="color:#8B5CF6;font-size:0.85rem;"></i>
            <span style="font-size:0.875rem;color:#71717A;">Mon–Fri 9:00 AM – 6:00 PM</span>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Bottom bar -->
  <div style="border-top:1px solid #27272A;padding:1.25rem 1.5rem;">
    <div style="max-width:1200px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:0.75rem;">
      <p style="margin:0;font-size:0.8rem;color:#52525B;">&copy; <?php echo date('Y'); ?> <?php echo COMPANY_NAME; ?>. All rights reserved.</p>
      <div style="display:flex;gap:1.25rem;">
        <a href="/terms"   style="font-size:0.8rem;color:#52525B;transition:color 0.2s;" onmouseover="this.style.color='#71717A'" onmouseout="this.style.color='#52525B'">Terms</a>
        <a href="/privacy" style="font-size:0.8rem;color:#52525B;transition:color 0.2s;" onmouseover="this.style.color='#71717A'" onmouseout="this.style.color='#52525B'">Privacy</a>
      </div>
    </div>
  </div>
</footer>

<style>
@media (max-width: 768px) {
  .footer-grid { grid-template-columns: 1fr 1fr !important; }
}
@media (max-width: 480px) {
  .footer-grid { grid-template-columns: 1fr !important; }
}
</style>

<!-- WhatsApp Float -->
<a href="https://wa.me/<?php echo str_replace(['+', ' '], '', COMPANY_PHONE); ?>?text=Hi, I'm interested in your FREE website offer!"
   target="_blank" rel="noopener" class="whatsapp-float" aria-label="Chat on WhatsApp">
  <i class="fab fa-whatsapp"></i>
</a>

<!-- Cookie Consent JS -->
<script>
if (!localStorage.getItem('cookiesAccepted')) {
  document.getElementById('cookie-consent').style.display = 'block';
}
function acceptCookies() {
  localStorage.setItem('cookiesAccepted', 'true');
  document.getElementById('cookie-consent').style.display = 'none';
  if (typeof gtag !== 'undefined') gtag('consent', 'update', { analytics_storage: 'granted' });
}
function rejectCookies() {
  localStorage.setItem('cookiesAccepted', 'false');
  document.getElementById('cookie-consent').style.display = 'none';
  if (typeof gtag !== 'undefined') gtag('consent', 'update', { analytics_storage: 'denied' });
}
</script>

<!-- Mobile Nav JS -->
<script>
function toggleMobileNav() {
  var nav = document.getElementById('mobileNav');
  var btn = document.getElementById('menuBtn');
  nav.classList.toggle('open');
  btn.innerHTML = nav.classList.contains('open')
    ? '<i class="fas fa-times"></i>'
    : '<i class="fas fa-bars"></i>';
}
document.addEventListener('click', function(e) {
  var nav = document.getElementById('mobileNav');
  var btn = document.getElementById('menuBtn');
  if (nav && btn && !nav.contains(e.target) && !btn.contains(e.target)) {
    nav.classList.remove('open');
    btn.innerHTML = '<i class="fas fa-bars"></i>';
  }
});
</script>

<!-- Scroll animation observer -->
<script src="/assets/js/animations.js"></script>

<?php if(isset($additional_js)): foreach($additional_js as $js): ?>
  <script src="<?php echo htmlspecialchars($js); ?>"></script>
<?php endforeach; endif; ?>

</body>
</html>
