<?php
/**
 * PhytoScience Wellness - Luxury Responsive Navigation Bar
 */

declare(strict_types=1);

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/functions.php';

$currentPage = basename($_SERVER['PHP_SELF'] ?? 'index.php');
?>
<header>
  <nav class="ps-navbar" aria-label="Main Navigation">
    <div class="container d-flex align-items-center justify-content-between">
      
      <!-- Brand Logo -->
      <a href="<?= get_business_url('index.php') ?>" class="ps-brand-logo" aria-label="PhytoScience Wellness Home">
        <div class="ps-brand-symbol">P</div>
        <div class="ps-brand-text">
          <span class="ps-brand-title">PHYTOSCIENCE</span>
          <span class="ps-brand-badge">GLOBAL BUSINESS</span>
        </div>
      </a>

      <!-- Desktop Nav Links -->
      <div class="d-none d-xl-flex align-items-center gap-1">
        <a href="<?= get_business_url('index.php') ?>" class="ps-nav-link <?= is_active_page('index.php') ?>">Home</a>
        
        <!-- About Dropdown -->
        <div class="dropdown">
          <a class="ps-nav-link dropdown-toggle <?= is_active_page('about.php') ?>" href="<?= get_business_url('about.php') ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            About Us
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" style="background: rgba(17, 30, 26, 0.98); border: 1px solid var(--ps-border-gold); border-radius: var(--ps-radius-md); padding: 8px;">
            <li><a class="dropdown-item py-2 px-3 text-light" href="<?= get_business_url('about.php') ?>">Company Profile & 4P System</a></li>
            <li><a class="dropdown-item py-2 px-3 text-light" href="<?= get_business_url('about.php#leadership') ?>">Founder & Executive Leadership</a></li>
            <li><a class="dropdown-item py-2 px-3 text-light" href="<?= get_business_url('about.php#science') ?>">Science Board & Mibelle R&D</a></li>
            <li><a class="dropdown-item py-2 px-3 text-light" href="<?= get_business_url('about.php#milestones') ?>">Corporate Milestones</a></li>
          </ul>
        </div>

        <!-- Opportunity Dropdown -->
        <div class="dropdown">
          <a class="ps-nav-link dropdown-toggle <?= in_array($currentPage, ['business-opportunity.php', 'how-it-works.php', 'compensation-plan.php']) ? 'active' : '' ?>" href="<?= get_business_url('business-opportunity.php') ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Opportunity
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" style="background: rgba(17, 30, 26, 0.98); border: 1px solid var(--ps-border-gold); border-radius: var(--ps-radius-md); padding: 8px;">
            <li><a class="dropdown-item py-2 px-3 text-light" href="<?= get_business_url('business-opportunity.php') ?>">Why PhytoScience?</a></li>
            <li><a class="dropdown-item py-2 px-3 text-light" href="<?= get_business_url('how-it-works.php') ?>">How It Works (7-Step Roadmap)</a></li>
            <li><a class="dropdown-item py-2 px-3 text-light" href="<?= get_business_url('compensation-plan.php') ?>">Hybrid Compensation Plan</a></li>
          </ul>
        </div>

        <a href="<?= get_business_url('membership.php') ?>" class="ps-nav-link <?= is_active_page('membership.php') ?>">Packages</a>
        <a href="<?= get_business_url('success-stories.php') ?>" class="ps-nav-link <?= is_active_page('success-stories.php') ?>">Success Stories</a>
        
        <!-- Media & Events Dropdown -->
        <div class="dropdown">
          <a class="ps-nav-link dropdown-toggle <?= in_array($currentPage, ['gallery.php', 'events.php', 'faq.php']) ? 'active' : '' ?>" href="<?= get_business_url('gallery.php') ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Media & Resources
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" style="background: rgba(17, 30, 26, 0.98); border: 1px solid var(--ps-border-gold); border-radius: var(--ps-radius-md); padding: 8px;">
            <li><a class="dropdown-item py-2 px-3 text-light" href="<?= get_business_url('gallery.php') ?>">Video & Photo Gallery</a></li>
            <li><a class="dropdown-item py-2 px-3 text-light" href="<?= get_business_url('events.php') ?>">News & Upcoming Events</a></li>
            <li><a class="dropdown-item py-2 px-3 text-light" href="<?= get_business_url('faq.php') ?>">Frequently Asked Questions</a></li>
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
        <a href="<?= MEMBER_LOGIN_URL ?>" class="btn-ps btn-ps-sm btn-ps-outline-gold" target="_blank" rel="noopener">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3"/></svg>
          Member Login
        </a>
        <a href="<?= get_business_url('join.php') ?>" class="btn-ps btn-ps-sm btn-ps-gold">
          Join Now
        </a>
      </div>

      <!-- Mobile Hamburger Button -->
      <button class="d-xl-none btn btn-link text-white p-2 text-decoration-none" type="button" data-ps-toggle="nav" aria-expanded="false" aria-controls="psNavMenu" aria-label="Toggle navigation">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
      </button>

    </div>

    <!-- Mobile Drawer Overlay Menu -->
    <div id="psNavMenu" class="d-xl-none collapse" style="background: rgba(10, 18, 16, 0.98); border-top: 1px solid var(--ps-border-gold); padding: 20px 0;">
      <div class="container d-flex flex-column gap-2">
        <a href="<?= get_business_url('index.php') ?>" class="ps-nav-link <?= is_active_page('index.php') ?>">Home</a>
        <a href="<?= get_business_url('about.php') ?>" class="ps-nav-link <?= is_active_page('about.php') ?>">About PhytoScience</a>
        <a href="<?= get_business_url('business-opportunity.php') ?>" class="ps-nav-link <?= is_active_page('business-opportunity.php') ?>">Why Join?</a>
        <a href="<?= get_business_url('how-it-works.php') ?>" class="ps-nav-link <?= is_active_page('how-it-works.php') ?>">How It Works</a>
        <a href="<?= get_business_url('compensation-plan.php') ?>" class="ps-nav-link <?= is_active_page('compensation-plan.php') ?>">Compensation Plan</a>
        <a href="<?= get_business_url('membership.php') ?>" class="ps-nav-link <?= is_active_page('membership.php') ?>">Packages & Tiers</a>
        <a href="<?= get_business_url('success-stories.php') ?>" class="ps-nav-link <?= is_active_page('success-stories.php') ?>">Success Stories</a>
        <a href="<?= get_business_url('gallery.php') ?>" class="ps-nav-link <?= is_active_page('gallery.php') ?>">Media & Videos</a>
        <a href="<?= get_business_url('events.php') ?>" class="ps-nav-link <?= is_active_page('events.php') ?>">News & Events</a>
        <a href="<?= get_business_url('faq.php') ?>" class="ps-nav-link <?= is_active_page('faq.php') ?>">FAQ</a>
        <a href="<?= get_business_url('contact.php') ?>" class="ps-nav-link <?= is_active_page('contact.php') ?>">Contact & Offices</a>
        
        <div class="d-flex flex-column gap-2 mt-3 pt-3 border-top border-secondary">
          <a href="<?= get_business_url('join.php') ?>" class="btn-ps btn-ps-gold w-100 text-center">Join PhytoScience Now</a>
          <a href="<?= MEMBER_LOGIN_URL ?>" class="btn-ps btn-ps-outline-gold w-100 text-center" target="_blank" rel="noopener">Member Portal Login</a>
          <a href="<?= MAIN_SHOP_URL ?>" class="btn-ps btn-ps-glass w-100 text-center" target="_blank" rel="noopener">Browse Wellness Store</a>
        </div>
      </div>
    </div>
  </nav>
</header>

