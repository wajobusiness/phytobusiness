<?php
/**
 * PhytoScience Wellness - Interactive Compensation Calculator Component
 * Interactive Vanilla JS calculator allowing prospects to model earnings based on verified compensation percentages.
 */

declare(strict_types=1);

require_once __DIR__ . '/../config.php';
?>

<div class="ps-card ps-calc-widget p-4 p-lg-5" id="compensation-calculator">
  <div class="row g-4 align-items-center">
    
    <!-- Left Column: Interactive Controls -->
    <div class="col-lg-7">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Interactive Earnings Simulator</span>
      </div>
      <h3 class="h3 text-white mb-2">Simulate Your Hybrid Cash Flow Potential</h3>
      <p class="small text-secondary mb-4">
        Calculate your projected upfront sponsor bonuses and residual binary pairing revenue based on verified PhytoScience payout rules.
      </p>

      <form id="calcForm" class="needs-validation" novalidate onsubmit="return false;">
        <!-- Control 1: Your Package Tier -->
        <div class="mb-4">
          <label for="userTierSelect" class="form-label text-white small fw-bold text-uppercase" style="letter-spacing: 0.05em;">
            1. Select Your Starting Business Package
          </label>
          <select id="userTierSelect" class="form-select ps-form-control text-white bg-dark">
            <option value="platinum" selected>Platinum / Mobile Stockist (3,000 PP) - Maximum Payouts & Unlimited Daily Pairing</option>
            <option value="junior_platinum">Junior Platinum (1,500 PP) - Intermediate Cap ($1,500/day)</option>
            <option value="gold">Gold Package (500 PP) - Medium Cap ($500/day)</option>
            <option value="silver">Silver Package (100 PP) - Entry Tier ($148/day max cap)</option>
          </select>
          <div class="form-text text-secondary small mt-1">
            Note: Platinum members earn maximum percentages on all tiers with zero pairing caps and 3%–5% key-in bonuses.
          </div>
        </div>

        <!-- Control 2: Direct Introductions -->
        <div class="mb-4">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <label for="sponsorCountRange" class="form-label text-white small fw-bold text-uppercase mb-0" style="letter-spacing: 0.05em;">
              2. Number of Direct Partners Enrolled (Monthly)
            </label>
            <span class="text-gold fw-bold fs-5 font-monospace" id="sponsorCountVal">4</span>
          </div>
          <input type="range" class="form-range" id="sponsorCountRange" min="1" max="20" value="4">
          <div class="d-flex justify-content-between text-secondary small">
            <span>1 Partner</span>
            <span>10 Partners</span>
            <span>20 Partners</span>
          </div>
        </div>

        <!-- Control 3: Typical Package Chosen by Your Partners -->
        <div class="mb-4">
          <label for="partnerPkgSelect" class="form-label text-white small fw-bold text-uppercase" style="letter-spacing: 0.05em;">
            3. Package Most Commonly Selected by Your Partners
          </label>
          <select id="partnerPkgSelect" class="form-select ps-form-control text-white bg-dark">
            <option value="silver">Silver (100 PP) - Approx $30 sponsor bonus per enrollee</option>
            <option value="gold">Gold (500 PP) - Approx $150 sponsor bonus per enrollee</option>
            <option value="junior_platinum">Junior Platinum (1,500 PP) - Approx $450 sponsor bonus per enrollee</option>
            <option value="platinum" selected>Platinum (3,000 PP) - Approx $900 sponsor bonus per enrollee (Full payout)</option>
          </select>
        </div>

        <!-- Control 4: Binary Pairs Generated -->
        <div class="mb-4">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <label for="pairsCountRange" class="form-label text-white small fw-bold text-uppercase mb-0" style="letter-spacing: 0.05em;">
              4. Estimated Matched Pairs per Month (Left Team & Right Team)
            </label>
            <span class="text-gold fw-bold fs-5 font-monospace" id="pairsCountVal">10</span>
          </div>
          <input type="range" class="form-range" id="pairsCountRange" min="0" max="100" value="10" step="1">
          <div class="d-flex justify-content-between text-secondary small">
            <span>0 Pairs</span>
            <span>50 Pairs</span>
            <span>100+ Pairs</span>
          </div>
        </div>
      </form>
    </div>

    <!-- Right Column: Live Projected Earnings Output -->
    <div class="col-lg-5">
      <div class="ps-card p-4 text-center" style="background: linear-gradient(135deg, rgba(15, 90, 62, 0.3) 0%, rgba(10, 18, 16, 0.95) 100%); border: 1px solid var(--ps-border-gold); box-shadow: var(--ps-shadow-lg);">
        <span class="badge bg-gold text-dark fw-bold mb-2">PROJECTION SUMMARY</span>
        <div class="text-secondary small text-uppercase" style="letter-spacing: 0.05em;">Estimated Monthly Income</div>
        
        <!-- Big Number -->
        <div class="display-4 fw-bold text-white my-3 d-flex justify-content-center align-items-baseline">
          <span class="text-gold fs-2 me-1">$</span>
          <span id="calcTotalOutput" class="text-white">4,050</span>
          <span class="text-secondary fs-5 ms-1">USD</span>
        </div>

        <div class="text-gold small mb-4 fw-semibold" id="calcTierNotice">
          Platinum Tier: Unlimited daily binary pairing without capping penalty
        </div>

        <!-- Breakdown List -->
        <div class="text-start border-top border-secondary border-opacity-25 pt-3 mb-4">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="small text-secondary">Direct Sponsor Bonuses:</span>
            <span class="small text-white fw-bold" id="calcSponsorSubtotal">$3,600 USD</span>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="small text-secondary">Binary Pairing Commission:</span>
            <span class="small text-white fw-bold" id="calcPairingSubtotal">$300 USD</span>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="small text-secondary">Mobile Stockist Key-In (3%):</span>
            <span class="small text-white fw-bold" id="calcKeyinSubtotal">$150 USD</span>
          </div>
          <div class="d-flex justify-content-between align-items-center pt-2 border-top border-secondary border-opacity-25">
            <span class="small text-secondary">Daily Pairing Limitation:</span>
            <span class="small text-gold fw-bold" id="calcDailyCapStatus">No Cap (Unlimited)</span>
          </div>
        </div>

        <!-- Disclaimers & Action CTA -->
        <p class="text-secondary small mb-3" style="font-size: 0.72rem; line-height: 1.4;">
          *Simulated estimates based on verified PhytoScience direct sponsor percentages (up to 45% on package point values), standard binary pair rates, and stockist key-in overrides. Actual earnings depend on personal diligence, team duplication, active volume, and regional currency conversion rates.
        </p>

        <a href="<?= get_business_url('join.php') ?>" class="btn-ps btn-ps-gold w-100">
          Get Started as a Partner Today
        </a>
      </div>
    </div>

  </div>
</div>

