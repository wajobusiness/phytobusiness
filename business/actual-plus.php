<?php
/**
 * PhytoScience Wellness - Actual Plus™ (Actual+) Official Landing Page
 * Complete High-Converting Product Campaign System
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/data/products.php';

$product = get_product_by_slug('actual-plus');
if (!$product) {
    header("Location: " . get_business_url());
    exit;
}

// Process order submission if posted
$orderResult = handle_product_order_submission();

// Page-Specific SEO Metadata
$pageTitle = $product['seo']['title'];
$pageDescription = $product['seo']['description'];
$pageKeywords = $product['seo']['keywords'];
$pageCanonical = get_product_url($product['slug']);
$pageImage = get_business_url('assets/' . ltrim($product['image'], '/'));
$schemaType = 'Product';

// Normalize benefits and comparison
$benefits = $product['key_benefits'] ?? $product['benefits'] ?? [];

$comparisonRows = [];
if (isset($product['comparison']['phytoscience']['points'], $product['comparison']['others']['points'])) {
    $phytoPoints = $product['comparison']['phytoscience']['points'];
    $otherPoints = $product['comparison']['others']['points'];
    $aspects = ['Delivery & Bioavailability', 'Clinical Formulation', 'Key Active Ingredients', 'Target Demographics & Safety', 'Sensory Experience & Quality'];
    $count = max(count($phytoPoints), count($otherPoints));
    for ($i = 0; $i < $count; $i++) {
        $comparisonRows[] = [
            'aspect' => $aspects[$i] ?? ('Criterion ' . ($i + 1)),
            'product' => $phytoPoints[$i] ?? '',
            'conventional' => $otherPoints[$i] ?? ''
        ];
    }
} elseif (isset($product['comparison']) && is_array($product['comparison'])) {
    $comparisonRows = $product['comparison'];
}

// Include Global Header
require __DIR__ . '/includes/header.php';
?>

<link rel="stylesheet" href="<?= asset('css/product-landing.css') ?>">

<!-- Schema.org Product & FAQ Structured Data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": <?= json_encode($product['name']) ?>,
  "image": [<?= json_encode($pageImage) ?>],
  "description": <?= json_encode($product['short_desc']) ?>,
  "brand": {
    "@type": "Brand",
    "name": "PhytoScience"
  },
  "offers": {
    "@type": "AggregateOffer",
    "priceCurrency": "NGN",
    "lowPrice": "38000",
    "highPrice": "138000",
    "offerCount": "3",
    "availability": "https://schema.org/InStock",
    "seller": {
      "@type": "Organization",
      "name": "Phyto Science Sdn Bhd"
    }
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.9",
    "reviewCount": "1120",
    "bestRating": "5",
    "worstRating": "1"
  }
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    <?php 
    $faqItems = [];
    foreach ($product['faqs'] as $faq) {
        $faqItems[] = json_encode([
            '@type' => 'Question',
            'name' => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['a']
            ]
        ], JSON_UNESCAPED_SLASHES);
    }
    echo implode(",\n", $faqItems);
    ?>
  ]
}
</script>

<!-- ========================================================================
     1. HERO SECTION: ACTUAL PLUS™ (ACTUAL+)
======================================================================== -->
<section class="ps-prod-hero">
  <div class="container">
    <div class="row align-items-center g-5">
      
      <!-- Right Column on Desktop: Product Packshot -->
      <div class="col-lg-6 order-lg-2">
        <div class="ps-prod-img-stage">
          <span class="ps-prod-badge-floating">
            ★ <?= htmlspecialchars($product['badge']) ?>
          </span>
          <img src="<?= asset(ltrim($product['image'], '/')) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="img-fluid" width="520" height="320">
          <div class="ps-prod-origin-badge">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
            <span><?= htmlspecialchars($product['packaging']) ?></span>
          </div>
        </div>

        <!-- Trust Certifications -->
        <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap mt-3 text-center">
          <?php foreach ($product['certifications'] as $cert): ?>
            <span class="ps-trust-badge-pill">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#2ECC71" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
              <?= htmlspecialchars($cert) ?>
            </span>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Left Column on Desktop: Pitch & Actions -->
      <div class="col-lg-6 order-lg-1">
        
        <!-- Urgency Callout -->
        <div class="ps-urgency-bar">
          <div class="ps-live-indicator">
            <span class="ps-pulse-dot"></span>
            <span>LIVE CAMPAIGN PROMOTION</span>
          </div>
          <div class="text-white-50 small">
            🔥 Over <strong class="text-white"><?= $product['orders_today'] ?> orders</strong> placed today! Fast 24h dispatch.
          </div>
        </div>

        <!-- Rating Stars -->
        <div class="d-flex align-items-center gap-2 mb-2">
          <div class="text-warning small" style="letter-spacing: 2px;">★★★★★</div>
          <span class="text-white fw-bold small"><?= $product['rating'] ?>/5.0</span>
          <span class="text-secondary small">(<?= number_format($product['reviews_count']) ?> Verified Buyers Worldwide)</span>
        </div>

        <h1 class="display-5 fw-bold text-white mb-3">
          <?= $product['hero_headline'] ?>
        </h1>

        <p class="lead text-secondary fs-6 mb-4">
          <?= htmlspecialchars($product['short_desc']) ?>
        </p>

        <!-- Pricing Callout Box -->
        <div class="p-3 rounded-3 mb-4" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08);">
          <div class="small text-secondary text-uppercase fw-bold" style="font-size: 0.72rem; letter-spacing: 0.05em;">Special Direct Promotional Pricing:</div>
          <div class="ps-hero-price-wrap my-1">
            <span class="ps-hero-price-now"><?= htmlspecialchars($product['pricing'][0]['price_ngn']) ?></span>
            <span class="ps-hero-price-was"><?= htmlspecialchars($product['pricing'][0]['original_ngn']) ?></span>
            <span class="ps-hero-save-badge">SAVE ₦10,000 (21% OFF)</span>
          </div>
          <div class="text-white-50 small d-flex align-items-center gap-2">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2ECC71" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
            <span>International equivalent: <strong class="text-gold"><?= htmlspecialchars($product['pricing'][0]['price_usd']) ?></strong> | Pay on Delivery in Lagos & Abuja</span>
          </div>
        </div>

        <!-- Triple Action CTAs: Order Now, WhatsApp, Call Now -->
        <div class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center gap-2 mb-4">
          <a href="#order-form" class="btn-ps btn-ps-primary py-3 px-4 text-center fs-6 fw-bold flex-grow-1">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4H6zM3 6h18M16 10a4 4 0 01-8 0"/></svg>
            <span>Order Now</span>
          </a>
          <a href="https://wa.me/2348023173303?text=<?= urlencode('Hello PhytoScience Team, I am interested in ordering Actual Plus (Actual+). Please assist me.') ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-emerald py-3 px-3 text-center fs-6 fw-bold">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.043s.433-.506.549-.68c.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.099.824zm-3.423-14.416c-6.627 0-12 5.373-12 12 0 2.112.551 4.095 1.517 5.82l-1.617 5.912 6.074-1.593c1.66.908 3.565 1.427 5.59 1.427 6.627 0 12-5.373 12-12 0-6.627-5.373-12-12-12z"/></svg>
            <span>WhatsApp</span>
          </a>
          <a href="tel:+2348023173303" class="btn-ps btn-ps-outline-gold py-3 px-3 text-center fs-6 fw-bold">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            <span>Call Now</span>
          </a>
        </div>

        <div class="small text-secondary">
          🔒 <strong>100% Risk-Free:</strong> Sealed Swiss Quality Packaging • Direct Verification Guarantee
        </div>

      </div>

    </div>
  </div>
</section>

<!-- ========================================================================
     2. WHY THIS PRODUCT? (PROBLEM-AGITATION & BIOLOGICAL SOLUTION)
======================================================================== -->
<section class="py-5 position-relative" style="background: #101116;" id="why-this-product">
  <div class="container">
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="badge px-3 py-1 rounded-pill mb-2" style="background: rgba(216, 0, 29, 0.12); color: #FF4D5E; border: 1px solid rgba(216, 0, 29, 0.3); font-size: 0.75rem; font-weight: 700;">
        CHRONIC IMMUNE DEFICIENCY & PATHOGEN OVERLOAD
      </span>
      <h2 class="display-6 fw-bold text-white mb-3">Why Single-Herb Remedies <span class="text-danger">Keep Failing You</span></h2>
      <p class="text-secondary">Recurrent malaria, chronic typhoid, persistent fatigue, and unstable blood sugar are signs that your cellular immune defenses need broad-spectrum botanical synergy.</p>
    </div>

    <div class="row g-4 mb-5">
      <div class="col-md-4">
        <div class="ps-problem-card">
          <div class="ps-problem-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
          </div>
          <h4 class="text-white fw-bold fs-5 mb-2">Isolated Nutrients Fail</h4>
          <p class="text-secondary small mb-0">Generic synthetic vitamin C or isolated garlic pills lack the natural enzyme complexes found in living plants, leaving cellular defense mechanisms vulnerable.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="ps-problem-card">
          <div class="ps-problem-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg>
          </div>
          <h4 class="text-white fw-bold fs-5 mb-2">Chalky Pills Hurt Digestion</h4>
          <p class="text-secondary small mb-0">Swallowing 8 to 10 hard synthetic tablets irritates weak stomach linings, triggers acid reflux, and stresses already overworked liver and kidney filtration systems.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="ps-problem-card">
          <div class="ps-problem-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
          </div>
          <h4 class="text-white fw-bold fs-5 mb-2">High Heat Destroys Enzymes</h4>
          <p class="text-secondary small mb-0">Standard industrial processing uses high temperatures that destroy sensitive live plant enzymes, rendering typical market syrups and teas biologically dead.</p>
        </div>
      </div>
    </div>

    <!-- The Solution Banner -->
    <div class="p-4 p-md-5 rounded-4 position-relative overflow-hidden" style="background: radial-gradient(circle at 10% 50%, rgba(216,0,29,0.15) 0%, rgba(18,19,24,0.95) 100%); border: 1px solid rgba(216,0,29,0.3);">
      <div class="row align-items-center g-4">
        <div class="col-lg-8">
          <span class="badge px-3 py-1 rounded-pill mb-2" style="background: #2ECC71; color: #000; font-weight: 800; font-size: 0.72rem;">THE 39-IN-1 COLD-ENZYMATIC MASTER ELIXIR</span>
          <h3 class="text-white fw-bold display-6 fs-3 mb-3">How Actual Plus™ Restores Supreme Immunity</h3>
          <p class="text-secondary mb-3">
            <?= htmlspecialchars($product['how_it_works']) ?>
          </p>
          <div class="text-white-50 small">
            <strong>Ideal For:</strong> <?= htmlspecialchars($product['target_audience']) ?>
          </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
          <a href="#order-form" class="btn-ps btn-ps-primary py-3 px-4">
            Try Actual Plus™ Risk-Free →
          </a>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ========================================================================
     3. KEY BENEFITS & CLINICAL SCIENCE
======================================================================== -->
<section class="py-5 position-relative" style="background: #0A0B0E;" id="benefits">
  <div class="container">
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="badge px-3 py-1 rounded-pill mb-2" style="background: rgba(198, 164, 92, 0.15); color: #C6A45C; border: 1px solid rgba(198, 164, 92, 0.3); font-size: 0.75rem; font-weight: 700;">
        CLINICAL BOTANICAL EFFICACY
      </span>
      <h2 class="display-6 fw-bold text-white mb-3">6 Core Transformations from <span class="text-gold">Actual Plus™</span></h2>
      <p class="text-secondary">Harmonizes 18 fruits, 12 vegetables, and 9 medicinal herbs to activate your body’s self-healing biological intelligence.</p>
    </div>

    <div class="row g-4">
      <?php foreach ($benefits as $idx => $benefit): ?>
        <div class="col-lg-4 col-md-6">
          <div class="ps-benefit-card">
            <div class="ps-benefit-icon-box">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
            </div>
            <h4 class="text-white fw-bold fs-5 mb-2"><?= htmlspecialchars($benefit['title']) ?></h4>
            <p class="text-secondary small mb-0"><?= htmlspecialchars($benefit['desc']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ========================================================================
     4. WHY CUSTOMERS CHOOSE THIS (COMPARISON MATRIX & INGREDIENTS)
======================================================================== -->
<section class="py-5 position-relative" style="background: #101116;" id="comparison">
  <div class="container">
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="badge px-3 py-1 rounded-pill mb-2" style="background: rgba(198, 164, 92, 0.15); color: #C6A45C; border: 1px solid rgba(198, 164, 92, 0.3); font-size: 0.75rem; font-weight: 700;">
        THE DEFINITIVE COMPARISON
      </span>
      <h2 class="display-6 fw-bold text-white mb-3">Single-Herb Capsules vs <span class="text-gold">Actual Plus™</span></h2>
      <p class="text-secondary">Discover the unmatched biological synergy of 39 botanical whole foods in one concentrated, living dropper bottle.</p>
    </div>

    <div class="ps-compare-table-wrap table-responsive mb-5">
      <table class="ps-compare-table">
        <thead>
          <tr>
            <th style="width: 30%;">Evaluation Factor</th>
            <th style="width: 35%; color: #8C8E99;">Generic Single-Herb Capsules</th>
            <th class="highlight-col" style="width: 35%; font-size: 1.05rem;">
              <span class="text-gold">★</span> Actual Plus™ (Actual+)
            </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($comparisonRows as $row): ?>
            <tr>
              <td class="fw-bold text-white"><?= htmlspecialchars($row['aspect']) ?></td>
              <td class="text-danger-emphasis">
                <span class="text-danger me-1">✕</span> <?= htmlspecialchars($row['conventional']) ?>
              </td>
              <td class="highlight-col text-white">
                <span class="text-success me-1">✓</span> <?= htmlspecialchars($row['product']) ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Active Botanical Ingredients -->
    <div class="text-center max-w-700 mx-auto mb-4">
      <h3 class="text-white fw-bold fs-4">Active Botanical Bio-Compounds</h3>
      <p class="text-secondary small">Cold-enzymatic extracts preserving thousands of natural phytonutrients.</p>
    </div>
    <div class="row g-4 justify-content-center">
      <?php foreach ($product['ingredients'] as $ing): ?>
        <div class="col-lg-4 col-md-6">
          <div class="ps-ingredient-card">
            <div>
              <span class="ps-ingredient-badge">Active Botanical</span>
              <h4 class="text-white fw-bold fs-5 mb-1"><?= htmlspecialchars($ing['name']) ?></h4>
              <div class="text-white-50 small mb-3"><strong>Origin:</strong> <?= htmlspecialchars($ing['source'] ?? $ing['origin'] ?? '') ?></div>
              <p class="text-secondary small mb-3"><?= htmlspecialchars($ing['desc'] ?? $ing['role'] ?? '') ?></p>
            </div>
            <div class="p-2 px-3 rounded-2" style="background: rgba(255,255,255,0.03); border-left: 2px solid #C6A45C;">
              <span class="text-gold fw-semibold" style="font-size: 0.78rem;">✓ Standardized Bio-Active Extract</span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ========================================================================
     5. PRODUCT GALLERY & PACKAGING SHOWCASE (WITH ZOOM)
======================================================================== -->
<section class="py-5 position-relative" style="background: #0A0B0E;" id="gallery">
  <div class="container">
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="badge px-3 py-1 rounded-pill mb-2" style="background: rgba(216, 0, 29, 0.12); color: #FF4D5E; border: 1px solid rgba(216, 0, 29, 0.3); font-size: 0.75rem; font-weight: 700;">
        GENUINE PACKAGING & BIO-VERIFICATION
      </span>
      <h2 class="display-6 fw-bold text-white mb-3">Actual Plus™ <span class="text-gold">Visual Showcase</span></h2>
      <p class="text-secondary">Explore the packaging, tamper-proof dropper bottle, Swiss quality marks, and liquid drop ritual. Click any image to view in high-resolution lightbox.</p>
    </div>

    <div class="row g-4 justify-content-center">
      <div class="col-lg-3 col-6">
        <div class="ps-gallery-card js-image-trigger" data-img-src="<?= asset(ltrim($product['image'], '/')) ?>" data-img-caption="Actual Plus™ (Actual+) — Official 30ml Dropper Bottle & Tamper Seal">
          <img src="<?= asset(ltrim($product['image'], '/')) ?>" alt="Actual Plus Bottle" loading="lazy">
          <div class="ps-gallery-zoom-overlay">
            <div class="ps-gallery-zoom-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
            </div>
          </div>
        </div>
        <div class="text-center mt-2">
          <span class="text-white small fw-semibold">Retail Packshot & Seal</span>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="ps-gallery-card js-image-trigger" data-img-src="<?= asset('images/logo.png') ?>" data-img-caption="PhytoScience Quality Guarantee & Pure Botanical Standard">
          <img src="<?= asset('images/logo.png') ?>" alt="Pure Botanical Certification" loading="lazy">
          <div class="ps-gallery-zoom-overlay">
            <div class="ps-gallery-zoom-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
            </div>
          </div>
        </div>
        <div class="text-center mt-2">
          <span class="text-white small fw-semibold">Botanical Purity Patent</span>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="ps-gallery-card js-image-trigger" data-img-src="<?= asset('images/testimonies/cancer-testimonies.png') ?>" data-img-caption="Documented Patient Immune & Metabolic Recovery Records">
          <img src="<?= asset('images/testimonies/cancer-testimonies.png') ?>" alt="Clinical Recovery Proof" loading="lazy">
          <div class="ps-gallery-zoom-overlay">
            <div class="ps-gallery-zoom-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
            </div>
          </div>
        </div>
        <div class="text-center mt-2">
          <span class="text-white small fw-semibold">Documented Results</span>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="ps-gallery-card js-image-trigger" data-img-src="<?= asset('images/achievers/incentives-banner.jpg') ?>" data-img-caption="Global PhytoScience Leaders & Verified Product Testimonies Worldwide">
          <img src="<?= asset('images/achievers/incentives-banner.jpg') ?>" alt="Global PhytoScience Achievers" loading="lazy">
          <div class="ps-gallery-zoom-overlay">
            <div class="ps-gallery-zoom-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
            </div>
          </div>
        </div>
        <div class="text-center mt-2">
          <span class="text-white small fw-semibold">International Trust</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ========================================================================
     6. USAGE PROTOCOL & DOSAGE GUIDE
======================================================================== -->
<section class="py-5 position-relative" style="background: #101116;" id="usage">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-5 text-center">
        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
          <img src="<?= asset(ltrim($product['image'], '/')) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="img-fluid mb-4" style="max-height: 320px; object-fit: contain;">
          <h4 class="text-white fw-bold fs-5 mb-1"><?= htmlspecialchars($product['name']) ?></h4>
          <p class="text-gold small mb-3"><?= htmlspecialchars($product['category']) ?></p>
          <div class="d-flex justify-content-center gap-3 text-secondary small">
            <span>📦 <?= htmlspecialchars($product['packaging']) ?></span>
            <span>⏳ Shelf Life: <?= htmlspecialchars($product['shelf_life']) ?></span>
          </div>
        </div>
      </div>

      <div class="col-lg-7">
        <span class="badge px-3 py-1 rounded-pill mb-2" style="background: rgba(216, 0, 29, 0.12); color: #FF4D5E; border: 1px solid rgba(216, 0, 29, 0.3); font-size: 0.75rem; font-weight: 700;">
          STEP-BY-STEP PROTOCOL
        </span>
        <h2 class="display-6 fw-bold text-white mb-3">How to Take for <span class="text-gold">Maximum Immune & Metabolic Defense</span></h2>
        <p class="text-secondary mb-4">Actual Plus™ comes in an ultra-concentrated dropper bottle that dissolves effortlessly in warm or room temperature water.</p>

        <div class="d-flex flex-column gap-3 mb-4">
          <div class="p-3 rounded-3 d-flex gap-3 align-items-start" style="background: rgba(24,25,32,0.6); border: 1px solid rgba(255,255,255,0.08);">
            <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold flex-shrink-0" style="width: 36px; height: 36px; background: #D8001D;">1</div>
            <div>
              <h5 class="text-white fw-bold fs-6 mb-1">Recommended Dosage</h5>
              <p class="text-secondary small mb-0"><?= htmlspecialchars($product['usage']['dosage']) ?></p>
            </div>
          </div>

          <div class="p-3 rounded-3 d-flex gap-3 align-items-start" style="background: rgba(24,25,32,0.6); border: 1px solid rgba(255,255,255,0.08);">
            <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold flex-shrink-0" style="width: 36px; height: 36px; background: #C6A45C;">2</div>
            <div>
              <h5 class="text-white fw-bold fs-6 mb-1">Method of Ingestion</h5>
              <p class="text-secondary small mb-0"><?= htmlspecialchars($product['usage']['method']) ?></p>
            </div>
          </div>

          <div class="p-3 rounded-3 d-flex gap-3 align-items-start" style="background: rgba(24,25,32,0.6); border: 1px solid rgba(255,255,255,0.08);">
            <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold flex-shrink-0" style="width: 36px; height: 36px; background: #2ECC71;">3</div>
            <div>
              <h5 class="text-white fw-bold fs-6 mb-1">Preserving Live Enzymes</h5>
              <p class="text-secondary small mb-0"><?= htmlspecialchars($product['usage']['tip']) ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ========================================================================
     7. REAL VIDEO TESTIMONIALS
======================================================================== -->
<section class="py-5 position-relative" style="background: #0A0B0E;" id="video-proof">
  <div class="container">
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="badge px-3 py-1 rounded-pill mb-2" style="background: rgba(216, 0, 29, 0.12); color: #FF4D5E; border: 1px solid rgba(216, 0, 29, 0.3); font-size: 0.75rem; font-weight: 700;">
        VERIFIED RECOVERY STORIES
      </span>
      <h2 class="display-6 fw-bold text-white mb-3">Watch Real People Share <span class="text-crimson">Their Results</span></h2>
      <p class="text-secondary">Watch genuine video accounts of blood sugar balance, immune recovery, and physical healing with PhytoScience.</p>
    </div>

    <div class="row g-4 justify-content-center">
      <?php foreach ($product['videos'] as $vid): ?>
        <div class="col-md-6 col-lg-5">
          <div class="ps-video-proof-card">
            <div class="ps-video-thumb-container js-video-trigger" data-video-id="<?= htmlspecialchars($vid['id']) ?>" data-video-title="<?= htmlspecialchars($vid['title']) ?>">
              <img src="https://img.youtube.com/vi/<?= htmlspecialchars($vid['id']) ?>/hqdefault.jpg" alt="<?= htmlspecialchars($vid['title']) ?>" loading="lazy">
              <div class="ps-video-play-overlay">
                <div class="ps-play-circle-btn">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                </div>
              </div>
            </div>
            <div class="p-3">
              <span class="badge bg-crimson fw-bold mb-1" style="font-size: 0.7rem;">VERIFIED TESTIMONY</span>
              <h5 class="text-white fw-bold fs-6 mb-2"><?= htmlspecialchars($vid['title']) ?></h5>
              <div class="d-flex align-items-center justify-content-between">
                <span class="text-secondary small">Click thumbnail to play</span>
                <button type="button" class="btn btn-sm btn-link text-danger p-0 text-decoration-none fw-bold js-video-trigger" data-video-id="<?= htmlspecialchars($vid['id']) ?>" data-video-title="<?= htmlspecialchars($vid['title']) ?>" style="font-size: 0.8rem;">
                  Watch Video ▶
                </button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ========================================================================
     8. CUSTOMER REVIEWS & RATINGS
======================================================================== -->
<section class="py-5 position-relative" style="background: #101116;" id="reviews">
  <div class="container">
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="badge px-3 py-1 rounded-pill mb-2" style="background: rgba(198, 164, 92, 0.15); color: #C6A45C; border: 1px solid rgba(198, 164, 92, 0.3); font-size: 0.75rem; font-weight: 700;">
        AUTHENTIC BUYER REVIEWS
      </span>
      <h2 class="display-6 fw-bold text-white mb-3">Rated <span class="text-gold"><?= $product['rating'] ?>/5.0</span> Across Nigeria & Worldwide</h2>
      <p class="text-secondary">Read authentic stories of immune resilience, metabolic recovery, and lasting family wellness.</p>
    </div>

    <div class="row g-4 justify-content-center">
      <?php foreach ($product['testimonials'] as $rev): ?>
        <div class="col-lg-4 col-md-6">
          <div class="ps-review-card">
            <div>
              <div class="ps-review-stars">★★★★★</div>
              <p class="text-light small mb-3 fst-italic">"<?= htmlspecialchars($rev['text']) ?>"</p>
            </div>
            <div class="d-flex align-items-center justify-content-between pt-3 border-top border-secondary border-opacity-25">
              <div>
                <h5 class="text-white fw-bold fs-6 mb-0"><?= htmlspecialchars($rev['name']) ?></h5>
                <span class="text-secondary" style="font-size: 0.78rem;"><?= htmlspecialchars($rev['location']) ?></span>
              </div>
              <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25" style="font-size: 0.68rem;">
                ✓ Verified Buyer
              </span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ========================================================================
     9. FREQUENTLY ASKED QUESTIONS (ACCORDION FAQ)
======================================================================== -->
<section class="py-5 position-relative" style="background: #0A0B0E;" id="faq">
  <div class="container">
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="badge px-3 py-1 rounded-pill mb-2" style="background: rgba(216, 0, 29, 0.12); color: #FF4D5E; border: 1px solid rgba(216, 0, 29, 0.3); font-size: 0.75rem; font-weight: 700;">
        FREQUENTLY ASKED QUESTIONS
      </span>
      <h2 class="display-6 fw-bold text-white mb-3">Everything You Need to Know About <span class="text-crimson">Actual Plus™</span></h2>
      <p class="text-secondary">Clear, authentic answers regarding safety, usage, results timeline, and delivery procedures.</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="accordion" id="prodFaqAccordion">
          <?php foreach ($product['faqs'] as $fIdx => $faq): ?>
            <div class="accordion-item mb-3 rounded-3 overflow-hidden" style="background: #14151B; border: 1px solid rgba(255, 255, 255, 0.08);">
              <h2 class="accordion-header" id="heading-<?= $fIdx ?>">
                <button class="accordion-button collapsed text-white fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $fIdx ?>" aria-expanded="false" aria-controls="collapse-<?= $fIdx ?>" style="background: #14151B; box-shadow: none;">
                  <?= htmlspecialchars($faq['q']) ?>
                </button>
              </h2>
              <div id="collapse-<?= $fIdx ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?= $fIdx ?>" data-bs-parent="#prodFaqAccordion">
                <div class="accordion-body text-secondary small" style="background: #111217; line-height: 1.7;">
                  <?= htmlspecialchars($faq['a']) ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ========================================================================
     10. 5-STEP EASY ORDER PROCESS
======================================================================== -->
<?php require __DIR__ . '/components/product-order-steps.php'; ?>

<!-- ========================================================================
     11. PROMOTIONAL PRICING & PACKAGE SELECTOR
======================================================================== -->
<section class="py-5 position-relative" style="background: #101116;" id="pricing-packages">
  <div class="container">
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="badge px-3 py-1 rounded-pill mb-2" style="background: rgba(198, 164, 92, 0.15); color: #C6A45C; border: 1px solid rgba(198, 164, 92, 0.3); font-size: 0.75rem; font-weight: 700;">
        CHOOSE YOUR TRANSFORMATION PACKAGE
      </span>
      <h2 class="display-6 fw-bold text-white mb-3">Limited-Time <span class="text-gold">Promotional Savings</span></h2>
      <p class="text-secondary">Select your package below to lock in promotional discounts. Free doorstep delivery and payment on delivery available across Lagos and Abuja.</p>
    </div>

    <div class="row g-4 justify-content-center align-items-stretch">
      <?php foreach ($product['pricing'] as $pIdx => $tier): ?>
        <div class="col-lg-4 col-md-6">
          <div class="ps-pricing-tier-card <?= !empty($tier['popular']) ? 'popular' : '' ?>" onclick="selectPricingTier(<?= $pIdx ?>, '<?= htmlspecialchars(addslashes($tier['name'] . ' - ' . $tier['price_ngn'] . ' (' . $tier['price_usd'] . ')')) ?>')">
            
            <?php if (!empty($tier['popular'])): ?>
              <span class="ps-tier-ribbon">★ MOST POPULAR CHOICE</span>
            <?php endif; ?>

            <div>
              <span class="badge px-3 py-1 rounded-pill mb-2" style="background: rgba(255,255,255,0.06); color: #C0C2CC; font-size: 0.75rem;">
                <?= htmlspecialchars($tier['badge']) ?>
              </span>
              <h3 class="text-white fw-bold fs-4 mb-0"><?= htmlspecialchars($tier['name']) ?></h3>
              
              <div class="ps-tier-price"><?= htmlspecialchars($tier['price_ngn']) ?></div>
              <div class="ps-tier-was">Original: <?= htmlspecialchars($tier['original_ngn']) ?></div>
              <div class="text-gold fw-bold small mb-3"><?= htmlspecialchars($tier['price_usd']) ?> (Int'l)</div>

              <p class="text-secondary small mb-4"><?= htmlspecialchars($tier['desc']) ?></p>
            </div>

            <div>
              <a href="#order-form" class="btn-ps <?= !empty($tier['popular']) ? 'btn-ps-primary' : 'btn-ps-outline-crimson' ?> w-100 text-center py-3 fs-6 fw-bold" onclick="selectPricingTier(<?= $pIdx ?>, '<?= htmlspecialchars(addslashes($tier['name'] . ' - ' . $tier['price_ngn'] . ' (' . $tier['price_usd'] . ')')) ?>')">
                Select <?= htmlspecialchars($tier['name']) ?>
              </a>
              <div class="text-white-50 small mt-2">Pay on Delivery in Lagos & Abuja</div>
            </div>

          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ========================================================================
     12. CALL-TO-ACTION (LARGE 4-BUTTON CONVERSION SECTION)
======================================================================== -->
<section class="py-5 py-lg-6 position-relative text-center overflow-hidden" style="background: radial-gradient(circle at 50% 50%, rgba(216,0,29,0.22) 0%, rgba(10,11,14,0.98) 75%); border-top: 1px solid rgba(216,0,29,0.3); border-bottom: 1px solid rgba(216,0,29,0.3);">
  <div class="container">
    <div class="max-w-800 mx-auto">
      <span class="badge px-3 py-2 rounded-pill mb-3" style="background: rgba(198, 164, 92, 0.15); color: #C6A45C; border: 1px solid rgba(198, 164, 92, 0.3); font-size: 0.8rem; font-weight: 700;">
        TAKE CHARGE OF YOUR IMMUNE MASTERY TODAY
      </span>
      <h2 class="display-5 fw-bold text-white mb-3">Fortify Your Immune Defenses with <span class="text-crimson">Actual Plus™</span></h2>
      <p class="text-secondary lead fs-6 mb-4">
        Join families across 41+ countries who have protected their health and vitality with the miraculous 39-in-1 botanical whole food formulation.
      </p>

      <!-- 4 High-Converting Action Buttons -->
      <div class="d-flex flex-wrap justify-content-center align-items-center gap-3 mb-4">
        <a href="#order-form" class="btn-ps btn-ps-primary py-3 px-4 fs-6 fw-bold">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4H6zM3 6h18M16 10a4 4 0 01-8 0"/></svg>
          <span>Order Now (Pay on Delivery)</span>
        </a>

        <a href="https://wa.me/2348023173303?text=<?= urlencode('Hello PhytoScience Team, I am on the Actual Plus page and would like to order or consult.') ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-emerald py-3 px-4 fs-6 fw-bold">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.043s.433-.506.549-.68c.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.099.824zm-3.423-14.416c-6.627 0-12 5.373-12 12 0 2.112.551 4.095 1.517 5.82l-1.617 5.912 6.074-1.593c1.66.908 3.565 1.427 5.59 1.427 6.627 0 12-5.373 12-12 0-6.627-5.373-12-12-12z"/></svg>
          <span>Chat on WhatsApp</span>
        </a>

        <a href="tel:+2348023173303" class="btn-ps btn-ps-outline-gold py-3 px-4 fs-6 fw-bold">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          <span>Call Consultant (+234 802 317 3303)</span>
        </a>

        <a href="<?= get_business_url('join.php') ?>" class="btn-ps btn-ps-glass py-3 px-4 fs-6 fw-bold">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          <span>Become a Distributor</span>
        </a>
      </div>

      <div class="d-flex align-items-center justify-content-center gap-4 flex-wrap text-white-50 small">
        <span>✓ 100% Original Swiss Formula</span>
        <span>✓ Pay on Delivery in Lagos & Abuja</span>
        <span>✓ Express Doorstep Courier</span>
      </div>
    </div>
  </div>
</section>

<!-- ========================================================================
     13. DIRECT ORDER & LEAD CAPTURE FORM
======================================================================== -->
<?php require __DIR__ . '/components/product-lead-form.php'; ?>

<!-- ========================================================================
     14. ADVERTISING COMPLIANCE, MEDICAL DISCLAIMER & CROSS-SELL
======================================================================== -->
<?php require __DIR__ . '/components/product-disclaimer.php'; ?>

<!-- STICKY MOBILE CONVERSION BAR -->
<?php require __DIR__ . '/components/product-sticky-bar.php'; ?>

<!-- Client-side Interactive Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  document.body.classList.add('has-sticky-bar');

  // Live Real-Time Countdown Timer
  function initCountdown() {
    let hours = 5, minutes = 42, seconds = 19;
    const hElem = document.getElementById('cd-hours');
    const mElem = document.getElementById('cd-minutes');
    const sElem = document.getElementById('cd-seconds');
    if (!hElem || !mElem || !sElem) return;

    setInterval(function() {
      if (seconds > 0) {
        seconds--;
      } else {
        if (minutes > 0) {
          minutes--;
          seconds = 59;
        } else {
          if (hours > 0) {
            hours--;
            minutes = 59;
            seconds = 59;
          }
        }
      }
      hElem.textContent = String(hours).padStart(2, '0');
      mElem.textContent = String(minutes).padStart(2, '0');
      sElem.textContent = String(seconds).padStart(2, '0');
    }, 1000);
  }
  initCountdown();

  // Package Selector helper
  window.selectPricingTier = function(idx, packageString) {
    const select = document.getElementById('package-select');
    if (select) {
      for (let i = 0; i < select.options.length; i++) {
        if (select.options[i].text.includes(packageString) || select.options[i].value.includes(packageString)) {
          select.selectedIndex = i;
          break;
        }
      }
    }
  };

  // Form submission loading state
  const orderForm = document.getElementById('psOrderForm');
  const submitBtn = document.getElementById('orderSubmitBtn');
  if (orderForm && submitBtn) {
    orderForm.addEventListener('submit', function() {
      submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Processing Your Order...';
      submitBtn.disabled = true;
    });
  }

  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const targetId = this.getAttribute('href');
      if (targetId === '#' || targetId === '') return;
      const targetElem = document.querySelector(targetId);
      if (targetElem) {
        e.preventDefault();
        targetElem.scrollIntoView({ behavior: 'smooth' });
      }
    });
  });
});
</script>

<?php
// Include Global Footer
require __DIR__ . '/includes/footer.php';
?>
