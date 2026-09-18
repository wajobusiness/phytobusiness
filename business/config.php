<?php
/**
 * PhytoScience Wellness - Business Opportunity Portal
 * Central Configuration & Global Constants
 * Compatible with PHP 8.2+ and standard cPanel Apache environments
 */

declare(strict_types=1);

// Prevent direct script execution if accessed outside root context
if (session_status() === PHP_SESSION_NONE) {
    session_start([
        'cookie_httponly' => true,
        'cookie_secure'   => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on',
        'cookie_samesite' => 'Lax',
    ]);
}

// Global Brand Constants
define('APP_NAME', 'PhytoScience Wellness');
define('APP_TAGLINE', 'We Are The Trend Maker');
define('APP_MISSION_STATEMENT', 'Empowering global health and multi-generational financial well-being through clinically proven plant stem cell science and an industry-leading hybrid compensation plan.');
define('COMPANY_LEGAL_NAME', 'Phyto Science Sdn Bhd');
define('COMPANY_REG_NO', '201201029243 (1013730-P)');
define('COMPANY_AJL_LICENSE', 'AJL932039 (2021–2026)');
define('COMPANY_FOUNDED_YEAR', 2012);

// URLs & Integration Links
define('MAIN_SITE_URL', 'https://phytosciencewellness.com/');
define('MAIN_SHOP_URL', 'https://phytosciencewellness.com/main/shop/');
define('MEMBER_LOGIN_URL', 'https://app.iphyto.com/member/login.aspx');
define('OFFICIAL_PORTAL_URL', 'https://iphyto.com/');
define('AFRICA_PORTAL_URL', 'https://phytoscienceafrica.com/');

// ==============================================================================
// Live Currency Exchange Rate API Settings (User Configurable)
// ==============================================================================
// 1. Enable/disable live API rate updates (set false to use manual fixed rates only)
define('CURRENCY_API_AUTO_UPDATE', true);

// 2. The Exchange Rate API Endpoint URL (Base: USD). 
// You can change this URL to any free or paid exchange rate API service you prefer!
// Default (Free, Open, No Key Required): https://open.er-api.com/v6/latest/USD
// Alternative with personal key: https://v6.exchangerate-api.com/v6/YOUR_API_KEY/latest/USD
define('CURRENCY_API_URL', 'https://open.er-api.com/v6/latest/USD');

// 3. Optional API Key (leave empty if using the default open API)
define('CURRENCY_API_KEY', '');

// 4. Cache duration in hours before refreshing rates from API (default: 12 hours)
define('CURRENCY_API_CACHE_HOURS', 12);

// Contact Coordinates
define('CONTACT_PHONE_NG_1', '+234 802 317 3303'); // Call and WhatsApp
define('CONTACT_PHONE_NG_2', '+234 806 864 9995');
define('CONTACT_PHONE_UK', '+447474439825');
define('CONTACT_PHONE_MY', '+603 – 8923 1880');
define('CONTACT_PHONE_INTL', '+234 802 317 3303');
define('CONTACT_WHATSAPP', '+2348023173303');
define('CONTACT_WHATSAPP_LINK', 'https://wa.me/2348023173303?text=' . urlencode('Hello PhytoScience Team, I would like to learn more about the Business Opportunity and distributor membership packages.'));
define('WHATSAPP_LINK', CONTACT_WHATSAPP_LINK);
define('CONTACT_EMAIL', 'Phytosciencewellness7@gmail.com');

// Headquarters & Regional Office Addresses
define('HQ_ADDRESS', 'Wisma Phyto Science, PT 56935, Jalan 9/8, Seksyen 9, 43650 Bandar Baru Bangi, Selangor Darul Ehsan, Malaysia');
define('OFFICE_LAGOS_1_ADDRESS', 'Opebi Road, Opebi, Ikeja, Lagos');
define('OFFICE_LAGOS_2_ADDRESS', 'Folorunsho Plaza, 7 Awolowo way Ikeja Lagos.');
define('OFFICE_ABUJA_ADDRESS', 'De Avalon plaza, Utako, Abuja');
define('OFFICE_UK_ADDRESS', "Peel Street Derby, Mackworth, Derby, Derbyshire, DE22 3GG");
define('LAGOS_HUB_ADDRESS', OFFICE_LAGOS_1_ADDRESS);

