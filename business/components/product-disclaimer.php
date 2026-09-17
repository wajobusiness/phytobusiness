<?php
/**
 * PhytoScience Wellness - Compliance Disclaimer & Cross-Sell Component
 * Strictly adheres to Meta Ads, Google Ads, TikTok Ads, YouTube Ads & Health Advertising Regulations.
 */

declare(strict_types=1);

$allProducts = get_products_data();
$otherProducts = array_filter($allProducts, function($p) use ($product) {
    return $p['slug'] !== $product['slug'];
});
?>

<!-- RELATED CELLULAR NUTRITION CROSS-SELL -->
<section class="py-5 border-top border-secondary border-opacity-25" style="background: #0B0C10;">
  <div class="container">
    <div class="text-center max-w-700 mx-auto mb-4">
      <span class="badge px-3 py-1 rounded-pill mb-2" style="background: rgba(198, 164, 92, 0.15); color: #C6A45C; border: 1px solid rgba(198, 164, 92, 0.3); font-size: 0.75rem; font-weight: 700;">
        COMPLETE CELLULAR SYNERGY
      </span>
      <h3 class="text-white fw-bold fs-4">Explore More PhytoScience Formulas</h3>
      <p class="text-secondary small">Each PhytoScience formulation addresses distinct biological pathways for comprehensive whole-body restoration.</p>
    </div>

    <div class="row g-3 justify-content-center">
      <?php foreach (array_slice($otherProducts, 0, 4) as $other): ?>
        <div class="col-lg-3 col-6">
          <div class="ps-cross-sell-card">
            <div>
              <img src="<?= asset(ltrim($other['image'], '/')) ?>" alt="<?= htmlspecialchars($other['name']) ?>" class="ps-cross-sell-thumb">
              <h5 class="text-white fw-bold fs-6 mb-1"><?= htmlspecialchars($other['name']) ?></h5>
              <div class="text-gold fw-bold small mb-2"><?= htmlspecialchars($other['pricing'][0]['price_ngn']) ?></div>
              <p class="text-secondary small mb-3 d-none d-md-block" style="font-size: 0.78rem;">
                <?= htmlspecialchars(substr($other['short_desc'], 0, 85)) ?>...
              </p>
            </div>
            <a href="<?= get_product_url($other['slug']) ?>" class="btn-ps btn-ps-sm btn-ps-glass w-100 text-center py-2" style="font-size: 0.8rem;">
              View Details →
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- REGULATORY & ADVERTISING COMPLIANCE DISCLAIMER -->
    <div class="ps-compliance-box">
      <div class="d-flex align-items-center gap-2 mb-3">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#C6A45C" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
        <strong class="text-white fs-6">Advertising Disclosure & Health Regulatory Compliance Disclaimer</strong>
      </div>
      
      <ul class="list-unstyled d-flex flex-column gap-2 mb-3" style="font-size: 0.84rem; color: #A4A7B5;">
        <li class="d-flex align-items-start gap-2">
          <span class="text-gold fw-bold">•</span>
          <span><strong>Independent Ownership:</strong> This website is operated by an Independent PhytoScience Business Owner / Certified Distributor.</span>
        </li>
        <li class="d-flex align-items-start gap-2">
          <span class="text-gold fw-bold">•</span>
          <span><strong>Official Sourced Materials:</strong> Product information, nutritional values, and technical specifications are based on official materials provided by Phyto Science Sdn Bhd and Mibelle Biochemistry Switzerland.</span>
        </li>
        <li class="d-flex align-items-start gap-2">
          <span class="text-gold fw-bold">•</span>
          <span><strong>Individual Experiences Vary:</strong> Individual experiences, recovery timelines, and testimonials presented on this website may vary based on physiological factors, age, metabolism, and lifestyle. No specific results are guaranteed.</span>
        </li>
        <li class="d-flex align-items-start gap-2">
          <span class="text-gold fw-bold">•</span>
          <span><strong>Healthcare Guidance:</strong> Customers should follow official product instructions and consult an appropriate healthcare professional or licensed physician if they have questions about using any wellness product or pre-existing medical condition.</span>
        </li>
        <li class="d-flex align-items-start gap-2">
          <span class="text-gold fw-bold">•</span>
          <span><strong>Advertising Platform Non-Endorsement:</strong> This website is not affiliated with or endorsed by Facebook, Instagram, YouTube, Google, TikTok, or any other digital advertising platform.</span>
        </li>
        <li class="d-flex align-items-start gap-2">
          <span class="text-gold fw-bold">•</span>
          <span><strong>Trademark Notice:</strong> Facebook, Instagram, Google, YouTube, TikTok, and their respective trademarks belong to their respective corporate owners.</span>
        </li>
      </ul>

      <p class="small text-secondary mb-0 border-top border-secondary border-opacity-25 pt-2" style="font-size: 0.78rem;">
        *Disclaimer: Statements regarding dietary supplements have not been evaluated by NAFDAC, EMA, or the US FDA and are not intended to diagnose, treat, cure, or prevent any disease or health condition.
      </p>
    </div>

  </div>
</section>
