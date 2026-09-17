<?php
/**
 * PhytoScience Wellness - How It Works Page (how-it-works.php)
 * Illustrated 7-Step Roadmap, Binary Team Duplication Diagram, and Operational Guidelines.
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'How It Works | The 7-Step PhytoScience Distributor Blueprint';
$pageDescription = 'Follow our field-tested 7-step operational roadmap to build an international PhytoScience enterprise. Learn how to activate your binary tree, duplicate your team, and maximize daily pairing payouts.';
$canonicalUrl = get_business_url('how-it-works.php');

require __DIR__ . '/includes/header.php';
require_once __DIR__ . '/components/cards.php';
?>

<!-- 1. SUBPAGE HERO -->
<?php
$heroBadge = 'Operational Blueprint';
$heroTitle = 'A Field-Tested Roadmap from <span class="text-gold">Registration to Leadership</span>';
$heroSubtitle = 'Success in direct selling is not an accident—it is a repeatable science. Follow our structured 7-step blueprint designed to take any committed entrepreneur from day one to global scale.';
$heroIsSubpage = true;
$heroBreadcrumbs = [
  ['title' => 'Opportunity', 'url' => get_business_url('business-opportunity.php')],
  ['title' => 'How It Works', 'url' => '']
];
$heroCtaPrimaryText = 'Choose Your Business Tier';
$heroCtaPrimaryUrl = get_business_url('membership.php');
$heroCtaSecondaryText = 'Explore Compensation Plan';
$heroCtaSecondaryUrl = get_business_url('compensation-plan.php');

require __DIR__ . '/components/hero.php';
?>

<!-- 2. DETAILED 7-STEP BREAKDOWN -->
<section class="py-5 py-lg-6 position-relative">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>The 7-Step Success Engine</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Your Journey to Financial Freedom</h2>
      <p class="text-secondary lead fs-6 mb-0">
        Every Crown Diamond and million-dollar earner in PhytoScience executed these exact seven milestones.
      </p>
    </div>

    <div class="row g-4">
      
      <!-- Step 1 -->
      <div class="col-lg-12">
        <div class="ps-card p-4 p-lg-5">
          <div class="row align-items-center gy-3">
            <div class="col-md-2 text-center text-md-start">
              <span class="display-4 fw-bold text-gold font-monospace">01</span>
            </div>
            <div class="col-md-7">
              <span class="badge bg-gold text-dark fw-bold mb-2">FOUNDATION</span>
              <h3 class="h4 text-white mb-2">Select Your Business Package Tier</h3>
              <p class="small text-secondary mb-0" style="line-height: 1.6;">
                Choose the entry package that aligns with your capital and ambition. While <strong class="text-white">Silver (100 PP)</strong> allows low-barrier entry, <strong class="text-gold">Platinum / Mobile Stockist (3,000 PP)</strong> is the industry choice for serious entrepreneurs because it eliminates daily pairing caps, unlocks 100% upline roll-up sponsor bonuses, and grants a 3%–5% key-in bonus on all product registrations.
              </p>
            </div>
            <div class="col-md-3 text-md-end">
              <a href="<?= get_business_url('membership.php') ?>" class="btn-ps btn-ps-sm btn-ps-outline-gold">View Package Matrix</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Step 2 -->
      <div class="col-lg-12">
        <div class="ps-card p-4 p-lg-5">
          <div class="row align-items-center gy-3">
            <div class="col-md-2 text-center text-md-start">
              <span class="display-4 fw-bold text-gold font-monospace">02</span>
            </div>
            <div class="col-md-7">
              <span class="badge bg-gold text-dark fw-bold mb-2">SYSTEM ACCESS</span>
              <h3 class="h4 text-white mb-2">Activate Your Digital Member Portal</h3>
              <p class="small text-secondary mb-0" style="line-height: 1.6;">
                Upon enrollment, your unique Distributor ID and temporary credentials are generated. Log into the official backoffice at <strong class="text-white">app.iphyto.com</strong>. Secure your secondary e-wallet security PIN, set up your banking or payment withdrawal details, and familiarise yourself with the real-time genealogy viewer.
              </p>
            </div>
            <div class="col-md-3 text-md-end">
              <a href="<?= MEMBER_LOGIN_URL ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-sm btn-ps-glass">Access Backoffice</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Step 3 -->
      <div class="col-lg-12">
        <div class="ps-card p-4 p-lg-5">
          <div class="row align-items-center gy-3">
            <div class="col-md-2 text-center text-md-start">
              <span class="display-4 fw-bold text-gold font-monospace">03</span>
            </div>
            <div class="col-md-7">
              <span class="badge bg-gold text-dark fw-bold mb-2">PRODUCT CONVICTION</span>
              <h3 class="h4 text-white mb-2">Experience the Formulations Personally</h3>
              <p class="small text-secondary mb-0" style="line-height: 1.6;">
                Your package includes flagship cellular rejuvenation products: <strong class="text-white">Double Stemcell</strong> and <strong class="text-white">Crystal Cell</strong>. Take Double Stemcell under your tongue sublingually each morning before breakfast. Experiencing cellular energy, skin radiance, and systemic vitality firsthand creates authentic personal conviction that cannot be faked.
              </p>
            </div>
            <div class="col-md-3 text-md-end">
              <a href="<?= MAIN_SHOP_URL ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-sm btn-ps-glass">Explore Product Science</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Step 4 -->
      <div class="col-lg-12">
        <div class="ps-card p-4 p-lg-5">
          <div class="row align-items-center gy-3">
            <div class="col-md-2 text-center text-md-start">
              <span class="display-4 fw-bold text-gold font-monospace">04</span>
            </div>
            <div class="col-md-7">
              <span class="badge bg-gold text-dark fw-bold mb-2">SKILL ACQUISITION</span>
              <h3 class="h4 text-white mb-2">Master the Academy Training & Marketing Tools</h3>
              <p class="small text-secondary mb-0" style="line-height: 1.6;">
                Leverage our turnkey leadership materials: high-resolution presentation decks, Dr. Fred Zülli scientific lecture recordings, compensation explainer videos, and weekly corporate Zoom masterclasses. You will learn the exact non-pushy script framework used to invite high-caliber professionals and business leaders.
              </p>
            </div>
            <div class="col-md-3 text-md-end">
              <a href="<?= get_business_url('gallery.php') ?>" class="btn-ps btn-ps-sm btn-ps-glass">Access Media Assets</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Step 5 -->
      <div class="col-lg-12">
        <div class="ps-card p-4 p-lg-5">
          <div class="row align-items-center gy-3">
            <div class="col-md-2 text-center text-md-start">
              <span class="display-4 fw-bold text-gold font-monospace">05</span>
            </div>
            <div class="col-md-7">
              <span class="badge bg-gold text-dark fw-bold mb-2">ACTIVATION</span>
              <h3 class="h4 text-white mb-2">Sponsor Your First Two Key Leaders</h3>
              <p class="small text-secondary mb-0" style="line-height: 1.6;">
                The binary engine requires two personally sponsored active members: <strong class="text-white">one on your Left Team</strong> and <strong class="text-white">one on your Right Team</strong>. Doing so immediately triggers your Direct Sponsor Bonus (up to 45%) and qualifies your account for daily binary pairing commissions.
              </p>
            </div>
            <div class="col-md-3 text-md-end">
              <a href="<?= get_business_url('compensation-plan.php') ?>" class="btn-ps btn-ps-sm btn-ps-outline-gold">See Pairing Rules</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Step 6 -->
      <div class="col-lg-12">
        <div class="ps-card p-4 p-lg-5">
          <div class="row align-items-center gy-3">
            <div class="col-md-2 text-center text-md-start">
              <span class="display-4 fw-bold text-gold font-monospace">06</span>
            </div>
            <div class="col-md-7">
              <span class="badge bg-gold text-dark fw-bold mb-2">SYSTEM DUPLICATION</span>
              <h3 class="h4 text-white mb-2">Duplicate the "Two-by-Two" Blueprint in Depth</h3>
              <p class="small text-secondary mb-0" style="line-height: 1.6;">
                Work with your Left and Right leaders to help them each sponsor two motivated partners. In our hybrid model, pairing points from all enrolled packages roll up through your binary tree without expiration, provided your account remains active. Strong leg volume is 100% carried forward until matched by weaker leg volume.
              </p>
            </div>
            <div class="col-md-3 text-md-end">
              <a href="#binary-duplication" class="btn-ps btn-ps-sm btn-ps-glass">View Binary Visual</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Step 7 -->
      <div class="col-lg-12">
        <div class="ps-card p-4 p-lg-5">
          <div class="row align-items-center gy-3">
            <div class="col-md-2 text-center text-md-start">
              <span class="display-4 fw-bold text-gold font-monospace">07</span>
            </div>
            <div class="col-md-7">
              <span class="badge bg-gold text-dark fw-bold mb-2">RANK ADVANCEMENT</span>
              <h3 class="h4 text-white mb-2">Climb to Global Leadership Ranks & Luxury Lifestyle</h3>
              <p class="small text-secondary mb-0" style="line-height: 1.6;">
                As cumulative team pairing volume grows, you advance through Star, Diamond, Crown Diamond, and Crown Ambassador ranks. You unlock fully sponsored international travel incentives (South Korea, Switzerland, Perth, Paris), corporate-funded luxury vehicle bonuses, and unilevel matching overrides on your downline's earnings.
              </p>
            </div>
            <div class="col-md-3 text-md-end">
              <a href="<?= get_business_url('success-stories.php') ?>" class="btn-ps btn-ps-sm btn-ps-gold">See Achievers</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- 3. BINARY TEAM DUPLICATION VISUAL DIAGRAM -->
<section class="py-5 py-lg-6 position-relative" id="binary-duplication" style="background: rgba(6, 38, 26, 0.35);">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Binary Architecture</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">How Binary Pairing Generates Daily Leverage</h2>
      <p class="text-secondary lead fs-6 mb-0">
        Understand how volume flows upward from your two teams and converts into daily cash flow.
      </p>
    </div>

    <!-- Binary Graphic Visual Container -->
    <div class="ps-card p-4 p-lg-5 text-center position-relative overflow-hidden" style="border: 1px solid var(--ps-border-gold); background: linear-gradient(180deg, rgba(17, 30, 26, 0.95) 0%, rgba(10, 18, 16, 0.98) 100%);">
      
      <!-- Top You Node -->
      <div class="d-inline-block mx-auto mb-4">
        <div class="ps-card p-3 d-inline-block" style="border: 2px solid var(--ps-gold); background: #0A1C14; min-width: 180px;">
          <span class="badge bg-gold text-dark fw-bold mb-1">YOU</span>
          <div class="text-white fw-bold">Platinum Member</div>
          <div class="small text-gold">Unlimited Daily Pairing</div>
        </div>
      </div>

      <!-- Connector Line Down -->
      <div class="mx-auto" style="width: 2px; height: 30px; background: var(--ps-gold);"></div>
      <div class="mx-auto" style="width: 50%; max-width: 480px; height: 2px; background: var(--ps-gold);"></div>

      <!-- Two Teams Row (Left & Right) -->
      <div class="row g-4 justify-content-center mt-2">
        
        <!-- Left Team -->
        <div class="col-md-5">
          <div class="mx-auto mb-2" style="width: 2px; height: 20px; background: var(--ps-gold);"></div>
          <div class="ps-card p-3 mb-3" style="border: 1px solid var(--ps-border-gold); background: rgba(15, 90, 62, 0.2);">
            <span class="badge bg-dark-subtle text-light border border-secondary mb-1">LEFT TEAM</span>
            <h4 class="h6 text-white mb-1">Partner A (1,500 PP)</h4>
            <div class="small text-secondary">Generated from new enrollments & product re-orders</div>
          </div>

          <div class="ps-card p-2 text-secondary small bg-dark bg-opacity-50">
            Depth volume carries forward indefinitely until paired
          </div>
        </div>

        <!-- Matching Pair Indicator -->
        <div class="col-md-2 d-flex flex-column align-items-center justify-content-center my-3 my-md-0">
          <div class="ps-icon-box text-gold p-3 rounded-circle shadow" style="background: rgba(198, 164, 92, 0.2); border: 2px solid var(--ps-gold);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
          </div>
          <div class="text-gold fw-bold small mt-2 font-monospace">DAILY PAIR MATCH</div>
        </div>

        <!-- Right Team -->
        <div class="col-md-5">
          <div class="mx-auto mb-2" style="width: 2px; height: 20px; background: var(--ps-gold);"></div>
          <div class="ps-card p-3 mb-3" style="border: 1px solid var(--ps-border-gold); background: rgba(15, 90, 62, 0.2);">
            <span class="badge bg-dark-subtle text-light border border-secondary mb-1">RIGHT TEAM</span>
            <h4 class="h6 text-white mb-1">Partner B (1,500 PP)</h4>
            <div class="small text-secondary">Generated from new enrollments & product re-orders</div>
          </div>

          <div class="ps-card p-2 text-secondary small bg-dark bg-opacity-50">
            System calculates matched pairs and credits e-wallet daily
          </div>
        </div>

      </div>

      <!-- Result Banner Inside Diagram -->
      <div class="mt-4 pt-3 border-top border-secondary border-opacity-25">
        <span class="badge bg-gold text-dark fw-bold px-3 py-2 fs-6">RESULT: Daily Pairing Bonus Credited to Member E-Wallet</span>
        <p class="small text-secondary mt-2 mb-0">
          Left leg points match Right leg points. Excess points on the stronger leg remain banked for tomorrow's calculations.
        </p>
      </div>

    </div>

  </div>
</section>

<!-- 4. PRE-FOOTER CTA -->
<?php
$ctaTitle = 'Put the 7-Step Engine to Work for You';
$ctaSubtitle = 'Every day you delay is volume and binary placement lost in your market. Choose your package and activate your account today.';
$ctaPrimaryText = 'Select Your Package & Register';
$ctaPrimaryUrl = get_business_url('membership.php');

require __DIR__ . '/components/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>

