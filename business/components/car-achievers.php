<?php
/**
 * PhytoScience Wellness - Millionaires & Car Achievers Showcase
 * Verified car winners, luxury vehicle handover ceremonies, and African leadership spotlight.
 */

declare(strict_types=1);

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/functions.php';

$carAchievers = [
    [
        'image' => 'assets/images/achievers/car-achiever-1.jpg',
        'title' => 'Mercedes-Benz SUV Handover',
        'leader' => 'Top Leadership Achiever',
        'location' => 'Lagos, Nigeria',
        'badge' => 'Car Bonus Winner',
        'desc' => 'Celebrated with keys to a brand-new luxury Mercedes-Benz SUV fully subsidized through company binary incentives.'
    ],
    [
        'image' => 'assets/images/achievers/car-achiever-2.jpg',
        'title' => 'Toyota Fortuner Executive Delivery',
        'leader' => 'Regional Diamond Leader',
        'location' => 'Abuja, Nigeria',
        'badge' => 'Diamond Achiever',
        'desc' => 'Honored at the African Convention for outstanding team duplication and leadership rank advancement.'
    ],
    [
        'image' => 'assets/images/achievers/car-achiever-3.jpg',
        'title' => 'Executive Sedan Key Presentation',
        'leader' => 'Crown Diamond Qualifier',
        'location' => 'Kuala Lumpur / Global',
        'badge' => 'Super Car Bonus',
        'desc' => 'Awarded on the international convention stage before 10,000 global distributors.'
    ],
    [
        'image' => 'assets/images/achievers/car-achiever-4.jpg',
        'title' => 'Brand-New Vehicle Celebration',
        'leader' => 'African Growth Champion',
        'location' => 'Port Harcourt, Nigeria',
        'badge' => 'Car Awardee',
        'desc' => 'Turned a Silver package start into a multi-million turnover network driving a company car.'
    ],
    [
        'image' => 'assets/images/achievers/car-achiever-5.jpg',
        'title' => 'Mercedes-Benz Luxury Handover',
        'leader' => 'Top Producer & Mentor',
        'location' => 'Douala, Cameroon',
        'badge' => 'Luxury Qualifier',
        'desc' => 'Recognized with full corporate car sponsorship following back-to-back Diamond qualifications.'
    ],
    [
        'image' => 'assets/images/achievers/car-achiever-6.jpg',
        'title' => 'Company-Sponsored Luxury SUV',
        'leader' => 'Mobile Stockist Operator',
        'location' => 'Accra, Ghana',
        'badge' => 'Stockist Leader',
        'desc' => 'Leveraged 3%–5% key-in overrides and team pairing to achieve executive car qualification.'
    ],
    [
        'image' => 'assets/images/achievers/car-achiever-7.jpg',
        'title' => 'Female Leadership Car Award',
        'leader' => 'Top Women Achievers Hub',
        'location' => 'Nairobi, Kenya',
        'badge' => 'Executive Achiever',
        'desc' => 'Empowering women entrepreneurs across East Africa while driving a brand-new luxury vehicle.'
    ],
    [
        'image' => 'assets/images/achievers/car-achiever-8.jpg',
        'title' => 'Global Convention Key Presentation',
        'leader' => 'International Star Leader',
        'location' => 'Bangkok / Global Tour',
        'badge' => 'Global Recognition',
        'desc' => 'Presented with executive car keys by corporate executives during the international celebration.'
    ],
    [
        'image' => 'assets/images/achievers/car-achiever-9.jpg',
        'title' => 'Convention Stage Key Ceremony',
        'leader' => 'Multi-Tier Leader',
        'location' => 'Selangor, Malaysia',
        'badge' => 'Convention Gala',
        'desc' => 'Standing tall on stage celebrating life-changing financial breakthroughs and luxury car rewards.'
    ],
    [
        'image' => 'assets/images/achievers/car-achiever-10.jpg',
        'title' => 'Executive Car Delivery Ceremony',
        'leader' => 'Team Builder Elite',
        'location' => 'Kinshasa / Central Africa',
        'badge' => 'Car Winner',
        'desc' => 'Proving that dedication to the 7-step blueprint produces brand-new car keys in hand.'
    ],
    [
        'image' => 'assets/images/achievers/car-achiever-11.jpg',
        'title' => 'Official Car Celebration Rally',
        'leader' => 'Diamond Achiever',
        'location' => 'Lagos, Nigeria',
        'badge' => 'Super Car Rally',
        'desc' => 'Celebrated with team members, music, and official key presentation at the Lagos regional center.'
    ],
    [
        'image' => 'assets/images/achievers/car-achiever-12.jpg',
        'title' => 'Ceremonial Key Handover Gala',
        'leader' => 'Crown Ambassador Leader',
        'location' => 'African Summit Tour',
        'badge' => 'Millionaire Achiever',
        'desc' => 'Unlocking generational wealth and luxury vehicle incentives as a verified PhytoScience millionaire.'
    ]
];
?>

