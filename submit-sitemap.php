<?php
/**
 * Sitemap Submission Script for Elridhma
 * This script helps submit the sitemap to major search engines
 */

// Include configuration
require_once 'includes/config.php';

// Function to ping search engines
function submitSitemap($sitemapUrl) {
    $searchEngines = [
        'Google' => 'https://www.google.com/ping?sitemap=' . urlencode($sitemapUrl),
        'Bing' => 'https://www.bing.com/ping?sitemap=' . urlencode($sitemapUrl),
        'Yahoo' => 'https://search.yahooapis.com/SiteExplorerService/V1/ping?sitemap=' . urlencode($sitemapUrl),
    ];
    
    $results = [];
    
    foreach ($searchEngines as $engine => $pingUrl) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $pingUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Elridhma Sitemap Submitter 1.0');
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        $results[$engine] = [
            'status' => $httpCode,
            'success' => ($httpCode >= 200 && $httpCode < 300),
            'response' => $response
        ];
    }
    
    return $results;
}

// Only allow this script to run from command line or with proper authentication
if (php_sapi_name() !== 'cli' && !isset($_GET['key']) || (isset($_GET['key']) && $_GET['key'] !== 'elridhma_sitemap_key_2024')) {
    http_response_code(403);
    die('Access denied');
}

$sitemapUrl = SITE_URL . '/sitemap.xml';
$results = submitSitemap($sitemapUrl);

// Output results
if (php_sapi_name() === 'cli') {
    // Command line output
    echo "Sitemap submission results for: $sitemapUrl\n";
    echo str_repeat('-', 50) . "\n";
    
    foreach ($results as $engine => $result) {
        echo "$engine: " . ($result['success'] ? 'SUCCESS' : 'FAILED') . " (HTTP {$result['status']})\n";
    }
} else {
    // Web output
    header('Content-Type: application/json');
    echo json_encode([
        'sitemap_url' => $sitemapUrl,
        'submission_time' => date('Y-m-d H:i:s'),
        'results' => $results
    ], JSON_PRETTY_PRINT);
}
?>
