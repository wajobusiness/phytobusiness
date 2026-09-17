<?php
/**
 * PhytoScience Wellness - Standard Footer Include
 */

declare(strict_types=1);

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/functions.php';
?>
</main>

<footer class="ps-footer mt-auto">
  <div class="container">
    <div class="row g-4">
      
      <!-- Brand & Legal Info -->
      <div class="col-lg-3 col-md-6">
        <a href="<?= get_business_url('index.php') ?>" class="d-inline-block mb-3" aria-label="PhytoScience Wellness Home">
          <img src="<?= asset('images/logo.png') ?>" alt="PhytoScience Wellness" class="ps-footer-logo" style="max-height: 52px; width: auto;">
        </a>
        <p class="small text-secondary mb-3">
          <?= COMPANY_LEGAL_NAME ?> (<?= COMPANY_REG_NO ?>). Direct Sales License <?= COMPANY_AJL_LICENSE ?>. We are the global pioneer in plant stem cell therapy, cellular rejuvenation, and financial wellness.
        </p>
        <div class="small d-flex flex-column gap-2 mb-3">
          <div>
            <strong class="text-white d-block mb-1">Office Locations:</strong>
            <div class="text-secondary mb-1">
              <span class="text-gold fw-semibold">Lagos (Opebi):</span> <?= OFFICE_LAGOS_1_ADDRESS ?>
            </div>
            <div class="text-secondary mb-1">
              <span class="text-gold fw-semibold">Lagos (Ikeja):</span> <?= OFFICE_LAGOS_2_ADDRESS ?>
            </div>
            <div class="text-secondary mb-1">
              <span class="text-gold fw-semibold">Abuja:</span> <?= OFFICE_ABUJA_ADDRESS ?>
            </div>
            <div class="text-secondary">
              <span class="text-gold fw-semibold">United Kingdom:</span> <?= OFFICE_UK_ADDRESS ?>
            </div>
          </div>

          <div class="pt-2 border-top border-secondary border-opacity-25">
            <div class="mb-1">
              <strong class="text-white">Phone / WhatsApp:</strong>
              <a href="tel:+2348023173303" class="text-secondary text-decoration-none hover-gold"><?= CONTACT_PHONE_NG_1 ?></a> / 
              <a href="tel:+2348068649995" class="text-secondary text-decoration-none hover-gold"><?= CONTACT_PHONE_NG_2 ?></a>
            </div>
            <div class="mb-1">
              <strong class="text-white">UK Office:</strong>
              <a href="tel:+447474439825" class="text-secondary text-decoration-none hover-gold"><?= CONTACT_PHONE_UK ?></a>
            </div>
            <div>
              <strong class="text-white">Email:</strong>
              <a href="mailto:<?= CONTACT_EMAIL ?>" class="text-gold text-decoration-none"><?= CONTACT_EMAIL ?></a>
            </div>
          </div>
        </div>

        <!-- Social Media Badges -->
        <div class="d-flex align-items-center gap-2 mt-3">
          <a href="<?= SOCIAL_FACEBOOK ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-sm btn-ps-glass p-2" aria-label="PhytoScience Facebook">
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>
          </a>
          <a href="<?= SOCIAL_INSTAGRAM ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-sm btn-ps-glass p-2" aria-label="PhytoScience Instagram">
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
          </a>
          <a href="<?= SOCIAL_TWITTER ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-sm btn-ps-glass p-2" aria-label="PhytoScience X Twitter">
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
          </a>
        </div>
      </div>

      <!-- Quick Navigation -->
      <div class="col-lg-2 col-md-6 col-6">
        <h5>Opportunity</h5>
        <ul class="list-unstyled">
          <li><a href="<?= get_business_url('business-opportunity.php') ?>" class="ps-footer-link">Why Join Us</a></li>
          <li><a href="<?= get_business_url('how-it-works.php') ?>" class="ps-footer-link">How It Works</a></li>
          <li><a href="<?= get_business_url('compensation-plan.php') ?>" class="ps-footer-link">Compensation Plan</a></li>
          <li><a href="<?= get_business_url('membership.php') ?>" class="ps-footer-link">Business Packages</a></li>
          <li><a href="<?= get_business_url('join.php') ?>" class="ps-footer-link text-gold">Start Now</a></li>
        </ul>
      </div>

      <!-- Flagship Products -->
      <div class="col-lg-2 col-md-6 col-6">
        <h5>Products</h5>
        <ul class="list-unstyled">
          <li><a href="<?= get_product_url('double-stem-cell') ?>" class="ps-footer-link text-gold">Double Stemcell™</a></li>
          <li><a href="<?= get_product_url('crystal-cell') ?>" class="ps-footer-link">Crystal Cell™</a></li>
          <li><a href="<?= get_product_url('snowphyll-forte') ?>" class="ps-footer-link">Snowphyll Forte™</a></li>
          <li><a href="<?= get_product_url('irq-cell') ?>" class="ps-footer-link">iiQ Plus / IRQ Cell</a></li>
          <li><a href="<?= get_product_url('actual-plus') ?>" class="ps-footer-link">Actual Plus™</a></li>
        </ul>
      </div>

      <!-- Company & Proof -->
      <div class="col-lg-2 col-md-6 col-6">
        <h5>Company & Proof</h5>
        <ul class="list-unstyled">
          <li><a href="<?= get_business_url('about.php') ?>" class="ps-footer-link">About PhytoScience</a></li>
          <li><a href="<?= get_business_url('about.php#leadership') ?>" class="ps-footer-link">Founders & Team</a></li>
          <li><a href="<?= get_business_url('about.php#science') ?>" class="ps-footer-link">Science Board</a></li>
          <li><a href="<?= get_business_url('success-stories.php') ?>" class="ps-footer-link">Distributor Stories</a></li>
          <li><a href="<?= get_business_url('gallery.php') ?>" class="ps-footer-link">Media Gallery</a></li>
          <li><a href="<?= get_business_url('events.php') ?>" class="ps-footer-link">News & Events</a></li>
          <li><a href="<?= get_business_url('faq.php') ?>" class="ps-footer-link">FAQs</a></li>
        </ul>
      </div>

      <!-- Official Backoffice & Portals -->
      <div class="col-lg-3 col-md-6">
        <h5>Member Resources</h5>
        <p class="small text-secondary mb-3">
          Existing members can manage e-wallets, review binary genealogy, and activate reorders via the official member terminal.
        </p>
        <div class="d-flex flex-column gap-2">
          <a href="<?= MEMBER_LOGIN_URL ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-sm btn-ps-outline-gold w-100 text-center">
            Member Terminal Login
          </a>
          <a href="<?= MAIN_SHOP_URL ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-sm btn-ps-glass w-100 text-center">
            Retail E-Commerce Shop
          </a>
          <a href="<?= get_business_url('contact.php') ?>" class="btn-ps btn-ps-sm btn-ps-emerald w-100 text-center">
            Contact Regional Office
          </a>
        </div>
      </div>

    </div>

    <!-- Legal Copyright Bar -->
    <div class="ps-footer-bottom d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 text-secondary">
      <div>
        © <?= date('Y') ?> <?= COMPANY_LEGAL_NAME ?>. All Rights Reserved. Trend Maker International.
      </div>
      <div class="d-flex align-items-center gap-3">
        <a href="<?= get_business_url('about.php#licensing') ?>" class="text-secondary text-decoration-none hover-gold">Direct Selling License AJL932039</a>
        <span>•</span>
        <a href="<?= get_business_url('faq.php') ?>" class="text-secondary text-decoration-none hover-gold">Help & Policy</a>
        <span>•</span>
        <a href="<?= MAIN_SITE_URL ?>" class="text-secondary text-decoration-none hover-gold">PhytoScience Main</a>
      </div>
    </div>
  </div>
