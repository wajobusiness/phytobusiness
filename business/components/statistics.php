<?php
/**
 * PhytoScience Wellness - Statistics / KPI Component
 * Reusable animated counters driven by IntersectionObserver in main.js.
 */

declare(strict_types=1);

$statsVariant = $statsVariant ?? 'dark'; // 'dark' or 'glass'
?>

<section class="py-5 <?= $statsVariant === 'glass' ? 'ps-section-glass' : 'bg-transparent' ?>" aria-label="Company Statistics">
  <div class="container">
    <div class="ps-card p-4 p-lg-5" style="border: 1px solid var(--ps-border-gold); background: linear-gradient(180deg, rgba(17, 30, 26, 0.85) 0%, rgba(10, 18, 16, 0.95) 100%);">
      <div class="row g-4 text-center">
        
        <!-- Stat 1: Global Footprint -->
        <div class="col-6 col-lg-3">
          <div class="ps-stat-item px-2">
            <div class="display-5 fw-bold text-gold mb-1 d-flex justify-content-center align-items-baseline">
              <span class="ps-counter" data-target="41">0</span>
              <span class="fs-3 ms-1">+</span>
            </div>
            <div class="text-white fw-semibold small text-uppercase" style="letter-spacing: 0.05em;">Global Markets</div>
            <p class="small text-secondary mb-0 mt-1 d-none d-md-block">Active distribution networks across Asia, Africa, and Europe</p>
          </div>
        </div>

        <!-- Stat 2: Active Distributors -->
        <div class="col-6 col-lg-3 border-start-md border-secondary border-opacity-25">
          <div class="ps-stat-item px-2">
            <div class="display-5 fw-bold text-gold mb-1 d-flex justify-content-center align-items-baseline">
              <span class="ps-counter" data-target="100">0</span>
              <span class="fs-3 ms-1">K+</span>
            </div>
            <div class="text-white fw-semibold small text-uppercase" style="letter-spacing: 0.05em;">Global Members</div>
            <p class="small text-secondary mb-0 mt-1 d-none d-md-block">Entrepreneurs building recurring weekly & monthly cash flow</p>
          </div>
        </div>

        <!-- Stat 3: Monthly Volume Milestone -->
        <div class="col-6 col-lg-3 border-start-lg border-secondary border-opacity-25">
          <div class="ps-stat-item px-2">
            <div class="display-5 fw-bold text-gold mb-1 d-flex justify-content-center align-items-baseline">
              <span class="fs-4 me-1">$</span>
              <span class="ps-counter" data-target="15">0</span>
              <span class="fs-3 ms-1">M+</span>
            </div>
            <div class="text-white fw-semibold small text-uppercase" style="letter-spacing: 0.05em;">Peak Monthly Volume</div>
            <p class="small text-secondary mb-0 mt-1 d-none d-md-block">Documented sales velocity achieved in our first 24 months</p>
          </div>
        </div>

        <!-- Stat 4: Corporate Longevity / Payout Reliability -->
        <div class="col-6 col-lg-3 border-start-md border-secondary border-opacity-25">
          <div class="ps-stat-item px-2">
            <div class="display-5 fw-bold text-gold mb-1 d-flex justify-content-center align-items-baseline">
              <span class="ps-counter" data-target="100">0</span>
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

