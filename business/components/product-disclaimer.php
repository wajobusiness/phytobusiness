<?php
/**
 * PhytoScience Wellness - Compliance Disclaimer & Cross-Sell Component
 * Ensures adherence to Meta Ads, Google Ads, TikTok Ads, YouTube Ads & Health Advertising Regulations.
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
      <div class="d-flex align-items-center gap-2 mb-2">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#C6A45C" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
        <strong class="text-white">Advertising Compliance, Regulatory Disclosure & Medical Disclaimer</strong>
      </div>
      <p class="mb-2">
        <strong>Not Intended to Replace Medical Advice:</strong> The statements, claims, and product information provided on this landing page have not been evaluated by the National Agency for Food and Drug Administration and Control (NAFDAC), the European Medicines Agency (EMA), or the United States Food and Drug Administration (FDA). PhytoScience products are premium dietary supplements and functional nutrition formulas designed to nourish normal cellular health, support cellular longevity, and promote general physiological vitality. They are not manufactured, formulated, or marketed to diagnose, cure, mitigate, treat, or prevent any chronic disease, pathological condition, or illness.
      </p>
      <p class="mb-2">
        <strong>Individual Results Disclosure:</strong> Testimonials and customer experiences shared on this website reflect authentic, individual feedback from verified users and distributors. Results are subjective and may vary significantly from individual to individual depending on body chemistry, age, medical history, diet, lifestyle, and adherence to recommended usage guidelines. No guarantees of specific physical transformation, healing, or income are expressed or implied.
      </p>
      <p class="mb-0">
        <strong>Physician Consultation Recommended:</strong> Before introducing any new nutritional supplement to your routine, consult a licensed healthcare practitioner, particularly if you are pregnant, lactating, nursing, taking prescription pharmaceutical medication, scheduled for surgery, or under therapeutic medical care. Keep all dietary supplements out of the reach of children. Store in a cool, dry place away from direct sunlight.
      </p>
    </div>

  </div>
</section>
