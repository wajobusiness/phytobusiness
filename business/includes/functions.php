<?php
/**
 * PhytoScience Wellness - Helper Functions & Security Utilities
 */

declare(strict_types=1);

require_once __DIR__ . '/../config.php';

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


