<?php
/**
 * PhytoScience Wellness - High-Converting Product Lead & Order Form
 * Integrates First Name, Last Name, Phone, Email, Country, State, Preferred Contact Method,
 * Interested Product, Comments, CSRF, Anti-spam honeypot, email notification to Phytosciencewellness7@gmail.com,
 * orders.json persistence, and 1-click WhatsApp fulfillment.
 */

declare(strict_types=1);

// Process order submission if posted
$orderResult = handle_product_order_submission();
?>

<section class="py-5 position-relative" id="order-form" style="background: radial-gradient(circle at 50% 30%, rgba(216, 0, 29, 0.1) 0%, rgba(10, 11, 14, 0.95) 100%);">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-9">
        
        <?php if ($orderResult && $orderResult['status'] === 'success'): ?>
          <!-- SUCCESS CONFIRMATION DISPLAY -->
          <div class="ps-order-box text-center p-5 mb-4">
            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 70px; height: 70px; background: rgba(46, 204, 113, 0.15); color: #2ECC71; border: 2px solid #2ECC71;">
              <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </div>
            <span class="badge px-3 py-1 rounded-pill bg-success text-white mb-2 fw-bold">ORDER RECEIVED</span>
            <h2 class="text-white fw-bold display-6 mb-2">Thank You, <?= htmlspecialchars($orderResult['full_name']) ?>!</h2>
            <p class="text-secondary lead fs-6 mb-4">
              Your order for <strong class="text-white"><?= htmlspecialchars($orderResult['product_name']) ?> (<?= htmlspecialchars($orderResult['package']) ?>)</strong> has been successfully registered under Order Reference: <span class="text-gold fw-bold"><?= htmlspecialchars($orderResult['order_id']) ?></span>.
            </p>

            <div class="p-3 rounded-3 mb-4 mx-auto max-w-600 text-start" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">
              <div class="small text-secondary mb-1">What happens next?</div>
              <ul class="small text-light mb-0 ps-3">
                <li>Our dispatch officer will contact you on <strong class="text-white"><?= htmlspecialchars($orderResult['phone']) ?></strong> shortly to verify your order and delivery address.</li>
                <li>You can inspect the product seal upon arrival before payment.</li>
              </ul>
            </div>

            <!-- 1-Click WhatsApp Button -->
            <a href="<?= $orderResult['whatsapp_url'] ?>" target="_blank" rel="noopener" class="ps-btn-whatsapp-order py-3 fs-5 mx-auto max-w-500 mb-3">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.043s.433-.506.549-.68c.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.099.824zm-3.423-14.416c-6.627 0-12 5.373-12 12 0 2.112.551 4.095 1.517 5.82l-1.617 5.912 6.074-1.593c1.66.908 3.565 1.427 5.59 1.427 6.627 0 12-5.373 12-12 0-6.627-5.373-12-12-12z"/></svg>
              <span>Instant Confirmation on WhatsApp</span>
            </a>
            <div class="text-white-50 small">Click above to send your order reference straight to our dispatch desk.</div>
          </div>
        <?php else: ?>

          <!-- ORDER FORM WRAPPER -->
          <div class="ps-order-box">
            
            <?php if ($orderResult && $orderResult['status'] === 'error'): ?>
              <div class="alert alert-danger d-flex align-items-center gap-2 mb-4" role="alert">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                <div><?= htmlspecialchars($orderResult['message']) ?></div>
              </div>
            <?php endif; ?>

            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 pb-3 mb-4 border-bottom border-secondary border-opacity-25">
              <div>
                <span class="badge px-3 py-1 rounded-pill mb-1" style="background: #D8001D; color: #FFFFFF; font-size: 0.75rem; font-weight: 700;">
                  SECURE DIRECT ORDER FORM
                </span>
                <h3 class="text-white fw-bold m-0 fs-4">Order Original <?= htmlspecialchars($product['name']) ?></h3>
                <p class="text-secondary small m-0">Payment on Delivery available in Lagos & Abuja. Fast nationwide and international tracked delivery.</p>
              </div>

              <!-- Live Urgency Countdown Timer -->
              <div class="d-flex flex-column align-items-end gap-1">
                <span class="text-white-50 text-uppercase fw-bold" style="font-size: 0.68rem; letter-spacing: 0.05em;">
                  ⚡ PROMO OFFER ENDS IN:
                </span>
                <div class="ps-countdown-box" id="psLiveCountdown">
                  <div class="ps-countdown-unit"><span id="cd-hours">05</span><small>Hours</small></div>
                  <span class="ps-countdown-colon">:</span>
                  <div class="ps-countdown-unit"><span id="cd-minutes">42</span><small>Mins</small></div>
                  <span class="ps-countdown-colon">:</span>
                  <div class="ps-countdown-unit"><span id="cd-seconds">19</span><small>Secs</small></div>
                </div>
              </div>
            </div>

            <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>#order-form" method="POST" id="psOrderForm" novalidate>
              <?= csrf_field() ?>
              <input type="hidden" name="action" value="place_order">
              <input type="hidden" name="product_slug" value="<?= htmlspecialchars($product['slug']) ?>">

              <!-- Anti-bot Honeypot Field -->
              <div style="position: absolute; left: -5000px;" aria-hidden="true">
                <input type="text" name="website_hp" tabindex="-1" autocomplete="off">
              </div>

              <!-- STEP 1: PRODUCT & PACKAGE SELECTION -->
              <div class="row g-3 mb-4">
                <div class="col-12">
                  <span class="text-gold text-uppercase fw-bold small d-flex align-items-center gap-2">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    1. Product & Promotional Package Selection
                  </span>
                </div>

                <div class="col-md-6">
                  <label for="interested_product" class="ps-form-label">Interested Product</label>
                  <input type="text" name="interested_product" id="interested_product" class="form-control ps-form-control" value="<?= htmlspecialchars($product['name']) ?>" readonly style="background: rgba(216,0,29,0.1) !important; color: #FFFFFF; font-weight: 700; border-color: rgba(216,0,29,0.3) !important;">
                </div>

                <div class="col-md-6">
                  <label for="package-select" class="ps-form-label text-gold">Select Package <span class="text-danger">*</span></label>
                  <select name="package" id="package-select" class="form-select ps-form-control" required>
                    <?php foreach ($product['pricing'] as $idx => $tier): ?>
                      <option value="<?= htmlspecialchars($tier['name'] . ' - ' . $tier['price_ngn'] . ' (' . $tier['price_usd'] . ')') ?>" <?= !empty($tier['popular']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($tier['name']) ?> — <?= htmlspecialchars($tier['price_ngn']) ?> (<?= htmlspecialchars($tier['badge']) ?>)
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <!-- STEP 2: CUSTOMER CONTACT & RECIPIENT INFORMATION -->
              <div class="row g-3 mb-4">
                <div class="col-12">
                  <span class="text-white-50 text-uppercase fw-bold" style="font-size: 0.72rem; letter-spacing: 0.05em;">2. Customer & Delivery Information</span>
                </div>

                <div class="col-md-6">
                  <label for="first_name" class="ps-form-label">First Name <span class="text-danger">*</span></label>
                  <input type="text" name="first_name" id="first_name" class="form-control ps-form-control" placeholder="e.g. Samuel" required>
                </div>

                <div class="col-md-6">
                  <label for="last_name" class="ps-form-label">Last Name <span class="text-danger">*</span></label>
                  <input type="text" name="last_name" id="last_name" class="form-control ps-form-control" placeholder="e.g. Adebayo" required>
                </div>

                <div class="col-md-6">
                  <label for="phone" class="ps-form-label">Phone Number (Call & WhatsApp) <span class="text-danger">*</span></label>
                  <input type="tel" name="phone" id="phone" class="form-control ps-form-control" placeholder="e.g. 0802 317 3303" required>
                </div>

                <div class="col-md-6">
                  <label for="alt_phone" class="ps-form-label">Alternative Phone Number <span class="text-secondary small">(Optional)</span></label>
                  <input type="tel" name="alt_phone" id="alt_phone" class="form-control ps-form-control" placeholder="e.g. 0806 864 9995">
                </div>

                <div class="col-md-6">
                  <label for="email" class="ps-form-label">Email Address <span class="text-secondary small">(For Receipt & Tracking)</span></label>
                  <input type="email" name="email" id="email" class="form-control ps-form-control" placeholder="e.g. yourname@gmail.com">
                </div>

                <div class="col-md-6">
                  <label for="country" class="ps-form-label">Delivery Country <span class="text-danger">*</span></label>
                  <select name="country" id="country" class="form-select ps-form-control" required>
                    <option value="Nigeria" selected>Nigeria (Pay on Delivery in Lagos/Abuja)</option>
                    <option value="United Kingdom">United Kingdom (DHL / Royal Mail)</option>
                    <option value="United States">United States (FedEx / USPS)</option>
                    <option value="Ghana">Ghana (Accra Hub)</option>
                    <option value="Cameroon">Cameroon (Douala / Yaoundé)</option>
                    <option value="Cote d'Ivoire">Côte d'Ivoire (Abidjan Hub)</option>
                    <option value="South Africa">South Africa</option>
                    <option value="Canada">Canada</option>
                    <option value="Other">Other International Destination</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="state" class="ps-form-label">State / Region <span class="text-danger">*</span></label>
                  <input type="text" name="state" id="state" class="form-control ps-form-control" placeholder="e.g. Lagos State, FCT Abuja, Rivers" required>
                </div>

                <div class="col-md-6">
                  <label class="ps-form-label d-block">Preferred Contact Method</label>
                  <div class="d-flex align-items-center gap-3 mt-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="contact_method" id="cm-wa" value="WhatsApp" checked>
                      <label class="form-check-label text-white small" for="cm-wa">WhatsApp</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="contact_method" id="cm-call" value="Phone Call">
                      <label class="form-check-label text-white small" for="cm-call">Phone Call</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="contact_method" id="cm-sms" value="SMS">
                      <label class="form-check-label text-white small" for="cm-sms">SMS</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="contact_method" id="cm-email" value="Email">
                      <label class="form-check-label text-white small" for="cm-email">Email</label>
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <label for="address" class="ps-form-label">Full Delivery Street Address <span class="text-danger">*</span></label>
                  <textarea name="address" id="address" rows="2" class="form-control ps-form-control" placeholder="e.g. House 14, Opebi Road, Beside GTBank, Ikeja, Lagos" required></textarea>
                </div>
              </div>

              <!-- STEP 3: PAYMENT METHOD -->
              <div class="mb-4">
                <span class="text-white-50 text-uppercase fw-bold d-block mb-2" style="font-size: 0.72rem; letter-spacing: 0.05em;">3. Preferred Payment Method</span>
                <div class="row g-2">
                  <div class="col-md-6">
                    <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1);">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="pay-pod" value="Pay on Delivery (Lagos & Abuja)" checked>
                        <label class="form-check-label text-white small fw-bold" for="pay-pod">
                          💵 Pay on Delivery
                          <span class="d-block text-secondary fw-normal" style="font-size: 0.78rem;">Available in Lagos, Abuja & select hub locations. Pay cash or bank transfer to rider.</span>
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1);">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="pay-transfer" value="Direct Bank Transfer Before Dispatch">
                        <label class="form-check-label text-white small fw-bold" for="pay-transfer">
                          🏦 Direct Bank Transfer
                          <span class="d-block text-secondary fw-normal" style="font-size: 0.78rem;">Instant dispatch prioritization for all 36 Nigerian states & international orders.</span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- STEP 4: COMMENTS / SPECIAL INSTRUCTIONS -->
              <div class="mb-4">
                <label for="comments" class="ps-form-label">Comments / Delivery Notes <span class="text-secondary small">(Optional)</span></label>
                <textarea name="comments" id="comments" rows="2" class="form-control ps-form-control" placeholder="e.g. Please deliver before 3pm; call alternative number if unreachable."></textarea>
              </div>

              <!-- SUBMIT BUTTON -->
              <button type="submit" class="ps-btn-order-submit mb-3" id="orderSubmitBtn">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4H6zM3 6h18M16 10a4 4 0 01-8 0"/></svg>
                <span>CONFIRM ORDER NOW — PAY ON DELIVERY</span>
              </button>

              <!-- ALTERNATIVE: DIRECT WHATSAPP INSTANT CHECKOUT -->
              <div class="text-center my-3">
                <span class="text-secondary small">── OR ORDER DIRECTLY VIA WHATSAPP ──</span>
              </div>
              <a href="https://wa.me/2348023173303?text=<?= urlencode('Hello PhytoScience Team, I would like to order ' . $product['name'] . '. Please assist me with pricing and delivery.') ?>" target="_blank" rel="noopener" class="ps-btn-whatsapp-order">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.043s.433-.506.549-.68c.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.099.824zm-3.423-14.416c-6.627 0-12 5.373-12 12 0 2.112.551 4.095 1.517 5.82l-1.617 5.912 6.074-1.593c1.66.908 3.565 1.427 5.59 1.427 6.627 0 12-5.373 12-12 0-6.627-5.373-12-12-12z"/></svg>
                <span>Click Here to Chat & Order on WhatsApp (+234 802 317 3303)</span>
              </a>

              <!-- SECURITY & GUARANTEE FOOTNOTES -->
              <div class="row g-2 mt-4 pt-3 border-top border-secondary border-opacity-25 text-center text-md-start">
                <div class="col-md-4">
                  <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2 text-secondary small">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2ECC71" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    <span>100% Genuine Swiss Mibelle Formula</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2 text-secondary small">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2ECC71" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    <span>Express Tracked Delivery</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2 text-secondary small">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2ECC71" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    <span>Strict Privacy Protection</span>
                  </div>
                </div>
              </div>

            </form>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>
</section>