</footer>

<!-- Floating WhatsApp Action -->
<a href="<?= CONTACT_WHATSAPP_LINK ?>" class="floating-whatsapp" target="_blank" rel="noopener" aria-label="Chat with a PhytoScience Consultant on WhatsApp">
  <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.043s.433-.506.549-.68c.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.099.824zm-3.423-14.416c-6.627 0-12 5.373-12 12 0 2.112.551 4.095 1.517 5.82l-1.617 5.912 6.074-1.593c1.66.908 3.565 1.427 5.59 1.427 6.627 0 12-5.373 12-12 0-6.627-5.373-12-12-12z"/></svg>
</a>

<!-- Floating Back-to-Top Button -->
<a href="#" class="back-to-top" aria-label="Back to top of page">
  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 15l-6-6-6 6"/></svg>
</a>

<!-- Video Lightbox Modal -->
<div id="psVideoModal" class="ps-video-modal" role="dialog" aria-modal="true" aria-labelledby="psVideoModalTitle">
  <div class="ps-video-modal-dialog">
    <div class="d-flex align-items-center justify-content-between p-3 border-bottom border-dark" style="background: rgba(24, 25, 32, 0.98);">
      <div class="d-flex align-items-center gap-2">
        <span class="badge bg-crimson fw-bold">OFFICIAL VIDEO</span>
        <h5 id="psVideoModalTitle" class="m-0 text-white font-heading fs-6">PhytoScience Presentation</h5>
      </div>
      <div class="d-flex align-items-center gap-2">
        <a id="psVideoDirectLink" href="#" target="_blank" rel="noopener" class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1" style="font-size: 0.78rem; border-color: #D8001D; color: #FF4D5E;">
          <span>Watch on YouTube</span>
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14L21 3"/></svg>
        </a>
        <button type="button" class="btn-close btn-close-white" data-close-video aria-label="Close video player"></button>
      </div>
    </div>
    <div id="psVideoContainer" class="ratio ratio-16x9 bg-black"></div>
    <div class="p-2 px-3 small d-flex align-items-center justify-content-between flex-wrap gap-2" style="background: rgba(18, 19, 24, 0.98); border-top: 1px solid rgba(216, 0, 29, 0.25);">
      <span class="text-secondary" style="font-size: 0.8rem;">If playback is restricted by your browser or network:</span>
      <a id="psVideoFallbackBtn" href="#" target="_blank" rel="noopener" class="text-danger fw-bold text-decoration-none d-inline-flex align-items-center gap-1" style="font-size: 0.82rem; color: #FF4D5E !important;">
        <span>Watch on YouTube ↗</span>
      </a>
    </div>
  </div>