// Social Media Channels
define('SOCIAL_FACEBOOK', 'https://www.facebook.com/myphytoscienceinternational');
define('SOCIAL_INSTAGRAM', 'https://www.instagram.com/phytoscienceinternational/');
define('SOCIAL_TWITTER', 'https://twitter.com/HqPhyto');
define('SOCIAL_YOUTUBE', 'https://www.youtube.com/@phytoscienceinternational');

/**
 * Helper to get the canonical base URL for the platform
 * Automatically detects whether running at the webroot (/) or in a subfolder (/business/)
 */
function get_business_url(string $path = ''): string {
    // Determine protocol and host
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443) ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'] ?? 'phytosciencewellness.com';
    
    // Auto-detect whether running inside /business/ subfolder or at webroot /
    $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
    $scriptDir = dirname($scriptName);
    $scriptDir = str_replace('\\', '/', $scriptDir);
    
    // If the current script directory contains /business, retain /business, otherwise empty for root
    if (preg_match('#/business(/|$)#i', $scriptDir)) {
        $base = '/business';
    } else {
        $base = '';
    }
    
    $cleanPath = ltrim($path, '/');
    if ($cleanPath !== '') {
        return $base !== '' ? $base . '/' . $cleanPath : '/' . $cleanPath;
    }
    return $base !== '' ? $base . '/' : '/';
}

// Verified Executive Leadership Members
define('LEADERSHIP_MEMBERS', [
    [
        'name' => 'The Late Tan Sri Lai Teck Peng',
        'title' => 'Founder (P.S.M., S.S.A.P)',
        'role' => 'Visionary Founder',
        'credentials' => 'P.S.M., S.S.A.P • 28+ Yrs Experience',
        'bio' => 'Founded Phyto Science on September 6, 2012 with a vision of life transformation. Brought over 28 years of direct selling excellence and was bestowed the royal title of "Tan Sri" by HM Yang di-Pertuan Agong in 2015.',
        'image' => 'assets/images/founder.jpg'
    ],
    [
        'name' => 'Puan Sri Datin Sri Ela Tan',
        'title' => 'Co-Founder cum Managing Director',
        'role' => 'Executive Managing Director',
        'credentials' => 'Britishpedia Honoree • MCWEA Awardee',
        'bio' => 'Recognized in Britishpedia "Successful People in Malaysia" (2022) and recipient of the MCWEA Women of Excellence Award. Over 25 years of global management transforming Phyto Science into a multi-million dollar powerhouse.',
        'image' => 'assets/images/co-founder.jpg'
    ],
    [
        'name' => 'Datuk Willy Toh Soon Thye',
        'title' => 'Chief Executive Officer',
        'role' => 'Chief Executive Officer',
        'credentials' => '15+ Yrs Direct Selling Mastery',
        'bio' => '15+ years of strategic network marketing leadership driving global expansion into 41+ countries, championing the mission to create multi-generational wealth.',
        'image' => 'assets/images/ceo.jpg'
    ],
    [
        'name' => 'Chong Kur Sen',
        'title' => 'Legal Advisor',
        'role' => 'Corporate Legal Counsel',
        'credentials' => 'LLB (Hons) Malaya • Managing Partner',
        'bio' => 'LLB (Hons) University of Malaya, founder and managing partner of M/s Kur Sen Chong & Co., providing steadfast legal governance and regulatory compliance across international operations.',
        'image' => 'assets/images/legal-advisor.jpg'
    ]
]);

