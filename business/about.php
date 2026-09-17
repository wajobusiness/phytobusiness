<?php
/**
 * PhytoScience Wellness - About Us Page (about.php)
 * Detailed Corporate Profile, Executive Leadership, Scientific Board & Licensing.
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'About PhytoScience | Corporate Heritage, Leadership & Swiss Biotechnology';
$pageDescription = 'Learn about PhytoScience: Founded in 2012, headquartered in Bangi, Malaysia. Discover our executive leadership, scientific partnership with Mibelle Biochemistry Switzerland, and direct selling license AJL932039.';
$canonicalUrl = get_business_url('about.php');

require __DIR__ . '/includes/header.php';
require_once __DIR__ . '/components/cards.php';
?>

<!-- 1. SUBPAGE HERO -->
<?php
$heroBadge = 'Corporate Profile & Heritage';
$heroTitle = 'A Legacy of Cellular Science & <span class="text-gold">Debt-Free Global Strength</span>';
$heroSubtitle = 'Founded in 2012 in Kuala Lumpur, PhytoScience has grown into an international powerhouse spanning 41+ countries, anchored by exclusive Swiss plant stem cell patents and an unwavering commitment to distributor prosperity.';
$heroIsSubpage = true;
$heroBreadcrumbs = [
  ['title' => 'About Us', 'url' => '']
];
$heroCtaPrimaryText = 'Explore Business Packages';
$heroCtaPrimaryUrl = get_business_url('membership.php');
$heroCtaSecondaryText = 'Watch Corporate Video';
$heroVideoId = 'hSWI5_NXxWk';

require __DIR__ . '/components/hero.php';
?>

<!-- 2. CORPORATE PROFILE & LEGAL FOUNDATION -->
<section class="py-5 py-lg-6 position-relative" id="profile">
  <div class="container">
    <div class="row align-items-center gy-5">
      
      <div class="col-lg-6">
        <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
          <span class="ps-status-dot"></span>
          <span>Corporate Overview</span>
        </div>
        <h2 class="h2 text-white fw-bold mb-3">Built on Integrity, Innovation & Financial Solvency</h2>
        <p class="text-secondary lead fs-6 mb-4" style="line-height: 1.7;">
          <?= COMPANY_LEGAL_NAME ?> was incorporated on <strong class="text-white">September 6, 2012</strong> in Malaysia with an audacious vision: to create a global enterprise that merges breakthrough cellular wellness biotechnology with an uncapped, life-transforming hybrid compensation structure.
        </p>
        <p class="text-secondary mb-4" style="line-height: 1.7;">
          Operating under Malaysian Direct Selling License <strong class="text-gold"><?= COMPANY_AJL_LICENSE ?></strong> and registration number <strong class="text-white"><?= COMPANY_REG_NO ?></strong>, the company has operated completely debt-free since inception, owning its multi-million dollar global headquarters in Bandar Baru Bangi, Selangor.
        </p>

        <div class="row g-3 pt-2 mb-4">
          <div class="col-sm-6">
            <div class="ps-card p-3 h-100">
              <div class="d-flex align-items-center gap-2 text-gold mb-1">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                <strong class="text-white small">Direct Sales License</strong>
              </div>
              <div class="text-gold fw-bold font-monospace"><?= COMPANY_AJL_LICENSE ?></div>
              <div class="small text-secondary" style="font-size: 0.75rem;">Ministry of Domestic Trade & Consumer Affairs</div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="ps-card p-3 h-100">
              <div class="d-flex align-items-center gap-2 text-gold mb-1">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                <strong class="text-white small">Date of Incorporation</strong>
              </div>
              <div class="text-gold fw-bold font-monospace">Sept 6, 2012</div>
              <div class="small text-secondary" style="font-size: 0.75rem;">13+ Years of Continuous Operational Stability</div>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-6">
        <div class="ps-card p-4 position-relative overflow-hidden" style="border: 1px solid var(--ps-border-gold); background: linear-gradient(135deg, rgba(15, 90, 62, 0.25) 0%, rgba(10, 18, 16, 0.95) 100%);">
          <h3 class="h4 text-white mb-3">Our Core Philosophy: The 4P Model</h3>
          <p class="small text-secondary mb-4">
            Direct selling companies thrive or fall based on corporate balance. PhytoScience was engineered around four mutually reinforcing cornerstones:
          </p>
          
          <div class="d-flex flex-column gap-3">
            <div class="d-flex align-items-start gap-3">
              <span class="badge bg-gold text-dark fw-bold px-2 py-1">P1</span>
              <div>
                <h4 class="h6 text-white mb-0">Products of Scientific Distinction</h4>
                <p class="small text-secondary mb-0">Patented Swiss formulations (Double Stemcell, Crystal Cell) with documented clinical trials and high consumer reorder rates.</p>
              </div>
            </div>

            <div class="d-flex align-items-start gap-3">
              <span class="badge bg-gold text-dark fw-bold px-2 py-1">P2</span>
              <div>
                <h4 class="h6 text-white mb-0">Plan of Generous Daily Rewards</h4>
                <p class="small text-secondary mb-0">Zero withholding of earned funds, daily e-wallet balances, unlimited binary depth on Platinum, and multi-tier roll-ups.</p>
              </div>
            </div>

            <div class="d-flex align-items-start gap-3">
              <span class="badge bg-gold text-dark fw-bold px-2 py-1">P3</span>
              <div>
                <h4 class="h6 text-white mb-0">Platform of Global Accessibility</h4>
                <p class="small text-secondary mb-0">A 24/7 web portal operating at app.iphyto.com with real-time genealogy trees and cross-border stockist inventory distribution.</p>
              </div>
            </div>

            <div class="d-flex align-items-start gap-3">
              <span class="badge bg-gold text-dark fw-bold px-2 py-1">P4</span>
              <div>
                <h4 class="h6 text-white mb-0">People of Uncompromising Character</h4>
                <p class="small text-secondary mb-0">Servant leadership from corporate executives and medical researchers who prioritize distributor advancement above all else.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- 3. EXECUTIVE LEADERSHIP TEAM -->
<section class="py-5 py-lg-6 position-relative" id="leadership" style="background: rgba(6, 38, 26, 0.3);">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Proven Corporate Stewardship</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Executive Leadership</h2>
      <p class="text-secondary lead fs-6 mb-0">
        Meet the visionaries guiding PhytoScience's global footprint, operational compliance, and distributor empowerment across 41+ nations.
      </p>
    </div>

    <div class="row g-4 justify-content-center">
      <?php foreach (LEADERSHIP_MEMBERS as $leader): ?>
        <div class="col-md-6 col-lg-3">
          <?= render_person_card($leader) ?>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- 4. SCIENTIFIC ADVISORY BOARD & SWISS R&D PARTNERSHIP -->
<section class="py-5 py-lg-6 position-relative" id="science">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>World-Class Biotechnology R&D</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Scientific Advisory Board</h2>
      <p class="text-secondary lead fs-6 mb-0">
        PhytoScience formulations are engineered in collaboration with world-renowned biochemists, oncology researchers, and biotechnology pioneers.
      </p>
    </div>

    <div class="row g-4 justify-content-center">
      <?php foreach (SCIENTIFIC_ADVISORS as $scientist): ?>
        <div class="col-md-6 col-lg-4">
          <?= render_person_card($scientist) ?>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Mibelle Partnership Spotlight Card -->
    <div class="ps-card p-4 p-lg-5 mt-5" style="border: 1px solid var(--ps-border-gold); background: linear-gradient(135deg, rgba(15, 90, 62, 0.25) 0%, rgba(10, 18, 16, 0.98) 100%);">
      <div class="row align-items-center gy-4">
        <div class="col-lg-8">
          <span class="badge bg-gold text-dark fw-bold mb-2">EXCLUSIVE SWISS PARTNERSHIP</span>
          <h3 class="h3 text-white mb-2">Mibelle Biochemistry (Buchs, Switzerland)</h3>
          <p class="text-secondary mb-0" style="line-height: 1.65;">
            Dr. Fred Zülli founded Mibelle Biochemistry in 1991, creating the proprietary PhytoCellTec™ plant cell culture technology. This breakthrough cultivates calluses from rare, endangered plant cells under sterile bioreactor environments. PhytoScience holds the master direct selling partnership for these cellular formulations worldwide.
          </p>
        </div>
        <div class="col-lg-4 text-lg-end">
          <button type="button" class="btn-ps btn-ps-gold js-video-trigger" data-video-id="KVqWChK6fdI" data-video-title="Dr. Fred Zülli Keynote Address">
            <span class="ps-play-circle me-1">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
            </span>
            <span>Watch Dr. Fred Zülli Keynote</span>
          </button>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- 5. CORPORATE MILESTONES -->
<section class="py-5 py-lg-6 position-relative" id="milestones">
  <div class="container">
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>A Proven Track Record</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Corporate Milestones</h2>
      <p class="text-secondary lead fs-6 mb-0">
        Over 13 years of continuous growth, international expansions, and life-changing milestones.
      </p>
    </div>

    <?php
    $timelineMode = 'milestones';
    require __DIR__ . '/components/timeline.php';
    ?>
  </div>
</section>

<!-- 6. PRE-FOOTER CTA -->
<?php
$ctaTitle = 'Partner with an Industry Giant Built to Last';
$ctaSubtitle = 'Don\'t risk your entrepreneurial career with unproven start-ups. Join a debt-free, 13-year-old global leader with international infrastructure, patented science, and daily payouts.';
$ctaPrimaryText = 'Choose Your Business Tier';
$ctaPrimaryUrl = get_business_url('membership.php');

require __DIR__ . '/components/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>

