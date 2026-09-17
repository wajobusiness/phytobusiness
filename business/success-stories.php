<?php
/**
 * PhytoScience Wellness - Success Stories Page (success-stories.php)
 * Real distributor testimonials, car achiever showcases, international travel qualifiers, and video proof.
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Success Stories & Global Achievers | PhytoScience Wellness';
$pageDescription = 'Witness real-life transformations from PhytoScience distributors across 41+ countries. Watch verified car achievers, international convention galas, and leadership summits.';
$canonicalUrl = get_business_url('success-stories.php');

require __DIR__ . '/includes/header.php';
require_once __DIR__ . '/components/cards.php';
?>

<!-- 1. SUBPAGE HERO -->
<?php
$heroBadge = 'Global Achievers & Documented Results';
$heroTitle = 'Real People. Extraordinary Transformations. <span class="text-gold">Proven Payouts.</span>';
$heroSubtitle = 'Over 13 years, PhytoScience has helped thousands of men and women escape financial stress, retire corporate debt, drive luxury vehicles, and see the world in style.';
$heroIsSubpage = true;
$heroBreadcrumbs = [
  ['title' => 'Proof & Media', 'url' => ''],
  ['title' => 'Success Stories', 'url' => '']
];
$heroCtaPrimaryText = 'Start Your Success Story';
$heroCtaPrimaryUrl = get_business_url('join.php');
$heroCtaSecondaryText = 'Watch Car Handover Video';
$heroVideoId = 'HSqDO3Wz1Lw';

require __DIR__ . '/components/hero.php';
?>

<!-- 2. FEATURED VIDEO SHOWCASES -->
<section class="py-5 py-lg-6 position-relative" id="video-proof">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Documented Milestones</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Watch Our Global Achievers</h2>
      <p class="text-secondary lead fs-6 mb-0">
        Click any event below to experience the grandeur of PhytoScience conventions and life-changing incentive ceremonies.
      </p>
    </div>

    <div class="row g-4">
      
      <!-- Video 1: Grand Recognition -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-3">
          <div class="position-relative rounded overflow-hidden mb-3 cursor-pointer js-video-trigger" data-video-id="b0pV9MrxnNk" data-video-title="PhytoScience Grand Recognition & Award Ceremony" style="height: 200px; background: #181920;">
            <img src="https://img.youtube.com/vi/b0pV9MrxnNk/mqdefault.jpg" alt="Grand Recognition 2025" class="w-100 h-100 object-fit-cover">
            <button type="button" class="position-absolute top-50 start-50 translate-middle btn-ps-play-pulse js-video-trigger" data-video-id="b0pV9MrxnNk" data-video-title="PhytoScience Grand Recognition & Award Ceremony" aria-label="Play Grand Recognition Video">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="#FFFFFF"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
            </button>
            <span class="position-absolute top-0 start-0 m-2 badge bg-crimson fw-bold">Grand Convention</span>
          </div>
          <h3 class="h5 text-white mb-1">Grand Recognition & Award Gala</h3>
          <p class="small text-secondary mb-0">
            Over 10,000 distributors gather in Malaysia to honor new Diamonds, luxury trip qualifiers, and multi-million ringgit earners.
          </p>
        </div>
      </div>

      <!-- Video 2: Super Cars -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-3">
          <div class="position-relative rounded overflow-hidden mb-3 cursor-pointer js-video-trigger" data-video-id="HSqDO3Wz1Lw" data-video-title="PhytoScience Super Cars Achievers" style="height: 200px; background: #181920;">
            <img src="https://img.youtube.com/vi/HSqDO3Wz1Lw/mqdefault.jpg" alt="PhytoScience Super Cars Achievers" class="w-100 h-100 object-fit-cover">
            <button type="button" class="position-absolute top-50 start-50 translate-middle btn-ps-play-pulse js-video-trigger" data-video-id="HSqDO3Wz1Lw" data-video-title="PhytoScience Super Cars Achievers" aria-label="Play Super Cars Video">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="#FFFFFF"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
            </button>
            <span class="position-absolute top-0 start-0 m-2 badge bg-crimson fw-bold">Car Incentive</span>
          </div>
          <h3 class="h5 text-white mb-1">Super Car Bonus Achievers</h3>
          <p class="small text-secondary mb-0">
            Witness our top leaders receiving keys to Mercedes-Benz, BMW, Porsche, and luxury SUVs fully subsidized through company bonuses.
          </p>
        </div>
      </div>

      <!-- Video 3: African Tour -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-3">
          <div class="position-relative rounded overflow-hidden mb-3 cursor-pointer js-video-trigger" data-video-id="E0IaPc9CC4M" data-video-title="PhytoScience African Leadership Tour" style="height: 200px; background: #181920;">
            <img src="https://img.youtube.com/vi/E0IaPc9CC4M/mqdefault.jpg" alt="PhytoScience African Tour" class="w-100 h-100 object-fit-cover">
            <button type="button" class="position-absolute top-50 start-50 translate-middle btn-ps-play-pulse js-video-trigger" data-video-id="E0IaPc9CC4M" data-video-title="PhytoScience African Leadership Tour" aria-label="Play African Tour Video">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="#FFFFFF"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
            </button>
            <span class="position-absolute top-0 start-0 m-2 badge bg-crimson fw-bold">African Tour</span>
          </div>
          <h3 class="h5 text-white mb-1">African Leadership & Impact Tour</h3>
          <p class="small text-secondary mb-0">
            Empowering tens of thousands of entrepreneurs across Lagos, Abuja, Yaoundé, Nairobi, and Abidjan with financial independence.
          </p>
        </div>
      </div>

      <!-- Video 4: Seoul Trip -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-3">
          <div class="position-relative rounded overflow-hidden mb-3 cursor-pointer js-video-trigger" data-video-id="SZJWXkLCeeQ" data-video-title="PhytoScience Seoul Incentive Trip" style="height: 200px; background: #181920;">
            <img src="https://img.youtube.com/vi/SZJWXkLCeeQ/mqdefault.jpg" alt="Seoul Incentive Trip" class="w-100 h-100 object-fit-cover">
            <button type="button" class="position-absolute top-50 start-50 translate-middle btn-ps-play-pulse js-video-trigger" data-video-id="SZJWXkLCeeQ" data-video-title="PhytoScience Seoul Incentive Trip" aria-label="Play Seoul Trip Video">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="#FFFFFF"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
            </button>
            <span class="position-absolute top-0 start-0 m-2 badge bg-crimson fw-bold">Travel Incentive</span>
          </div>
          <h3 class="h5 text-white mb-1">Seoul, South Korea VIP Incentive</h3>
          <p class="small text-secondary mb-0">
            Five-star accommodation, cultural tours, and VIP gala dining in Seoul for hundreds of global distributor qualifiers.
          </p>
        </div>
      </div>

      <!-- Video 5: Perth Trip -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-3">
          <div class="position-relative rounded overflow-hidden mb-3 cursor-pointer js-video-trigger" data-video-id="j_AgHotA_Ak" data-video-title="PhytoScience Perth Australia Incentive Trip" style="height: 200px; background: #181920;">
            <img src="https://img.youtube.com/vi/j_AgHotA_Ak/mqdefault.jpg" alt="Perth Australia Incentive Trip" class="w-100 h-100 object-fit-cover">
            <button type="button" class="position-absolute top-50 start-50 translate-middle btn-ps-play-pulse js-video-trigger" data-video-id="j_AgHotA_Ak" data-video-title="PhytoScience Perth Australia Incentive Trip" aria-label="Play Perth Trip Video">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="#FFFFFF"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
            </button>
            <span class="position-absolute top-0 start-0 m-2 badge bg-crimson fw-bold">Travel Incentive</span>
          </div>
          <h3 class="h5 text-white mb-1">Perth, Australia Leadership Experience</h3>
          <p class="small text-secondary mb-0">
            Distributors exploring Western Australia, celebrating team achievements against scenic coastal landscapes.
          </p>
        </div>
      </div>

      <!-- Video 6: Asia Success Award -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-3">
          <div class="position-relative rounded overflow-hidden mb-3 cursor-pointer js-video-trigger" data-video-id="DnoJ6-e4xtE" data-video-title="PhytoScience Asia Success Award" style="height: 200px; background: #181920;">
            <img src="https://img.youtube.com/vi/DnoJ6-e4xtE/mqdefault.jpg" alt="Asia Success Award" class="w-100 h-100 object-fit-cover">
            <button type="button" class="position-absolute top-50 start-50 translate-middle btn-ps-play-pulse js-video-trigger" data-video-id="DnoJ6-e4xtE" data-video-title="PhytoScience Asia Success Award" aria-label="Play Asia Success Award Video">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="#FFFFFF"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
            </button>
            <span class="position-absolute top-0 start-0 m-2 badge bg-crimson fw-bold">Industry Honors</span>
          </div>
          <h3 class="h5 text-white mb-1">Asia Success Award & Industry Honors</h3>
          <p class="small text-secondary mb-0">
            PhytoScience recognized by Asian commercial boards for business integrity, direct selling excellence, and product innovation.
          </p>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- 3. MILLIONAIRES & CAR ACHIEVERS SHOWCASE -->
<?php require __DIR__ . '/components/car-achievers.php'; ?>

<!-- 4. DISTRIBUTOR TESTIMONIAL QUOTES -->
<section class="py-5 py-lg-6 position-relative" style="background: #0A0B0E;">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>In Their Own Words</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Leader Reflections from the Field</h2>
      <p class="text-secondary lead fs-6 mb-0">
        Authentic perspectives on why PhytoScience represents a life-altering enterprise.
      </p>
    </div>

    <div class="row g-4">
      
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-4 d-flex flex-column">
          <div class="text-gold mb-3 fs-3">“</div>
          <p class="small text-secondary mb-4 flex-grow-1" style="line-height: 1.65;">
            What attracted me to PhytoScience was the scientific backing of Dr. Fred Zülli and Mibelle Biochemistry. I had seen too many MLM companies with generic vitamins. Here, patients and clients experienced authentic cellular rejuvenation with Double Stemcell, leading to 80%+ repeat orders every single month.
          </p>
          <div class="border-top border-secondary border-opacity-25 pt-3">
            <h4 class="h6 text-white mb-0">Crown Diamond Leader</h4>
            <div class="small text-gold">Kuala Lumpur, Malaysia</div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-4 d-flex flex-column">
          <div class="text-gold mb-3 fs-3">“</div>
          <p class="small text-secondary mb-4 flex-grow-1" style="line-height: 1.65;">
            The daily payout system changed everything for my organization. In our region, cash flow is paramount. Sponsoring a Platinum partner gives you immediate income in your e-wallet that day, not next month. We built a network of over 15,000 members in under two years.
          </p>
          <div class="border-top border-secondary border-opacity-25 pt-3">
            <h4 class="h6 text-white mb-0">Diamond Achiever & Car Recipient</h4>
            <div class="small text-gold">Lagos, Nigeria</div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-4 d-flex flex-column">
          <div class="text-gold mb-3 fs-3">“</div>
          <p class="small text-secondary mb-4 flex-grow-1" style="line-height: 1.65;">
            As a Mobile Stockist, the 3%–5% key-in bonus creates an entire revenue stream on top of pairing commissions. Being the hub where local distributors purchase products and register their downline gives me constant weekly cash flow.
          </p>
          <div class="border-top border-secondary border-opacity-25 pt-3">
            <h4 class="h6 text-white mb-0">Regional Mobile Stockist</h4>
            <div class="small text-gold">Yaoundé, Cameroon</div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- 4. PRE-FOOTER CTA -->
<?php
$ctaTitle = 'Your Story Can Be the Next Global Highlight';
$ctaSubtitle = 'Join our global family today. Get access to verified products, a debt-free corporate backbone, and a proven mentorship team dedicated to your breakthrough.';
$ctaPrimaryText = 'Select Your Package & Begin';
$ctaPrimaryUrl = get_business_url('membership.php');

require __DIR__ . '/components/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>