// Verified Scientific Advisory Board
define('SCIENTIFIC_ADVISORS', [
    [
        'name' => 'Dr. Fred Zülli',
        'title' => 'CEO & Head of Research, Mibelle Biochemistry (Switzerland)',
        'specialty' => 'Pioneer of PhytoCellTec™ Plant Stem Cell Technology',
        'credentials' => 'PhD Biochemistry • Managing Director Mibelle',
        'bio' => 'Leading Swiss biochemist behind the patented PhytoCellTec™ plant stem cell cultivation system, ensuring Phyto Science formulations remain the highest-quality botanical actives worldwide.',
        'image' => 'assets/images/dr-fred.jpg'
    ],
    [
        'name' => 'Dr. Jonathan F. Hull',
        'title' => 'Biochemical Consultant (PhD, Yale University)',
        'specialty' => 'Molecular Chemistry & Clean Synthesis',
        'credentials' => 'PhD Yale • Brookhaven Goldhaber Fellow',
        'bio' => 'Former Goldhaber Fellow at Brookhaven National Laboratory; specializes in biologically inspired molecular structures, green chemistry, and catalytic efficacy.',
        'image' => 'assets/images/dr-hull.jpg'
    ],
    [
        'name' => 'Dr. Gokula Mohan',
        'title' => 'Senior Scientist & Lecturer (PhD, Glasgow University, UK)',
        'specialty' => 'Stem Cell Biology & Cellular Epigenetics',
        'credentials' => 'PhD Glasgow • Senior Lecturer Malaya',
        'bio' => 'Senior Lecturer at Universiti Malaya focusing on human stem cell research, therapeutics, exosome applications, and cellular rejuvenation mechanisms.',
        'image' => 'assets/images/dr-gokula.jpg'
    ],
    [
        'name' => 'Dr. Taznim Begam Mohd Mohidin',
        'title' => 'Molecular Biologist (PhD, Universiti Malaya)',
        'specialty' => 'Immunology & Cellular Microbiology',
        'credentials' => 'PhD Molecular Biology & Immunology',
        'bio' => 'Senior researcher in translational immunology, antiviral cell biology, and immune modulation supporting Phyto Science’s cellular defense product lineup.',
        'image' => 'assets/images/dr-taznim.jpg'
    ],
    [
        'name' => 'Dr. Felix See Too Wah Seng',
        'title' => 'Biotechnology Consultant (PhD, Universiti Malaya)',
        'specialty' => 'Molecular Genomics & Bioactive Discovery',
        'credentials' => 'PhD Genomics & Bioactive Discovery',
        'bio' => 'Specialist in next-generation sequencing, microbial genomics, and natural bioactive compound discovery ensuring rigorous clinical substantiation.',
        'image' => 'assets/images/dr-felix.jpg'
    ]
]);

/**
 * Verified Executive Leadership & Key Scientists
 */
function get_leadership_data(): array {
    return [
        'executives' => LEADERSHIP_MEMBERS,
        'scientists' => SCIENTIFIC_ADVISORS
    ];
}

