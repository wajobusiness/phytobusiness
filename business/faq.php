<?php
/**
 * PhytoScience Wellness - FAQ Page (faq.php)
 * Comprehensive answers covering corporate legitimacy, package tiers, compensation payouts, and stockist rights.
 */

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Frequently Asked Questions (FAQ) | PhytoScience Business';
$pageDescription = 'Find authoritative answers about PhytoScience: corporate licensing (AJL932039), membership packages, daily pairing payout rules, upline roll-ups, and Mobile Stockist operations.';
$canonicalUrl = get_business_url('faq.php');

require __DIR__ . '/includes/header.php';
require_once __DIR__ . '/components/cards.php';

$faqs = [
  'corporate' => [
    'category' => 'Corporate & Legitimacy',
    'items' => [
      [
        'q' => 'Is PhytoScience a legally licensed direct selling company?',
        'a' => 'Yes. PhytoScience operates under Malaysian Direct Selling License AJL932039, issued by the Ministry of Domestic Trade and Consumer Affairs under corporate entity Phyto Science Sdn Bhd (Registration No. 201201029243 / 1013730-P). The company was incorporated on September 6, 2012, and has operated continuously and debt-free for over 13 years across 41+ sovereign nations.'
      ],
      [
        'q' => 'Where is PhytoScience corporate headquarters located?',
        'a' => 'PhytoScience owns a multi-million dollar, eight-figure purpose-built corporate headquarters in Bandar Baru Bangi, Selangor, Malaysia. Unlike many network marketing firms operating out of rented suites, our corporate property is fully debt-free, housing international administration, compliance, customer support, and executive offices.'
      ],
      [
        'q' => 'What is the relationship between PhytoScience and Mibelle Biochemistry Switzerland?',
        'a' => 'PhytoScience holds the exclusive master direct-selling contract with Mibelle Biochemistry (Buchs, Switzerland) for proprietary plant stem cell formulations based on PhytoCellTec™ Malus Domestica and Solar Vitis. Dr. Fred Zülli, founder and Managing Director of Mibelle Biochemistry, personally oversees the scientific validation of these cellular rejuvenation ingredients.'
      ]
    ]
  ],
  'membership' => [
    'category' => 'Packages & Membership',
    'items' => [
      [
        'q' => 'What packages can I choose from when starting as a distributor?',
        'a' => 'PhytoScience provides four strategic tiers: Silver (100 PP, entry tier), Gold (500 PP, intermediate tier), Junior Platinum (1,500 PP, advanced tier), and Platinum / Mobile Stockist (3,000 PP, maximum leverage tier). Every package comes with a corresponding allocation of physical cellular wellness products, your global distributor ID, and 24/7 access to the online backoffice terminal.'
      ],
      [
        'q' => 'Can I start with a smaller package like Silver and upgrade to Platinum later?',
        'a' => 'Yes. Members who register at Silver, Gold, or Junior Platinum can upgrade to a higher package by paying the point value difference within corporate upgrade grace periods. Upgrading unlocks higher daily binary pairing maximums and roll-up privileges permanently.'
      ],
      [
        'q' => 'What products are included in the initial starter package?',
        'a' => 'Your starter package contains flagship products including Double Stemcell (Swiss Malus Domestica and Solar Vitis sublingual powder) and Crystal Cell (enhanced with tomato phytoene/phytofluene carotenoids and acai berry). You may consume them personally for health conviction or retail them to earn upfront profits.'
      ]
    ]
  ],
  'compensation' => [
    'category' => 'Compensation & Daily Payouts',
    'items' => [
      [
        'q' => 'How frequently are commissions and bonuses paid out?',
        'a' => 'Commissions are calculated and credited daily into your secure backoffice e-wallet at app.iphyto.com. There is no waiting for end-of-month or quarterly payroll. You can withdraw your e-wallet funds to your bank account or convert them into product redemption vouchers for new team enrollments.'
      ],
      [
        'q' => 'What is the binary pairing bonus and how is it calculated?',
        'a' => 'The binary plan requires two active legs: Left Team and Right Team. Whenever point volume (PP) matches between your Left and Right organizations, the system calculates a binary pairing commission. Unmatched volume on your stronger leg carries forward indefinitely (it never flushes, provided your account remains maintained).'
      ],
      [
        'q' => 'What are daily pairing caps and why does Platinum have no limit?',
        'a' => 'To ensure mathematical longevity, entry tiers carry daily pairing caps: Silver is capped at ~$148 USD/day, Gold at ~$500 USD/day, and Junior Platinum at ~$1,500 USD/day. Platinum members have zero daily binary pairing caps, meaning during explosive team expansions, you capture 100% of all matched pairs without ceiling penalties.'
      ],
      [
        'q' => 'What is the Upline Roll-Up Bonus?',
        'a' => 'If a Silver member introduces a Platinum package partner, the Silver member only receives the sponsor bonus matching their own Silver status. The remaining unearned sponsor bonus automatically "rolls up" to the nearest active Platinum upline. Platinum distributors capture all unearned sponsor bonuses generated across their downline depth.'
      ]
    ]
  ],
  'stockist' => [
    'category' => 'Mobile Stockist & Operations',
    'items' => [
      [
        'q' => 'What is a Mobile Stockist and what are the key benefits?',
        'a' => 'A Mobile Stockist is an entrepreneurial leader who invests in the Platinum tier (3,000 PP) and serves as an official inventory and registration hub for their territory. In addition to unlimited binary pairing, Mobile Stockists receive a 3% to 5% administrative Key-In Bonus on every point of package registrations or reorders processed through their terminal.'
      ],
      [
        'q' => 'Are PhytoScience products Halal certified and safe?',
        'a' => 'Yes. PhytoScience products are manufactured under strict Good Manufacturing Practice (GMP) standards, certified Halal by reputable Islamic bodies, registered with local health ministries across participating countries, and carry comprehensive third-party product liability insurance coverage.'
      ],
      [
        'q' => 'How do I manage my business internationally if I travel or move?',
        'a' => 'Your business is 100% cloud-based. You can log into your terminal from any smartphone, tablet, or laptop at app.iphyto.com from anywhere on earth. Your binary points, team genealogy, and e-wallet functions remain active across all 41+ countries where PhytoScience operates.'
      ]
    ]
  ]
];
?>

