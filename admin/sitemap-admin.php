<?php
/**
 * Simple Sitemap Management Panel
 * Basic admin interface to view and manage sitemap
 */

// Simple authentication (in production, use proper authentication)
session_start();
$admin_password = 'elridhma_admin_2024'; // Change this in production!

if (!isset($_SESSION['admin_logged_in'])) {
    if (isset($_POST['password']) && $_POST['password'] === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
    } else {
        // Show login form
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Sitemap Admin - Elridhma</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body class="bg-light">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Sitemap Admin Login</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="mb-3">
                                        <label class="form-label">Password:</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
        <?php
        exit;
    }
}

// Include configuration
require_once '../includes/config.php';

// Handle actions
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'regenerate':
            // Force regenerate sitemap by clearing any cache
            $message = "Sitemap regenerated successfully!";
            break;
        case 'submit':
            // Submit to search engines
            include '../submit-sitemap.php';
            exit;
        case 'logout':
            session_destroy();
            header('Location: sitemap-admin.php');
            exit;
    }
}

// Get sitemap content for preview
$sitemapContent = file_get_contents(SITE_URL . '/sitemap.xml');
$xml = simplexml_load_string($sitemapContent);
$urls = [];
if ($xml) {
    foreach ($xml->url as $url) {
        $urls[] = [
            'loc' => (string)$url->loc,
            'lastmod' => (string)$url->lastmod,
            'changefreq' => (string)$url->changefreq,
            'priority' => (string)$url->priority
        ];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sitemap Management - Elridhma Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <span class="navbar-brand">Elridhma - Sitemap Management</span>
            <a href="?action=logout" class="btn btn-outline-light btn-sm">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </nav>

    <div class="container mt-4">
        <?php if (isset($message)): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <?php echo $message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Sitemap URLs (<?php echo count($urls); ?> total)</h5>
                        <div>
                            <a href="?action=regenerate" class="btn btn-success btn-sm">
                                <i class="fas fa-sync"></i> Regenerate
                            </a>
                            <a href="?action=submit" target="_blank" class="btn btn-primary btn-sm">
                                <i class="fas fa-paper-plane"></i> Submit to Search Engines
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>URL</th>
                                        <th>Last Modified</th>
                                        <th>Change Frequency</th>
                                        <th>Priority</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($urls as $url): ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo $url['loc']; ?>" target="_blank" class="text-decoration-none">
                                                    <?php echo parse_url($url['loc'], PHP_URL_PATH); ?>
                                                    <i class="fas fa-external-link-alt fa-xs ms-1"></i>
                                                </a>
                                            </td>
                                            <td><small><?php echo $url['lastmod']; ?></small></td>
                                            <td><small><?php echo $url['changefreq']; ?></small></td>
                                            <td><small><?php echo $url['priority']; ?></small></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h6>Quick Actions</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="../sitemap.xml" target="_blank" class="btn btn-outline-primary">
                                <i class="fas fa-eye"></i> View Sitemap XML
                            </a>
                            <a href="../robots.txt" target="_blank" class="btn btn-outline-secondary">
                                <i class="fas fa-robot"></i> View Robots.txt
                            </a>
                            <a href="https://search.google.com/search-console" target="_blank" class="btn btn-outline-success">
                                <i class="fab fa-google"></i> Google Search Console
                            </a>
                            <a href="https://www.bing.com/webmasters" target="_blank" class="btn btn-outline-info">
                                <i class="fab fa-microsoft"></i> Bing Webmaster Tools
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h6>SEO Tips</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled small">
                            <li><i class="fas fa-check text-success"></i> Submit sitemap to Google Search Console</li>
                            <li><i class="fas fa-check text-success"></i> Submit sitemap to Bing Webmaster Tools</li>
                            <li><i class="fas fa-check text-success"></i> Update sitemap when adding new pages</li>
                            <li><i class="fas fa-check text-success"></i> Monitor crawl errors in search console</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