// Global Membership Package Tiers & Official Pricing Plans
define('MEMBERSHIP_PACKAGES', [
    'silver' => [
        'id' => 'silver',
        'slug' => 'silver',
        'name' => 'Silver Package',
        'badge' => 'Starter Pack',
        'tagline' => 'Ideal entry level for part-time retail entrepreneurs and wellness advocates.',
        'summary' => 'Ideal starting point for part-time distributors, wellness advocates, and retail entrepreneurs.',
        'featured' => false,
        'popular' => false,
        'pp' => '100',
        'pv_points' => '100 PP',
        'price_estimate' => '$130 / ₦110,000',
        'price_usd' => '$130',
        'price_ngn' => '₦110,000',
        'price_myr' => 'RM 420',
        'daily_cap' => 'Up to 28 Pairs ($140/day)',
        'daily_pair_cap' => 'Up to 28 Pairs Daily (Capped at ~$140/day)',
        'typical_products' => '2 Packs Double Stemcell™ or Crystal Cell™',
        'sponsor_bonus' => '$30 Direct Sponsor Commission',
        'roll_up_status' => 'Partial (Excess upline compresses to Gold/Platinum)',
        'key_in_bonus' => 'Not Eligible (Mobile Stockists only)',
        'recommended_for' => 'Beginners, direct retail distributors, part-time hustlers',
        'features' => [
            '2 Packs of Double Stemcell™ or Crystal Cell™',
            'Official PhytoScience Global Distributor ID',
            'Full 24/7 Access to Online Member Backoffice',
            'Real-Time Daily E-Wallet Cash Payouts',
            'Immediate 20%–40% Retail Markup Profit',
            'Binary Pairing Bonus: Up to 28 Pairs Daily',
            'Access to Weekly Zoom & Regional Leadership Training'
        ]
    ],
    'gold' => [
        'id' => 'gold',
        'slug' => 'gold',
        'name' => 'Gold Package',
        'badge' => 'Builder Choice',
        'tagline' => 'Accelerated binary pairing leverage and partial roll-up bonuses for team leaders.',
        'summary' => 'Built for ambitious team builders ready to scale earnings, leverage larger pairing caps, and capture partial roll-ups.',
        'featured' => false,
        'popular' => true,
        'pp' => '500',
        'pv_points' => '500 PP',
        'price_estimate' => '$650 / ₦550,000',
        'price_usd' => '$650',
        'price_ngn' => '₦550,000',
        'price_myr' => 'RM 2,100',
        'daily_cap' => 'Up to 100 Pairs ($600/day)',
        'daily_pair_cap' => 'Up to 100 Pairs Daily (Capped at ~$600/day)',
        'typical_products' => '10 Packs Combo (Double Stemcell™ + Crystal Cell™)',
        'sponsor_bonus' => 'Up to $177 Sponsor Commission',
        'roll_up_status' => 'Intermediate Roll-Up Capture from Silvers',
        'key_in_bonus' => 'Not Eligible (Mobile Stockists only)',
        'recommended_for' => 'Active leaders, health clinics, serious network builders',
        'features' => [
            '10 Packs Combo (Double Stemcell™ + Crystal Cell™)',
            'All Silver Member Benefits Included',
            'Elevated Binary Pairing Rate (12% of PV)',
            'Substantially Higher Daily Pairing Cap',
            'Earn Roll-Up Commissions from Downline Silvers',
            'Faster Capital Recovery & Leadership Advancement',
            'Eligibility for Regional Incentive Contests & Rallies'
        ]
    ],
    'junior_platinum' => [
        'id' => 'junior-platinum',
        'slug' => 'junior-platinum',
        'name' => 'Junior Platinum',
        'badge' => 'Executive Tier',
        'tagline' => 'High-capacity inventory allocation and maximum binary depth for serious operators.',
        'summary' => 'The bridge to stockist status, providing substantial inventory allocation and superior pairing leverage.',
        'featured' => false,
        'popular' => false,
        'pp' => '1,500',
        'pv_points' => '1,500 PP',
        'price_estimate' => '$1,950 / ₦1,650,000',
        'price_usd' => '$1,950',
        'price_ngn' => '₦1,650,000',
        'price_myr' => 'RM 6,300',
        'daily_cap' => 'High-Capacity Leverage',
        'daily_pair_cap' => 'High-Capacity Binary Pairing',
        'typical_products' => '30 Packs Complete Clinical Therapeutic Range',
        'sponsor_bonus' => 'Up to $450 Sponsor Commission',
        'roll_up_status' => 'Advanced Roll-Up Retention',
        'key_in_bonus' => 'Eligible in select regional business centers',
        'recommended_for' => 'Established community leaders and regional stockist candidates',
        'features' => [
            '30 Packs Complete Clinical Therapeutic Range',
            'All Gold Member Benefits Included',
            'Substantial Wholesale Inventory Discount',
            'Maximum Binary Leg Depth & Volume Leverage',
            'Priority Product Fulfillment & Fast-Track Dispatch',
            'Exclusive Invitations to Corporate Leadership Councils',
            'Comprehensive Digital Marketing Field Toolkit'
        ]
    ],
    'platinum_mobile' => [
        'id' => 'platinum-mobile',
        'slug' => 'platinum-mobile',
        'name' => 'Platinum / Mobile Stockist',
        'badge' => 'Enterprise Level',
        'tagline' => 'The ultimate business package with UNLIMITED daily pairing and 3%–5% key-in overrides.',
        'summary' => 'The ultimate enterprise tier. Unlimited daily pairing, maximum sponsor payouts, 100% roll-up capture, and administrative Key-In fees.',
        'featured' => true,
        'popular' => false,
        'pp' => '3,000',
        'pv_points' => '3,000 PP',
        'price_estimate' => '$3,900 / ₦3,300,000',
        'price_usd' => '$3,900',
        'price_ngn' => '₦3,300,000',
        'price_myr' => 'RM 12,600',
        'daily_cap' => 'UNLIMITED Daily Pairs',
        'daily_pair_cap' => 'UNLIMITED Daily Pairs (No Flushing)',
        'typical_products' => '60+ Packs Master Inventory Allocation + Marketing Hub',
        'sponsor_bonus' => 'Up to $600/Pack Sponsor Commission',
        'roll_up_status' => '100% Full Roll-Up Capture from entire lineage',
        'key_in_bonus' => '3% to 5% System Key-In Administrative Commission',
        'recommended_for' => 'Master entrepreneurs, country stockists, and top industry leaders',
        'features' => [
            '60+ Packs Master Inventory Allocation + Promo Display Kit',
            'UNLIMITED Daily Binary Pairing Potential (Never Flushes)',
            '3%–5% Administrative Key-In Bonus on Every Registration Processed',
            '100% Full Dynamic Compression Roll-Up Capture',
            'Highest Direct Sponsor Bonus Tier (Up to $600 per recruit)',
            'Official Mobile Stockist Backoffice Operational Terminal',
            'VIP Red Carpet Access at Annual Global Conventions',
            'Luxury Car & International Travel Award Point Acceleration'
        ]
    ]
]);

