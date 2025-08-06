<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-36JM0KVJEX"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-36JM0KVJEX');
    </script>

    <!-- Clarity tracking code for https://uveriqo.co.uk -->
    <script>
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i+"?ref=bwt";
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "snf5e7r4oq");
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Professional websites for FREE - Sri Lankan businesses only pay domain cost + hosting. Get your website designed by Elridhma, Sri Lanka's trusted software company.">
    <meta name="keywords" content="free website Sri Lanka, web design Sri Lanka, affordable website, professional website free, Sri Lankan web designer">
    <meta name="author" content="Elridhma">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL; ?>">
    <meta property="og:title" content="<?php echo isset($page_title) ? $page_title . ' - ' . COMPANY_NAME : COMPANY_NAME . ' - Free Professional Websites for Sri Lankan Businesses'; ?>">
    <meta property="og:description" content="<?php echo isset($page_description) ? $page_description : 'Professional websites for FREE - Sri Lankan businesses only pay domain cost + hosting.'; ?>">
    <meta property="og:image" content="<?php echo SITE_URL; ?>/assets/images/logo/">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo SITE_URL; ?>">
    <meta property="twitter:title" content="<?php echo isset($page_title) ? $page_title . ' - ' . COMPANY_NAME : COMPANY_NAME . ' - Free Professional Websites for Sri Lankan Businesses'; ?>">
    <meta property="twitter:description" content="<?php echo isset($page_description) ? $page_description : 'Professional websites for FREE - Sri Lankan businesses only pay domain cost + hosting.'; ?>">
    <meta property="twitter:image" content="<?php echo SITE_URL; ?>/assets/images/logo/logo.png">

    <title><?php echo isset($page_title) ? $page_title . ' - ' . COMPANY_NAME : COMPANY_NAME . ' - Free Professional Websites for Sri Lankan Businesses'; ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/images/logo/favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/logo/logo.png">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">
    <?php if(isset($additional_css)): ?>
        <?php foreach($additional_css as $css): ?>
            <link href="<?php echo $css; ?>" rel="stylesheet">
        <?php endforeach; ?>
    <?php endif; ?>
    
    <!-- Schema.org markup for Local Business -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "<?php echo COMPANY_NAME; ?>",
        "description": "Professional web design services for LK businesses with free website offers",
        "url": "<?php echo SITE_URL; ?>",
        "telephone": "<?php echo COMPANY_PHONE; ?>",
        "email": "<?php echo COMPANY_EMAIL; ?>",
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "LK",
            "addressLocality": "Colombo"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "6.9271",
            "longitude": "79.8612"
        },
        "openingHours": "Mo-Fr 09:00-18:00",
        "priceRange": "£££",
        "serviceArea": {
            "@type": "Country",
            "name": "Sri Lanka"
        }
    }
    </script>
</head>
<body>
    <!-- Cookie Consent Banner -->
    <div id="cookie-consent" class="cookie-consent" style="display: none;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <p class="mb-0">We use cookies to enhance your experience and analyse our website traffic. By continuing to browse, you agree to our use of cookies. <a href="/privacy" class="text-white"><u>Learn more</u></a></p>
                </div>
                <div class="col-md-4 text-end">
                    <button class="btn btn-light btn-sm me-2" onclick="acceptCookies()">Accept All</button>
                    <button class="btn btn-outline-light btn-sm" onclick="rejectCookies()">Reject</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Navigation -->
    <header class="header-nav">
        <!-- Top Bar -->
        <div class="top-bar bg-primary text-white py-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <small>
                            <i class="fas fa-phone me-2"></i><?php echo COMPANY_PHONE; ?>
                            <span class="mx-3">|</span>
                            <i class="fas fa-envelope me-2"></i><?php echo COMPANY_EMAIL; ?>
                        </small>
                    </div>
                    <div class="col-md-6 text-end">
                        <small>
                            <strong>🎉 FREE Professional Website - Limited Time Offer!</strong>
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="/">
                    <img src="/assets/images/logo/logo.png" alt="<?php echo COMPANY_NAME; ?>" height="40">
                </a>

                <!-- Mobile Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'packages.php' ? 'active' : ''; ?>" href="/packages.php">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>" href="/about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], '/blog') !== false ? 'active' : ''; ?>" href="/blog">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>" href="/contact.php">Contact</a>
                        </li>
                    </ul>
                    
                    <!-- CTA Buttons -->
                    <div class="d-flex">
                        <a href="/free-website.php" class="btn" style="background: linear-gradient(90deg, #FFD600 0%, #7C3AED 100%); color: #fff; border: none; margin-right: 0.5rem;">
                            <i class="fas fa-gift me-1"></i>Get FREE Website
                        </a>
                        <a href="/contact.php" class="btn btn-outline-warning" style="border-color: #FFD600; color: #7C3AED;">
                            <i class="fas fa-phone me-1"></i>Call Now
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content Area -->
    <main>
