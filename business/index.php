<?php
/**
 * PhytoScience Wellness - Official Business Opportunity Portal
 * Home Page (index.php)
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/data/products.php';

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

<!-- 4.5 FLAGSHIP CELLULAR FORMULATIONS SHOWCASE -->
<section class="py-5 py-lg-6 position-relative" id="flagship-products" style="background: #0D0E13;">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Swiss Biotechnology Formulations</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Flagship Cellular Health <span class="text-gold">Formulations</span></h2>
      <p class="text-secondary lead fs-6 mb-3">
        Engineered with patented Swiss plant stem cells and rare medicinal botanicals. Select any product below to view its dedicated advertising landing page, clinical evidence, and direct order options.
      </p>

      <!-- Interactive Currency Switcher Bar -->
      <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap mb-2">
        <span class="text-white-50 small fw-bold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.05em;">Currency:</span>
        <div class="ps-currency-pills-wrap">
          <button type="button" class="ps-currency-pill-btn js-currency-btn" data-currency="NGN">🇳🇬 NGN (₦)</button>
          <button type="button" class="ps-currency-pill-btn js-currency-btn" data-currency="USD">🇺🇸 USD ($)</button>
          <button type="button" class="ps-currency-pill-btn js-currency-btn" data-currency="GBP">🇬🇧 GBP (£)</button>
          <button type="button" class="ps-currency-pill-btn js-currency-btn" data-currency="EUR">🇪🇺 EUR (€)</button>
          <button type="button" class="ps-currency-pill-btn js-currency-btn" data-currency="GHS">🇬🇭 GHS (GH₵)</button>
          <button type="button" class="ps-currency-pill-btn js-currency-btn" data-currency="KES">🇰🇪 KES (KSh)</button>
          <button type="button" class="ps-currency-pill-btn js-currency-btn" data-currency="ZAR">🇿🇦 ZAR (R)</button>
          <button type="button" class="ps-currency-pill-btn js-currency-btn" data-currency="MYR">🇲🇾 MYR (RM)</button>
          <button type="button" class="ps-currency-pill-btn js-currency-btn" data-currency="CAD">🇨🇦 CAD (CA$)</button>
        </div>
      </div>
    </div>

    <div class="row g-4 justify-content-center">
      <?php
      $featuredProducts = get_products_data();
      foreach ($featuredProducts as $prodSlug => $prod):
          $prodUrl = get_product_url($prodSlug);
          $tierPrice = $prod['pricing'][0]['price_ngn'] ?? '₦38,000';
          $tierOriginal = $prod['pricing'][0]['original_ngn'] ?? '₦48,000';
          $tierUsd = $prod['pricing'][0]['price_usd'] ?? '$45 USD';
          $prodUsd = (float)preg_replace('/[^0-9.]/', '', $prod['pricing'][0]['price_usd'] ?? '45');
          $prodOrigUsd = $prodUsd * 1.25;
          if ($prodUsd >= 44 && $prodUsd <= 46) $prodOrigUsd = 55;
      ?>
        <div class="col-lg-4 col-md-6">
          <div class="ps-card h-100 p-4 d-flex flex-column justify-content-between position-relative overflow-hidden" style="background: #14151B; border: 1px solid rgba(255,255,255,0.08); border-radius: 16px; transition: transform 0.3s ease, border-color 0.3s ease;">
            
            <div>
              <!-- Badge -->
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="badge px-3 py-1 rounded-pill" style="background: rgba(216,0,29,0.15); color: #FF4D5E; font-size: 0.72rem; font-weight: 700; border: 1px solid rgba(216,0,29,0.3);">
                  <?= htmlspecialchars($prod['badge']) ?>
                </span>
                <span class="text-warning small">★★★★★ <?= $prod['rating'] ?></span>
              </div>

              <!-- Packshot Image -->
              <div class="text-center py-3 mb-3 rounded-3" style="background: rgba(255,255,255,0.02);">
                <a href="<?= $prodUrl ?>">
                  <img src="<?= asset(ltrim($prod['image'], '/')) ?>" alt="<?= htmlspecialchars($prod['name']) ?>" class="img-fluid" style="max-height: 190px; object-fit: contain; transition: transform 0.3s ease;">
                </a>
              </div>

              <!-- Title & Category -->
              <span class="text-gold small fw-semibold text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.05em;"><?= htmlspecialchars($prod['category']) ?></span>
              <h3 class="h5 text-white fw-bold mt-1 mb-2">
                <a href="<?= $prodUrl ?>" class="text-white text-decoration-none">
                  <?= htmlspecialchars($prod['name']) ?>
                </a>
              </h3>

              <!-- Short Desc -->
              <p class="small text-secondary mb-3" style="line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                <?= htmlspecialchars($prod['short_desc']) ?>
              </p>

              <!-- Packaging Spec -->
              <div class="d-flex align-items-center gap-2 text-white-50 small mb-3">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                <span><?= htmlspecialchars($prod['packaging']) ?></span>
              </div>
            </div>

            <!-- Price & Action -->
            <div class="pt-3 border-top border-secondary border-opacity-25 mt-2">
              <div class="d-flex align-items-baseline justify-content-between mb-3">
                <div>
                  <span class="text-white fw-bold fs-5" data-price-usd="<?= $prodUsd ?>"><?= htmlspecialchars($tierPrice) ?></span>
                  <span class="text-secondary text-decoration-line-through small ms-1" data-original-usd="<?= $prodOrigUsd ?>"><?= htmlspecialchars($tierOriginal) ?></span>
                </div>
                <span class="text-gold small fw-bold" data-price-usd="<?= $prodUsd ?>"><?= htmlspecialchars($tierUsd) ?></span>
              </div>

              <div class="d-flex gap-2">
                <a href="<?= $prodUrl ?>" class="btn-ps btn-ps-primary py-2 px-3 flex-grow-1 text-center small fw-bold">
                  <span>View & Order</span>
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="https://wa.me/2348023173303?text=<?= urlencode('Hello PhytoScience Team, I am interested in ' . $prod['name'] . '. Please assist me.') ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-emerald py-2 px-2 text-center" title="Chat on WhatsApp">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.043s.433-.506.549-.68c.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.099.824zm-3.423-14.416c-6.627 0-12 5.373-12 12 0 2.112.551 4.095 1.517 5.82l-1.617 5.912 6.074-1.593c1.66.908 3.565 1.427 5.59 1.427 6.627 0 12-5.373 12-12 0-6.627-5.373-12-12-12z"/></svg>
                </a>
              </div>
            </div>

          </div>
        </div>
      <?php endforeach; ?>
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
<section class="py-5 py-lg-6 position-relative" style="background: linear-gradient(180deg, #121318 0%, #0A0B0E 100%);">
  <div class="container">
    <?php require __DIR__ . '/components/compensation-calc.php'; ?>
  </div>
</section>

<!-- 7. MILLIONAIRES & CAR ACHIEVERS SHOWCASE (PHYTOSCIENCE AFRICA SOCIAL PROOF) -->
<?php require __DIR__ . '/components/car-achievers.php'; ?>

<!-- 8. PRODUCT TESTIMONIES & REAL-LIFE HEALTH TRANSFORMATIONS -->
<?php require __DIR__ . '/components/product-testimonies.php'; ?>

<!-- 9. VIDEO PROOF OF SUCCESS & RECOGNITION -->
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