<section class="py-5 py-lg-6 position-relative" id="millionaires-car-achievers" style="background: radial-gradient(circle at 50% 0%, #1A0D11 0%, #0D0E12 60%, #070709 100%);">
  <div class="container">
    
    <!-- SECTION HEADER -->
    <div class="text-center max-w-800 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Documented Proof of Wealth & Luxury Incentives</span>
      </div>
      <h2 class="h1 text-white fw-bold mb-3">
        Become One of the <span class="text-crimson">PhytoScience Millionaires</span>
      </h2>
      <p class="text-secondary lead fs-6 mb-0">
        Unlock extraordinary wealth by partnering with the global pioneer in plant stem cell therapy. Real distributors who started with modest capital, duplicated our blueprint, and were rewarded with brand-new luxury cars, debt-free living, and executive financial freedom.
      </p>
    </div>

    <!-- LEADER SPOTLIGHT: HENRY OKOCHA & AFRICAN SUCCESS -->
    <div class="ps-card p-4 p-lg-5 mb-5 position-relative overflow-hidden" style="border: 1px solid rgba(216, 0, 29, 0.35); background: linear-gradient(135deg, rgba(24, 25, 32, 0.95) 0%, rgba(35, 12, 17, 0.7) 100%);">
      <div class="row g-4 align-items-center">
        
        <!-- Left: Leader Portrait -->
        <div class="col-lg-4 text-center">
          <div class="position-relative d-inline-block">
            <div class="rounded-4 overflow-hidden shadow-lg mx-auto" style="max-width: 280px; border: 3px solid var(--ps-border-crimson);">
              <img src="<?= asset('images/achievers/henry-okocha.jpg') ?>" alt="Henry Okocha - Visionary African Leader" class="w-100 h-auto object-fit-cover d-block">
            </div>
            <span class="position-absolute bottom-0 start-50 translate-middle-x mb-n2 badge bg-crimson px-3 py-2 fw-bold text-uppercase shadow" style="letter-spacing: 0.05em; font-size: 0.75rem; white-space: nowrap;">
              Top Visionary Leader
            </span>
          </div>
          <h3 class="h5 text-white fw-bold mt-3 mb-1">Henry Okocha</h3>
          <p class="small text-gold mb-0 fw-semibold">Visionary Leader, Professional Networker & Father</p>
        </div>

        <!-- Right: The Millionaire Movement Story -->
        <div class="col-lg-8">
          <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-dark border border-danger border-opacity-25 text-crimson small fw-bold mb-3">
            <span>AFRICAN LEADERSHIP SPOTLIGHT</span>
          </div>
          <h3 class="h3 text-white fw-bold mb-3">
            “We Are Creating Millionaires in Africa”
          </h3>
          <blockquote class="text-secondary fs-6 fst-italic mb-4" style="line-height: 1.7; border-left: 3px solid #D8001D; padding-left: 1.25rem;">
            “In my many years in the network marketing industry, it is very difficult to find a company that pairs scientifically authentic, patented Swiss products with an uncapped daily compensation plan that pays without excuses.
            <br><br>
            What you find often is good products with a poor pay plan, or a lucrative pay plan with substandard products. To find a company where both are world-class is rare — that is why you should count yourself lucky if you stumbled upon <strong>PhytoScience</strong>. Today, our members are driving brand-new cars, owning homes, and creating generational wealth. You can be next.”
          </blockquote>

          <!-- Key Metrics Strip -->
          <div class="row g-3 text-center text-sm-start">
            <div class="col-sm-4">
              <div class="p-3 rounded bg-dark-subtle border border-secondary border-opacity-25">
                <div class="h3 text-gold fw-bold mb-0">100+</div>
                <div class="small text-secondary">Luxury Cars Awarded</div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="p-3 rounded bg-dark-subtle border border-secondary border-opacity-25">
                <div class="h3 text-crimson fw-bold mb-0">Daily Payout</div>
                <div class="small text-secondary">USD E-Wallet Cash</div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="p-3 rounded bg-dark-subtle border border-secondary border-opacity-25">
                <div class="h3 text-white fw-bold mb-0">41+ Nations</div>
                <div class="small text-secondary">Debt-Free Global Reach</div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- CAR ACHIEVERS PHOTO GALLERY GRID -->
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
      <div>
        <h3 class="h4 text-white fw-bold mb-1">Official Car Handover Ceremonies</h3>
        <p class="text-secondary small mb-0">Click any photo below to inspect official car key presentations and ceremony highlights.</p>
      </div>
      <div class="d-inline-flex align-items-center gap-2">
        <button type="button" class="btn-ps btn-ps-sm btn-ps-outline-crimson js-video-trigger" data-video-id="HSqDO3Wz1Lw" data-video-title="PhytoScience Super Cars Achievers">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
          <span>Watch Car Handover Video</span>
        </button>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3 mb-5">
      <?php foreach ($carAchievers as $index => $item): ?>
        <div class="col">
          <div class="ps-achiever-card js-image-trigger" data-img-src="<?= asset($item['image']) ?>" data-img-caption="<?= sanitize($item['title'] . ' — ' . $item['leader'] . ' (' . $item['location'] . ')') ?>" role="button" tabindex="0">
            <div class="ps-achiever-img-wrap">
              <img src="<?= asset($item['image']) ?>" alt="<?= sanitize($item['title']) ?>" loading="lazy">
              <div class="ps-achiever-overlay">
                <div class="ps-achiever-zoom-btn">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                </div>
              </div>
              <span class="position-absolute top-0 start-0 m-2 badge bg-crimson fw-bold shadow-sm" style="font-size: 0.7rem;">
                <?= sanitize($item['badge']) ?>
              </span>
            </div>
            <div class="p-3 d-flex flex-column flex-grow-1">
              <h4 class="h6 text-white fw-bold mb-1" style="font-size: 0.92rem;"><?= sanitize($item['title']) ?></h4>
              <div class="small text-gold fw-semibold mb-1" style="font-size: 0.8rem;"><?= sanitize($item['leader']) ?></div>
              <div class="text-secondary small mb-2" style="font-size: 0.78rem;">
                <svg width="12" height="12" class="text-crimson me-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                <?= sanitize($item['location']) ?>
              </div>
              <p class="text-secondary small mb-0 mt-auto" style="font-size: 0.76rem; line-height: 1.45;">
                <?= sanitize($item['desc']) ?>
              </p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- PRE-REGISTRATION ACTION BANNER -->
    <div class="p-4 p-lg-5 rounded-4 text-center position-relative overflow-hidden" style="background: linear-gradient(135deg, rgba(216, 0, 29, 0.15) 0%, rgba(24, 25, 32, 0.95) 100%); border: 1px solid rgba(216, 0, 29, 0.4);">
      <div class="max-w-700 mx-auto">
        <h3 class="h3 text-white fw-bold mb-2">Ready to Drive Your Own PhytoScience Car?</h3>
        <p class="text-secondary fs-6 mb-4">
          Every distributor pictured above started with the same decision: choosing a package and committing to the system. Choose your package tier now or talk directly with our leadership team on WhatsApp.
        </p>
        <div class="d-flex align-items-center justify-content-center flex-wrap gap-3">
          <a href="<?= get_business_url('membership.php') ?>" class="btn-ps btn-ps-primary btn-ps-lg">
            <span>Explore Package Tiers</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
          <a href="<?= get_business_url('join.php') ?>" class="btn-ps btn-ps-gold btn-ps-lg">
            <span>Join Our Winning Team</span>
          </a>
          <a href="<?= WHATSAPP_LINK ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-glass btn-ps-lg">
            <span>Chat on WhatsApp</span>
          </a>
        </div>
      </div>
    </div>

  </div>
</section>
