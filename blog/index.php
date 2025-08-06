<?php
// Include blog utility functions
require_once 'utils.php';

// Blog configuration
$blog_title = "Elridhma Web Design Blog";
$blog_description = "Insights, tips, and news about web design, digital marketing, and online business growth for Sri Lankan companies.";
$posts_per_page = 10;

// Get current page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);

// Get posts for current page
$all_posts = getBlogPosts();
$total_posts = count($all_posts);
$total_pages = ceil($total_posts / $posts_per_page);
$offset = ($page - 1) * $posts_per_page;
$posts = array_slice($all_posts, $offset, $posts_per_page);
?>

<?php 

// Set page meta information
$page_title = $blog_title;
$page_description = $blog_description;
$additional_css = ['../assets/css/blog.css']; // Add blog-specific styles if needed
// Theme color for Elridhma
$theme_color = '#FFD600'; // yellow
$theme_accent = '#7C3AED'; // purple

// Include the site header
include '../includes/header.php'; 
?>

    <main class="blog-main py-5" style="background: linear-gradient(90deg, #FFD600 0%, #7C3AED 100%); color: #222;">
        <div class="container">
            <header class="blog-header text-center mb-5">
                <h1 class="display-4" style="color: #7C3AED;"><?php echo $blog_title; ?></h1>
                <p class="lead" style="color: #FFD600;"><?php echo $blog_description; ?></p>
            </header>
            
            <div class="row">
                <div class="col-lg-8">
                    <section class="blog-posts">
                        <?php if (empty($posts)): ?>
                            <div class="no-posts text-center p-5">
                                <h2>No blog posts found</h2>
                                <p>Check back soon for the latest web design insights and digital marketing tips!</p>
                            </div>
                        <?php else: ?>
                            <div class="row">
                                <?php foreach ($posts as $post): ?>
                                    <div class="col-md-6 mb-4">
                                        <article class="card h-100 shadow-sm">
                                            <div class="card-body">
                                                <header class="post-header">
                                                    <h2 class="card-title h5">
                                                        <a href="<?php echo $post['slug']; ?>" class="text-decoration-none">
                                                            <?php echo htmlspecialchars($post['title']); ?>
                                                        </a>
                                                    </h2>
                                                    <div class="post-meta text-muted small mb-3">
                                                        <span class="post-date">
                                                            <i class="fas fa-calendar me-1"></i>
                                                            <?php echo date('F j, Y', strtotime($post['date'])); ?>
                                                        </span>
                                                        <?php if (isset($post['author'])): ?>
                                                            <span class="post-author ms-3">
                                                                <i class="fas fa-user me-1"></i>
                                                                <?php echo htmlspecialchars($post['author']); ?>
                                                            </span>
                                                        <?php endif; ?>
                                                        <?php if (isset($post['category'])): ?>
                                                            <span class="post-category ms-3">
                                                                <i class="fas fa-tag me-1"></i>
                                                                <?php echo htmlspecialchars($post['category']); ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </header>
                                                <div class="post-excerpt">
                                                    <p class="card-text"><?php echo htmlspecialchars($post['excerpt']); ?></p>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-transparent">
                                                <a href="<?php echo $post['slug']; ?>" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-arrow-right me-1"></i>Read More
                                                </a>
                                            </div>
                                        </article>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($total_pages > 1): ?>
                            <nav aria-label="Blog pagination" class="mt-4">
                                <ul class="pagination justify-content-center">
                                    <?php if ($page > 1): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo $page - 1; ?>">&larr; Previous</a>
                                        </li>
                                    <?php endif; ?>
                                    
                                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                        <?php if ($i == $page): ?>
                                            <li class="page-item active">
                                                <span class="page-link"><?php echo $i; ?></span>
                                            </li>
                                        <?php else: ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    
                                    <?php if ($page < $total_pages): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next &rarr;</a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        <?php endif; ?>
                    </section>
                </div>
                
                <div class="col-lg-4">
                    <aside class="blog-sidebar">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title h5 mb-0">Recent Posts</h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mb-0">
                                    <?php 
                                    $recent_posts = getBlogPosts(5);
                                    foreach ($recent_posts as $recent_post): 
                                    ?>
                                        <li class="mb-3">
                                            <a href="<?php echo $recent_post['slug']; ?>" class="text-decoration-none">
                                                <?php echo htmlspecialchars($recent_post['title']); ?>
                                            </a>
                                            <small class="text-muted d-block"><?php echo date('M j, Y', strtotime($recent_post['date'])); ?></small>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title h5 mb-0">Categories</h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><a href="#" class="text-decoration-none"><i class="fas fa-paint-brush me-2"></i>Web Design</a></li>
                                    <li class="mb-2"><a href="#" class="text-decoration-none"><i class="fas fa-bullhorn me-2"></i>Digital Marketing</a></li>
                                    <li class="mb-2"><a href="#" class="text-decoration-none"><i class="fas fa-search me-2"></i>SEO Tips</a></li>
                                    <li class="mb-2"><a href="#" class="text-decoration-none"><i class="fab fa-wordpress me-2"></i>WordPress</a></li>
                                    <li class="mb-2"><a href="#" class="text-decoration-none"><i class="fas fa-chart-line me-2"></i>Business Growth</a></li>
                                    <li class="mb-0"><a href="#" class="text-decoration-none"><i class="fas fa-map-marker-alt me-2"></i>UK Business</a></li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </main>

<?php include '../includes/footer.php'; ?>
