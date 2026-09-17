<?php
/**
 * PhytoScience Wellness - Official Business Opportunity Portal
 * Home Page (index.php)
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

// Page-specific metadata
$pageTitle = 'PhytoScience Global Business Opportunity | Official Distributor Portal';
$pageDescription = 'Discover how to partner with PhytoScience, the world pioneer in plant stem cell therapy. Backed by Swiss biochemistry, a debt-free corporate foundation, and an uncapped hybrid compensation plan.';
$canonicalUrl = get_business_url('index.php');

require __DIR__ . '/includes/header.php';
require_once __DIR__ . '/components/cards.php';
?>

<!-- 1. LUXURY HERO SECTION -->
<?php
$heroBadge = 'Global Direct Selling Leader • Established 2012';
$heroTitle = 'Turn Cellular Wellness into <span class="text-gold">Global Financial Prosperity</span>';
$heroSubtitle = 'Build a sustainable, recurring international income by partnering with PhytoScience — the world pioneer in plant stem cell therapy, backed by Mibelle Biochemistry Switzerland and a 100% reliable daily payout hybrid plan.';
$heroCtaPrimaryText = 'Explore Business Packages';
$heroCtaPrimaryUrl = get_business_url('membership.php');
$heroCtaSecondaryText = 'Watch Corporate Story';
$heroVideoId = 'hSWI5_NXxWk'; // Verified official corporate overview
$heroIsSubpage = false;

require __DIR__ . '/components/hero.php';
?>

<!-- 2. ANIMATED KPI STATISTICS -->
<?php require __DIR__ . '/components/statistics.php'; ?>

<!-- 3. THE 4P ADVANTAGE SYSTEM -->
<section class="py-5 py-lg-6 position-relative" id="four-pillars">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>The Foundation of Long-Term Success</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">The PhytoScience 4P Quadripartite System</h2>
      <p class="text-secondary lead fs-6 mb-0">
        Our sustained global expansion over 13+ years rests on four indestructible pillars designed to empower independent entrepreneurs.
      </p>
    </div>

    <div class="row g-4">
      <!-- Pillar 1: Products -->
      <div class="col-md-6 col-lg-3">
        <?= render_4p_card(
          'PILLAR 1',
          'Products',
          'PhytoCellTec™ Stem Cells',
          'Exclusive plant stem cell formulations developed in partnership with Mibelle Biochemistry Switzerland. Clinically documented to protect human skin stem cells, accelerate cellular rejuvenation, and combat degenerative decline.',
          '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
          MAIN_SHOP_URL
        ) ?>
      </div>

      <!-- Pillar 2: Plan -->
      <div class="col-md-6 col-lg-3">
        <?= render_4p_card(
          'PILLAR 2',
          'Plan',
          'Hybrid Daily Payouts',
          'An industry-benchmarked compensation architecture combining upfront sponsor bonuses, unlimited binary pairing on Platinum, upline roll-up capture, 3%–5% stockist key-in rewards, and unilevel matching overrides.',
          '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>',
          get_business_url('compensation-plan.php')
        ) ?>
      </div>

      <!-- Pillar 3: Platform -->
      <div class="col-md-6 col-lg-3">
        <?= render_4p_card(
          'PILLAR 3',
          'Platform',
          'Global Digital Terminal',
          'Proprietary 24/7 online infrastructure at app.iphyto.com. Live binary tree genealogy visualization, instant multi-currency e-wallet withdrawals, and cross-border logistics reaching 41+ sovereign nations seamlessly.',
          '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>',
          MEMBER_LOGIN_URL
        ) ?>
      </div>

      <!-- Pillar 4: People -->
      <div class="col-md-6 col-lg-3">
        <?= render_4p_card(
          'PILLAR 4',
          'People',
          'World-Class Mentorship',
          'Guided by proven executives, top scientific researchers including Dr. Fred Zülli, and seasoned international field leaders dedicated to duplicable distributor training, leadership academies, and global recognition.',
          '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
          get_business_url('about.php#leadership')
        ) ?>
      </div>
    </div>

  </div>
</section>

<!-- 4. SCIENTIFIC VALIDATION & SWISS BIOTECHNOLOGY -->
<section class="py-5 py-lg-6 position-relative" style="background: linear-gradient(180deg, rgba(6, 38, 26, 0.4) 0%, rgba(10, 18, 16, 0.95) 100%);">
  <div class="container">
    <div class="row align-items-center gy-5">
      
      <div class="col-lg-6">
        <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
          <span class="ps-status-dot"></span>
          <span>Swiss Innovation & Science</span>
        </div>
        <h2 class="h2 text-white fw-bold mb-3">Formulations Backed by European Biotechnology</h2>
        <p class="text-secondary lead fs-6 mb-4" style="line-height: 1.65;">
          Unlike standard wellness supplements, PhytoScience products are powered by patented <strong class="text-white">PhytoCellTec™</strong> plant stem cell biotechnology developed by <strong class="text-white">Mibelle Biochemistry in Buchs, Switzerland</strong>.
        </p>
        
        <div class="d-flex flex-column gap-3 mb-4">
          <div class="d-flex align-items-start gap-3">
            <div class="ps-icon-box text-gold p-2 rounded-circle flex-shrink-0" style="background: rgba(198, 164, 92, 0.1);">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <div>
              <h3 class="h6 text-white mb-1">Uttwiler Spätlauber Apple Stem Cells</h3>
              <p class="small text-secondary mb-0">Rare Swiss apple variety rich in epigenetic factors and metabolites that stimulate human stem cell longevity and delay cellular senescence.</p>
            </div>
          </div>

          <div class="d-flex align-items-start gap-3">
            <div class="ps-icon-box text-gold p-2 rounded-circle flex-shrink-0" style="background: rgba(198, 164, 92, 0.1);">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <div>
              <h3 class="h6 text-white mb-1">Dr. Fred Zülli Scientific Oversight</h3>
              <p class="small text-secondary mb-0">Direct master partnership with the inventor of PhytoCellTec™ and Founder of Mibelle Biochemistry, recipient of the European Cosmetic Innovation Prize.</p>
            </div>
          </div>

          <div class="d-flex align-items-start gap-3">
            <div class="ps-icon-box text-gold p-2 rounded-circle flex-shrink-0" style="background: rgba(198, 164, 92, 0.1);">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <div>
              <h3 class="h6 text-white mb-1">High Product Repeat Demand</h3>
              <p class="small text-secondary mb-0">Flagship products like Double Stemcell, Crystal Cell, and Actual+ generate massive consumer re-orders, driving predictable binary volume for your team.</p>
            </div>
          </div>
        </div>

        <div class="d-flex flex-wrap gap-3">
          <button type="button" class="btn-ps btn-ps-gold js-video-trigger" data-video-id="KVqWChK6fdI" data-video-title="Dr. Fred Zülli Explaining PhytoCellTec Stem Cell Science">
            <span class="ps-play-circle me-1">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
            </span>
            <span>Hear Dr. Fred Zülli</span>
          </button>
          <a href="<?= MAIN_SHOP_URL ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-glass">
            Explore Retail Store
          </a>
        </div>
      </div>

      <!-- Right Column: Video Lightbox Card -->
      <div class="col-lg-6">
        <div class="ps-card p-3 position-relative overflow-hidden" style="border: 1px solid var(--ps-border-crimson); box-shadow: var(--ps-shadow-xl);">
          <div class="position-relative rounded overflow-hidden cursor-pointer js-video-trigger" data-video-id="KVqWChK6fdI" data-video-title="Dr. Fred Zülli Explaining PhytoCellTec Stem Cell Science" style="height: 320px; background: #181920;">
            <img src="https://img.youtube.com/vi/KVqWChK6fdI/maxresdefault.jpg" alt="Dr Fred Zulli PhytoCellTec Presentation" class="w-100 h-100 object-fit-cover opacity-85">
            <button type="button" class="position-absolute top-50 start-50 translate-middle btn-ps-play-pulse js-video-trigger" data-video-id="KVqWChK6fdI" data-video-title="Dr. Fred Zülli Explaining PhytoCellTec Stem Cell Science" aria-label="Play Dr Fred Zulli Presentation">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="#FFFFFF"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
            </button>
            <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(to top, rgba(10,11,14,0.95), transparent);">
              <span class="badge bg-crimson fw-bold mb-1">Scientific Address</span>
              <h3 class="text-white mb-0 fs-6">Dr. Fred Zülli on PhytoCellTec™ Bioactive Mechanisms</h3>
            </div>
          </div>
          <div class="p-3 text-center">
            <p class="small text-secondary mb-0">
              Manufactured under strict GMP Swiss & Malaysian standards. Halal certified, non-GMO, and backed by European clinical trials.
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- 5. BUSINESS PACKAGES SHOWCASE -->
<section class="py-5 py-lg-6 position-relative" id="packages">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Transparent Entry Tiers</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Choose Your Global Business Package</h2>
      <p class="text-secondary lead fs-6 mb-0">
        Start at your preferred level and upgrade anytime. Platinum members enjoy uncapped daily pairing limits, full upline roll-up capture, and 3%–5% stockist key-in bonuses.
      </p>
    </div>

    <div class="row g-4 align-items-stretch">
      <?php foreach (MEMBERSHIP_PACKAGES as $pkg): ?>
        <div class="col-md-6 col-xl-3">
          <?= render_package_card($pkg, true) ?>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-5">
      <a href="<?= get_business_url('membership.php') ?>" class="btn-ps btn-ps-glass">
        <span>Compare Full Package Matrix & Point Values</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>

  </div>
</section>

<!-- 6. INTERACTIVE COMPENSATION SIMULATOR -->
<section class="py-5 py-lg-6 position-relative" style="background: linear-gradient(180deg, rgba(10, 18, 16, 0.95) 0%, rgba(6, 38, 26, 0.3) 100%);">
  <div class="container">
    <?php require __DIR__ . '/components/compensation-calc.php'; ?>
  </div>
</section>

<!-- 7. VIDEO PROOF OF SUCCESS & RECOGNITION -->
<section class="py-5 py-lg-6 position-relative" id="video-proof">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Verified International Proof</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Celebrated Across Continents</h2>
      <p class="text-secondary lead fs-6 mb-0">
        Witness how PhytoScience rewards top achievers with luxury vehicle bonuses, international incentive trips, and life-changing recognition.
      </p>
    </div>

    <div class="row g-4">
      <?php
      $featuredVideos = [
        [
          'id' => 'b0pV9MrxnNk',
          'title' => 'Grand Recognition & Award Ceremony 2025',
          'category' => 'Global Convention',
          'desc' => 'Over 10,000 distributors celebrating new Diamond and Crown Ambassador achievers.'
        ],
        [
          'id' => 'kY5t2OTxVPo',
          'title' => '10th Anniversary Grand Celebration',
          'category' => 'Milestone Gala',
          'desc' => 'A decade of corporate strength, distributor payout milestones, and global expansion.'
        ],
        [
          'id' => 'HSqDO3Wz1Lw',
          'title' => 'PhytoScience Super Cars Achievers',
          'category' => 'Car Incentive',
          'desc' => 'Distributors receiving keys to luxury vehicles paid directly by PhytoScience.'
        ],
        [
          'id' => 'E0IaPc9CC4M',
          'title' => 'African Tour & Leadership Summits',
          'category' => 'Regional Summit',
          'desc' => 'Transforming lives across Lagos, Abuja, Nairobi, Accra, and Yaoundé.'
        ],
      ];
      ?>

      <?php foreach ($featuredVideos as $vid): ?>
        <div class="col-md-6 col-lg-3">
          <div class="ps-card h-100 p-3">
            <div class="position-relative rounded overflow-hidden mb-3 cursor-pointer js-video-trigger" data-video-id="<?= $vid['id'] ?>" data-video-title="<?= sanitize($vid['title']) ?>" style="height: 180px; background: #181920;">
              <img src="https://img.youtube.com/vi/<?= $vid['id'] ?>/mqdefault.jpg" alt="<?= sanitize($vid['title']) ?>" class="w-100 h-100 object-fit-cover">
              <button type="button" class="position-absolute top-50 start-50 translate-middle btn-ps-play-pulse js-video-trigger" data-video-id="<?= $vid['id'] ?>" data-video-title="<?= sanitize($vid['title']) ?>" aria-label="Watch <?= sanitize($vid['title']) ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="#FFFFFF"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
              </button>
              <span class="position-absolute top-0 start-0 m-2 badge bg-crimson fw-bold"><?= sanitize($vid['category']) ?></span>
            </div>
            <h3 class="h6 text-white mb-1"><?= sanitize($vid['title']) ?></h3>
            <p class="small text-secondary mb-0"><?= sanitize($vid['desc']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-4">
      <a href="<?= get_business_url('gallery.php') ?>" class="btn-ps btn-ps-glass">
        <span>Explore Full Video & Media Archive</span>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>

  </div>
</section>

<!-- 8. ROADMAP TEASER: 7 STEPS TO FREEDOM -->
<section class="py-5 py-lg-6 position-relative">
  <div class="container">
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>A Turnkey System for Growth</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Your 7-Step Path to Residual Wealth</h2>
      <p class="text-secondary lead fs-6 mb-0">
        You don't have to reinvent the wheel. Follow our field-proven operational framework to build your organization from day one.
      </p>
    </div>

    <?php
    $timelineMode = 'roadmap';
    require __DIR__ . '/components/timeline.php';
    ?>

    <div class="text-center mt-5">
      <a href="<?= get_business_url('how-it-works.php') ?>" class="btn-ps btn-ps-gold">
        Read the In-Depth 7-Step Blueprint
      </a>
    </div>
  </div>
</section>

<!-- 9. PRE-FOOTER CONVERSION BANNER -->
<?php
$ctaTitle = 'Your Financial Breakthrough Begins with One Decision';
$ctaSubtitle = 'Lock in your position in our global binary structure today. Access immediate retail margins, daily pairing income, and world-class leadership coaching across 41+ nations.';
$ctaPrimaryText = 'Choose Your Package & Join';
$ctaPrimaryUrl = get_business_url('join.php');

require __DIR__ . '/components/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>

