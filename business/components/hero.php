<?php
/**
 * PhytoScience Wellness - Hero Component
 * Reusable luxury hero section supporting home and subpage layouts.
 * 
 * Expected variables:
 * @var string $heroBadge       Pre-title pill badge text
 * @var string $heroTitle       Main headline (can include HTML e.g. <span class="text-gold">)
 * @var string $heroSubtitle    Subheading paragraph
 * @var string $heroCtaPrimaryText  Primary button label (optional)
 * @var string $heroCtaPrimaryUrl   Primary button link (optional)
 * @var string $heroCtaSecondaryText Secondary button label (optional)
 * @var string $heroCtaSecondaryUrl  Secondary button link (optional)
 * @var string $heroVideoId     YouTube video ID for secondary play button trigger (optional)
 * @var bool   $heroIsSubpage   Whether this is a subpage (more compact padding)
 * @var array  $heroBreadcrumbs Array of ['title' => '...', 'url' => '...'] (optional)
 */

declare(strict_types=1);

$heroBadge = $heroBadge ?? 'Global Direct Selling Leader';
$heroTitle = $heroTitle ?? 'Turn Cellular Wellness into Global Prosperity';
$heroSubtitle = $heroSubtitle ?? 'Partner with the world leader in plant stem cell therapy, backed by Swiss biochemistry, a 100% payout-reliable hybrid plan, and an international network across 41+ nations.';
$heroIsSubpage = $heroIsSubpage ?? false;
$heroCtaPrimaryText = $heroCtaPrimaryText ?? 'Explore Business Packages';
$heroCtaPrimaryUrl = $heroCtaPrimaryUrl ?? get_business_url('membership.php');
$heroCtaSecondaryText = $heroCtaSecondaryText ?? 'Watch Global Overview';
$heroCtaSecondaryUrl = $heroCtaSecondaryUrl ?? null;
$heroVideoId = $heroVideoId ?? 'hSWI5_NXxWk'; // Official corporate overview
?>