<!-- 1. SUBPAGE HERO -->
<?php
$heroBadge = 'Clarity & Verification';
$heroTitle = 'Frequently Asked Questions. <span class="text-gold">Transparent Answers.</span>';
$heroSubtitle = 'Get unambiguous, verifiable facts about our corporate licensing, package investment tiers, daily pairing calculations, and Mobile Stockist operational privileges.';
$heroIsSubpage = true;
$heroBreadcrumbs = [
  ['title' => 'Media & Resources', 'url' => get_business_url('gallery.php')],
  ['title' => 'Frequently Asked Questions', 'url' => '']
];
$heroCtaPrimaryText = 'Register Your Account';
$heroCtaPrimaryUrl = get_business_url('join.php');
$heroCtaSecondaryText = 'Chat with an Advisor';
$heroCtaSecondaryUrl = WHATSAPP_LINK;

require __DIR__ . '/components/hero.php';
?>

<!-- 2. CATEGORIZED FAQ ACCORDIONS -->
<section class="py-5 py-lg-6 position-relative">
  <div class="container max-w-900 mx-auto">
    
    <!-- Category Jump Pills -->
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
      <a href="#cat-corporate" class="btn-ps btn-ps-sm btn-ps-glass">Corporate & Legal</a>
      <a href="#cat-membership" class="btn-ps btn-ps-sm btn-ps-glass">Packages & Tiers</a>
      <a href="#cat-compensation" class="btn-ps btn-ps-sm btn-ps-glass">Compensation & Payouts</a>
      <a href="#cat-stockist" class="btn-ps btn-ps-sm btn-ps-glass">Mobile Stockist</a>
    </div>

    <?php foreach ($faqs as $catKey => $catData): ?>
      <div class="mb-5" id="cat-<?= $catKey ?>">
        <div class="d-flex align-items-center gap-2 mb-3">
          <span class="ps-status-dot"></span>
          <h2 class="h4 text-white fw-bold mb-0"><?= sanitize($catData['category']) ?></h2>
        </div>

        <div class="accordion ps-accordion" id="accordion-<?= $catKey ?>">
          <?php foreach ($catData['items'] as $idx => $faq): 
            $collapseId = "collapse-{$catKey}-{$idx}";
            $headingId = "heading-{$catKey}-{$idx}";
          ?>
            <div class="accordion-item ps-card mb-3 border-0 overflow-hidden">
              <h3 class="accordion-header" id="<?= $headingId ?>">
                <button class="accordion-button collapsed text-white fw-semibold bg-transparent shadow-none py-3 px-4" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $collapseId ?>" aria-expanded="false" aria-controls="<?= $collapseId ?>">
                  <?= sanitize($faq['q']) ?>
                </button>
              </h3>
              <div id="<?= $collapseId ?>" class="accordion-collapse collapse" aria-labelledby="<?= $headingId ?>" data-bs-parent="#accordion-<?= $catKey ?>">
                <div class="accordion-body text-secondary small px-4 pb-4 pt-1" style="line-height: 1.65; border-top: 1px solid rgba(198, 164, 92, 0.15);">
                  <?= sanitize($faq['a']) ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</section>

<!-- 3. STILL HAVE QUESTIONS BOX -->
<section class="py-5 position-relative" style="background: rgba(6, 38, 26, 0.35);">
  <div class="container">
    <div class="ps-card p-4 p-lg-5 text-center max-w-700 mx-auto">
      <div class="ps-icon-box text-gold p-3 rounded-circle mx-auto mb-3" style="background: rgba(198, 164, 92, 0.1);">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
      </div>
      <h3 class="h4 text-white mb-2">Have a Question Not Listed Here?</h3>
      <p class="text-secondary small mb-4">
        Our experienced international advisors are available to walk you through binary placement strategies, regional currency payment channels, and stockist setup.
      </p>
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="<?= WHATSAPP_LINK ?>" target="_blank" rel="noopener" class="btn-ps btn-ps-gold">
          <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24" class="me-1"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
          <span>Ask on WhatsApp</span>
        </a>
        <a href="<?= get_business_url('contact.php') ?>" class="btn-ps btn-ps-glass">
          <span>Contact Regional Office</span>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- 4. PRE-FOOTER CTA -->
<?php
$ctaTitle = 'Clear Answers. Unmatched Opportunity.';
$ctaSubtitle = 'Take your place with an ethical, scientifically grounded, and daily-paying international powerhouse.';
$ctaPrimaryText = 'Choose Your Business Tier';
$ctaPrimaryUrl = get_business_url('membership.php');

require __DIR__ . '/components/cta-banner.php';
?>

<?php require __DIR__ . '/includes/footer.php'; ?>

