<?php
/**
 * PhytoScience Wellness - Helper Functions & Security Utilities
 */

declare(strict_types=1);

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../data/currencies.php';

/**
 * Sanitize string input to prevent XSS attacks
 */
function sanitize(mixed $data): string {
    if (is_null($data)) {
        return '';
    }
    return htmlspecialchars(trim((string)$data), ENT_QUOTES, 'UTF-8');
}

/**
 * Generate or retrieve the active CSRF token for the session
 */
function csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Render a hidden CSRF token input field
 */
function csrf_field(): string {
    return '<input type="hidden" name="csrf_token" value="' . csrf_token() . '">';
}

/**
 * Validate submitted CSRF token
 */
function csrf_validate(?string $token): bool {
    if (empty($token) || empty($_SESSION['csrf_token'])) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Set a session flash message
 */
function set_flash(string $type, string $message): void {
    $_SESSION['flash_message'] = [
        'type' => $type, // 'success', 'danger', 'warning', 'info'
        'message' => $message,
    ];
}

/**
 * Retrieve and clear flash message
 */
function get_flash(): ?array {
    if (!empty($_SESSION['flash_message'])) {
        $msg = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
        return $msg;
    }
    return null;
}

/**
 * Generate asset URL relative to current script or absolute with cache-busting
 */
function asset(string $path): string {
    $cleanPath = ltrim($path, '/');
    if (str_starts_with($cleanPath, 'assets/')) {
        $cleanPath = substr($cleanPath, 7);
    }
    $filePath = __DIR__ . '/../assets/' . $cleanPath;
    $version = file_exists($filePath) ? (string)filemtime($filePath) : '2.0.1';
    return get_business_url('assets/' . $cleanPath) . '?v=' . $version;
}

/**
 * Return active state class for navigation links
 */
function is_active_page(string $pageName): string {
    $current = basename($_SERVER['PHP_SELF'] ?? '');
    return $current === $pageName ? 'active' : '';
}

/**
 * Process secure contact & inquiry submissions
 */
function handle_contact_submission(): ?array {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return null;
    }

    // Anti-bot Honeypot check
    if (!empty($_POST['website_hp'])) {
        // Silent rejection of spam bots
        return ['status' => 'error', 'message' => 'Spam verification failed.'];
    }

    // CSRF check
    $token = $_POST['csrf_token'] ?? '';
    if (!csrf_validate($token)) {
        return ['status' => 'error', 'message' => 'Security token expired. Please refresh and try again.'];
    }

    // Rate limiting: 1 submission per 10 seconds
    $now = time();
    if (isset($_SESSION['last_submission_time']) && ($now - $_SESSION['last_submission_time']) < 10) {
        return ['status' => 'error', 'message' => 'Please wait a moment before sending another message.'];
    }

    $fullName = sanitize($_POST['full_name'] ?? '');
    $email    = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $phone    = sanitize($_POST['phone'] ?? '');
    $country  = sanitize($_POST['country'] ?? '');
    $interest = sanitize($_POST['interest'] ?? 'General Business Inquiry');
    $message  = sanitize($_POST['message'] ?? '');

    if (empty($fullName) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['status' => 'error', 'message' => 'Please provide a valid name and email address.'];
    }

    $_SESSION['last_submission_time'] = $now;

    // In a cPanel production environment, this dispatches mail via mail() or stores to a secure inquiries log
    $logDir = __DIR__ . '/../data';
    if (!is_dir($logDir)) {
        @mkdir($logDir, 0750, true);
    }
    
    $logFile = $logDir . '/inquiries.json';
    $entry = [
        'timestamp' => date('c'),
        'ip'        => $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN',
        'name'      => $fullName,
        'email'     => $email,
        'phone'     => $phone,
        'country'   => $country,
        'interest'  => $interest,
        'message'   => $message
    ];
    
    $existing = [];
    if (file_exists($logFile)) {
        $content = file_get_contents($logFile);
        $decoded = json_decode($content, true);
        if (is_array($decoded)) {
            $existing = $decoded;
        }
    }
    $existing[] = $entry;
    @file_put_contents($logFile, json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

    // Also attempt PHP mail dispatch if configured on cPanel host
    $to = CONTACT_EMAIL;
    $subject = "New PhytoScience Business Inquiry: {$fullName} ({$country})";
    $body = "New distributor inquiry received on " . date('Y-m-d H:i:s') . "\n\n" .
            "Name: {$fullName}\n" .
            "Email: {$email}\n" .
            "Phone: {$phone}\n" .
            "Country: {$country}\n" .
            "Interest: {$interest}\n\n" .
            "Message:\n{$message}\n\n" .
            "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'N/A');
    $headers = "From: webmaster@" . ($_SERVER['HTTP_HOST'] ?? 'phytosciencewellness.com') . "\r\n" .
               "Reply-To: {$email}\r\n" .
               "X-Mailer: PHP/" . phpversion();
    @mail($to, $subject, $body, $headers);

    return [
        'status' => 'success',
        'message' => 'Thank you! Your business inquiry has been received. An authorized PhytoScience consultant will reach out via email or WhatsApp shortly.'
    ];
}

/**
 * CSRF and Redirection helper aliases
 */
function generate_csrf_token(): string {
    return csrf_token();
}

function verify_csrf_token(?string $token): bool {
    return csrf_validate($token);
}

function redirect(string $url): void {
    if (!headers_sent()) {
        header('Location: ' . $url);
        exit;
    }
    echo '<script>window.location.href=' . json_encode($url) . ';</script>';
    exit;
}

function send_contact_mail(string $to, string $subject, string $body, ?string $replyTo = null): bool {
    $host = $_SERVER['HTTP_HOST'] ?? 'phytosciencewellness.com';
    $headers = "From: webmaster@" . $host . "\r\n";
    if ($replyTo) {
        $headers .= "Reply-To: {$replyTo}\r\n";
    }
    $headers .= "X-Mailer: PHP/" . phpversion();
    return @mail($to, $subject, $body, $headers);
}

/**
 * Get clean or file URL for a product
 */
function get_product_url(string $slug): string {
    return get_business_url($slug . '.php');
}

/**
 * Process Product Order Submissions
 */
function handle_product_order_submission(): ?array {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['action']) || $_POST['action'] !== 'place_order') {
        return null;
    }

    // Anti-bot Honeypot check
    if (!empty($_POST['website_hp'])) {
        return ['status' => 'error', 'message' => 'Spam verification triggered. Please try again.'];
    }

    // CSRF check
    $token = $_POST['csrf_token'] ?? '';
    if (!csrf_validate($token)) {
        return ['status' => 'error', 'message' => 'Security token expired. Please refresh the page and try again.'];
    }

    $firstName     = sanitize($_POST['first_name'] ?? '');
    $lastName      = sanitize($_POST['last_name'] ?? '');
    $fullName      = sanitize($_POST['full_name'] ?? '');
    if (empty($fullName) && (!empty($firstName) || !empty($lastName))) {
        $fullName = trim($firstName . ' ' . $lastName);
    }
    $phone         = sanitize($_POST['phone'] ?? '');
    $altPhone      = sanitize($_POST['alt_phone'] ?? '');
    $email         = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $address       = sanitize($_POST['address'] ?? '');
    $cityState     = sanitize($_POST['state'] ?? $_POST['city_state'] ?? '');
    $country       = sanitize($_POST['country'] ?? 'Nigeria');
    $contactMethod = sanitize($_POST['contact_method'] ?? 'WhatsApp');
    $productSlug   = sanitize($_POST['product_slug'] ?? '');
    $productName   = sanitize($_POST['interested_product'] ?? $_POST['product_name'] ?? 'PhytoScience Product');
    $package       = sanitize($_POST['package'] ?? '');
    $paymentMethod = sanitize($_POST['payment_method'] ?? 'Pay on Delivery');
    $comments      = sanitize($_POST['comments'] ?? $_POST['notes'] ?? '');

    if (empty($fullName) || empty($phone) || empty($address) || empty($package)) {
        return ['status' => 'error', 'message' => 'Please fill in your name, delivery phone number, full address, and select a package.'];
    }

    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['status' => 'error', 'message' => 'Please provide a valid email address.'];
    }

    // Rate limiting: 1 submission per 5 seconds
    $now = time();
    if (isset($_SESSION['last_order_time']) && ($now - $_SESSION['last_order_time']) < 5) {
        return ['status' => 'error', 'message' => 'Please wait a moment before submitting again.'];
    }
    $_SESSION['last_order_time'] = $now;

    $orderId = 'PS-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));

    // Save to orders.json
    $logDir = __DIR__ . '/../data';
    if (!is_dir($logDir)) {
        @mkdir($logDir, 0750, true);
    }
    $logFile = $logDir . '/orders.json';
    $entry = [
        'order_id'       => $orderId,
        'timestamp'      => date('c'),
        'ip'             => $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN',
        'product_slug'   => $productSlug,
        'product_name'   => $productName,
        'package'        => $package,
        'first_name'     => $firstName,
        'last_name'      => $lastName,
        'full_name'      => $fullName,
        'phone'          => $phone,
        'alt_phone'      => $altPhone,
        'email'          => $email,
        'country'        => $country,
        'state'          => $cityState,
        'address'        => $address,
        'contact_method' => $contactMethod,
        'payment_method' => $paymentMethod,
        'comments'       => $comments,
        'status'         => 'Pending Confirmation'
    ];

    $existing = [];
    if (file_exists($logFile)) {
        $content = @file_get_contents($logFile);
        $decoded = @json_decode($content, true);
        if (is_array($decoded)) {
            $existing = $decoded;
        }
    }
    $existing[] = $entry;
    @file_put_contents($logFile, json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

    // Dispatch email notification
    $to = CONTACT_EMAIL;
    $subject = "🔥 NEW ORDER: [{$orderId}] {$productName} - {$fullName} ({$cityState})";
    $body = "A new product order has been placed on the PhytoScience Platform!\n\n" .
            "ORDER ID: {$orderId}\n" .
            "DATE: " . date('Y-m-d H:i:s') . "\n" .
            "PRODUCT: {$productName}\n" .
            "PACKAGE: {$package}\n" .
            "PAYMENT METHOD: {$paymentMethod}\n" .
            "PREFERRED CONTACT: {$contactMethod}\n\n" .
            "CUSTOMER DETAILS:\n" .
            "Name: {$fullName}\n" .
            "Phone: {$phone}\n" .
            (!empty($altPhone) ? "Alt Phone: {$altPhone}\n" : "") .
            (!empty($email) ? "Email: {$email}\n" : "") .
            "Delivery Address: {$address}\n" .
            "State / City: {$cityState}\n" .
            "Country: {$country}\n\n" .
            (!empty($comments) ? "Comments / Delivery Notes:\n{$comments}\n\n" : "") .
            "Client IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'N/A') . "\n";
    send_contact_mail($to, $subject, $body, !empty($email) ? $email : null);

    // Build prefilled WhatsApp message
    $waText = "Hello PhytoScience Team, I just placed an order on the website!\n\n" .
              "📦 *Order ID:* {$orderId}\n" .
              "🌿 *Product:* {$productName}\n" .
              "💎 *Package:* {$package}\n" .
              "👤 *Customer:* {$fullName}\n" .
              "📞 *Phone:* {$phone}\n" .
              "📍 *Delivery Address:* {$address}, {$cityState}, {$country}\n" .
              "📲 *Contact Method:* {$contactMethod}\n" .
              "💳 *Payment Preference:* {$paymentMethod}\n\n" .
              "Please confirm my order and arrange dispatch. Thank you!";
    $waUrl = "https://wa.me/2348023173303?text=" . urlencode($waText);

    return [
        'status'         => 'success',
        'order_id'       => $orderId,
        'product_name'   => $productName,
        'package'        => $package,
        'full_name'      => $fullName,
        'phone'          => $phone,
        'whatsapp_url'   => $waUrl,
        'message'        => 'Thank you! Your order has been placed successfully. Order Reference: ' . $orderId . '. Our logistics team will contact you shortly to confirm dispatch.'
    ];
}

