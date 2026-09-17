<?php
/**
 * PhytoScience Wellness - Contact Page (contact.php)
 * Secure inquiry form, CSRF protection, anti-bot honeypot, and 13+ international offices directory.
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

// Handle contact form submission
$formErrors = [];
$formSuccess = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Verify CSRF Token
    $submittedToken = (string)($_POST['csrf_token'] ?? '');
    if (!verify_csrf_token($submittedToken)) {
        $formErrors[] = 'Security token expired or invalid. Please refresh the page and try again.';
    }

    // 2. Anti-Bot Honeypot Check
    if (!empty($_POST['ps_hp_email'])) {
        // Honeypot filled: silently pretend success to discard bot spam
        set_flash('Thank you. Your inquiry has been received.', 'success');
        redirect(get_business_url('contact.php'));
    }

    // 3. Extract & Sanitize Fields
    $fullName = sanitize((string)($_POST['full_name'] ?? ''));
    $email = filter_var(trim((string)($_POST['email'] ?? '')), FILTER_SANITIZE_EMAIL);
    $phone = sanitize((string)($_POST['phone'] ?? ''));
    $country = sanitize((string)($_POST['country'] ?? ''));
    $packageInterest = sanitize((string)($_POST['package_interest'] ?? 'General Inquiry'));
    $message = sanitize((string)($_POST['message'] ?? ''));

    // 4. Validate Required Inputs
    if (empty($fullName) || strlen($fullName) < 2) {
        $formErrors[] = 'Please provide your full legal name.';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formErrors[] = 'Please provide a valid corporate or personal email address.';
    }
    if (empty($phone) || strlen($phone) < 6) {
        $formErrors[] = 'Please provide a valid contact telephone number with country code.';
    }
    if (empty($message) || strlen($message) < 10) {
        $formErrors[] = 'Please provide more details regarding your business inquiry (min 10 characters).';
    }

    // 5. If Valid, Log & Send Email
    if (empty($formErrors)) {
        $inquiryData = [
            'timestamp' => date('c'),
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN',
            'full_name' => $fullName,
            'email' => $email,
            'phone' => $phone,
            'country' => $country,
            'package_interest' => $packageInterest,
            'message' => $message,
        ];

        // Log inquiry to JSON storage
        log_inquiry($inquiryData);

        // Send email alert to admin
        $emailSubject = "[PhytoScience Inquiry] {$packageInterest} - {$fullName} ({$country})";
        $emailBody = "A new business inquiry was submitted:\n\n"
            . "Name: {$fullName}\n"
            . "Email: {$email}\n"
            . "Phone: {$phone}\n"
            . "Country: {$country}\n"
            . "Interested Package: {$packageInterest}\n\n"
            . "Message:\n{$message}\n\n"
            . "Time: " . date('Y-m-d H:i:s T') . "\n"
            . "IP Address: " . ($inquiryData['ip'] ?? 'N/A');

        send_contact_mail(CONTACT_EMAIL, $emailSubject, $emailBody, $email);

        set_flash('Thank you! Your inquiry has been routed to our regional advisory desk. An executive will reach out to you within 24 hours.', 'success');
        redirect(get_business_url('contact.php?status=success'));
    }
}

$pageTitle = 'Contact PhytoScience | Global Headquarters & International Offices';
$pageDescription = 'Connect with PhytoScience: Global HQ in Bangi, Malaysia, plus regional offices across Nigeria, Singapore, India, Cameroon, Ghana, and 41+ countries worldwide.';
$canonicalUrl = get_business_url('contact.php');

require __DIR__ . '/includes/header.php';
require_once __DIR__ . '/components/cards.php';
?>

<!-- 1. SUBPAGE HERO -->
<?php
$heroBadge = 'Global Support & Regional Hubs';
$heroTitle = 'Connect with Our <span class="text-gold">International Leadership</span>';
$heroSubtitle = 'Whether seeking personalized guidance on binary strategy, exploring regional stockist privileges, or requesting executive sponsor assistance, our global team is ready to serve you.';
$heroIsSubpage = true;
$heroBreadcrumbs = [
  ['title' => 'Company', 'url' => get_business_url('about.php')],
  ['title' => 'Contact & Offices', 'url' => '']
];
$heroCtaPrimaryText = 'Send Inquiry Directly';
$heroCtaPrimaryUrl = '#inquiry-form';
$heroCtaSecondaryText = 'Instant WhatsApp Support';
$heroCtaSecondaryUrl = WHATSAPP_LINK;

require __DIR__ . '/components/hero.php';
?>

<!-- 2. CONTACT FORM & GLOBAL HQ CARD -->
<section class="py-5 py-lg-6 position-relative" id="inquiry-form">
  <div class="container">
    <div class="row g-5">
      
      <!-- Left Column: Secure Inquiry Form -->
      <div class="col-lg-7">
        <div class="ps-card p-4 p-md-5" style="border: 1px solid var(--ps-border-gold);">
          <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
            <span class="ps-status-dot"></span>
            <span>Direct Advisory Desk</span>
          </div>
          <h2 class="h3 text-white fw-bold mb-2">Request Business Consultation</h2>
          <p class="small text-secondary mb-4">
            Complete the form below to receive customized guidance from a qualified PhytoScience executive or regional stockist coordinator.
          </p>

          <?php if (!empty($formErrors)): ?>
            <div class="alert alert-danger ps-card mb-4" role="alert">
              <ul class="mb-0 small ps-3">
                <?php foreach ($formErrors as $err): ?>
                  <li><?= sanitize($err) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <form action="<?= get_business_url('contact.php') ?>" method="POST" class="needs-validation" novalidate id="contactForm">
            <!-- CSRF Security Token -->
            <input type="hidden" name="csrf_token" value="<?= generate_csrf_token() ?>">

            <!-- Anti-Bot Honeypot (Hidden from human eyes) -->
            <div style="display: none !important;" aria-hidden="true">
              <label for="ps_hp_email">Do not fill this field</label>
              <input type="text" name="ps_hp_email" id="ps_hp_email" tabindex="-1" autocomplete="off">
            </div>

            <div class="row g-3">
              <!-- Full Name -->
              <div class="col-md-6">
                <label for="full_name" class="form-label text-white small fw-semibold">Full Legal Name *</label>
                <input type="text" class="form-control ps-form-control text-white" id="full_name" name="full_name" required placeholder="e.g. Adebayo Ogunlesi" value="<?= isset($_POST['full_name']) ? sanitize($_POST['full_name']) : '' ?>">
              </div>

              <!-- Email -->
              <div class="col-md-6">
                <label for="email" class="form-label text-white small fw-semibold">Email Address *</label>
                <input type="email" class="form-control ps-form-control text-white" id="email" name="email" required placeholder="name@example.com" value="<?= isset($_POST['email']) ? sanitize($_POST['email']) : '' ?>">
              </div>

              <!-- Phone with Country Code -->
              <div class="col-md-6">
                <label for="phone" class="form-label text-white small fw-semibold">Phone / WhatsApp *</label>
                <input type="tel" class="form-control ps-form-control text-white" id="phone" name="phone" required placeholder="+234 800 000 0000" value="<?= isset($_POST['phone']) ? sanitize($_POST['phone']) : '' ?>">
              </div>

              <!-- Country of Residence -->
              <div class="col-md-6">
                <label for="country" class="form-label text-white small fw-semibold">Country of Residence *</label>
                <input type="text" class="form-control ps-form-control text-white" id="country" name="country" required placeholder="e.g. Nigeria, Malaysia, Kenya" value="<?= isset($_POST['country']) ? sanitize($_POST['country']) : '' ?>">
              </div>

              <!-- Interested Package Tier -->
              <div class="col-12">
                <label for="package_interest" class="form-label text-white small fw-semibold">Package Tier of Interest</label>
                <select class="form-select ps-form-control text-white bg-dark" id="package_interest" name="package_interest">
                  <option value="Platinum / Mobile Stockist (3,000 PP)" selected>Platinum / Mobile Stockist (3,000 PP) - Maximum Payouts & Unlimited Daily Pairing</option>
                  <option value="Junior Platinum (1,500 PP)">Junior Platinum (1,500 PP) - Intermediate Cap</option>
                  <option value="Gold Package (500 PP)">Gold Package (500 PP) - Medium Cap</option>
                  <option value="Silver Package (100 PP)">Silver Package (100 PP) - Starter Tier</option>
                  <option value="General Business Inquiry">General Business & Distribution Inquiry</option>
                </select>
              </div>

              <!-- Message -->
              <div class="col-12">
                <label for="message" class="form-label text-white small fw-semibold">Your Message or Strategy Questions *</label>
                <textarea class="form-control ps-form-control text-white" id="message" name="message" rows="4" required placeholder="Tell us about your background and what you are looking to accomplish with PhytoScience..."><?= isset($_POST['message']) ? sanitize($_POST['message']) : '' ?></textarea>
              </div>

              <!-- Submit Button -->
              <div class="col-12 pt-2">
                <button type="submit" class="btn-ps btn-ps-gold btn-ps-lg w-100 justify-content-center">
                  <span>Transmit Inquiry to Advisory Desk</span>
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                </button>
                <p class="small text-secondary text-center mt-2 mb-0" style="font-size: 0.75rem;">
                  Your data is protected under international privacy standards and will never be shared or spammed.
                </p>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Right Column: Corporate Global HQ Card & Quick Access -->
      <div class="col-lg-5">
        <div class="ps-card p-4 p-md-5 mb-4" style="border: 1px solid var(--ps-border-gold); background: linear-gradient(135deg, rgba(24, 25, 32, 0.95) 0%, rgba(35, 12, 17, 0.7) 100%);">
          <span class="badge bg-gold text-dark fw-bold mb-2">OFFICIAL CONTACT & REGIONAL HUBS</span>
          <h3 class="h4 text-white mb-2"><?= COMPANY_LEGAL_NAME ?></h3>
          <p class="small text-secondary mb-4">
            Registration No. <?= COMPANY_REG_NO ?> | Direct Selling License <?= COMPANY_AJL_LICENSE ?>
          </p>

          <div class="d-flex flex-column gap-3 mb-4">
            <!-- Office Addresses -->
            <div class="d-flex align-items-start gap-3">
              <svg width="20" height="20" class="text-gold flex-shrink-0 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
              <div>
                <strong class="text-white small d-block mb-1">Office Addresses</strong>
                <div class="small text-secondary mb-2">
                  <span class="text-white fw-semibold">Lagos Office:</span><br>
                  <?= OFFICE_LAGOS_1_ADDRESS ?>
                </div>
                <div class="small text-secondary mb-2">
                  <span class="text-white fw-semibold">Lagos Office:</span><br>
                  <?= OFFICE_LAGOS_2_ADDRESS ?>
                </div>
                <div class="small text-secondary mb-2">
                  <span class="text-white fw-semibold">Abuja Office:</span><br>
                  <?= OFFICE_ABUJA_ADDRESS ?>
                </div>
                <div class="small text-secondary">
                  <span class="text-white fw-semibold">United Kingdom Office:</span><br>
                  <?= OFFICE_UK_ADDRESS ?>
                </div>
              </div>
            </div>

            <!-- Phone Numbers -->
            <div class="d-flex align-items-start gap-3">
              <svg width="20" height="20" class="text-gold flex-shrink-0 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
              <div>
                <strong class="text-white small d-block mb-1">Phone Numbers</strong>
                <div class="small text-secondary mb-1">
                  <a href="tel:+2348023173303" class="text-secondary text-decoration-none hover-gold"><?= CONTACT_PHONE_NG_1 ?></a> 
                  <span class="badge bg-crimson ms-1" style="font-size: 0.65rem;">Call & WhatsApp</span>
                </div>
                <div class="small text-secondary mb-1">
                  <a href="tel:+2348068649995" class="text-secondary text-decoration-none hover-gold"><?= CONTACT_PHONE_NG_2 ?></a>
                </div>
                <div class="small text-secondary">
                  <span class="text-white-50">UK Phone:</span> 
                  <a href="tel:+447474439825" class="text-secondary text-decoration-none hover-gold"><?= CONTACT_PHONE_UK ?></a>
                </div>
              </div>
            </div>

            <!-- Email Address -->
            <div class="d-flex align-items-start gap-3">
              <svg width="20" height="20" class="text-gold flex-shrink-0 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              <div>
                <strong class="text-white small d-block">Official Email</strong>
                <a href="mailto:<?= CONTACT_EMAIL ?>" class="small text-gold text-decoration-none"><?= CONTACT_EMAIL ?></a>
              </div>
            </div>

            <!-- Operating Hours -->
            <div class="d-flex align-items-start gap-3">
              <svg width="20" height="20" class="text-gold flex-shrink-0 mt-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              <div>
                <strong class="text-white small d-block">Operating Hours</strong>
                <span class="small text-secondary">Monday – Friday: 9:00 AM – 5:30 PM (Sat: 10:00 AM – 3:00 PM)</span>
              </div>
            </div>
          </div>

          <div class="d-flex flex-column gap-2 border-top border-secondary border-opacity-25 pt-3">
            <a href="<?= WHATSAPP_LINK ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-gold text-center">
              Chat on WhatsApp Directly
            </a>
            <a href="<?= MEMBER_LOGIN_URL ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-glass text-center">
              Member Portal Terminal
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- 3. INTERNATIONAL OFFICES DIRECTORY (13+ COUNTRIES) -->
<section class="py-5 py-lg-6 position-relative" id="offices" style="background: rgba(6, 38, 26, 0.35);">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Worldwide Operations</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Our International Offices & Regional Hubs</h2>
      <p class="text-secondary lead fs-6 mb-0">
        PhytoScience maintains physical corporate support centers across Asia and Africa to provide local currency settlement, stock distribution, and member support.
      </p>
    </div>

    <div class="row g-4">
      <?php foreach (OFFICE_HUBS as $office): ?>
        <div class="col-md-6 col-lg-4">
          <?= render_office_card($office) ?>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- 4. PRE-FOOTER CTA -->
<?php
$ctaTitle = 'Take the Leap into Global Cellular Wellness';
$ctaSubtitle = 'Join our global family today. Get access to verified products, a debt-free corporate backbone, and a proven mentorship team dedicated to your breakthrough.';
$ctaPrimaryText = 'Choose Your Business Tier';
$ctaPrimaryUrl = get_business_url('membership.php');

require __DIR__ . '/components/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>

