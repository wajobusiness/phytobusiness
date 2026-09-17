<?php
/**
 * PhytoScience Wellness - Compensation Plan Page (compensation-plan.php)
 * Comprehensive breakdown of all verified income streams, pairing caps, roll-ups, stockist bonuses, and leadership ranks.
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'PhytoScience Hybrid Compensation Plan | Daily Payouts & Unlimited Pairing';
$pageDescription = 'Examine the PhytoScience hybrid compensation plan: direct sponsor bonuses, unlimited binary pairing on Platinum, upline roll-ups, 3%-5% stockist key-in overrides, and leadership car incentives.';
$canonicalUrl = get_business_url('compensation-plan.php');

require __DIR__ . '/includes/header.php';
require_once __DIR__ . '/components/cards.php';
?>

<!-- 1. SUBPAGE HERO -->
<?php
$heroBadge = 'Hybrid Compensation Architecture';
$heroTitle = 'Six Lucrative Revenue Streams. <span class="text-gold">Daily E-Wallet Payouts.</span>';
$heroSubtitle = 'Engineered by mathematicians and veteran direct selling architects to deliver immediate front-end cash flow, unlimited mid-tier binary depth, and generational back-end unilevel wealth.';
$heroIsSubpage = true;
$heroBreadcrumbs = [
  ['title' => 'Opportunity', 'url' => get_business_url('business-opportunity.php')],
  ['title' => 'Compensation Plan', 'url' => '']
];
$heroCtaPrimaryText = 'Launch Interactive Calculator';
$heroCtaPrimaryUrl = '#calculator';
$heroCtaSecondaryText = 'Compare Packages';
$heroCtaSecondaryUrl = get_business_url('membership.php');

require __DIR__ . '/components/hero.php';
?>

<!-- 2. SIX INCOME STREAMS OVERVIEW -->
<section class="py-5 py-lg-6 position-relative" id="income-streams">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Revenue Streams</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">The Six Pillars of Your Earning Engine</h2>
      <p class="text-secondary lead fs-6 mb-0">
        PhytoScience pays out up to 45% of point volume on front-end sponsorships, backed by unlimited binary pairing and generational overrides.
      </p>
    </div>

    <div class="row g-4">
      
      <!-- Stream 1 -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="badge bg-gold text-dark fw-bold">STREAM 01</span>
            <span class="small text-gold fw-semibold">Upfront Payout</span>
          </div>
          <h3 class="h5 text-white mb-2">Direct Sponsor Bonus</h3>
          <p class="small text-secondary mb-3" style="line-height: 1.6;">
            Earn an immediate cash bonus whenever you personally introduce a new partner to PhytoScience. Sponsor bonuses scale based on the package chosen:
          </p>
          <ul class="list-unstyled small text-secondary mb-0 border-top border-secondary border-opacity-25 pt-2">
            <li class="py-1 d-flex justify-content-between"><span>Silver (100 PP):</span> <strong class="text-white">~$30 USD</strong></li>
            <li class="py-1 d-flex justify-content-between"><span>Gold (500 PP):</span> <strong class="text-white">~$150 USD</strong></li>
            <li class="py-1 d-flex justify-content-between"><span>Junior Platinum (1,500 PP):</span> <strong class="text-white">~$450 USD</strong></li>
            <li class="py-1 d-flex justify-content-between"><span>Platinum (3,000 PP):</span> <strong class="text-gold">~$900 USD</strong></li>
          </ul>
        </div>
      </div>

      <!-- Stream 2 -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="badge bg-gold text-dark fw-bold">STREAM 02</span>
            <span class="small text-gold fw-semibold">Exclusive to Platinum</span>
          </div>
          <h3 class="h5 text-white mb-2">Upline Roll-Up Bonus</h3>
          <p class="small text-secondary mb-3" style="line-height: 1.6;">
            When an entry-tier distributor (e.g. Silver) sponsors a higher-tier package (e.g. Platinum), the Silver earner only receives the commission tier of their own rank. The difference automatically <strong class="text-white">rolls up to the nearest active Platinum upline</strong>.
          </p>
          <div class="badge bg-dark-subtle text-light border border-secondary p-2 w-100 text-start small">
            As a Platinum member, you collect unearned bonuses generated across your downline depth.
          </div>
        </div>
      </div>

      <!-- Stream 3 -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="badge bg-gold text-dark fw-bold">STREAM 03</span>
            <span class="small text-gold fw-semibold">Daily Binary Engine</span>
          </div>
          <h3 class="h5 text-white mb-2">Binary Pairing Bonus</h3>
          <p class="small text-secondary mb-3" style="line-height: 1.6;">
            Volume from your Left Team and Right Team matches daily. Unmatched volume on your stronger leg carries forward indefinitely. Daily earnings caps depend on your package tier:
          </p>
          <ul class="list-unstyled small text-secondary mb-0 border-top border-secondary border-opacity-25 pt-2">
            <li class="py-1 d-flex justify-content-between"><span>Silver Cap:</span> <strong class="text-white">~$148 USD / day</strong></li>
            <li class="py-1 d-flex justify-content-between"><span>Gold Cap:</span> <strong class="text-white">~$500 USD / day</strong></li>
            <li class="py-1 d-flex justify-content-between"><span>Junior Platinum:</span> <strong class="text-white">~$1,500 USD / day</strong></li>
            <li class="py-1 d-flex justify-content-between"><span>Platinum Cap:</span> <strong class="text-gold">UNLIMITED (No Cap)</strong></li>
          </ul>
        </div>
      </div>

      <!-- Stream 4 -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="badge bg-gold text-dark fw-bold">STREAM 04</span>
            <span class="small text-gold fw-semibold">Mobile Stockist Perk</span>
          </div>
          <h3 class="h5 text-white mb-2">3%–5% Key-In Bonus</h3>
          <p class="small text-secondary mb-0" style="line-height: 1.6;">
            Mobile Stockists and Platinum account holders are authorized to register new members and order inventory through their terminal. For every point volume transaction entered, you receive a <strong class="text-white">3% to 5% administrative key-in override</strong> credited directly to your e-wallet.
          </p>
        </div>
      </div>

      <!-- Stream 5 -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="badge bg-gold text-dark fw-bold">STREAM 05</span>
            <span class="small text-gold fw-semibold">Long-Term Residual</span>
          </div>
          <h3 class="h5 text-white mb-2">Unilevel Reorder Matching</h3>
          <p class="small text-secondary mb-0" style="line-height: 1.6;">
            As tens of thousands of satisfied consumers and members reorder Double Stemcell and Crystal Cell for cellular wellness each month, you receive unilevel overrides spanning multiple generations of sponsorship depth.
          </p>
        </div>
      </div>

      <!-- Stream 6 -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="badge bg-gold text-dark fw-bold">STREAM 06</span>
            <span class="small text-gold fw-semibold">Lifestyle & Travel</span>
          </div>
          <h3 class="h5 text-white mb-2">Super Car & Luxury Travel</h3>
          <p class="small text-secondary mb-0" style="line-height: 1.6;">
            Top leaders who sustain rank qualifications receive corporate car maintenance subsidies and keys to high-performance luxury vehicles. Annual fully funded incentive trips include Switzerland, South Korea, Australia, and European river tours.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- 3. PAIRING MATRIX & DAILY LIMITATIONS TABLE -->
<section class="py-5 py-lg-6 position-relative" style="background: rgba(6, 38, 26, 0.35);">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Package Comparison</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Package Tier Earning Limits</h2>
      <p class="text-secondary lead fs-6 mb-0">
        Review how your chosen entry tier governs your daily binary pairing maximums and roll-up privileges.
      </p>
    </div>

    <div class="table-responsive">
      <table class="table table-dark ps-table align-middle">
        <thead>
          <tr>
            <th scope="col">Package Tier</th>
            <th scope="col">Package Points (PP)</th>
            <th scope="col">Direct Sponsor Bonus</th>
            <th scope="col">Daily Pairing Limitation</th>
            <th scope="col">Upline Roll-Up Capture</th>
            <th scope="col">Key-In Bonus (3%–5%)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="fw-bold text-white">Silver</td>
            <td class="font-monospace text-secondary">100 PP</td>
            <td class="text-secondary">Basic (~45% of Silver PP)</td>
            <td class="text-warning fw-semibold">~$148 USD / Day</td>
            <td class="text-danger">No (Rolls to Upline)</td>
            <td class="text-danger">No</td>
          </tr>
          <tr>
            <td class="fw-bold text-white">Gold</td>
            <td class="font-monospace text-secondary">500 PP</td>
            <td class="text-secondary">Mid-Level</td>
            <td class="text-warning fw-semibold">~$500 USD / Day</td>
            <td class="text-secondary">Partial</td>
            <td class="text-danger">No</td>
          </tr>
          <tr>
            <td class="fw-bold text-white">Junior Platinum</td>
            <td class="font-monospace text-secondary">1,500 PP</td>
            <td class="text-secondary">High-Level</td>
            <td class="text-warning fw-semibold">~$1,500 USD / Day</td>
            <td class="text-secondary">Partial</td>
            <td class="text-danger">No</td>
          </tr>
          <tr style="background: rgba(198, 164, 92, 0.12); border-left: 3px solid var(--ps-gold);">
            <td class="fw-bold text-gold">Platinum / Mobile Stockist</td>
            <td class="font-monospace text-gold fw-bold">3,000 PP</td>
            <td class="text-gold fw-bold">Full Payout on All Tiers</td>
            <td class="text-gold fw-bold">UNLIMITED (Zero Cap)</td>
            <td class="text-gold fw-bold">YES (100% Capture)</td>
            <td class="text-gold fw-bold">YES (3%–5%)</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="p-3 ps-card mt-3 text-secondary small">
      <strong class="text-white">Pro Tip:</strong> Members can upgrade from Silver or Gold to Platinum by paying the point difference within corporate upgrade grace periods, unlocking uncapped pairing and roll-ups permanently.
    </div>

  </div>
</section>

<!-- 4. LEADERSHIP RANKS & RECOGNITION PROGRESSION -->
<section class="py-5 py-lg-6 position-relative" id="ranks">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Career Milestones</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Leadership Ranks & Recognition</h2>
      <p class="text-secondary lead fs-6 mb-0">
        Ascend through verified leadership ranks as your cumulative binary team volume grows.
      </p>
    </div>

    <div class="row g-4">
      
      <div class="col-md-6 col-lg-3">
        <div class="ps-card h-100 p-4 text-center">
          <div class="ps-icon-box text-gold p-3 rounded-circle mx-auto mb-3" style="background: rgba(198, 164, 92, 0.1);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
          </div>
          <h3 class="h5 text-white mb-1">Star Leader Tiers</h3>
          <div class="small text-gold mb-2 font-monospace">1-Star • 2-Star • 3-Star</div>
          <p class="small text-secondary mb-0">
            Achieved upon sponsoring your initial frontline and reaching consistent monthly pairing thresholds. Unlocks pin recognition at regional galas.
          </p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="ps-card h-100 p-4 text-center">
          <div class="ps-icon-box text-gold p-3 rounded-circle mx-auto mb-3" style="background: rgba(198, 164, 92, 0.1);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 3h12l4 6-10 13L2 9z"/></svg>
          </div>
          <h3 class="h5 text-white mb-1">Diamond Leader</h3>
          <div class="small text-gold mb-2 font-monospace">Significant Team Depth</div>
          <p class="small text-secondary mb-0">
            Developing multiple Star leaders across Left and Right organizations. First tier to qualify for corporate international travel incentives and specialized summits.
          </p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="ps-card h-100 p-4 text-center">
          <div class="ps-icon-box text-gold p-3 rounded-circle mx-auto mb-3" style="background: rgba(198, 164, 92, 0.1);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
          </div>
          <h3 class="h5 text-white mb-1">Crown Diamond</h3>
          <div class="small text-gold mb-2 font-monospace">Multi-Country Structure</div>
          <p class="small text-secondary mb-0">
            Managing sustained high volume across regional hubs. Eligible for the Super Car bonus subsidy program and global VIP summit seating.
          </p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="ps-card h-100 p-4 text-center" style="border: 1px solid var(--ps-border-gold); background: rgba(198, 164, 92, 0.08);">
          <div class="ps-icon-box text-gold p-3 rounded-circle mx-auto mb-3" style="background: rgba(198, 164, 92, 0.2);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/></svg>
          </div>
          <h3 class="h5 text-white mb-1">Crown Ambassador</h3>
          <div class="small text-gold mb-2 font-monospace">Pinnacle Honor</div>
          <p class="small text-secondary mb-0">
            The highest honor in PhytoScience. Recognized worldwide as an elite global icon with tens of thousands in downline organizations and multi-million lifetime earnings.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- 5. INTERACTIVE CALCULATOR SECTION -->
<section class="py-5 py-lg-6 position-relative" id="calculator">
  <div class="container">
    <?php require __DIR__ . '/components/compensation-calc.php'; ?>
  </div>
</section>

<!-- 6. PRE-FOOTER CTA -->
<?php
$ctaTitle = 'Unlock Unlimited Daily Pairing with Platinum';
$ctaSubtitle = 'Don\'t let pairing caps limit your earning power. Select Platinum / Mobile Stockist and secure 100% upline roll-up capture, 3%–5% key-in overrides, and unlimited depth.';
$ctaPrimaryText = 'Choose Platinum & Join';
$ctaPrimaryUrl = get_business_url('join.php?package=platinum');

require __DIR__ . '/components/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>

