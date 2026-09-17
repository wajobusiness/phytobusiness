<?php
/**
 * PhytoScience Wellness - Timeline Component
 * Renders corporate milestones or the 7-Step Distributor Success Roadmap.
 * 
 * @var string $timelineMode  'milestones' or 'roadmap'
 */

declare(strict_types=1);

$timelineMode = $timelineMode ?? 'milestones';
?>

<?php if ($timelineMode === 'milestones'): ?>
  <!-- Corporate Milestones Timeline -->
  <div class="ps-timeline position-relative py-4">
    <div class="ps-timeline-line"></div>

    <!-- 2012 -->
    <div class="ps-timeline-item">
      <div class="ps-timeline-marker">
        <span class="ps-timeline-dot"></span>
      </div>
      <div class="ps-timeline-content ps-card p-4">
        <span class="badge bg-gold text-dark fw-bold mb-2">September 6, 2012</span>
        <h4 class="h5 text-white mb-2">Inception in Kuala Lumpur, Malaysia</h4>
        <p class="small text-secondary mb-0">
          Founded by the late visionary Tan Sri Lai Teck Peng with the ambition to transform direct selling through scientifically validated plant stem cell rejuvenation products.
        </p>
      </div>
    </div>

    <!-- 2013 -->
    <div class="ps-timeline-item">
      <div class="ps-timeline-marker">
        <span class="ps-timeline-dot"></span>
      </div>
      <div class="ps-timeline-content ps-card p-4">
        <span class="badge bg-gold text-dark fw-bold mb-2">2013</span>
        <h4 class="h5 text-white mb-2">Exclusive Partnership with Mibelle Biochemistry Switzerland</h4>
        <p class="small text-secondary mb-0">
          Signed landmark master distribution rights with Dr. Fred Zülli for PhytoCellTec™ Malus Domestica and Solar Vitis plant stem cell formulations, launching Crystal Cell and Double Stemcell.
        </p>
      </div>
    </div>

    <!-- 2014 -->
    <div class="ps-timeline-item">
      <div class="ps-timeline-marker">
        <span class="ps-timeline-dot"></span>
      </div>
      <div class="ps-timeline-content ps-card p-4">
        <span class="badge bg-gold text-dark fw-bold mb-2">2014</span>
        <h4 class="h5 text-white mb-2">US $15 Million Monthly Sales & Africa Expansion</h4>
        <p class="small text-secondary mb-0">
          Reached historical monthly revenue records across Southeast Asia and established initial distribution hubs across West and East Africa, including Nigeria, Cameroon, and Ghana.
        </p>
      </div>
    </div>

    <!-- 2017 -->
    <div class="ps-timeline-item">
      <div class="ps-timeline-marker">
        <span class="ps-timeline-dot"></span>
      </div>
      <div class="ps-timeline-content ps-card p-4">
        <span class="badge bg-gold text-dark fw-bold mb-2">2017</span>
        <h4 class="h5 text-white mb-2">Inauguration of Bangi Corporate HQ</h4>
        <p class="small text-secondary mb-0">
          Moved corporate operations into an eight-figure purpose-built corporate headquarters in Bandar Baru Bangi, Selangor, fully unencumbered and debt-free.
        </p>
      </div>
    </div>

    <!-- 2022 -->
    <div class="ps-timeline-item">
      <div class="ps-timeline-marker">
        <span class="ps-timeline-dot"></span>
      </div>
      <div class="ps-timeline-content ps-card p-4">
        <span class="badge bg-gold text-dark fw-bold mb-2">2022</span>
        <h4 class="h5 text-white mb-2">A Decade of Excellence (10th Anniversary)</h4>
        <p class="small text-secondary mb-0">
          Celebrated 10 continuous years of operations, having distributed tens of millions in commission payouts and minted multi-millionaire distributors across 41+ sovereign nations.
        </p>
      </div>
    </div>

    <!-- 2025 -->
    <div class="ps-timeline-item">
      <div class="ps-timeline-marker">
        <span class="ps-timeline-dot"></span>
      </div>
      <div class="ps-timeline-content ps-card p-4">
        <span class="badge bg-gold text-dark fw-bold mb-2">2025 & Beyond</span>
        <h4 class="h5 text-white mb-2">Global Leadership Summits & Digital Modernization</h4>
        <p class="small text-secondary mb-0">
          Global conventions across Kuala Lumpur, Lagos, Nairobi, and Geneva, expanding digital member backoffices, mobile stockist networks, and NextGen cellular nutrition formulas.
        </p>
      </div>
    </div>

  </div>

<?php else: ?>
  <!-- 7-Step Distributor Success Roadmap -->
  <div class="ps-roadmap row g-4">
    
    <?php
    $steps = [
      [
        'step' => '01',
        'title' => 'Select Your Business Tier',
        'desc' => 'Choose between Silver (100 PP), Gold (500 PP), Junior Platinum (1,500 PP), or Platinum / Mobile Stockist (3,000 PP) depending on your capital and revenue ambitions.',
        'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>'
      ],
      [
        'step' => '02',
        'title' => 'Activate Backoffice Access',
        'desc' => 'Receive your secure Member ID and access the official backoffice terminal at app.iphyto.com to track real-time genealogy, e-wallet balances, and order statuses.',
        'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>'
      ],
      [
        'step' => '03',
        'title' => 'Experience the Formulations',
        'desc' => 'Begin consuming Double Stemcell and Crystal Cell firsthand. Authentic personal product conviction is the cornerstone of credible high-converting leadership.',
        'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>'
      ],
      [
        'step' => '04',
        'title' => 'Connect to Academy Training',
        'desc' => 'Leverage weekly leadership webinars, compensation blueprints, scientific product masterclasses with Dr. Fred Zülli, and field marketing materials.',
        'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>'
      ],
      [
        'step' => '05',
        'title' => 'Introduce Your First 2 Leaders',
        'desc' => 'Sponsor one active member on your Left Team and one on your Right Team to immediately unlock your Binary Pairing Commission engine and direct bonuses.',
        'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>'
      ],
      [
        'step' => '06',
        'title' => 'Duplicate & Support Your Depth',
        'desc' => 'Teach your Left and Right partners to duplicate the same 2-person blueprint. Watch pairing points accumulate systematically with 100% carry-forward on strong legs.',
        'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>'
      ],
      [
        'step' => '07',
        'title' => 'Advance Through Global Ranks',
        'desc' => 'Qualify for Star, Diamond, Crown Diamond, and Crown Ambassador ranks. Unlock luxury car incentives, international conventions, and unilevel royalty overrides.',
        'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>'
      ]
    ];
    ?>

    <?php foreach ($steps as $st): ?>
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-4 position-relative">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="display-6 fw-bold text-gold opacity-50 font-monospace"><?= $st['step'] ?></span>
            <div class="ps-icon-box text-gold p-2 rounded-circle" style="background: rgba(198, 164, 92, 0.1); border: 1px solid var(--ps-border-gold);">
              <?= $st['icon'] ?>
            </div>
          </div>
          <h3 class="h5 text-white mb-2"><?= sanitize($st['title']) ?></h3>
          <p class="small text-secondary mb-0" style="line-height: 1.6;"><?= sanitize($st['desc']) ?></p>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
<?php endif; ?>

