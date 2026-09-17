<?php
/**
 * PhytoScience Wellness - Sticky Mobile Conversion Bar
 * Displays fixed at viewport bottom on mobile devices for instant order accessibility.
 */

declare(strict_types=1);

$starterPrice = $product['pricing'][0]['price_ngn'] ?? '';
$starterUsd = (float)preg_replace('/[^0-9.]/', '', $product['pricing'][0]['price_usd'] ?? '45');
$productImgUrl = asset(ltrim($product['image'], '/'));
?>
<div class="ps-sticky-mobile-bar d-lg-none" id="psStickyMobileBar">
  <img src="<?= $productImgUrl ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="ps-sticky-thumb">
  
  <div class="ps-sticky-info">
    <h4 class="ps-sticky-title"><?= htmlspecialchars($product['name']) ?></h4>
    <p class="ps-sticky-price">From <span data-price-usd="<?= $starterUsd ?>"><?= htmlspecialchars($starterPrice) ?></span></p>
  </div>

  <div class="ps-sticky-actions">
    <a href="#order-form" class="ps-sticky-order-btn">
      Order Now
    </a>
    <a href="https://wa.me/2348023173303?text=<?= urlencode('Hello PhytoScience Team, I am interested in ordering ' . $product['name'] . '. Please assist me.') ?>" target="_blank" rel="noopener" class="ps-sticky-wa-btn" aria-label="Chat on WhatsApp">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.043s.433-.506.549-.68c.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.099.824zm-3.423-14.416c-6.627 0-12 5.373-12 12 0 2.112.551 4.095 1.517 5.82l-1.617 5.912 6.074-1.593c1.66.908 3.565 1.427 5.59 1.427 6.627 0 12-5.373 12-12 0-6.627-5.373-12-12-12z"/></svg>
    </a>
  </div>
</div>

