<?php
/**
 * PhytoScience Wellness - Events Page (events.php)
 * Global conventions, scientific summits, regional rallies, and calendar alerts.
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Upcoming Conventions & Events | PhytoScience Global Calendar';
$pageDescription = 'Stay informed on upcoming PhytoScience international conventions, scientific masterclasses with Dr. Fred Zülli, and regional leadership tours across Asia and Africa.';
$canonicalUrl = get_business_url('events.php');

require __DIR__ . '/includes/header.php';
require_once __DIR__ . '/components/cards.php';
?>

<!-- 1. SUBPAGE HERO -->
<?php
$heroBadge = 'Global Calendar & Masterclasses';
$heroTitle = 'Where World-Class Leaders <span class="text-gold">Converge and Grow</span>';
$heroSubtitle = 'Attend regional masterminds, annual award conventions, and scientific symposiums with Dr. Fred Zülli. Connect with tens of thousands of like-minded high achievers.';
$heroIsSubpage = true;
$heroBreadcrumbs = [
  ['title' => 'Media & Resources', 'url' => get_business_url('gallery.php')],
  ['title' => 'Events & Conventions', 'url' => '']
];
$heroCtaPrimaryText = 'Register for Upcoming Summits';
$heroCtaPrimaryUrl = '#calendar';
$heroCtaSecondaryText = 'Watch Past Event Highlights';
$heroVideoId = 'b0pV9MrxnNk';

require __DIR__ . '/components/hero.php';
?>

<!-- 2. UPCOMING GLOBAL SUMMITS & CONVENTIONS -->
<section class="py-5 py-lg-6 position-relative" id="calendar">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Corporate Calendar</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Upcoming Global Events</h2>
      <p class="text-secondary lead fs-6 mb-0">
        Mark your calendar for transformative experiences designed to elevate your personal leadership and team duplication.
      </p>
    </div>

    <div class="row g-4">
      
      <!-- Event 1 -->
      <div class="col-lg-6">
        <div class="ps-card h-100 p-4 p-md-5 position-relative overflow-hidden" style="border: 1px solid var(--ps-border-gold);">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <span class="badge bg-gold text-dark fw-bold">FLAGSHIP EVENT</span>
            <span class="text-secondary small font-monospace">Bangkok / Kuala Lumpur</span>
          </div>
          <h3 class="h4 text-white mb-2">Annual Global Recognition Convention</h3>
          <p class="small text-secondary mb-4" style="line-height: 1.6;">
            The premier event of the direct selling calendar. Over 10,000 attendees gathering for three days of high-octane celebration: new Diamond and Crown rank pin ceremonies, luxury vehicle handovers, keynote leadership addresses, and live entertainment.
          </p>

          <div class="row g-2 mb-4 border-top border-bottom border-secondary border-opacity-25 py-3">
            <div class="col-6">
              <span class="small text-secondary d-block">Format:</span>
              <strong class="text-white small">In-Person & Global Stream</strong>
            </div>
            <div class="col-6">
              <span class="small text-secondary d-block">Audience:</span>
              <strong class="text-gold small">All Registered Members</strong>
            </div>
          </div>

          <a href="<?= get_business_url('contact.php?subject=Convention+Inquiry') ?>" class="btn-ps btn-ps-gold w-100 text-center">
            Inquire About Delegation Tickets
          </a>
        </div>
      </div>

      <!-- Event 2 -->
      <div class="col-lg-6">
        <div class="ps-card h-100 p-4 p-md-5 position-relative overflow-hidden" style="border: 1px solid var(--ps-border-gold);">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <span class="badge bg-dark-subtle text-light border border-secondary">REGIONAL TOUR</span>
            <span class="text-secondary small font-monospace">Lagos • Abuja • Nairobi</span>
          </div>
          <h3 class="h4 text-white mb-2">African Leadership Empowerment Tour</h3>
          <p class="small text-secondary mb-4" style="line-height: 1.6;">
            Executive leadership from Kuala Lumpur join regional managing directors across West and East Africa for intensive field trainings, Mobile Stockist business workshops, and high-impact distributor recruitment presentations.
          </p>

          <div class="row g-2 mb-4 border-top border-bottom border-secondary border-opacity-25 py-3">
            <div class="col-6">
              <span class="small text-secondary d-block">Venues:</span>
              <strong class="text-white small">5-Star Convention Centers</strong>
            </div>
            <div class="col-6">
              <span class="small text-secondary d-block">Audience:</span>
              <strong class="text-gold small">Distributors & Invited Prospects</strong>
            </div>
          </div>

          <a href="<?= get_business_url('contact.php?subject=African+Tour+Schedule') ?>" class="btn-ps btn-ps-outline-gold w-100 text-center">
            View Regional Tour Dates
          </a>
        </div>
      </div>

      <!-- Event 3 -->
      <div class="col-lg-6">
        <div class="ps-card h-100 p-4 p-md-5 position-relative overflow-hidden">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <span class="badge bg-dark-subtle text-light border border-secondary">SCIENCE MASTERCLASS</span>
            <span class="text-secondary small font-monospace">Virtual Global Broadcast</span>
          </div>
          <h3 class="h4 text-white mb-2">PhytoCellTec™ Symposium with Dr. Fred Zülli</h3>
          <p class="small text-secondary mb-4" style="line-height: 1.6;">
            Join Dr. Fred Zülli, Founder of Mibelle Biochemistry Switzerland, for a masterclass on epigenetic cellular protection, clinical trials on Malus Domestica, and product positioning for health practitioners.
          </p>

          <div class="row g-2 mb-4 border-top border-bottom border-secondary border-opacity-25 py-3">
            <div class="col-6">
              <span class="small text-secondary d-block">Platform:</span>
              <strong class="text-white small">PhytoScience Member Portal</strong>
            </div>
            <div class="col-6">
              <span class="small text-secondary d-block">Speaker:</span>
              <strong class="text-gold small">Dr. Fred Zülli (Mibelle)</strong>
            </div>
          </div>

          <a href="<?= MEMBER_LOGIN_URL ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-glass w-100 text-center">
            Access Broadcast via Backoffice
          </a>
        </div>
      </div>

      <!-- Event 4 -->
      <div class="col-lg-6">
        <div class="ps-card h-100 p-4 p-md-5 position-relative overflow-hidden">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <span class="badge bg-gold text-dark fw-bold">VIP INCENTIVE</span>
            <span class="text-secondary small font-monospace">Zurich / Lake Lucerne</span>
          </div>
          <h3 class="h4 text-white mb-2">Swiss Discovery Leadership Retreat</h3>
          <p class="small text-secondary mb-4" style="line-height: 1.6;">
            Exclusive to qualified Diamond and Crown leaders: an all-expenses-paid luxury retreat in Switzerland including private tour of Mibelle Biochemistry research laboratories, five-star alpine hospitality, and corporate strategy summits.
          </p>

          <div class="row g-2 mb-4 border-top border-bottom border-secondary border-opacity-25 py-3">
            <div class="col-6">
              <span class="small text-secondary d-block">Qualification:</span>
              <strong class="text-white small">Diamond Rank & Above</strong>
            </div>
            <div class="col-6">
              <span class="small text-secondary d-block">Status:</span>
              <strong class="text-gold small">Qualification Open</strong>
            </div>
          </div>

          <a href="<?= get_business_url('compensation-plan.php#ranks') ?>" class="btn-ps btn-ps-outline-gold w-100 text-center">
            Review Rank Qualification Rules
          </a>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- 3. PRE-FOOTER CTA -->
<?php
$ctaTitle = 'Be on Stage at the Next Global Convention';
$ctaSubtitle = 'Don\'t remain a spectator. Start building your organization today, unlock daily binary pairing, and qualify for upcoming luxury travel incentives.';
$ctaPrimaryText = 'Choose Your Business Tier';
$ctaPrimaryUrl = get_business_url('membership.php');

require __DIR__ . '/components/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>