</div>

<!-- Image Lightbox Modal -->
<div id="psImageModal" class="ps-image-modal" role="dialog" aria-modal="true" aria-labelledby="psImageModalTitle">
  <div class="ps-image-modal-dialog">
    <div class="d-flex align-items-center justify-content-between p-3 border-bottom border-dark" style="background: rgba(24, 25, 32, 0.98);">
      <div class="d-flex align-items-center gap-2">
        <span class="badge bg-crimson fw-bold">DOCUMENTED PROOF</span>
        <h5 id="psImageModalTitle" class="m-0 text-white font-heading fs-6">PhytoScience Achiever Showcase</h5>
      </div>
      <button type="button" class="btn-close btn-close-white" data-close-image aria-label="Close image viewer"></button>
    </div>
    <div class="ps-image-modal-body">
      <img id="psImageModalImg" src="" alt="PhytoScience Car Achiever" class="img-fluid">
    </div>
    <div class="p-3 d-flex align-items-center justify-content-between flex-wrap gap-2" style="background: rgba(18, 19, 24, 0.98); border-top: 1px solid rgba(216, 0, 29, 0.25);">
      <span id="psImageModalCaption" class="text-white small fw-semibold"></span>
      <a href="<?= get_business_url('join.php') ?>" class="btn btn-sm btn-danger px-3 fw-bold" style="background: #D8001D; border: none;">
        <span>Join This Winning Team ↗</span>
      </a>
    </div>
  </div>
</div>

<!-- Vendor & Custom JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
<script src="<?= asset('js/main.js') ?>" defer></script>
<script src="<?= asset('js/form-validation.js') ?>" defer></script>

</body>
</html>

