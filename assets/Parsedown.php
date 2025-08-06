<?php
/*
 * Parsedown - PHP Markdown parser
 * https://github.com/erusev/parsedown
 *
 * This is a minimal version for Elridhma blog. For full features, download from GitHub.
 */
class Parsedown {
    public function text($text) {
        // Basic Markdown to HTML (headings, bold, italics, links, lists)
        $text = htmlspecialchars($text);
        $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text);
        $text = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $text);
        $text = preg_replace('/\#\#\# (.*?)\n/', '<h3>$1</h3>', $text);
        $text = preg_replace('/\#\# (.*?)\n/', '<h2>$1</h2>', $text);
        $text = preg_replace('/\# (.*?)\n/', '<h1>$1</h1>', $text);
        $text = preg_replace('/\[(.*?)\]\((.*?)\)/', '<a href="$2">$1</a>', $text);
        $text = preg_replace('/\n\- (.*?)\n/', '<ul><li>$1</li></ul>', $text);
        $text = nl2br($text);
        return $text;
    }
}
