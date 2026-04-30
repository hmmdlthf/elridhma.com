<?php
require_once 'utils.php';

$blog_title       = "Elridhma Blog";
$blog_description = "Insights, tips and guides on web design, digital marketing, and growing your Sri Lankan business online.";
$posts_per_page   = 10;

$page   = isset($_GET['page']) ? max(1,(int)$_GET['page']) : 1;
$all_posts   = getBlogPosts();
$total_posts = count($all_posts);
$total_pages = ceil($total_posts / $posts_per_page);
$offset      = ($page - 1) * $posts_per_page;
$posts       = array_slice($all_posts, $offset, $posts_per_page);

$page_title       = $blog_title;
$page_description = $blog_description;

include '../includes/header.php';
?>

<!-- Page Hero -->
<section style="padding:5rem 1.5rem 3rem;text-align:center;" class="hero-mesh">
  <div class="glow-orb glow-orb-violet" style="top:-80px;left:50%;transform:translateX(-50%);opacity:0.45;"></div>
  <div class="max-w-screen" style="position:relative;z-index:1;">
    <div class="section-tag fade-up">Blog</div>
    <h1 class="fade-up delay-1" style="font-size:clamp(2rem,4vw,3rem);margin:0.75rem 0 1rem;"><?php echo htmlspecialchars($blog_title); ?></h1>
    <p class="fade-up delay-2" style="color:#71717A;max-width:520px;margin:0 auto;line-height:1.75;"><?php echo htmlspecialchars($blog_description); ?></p>
  </div>
</section>

