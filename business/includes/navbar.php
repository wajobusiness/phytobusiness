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

        <!-- Proof & Media Dropdown (Consolidating Stories, Gallery & Events) -->
        <div class="dropdown">
          <a class="ps-nav-link dropdown-toggle <?= in_array($currentPage, ['success-stories.php', 'gallery.php', 'events.php']) ? 'active' : '' ?>" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Proof & Media
          </a>
          <ul class="dropdown-menu dropdown-menu-ps dropdown-menu-dark">
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_business_url('success-stories.php') ?>">Distributor Success Stories</a></li>
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_business_url('gallery.php') ?>">Video & Photo Gallery</a></li>
            <li><a class="dropdown-item dropdown-item-ps" href="<?= get_business_url('events.php') ?>">News & Upcoming Events</a></li>
          </ul>
        </div>

        <a href="<?= get_business_url('contact.php') ?>" class="ps-nav-link <?= is_active_page('contact.php') ?>">Contact</a>
      </div>

      <!-- Action CTAs -->
      <div class="d-none d-lg-flex align-items-center gap-2">
        <a href="<?= MAIN_SHOP_URL ?>" class="btn-ps btn-ps-sm btn-ps-glass" target="_blank" rel="noopener">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4H6zM3 6h18M16 10a4 4 0 01-8 0"/></svg>
          Shop Products
        </a>
        <a href="<?= MEMBER_LOGIN_URL ?>" class="btn-ps btn-ps-sm btn-ps-outline-crimson" target="_blank" rel="noopener">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3"/></svg>
          Member Login
        </a>
        <a href="<?= get_business_url('join.php') ?>" class="btn-ps btn-ps-sm btn-ps-primary">
          Join Now
        </a>
      </div>

      <!-- Mobile Hamburger Button -->
      <button class="d-xl-none btn btn-link text-white p-2 text-decoration-none" type="button" data-ps-toggle="nav" aria-expanded="false" aria-controls="psNavMenu" aria-label="Toggle navigation">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
      </button>

    </div>

    <!-- Mobile Drawer Overlay Menu -->
    <div id="psNavMenu" class="d-xl-none collapse" style="background: rgba(10, 11, 14, 0.98); border-top: 1px solid rgba(216, 0, 29, 0.3); padding: 20px 0; max-height: 80vh; overflow-y: auto;">
      <div class="container d-flex flex-column gap-2">
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

        <!-- Mobile Section: Proof & Media -->
        <div class="border-top border-secondary border-opacity-25 pt-2 mt-1">
          <div class="text-white-50 text-uppercase fw-bold small px-2 mb-1" style="letter-spacing: 0.05em; font-size: 0.72rem;">Proof & Media</div>
          <div class="d-flex flex-column ms-2">
            <a href="<?= get_business_url('success-stories.php') ?>" class="ps-nav-link js-mobile-nav-link py-1 <?= is_active_page('success-stories.php') ?>">Success Stories & Cars</a>
            <a href="<?= get_business_url('gallery.php') ?>" class="ps-nav-link js-mobile-nav-link py-1 <?= is_active_page('gallery.php') ?>">Video & Photo Gallery</a>
            <a href="<?= get_business_url('events.php') ?>" class="ps-nav-link js-mobile-nav-link py-1 <?= is_active_page('events.php') ?>">News & Events</a>
          </div>
        </div>

        <a href="<?= get_business_url('contact.php') ?>" class="ps-nav-link js-mobile-nav-link border-top border-secondary border-opacity-25 pt-2 mt-1 <?= is_active_page('contact.php') ?>">Contact & Global Offices</a>
        
        <div class="d-flex flex-column gap-2 mt-3 pt-3 border-top border-secondary border-opacity-25">
          <a href="<?= get_business_url('join.php') ?>" class="btn-ps btn-ps-primary w-100 text-center">Join PhytoScience Now</a>
          <a href="<?= MEMBER_LOGIN_URL ?>" class="btn-ps btn-ps-outline-crimson w-100 text-center" target="_blank" rel="noopener">Member Portal Login</a>
          <a href="<?= MAIN_SHOP_URL ?>" class="btn-ps btn-ps-glass w-100 text-center" target="_blank" rel="noopener">Browse Wellness Store</a>
        </div>
      </div>
    </div>
  </nav>
</header>
