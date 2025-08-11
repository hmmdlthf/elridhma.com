<?php
/**
 * Dynamic XML Sitemap Generator for Elridhma
 * Generates sitemap for all pages and blog posts
 */

// Set content type to XML
header('Content-Type: application/xml; charset=utf-8');

// Get current domain
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$domain = $protocol . '://' . $_SERVER['HTTP_HOST'];

// Get current date for lastmod
$currentDate = date('Y-m-d');

// Static pages with their priorities and change frequencies
$staticPages = [
    '/' => ['priority' => '1.0', 'changefreq' => 'weekly', 'lastmod' => $currentDate],
    '/packages' => ['priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => $currentDate],
    '/free-website' => ['priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => $currentDate],
    '/get-started' => ['priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => $currentDate],
    '/portfolio' => ['priority' => '0.8', 'changefreq' => 'weekly', 'lastmod' => $currentDate],
    '/about' => ['priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => $currentDate],
    '/contact' => ['priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => $currentDate],
    '/blog' => ['priority' => '0.8', 'changefreq' => 'daily', 'lastmod' => $currentDate],
    '/terms' => ['priority' => '0.3', 'changefreq' => 'yearly', 'lastmod' => $currentDate],
    '/privacy' => ['priority' => '0.3', 'changefreq' => 'yearly', 'lastmod' => $currentDate],
];

// Function to get blog posts
function getBlogPosts() {
    $blogPosts = [];
    $postsDir = __DIR__ . '/blog/posts/';
    
    if (is_dir($postsDir)) {
        $files = glob($postsDir . '*.md');
        
        foreach ($files as $file) {
            $filename = basename($file, '.md');
            $content = file_get_contents($file);
            
            // Extract front matter
            if (preg_match('/^---\s*\n(.*?)\n---\s*\n/s', $content, $matches)) {
                $frontMatter = $matches[1];
                $date = null;
                
                // Extract date
                if (preg_match('/^date:\s*(.+)$/m', $frontMatter, $dateMatch)) {
                    $date = trim($dateMatch[1]);
                }
                
                $blogPosts[] = [
                    'url' => '/blog/post?slug=' . $filename,
                    'lastmod' => $date ? date('Y-m-d', strtotime($date)) : date('Y-m-d'),
                    'priority' => '0.6',
                    'changefreq' => 'monthly'
                ];
            }
        }
    }
    
    // Sort by date (newest first)
    usort($blogPosts, function($a, $b) {
        return strtotime($b['lastmod']) - strtotime($a['lastmod']);
    });
    
    return $blogPosts;
}

// Start XML output
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// Add static pages
foreach ($staticPages as $url => $data) {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($domain . $url) . "</loc>\n";
    echo "    <lastmod>" . htmlspecialchars($data['lastmod']) . "</lastmod>\n";
    echo "    <changefreq>" . htmlspecialchars($data['changefreq']) . "</changefreq>\n";
    echo "    <priority>" . htmlspecialchars($data['priority']) . "</priority>\n";
    echo "  </url>\n";
}

// Add blog posts
$blogPosts = getBlogPosts();
foreach ($blogPosts as $post) {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($domain . $post['url']) . "</loc>\n";
    echo "    <lastmod>" . htmlspecialchars($post['lastmod']) . "</lastmod>\n";
    echo "    <changefreq>" . htmlspecialchars($post['changefreq']) . "</changefreq>\n";
    echo "    <priority>" . htmlspecialchars($post['priority']) . "</priority>\n";
    echo "  </url>\n";
}

echo "</urlset>\n";
?>
