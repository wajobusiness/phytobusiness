<?php
/**
 * PhytoScience Wellness - Membership Packages Page (membership.php)
 * Detailed breakdown of entry tiers, points (PP), product allocations, and Mobile Stockist privileges.
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Business Packages & Membership Tiers | PhytoScience Official';
$pageDescription = 'Compare PhytoScience membership tiers: Silver (100 PP), Gold (500 PP), Junior Platinum (1,500 PP), and Platinum / Mobile Stockist (3,000 PP). Learn about daily pairing caps and stockist rights.';
$canonicalUrl = get_business_url('membership.php');

require __DIR__ . '/includes/header.php';
require_once __DIR__ . '/components/cards.php';
?>

<!-- 1. SUBPAGE HERO -->
<?php
$heroBadge = 'Business Packages & Investment Tiers';
$heroTitle = 'Invest in Your Enterprise. <span class="text-gold">Maximize Your Returns.</span>';
$heroSubtitle = 'Select the tier that matches your capital and ambition. From affordable starter packs to full-scale Mobile Stockist centers with 3%–5% key-in overrides and uncapped daily binary pairing.';
$heroIsSubpage = true;
$heroBreadcrumbs = [
  ['title' => 'Opportunity', 'url' => get_business_url('business-opportunity.php')],
  ['title' => 'Packages & Tiers', 'url' => '']
];
$heroCtaPrimaryText = 'Register Today';
$heroCtaPrimaryUrl = get_business_url('join.php');
$heroCtaSecondaryText = 'Compare Details Below';
$heroCtaSecondaryUrl = '#comparison-table';

require __DIR__ . '/components/hero.php';
?>

<!-- 2. FOUR TIER CARDS -->
<section class="py-5 py-lg-6 position-relative" id="tier-cards">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Transparent Package Structure</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Choose Your Global Business Level</h2>
      <p class="text-secondary lead fs-6 mb-3">
        Every package includes authentic Swiss stem cell formulations, your official distributor ID, and 24/7 backoffice access.
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

    <div class="row g-4 align-items-stretch">
      <?php foreach (MEMBERSHIP_PACKAGES as $pkg): ?>
        <div class="col-md-6 col-xl-3">
          <?= render_package_card($pkg, true) ?>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- 3. COMPREHENSIVE COMPARISON MATRIX -->
<section class="py-5 py-lg-6 position-relative" id="comparison-table" style="background: rgba(18, 19, 24, 0.6);">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Side-by-Side Comparison</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Detailed Feature Matrix</h2>
      <p class="text-secondary lead fs-6 mb-0">
        Carefully evaluate what each tier provides in terms of daily payout caps, inventory value, and administrative privileges.
      </p>
    </div>

    <div class="table-responsive">
      <table class="table table-dark ps-table align-middle">
        <thead>
          <tr>
            <th scope="col" style="width: 25%;">Feature & Privilege</th>
            <th scope="col" style="width: 18%;">Silver</th>
            <th scope="col" style="width: 18%;">Gold</th>
            <th scope="col" style="width: 18%;">Junior Platinum</th>
            <th scope="col" style="width: 21%;" class="text-crimson">Platinum / Mobile</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="fw-semibold text-white">Package Points (PP)</td>
            <td class="font-monospace text-secondary">100 PP</td>
            <td class="font-monospace text-secondary">500 PP</td>
            <td class="font-monospace text-secondary">1,500 PP</td>
            <td class="font-monospace text-crimson fw-bold">3,000 PP</td>
          </tr>
          <tr>
            <td class="fw-semibold text-white">Official Price (USD)</td>
            <td class="text-white fw-bold">$130 USD</td>
            <td class="text-white fw-bold">$650 USD</td>
            <td class="text-white fw-bold">$1,950 USD</td>
            <td class="text-crimson fw-bold">$3,900 USD</td>
          </tr>
          <tr>
            <td class="fw-semibold text-white">Nigeria Equivalent (NGN)</td>
            <td class="text-secondary">₦110,000</td>
            <td class="text-secondary">₦550,000</td>
            <td class="text-secondary">₦1,650,000</td>
            <td class="text-crimson fw-bold">₦3,300,000</td>
          </tr>
          <tr>
            <td class="fw-semibold text-white">Malaysia Equivalent (MYR)</td>
            <td class="text-secondary">RM 420</td>
            <td class="text-secondary">RM 2,100</td>
            <td class="text-secondary">RM 6,300</td>
            <td class="text-crimson fw-bold">RM 12,600</td>
          </tr>
          <tr>
            <td class="fw-semibold text-white">Product Allocation</td>
            <td class="text-secondary">2 Packets Flagship Stem Cells</td>
            <td class="text-secondary">10–12 Packets Stem Cells</td>
            <td class="text-secondary">30–36 Packets Stem Cells</td>
            <td class="text-gold fw-bold">Bulk Stockist Inventory (60+ Units)</td>
          </tr>
          <tr>
            <td class="fw-semibold text-white">Daily Pairing Limitation</td>
            <td class="text-warning fw-semibold">~$148 USD / Day</td>
            <td class="text-warning fw-semibold">~$500 USD / Day</td>
            <td class="text-warning fw-semibold">~$1,500 USD / Day</td>
            <td class="text-gold fw-bold">UNLIMITED (No Cap!)</td>
          </tr>
          <tr>
            <td class="fw-semibold text-white">Direct Sponsor Bonus Rate</td>
            <td class="text-secondary">Silver Rate (~45% on 100 PP)</td>
            <td class="text-secondary">Gold Rate</td>
            <td class="text-secondary">Junior Platinum Rate</td>
            <td class="text-gold fw-bold">Maximum Rate on All Tiers</td>
          </tr>
          <tr>
            <td class="fw-semibold text-white">Upline Roll-Up Capture</td>
            <td class="text-danger">None (Rolls to Upline)</td>
            <td class="text-secondary">Partial</td>
            <td class="text-secondary">Partial</td>
            <td class="text-gold fw-bold">100% Full Capture</td>
          </tr>
          <tr>
            <td class="fw-semibold text-white">Stockist Key-In Override</td>
            <td class="text-danger">0%</td>
            <td class="text-danger">0%</td>
            <td class="text-danger">0%</td>
            <td class="text-gold fw-bold">3% to 5% on All Volume</td>
          </tr>
          <tr>
            <td class="fw-semibold text-white">24/7 Digital Backoffice</td>
            <td class="text-success fw-semibold">Included</td>
            <td class="text-success fw-semibold">Included</td>
            <td class="text-success fw-semibold">Included</td>
            <td class="text-success fw-semibold">Included + Stockist Terminal</td>
          </tr>
          <tr>
            <td class="fw-semibold text-white">International Upgrade Rights</td>
            <td class="text-secondary">Top-up within grace period</td>
            <td class="text-secondary">Top-up within grace period</td>
            <td class="text-secondary">Top-up within grace period</td>
            <td class="text-gold fw-bold">Pinnacle Tier (No Upgrade Needed)</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</section>

<!-- 4. THE MOBILE STOCKIST ADVANTAGE -->
<section class="py-5 py-lg-6 position-relative" id="mobile-stockist">
  <div class="container">
    <div class="ps-card p-4 p-lg-5" style="border: 1px solid var(--ps-border-gold); background: linear-gradient(135deg, rgba(15, 90, 62, 0.25) 0%, rgba(10, 18, 16, 0.98) 100%);">
      <div class="row align-items-center gy-4">
        
        <div class="col-lg-7">
          <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
            <span class="ps-status-dot"></span>
            <span>The Entrepreneur's Ultimate Vehicle</span>
          </div>
          <h2 class="h2 text-white fw-bold mb-3">The Mobile Stockist Advantage</h2>
          <p class="text-secondary lead fs-6 mb-3" style="line-height: 1.65;">
            In direct selling, the leader who holds the inventory controls the market speed. Becoming a <strong class="text-white">Platinum Mobile Stockist</strong> positions you as the logistical nucleus for your entire region.
          </p>
          
          <ul class="list-unstyled small text-secondary mb-4">
            <li class="d-flex align-items-start gap-2 mb-2">
              <svg class="text-gold flex-shrink-0 mt-1" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
              <span><strong class="text-white">3% to 5% Instant Key-In Overrides:</strong> Earn administrative cash on every single new member registration and product reorder entered through your backoffice.</span>
            </li>
            <li class="d-flex align-items-start gap-2 mb-2">
              <svg class="text-gold flex-shrink-0 mt-1" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
              <span><strong class="text-white">Zero Binary Pairing Caps:</strong> Never lose pairing commissions during viral team expansions. Your daily pairing ceiling is infinite.</span>
            </li>
            <li class="d-flex align-items-start gap-2 mb-2">
              <svg class="text-gold flex-shrink-0 mt-1" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
              <span><strong class="text-white">Capture Upline Roll-Ups:</strong> Automatically collect unearned sponsor bonuses left behind by junior members in your lineage.</span>
            </li>
          </ul>

          <a href="<?= get_business_url('join.php?package=platinum') ?>" class="btn-ps btn-ps-gold">
            Apply for Platinum Mobile Stockist
          </a>
        </div>

        <div class="col-lg-5 text-center">
          <div class="ps-card p-4 bg-dark bg-opacity-75">
            <div class="text-gold fs-1 fw-bold mb-1">3,000 PP</div>
            <div class="text-white fw-bold mb-3">Platinum Tier Requirement</div>
            <p class="small text-secondary mb-3">
              Stockist inventory can be supplied across multiple cities or sub-agents, creating immediate regional retail margins and high team velocity.
            </p>
            <div class="badge bg-gold text-dark fw-bold px-3 py-2 w-100">
              Ranked #1 for Maximum ROI
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- 5. UPGRADE & CONVERSION POLICY -->
<section class="py-5 position-relative">
  <div class="container">
    <div class="ps-card p-4">
      <div class="row align-items-center gy-3">
        <div class="col-md-8">
          <h3 class="h5 text-white mb-1">Can I Upgrade My Package Later?</h3>
          <p class="small text-secondary mb-0" style="line-height: 1.6;">
            Yes. PhytoScience allows registered Silver, Gold, and Junior Platinum distributors to upgrade to higher tiers by purchasing the point differential within the designated corporate upgrade timeframe. This ensures every entrepreneur can launch immediately according to current budget and scale upwards as cash flow expands.
          </p>
        </div>
        <div class="col-md-4 text-md-end">
          <a href="<?= get_business_url('join.php') ?>" class="btn-ps btn-ps-outline-gold">
            Start with Silver or Gold
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 6. PRE-FOOTER CTA -->
<?php
$ctaTitle = 'Choose Your Starting Level Today';
$ctaSubtitle = 'Whether launching at Silver to sample the waters or securing Platinum for maximum daily earnings, our global team will support your onboarding from minute one.';
$ctaPrimaryText = 'Proceed to Registration Form';
$ctaPrimaryUrl = get_business_url('join.php');

require __DIR__ . '/components/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>