/**
 * Retrieve verified membership packages
 */
function get_packages_data(): array {
    return MEMBERSHIP_PACKAGES;
}

/**
 * Verified Global Business Centers & International Offices
 */
function get_business_centers_data(): array {
    return [
        [
            'country' => 'Nigeria (Lagos — Opebi)',
            'entity' => 'PhytoScience Lagos Office',
            'city' => 'Opebi, Ikeja, Lagos',
            'address' => 'Opebi Road, Opebi, Ikeja, Lagos',
            'phone' => '+234 802 317 3303 (Call & WhatsApp) / +234 806 864 9995',
            'email' => 'Phytosciencewellness7@gmail.com',
            'hours' => 'Mon–Fri: 9:00 AM – 5:30 PM, Sat: 10:00 AM – 3:00 PM'
        ],
        [
            'country' => 'Nigeria (Lagos — Awolowo Way)',
            'entity' => 'PhytoScience Lagos Office',
            'city' => 'Awolowo Way, Ikeja, Lagos',
            'address' => 'Folorunsho Plaza, 7 Awolowo way Ikeja Lagos.',
            'phone' => '+234 802 317 3303 / +234 806 864 9995',
            'email' => 'Phytosciencewellness7@gmail.com',
            'hours' => 'Mon–Fri: 9:00 AM – 5:30 PM, Sat: 10:00 AM – 3:00 PM'
        ],
        [
            'country' => 'Nigeria (Abuja)',
            'entity' => 'PhytoScience Abuja Office',
            'city' => 'Utako, Abuja',
            'address' => 'De Avalon plaza, Utako, Abuja',
            'phone' => '+234 802 317 3303 (Call & WhatsApp) / +234 806 864 9995',
            'email' => 'Phytosciencewellness7@gmail.com',
            'hours' => 'Mon–Fri: 9:00 AM – 5:30 PM, Sat: 10:00 AM – 2:00 PM'
        ],
        [
            'country' => 'United Kingdom',
            'entity' => 'PhytoScience United Kingdom Office',
            'city' => 'Derby, Derbyshire',
            'address' => 'Peel Street Derby, Mackworth, Derby, Derbyshire, DE22 3GG',
            'phone' => '+447474439825',
            'email' => 'Phytosciencewellness7@gmail.com',
            'hours' => 'Mon–Fri: 9:00 AM – 5:00 PM'
        ],
        [
            'country' => 'Malaysia (Global HQ)',
            'entity' => 'Phyto Science Sdn Bhd',
            'city' => 'Bandar Baru Bangi, Selangor',
            'address' => 'Wisma Phyto Science, PT 56935, Jalan 9/8, Seksyen 9, 43650 Bandar Baru Bangi, Selangor Darul Ehsan, Malaysia',
            'phone' => '+603 – 8923 1880',
            'email' => 'Phytosciencewellness7@gmail.com',
            'hours' => 'Mon–Thu: 9:30 AM – 7:00 PM (Fri–Sun: Closed)'
        ],
        [
            'country' => 'Singapore',
            'entity' => 'Trendmaker Pte Ltd',
            'city' => 'Singapore',
            'address' => '600 North Bridge Road #12-02/03 Parkview Square, Singapore 188778',
            'phone' => '+65 6291 1880',
            'hours' => 'Mon–Fri: 10:00 AM – 6:00 PM'
        ],
        [
            'country' => 'India',
            'entity' => 'Phyto Science India Pvt Ltd',
            'city' => 'Pune, Maharashtra',
            'address' => 'Primerose Mall, Office No. 21 & 25, 4th Floor, Baner Road, Pune 411045, Maharashtra, India',
            'phone' => '+91 8484 858191',
            'hours' => 'Mon–Sat: 9:30 AM – 6:30 PM'
        ],
        [
            'country' => 'Philippines',
            'entity' => 'Phytoscience Philippines Inc',
            'city' => 'Pasig City, Metro Manila',
            'address' => 'No. 1006, 10th Floor, Jollibee Centre Condominium, San Miguel Ave, San Antonio, Ortigas Centre, Pasig City',
            'phone' => '+63 2 8935 7826',
            'hours' => 'Mon–Fri: 9:30 AM – 6:00 PM'
        ],
        [
            'country' => 'Cameroon',
            'entity' => 'PhytoScience Trendmakers Ltd',
            'city' => 'Douala / Yaoundé',
            'address' => 'PhytoScience Cameroon Corporate Center, Douala, Cameroon',
            'phone' => '+237 6740 55292',
            'hours' => 'Mon–Sat: 9:00 AM – 5:00 PM'
        ],
        [
            'country' => 'Ivory Coast (Côte d\'Ivoire)',
            'entity' => 'Phytoscience Trend Makers CI',
            'city' => 'Abidjan',
            'address' => 'ANGRÉ Djorogobité 2, derrière Pharmacie Sainte Clémentine, Résidence MCK, 2ème étage, Porte 202, Abidjan',
            'phone' => '+225 27 22 29 85 37 / +225 07 97 01 11 90',
            'hours' => 'Mon–Fri: 8:30 AM – 5:30 PM'
        ],
        [
            'country' => 'Ghana',
            'entity' => 'Phytoscience Ghana Ltd',
            'city' => 'Accra',
            'address' => 'P.O. Box CT 9080, Cantonment Accra, Ghana',
            'phone' => '+233 202 051 792',
            'hours' => 'Mon–Fri: 9:00 AM – 5:00 PM'
        ],
        [
            'country' => 'Tanzania',
            'entity' => 'iPhyto Supplies Tanzania',
            'city' => 'Dar es Salaam',
            'address' => 'Mwenge-Bamaga Plot #36 Block 43 (Near Kebbys Hotel), Dar es Salaam',
            'phone' => '+255 783 678 435 / +255 712 294 734',
            'hours' => 'Mon–Sat: 9:00 AM – 5:00 PM'
        ],
        [
            'country' => 'Togo',
            'entity' => 'Phytoscience Trend Makers Ltd',
            'city' => 'Lomé',
            'address' => 'Lomé Casablanca, Above face Hôtel Todman, Lomé, Togo',
            'phone' => '+228 991 54343',
            'hours' => 'Mon–Sat: 9:00 AM – 5:00 PM'
        ],
        [
            'country' => 'Gabon',
            'entity' => 'Gabon Phyto Science Trend Makers Ltd',
            'city' => 'Libreville',
            'address' => 'Libreville B.P 10909, Gabon',
            'phone' => '+241 778 490 12',
            'hours' => 'Mon–Fri: 9:00 AM – 5:00 PM'
        ],
        [
            'country' => 'Namibia',
            'entity' => 'Namibia Phytoscience Trendmaker CC',
            'city' => 'Windhoek',
            'address' => 'Office No 221, BRB Building, Ausspannplatz, Windhoek, Namibia',
            'phone' => '+264 812 938 310',
            'hours' => 'Mon–Fri: 9:00 AM – 4:30 PM'
        ],
        [
            'country' => 'Burundi',
            'entity' => 'Phyto Science Burundi',
            'city' => 'Bujumbura',
            'address' => 'Avenue de la mission, Immeuble Agora Office 28D6, Bujumbura, Burundi',
            'phone' => '+257 77424 424',
            'hours' => 'Mon–Fri: 9:00 AM – 5:00 PM'
        ]
    ];
}

