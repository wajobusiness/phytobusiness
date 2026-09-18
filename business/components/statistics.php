<?php
/**
 * PhytoScience Wellness - Statistics / KPI Component
 * Reusable animated counters driven by IntersectionObserver in main.js.
 */

declare(strict_types=1);

$statsVariant = $statsVariant ?? 'dark';
?>

<section class="py-5 bg-transparent" aria-label="Company Statistics">
  <div class="container">
    <div class="ps-card p-4 p-lg-5" style="border: 1px solid var(--ps-border-crimson); background: linear-gradient(180deg, rgba(24, 25, 32, 0.95) 0%, rgba(10, 11, 14, 0.98) 100%);">
      <div class="row g-4 text-center">
        
        <!-- Stat 1: Global Footprint -->
        <div class="col-6 col-lg-3">
          <div class="ps-stat-item px-2">
            <div class="display-5 fw-bold text-crimson mb-1 d-flex justify-content-center align-items-baseline">
              <span class="ps-counter" data-counter-target="1" data-target="1">1</span>
              <span class="fs-3 ms-1">B+</span>
            </div>
            <div class="text-white fw-semibold small text-uppercase" style="letter-spacing: 0.05em;">Global Markets</div>
            <p class="small text-secondary mb-0 mt-1 d-none d-md-block">Active distribution networks across Asia, Africa, and Europe</p>
          </div>
        </div>

        <!-- Stat 2: Active Distributors -->
        <div class="col-6 col-lg-3 border-start-md border-secondary border-opacity-25">
          <div class="ps-stat-item px-2">
            <div class="display-5 fw-bold text-crimson mb-1 d-flex justify-content-center align-items-baseline">
              <span class="ps-counter" data-counter-target="25" data-target="25">25</span>
              <span class="fs-3 ms-1">M+</span>
            </div>
            <div class="text-white fw-semibold small text-uppercase" style="letter-spacing: 0.05em;">Global Members</div>
            <p class="small text-secondary mb-0 mt-1 d-none d-md-block">Entrepreneurs building recurring weekly & monthly cash flow</p>
          </div>
        </div>

        <!-- Stat 3: Monthly Volume Milestone -->
        <div class="col-6 col-lg-3 border-start-lg border-secondary border-opacity-25">
          <div class="ps-stat-item px-2">
            <div class="display-5 fw-bold text-crimson mb-1 d-flex justify-content-center align-items-baseline">
              <span class="fs-4 me-1">$</span>
              <span class="ps-counter" data-counter-target="350" data-target="350">350</span>
              <span class="fs-3 ms-1">M+</span>
            </div>
            <div class="text-white fw-semibold small text-uppercase" style="letter-spacing: 0.05em;">Peak Monthly Volume</div>
            <p class="small text-secondary mb-0 mt-1 d-none d-md-block">Documented sales velocity achieved across our global markets</p>
          </div>
        </div>

        <!-- Stat 4: Corporate Longevity / Payout Reliability -->
        <div class="col-6 col-lg-3 border-start-md border-secondary border-opacity-25">
          <div class="ps-stat-item px-2">
            <div class="display-5 fw-bold text-crimson mb-1 d-flex justify-content-center align-items-baseline">
              <span class="ps-counter" data-counter-target="100" data-target="100">100</span>
              <span class="fs-3 ms-1">%</span>
            </div>
            <div class="text-white fw-semibold small text-uppercase" style="letter-spacing: 0.05em;">Daily Payout Record</div>
            <p class="small text-secondary mb-0 mt-1 d-none d-md-block">Zero commission defaults since incorporation on Sept 6, 2012</p>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
