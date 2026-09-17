<?php
/**
 * PhytoScience Wellness - Standard Header Include
 */

declare(strict_types=1);

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/functions.php';
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
  <?php require __DIR__ . '/meta-tags.php'; ?>

  <!-- Preconnect to Google Fonts and Video CDNs -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://cdn.jsdelivr.net">

  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Custom Luxury Theme & Animations -->
  <link rel="stylesheet" href="<?= asset('css/theme.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/animations.css') ?>">

  <!-- Multi-Currency Dynamic Engine -->
  <script>
    window.PS_DETECTED_CURRENCY = <?= json_encode(get_active_currency(false)) ?>;
  </script>
  <script src="<?= asset('js/currency-switcher.js') ?>" defer></script>

  <!-- Favicons -->
  <link rel="icon" type="image/svg+xml" href="<?= asset('images/favicon.svg') ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('images/favicon-32x32.png') ?>">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('images/apple-touch-icon.png') ?>">
</head>
<body class="d-flex flex-column h-100">

<?php 
// Include Top Navigation
require __DIR__ . '/navbar.php'; 
?>

<main class="flex-shrink-0" style="padding-top: 76px;">
<?php
// Display any session flash message
$flash = get_flash();
if ($flash):
?>
  <div class="container mt-3">
    <div class="alert alert-<?= $flash['type'] === 'error' ? 'danger' : sanitize($flash['type']) ?> alert-dismissible fade show ps-card" role="alert">
      <div class="d-flex align-items-center gap-2">
        <span><?= sanitize($flash['message']) ?></span>
      </div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
<?php endif; ?>