// Regional Corporate Hubs & International Business Centers
define('OFFICE_HUBS', get_business_centers_data());

/**
 * Verified Official Video Gallery Embeds
 */
function get_verified_videos(): array {
    return [
        [
            'id' => 'KVqWChK6fdI',
            'title' => 'Up Close & Personal With Dr. Fred Zülli',
            'category' => 'Science & Innovation',
            'duration' => 'Official Session',
            'description' => 'Dr. Fred Zülli, CEO of Mibelle Biochemistry Switzerland, shares scientific insights behind PhytoCellTec™ plant stem cell cultivation and cellular longevity.'
        ],
        [
            'id' => 'hSWI5_NXxWk',
            'title' => 'PhytoScience Official Corporate Overview',
            'category' => 'Company & Vision',
            'duration' => 'Corporate Video',
            'description' => 'The complete story of Phyto Science Sdn Bhd, our 4P Quadripartite model, and how we empower physical and financial wellness globally.'
        ],
        [
            'id' => 'b0pV9MrxnNk',
            'title' => 'Grand Recognition Event at Monkey Canopy Resort',
            'category' => 'Distributor Recognition',
            'duration' => 'Annual Gala',
            'description' => 'Celebrating the success, car achievements, and rank advancements of PhytoScience leaders from across the world.'
        ],
        [
            'id' => 'kY5t2OTxVPo',
            'title' => '10th Anniversary Aglittering Decade Grand Recognition',
            'category' => 'Milestones',
            'duration' => 'BACC Convention',
            'description' => 'A glittering decade of transformation held at Bangi Avenue Convention Centre, honoring top global leaders and Crown Ambassadors.'
        ],
        [
            'id' => 'HSqDO3Wz1Lw',
            'title' => 'PhytoScience Super Cars & Lifestyle Awards',
            'category' => 'Car & Lifestyle Rewards',
            'duration' => 'Car Fund Showcase',
            'description' => 'A look into the luxury lifestyle rewards and supercar incentives handed over to top-performing PhytoScience distributors.'
        ],
        [
            'id' => 'E0IaPc9CC4M',
            'title' => 'African Tour: Cameroon, Togo & Gabon Expansion',
            'category' => 'Global Expansion',
            'duration' => 'International Tour',
            'description' => 'Co-Founder and leadership delegation on tour across Central and West Africa, driving community growth and healthcare entrepreneurship.'
        ],
        [
            'id' => 'DnoJ6-e4xtE',
            'title' => 'Asia Success Award 2022 Ceremony',
            'category' => 'Industry Awards',
            'duration' => 'Award Highlights',
            'description' => 'Phyto Science honored at the Asia Success Awards for commercial leadership and product innovation in wellness direct-selling.'
        ],
        [
            'id' => 'SZJWXkLCeeQ',
            'title' => 'Holiday Incentive: Seoul Achievers Tour',
            'category' => 'Travel Incentives',
            'duration' => 'Incentive Travel',
            'description' => 'Qualified Phyto Science members enjoying a fully sponsored, luxury vacation experience in Seoul, South Korea.'
        ],
        [
            'id' => 'j_AgHotA_Ak',
            'title' => 'Holiday Incentive: Perth Australia Achievers Tour',
            'category' => 'Travel Incentives',
            'duration' => 'Incentive Travel',
            'description' => 'Exclusive overseas holiday incentive trip to Perth, Australia for qualifying leaders in the PhytoScience international team.'
        ]
    ];
}

