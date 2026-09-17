<?php
/**
 * PhytoScience Wellness - Reusable Card Components
 * Modular rendering helpers for package tiers, leadership profiles, 4P pillars, and global offices.
 */

declare(strict_types=1);

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/functions.php';

/**
 * Render a Package Tier Card
 */
function render_package_card(array $pkg, bool $showDetailedCta = true): string
{
    $isFeatured = !empty($pkg['featured']);
    $featuredBadge = $isFeatured ? '<span class="ps-package-featured-badge">MOST POPULAR • MAXIMUM PAIRING</span>' : '';
    $cardClasses = 'ps-card ps-package-card ' . ($isFeatured ? 'featured' : '');

    $featuresHtml = '';
    foreach ($pkg['features'] as $feature) {
        $featuresHtml .= '
        <li class="d-flex align-items-start gap-2 mb-2">
            <svg class="text-gold flex-shrink-0 mt-1" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            <span class="small text-secondary">' . sanitize($feature) . '</span>
        </li>';
    }

    $ctaHtml = $showDetailedCta
        ? '<a href="' . get_business_url('join.php?package=' . urlencode($pkg['slug'])) . '" class="btn-ps ' . ($isFeatured ? 'btn-ps-gold' : 'btn-ps-outline-gold') . ' w-100 mt-auto">Choose ' . sanitize($pkg['name']) . '</a>'
        : '<a href="' . get_business_url('membership.php') . '" class="btn-ps btn-ps-outline-gold w-100 mt-auto">View Package Details</a>';

    return '
    <div class="' . $cardClasses . '">
        ' . $featuredBadge . '
        <div class="d-flex justify-content-between align-items-start mb-2">
            <div>
                <span class="badge bg-dark-subtle text-gold border border-gold border-opacity-25 px-2 py-1 mb-2 font-monospace small">' . sanitize((string)$pkg['pp']) . ' PP</span>
                <h3 class="h4 text-white mb-0">' . sanitize($pkg['name']) . '</h3>
            </div>
            ' . ($isFeatured ? '<span class="badge bg-gold text-dark fw-bold">Stockist Tier</span>' : '') . '
        </div>

        <p class="small text-secondary mb-3">' . sanitize($pkg['tagline']) . '</p>

        <div class="ps-package-pricing py-3 mb-3 border-top border-bottom border-secondary border-opacity-25">
            <div class="d-flex align-items-baseline gap-1">
                <span class="small text-secondary">Est.</span>
                <span class="h2 text-white fw-bold mb-0">' . sanitize($pkg['price_estimate']) . '</span>
            </div>
            <div class="small text-gold mt-1 fw-semibold">Daily Pairing Cap: ' . sanitize($pkg['daily_cap']) . '</div>
        </div>

        <div class="mb-4">
            <div class="text-white small fw-bold text-uppercase mb-2" style="letter-spacing: 0.05em; font-size: 0.75rem;">Included Benefits</div>
            <ul class="list-unstyled mb-0">
                ' . $featuresHtml . '
            </ul>
        </div>

        ' . $ctaHtml . '
    </div>';
}

/**
 * Render a Leadership or Scientist Card
 */
function render_person_card(array $person): string
{
    $imagePlaceholder = '
    <div class="d-flex align-items-center justify-content-center w-100 h-100 bg-dark text-gold fs-1 fw-bold" style="background: linear-gradient(135deg, #0A1C14 0%, #173829 100%);">
        ' . substr($person['name'], 0, 1) . '
    </div>';

    return '
    <div class="ps-card ps-team-card h-100 p-4">
        <div class="ps-avatar-wrapper mb-3 mx-auto" style="width: 130px; height: 130px; border-radius: 50%; overflow: hidden; border: 2px solid var(--ps-border-gold); box-shadow: var(--ps-shadow-md);">
            ' . $imagePlaceholder . '
        </div>
        <div class="text-center">
            <h4 class="h5 text-white mb-1">' . sanitize($person['name']) . '</h4>
            <div class="small text-gold fw-semibold mb-2">' . sanitize($person['title']) . '</div>
            <div class="badge bg-dark-subtle text-secondary border border-secondary border-opacity-25 px-2 py-1 mb-3 small">' . sanitize($person['credentials']) . '</div>
            <p class="small text-secondary mb-0" style="line-height: 1.55;">' . sanitize($person['bio']) . '</p>
        </div>
    </div>';
}

/**
 * Render 4P Pillar Feature Card
 */
function render_4p_card(string $pillar, string $title, string $tagline, string $description, string $iconSvg, string $link = ''): string
{
    $linkBtn = !empty($link) 
        ? '<a href="' . $link . '" class="text-gold small fw-semibold text-decoration-none d-inline-flex align-items-center gap-1 mt-3 hover-underline">Learn More <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>' 
        : '';

    return '
    <div class="ps-card h-100 p-4 position-relative">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="ps-icon-box text-gold p-3 rounded-circle" style="background: rgba(198, 164, 92, 0.1); border: 1px solid var(--ps-border-gold);">
                ' . $iconSvg . '
            </div>
            <span class="badge bg-gold text-dark fw-bold">' . sanitize($pillar) . '</span>
        </div>
        <h3 class="h5 text-white mb-1">' . sanitize($title) . '</h3>
        <div class="small text-gold mb-2 fw-semibold">' . sanitize($tagline) . '</div>
        <p class="small text-secondary mb-0" style="line-height: 1.6;">' . sanitize($description) . '</p>
        ' . $linkBtn . '
    </div>';
}

/**
 * Render International Office Card
 */
function render_office_card(array $office): string
{
    $statusBadge = $office['is_hq'] 
        ? '<span class="badge bg-gold text-dark fw-bold">GLOBAL HQ</span>' 
        : '<span class="badge bg-dark-subtle text-light border border-secondary">Regional Hub</span>';

    $phoneLine = !empty($office['phone']) 
        ? '<div class="small text-secondary d-flex align-items-center gap-2 mb-1"><svg width="14" height="14" class="text-gold" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/></svg><span>' . sanitize($office['phone']) . '</span></div>' 
        : '';

    $emailLine = !empty($office['email']) 
        ? '<div class="small text-secondary d-flex align-items-center gap-2"><svg width="14" height="14" class="text-gold" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg><span>' . sanitize($office['email']) . '</span></div>' 
        : '';

    return '
    <div class="ps-card h-100 p-4">
        <div class="d-flex justify-content-between align-items-start mb-2">
            <h4 class="h5 text-white mb-0">' . sanitize($office['country']) . '</h4>
            ' . $statusBadge . '
        </div>
        <div class="small text-gold fw-semibold mb-3">' . sanitize($office['city']) . '</div>
        <p class="small text-secondary mb-3" style="line-height: 1.5;">' . sanitize($office['address']) . '</p>
        <div class="border-top border-secondary border-opacity-25 pt-2 mt-auto">
            ' . $phoneLine . '
            ' . $emailLine . '
        </div>
    </div>';
}