/**
 * Get active detected or selected visitor currency
 */
function get_active_currency(bool $fallbackDefault = true): string {
    return detect_visitor_currency($fallbackDefault);
}

/**
 * Format a price given in USD to the active or specified currency
 */
function format_price(float $usdAmount, ?string $currency = null): string {
    $c = $currency ?? get_active_currency();
    return convert_usd_price($usdAmount, $c);
}

/**
 * Render the Currency Selector Dropdown for Navbar or Headers
 */
function render_currency_selector(string $extraClass = ''): string {
    $currencies = get_supported_currencies();
    $activeCode = get_active_currency();
    $active = $currencies[$activeCode] ?? $currencies['NGN'];

    $itemsHtml = '';
    foreach ($currencies as $code => $c) {
        $isActive = ($code === $activeCode);
        $activeClass = $isActive ? 'active' : '';
        $itemsHtml .= '<li>
            <a class="dropdown-item dropdown-item-ps d-flex align-items-center justify-content-between js-currency-item ' . $activeClass . '" href="javascript:void(0)" data-currency="' . $code . '">
                <span>' . $c['flag'] . ' ' . $code . ' (' . $c['symbol'] . ')</span>
                <span class="small text-secondary ms-2">' . $c['name'] . '</span>
            </a>
        </li>';
    }

    return '
    <div class="dropdown ps-currency-dropdown ' . sanitize($extraClass) . '">
        <button class="btn btn-sm btn-ps-glass dropdown-toggle d-flex align-items-center gap-1 py-1 px-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Change currency">
            <span class="js-curr-flag">' . $active['flag'] . '</span>
            <span class="js-curr-code fw-bold">' . $active['code'] . '</span>
            <span class="text-gold small js-curr-symbol">(' . $active['symbol'] . ')</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-ps dropdown-menu-end shadow-lg" style="max-height: 380px; overflow-y: auto;">
            <li class="dropdown-header text-uppercase text-gold small" style="font-size: 0.68rem; letter-spacing: 0.05em;">Select Currency</li>
            ' . $itemsHtml . '
        </ul>
    </div>';
}




