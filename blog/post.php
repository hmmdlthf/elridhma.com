<?php
// Include blog utility functions
require_once 'utils.php';

// Blog configuration
$blog_title = "Elridhma Web Design Blog";

// Get the slug from URL - check both 'slug' and 'post' parameters for backwards compatibility
$slug = isset($_GET['slug']) ? $_GET['slug'] : (isset($_GET['post']) ? $_GET['post'] : '');

if (empty($slug)) {
    header('Location: index.php');
    exit;
}

// Get the specific post
$post_file = 'posts/' . $slug . '.md';

if (!file_exists($post_file)) {
    header('HTTP/1.0 404 Not Found');
    $page_title = "Post Not Found";
    $post = null;
} else {
    $content = file_get_contents($post_file);
    $post = parseBlogPost($content, $post_file);
    
    if (!$post) {
        header('HTTP/1.0 404 Not Found');
        $page_title = "Post Not Found";
    } else {
        $page_title = $post['title'] . ' - ' . $blog_title;
    }
}

// Get related posts
$related_posts = [];
if ($post) {
    $all_posts = getBlogPosts();
    $related_posts = array_filter($all_posts, function($p) use ($post) {
        return $p['slug'] !== $post['slug'];
    });
    $related_posts = array_slice($related_posts, 0, 3);
}
?>

<?php 
// Set page meta information
if ($post) {
    $page_title = $post['title'] . ' - Elridhma Blog';
    $page_description = $post['excerpt'];
} else {
    $page_title = 'Post Not Found - Elridhma Blog';
    $page_description = 'The requested blog post could not be found.';
}

// Theme color for Elridhma
$theme_color = '#FFD600'; // yellow
$theme_accent = '#7C3AED'; // purple

// Include the site header
include '../includes/header.php'; 
?>

    <main class="blog-post-main py-5">
        <div class="container">
            <?php if (!$post): ?>
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <div class="error-404 py-5">
                            <h1 class="display-4">Post Not Found</h1>
                            <p class="lead">The blog post you're looking for doesn't exist or has been moved.</p>
                            <a href="index.php" class="btn btn-primary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Blog
                            </a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <article class="blog-post">
                            <header class="post-header mb-4">
                                <nav aria-label="breadcrumb" class="mb-3">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../" class="text-decoration-none">Home</a></li>
                                        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Blog</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($post['title']); ?></li>
                                    </ol>
                                </nav>
                                <h1 class="display-5 mb-3"><?php echo htmlspecialchars($post['title']); ?></h1>
                                <div class="post-meta text-muted mb-4">
                                    <span class="post-date me-3">
                                        <i class="fas fa-calendar me-1"></i>
                                        <?php echo date('F j, Y', strtotime($post['date'])); ?>
                                    </span>
                                    <?php if (isset($post['author'])): ?>
                                        <span class="post-author me-3">
                                            <i class="fas fa-user me-1"></i>
                                            <?php echo htmlspecialchars($post['author']); ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if (isset($post['category'])): ?>
                                        <span class="post-category me-3">
                                            <i class="fas fa-tag me-1"></i>
                                            <?php echo htmlspecialchars($post['category']); ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if (isset($post['reading_time'])): ?>
                                        <span class="reading-time">
                                            <i class="fas fa-clock me-1"></i>
                                            <?php echo htmlspecialchars($post['reading_time']); ?> min read
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </header>
                            
                            <div class="post-content">
                                <?php echo markdownToHtml($post['content']); ?>
                            </div>
                            
                            <?php if (isset($post['tags'])): ?>
                                <footer class="post-footer mt-4 pt-4 border-top">
                                    <div class="post-tags">
                                        <strong class="me-2">Tags:</strong>
                                        <?php 
                                        $tags = explode(',', $post['tags']);
                                        foreach ($tags as $tag): 
                                        ?>
                                            <span class="badge bg-secondary me-1"><?php echo trim(htmlspecialchars($tag)); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                </footer>
                            <?php endif; ?>
                        </article>
                    </div>
                </div>
                
                <?php if (!empty($related_posts)): ?>
                    <section class="related-posts mt-5">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="h3 mb-4">Related Posts</h2>
                                <div class="row">
                                    <?php foreach ($related_posts as $related_post): ?>
                                        <div class="col-md-4 mb-4">
                                            <div class="card h-100 shadow-sm">
                                                <div class="card-body">
                                                    <h3 class="card-title h5">
                                                        <a href="<?php echo $related_post['slug']; ?>" class="text-decoration-none">
                                                            <?php echo htmlspecialchars($related_post['title']); ?>
                                                        </a>
                                                    </h3>
                                                    <div class="post-meta text-muted small mb-2">
                                                        <span class="post-date">
                                                            <i class="fas fa-calendar me-1"></i>
                                                            <?php echo date('M j, Y', strtotime($related_post['date'])); ?>
                                                        </span>
                                                    </div>
                                                    <p class="card-text"><?php echo htmlspecialchars($related_post['excerpt']); ?></p>
                                                </div>
                                                <div class="card-footer bg-transparent">
                                                    <a href="<?php echo $related_post['slug']; ?>" class="btn btn-outline-primary btn-sm">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                
                <nav class="post-navigation mt-4">
                    <a href="index.php" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Blog
                    </a>
                </nav>
            <?php endif; ?>
        </div>
    </main>

<?php include '../includes/footer.php'; ?>
