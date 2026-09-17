<?php
/**
 * PhytoScience Wellness - 5-Step Order & Delivery Process Component
 * Matches the official 5-step ordering flow:
 * Step 1: Submit order -> Step 2: Contact confirmation -> Step 3: Payment -> Step 4: Order processing -> Step 5: Delivery
 */

declare(strict_types=1);
?>
<section class="py-5 position-relative" style="background: #0E0F14;" id="how-to-order">
  <div class="container">
    <div class="text-center max-w-700 mx-auto mb-5">
      <span class="badge px-3 py-2 rounded-pill mb-2" style="background: rgba(216, 0, 29, 0.12); color: #FF4D5E; border: 1px solid rgba(216, 0, 29, 0.3); font-size: 0.8rem; font-weight: 700; letter-spacing: 0.05em;">
        SEAMLESS 5-STEP ORDERING PROCESS
      </span>
      <h2 class="display-6 fw-bold text-white mb-3">Simple Steps to <span class="text-gold">Your Doorstep Delivery</span></h2>
      <p class="text-secondary">Ordering your genuine PhytoScience wellness products is fast, secure, and hassle-free. Pay on delivery available in major Nigerian and regional cities.</p>
    </div>

    <div class="row g-4 justify-content-center">
      <!-- Step 1: Submit Order -->
      <div class="col-lg col-md-6">
        <div class="ps-order-step-card">
          <div class="ps-order-step-number">1</div>
          <h5 class="text-white fw-bold fs-6 mb-2">Submit Order</h5>
          <p class="text-secondary small mb-0">Select your package and submit your delivery address and contact details using our secure order form below.</p>
        </div>
      </div>

      <!-- Step 2: Contact Confirmation -->
      <div class="col-lg col-md-6">
        <div class="ps-order-step-card">
          <div class="ps-order-step-number">2</div>
          <h5 class="text-white fw-bold fs-6 mb-2">Contact Confirmation</h5>
          <p class="text-secondary small mb-0">Our dedicated customer care officer contacts you via phone or WhatsApp to verify your order and delivery details.</p>
        </div>
      </div>

      <!-- Step 3: Payment -->
      <div class="col-lg col-md-6">
        <div class="ps-order-step-card">
          <div class="ps-order-step-number">3</div>
          <h5 class="text-white fw-bold fs-6 mb-2">Payment Option</h5>
          <p class="text-secondary small mb-0">Choose Pay on Delivery (Cash/Transfer to courier in Lagos & Abuja) or direct bank transfer for express dispatch.</p>
        </div>
      </div>

      <!-- Step 4: Order Processing -->
      <div class="col-lg col-md-6">
        <div class="ps-order-step-card">
          <div class="ps-order-step-number">4</div>
          <h5 class="text-white fw-bold fs-6 mb-2">Order Processing</h5>
          <p class="text-secondary small mb-0">Your parcel is securely packed in temperature-controlled protective packaging and assigned a dispatch tracking code.</p>
        </div>
      </div>

      <!-- Step 5: Delivery -->
      <div class="col-lg col-md-6">
        <div class="ps-order-step-card">
          <div class="ps-order-step-number">5</div>
          <h5 class="text-white fw-bold fs-6 mb-2">Doorstep Delivery</h5>
          <p class="text-secondary small mb-0">Receive your original, factory-sealed PhytoScience package within 24–48 hours and begin your wellness journey.</p>
        </div>
      </div>
    </div>

    <!-- Express Delivery Reassurance Banner -->
    <div class="mt-4 p-3 rounded-4 d-flex flex-column flex-md-row align-items-center justify-content-between gap-3" style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08);">
      <div class="d-flex align-items-center gap-3">
        <div class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width: 42px; height: 42px; background: rgba(46, 204, 113, 0.15); color: #2ECC71;">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
        </div>
        <div>
          <span class="text-white fw-bold small d-block">Delivery Timelines:</span>
          <span class="text-secondary" style="font-size: 0.84rem;">Lagos & Abuja: 24 to 48 Hours | Other Nigerian States: 2 to 4 Days | UK & International: 3 to 7 Days</span>
        </div>
      </div>
      <a href="#order-form" class="btn btn-sm btn-outline-light rounded-pill px-3 py-1 text-nowrap" style="font-size: 0.82rem; border-color: rgba(255,255,255,0.2);">
        Place Order Now ↓
      </a>
    </div>
  </div>
</section>
