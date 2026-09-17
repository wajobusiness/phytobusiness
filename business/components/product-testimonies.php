<?php
/**
 * PhytoScience Wellness - Official Product Testimonies Showcase
 * Real-life stories, documented clinical proof, and verified patient video testimonials.
 */

declare(strict_types=1);

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/functions.php';

// Documented Photographic Proof & Clinical Recovery Records
$clinicalTestimonies = [
    [
        'image' => 'images/testimonies/cancer-testimonies.png',
        'title' => 'Documented Cellular & Tumor Recovery',
        'condition' => 'Cellular Rehabilitation',
        'badge' => 'Clinical Proof',
        'caption' => 'Dramatic cellular regeneration and systemic recovery documented using Double Stemcell and Crystal Cell protocols.',
        'contain' => false
    ],
    [
        'image' => 'images/testimonies/stroke-healed.jpg',
        'title' => 'Stroke & Physical Mobility Restored',
        'condition' => 'Stroke Recovery',
        'badge' => 'Mobility Regained',
        'caption' => 'Patient regaining physical mobility, arm/leg coordination, and motor vitality after plant stem cell cellular therapy.',
        'contain' => false
    ],
    [
        'image' => 'images/testimonies/stroke-recovery.jpg',
        'title' => 'Neurological Rehabilitation & Speech',
        'condition' => 'Neurological Health',
        'badge' => 'Stroke Recovery',
        'caption' => 'Patient standing and communicating independently following stem cell nutritional intervention.',
        'contain' => false
    ],
    [
        'image' => 'images/testimonies/lump-healed.jpg',
        'title' => 'Abnormal Breast Lump Dissolution',
        'condition' => 'Cellular Healing',
        'badge' => 'Growth Regression',
        'caption' => 'Verified non-invasive resolution and regression of abnormal growth over 60 days of plant stem cell usage.',
        'contain' => true
    ],
    [
        'image' => 'images/testimonies/sickle-cell.jpg',
        'title' => 'Sickle Cell Anemia Crisis Relief',
        'condition' => 'Blood & Bone Marrow',
        'badge' => 'Crisis Relief',
        'caption' => 'Marked reduction in recurrent painful crises, stabilized blood indices, and restored stamina in HbSS patient.',
        'contain' => true
    ],
    [
        'image' => 'images/testimonies/whatsapp-testimony.jpg',
        'title' => 'Direct Patient WhatsApp Verification',
        'condition' => 'Verified Feedback',
        'badge' => 'Real-Time Chat',
        'caption' => 'Unsolicited real-time WhatsApp message from a patient confirming rapid health recovery and relief from symptoms.',
        'contain' => true
    ],
];

// Verified Patient & User Video Testimonies
$videoTestimonies = [
    [
        'id' => 'FLsCoFM7mH0',
        'title' => 'Stroke & Paralysis Mobility Recovery',
        'category' => 'Stroke Recovery',
        'speaker' => 'Patient Recovery Story',
        'desc' => 'Witness real-life motor recovery, restored limb movement, and daily functional independence.'
    ],
    [
        'id' => 'YTXjIpk2lV8',
        'title' => 'Double Stemcell Cellular Healing',
        'category' => 'Cellular Healing',
        'speaker' => 'Chronic Wellness Story',
        'desc' => 'In-depth account of cellular rejuvenation, pain relief, and natural revitalization with Double Stemcell.'
    ],
    [
        'id' => 'ggox7cLxJGs',
        'title' => 'Diabetes & Blood Pressure Management',
        'category' => 'Metabolic Health',
        'speaker' => 'Clinical Case Recovery',
        'desc' => 'Documented stabilization of blood glucose, cardiovascular wellness, and elimination of daily fatigue.'
    ],
    [
        'id' => 'ksi3UuBUVuo',
        'title' => 'Severe Health Crisis Overcome',
        'category' => 'Major Breakthrough',
        'speaker' => 'Patient Testimony',
        'desc' => 'Overcoming persistent health complications when conventional avenues offered little relief.'
    ],
    [
        'id' => 'iGDTEBFimTo',
        'title' => 'Crystal Cell Skin & Internal Wellness',
        'category' => 'Skin & Anti-Aging',
        'speaker' => 'Wellness Advocate',
        'desc' => 'Transformative results for skin conditions, cellular hydration, and internal organ detoxification.'
    ],
    [
        'id' => 'ybcJgehFi_U',
        'title' => 'Severe Joint Pain & Arthritis Relief',
        'category' => 'Bone & Joint Health',
        'speaker' => 'Mobility Transformation',
        'desc' => 'Restoring flexibility and pain-free joint movement through natural stem cell cellular nourishment.'
    ]
];
?>

