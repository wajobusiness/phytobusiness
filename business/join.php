<?php
/**
 * PhytoScience Wellness - Join Now / Enrollment Page (join.php)
 * Structured onboarding flow, sponsor assignment, package pre-selection, and direct registration guidance.
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

// Check for pre-selected package parameter
$preselectedPackage = sanitize((string)($_GET['package'] ?? 'platinum'));

// Handle enrollment request submission
$formErrors = [];
$formSuccess = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Verify CSRF Token
    $submittedToken = (string)($_POST['csrf_token'] ?? '');
    if (!verify_csrf_token($submittedToken)) {
        $formErrors[] = 'Security token invalid. Please refresh the page and try again.';
    }

    // 2. Anti-Bot Honeypot
    if (!empty($_POST['ps_hp_field'])) {
        set_flash('Your application has been received.', 'success');
        redirect(get_business_url('join.php'));
    }

    // 3. Sanitize Inputs
    $fullName = sanitize((string)($_POST['full_name'] ?? ''));
    $email = filter_var(trim((string)($_POST['email'] ?? '')), FILTER_SANITIZE_EMAIL);
    $phone = sanitize((string)($_POST['phone'] ?? ''));
    $country = sanitize((string)($_POST['country'] ?? ''));
    $city = sanitize((string)($_POST['city'] ?? ''));
    $chosenPackage = sanitize((string)($_POST['package'] ?? 'platinum'));
    $sponsorPreference = sanitize((string)($_POST['sponsor_preference'] ?? 'assign_leader'));
    $existingSponsorId = sanitize((string)($_POST['existing_sponsor_id'] ?? ''));

    // 4. Validate
    if (empty($fullName) || strlen($fullName) < 2) {
        $formErrors[] = 'Please provide your full legal name.';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formErrors[] = 'Please provide a valid email address.';
    }
    if (empty($phone) || strlen($phone) < 6) {
        $formErrors[] = 'Please provide a valid phone number with country code.';
    }
    if (empty($country)) {
        $formErrors[] = 'Please indicate your country of residence.';
    }

    // 5. If Valid, Log & Alert
    if (empty($formErrors)) {
        $enrollmentData = [
            'timestamp' => date('c'),
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN',
            'full_name' => $fullName,
            'email' => $email,
            'phone' => $phone,
            'country' => $country,
            'city' => $city,
            'package' => $chosenPackage,
            'sponsor_preference' => $sponsorPreference,
            'existing_sponsor_id' => $existingSponsorId,
        ];

        // Store enrollment application
        $storageDir = __DIR__ . '/data';
        if (!is_dir($storageDir)) {
            @mkdir($storageDir, 0755, true);
        }
        $logFile = $storageDir . '/enrollments.json';
        $existingEntries = file_exists($logFile) ? json_decode((string)file_get_contents($logFile), true) : [];
        if (!is_array($existingEntries)) {
            $existingEntries = [];
        }
        $existingEntries[] = $enrollmentData;
        @file_put_contents($logFile, json_encode($existingEntries, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        // Send Email Alert
        $subject = "[New Enrollment Application] {$chosenPackage} - {$fullName} ({$country})";
        $body = "A new distributor onboarding application was submitted:\n\n"
            . "Name: {$fullName}\n"
            . "Email: {$email}\n"
            . "Phone: {$phone}\n"
            . "Location: {$city}, {$country}\n"
            . "Selected Package: {$chosenPackage}\n"
            . "Sponsor Option: {$sponsorPreference}\n"
            . "Existing Sponsor ID: " . ($existingSponsorId ?: 'None / Assign Leader') . "\n\n"
            . "Date: " . date('Y-m-d H:i:s T');

        send_contact_mail(CONTACT_EMAIL, $subject, $body, $email);

        set_flash('Congratulations! Your onboarding application has been registered. An onboarding advisor will contact you within hours to finalize binary placement and package activation.', 'success');
        redirect(get_business_url('join.php?status=success'));
    }
}

$pageTitle = 'Join PhytoScience | Official Distributor Registration & Onboarding';
$pageDescription = 'Register as an official PhytoScience distributor. Select your business package (Silver, Gold, Junior Platinum, or Platinum Mobile Stockist) and activate your global binary account.';
$canonicalUrl = get_business_url('join.php');

require __DIR__ . '/includes/header.php';
require_once __DIR__ . '/components/cards.php';
?>

<!-- 1. SUBPAGE HERO -->
<?php
$heroBadge = 'Official Onboarding Gateway';
$heroTitle = 'Launch Your Global Enterprise in <span class="text-gold">Cellular Rejuvenation</span>';
$heroSubtitle = 'Lock in your strategic binary placement, select your inventory package, and access 24/7 backoffice tools, daily pairing payouts, and Swiss biotechnology formulations.';
$heroIsSubpage = true;
$heroBreadcrumbs = [
  ['title' => 'Opportunity', 'url' => get_business_url('business-opportunity.php')],
  ['title' => 'Join Now', 'url' => '']
];
$heroCtaPrimaryText = 'Start Registration Below';
$heroCtaPrimaryUrl = '#registration-form';
$heroCtaSecondaryText = 'Log into Existing Account';
$heroCtaSecondaryUrl = MEMBER_LOGIN_URL;

require __DIR__ . '/components/hero.php';
?>

<!-- 2. THREE REGISTRATION PATHWAYS -->
<section class="py-5 position-relative">
  <div class="container">
    <div class="row g-4">
      
      <div class="col-md-4">
        <div class="ps-card h-100 p-4 text-center">
          <div class="ps-icon-box text-gold p-3 rounded-circle mx-auto mb-3" style="background: rgba(198, 164, 92, 0.1);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
          </div>
          <h3 class="h5 text-white mb-2">I Have a Sponsor</h3>
          <p class="small text-secondary mb-3">
            If you already have the Distributor ID of the person who introduced you to PhytoScience, you can enter it in the form below or go directly to the member portal.
          </p>
          <a href="#registration-form" class="btn-ps btn-ps-sm btn-ps-outline-gold w-100">Enter Sponsor ID Below</a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="ps-card h-100 p-4 text-center" style="border: 1px solid var(--ps-border-gold); background: rgba(198, 164, 92, 0.08);">
          <div class="ps-icon-box text-gold p-3 rounded-circle mx-auto mb-3" style="background: rgba(198, 164, 92, 0.2);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
          </div>
          <h3 class="h5 text-white mb-2">Assign Me a Top Leader</h3>
          <p class="small text-secondary mb-3">
            Don't have a sponsor? Our corporate system will pair you with a top Diamond or Crown leader in your region for direct binary placement support and active coaching.
          </p>
          <a href="#registration-form" class="btn-ps btn-ps-sm btn-ps-gold w-100">Get Assigned Leader</a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="ps-card h-100 p-4 text-center">
          <div class="ps-icon-box text-gold p-3 rounded-circle mx-auto mb-3" style="background: rgba(198, 164, 92, 0.1);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
          </div>
          <h3 class="h5 text-white mb-2">Mobile Stockist Center</h3>
          <p class="small text-secondary mb-3">
            Ambitious leaders seeking regional exclusivity, bulk inventory distribution, 3%–5% key-in overrides, and unlimited pairing can apply directly.
          </p>
          <a href="#registration-form" class="btn-ps btn-ps-sm btn-ps-outline-gold w-100">Apply for Stockist</a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- 3. ONBOARDING APPLICATION FORM -->
<section class="py-5 py-lg-6 position-relative" id="registration-form">
  <div class="container max-w-900 mx-auto">
    
    <div class="ps-card p-4 p-md-5" style="border: 1px solid var(--ps-border-gold); background: linear-gradient(180deg, rgba(17, 30, 26, 0.95) 0%, rgba(10, 18, 16, 0.98) 100%);">
      
      <div class="text-center mb-5">
        <span class="badge bg-gold text-dark fw-bold mb-2">STEP-BY-STEP ONBOARDING</span>
        <h2 class="h3 text-white fw-bold mb-2">Distributor Onboarding Application</h2>
        <p class="small text-secondary mb-0">
          Fill out your details to initiate your official member registration and binary positioning.
        </p>
      </div>

      <?php if (!empty($formErrors)): ?>
        <div class="alert alert-danger ps-card mb-4" role="alert">
          <ul class="mb-0 small ps-3">
            <?php foreach ($formErrors as $err): ?>
              <li><?= sanitize($err) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form action="<?= get_business_url('join.php') ?>" method="POST" class="needs-validation" novalidate id="joinForm">
        <!-- CSRF Token -->
        <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">

        <!-- Anti-bot honeypot -->
        <div style="display: none !important;" aria-hidden="true">
          <label for="ps_hp_field">Leave this empty</label>
          <input type="text" name="ps_hp_field" id="ps_hp_field" tabindex="-1" autocomplete="off">
        </div>

        <!-- Section 1: Package Selection -->
        <div class="mb-4 pb-3 border-bottom border-secondary border-opacity-25">
          <h3 class="h6 text-crimson text-uppercase fw-bold mb-3" style="letter-spacing: 0.05em;">1. Select Your Business Package</h3>
          <div class="row g-3">
            <div class="col-md-6 col-lg-3">
              <label class="ps-card p-3 d-block text-center h-100 cursor-pointer <?= $preselectedPackage === 'silver' ? 'border-crimson' : '' ?>" style="border: 1px solid <?= $preselectedPackage === 'silver' ? 'var(--ps-crimson-500)' : 'rgba(255,255,255,0.1)' ?>;">
                <input type="radio" name="package" value="silver" <?= $preselectedPackage === 'silver' ? 'checked' : '' ?> class="mb-2">
                <div class="text-white fw-bold">Silver Pack</div>
                <div class="badge bg-dark text-crimson border border-danger border-opacity-25 my-1">100 PP</div>
                <div class="text-white fw-bold fs-6 mt-1">$130 USD</div>
                <div class="text-secondary small">₦110,000 / RM 420</div>
              </label>
            </div>

            <div class="col-md-6 col-lg-3">
              <label class="ps-card p-3 d-block text-center h-100 cursor-pointer <?= $preselectedPackage === 'gold' ? 'border-crimson' : '' ?>" style="border: 1px solid <?= $preselectedPackage === 'gold' ? 'var(--ps-crimson-500)' : 'rgba(255,255,255,0.1)' ?>;">
                <input type="radio" name="package" value="gold" <?= $preselectedPackage === 'gold' ? 'checked' : '' ?> class="mb-2">
                <div class="text-white fw-bold">Gold Pack</div>
                <div class="badge bg-dark text-crimson border border-danger border-opacity-25 my-1">500 PP</div>
                <div class="text-white fw-bold fs-6 mt-1">$650 USD</div>
                <div class="text-secondary small">₦550,000 / RM 2,100</div>
              </label>
            </div>

            <div class="col-md-6 col-lg-3">
              <label class="ps-card p-3 d-block text-center h-100 cursor-pointer <?= ($preselectedPackage === 'junior_platinum' || $preselectedPackage === 'junior-platinum') ? 'border-crimson' : '' ?>" style="border: 1px solid <?= ($preselectedPackage === 'junior_platinum' || $preselectedPackage === 'junior-platinum') ? 'var(--ps-crimson-500)' : 'rgba(255,255,255,0.1)' ?>;">
                <input type="radio" name="package" value="junior_platinum" <?= ($preselectedPackage === 'junior_platinum' || $preselectedPackage === 'junior-platinum') ? 'checked' : '' ?> class="mb-2">
                <div class="text-white fw-bold">Junior Platinum</div>
                <div class="badge bg-dark text-crimson border border-danger border-opacity-25 my-1">1,500 PP</div>
                <div class="text-white fw-bold fs-6 mt-1">$1,950 USD</div>
                <div class="text-secondary small">₦1,650,000 / RM 6,300</div>
              </label>
            </div>

            <div class="col-md-6 col-lg-3">
              <label class="ps-card p-3 d-block text-center h-100 cursor-pointer <?= ($preselectedPackage === 'platinum' || empty($preselectedPackage) || $preselectedPackage === 'platinum-mobile') ? 'border-crimson' : '' ?>" style="background: rgba(216, 0, 29, 0.08); border: 1px solid <?= ($preselectedPackage === 'platinum' || empty($preselectedPackage) || $preselectedPackage === 'platinum-mobile') ? 'var(--ps-crimson-500)' : 'rgba(216,0,29,0.3)' ?>;">
                <input type="radio" name="package" value="platinum" <?= ($preselectedPackage === 'platinum' || empty($preselectedPackage) || $preselectedPackage === 'platinum-mobile') ? 'checked' : '' ?> class="mb-2">
                <div class="text-crimson fw-bold">Platinum / Stockist</div>
                <div class="badge bg-crimson text-white my-1">3,000 PP</div>
                <div class="text-white fw-bold fs-6 mt-1">$3,900 USD</div>
                <div class="text-secondary small">₦3,300,000 / RM 12,600</div>
              </label>
            </div>
          </div>
        </div>

        <!-- Section 2: Personal Profile -->
        <div class="mb-4 pb-3 border-bottom border-secondary border-opacity-25">
          <h3 class="h6 text-gold text-uppercase fw-bold mb-3" style="letter-spacing: 0.05em;">2. Personal & Contact Details</h3>
          <div class="row g-3">
            <div class="col-md-6">
              <label for="full_name" class="form-label text-white small fw-semibold">Full Legal Name *</label>
              <input type="text" class="form-control ps-form-control text-white" id="full_name" name="full_name" required placeholder="As shown on official identity document">
            </div>

            <div class="col-md-6">
              <label for="email" class="form-label text-white small fw-semibold">Email Address *</label>
              <input type="email" class="form-control ps-form-control text-white" id="email" name="email" required placeholder="Where login credentials will be sent">
            </div>

            <div class="col-md-6">
              <label for="phone" class="form-label text-white small fw-semibold">Telephone / WhatsApp *</label>
              <input type="tel" class="form-control ps-form-control text-white" id="phone" name="phone" required placeholder="+CountryCode PhoneNumber">
            </div>

            <div class="col-md-6">
              <label for="country" class="form-label text-white small fw-semibold">Country of Residence *</label>
              <input type="text" class="form-control ps-form-control text-white" id="country" name="country" required placeholder="e.g. Nigeria, Malaysia, Kenya, Ghana">
            </div>

            <div class="col-md-6">
              <label for="city" class="form-label text-white small fw-semibold">City / Region</label>
              <input type="text" class="form-control ps-form-control text-white" id="city" name="city" placeholder="e.g. Lagos, Kuala Lumpur, Nairobi">
            </div>
          </div>
        </div>

        <!-- Section 3: Sponsor Preference -->
        <div class="mb-4">
          <h3 class="h6 text-gold text-uppercase fw-bold mb-3" style="letter-spacing: 0.05em;">3. Sponsor & Placement Preference</h3>
          
          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="sponsor_preference" id="pref_assign" value="assign_leader" checked>
            <label class="form-check-label text-white small" for="pref_assign">
              <strong>Assign me to a Top Regional Diamond Leader</strong> (Recommended for maximum spillover and direct training)
            </label>
          </div>

          <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="sponsor_preference" id="pref_existing" value="existing_sponsor">
            <label class="form-check-label text-white small" for="pref_existing">
              <strong>I already have a Sponsor</strong> (Enter Sponsor Username or ID below)
            </label>
          </div>

          <div class="ps-3 border-start border-secondary border-opacity-25" id="existingSponsorInputGroup">
            <label for="existing_sponsor_id" class="form-label text-white small">Existing Sponsor ID / Username</label>
            <input type="text" class="form-control ps-form-control text-white" id="existing_sponsor_id" name="existing_sponsor_id" placeholder="e.g. MY123456 or Sponsor Username">
          </div>
        </div>

        <!-- Submit Button -->
        <div class="pt-3">
          <button type="submit" class="btn-ps btn-ps-gold btn-ps-lg w-100 justify-content-center">
            <span>Submit Onboarding Application</span>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
          </button>
          
          <div class="d-flex flex-wrap align-items-center justify-content-center gap-4 mt-3 text-secondary small">
            <div class="d-flex align-items-center gap-1">
              <svg width="14" height="14" class="text-gold" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              <span>Licensed AJL932039</span>
            </div>
            <div class="d-flex align-items-center gap-1">
              <svg width="14" height="14" class="text-gold" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
              <span>256-Bit SSL Encrypted</span>
            </div>
            <div class="d-flex align-items-center gap-1">
              <svg width="14" height="14" class="text-gold" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              <span>Daily E-Wallet Settlements</span>
            </div>
          </div>
        </div>

      </form>

    </div>

  </div>
</section>

<!-- 4. OFFICIAL MEMBER PORTAL TERMINAL ACCESS -->
<section class="py-5 position-relative" style="background: rgba(6, 38, 26, 0.35);">
  <div class="container text-center max-w-700 mx-auto">
    <h3 class="h5 text-white mb-2">Already an Active PhytoScience Distributor?</h3>
    <p class="small text-secondary mb-4">
      Existing members can access genealogy trees, e-wallet transactions, and order product reorders directly through the international terminal.
    </p>
    <a href="<?= MEMBER_LOGIN_URL ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-outline-gold">
      Log into Member Terminal (app.iphyto.com)
    </a>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