<section class="ps-hero position-relative overflow-hidden <?= $heroIsSubpage ? 'ps-hero-subpage py-5' : 'py-5 py-lg-6' ?>">
  <!-- Ambient background glow elements -->
  <div class="position-absolute top-0 start-50 translate-middle-x w-100 h-100 pointer-events-none" style="z-index: 0; opacity: 0.65;">
    <div style="position: absolute; top: -100px; left: 20%; width: 500px; height: 500px; background: radial-gradient(circle, rgba(216, 0, 29, 0.22) 0%, rgba(10, 11, 14, 0) 70%); border-radius: 50%; filter: blur(60px);"></div>
    <div style="position: absolute; top: 50px; right: 15%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(128, 0, 0, 0.25) 0%, rgba(10, 11, 14, 0) 70%); border-radius: 50%; filter: blur(70px);"></div>
  </div>

  <div class="container position-relative" style="z-index: 1;">
    <?php if (!empty($heroBreadcrumbs) && is_array($heroBreadcrumbs)): ?>
      <nav aria-label="breadcrumb" class="mb-3 animate-fade-in">
        <ol class="breadcrumb mb-0 small">
          <li class="breadcrumb-item"><a href="<?= get_business_url('index.php') ?>" class="text-secondary text-decoration-none hover-gold">Home</a></li>
          <?php foreach ($heroBreadcrumbs as $crumb): ?>
            <?php if (!empty($crumb['url'])): ?>
              <li class="breadcrumb-item"><a href="<?= $crumb['url'] ?>" class="text-secondary text-decoration-none hover-gold"><?= sanitize($crumb['title']) ?></a></li>
            <?php else: ?>
              <li class="breadcrumb-item active text-gold" aria-current="page"><?= sanitize($crumb['title']) ?></li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ol>
      </nav>
    <?php endif; ?>

    <div class="row align-items-center <?= $heroIsSubpage ? 'gy-4' : 'gy-5 min-vh-75 justify-content-between' ?>">
      <div class="<?= $heroIsSubpage ? 'col-lg-9 mx-auto text-center' : 'col-lg-7 text-start' ?>">
        
        <!-- Category Pill Badge -->
        <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3 animate-slide-up">
          <span class="ps-status-dot"></span>
          <span><?= sanitize($heroBadge) ?></span>
        </div>

        <!-- Main Headline -->
        <h1 class="<?= $heroIsSubpage ? 'h1-subpage' : 'display-4' ?> fw-bold mb-3 text-white animate-slide-up" style="animation-delay: 0.1s; letter-spacing: -0.02em; line-height: 1.15;">
          <?= $heroTitle ?>
        </h1>

        <!-- Subheading -->
        <p class="lead text-secondary mb-4 <?= $heroIsSubpage ? 'mx-auto' : '' ?> animate-slide-up" style="animation-delay: 0.2s; max-width: <?= $heroIsSubpage ? '800px' : '620px' ?>; font-size: 1.15rem; line-height: 1.6;">
          <?= sanitize($heroSubtitle) ?>
        </p>

        <!-- CTA Action Buttons -->
        <div class="d-flex flex-wrap gap-3 <?= $heroIsSubpage ? 'justify-content-center' : '' ?> animate-slide-up" style="animation-delay: 0.3s;">
          <?php if (!empty($heroCtaPrimaryText) && !empty($heroCtaPrimaryUrl)): ?>
            <a href="<?= $heroCtaPrimaryUrl ?>" class="btn-ps btn-ps-gold btn-ps-lg">
              <span><?= sanitize($heroCtaPrimaryText) ?></span>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
          <?php endif; ?>

          <?php if (!empty($heroVideoId)): ?>
            <button type="button" class="btn-ps btn-ps-glass btn-ps-lg js-video-trigger" data-video-id="<?= sanitize($heroVideoId) ?>" data-video-title="<?= sanitize($heroCtaSecondaryText) ?>" aria-label="Play video">
              <span class="ps-play-circle me-1">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
              </span>
              <span><?= sanitize($heroCtaSecondaryText) ?></span>
            </button>
          <?php elseif (!empty($heroCtaSecondaryText) && !empty($heroCtaSecondaryUrl)): ?>
            <a href="<?= $heroCtaSecondaryUrl ?>" class="btn-ps btn-ps-outline-gold btn-ps-lg">
              <?= sanitize($heroCtaSecondaryText) ?>
            </a>
          <?php endif; ?>
        </div>

        <?php if (!$heroIsSubpage): ?>
          <!-- Trust Badges Bar -->
          <div class="d-flex flex-wrap align-items-center gap-4 mt-5 pt-3 border-top border-dark-subtle animate-fade-in" style="animation-delay: 0.4s;">
            <div class="d-flex align-items-center gap-2">
              <svg class="text-gold" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              <span class="small text-secondary"><strong class="text-white">Govt. Licensed:</strong> AJL932039</span>
            </div>
            <div class="d-flex align-items-center gap-2">
              <svg class="text-gold" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>
              <span class="small text-secondary"><strong class="text-white">Swiss Science:</strong> Mibelle Biochemistry</span>
            </div>
            <div class="d-flex align-items-center gap-2">
              <svg class="text-gold" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              <span class="small text-secondary"><strong class="text-white">Global Reach:</strong> 41+ Countries</span>
            </div>
          </div>
        <?php endif; ?>

      </div>

      <?php if (!$heroIsSubpage): ?>
        <!-- Hero Right Graphic / Video Highlight Card -->
        <div class="col-lg-5 animate-slide-up" style="animation-delay: 0.25s;">
          <div class="ps-card position-relative overflow-hidden p-3" style="border: 1px solid var(--ps-border-gold); box-shadow: var(--ps-shadow-xl);">
            <!-- Card media banner with full trigger delegation -->
            <div class="position-relative rounded overflow-hidden cursor-pointer js-video-trigger" data-video-id="hSWI5_NXxWk" data-video-title="PhytoScience Corporate Overview" style="height: 280px; background: linear-gradient(135deg, #181920 0%, #20222B 100%);">
              <img src="https://img.youtube.com/vi/hSWI5_NXxWk/maxresdefault.jpg" alt="PhytoScience Corporate Overview" class="w-100 h-100 object-fit-cover opacity-85 transition-transform">
              
              <!-- Video play overlay button -->
              <button type="button" class="position-absolute top-50 start-50 translate-middle btn-ps-play-pulse js-video-trigger" data-video-id="hSWI5_NXxWk" data-video-title="PhytoScience Corporate Overview" aria-label="Play Corporate Overview Video">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="#FFFFFF"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
              </button>

              <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(to top, rgba(10,11,14,0.95), transparent);">
                <span class="badge bg-crimson fw-bold mb-1">Official Video</span>
                <h5 class="text-white mb-0 fs-6">PhytoScience: Trend Maker in Cellular Wellness</h5>
              </div>
            </div>

            <!-- Mini stat bar below hero video -->
            <div class="row g-2 text-center mt-3 pt-2 border-top border-dark">
              <div class="col-4">
                <div class="text-gold fw-bold fs-5">13+</div>
                <div class="small text-secondary" style="font-size: 0.75rem;">Years Proven</div>
              </div>
              <div class="col-4 border-start border-end border-secondary border-opacity-25">
                <div class="text-gold fw-bold fs-5">41+</div>
                <div class="small text-secondary" style="font-size: 0.75rem;">Global Markets</div>
              </div>
              <div class="col-4">
                <div class="text-gold fw-bold fs-5">100%</div>
                <div class="small text-secondary" style="font-size: 0.75rem;">Daily Payouts</div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>