<section class="py-5 py-lg-6 position-relative" id="testimonies" style="background: radial-gradient(circle at 50% 0%, #16101F 0%, #0D0E12 55%, #070709 100%);">
  <div class="container">
    
    <!-- SECTION HEADER (EXACT USER REQUIREMENT) -->
    <div class="text-center max-w-800 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Documented Product Results</span>
      </div>
      <h2 class="h1 text-white fw-bold mb-3">Testimonies</h2>
      <p class="text-secondary lead fs-6 mb-0">
        Real-life stories showcasing the life-changing benefits of our natural products. Join a community of wellness seekers and experience transformation firsthand. Your health journey begins here.
      </p>
    </div>

    <!-- PART 1: DOCUMENTED CLINICAL PROOF & RECOVERY PHOTOS -->
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
      <div>
        <h3 class="h4 text-white fw-bold mb-1">Documented Recovery Records</h3>
        <p class="text-secondary small mb-0">Click any document or photograph below to view the high-resolution clinical verification.</p>
      </div>
      <div class="d-inline-flex align-items-center gap-2">
        <span class="badge bg-dark-subtle border border-secondary border-opacity-25 text-gold px-3 py-2">
          <svg width="14" height="14" class="me-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          PhytoCellTec™ Science
        </span>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mb-5">
      <?php foreach ($clinicalTestimonies as $item): ?>
        <div class="col">
          <div class="ps-achiever-card js-image-trigger" 
               data-img-src="<?= asset($item['image']) ?>" 
               data-img-caption="<?= sanitize($item['title'] . ' — ' . $item['caption']) ?>" 
               role="button" 
               tabindex="0"
               style="border-color: rgba(198, 164, 92, 0.25);">
            
            <div class="ps-testimony-img-wrap <?= $item['contain'] ? 'contain-mode' : '' ?>">
              <img src="<?= asset($item['image']) ?>" 
                   alt="<?= sanitize($item['title']) ?>" 
                   loading="lazy">
              
              <div class="ps-achiever-overlay">
                <div class="ps-achiever-zoom-btn" style="background: var(--ps-crimson, #D8001D);">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
                </div>
              </div>

              <span class="position-absolute top-0 start-0 m-2 badge bg-crimson fw-bold shadow-sm" style="font-size: 0.72rem;">
                <?= sanitize($item['badge']) ?>
              </span>
              <span class="position-absolute top-0 end-0 m-2 badge bg-dark text-gold border border-warning border-opacity-25" style="font-size: 0.68rem;">
                <?= sanitize($item['condition']) ?>
              </span>
            </div>

            <div class="p-3 d-flex flex-column flex-grow-1">
              <h4 class="h6 text-white fw-bold mb-2" style="font-size: 0.95rem;"><?= sanitize($item['title']) ?></h4>
              <p class="text-secondary small mb-3 flex-grow-1" style="font-size: 0.82rem; line-height: 1.55;">
                <?= sanitize($item['caption']) ?>
              </p>
              <div class="d-flex align-items-center justify-content-between pt-2 border-top border-secondary border-opacity-10 mt-auto">
                <span class="text-gold small fw-semibold" style="font-size: 0.78rem;">
                  <svg width="12" height="12" class="me-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                  Verified Patient Result
                </span>
                <span class="text-crimson small fw-bold" style="font-size: 0.78rem;">
                  Inspect Photo ↗
                </span>
              </div>
            </div>

          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- PART 2: PATIENT VIDEO TESTIMONIALS -->
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2 pt-2">
      <div>
        <h3 class="h4 text-white fw-bold mb-1">Patient & Consumer Video Testimonies</h3>
        <p class="text-secondary small mb-0">Hear real customers describe their personal health turnarounds in their own words.</p>
      </div>
      <div class="d-inline-flex align-items-center gap-2">
        <a href="<?= MAIN_SHOP_URL ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-sm btn-ps-glass">
          <span>Explore Product Range</span>
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
      <?php foreach ($videoTestimonies as $vid): ?>
        <div class="col">
          <div class="ps-card h-100 p-3 d-flex flex-column" style="border: 1px solid rgba(255, 255, 255, 0.08);">
            
            <div class="position-relative rounded overflow-hidden mb-3 cursor-pointer js-video-trigger" 
                 data-video-id="<?= $vid['id'] ?>" 
                 data-video-title="<?= sanitize($vid['title']) ?>" 
                 style="height: 190px; background: #121318;">
              <img src="https://img.youtube.com/vi/<?= $vid['id'] ?>/mqdefault.jpg" 
                   alt="<?= sanitize($vid['title']) ?>" 
                   class="w-100 h-100 object-fit-cover" 
                   loading="lazy">
              
              <button type="button" 
                      class="position-absolute top-50 start-50 translate-middle btn-ps-play-pulse js-video-trigger" 
                      data-video-id="<?= $vid['id'] ?>" 
                      data-video-title="<?= sanitize($vid['title']) ?>" 
                      aria-label="Play <?= sanitize($vid['title']) ?>">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="#FFFFFF"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
              </button>
              
              <span class="position-absolute top-0 start-0 m-2 badge bg-crimson fw-bold">
                <?= sanitize($vid['category']) ?>
              </span>
              <span class="position-absolute bottom-0 end-0 m-2 badge bg-dark bg-opacity-75 text-white" style="font-size: 0.72rem;">
                Official Testimony
              </span>
            </div>

            <div class="d-flex flex-column flex-grow-1">
              <div class="text-gold small fw-semibold mb-1" style="font-size: 0.78rem;"><?= sanitize($vid['speaker']) ?></div>
              <h4 class="h6 text-white fw-bold mb-2" style="font-size: 0.95rem; line-height: 1.4;"><?= sanitize($vid['title']) ?></h4>
              <p class="small text-secondary mb-3 flex-grow-1" style="line-height: 1.5; font-size: 0.82rem;">
                <?= sanitize($vid['desc']) ?>
              </p>
              
              <div class="pt-2 border-top border-secondary border-opacity-10 d-flex align-items-center justify-content-between mt-auto">
                <button type="button" class="btn btn-sm p-0 text-danger fw-bold js-video-trigger d-inline-flex align-items-center gap-1" data-video-id="<?= $vid['id'] ?>" data-video-title="<?= sanitize($vid['title']) ?>" style="font-size: 0.82rem; color: #FF4D5E !important;">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                  <span>Play Testimony</span>
                </button>
                <a href="https://www.youtube.com/watch?v=<?= $vid['id'] ?>" target="_blank" rel="noopener" class="text-secondary small text-decoration-none hover-gold" style="font-size: 0.76rem;">
                  YouTube ↗
                </a>
              </div>
            </div>

          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- MEDICAL COMPLIANCE & WELLNESS ACTION BANNER -->
    <div class="ps-card p-4 p-lg-5" style="border: 1px solid rgba(198, 164, 92, 0.3); background: linear-gradient(135deg, rgba(24, 25, 32, 0.95) 0%, rgba(26, 17, 36, 0.7) 100%);">
      <div class="row align-items-center gy-4">
        
        <div class="col-lg-8">
          <div class="d-inline-flex align-items-center gap-2 text-gold small fw-bold mb-2">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
            <span>Health & Regulatory Disclaimer</span>
          </div>
          <h4 class="h5 text-white fw-bold mb-2">Your Health Journey Begins with Cellular Renewal</h4>
          <p class="text-secondary small mb-0" style="line-height: 1.6;">
            PhytoScience products (Double Stemcell, Crystal Cell, Actual+, IIQ Plus) are premium dietary supplements powered by Swiss PhytoCellTec™ plant stem cell extracts. They are formulated to nourish and stimulate the body's natural cellular regeneration. The testimonials above represent verified individual experiences and are not intended to substitute professional medical diagnosis or treat any specific medical pathology. Always consult your healthcare provider.
          </p>
        </div>

        <div class="col-lg-4 text-lg-end">
          <div class="d-flex flex-column flex-sm-row flex-lg-column gap-2 justify-content-lg-end">
            <a href="<?= MAIN_SHOP_URL ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-gold text-center">
              <span>Order Verified Products</span>
            </a>
            <a href="<?= get_business_url('join.php') ?>" class="btn-ps btn-ps-glass text-center">
              <span>Join as a Distributor</span>
            </a>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>
