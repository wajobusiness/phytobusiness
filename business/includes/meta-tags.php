<?php
/**
 * PhytoScience Wellness - SEO & Social Metadata Generator
 * Generates Open Graph, Twitter Cards, Canonical URLs & Schema.org JSON-LD
 */

declare(strict_types=1);

require_once __DIR__ . '/../config.php';

// Fallbacks if page didn't define specific meta
$metaTitle = !empty($pageTitle) 
    ? sanitize($pageTitle) . ' | ' . APP_NAME 
    : APP_NAME . ' — Official Global Business Opportunity & Compensation Plan';

$metaDesc = !empty($pageDescription) 
    ? sanitize($pageDescription) 
    : 'Discover the world-class PhytoScience Wellness business opportunity. High-earning hybrid binary compensation plan, plant stem cell innovation, and daily real-time commissions across 41+ countries.';

$metaKeywords = !empty($pageKeywords)
    ? sanitize($pageKeywords)
    : 'PhytoScience business opportunity, Phyto Science compensation plan, double stemcell, crystal cell, binary pairing bonus, network marketing, MLM business Malaysia Africa, PhytoScience membership packages';

$canonical = !empty($pageCanonical)
    ? sanitize($pageCanonical)
    : get_business_url(basename($_SERVER['PHP_SELF'] ?? ''));

$ogImage = !empty($pageImage)
    ? sanitize($pageImage)
    : get_business_url('assets/images/og-share.jpg');

$schemaType = $pageSchemaType ?? 'WebPage';
?>
<!-- Primary Meta Tags -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?= $metaTitle ?></title>
<meta name="title" content="<?= $metaTitle ?>">
<meta name="description" content="<?= $metaDesc ?>">
<meta name="keywords" content="<?= $metaKeywords ?>">
<meta name="author" content="<?= COMPANY_LEGAL_NAME ?>">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<link rel="canonical" href="<?= $canonical ?>">

<!-- Theme Color & Mobile App Capabilities -->
<meta name="theme-color" content="#0B1311" media="(prefers-color-scheme: dark)">
<meta name="theme-color" content="#0C5A3E" media="(prefers-color-scheme: light)">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="PhytoScience">

<!-- Open Graph / Facebook / WhatsApp -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?= $canonical ?>">
<meta property="og:title" content="<?= $metaTitle ?>">
<meta property="og:description" content="<?= $metaDesc ?>">
<meta property="og:image" content="<?= $ogImage ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="<?= APP_NAME ?>">
<meta property="og:locale" content="en_US">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="<?= $canonical ?>">
<meta name="twitter:title" content="<?= $metaTitle ?>">
<meta name="twitter:description" content="<?= $metaDesc ?>">
<meta name="twitter:image" content="<?= $ogImage ?>">
<meta name="twitter:site" content="@HqPhyto">

<!-- Schema.org JSON-LD Structured Data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "<?= MAIN_SITE_URL ?>#organization",
      "name": "<?= COMPANY_LEGAL_NAME ?>",
      "alternateName": "Phyto Science",
      "url": "<?= MAIN_SITE_URL ?>",
      "logo": "<?= get_business_url('assets/images/logo.png') ?>",
      "description": "<?= APP_MISSION_STATEMENT ?>",
      "foundingDate": "<?= COMPANY_FOUNDED_YEAR ?>-09-06",
      "telephone": "<?= CONTACT_PHONE_MY ?>",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "PT 56935, Jalan 9/8, Seksyen 9",
        "addressLocality": "Bandar Baru Bangi",
        "addressRegion": "Selangor Darul Ehsan",
        "postalCode": "43650",
        "addressCountry": "MY"
      },
      "sameAs": [
        "<?= SOCIAL_FACEBOOK ?>",
        "<?= SOCIAL_INSTAGRAM ?>",
        "<?= SOCIAL_TWITTER ?>",
        "<?= OFFICIAL_PORTAL_URL ?>"
      ]
    },
    {
      "@type": "WebSite",
      "@id": "<?= get_business_url() ?>#website",
      "url": "<?= get_business_url() ?>",
      "name": "<?= APP_NAME ?> Business Opportunity",
      "description": "<?= APP_TAGLINE ?>",
      "publisher": {
        "@id": "<?= MAIN_SITE_URL ?>#organization"
      }
    },
    {
      "@type": "<?= $schemaType ?>",
      "@id": "<?= $canonical ?>#webpage",
      "url": "<?= $canonical ?>",
      "name": "<?= $metaTitle ?>",
      "isPartOf": {
        "@id": "<?= get_business_url() ?>#website"
      },
      "description": "<?= $metaDesc ?>"
    }
  ]
}
</script>

