<?php
require_once 'utils.php';

$blog_title = "Elridhma Blog";
$slug = isset($_GET['slug']) ? $_GET['slug'] : (isset($_GET['post']) ? $_GET['post'] : '');

if (empty($slug)) { header('Location: index.php'); exit; }

$post_file = 'posts/' . $slug . '.md';

if (!file_exists($post_file)) {
    header('HTTP/1.0 404 Not Found');
    $post = null;
    $page_title = 'Post Not Found';
} else {
    $content = file_get_contents($post_file);
    $post    = parseBlogPost($content, $post_file);
    if (!$post) {
        header('HTTP/1.0 404 Not Found');
        $post = null;
        $page_title = 'Post Not Found';
    } else {
        $page_title       = $post['title'] . ' — ' . $blog_title;
        $page_description = $post['excerpt'];
    }
}

$related_posts = [];
if ($post) {
    $all = getBlogPosts();
    $related_posts = array_slice(array_filter($all, function($p) use ($post){ return $p['slug'] !== $post['slug']; }), 0, 3);
}

include '../includes/header.php';
?>

<?php if (!$post): ?>
  <section style="padding:8rem 1.5rem;text-align:center;">
    <div class="max-w-screen" style="max-width:560px;">
      <div style="font-size:4rem;margin-bottom:1rem;">404</div>
      <h1 style="font-size:1.8rem;margin-bottom:0.75rem;">Post Not Found</h1>
      <p style="color:#71717A;margin-bottom:2rem;">The blog post you're looking for doesn't exist or has been moved.</p>
      <a href="/" class="btn-gradient"><i class="fas fa-arrow-left"></i> Back to Blog</a>
    </div>
  </section>

<?php else: ?>

<!-- Article -->
<article style="padding:4rem 1.5rem 6rem;">
  <div class="max-w-screen" style="max-width:760px;">

    <!-- Breadcrumb -->
    <nav class="breadcrumb" style="margin-bottom:2rem;">
      <a href="/">Home</a>
      <span class="breadcrumb-sep"><i class="fas fa-chevron-right" style="font-size:0.65rem;"></i></span>
      <a href="/blog/">Blog</a>
      <span class="breadcrumb-sep"><i class="fas fa-chevron-right" style="font-size:0.65rem;"></i></span>
      <span><?php echo htmlspecialchars($post['title']); ?></span>
    </nav>

    <!-- Post header -->
    <header style="margin-bottom:2.5rem;">
      <?php if (isset($post['category'])): ?>
        <span class="category-tag" style="margin-bottom:1rem;display:inline-block;"><?php echo htmlspecialchars($post['category']); ?></span>
      <?php endif; ?>
      <h1 style="font-size:clamp(1.8rem,4vw,2.8rem);line-height:1.2;margin-bottom:1rem;"><?php echo htmlspecialchars($post['title']); ?></h1>
      <div style="display:flex;align-items:center;gap:1.5rem;flex-wrap:wrap;">
        <?php if (isset($post['author'])): ?>
          <div style="display:flex;align-items:center;gap:0.5rem;">
            <div style="width:30px;height:30px;border-radius:50%;background:linear-gradient(135deg,#8B5CF6,#06B6D4);display:flex;align-items:center;justify-content:center;font-size:0.75rem;font-weight:700;color:#fff;"><?php echo strtoupper(substr($post['author'],0,1)); ?></div>
            <span style="font-size:0.85rem;color:#A1A1AA;"><?php echo htmlspecialchars($post['author']); ?></span>
          </div>
        <?php endif; ?>
        <span style="font-size:0.82rem;color:#71717A;display:flex;align-items:center;gap:0.35rem;">
          <i class="fas fa-calendar"></i><?php echo date('F j, Y', strtotime($post['date'])); ?>
        </span>
        <?php if (isset($post['reading_time'])): ?>
          <span style="font-size:0.82rem;color:#71717A;display:flex;align-items:center;gap:0.35rem;">
            <i class="fas fa-clock"></i><?php echo htmlspecialchars($post['reading_time']); ?> min read
          </span>
        <?php endif; ?>
      </div>
    </header>

    <!-- Divider -->
    <div class="section-divider" style="margin-bottom:2.5rem;"></div>

    <!-- Content -->
    <div class="post-content">
      <?php echo markdownToHtml($post['content']); ?>
    </div>

    <!-- Tags -->
    <?php if (isset($post['tags'])): ?>
      <div style="margin-top:2.5rem;padding-top:1.5rem;border-top:1px solid #27272A;display:flex;align-items:center;gap:0.5rem;flex-wrap:wrap;">
        <span style="font-size:0.82rem;color:#71717A;font-weight:500;">Tags:</span>
        <?php foreach(explode(',', $post['tags']) as $tag): ?>
          <span style="display:inline-block;padding:3px 10px;background:rgba(139,92,246,0.1);color:#8B5CF6;border:1px solid rgba(139,92,246,0.2);border-radius:50px;font-size:0.75rem;"><?php echo htmlspecialchars(trim($tag)); ?></span>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <!-- CTA -->
    <div class="card-glow" style="margin-top:3rem;padding:2rem;text-align:center;">
      <h3 style="font-size:1.25rem;margin-bottom:0.6rem;">Ready to get your business online?</h3>
      <p style="color:#71717A;font-size:0.9rem;margin-bottom:1.5rem;line-height:1.7;">Get a professional website for FREE — pay only for domain &amp; hosting.</p>
      <a href="/free-website" class="btn-gradient" style="padding:0.75rem 1.75rem;"><i class="fas fa-rocket"></i> Get Free Website</a>
    </div>

  </div>
</article>

<!-- Related Posts -->
<?php if (!empty($related_posts)): ?>
<section style="padding:3rem 1.5rem 6rem;border-top:1px solid #27272A;">
  <div class="max-w-screen" style="max-width:900px;">
    <h2 style="font-size:1.25rem;margin-bottom:2rem;">More from the blog</h2>
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem;" class="related-grid">
      <?php foreach($related_posts as $rp): ?>
        <div class="post-card">
          <div class="post-thumb" style="height:120px;background:linear-gradient(135deg,rgba(139,92,246,0.1),rgba(6,182,212,0.06));font-size:1.5rem;">
            <i class="fas fa-file-alt" style="color:#3F3F46;"></i>
          </div>
          <div class="post-card-body" style="padding:1.1rem;">
            <?php if (isset($rp['category'])): ?>
              <span class="category-tag" style="font-size:0.68rem;margin-bottom:0.5rem;display:inline-block;"><?php echo htmlspecialchars($rp['category']); ?></span>
            <?php endif; ?>
            <h3 style="font-size:0.9rem;font-weight:600;line-height:1.4;margin-bottom:0.4rem;">
              <a href="<?php echo htmlspecialchars($rp['slug']); ?>" style="color:#FAFAFA;transition:color 0.2s;" onmouseover="this.style.color='#8B5CF6'" onmouseout="this.style.color='#FAFAFA'"><?php echo htmlspecialchars($rp['title']); ?></a>
            </h3>
            <p style="font-size:0.78rem;color:#71717A;line-height:1.5;"><?php echo htmlspecialchars(substr($rp['excerpt'],0,80)).'...'; ?></p>
          </div>
          <div class="post-card-footer">
            <a href="<?php echo htmlspecialchars($rp['slug']); ?>" style="font-size:0.78rem;color:#8B5CF6;font-weight:500;">Read →</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<style>@media(max-width:768px){.related-grid{grid-template-columns:1fr!important;}}</style>

<?php endif; ?>
<?php include '../includes/footer.php'; ?>