<!-- Content -->
<section style="padding:2rem 1.5rem 6rem;">
  <div class="max-w-screen">
    <div style="display:grid;grid-template-columns:1fr 300px;gap:3rem;align-items:start;" class="blog-layout">

      <!-- Posts grid -->
      <div>
        <?php if (empty($posts)): ?>
          <div style="text-align:center;padding:4rem;background:#18181B;border:1px solid #27272A;border-radius:16px;">
            <i class="fas fa-pen-nib" style="font-size:2.5rem;color:#3F3F46;margin-bottom:1rem;display:block;"></i>
            <h2 style="font-size:1.25rem;margin-bottom:0.5rem;">No posts yet</h2>
            <p style="color:#71717A;">Check back soon for web design insights and digital marketing tips!</p>
          </div>
        <?php else: ?>
          <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:1.5rem;" class="posts-grid">
            <?php foreach ($posts as $post): ?>
              <div class="post-card fade-up">
                <div class="post-thumb" style="background:linear-gradient(135deg,rgba(139,92,246,0.12),rgba(6,182,212,0.08));">
                  <?php
                  $icons = ['Web Design'=>'fa-paint-brush','Digital Marketing'=>'fa-bullhorn','SEO'=>'fa-search','WordPress'=>'fa-wordpress','Business Growth'=>'fa-chart-line'];
                  $cat   = isset($post['category']) ? $post['category'] : '';
                  $icon  = isset($icons[$cat]) ? $icons[$cat] : 'fa-file-alt';
                  ?>
                  <i class="fas <?php echo $icon; ?>" style="color:#8B5CF6;"></i>
                </div>
                <div class="post-card-body">
                  <?php if ($cat): ?>
                    <span class="category-tag" style="margin-bottom:0.75rem;display:inline-block;"><?php echo htmlspecialchars($cat); ?></span>
                  <?php endif; ?>
                  <h2 style="font-size:1rem;font-weight:600;margin-bottom:0.6rem;line-height:1.4;">
                    <a href="<?php echo htmlspecialchars($post['slug']); ?>" style="color:#FAFAFA;transition:color 0.2s;" onmouseover="this.style.color='#8B5CF6'" onmouseout="this.style.color='#FAFAFA'">
                      <?php echo htmlspecialchars($post['title']); ?>
                    </a>
                  </h2>
                  <p style="font-size:0.82rem;color:#71717A;line-height:1.65;margin-bottom:0;"><?php echo htmlspecialchars(substr($post['excerpt'],0,110)).(strlen($post['excerpt'])>110?'...':''); ?></p>
                </div>
                <div class="post-card-footer" style="display:flex;align-items:center;justify-content:space-between;">
                  <div style="display:flex;align-items:center;gap:1rem;font-size:0.75rem;color:#71717A;">
                    <span><i class="fas fa-calendar" style="margin-right:0.3rem;"></i><?php echo date('M j, Y', strtotime($post['date'])); ?></span>
                    <?php if (isset($post['reading_time'])): ?>
                      <span><i class="fas fa-clock" style="margin-right:0.3rem;"></i><?php echo htmlspecialchars($post['reading_time']); ?> min</span>
                    <?php endif; ?>
                  </div>
                  <a href="<?php echo htmlspecialchars($post['slug']); ?>" style="font-size:0.78rem;color:#8B5CF6;font-weight:500;transition:opacity 0.2s;" onmouseover="this.style.opacity='0.75'" onmouseout="this.style.opacity='1'">Read →</a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <?php if ($total_pages > 1): ?>
            <div style="display:flex;justify-content:center;gap:0.5rem;margin-top:2.5rem;">
              <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page-1; ?>" class="btn-outline btn-sm"><i class="fas fa-arrow-left"></i></a>
              <?php endif; ?>
              <?php for ($i=1;$i<=$total_pages;$i++): ?>
                <a href="?page=<?php echo $i; ?>" style="width:36px;height:36px;border-radius:8px;display:inline-flex;align-items:center;justify-content:center;font-size:0.82rem;font-weight:500;
                  <?php echo $i==$page ? 'background:rgba(139,92,246,0.2);color:#8B5CF6;border:1px solid rgba(139,92,246,0.3);' : 'background:#18181B;color:#71717A;border:1px solid #27272A;'; ?>"><?php echo $i; ?></a>
              <?php endfor; ?>
              <?php if ($page < $total_pages): ?>
                <a href="?page=<?php echo $page+1; ?>" class="btn-outline btn-sm"><i class="fas fa-arrow-right"></i></a>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        <?php endif; ?>
      </div>

      <!-- Sidebar -->
      <aside>
        <!-- Recent Posts -->
        <div class="brand-card" style="padding:1.5rem;margin-bottom:1.5rem;">
          <h3 style="font-size:0.9rem;font-weight:700;text-transform:uppercase;letter-spacing:0.06em;color:#52525B;margin-bottom:1.25rem;">Recent Posts</h3>
          <?php $recent = getBlogPosts(5); foreach($recent as $r): ?>
            <div style="padding:0.65rem 0;border-bottom:1px solid #27272A;">
              <a href="<?php echo htmlspecialchars($r['slug']); ?>" style="font-size:0.85rem;color:#A1A1AA;line-height:1.45;transition:color 0.2s;display:block;" onmouseover="this.style.color='#8B5CF6'" onmouseout="this.style.color='#A1A1AA'"><?php echo htmlspecialchars($r['title']); ?></a>
              <span style="font-size:0.72rem;color:#52525B;"><?php echo date('M j, Y', strtotime($r['date'])); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- Categories -->
        <div class="brand-card" style="padding:1.5rem;">
          <h3 style="font-size:0.9rem;font-weight:700;text-transform:uppercase;letter-spacing:0.06em;color:#52525B;margin-bottom:1.25rem;">Categories</h3>
          <?php
          $cats = [
            ['icon'=>'fa-paint-brush',  'name'=>'Web Design'],
            ['icon'=>'fa-bullhorn',     'name'=>'Digital Marketing'],
            ['icon'=>'fa-search',       'name'=>'SEO Tips'],
            ['icon'=>'fa-wordpress',    'name'=>'WordPress'],
            ['icon'=>'fa-chart-line',   'name'=>'Business Growth'],
          ];
          foreach($cats as $c):
          ?>
            <a href="#" style="display:flex;align-items:center;gap:0.6rem;padding:0.5rem 0;color:#71717A;font-size:0.875rem;border-bottom:1px solid #27272A;transition:color 0.2s;" onmouseover="this.style.color='#8B5CF6'" onmouseout="this.style.color='#71717A'">
              <i class="fas <?php echo $c['icon']; ?>" style="color:#3F3F46;font-size:0.85rem;width:16px;"></i><?php echo $c['name']; ?>
            </a>
          <?php endforeach; ?>
        </div>
        <!-- CTA -->
        <div class="card-glow" style="padding:1.5rem;margin-top:1.5rem;text-align:center;">
          <div class="gradient-text" style="font-size:1.5rem;font-weight:800;margin-bottom:0.5rem;">Free Website</div>
          <p style="font-size:0.82rem;color:#71717A;margin-bottom:1rem;line-height:1.6;">Get your professional website at no design cost.</p>
          <a href="/free-website" class="btn-gradient" style="padding:0.6rem 1.2rem;font-size:0.82rem;width:100%;justify-content:center;">Apply Now</a>
        </div>
      </aside>

    </div>
  </div>
</section>

<style>
@media(max-width:768px){.blog-layout{grid-template-columns:1fr!important;}.posts-grid{grid-template-columns:1fr!important;}}
</style>

<?php include '../includes/footer.php'; ?>
