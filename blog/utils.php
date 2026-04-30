<?php
// Include Parsedown for markdown processing
require_once __DIR__ . '/../assets/Parsedown.php';
// Elridhma Sri Lanka blog utilities

// Function to get all blog posts
function getBlogPosts($limit = null) {
    $posts = [];
    $post_files = glob(__DIR__ . '/posts/*.md');
    
    foreach ($post_files as $file) {
        $content = file_get_contents($file);
        $post = parseBlogPost($content, $file);
        if ($post) {
            $posts[] = $post;
        }
    }
    
    // Sort by date (newest first)
    usort($posts, function($a, $b) {
        return strtotime($b['date']) - strtotime($a['date']);
    });
    
    if ($limit) {
        return array_slice($posts, 0, $limit);
    }
    
    return $posts;
}

// Function to parse markdown blog post
function parseBlogPost($content, $filename) {
    $lines = explode("\n", $content);
    $post = [];
    $body_lines = [];

    // Support both fenced (---) and unfenced (raw key:value) frontmatter
    $fenced = trim($lines[0]) === '---';

    if ($fenced) {
        // Skip opening ---
        $in_meta = false;
        $meta_done = false;
        foreach ($lines as $i => $line) {
            if ($i === 0) { $in_meta = true; continue; }
            if (trim($line) === '---') { $meta_done = true; continue; }
            if (!$meta_done) {
                if (strpos($line, ':') !== false) {
                    list($key, $value) = explode(':', $line, 2);
                    $post[trim($key)] = trim($value);
                }
            } else {
                $body_lines[] = $line;
            }
        }
    } else {
        // Unfenced: key:value lines at top until first blank line, then body
        $meta_done = false;
        foreach ($lines as $line) {
            if (!$meta_done) {
                if (trim($line) === '') {
                    $meta_done = true;
                    continue;
                }
                if (strpos($line, ':') !== false) {
                    list($key, $value) = explode(':', $line, 2);
                    $post[trim($key)] = trim($value);
                }
            } else {
                $body_lines[] = $line;
            }
        }
    }

    if (!isset($post['title']) || !isset($post['date'])) {
        return null;
    }

    $post['content'] = implode("\n", $body_lines);
    $post['slug'] = basename($filename, '.md');
    $post['excerpt'] = getExcerpt($post['content']);

    return $post;
}

// Function to get post excerpt
function getExcerpt($content, $length = 200) {
    $text = strip_tags($content);
    if (strlen($text) <= $length) {
        return $text;
    }
    return substr($text, 0, $length) . '...';
}

// Function to convert markdown to HTML using Parsedown
function markdownToHtml($markdown) {
    $parsedown = new Parsedown();
    return $parsedown->text($markdown);
}
?>
