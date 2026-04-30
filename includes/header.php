<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-36JM0KVJEX"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-36JM0KVJEX');
    </script>

    <!-- Microsoft Clarity -->
    <script>
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i+"?ref=bwt";
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "snf5e7r4oq");
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo isset($page_description) ? htmlspecialchars($page_description) : 'Professional websites for FREE — Sri Lankan businesses pay only domain &amp; hosting. Trusted software company in Sri Lanka.'; ?>">
    <meta name="keywords" content="free website Sri Lanka, web design Sri Lanka, affordable website, professional website free, Sri Lankan software company">
    <meta name="author" content="Elridhma">
    <meta name="robots" content="index, follow">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL; ?>">
    <meta property="og:title" content="<?php echo isset($page_title) ? htmlspecialchars($page_title).' — '.COMPANY_NAME : COMPANY_NAME.' — Free Professional Websites for Sri Lankan Businesses'; ?>">
    <meta property="og:description" content="<?php echo isset($page_description) ? htmlspecialchars($page_description) : 'Professional websites for FREE — Sri Lankan businesses pay only domain &amp; hosting.'; ?>">
    <meta property="og:image" content="<?php echo SITE_URL; ?>/assets/images/logo/logo.png">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo SITE_URL; ?>">
    <meta name="twitter:title" content="<?php echo isset($page_title) ? htmlspecialchars($page_title).' — '.COMPANY_NAME : COMPANY_NAME.' — Free Websites for Sri Lankan Businesses'; ?>">
    <meta name="twitter:description" content="<?php echo isset($page_description) ? htmlspecialchars($page_description) : 'Free professional websites for Sri Lankan businesses.'; ?>">
    <meta name="twitter:image" content="<?php echo SITE_URL; ?>/assets/images/logo/logo.png">

    <title><?php echo isset($page_title) ? htmlspecialchars($page_title).' — '.COMPANY_NAME : COMPANY_NAME.' — Free Websites for Sri Lankan Businesses'; ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/images/logo/favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/logo/logo.png">
    <link rel="sitemap" type="application/xml" title="Sitemap" href="/sitemap.xml">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Tailwind CSS (Play CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              'bgbase':    '#09090B',
              'bgsurface': '#18181B',
              'bgelev':    '#27272A',
              'brand':     '#8B5CF6',
              'brandcyan': '#06B6D4',
              'brandamb':  '#F59E0B',
              'btext':     '#FAFAFA',
              'bmuted':    '#71717A',
            },
            fontFamily: { sans: ['Inter','system-ui','sans-serif'] },
          }
        }
      }
    </script>

    <!-- Custom Design System -->
    <link href="/assets/css/main.css?v=3.5" rel="stylesheet">

    <?php if(isset($additional_css)): foreach($additional_css as $css): ?>
        <link href="<?php echo htmlspecialchars($css); ?>" rel="stylesheet">
    <?php endforeach; endif; ?>

    <!-- Schema.org LocalBusiness -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "<?php echo COMPANY_NAME; ?>",
      "description": "Professional web design and software development for Sri Lankan businesses",
      "url": "<?php echo SITE_URL; ?>",
      "telephone": "<?php echo COMPANY_PHONE; ?>",
      "email": "<?php echo COMPANY_EMAIL; ?>",
      "address": { "@type": "PostalAddress", "addressCountry": "LK", "addressLocality": "Colombo" },
      "geo": { "@type": "GeoCoordinates", "latitude": "6.9271", "longitude": "79.8612" },
      "openingHours": "Mo-Fr 09:00-18:00",
      "serviceArea": { "@type": "Country", "name": "Sri Lanka" }
    }
    </script>
</head>
<body class="bg-bgbase text-btext font-sans antialiased">

<!-- Cookie Consent Banner -->
<div id="cookie-consent" class="cookie-consent">
  <div style="max-width:1200px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;gap:1rem;flex-wrap:wrap;">
    <p style="margin:0;color:#A1A1AA;font-size:0.875rem;">We use cookies to improve your experience. <a href="/privacy.php" style="color:#8B5CF6;text-decoration:underline;">Learn more</a></p>
    <div style="display:flex;gap:0.5rem;">
      <button onclick="acceptCookies()" class="btn-gradient btn-sm">Accept</button>
      <button onclick="rejectCookies()" class="btn-outline btn-sm">Reject</button>
    </div>
  </div>
</div>

<!-- Navigation -->
<nav class="site-nav">
  <div class="nav-inner">

    <!-- Logo -->
    <a href="/" style="display:flex;align-items:center;gap:0.5rem;">
      <img src="/assets/images/logo/logo.png" alt="<?php echo COMPANY_NAME; ?>" style="height:32px;">
    </a>

    <!-- Desktop Links -->
    <div class="nav-links">
      <a href="/"    class="nav-link <?php echo basename($_SERVER['PHP_SELF'])=='index.php'    ? 'active':''; ?>">Home</a>
      <a href="/packages" class="nav-link <?php echo basename($_SERVER['PHP_SELF'])=='packages.php' ? 'active':''; ?>">Packages</a>
      <a href="/portfolio"class="nav-link <?php echo basename($_SERVER['PHP_SELF'])=='portfolio.php'? 'active':''; ?>">Portfolio</a>
      <a href="/about"    class="nav-link <?php echo basename($_SERVER['PHP_SELF'])=='about.php'    ? 'active':''; ?>">About</a>
      <a href="/blog/"        class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'],'/blog')!==false ? 'active':''; ?>">Blog</a>
      <a href="/contact"  class="nav-link <?php echo basename($_SERVER['PHP_SELF'])=='contact.php'  ? 'active':''; ?>">Contact</a>
    </div>

    <!-- CTA + Hamburger -->
    <div class="nav-cta">
      <a href="/free-website" class="btn-gradient" style="padding:0.55rem 1.2rem;font-size:0.85rem;">
        <i class="fas fa-gift" style="margin-right:0.35rem;"></i>Free Website
      </a>
      <button class="hamburger" id="menuBtn" onclick="toggleMobileNav()" aria-label="Open menu">
        <i class="fas fa-bars"></i>
      </button>
    </div>

  </div>

  <!-- Mobile Menu -->
  <div id="mobileNav" class="mobile-nav">
    <a href="/"    class="nav-link">Home</a>
    <a href="/packages" class="nav-link">Packages</a>
    <a href="/portfolio"class="nav-link">Portfolio</a>
    <a href="/about"    class="nav-link">About</a>
    <a href="/blog/"        class="nav-link">Blog</a>
    <a href="/contact"  class="nav-link">Contact</a>
    <a href="/free-website" class="btn-gradient" style="text-align:center;margin-top:0.5rem;padding:0.65rem 1.4rem;font-size:0.9rem;">
      <i class="fas fa-gift" style="margin-right:0.4rem;"></i>Get Free Website
    </a>
  </div>
</nav>

<main>
