<?php
/**
 * PhytoScience Wellness - Luxury Responsive Navigation Bar
 * Streamlined executive dropdown layout with official logo.
 */

declare(strict_types=1);

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/functions.php';

$currentPage = basename($_SERVER['PHP_SELF'] ?? 'index.php');
?>
<header>
  <nav class="ps-navbar" aria-label="Main Navigation">
    <div class="container d-flex align-items-center justify-content-between">
      
      <!-- Official Brand Logo -->
      <a href="<?= get_business_url('index.php') ?>" class="ps-brand-logo d-flex align-items-center" aria-label="PhytoScience Wellness Home">
        <img src="<?= asset('images/logo.png') ?>" alt="PhytoScience Wellness" class="ps-navbar-logo" style="max-height: 44px; width: auto;">
      </a>

      <!-- Streamlined Desktop Navigation Links -->
      <div class="d-none d-xl-flex align-items-center gap-2">
        <a href="<?= get_business_url('index.php') ?>" class="ps-nav-link <?= is_active_page('index.php') ?>">Home</a>
        
        <!-- About Us Dropdown -->
        <div class="dropdown">
          <a class="ps-nav-link dropdown-toggle <?= in_array($currentPage, ['about.php', 'faq.php']) ? 'active' : '' ?>" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            About Us
          </a>
          <ul class="dropdown-menu dropdown-menu-ps dropdown-menu-dark">
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_business_url('about.php') ?>">Company Profile & 4P System</a></li>
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_business_url('about.php#leadership') ?>">Founder & Executive Leadership</a></li>
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_business_url('about.php#science') ?>">Science Board & Mibelle R&D</a></li>
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_business_url('about.php#milestones') ?>">Corporate Milestones</a></li>
            <li><hr class="dropdown-divider border-secondary border-opacity-25 my-1"></li>
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_business_url('faq.php') ?>">Frequently Asked Questions</a></li>
          </ul>
        </div>

        <!-- Opportunity Dropdown (Consolidating Why, Roadmap, Plan & Packages) -->
        <div class="dropdown">
          <a class="ps-nav-link dropdown-toggle <?= in_array($currentPage, ['business-opportunity.php', 'how-it-works.php', 'compensation-plan.php', 'membership.php']) ? 'active' : '' ?>" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Opportunity
          </a>
          <ul class="dropdown-menu dropdown-menu-ps dropdown-menu-dark">
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_business_url('business-opportunity.php') ?>">Why PhytoScience? (Overview)</a></li>
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_business_url('how-it-works.php') ?>">How It Works (7-Step Roadmap)</a></li>
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_business_url('compensation-plan.php') ?>">Hybrid Compensation Plan</a></li>
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_business_url('membership.php') ?>">Packages & Investment Tiers</a></li>
          </ul>
        </div>

        <!-- Products Dropdown (Flagship Cellular Formulations) -->
        <div class="dropdown">
          <a class="ps-nav-link dropdown-toggle <?= in_array($currentPage, ['double-stem-cell.php', 'snowphyll-forte.php', 'crystal-cell.php', 'irq-cell.php', 'actual-plus.php']) ? 'active' : '' ?>" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu dropdown-menu-ps dropdown-menu-dark">
            <li><a class="dropdown-item dropdown-item-ps text-gold fw-semibold" href="<?= get_product_url('double-stem-cell') ?>">🌿 Double Stemcell™ (Rejuvenation)</a></li>
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_product_url('crystal-cell') ?>">💎 Crystal Cell™ (DNA & UV Defense)</a></li>
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_product_url('snowphyll-forte') ?>">🍃 Snowphyll Forte™ (Blood Cleanser)</a></li>
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_product_url('irq-cell') ?>">🧠 iiQ Plus™ / IRQ Cell (Brain & Vision)</a></li>
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_product_url('actual-plus') ?>">💧 Actual Plus™ (39-in-1 Immune Drops)</a></li>
          </ul>
        </div>

        <!-- Proof & Media Dropdown (Consolidating Stories, Gallery & Events) -->
        <div class="dropdown">
          <a class="ps-nav-link dropdown-toggle <?= in_array($currentPage, ['success-stories.php', 'gallery.php', 'events.php']) ? 'active' : '' ?>" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Proof & Media
          </a>
          <ul class="dropdown-menu dropdown-menu-ps dropdown-menu-dark">
            <li><a class="dropdown-item dropdown-item-ps text-gold fw-semibold" href="<?= get_business_url('index.php#millionaires-car-achievers') ?>">★ Car Achievers & Millionaires</a></li>
            <li><a class="dropdown-item dropdown-item-ps text-crimson fw-semibold" href="<?= get_business_url('index.php#testimonies') ?>">♥ Health Testimonies & Proof</a></li>
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_business_url('success-stories.php') ?>">Distributor Success Stories</a></li>
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_business_url('gallery.php') ?>">Video & Photo Gallery</a></li>
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_business_url('events.php') ?>">News & Upcoming Events</a></li>
          </ul>
        </div>

        <a href="<?= get_business_url('contact.php') ?>" class="ps-nav-link <?= is_active_page('contact.php') ?>">Contact</a>
      </div>

      <!-- Action CTAs -->
      <div class="d-none d-lg-flex align-items-center gap-2">
        <?= render_currency_selector() ?>
        
        <!-- Theme Toggle Button (Desktop) -->
        <button type="button" class="btn-ps-theme-toggle js-theme-toggle" aria-label="Toggle Dark / Light Mode" title="Toggle Dark / Light Mode">
          <span class="ps-theme-icon-sun">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
          </span>
          <span class="ps-theme-icon-moon d-none">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
          </span>
        </button>

        <a href="<?= MAIN_SHOP_URL ?>" class="btn-ps btn-ps-sm btn-ps-glass" target="_blank" rel="noopener">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4H6zM3 6h18M16 10a4 4 0 01-8 0"/></svg>
          Shop Products
        </a>
        <a href="<?= get_business_url('join.php') ?>" class="btn-ps btn-ps-sm btn-ps-primary">
          Join Now
        </a>
      </div>

      <!-- Mobile Controls (Currency + Theme + Hamburger) -->
      <div class="d-flex d-lg-none align-items-center gap-1">
        <?= render_currency_selector('me-1') ?>

        <!-- Mobile Header Theme Toggle Button -->
        <button type="button" class="btn-ps-theme-toggle js-theme-toggle me-1" aria-label="Toggle Dark / Light Mode" title="Toggle Dark / Light Mode">
          <span class="ps-theme-icon-sun">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
          </span>
          <span class="ps-theme-icon-moon d-none">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
          </span>
        </button>

        <button class="d-xl-none btn btn-link text-white p-2 text-decoration-none js-mobile-hamburger" type="button" data-bs-toggle="collapse" data-bs-target="#psNavMenu" data-ps-toggle="nav" aria-expanded="false" aria-controls="psNavMenu" aria-label="Toggle navigation" style="cursor: pointer;">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" style="pointer-events: none;"><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
        </button>
      </div>

    </div>

    <!-- Mobile Drawer Overlay Menu -->
    <div id="psNavMenu" class="d-xl-none collapse" style="background: rgba(10, 11, 14, 0.98); border-top: 1px solid rgba(216, 0, 29, 0.3); padding: 20px 0; max-height: 80vh; overflow-y: auto;">
      <div class="container d-flex flex-column gap-2">
        
        <!-- Mobile Drawer Currency Selector -->
        <div class="p-3 rounded-3 mb-1" style="background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(198, 164, 92, 0.3);">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <span class="text-white-50 text-uppercase fw-bold" style="font-size: 0.72rem; letter-spacing: 0.05em;">Currency / Country:</span>
            <span class="text-gold small fw-bold js-curr-label"><?= htmlspecialchars(get_active_currency()) ?></span>
          </div>
          <select class="form-select form-select-sm js-currency-select" aria-label="Select Country Currency" style="background: #121319; color: #FFFFFF; border-color: rgba(198, 164, 92, 0.4); font-size: 0.88rem; border-radius: 8px; padding: 8px 12px;">
            <?php foreach (get_supported_currencies() as $code => $c): ?>
              <option value="<?= $code ?>" <?= ($code === get_active_currency()) ? 'selected' : '' ?>>
                <?= $c['flag'] ?> <?= $code ?> (<?= $c['symbol'] ?>) — <?= $c['name'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Mobile Drawer Theme Selector -->
        <div class="p-3 rounded-3 mb-2 ps-mobile-theme-box" style="background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(216, 0, 29, 0.25);">
          <div class="d-flex align-items-center justify-content-between">
            <div>
              <span class="text-white-50 text-uppercase fw-bold" style="font-size: 0.72rem; letter-spacing: 0.05em;">Display Mode:</span>
              <div class="small fw-semibold text-white">Dark / Light</div>
            </div>
            <div class="btn-group btn-group-sm" role="group" aria-label="Theme Selection">
              <button type="button" class="btn btn-outline-secondary js-theme-pill-dark active" style="font-size: 0.78rem; padding: 5px 12px;">
                🌙 Dark
              </button>
              <button type="button" class="btn btn-outline-secondary js-theme-pill-light" style="font-size: 0.78rem; padding: 5px 12px;">
                ☀️ Light
              </button>
            </div>
          </div>
        </div>

        <a href="<?= get_business_url('index.php') ?>" class="ps-nav-link js-mobile-nav-link <?= is_active_page('index.php') ?>">Home</a>
        
        <!-- Mobile Section: About Us -->
        <div class="border-top border-secondary border-opacity-25 pt-2 mt-1">
          <div class="text-white-50 text-uppercase fw-bold small px-2 mb-1" style="letter-spacing: 0.05em; font-size: 0.72rem;">About PhytoScience</div>
          <div class="d-flex flex-column ms-2">
            <a href="<?= get_business_url('about.php') ?>" class="ps-nav-link js-mobile-nav-link py-1 <?= is_active_page('about.php') ?>">Company Profile & 4P System</a>
            <a href="<?= get_business_url('about.php#leadership') ?>" class="ps-nav-link js-mobile-nav-link py-1">Founders & Leadership</a>
            <a href="<?= get_business_url('about.php#science') ?>" class="ps-nav-link js-mobile-nav-link py-1">Science & Mibelle R&D</a>
            <a href="<?= get_business_url('faq.php') ?>" class="ps-nav-link js-mobile-nav-link py-1 <?= is_active_page('faq.php') ?>">Frequently Asked Questions</a>
          </div>
        </div>

        <!-- Mobile Section: Opportunity -->
        <div class="border-top border-secondary border-opacity-25 pt-2 mt-1">
          <div class="text-white-50 text-uppercase fw-bold small px-2 mb-1" style="letter-spacing: 0.05em; font-size: 0.72rem;">Business Opportunity</div>
          <div class="d-flex flex-column ms-2">
            <a href="<?= get_business_url('business-opportunity.php') ?>" class="ps-nav-link js-mobile-nav-link py-1 <?= is_active_page('business-opportunity.php') ?>">Why PhytoScience?</a>
            <a href="<?= get_business_url('how-it-works.php') ?>" class="ps-nav-link js-mobile-nav-link py-1 <?= is_active_page('how-it-works.php') ?>">How It Works (7-Step Roadmap)</a>
            <a href="<?= get_business_url('compensation-plan.php') ?>" class="ps-nav-link js-mobile-nav-link py-1 <?= is_active_page('compensation-plan.php') ?>">Hybrid Compensation Plan</a>
            <a href="<?= get_business_url('membership.php') ?>" class="ps-nav-link js-mobile-nav-link py-1 <?= is_active_page('membership.php') ?>">Packages & Tiers</a>
          </div>
        </div>

        <!-- Mobile Section: Featured Products -->
        <div class="border-top border-secondary border-opacity-25 pt-2 mt-1">
          <div class="text-white-50 text-uppercase fw-bold small px-2 mb-1" style="letter-spacing: 0.05em; font-size: 0.72rem;">Featured Products</div>
          <div class="d-flex flex-column ms-2">
            <a href="<?= get_product_url('double-stem-cell') ?>" class="ps-nav-link js-mobile-nav-link py-1 text-gold fw-semibold <?= is_active_page('double-stem-cell.php') ?>">🌿 Double Stemcell™</a>
            <a href="<?= get_product_url('crystal-cell') ?>" class="ps-nav-link js-mobile-nav-link py-1 <?= is_active_page('crystal-cell.php') ?>">💎 Crystal Cell™</a>
            <a href="<?= get_product_url('snowphyll-forte') ?>" class="ps-nav-link js-mobile-nav-link py-1 <?= is_active_page('snowphyll-forte.php') ?>">🍃 Snowphyll Forte™</a>
            <a href="<?= get_product_url('irq-cell') ?>" class="ps-nav-link js-mobile-nav-link py-1 <?= is_active_page('irq-cell.php') ?>">🧠 iiQ Plus™ / IRQ Cell</a>
            <a href="<?= get_product_url('actual-plus') ?>" class="ps-nav-link js-mobile-nav-link py-1 <?= is_active_page('actual-plus.php') ?>">💧 Actual Plus™</a>
          </div>
        </div>

        <!-- Mobile Section: Proof & Media -->
        <div class="border-top border-secondary border-opacity-25 pt-2 mt-1">
          <div class="text-white-50 text-uppercase fw-bold small px-2 mb-1" style="letter-spacing: 0.05em; font-size: 0.72rem;">Proof & Media</div>
          <div class="d-flex flex-column ms-2">
            <a href="<?= get_business_url('index.php#millionaires-car-achievers') ?>" class="ps-nav-link js-mobile-nav-link py-1 text-gold fw-semibold">★ Car Achievers & Millionaires</a>
            <a href="<?= get_business_url('index.php#testimonies') ?>" class="ps-nav-link js-mobile-nav-link py-1 text-crimson fw-semibold">♥ Health Testimonies & Proof</a>
            <a href="<?= get_business_url('success-stories.php') ?>" class="ps-nav-link js-mobile-nav-link py-1 <?= is_active_page('success-stories.php') ?>">Success Stories & Cars</a>
            <a href="<?= get_business_url('gallery.php') ?>" class="ps-nav-link js-mobile-nav-link py-1 <?= is_active_page('gallery.php') ?>">Video & Photo Gallery</a>
            <a href="<?= get_business_url('events.php') ?>" class="ps-nav-link js-mobile-nav-link py-1 <?= is_active_page('events.php') ?>">News & Events</a>
          </div>
        </div>

        <a href="<?= get_business_url('contact.php') ?>" class="ps-nav-link js-mobile-nav-link border-top border-secondary border-opacity-25 pt-2 mt-1 <?= is_active_page('contact.php') ?>">Contact & Global Offices</a>
        
        <div class="d-flex flex-column gap-2 mt-3 pt-3 border-top border-secondary border-opacity-25">
          <a href="<?= get_business_url('join.php') ?>" class="btn-ps btn-ps-primary w-100 text-center">Join PhytoScience Now</a>
          <a href="<?= MAIN_SHOP_URL ?>" class="btn-ps btn-ps-glass w-100 text-center" target="_blank" rel="noopener">Browse Wellness Store</a>
        </div>
      </div>
    </div>
  </nav>
</header>
