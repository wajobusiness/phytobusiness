<?php
/**
 * PhytoScience Wellness - Gallery Page (gallery.php)
 * Categorized media showcase featuring corporate events, scientific keynotes, car deliveries, and travel incentives.
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Video & Media Gallery | PhytoScience International Conventions & Proof';
$pageDescription = 'Explore our official video archive: corporate galas, Dr. Fred Zülli scientific lectures, luxury car deliveries, and global incentive trips in South Korea, Australia, and Africa.';
$canonicalUrl = get_business_url('gallery.php');

require __DIR__ . '/includes/header.php';
require_once __DIR__ . '/components/cards.php';

$mediaItems = [
  [
    'id' => 'hSWI5_NXxWk',
    'title' => 'PhytoScience Corporate Overview & Vision',
    'category' => 'corporate',
    'category_name' => 'Corporate Overview',
    'desc' => 'The story of our founding in 2012, debt-free global headquarters, and global expansion across 41+ nations.'
  ],
  [
    'id' => 'KVqWChK6fdI',
    'title' => 'Dr. Fred Zülli on PhytoCellTec™ Science',
    'category' => 'science',
    'category_name' => 'Scientific Keynote',
    'desc' => 'Mibelle Biochemistry founder explains how plant stem cell extracts stimulate and protect human cellular longevity.'
  ],
  [
    'id' => 'b0pV9MrxnNk',
    'title' => 'Grand Recognition & Award Ceremony 2025',
    'category' => 'conventions',
    'category_name' => 'Conventions',
    'desc' => 'Annual global convention celebrating top-earning distributors, Diamond rank achievers, and new car qualifiers.'
  ],
  [
    'id' => 'kY5t2OTxVPo',
    'title' => 'PhytoScience 10th Anniversary Milestone Gala',
    'category' => 'conventions',
    'category_name' => 'Conventions',
    'desc' => 'A decade of transforming lives, continuous daily payouts, and debt-free direct selling excellence.'
  ],
  [
    'id' => 'HSqDO3Wz1Lw',
    'title' => 'Super Cars Incentive Handover Ceremony',
    'category' => 'cars',
    'category_name' => 'Car Incentives',
    'desc' => 'Keys handed over to top leaders for luxury vehicles funded entirely by PhytoScience car performance bonuses.'
  ],
  [
    'id' => 'E0IaPc9CC4M',
    'title' => 'African Tour & Leadership Masterclass',
    'category' => 'tours',
    'category_name' => 'Regional Tours',
    'desc' => 'Empowerment seminars across West and East Africa including Nigeria, Cameroon, Kenya, and Ghana.'
  ],
  [
    'id' => 'SZJWXkLCeeQ',
    'title' => 'Seoul, South Korea VIP Incentive Tour',
    'category' => 'travel',
    'category_name' => 'Travel Incentives',
    'desc' => 'Hundreds of global qualifiers exploring Seoul with luxury five-star accommodations and VIP dining.'
  ],
  [
    'id' => 'j_AgHotA_Ak',
    'title' => 'Perth, Australia Leadership Expedition',
    'category' => 'travel',
    'category_name' => 'Travel Incentives',
    'desc' => 'Distributor achievers celebrating corporate milestones across Western Australia’s scenic landmarks.'
  ],
  [
    'id' => 'DnoJ6-e4xtE',
    'title' => 'Asia Success Award & Industry Honors',
    'category' => 'corporate',
    'category_name' => 'Corporate Overview',
    'desc' => 'Formal recognition of PhytoScience as an ethical, compliant, and rapidly growing direct sales titan in Asia.'
  ],
];
?>

<!-- 1. SUBPAGE HERO -->
<?php
$heroBadge = 'Official Media Archive';
$heroTitle = 'See the Movement in <span class="text-gold">Full Motion</span>';
$heroSubtitle = 'From Dr. Fred Zülli\'s scientific keynote presentations in Europe to roaring crowds at our 10,000-seat conventions in Asia and Africa, explore the living proof of PhytoScience.';
$heroIsSubpage = true;
$heroBreadcrumbs = [
  ['title' => 'Media & Resources', 'url' => ''],
  ['title' => 'Video Gallery', 'url' => '']
];
$heroCtaPrimaryText = 'Join PhytoScience Now';
$heroCtaPrimaryUrl = get_business_url('join.php');
$heroCtaSecondaryText = 'Read Success Stories';
$heroCtaSecondaryUrl = get_business_url('success-stories.php');

require __DIR__ . '/components/hero.php';
?>

<!-- 2. CATEGORIZED FILTER TABS & MEDIA GRID -->
<section class="py-5 py-lg-6 position-relative">
  <div class="container">
    
    <!-- Filter Buttons Bar -->
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
      <button type="button" class="btn-ps btn-ps-sm btn-ps-gold js-gallery-filter active" data-filter="all">All Media (9)</button>
      <button type="button" class="btn-ps btn-ps-sm btn-ps-glass js-gallery-filter" data-filter="conventions">Conventions</button>
      <button type="button" class="btn-ps btn-ps-sm btn-ps-glass js-gallery-filter" data-filter="science">Scientific Keynotes</button>
      <button type="button" class="btn-ps btn-ps-sm btn-ps-glass js-gallery-filter" data-filter="cars">Super Cars</button>
      <button type="button" class="btn-ps btn-ps-sm btn-ps-glass js-gallery-filter" data-filter="travel">Travel Incentives</button>
      <button type="button" class="btn-ps btn-ps-sm btn-ps-glass js-gallery-filter" data-filter="corporate">Corporate</button>
    </div>

    <!-- Media Cards Grid -->
    <div class="row g-4" id="galleryGrid">
      <?php foreach ($mediaItems as $item): ?>
        <div class="col-md-6 col-lg-4 gallery-item" data-category="<?= $item['category'] ?>">
          <div class="ps-card h-100 p-3 d-flex flex-column">
            
            <div class="position-relative rounded overflow-hidden mb-3 cursor-pointer js-video-trigger" data-video-id="<?= $item['id'] ?>" data-video-title="<?= sanitize($item['title']) ?>" style="height: 220px; background: #181920;">
              <img src="https://img.youtube.com/vi/<?= $item['id'] ?>/hqdefault.jpg" alt="<?= sanitize($item['title']) ?>" class="w-100 h-100 object-fit-cover">
              
              <button type="button" class="position-absolute top-50 start-50 translate-middle btn-ps-play-pulse js-video-trigger" data-video-id="<?= $item['id'] ?>" data-video-title="<?= sanitize($item['title']) ?>" aria-label="Play <?= sanitize($item['title']) ?>">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="#FFFFFF"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
              </button>

              <span class="position-absolute top-0 start-0 m-2 badge bg-crimson fw-bold">
                <?= sanitize($item['category_name']) ?>
              </span>
            </div>

            <h3 class="h5 text-white mb-2"><?= sanitize($item['title']) ?></h3>
            <p class="small text-secondary mb-3 flex-grow-1" style="line-height: 1.55;"><?= sanitize($item['desc']) ?></p>

            <button type="button" class="btn-ps btn-ps-sm btn-ps-outline-crimson w-100 js-video-trigger mt-auto" data-video-id="<?= $item['id'] ?>" data-video-title="<?= sanitize($item['title']) ?>">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" class="me-1"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
              <span>Watch Video</span>
            </button>

          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- 3. DOWNLOADABLE MARKETING RESOURCES BOX -->
<section class="py-5 position-relative" style="background: rgba(6, 38, 26, 0.35);">
  <div class="container">
    <div class="ps-card p-4 p-lg-5">
      <div class="row align-items-center gy-4">
        
        <div class="col-lg-8">
          <span class="badge bg-gold text-dark fw-bold mb-2">FIELD ASSETS</span>
          <h2 class="h3 text-white mb-2">Official Presentation & Distributor Toolkits</h2>
          <p class="text-secondary small mb-0" style="line-height: 1.6;">
            Need marketing assets for your next local presentation? Enrolled members receive instant access to official high-resolution corporate slide decks, Dr. Fred Zülli scientific brochures, compensation plan PDF blueprints, and social media media packs via the member backoffice.
          </p>
        </div>

        <div class="col-lg-4 text-lg-end">
          <a href="<?= MEMBER_LOGIN_URL ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-gold">
            Access Member Backoffice
          </a>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- Vanilla JS Gallery Filter Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const filterButtons = document.querySelectorAll('.js-gallery-filter');
  const galleryItems = document.querySelectorAll('.gallery-item');

  filterButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      filterButtons.forEach(b => {
        b.classList.remove('btn-ps-gold', 'active');
        b.classList.add('btn-ps-glass');
      });

      btn.classList.remove('btn-ps-glass');
      btn.classList.add('btn-ps-gold', 'active');

      const filter = btn.getAttribute('data-filter');

      galleryItems.forEach(item => {
        if (filter === 'all' || item.getAttribute('data-category') === filter) {
          item.style.display = 'block';
          item.classList.add('animate-fade-in');
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
});
</script>

<!-- 4. PRE-FOOTER CTA -->
<?php
$ctaTitle = 'Experience PhytoScience on the Inside';
$ctaSubtitle = 'Take your seat at the next international convention. Select your business package and join over 100,000 successful distributors worldwide.';
$ctaPrimaryText = 'Choose Your Business Tier';
$ctaPrimaryUrl = get_business_url('membership.php');

require __DIR__ . '/components/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>

