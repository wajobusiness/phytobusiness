<?php
/**
 * PhytoScience Wellness - Business Opportunity Page (business-opportunity.php)
 * Deep dive into why entrepreneurs choose PhytoScience: value proposition, hybrid business model, and comparison.
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Why Partner with PhytoScience | Global Business Opportunity';
$pageDescription = 'Discover why PhytoScience is the premier global direct selling opportunity: debt-free corporate stability, Swiss stem cell biotechnology, uncapped hybrid daily payouts, and turnkey digital infrastructure across 41+ nations.';
$canonicalUrl = get_business_url('business-opportunity.php');

require __DIR__ . '/includes/header.php';
require_once __DIR__ . '/components/cards.php';
?>

<!-- 1. SUBPAGE HERO -->
<?php
$heroBadge = 'The Business Opportunity';
$heroTitle = 'Build an Uncapped Global Enterprise in <span class="text-gold">Cellular Wellness</span>';
$heroSubtitle = 'A turnkey business model engineered for ambitious entrepreneurs who want predictable daily cash flow, residual leverage, and an international footprint without manufacturing overhead or logistics headaches.';
$heroIsSubpage = true;
$heroBreadcrumbs = [
  ['title' => 'Opportunity', 'url' => ''],
  ['title' => 'Why PhytoScience', 'url' => '']
];
$heroCtaPrimaryText = 'View Business Packages';
$heroCtaPrimaryUrl = get_business_url('membership.php');
$heroCtaSecondaryText = 'How the System Works';
$heroCtaSecondaryUrl = get_business_url('how-it-works.php');

require __DIR__ . '/components/hero.php';
?>

<!-- 2. SIX PILLARS OF ENTREPRENEURIAL ADVANTAGE -->
<section class="py-5 py-lg-6 position-relative" id="advantages">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Strategic Business Levers</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Why Entrepreneurs Choose PhytoScience</h2>
      <p class="text-secondary lead fs-6 mb-0">
        In an economy defined by volatility, PhytoScience offers an asset-light, high-margin business structure backed by genuine scientific patents.
      </p>
    </div>

    <div class="row g-4">
      
      <!-- Advantage 1 -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-4">
          <div class="ps-icon-box text-gold p-3 rounded-circle d-inline-flex mb-3" style="background: rgba(198, 164, 92, 0.1); border: 1px solid var(--ps-border-gold);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
          </div>
          <h3 class="h5 text-white mb-2">Zero Geographical Limits</h3>
          <p class="small text-secondary mb-0" style="line-height: 1.6;">
            Your business is not constrained by your neighborhood or city. With active offices and stockists across 41+ countries in Asia, Africa, and Europe, you can sponsor partners and earn team volume seamlessly across borders.
          </p>
        </div>
      </div>

      <!-- Advantage 2 -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-4">
          <div class="ps-icon-box text-gold p-3 rounded-circle d-inline-flex mb-3" style="background: rgba(198, 164, 92, 0.1); border: 1px solid var(--ps-border-gold);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <h3 class="h5 text-white mb-2">Swiss Patented Exclusivity</h3>
          <p class="small text-secondary mb-0" style="line-height: 1.6;">
            Never compete on price with commoditized products. Through our master partnership with Mibelle Biochemistry Switzerland, you represent award-winning PhytoCellTec™ formulations that consumers can only acquire through PhytoScience.
          </p>
        </div>
      </div>

      <!-- Advantage 3 -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-4">
          <div class="ps-icon-box text-gold p-3 rounded-circle d-inline-flex mb-3" style="background: rgba(198, 164, 92, 0.1); border: 1px solid var(--ps-border-gold);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
          </div>
          <h3 class="h5 text-white mb-2">Daily E-Wallet Cash Flow</h3>
          <p class="small text-secondary mb-0" style="line-height: 1.6;">
            Why wait 30 to 60 days for corporate payroll? Direct sponsor bonuses, pairing commissions, and stockist key-in fees credit to your backoffice e-wallet on a daily basis with multi-currency withdrawal options.
          </p>
        </div>
      </div>

      <!-- Advantage 4 -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-4">
          <div class="ps-icon-box text-gold p-3 rounded-circle d-inline-flex mb-3" style="background: rgba(198, 164, 92, 0.1); border: 1px solid var(--ps-border-gold);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
          </div>
          <h3 class="h5 text-white mb-2">Turnkey Digital Backoffice</h3>
          <p class="small text-secondary mb-0" style="line-height: 1.6;">
            Run your complete enterprise from your smartphone or laptop. Track binary team genealogy down to infinity, monitor real-time point volumes (PP/PV), and process product vouchers instantly via app.iphyto.com.
          </p>
        </div>
      </div>

      <!-- Advantage 5 -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-4">
          <div class="ps-icon-box text-gold p-3 rounded-circle d-inline-flex mb-3" style="background: rgba(198, 164, 92, 0.1); border: 1px solid var(--ps-border-gold);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <h3 class="h5 text-white mb-2">Exponential Team Leverage</h3>
          <p class="small text-secondary mb-0" style="line-height: 1.6;">
            In traditional employment, your income is strictly limited by your personal 24 hours in a day. In our hybrid binary model, you receive pairing volume from every distributor placed under your Left and Right organizations.
          </p>
        </div>
      </div>

      <!-- Advantage 6 -->
      <div class="col-md-6 col-lg-4">
        <div class="ps-card h-100 p-4">
          <div class="ps-icon-box text-gold p-3 rounded-circle d-inline-flex mb-3" style="background: rgba(198, 164, 92, 0.1); border: 1px solid var(--ps-border-gold);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
          </div>
          <h3 class="h5 text-white mb-2">Debt-Free Corporate Stability</h3>
          <p class="small text-secondary mb-0" style="line-height: 1.6;">
            Countless network companies collapse due to debt or reckless payouts. PhytoScience has operated continuously since Sept 6, 2012, with a multi-million owned corporate HQ, zero bank debt, and an impeccable 13-year payout record.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- 3. STRATEGIC COMPARISON MATRIX -->
<section class="py-5 py-lg-6 position-relative" style="background: rgba(6, 38, 26, 0.3);">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Business Model Evaluation</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">How PhytoScience Compares</h2>
      <p class="text-secondary lead fs-6 mb-0">
        Analyze the risk-to-reward ratio against traditional employment and conventional brick-and-mortar entrepreneurship.
      </p>
    </div>

    <div class="table-responsive">
      <table class="table table-dark ps-table align-middle">
        <thead>
          <tr>
            <th scope="col" style="width: 25%;">Evaluation Metric</th>
            <th scope="col" style="width: 25%;">Traditional Employment</th>
            <th scope="col" style="width: 25%;">Brick-and-Mortar Business</th>
            <th scope="col" style="width: 25%;" class="text-gold">PhytoScience Enterprise</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="fw-semibold text-white">Startup Capital</td>
            <td class="text-secondary">None (Time trade)</td>
            <td class="text-danger fw-semibold">$25,000 – $250,000+</td>
            <td class="text-gold fw-bold">From $120 USD (Silver)</td>
          </tr>
          <tr>
            <td class="fw-semibold text-white">Monthly Overhead & Inventory</td>
            <td class="text-secondary">None</td>
            <td class="text-danger fw-semibold">High (Rent, payroll, utilities)</td>
            <td class="text-gold fw-bold">Zero physical overhead</td>
          </tr>
          <tr>
            <td class="fw-semibold text-white">Income Ceiling</td>
            <td class="text-danger fw-semibold">Capped by salary review</td>
            <td class="text-secondary">Limited by store capacity</td>
            <td class="text-gold fw-bold">Uncapped (Infinite binary depth)</td>
          </tr>
          <tr>
            <td class="fw-semibold text-white">Geographical Mobility</td>
            <td class="text-secondary">Tied to specific location</td>
            <td class="text-secondary">Tied to physical premises</td>
            <td class="text-gold fw-bold">100% Mobile across 41+ countries</td>
          </tr>
          <tr>
            <td class="fw-semibold text-white">Payout Frequency</td>
            <td class="text-secondary">Monthly (Delayed)</td>
            <td class="text-secondary">Irregular / After expenses</td>
            <td class="text-gold fw-bold">Daily E-Wallet Credits</td>
          </tr>
          <tr>
            <td class="fw-semibold text-white">Time Freedom & Duplication</td>
            <td class="text-danger fw-semibold">Zero (Must trade time for money)</td>
            <td class="text-danger fw-semibold">Low (Owner is usually last to leave)</td>
            <td class="text-gold fw-bold">True Residual Leverage</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</section>

<!-- 4. WHO SUCCEEDS WITH PHYTOSCIENCE -->
<section class="py-5 py-lg-6 position-relative">
  <div class="container">
    
    <div class="text-center max-w-700 mx-auto mb-5">
      <div class="d-inline-flex align-items-center gap-2 ps-badge-gold mb-3">
        <span class="ps-status-dot"></span>
        <span>Target Profiles</span>
      </div>
      <h2 class="h2 text-white fw-bold mb-3">Who Is This Opportunity Built For?</h2>
      <p class="text-secondary lead fs-6 mb-0">
        Our global community includes leaders from diverse professional backgrounds who recognized the power of compounding cellular health.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-md-6 col-lg-3">
        <div class="ps-card h-100 p-4">
          <div class="text-gold fw-bold mb-2">01. Healthcare Professionals</div>
          <p class="small text-secondary mb-0">
            Doctors, pharmacists, and wellness therapists who require scientifically validated cellular nutrition products with verifiable clinical credentials.
          </p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="ps-card h-100 p-4">
          <div class="text-gold fw-bold mb-2">02. Experienced Networkers</div>
          <p class="small text-secondary mb-0">
            Industry veterans tired of collapsing startups who demand a 13-year debt-free corporate giant with unlimited binary pairing on Platinum.
          </p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="ps-card h-100 p-4">
          <div class="text-gold fw-bold mb-2">03. Corporate Executives</div>
          <p class="small text-secondary mb-0">
            Professionals seeking a bulletproof second income stream that generates foreign currency cash flow without leaving their daytime careers.
          </p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="ps-card h-100 p-4">
          <div class="text-gold fw-bold mb-2">04. Young Entrepreneurs</div>
          <p class="small text-secondary mb-0">
            Digital-native builders seeking an international mobile business leveraging social media, global zoom webinars, and automated e-wallets.
          </p>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- 5. PRE-FOOTER CTA -->
<?php
$ctaTitle = 'Take the First Step Toward Global Cash Flow';
$ctaSubtitle = 'Explore our step-by-step roadmap to see how you can launch, sponsor your first two leaders, and trigger your daily binary engine this week.';
$ctaPrimaryText = 'See How the System Works';
$ctaPrimaryUrl = get_business_url('how-it-works.php');

require __DIR__ . '/components/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>

