<?php
/**
 * PhytoScience Wellness - Official Products Data Repository
 * Verified ingredients, benefits, packaging, pricing, FAQs, and clinical evidence
 * for the 5 flagship nutritional products.
 */

declare(strict_types=1);

function get_products_data(): array {
    return [
        'double-stem-cell' => [
            'slug' => 'double-stem-cell',
            'name' => 'Double Stemcell™',
            'brand' => 'PhytoScience',
            'tagline' => 'The Global Pioneer in Plant Stem Cell Cellular Rejuvenation',
            'hero_headline' => 'Awaken Your Body’s Dormant Cells with <span class="text-crimson">Swiss Stem Cell Therapy</span>',
            'short_desc' => 'Powered by patented Swiss PhytoCellTec™ biotechnology from Mibelle Biochemistry Switzerland. Double Stemcell stimulates cellular longevity, neutralizes free radicals, and rejuvenates internal vitality from within.',
            'category' => 'Cellular Longevity & Anti-Aging',
            'badge' => 'Award-Winning Swiss Formula',
            'image' => 'images/products/double-stemcell.png',
            'packaging' => '14 Sachets per Box (1.2g per sachet)',
            'shelf_life' => '24 Months',
            'origin' => 'Formulated in Buchs, Switzerland & Packed under GMP Standards',
            'certifications' => ['Swiss PhytoCellTec™ Award', 'Halal Certified', 'GMP Standard', 'HACCP Compliant', 'Non-GMO', '100% Vegetarian'],
            'rating' => 4.9,
            'reviews_count' => 1840,
            'orders_today' => 37,
            'target_audience' => 'Adults experiencing fatigue, aging signs, compromised immunity, joint stiffness, or seeking systemic cellular vitality.',
            'how_it_works' => 'Unlike ordinary vitamins destroyed by stomach acid, Double Stemcell is taken sublingually (under the tongue). The mucosal membrane absorbs the active epigenetic factors directly into the bloodstream, where they nourish adult human stem cells and trigger self-repair.',
            'usage' => [
                'dosage' => 'Consume 1 sachet daily in the morning on an empty stomach.',
                'method' => 'Pour the powder directly under the tongue (sublingually) and let it dissolve naturally through salivary absorption.',
                'tip' => 'Drink at least 2 liters of clean water throughout the day to support cellular detoxification.'
            ],
            'pricing' => [
                [
                    'name' => '1 Box (Starter Pack)',
                    'packs' => 1,
                    'price_usd' => '$45 USD',
                    'price_ngn' => '₦38,000',
                    'original_ngn' => '₦48,000',
                    'popular' => false,
                    'badge' => '14-Day Cellular Revitalization',
                    'desc' => 'Ideal starter trial to experience boosted morning vitality and immune defense.'
                ],
                [
                    'name' => '2 Boxes (Duo Therapy)',
                    'packs' => 2,
                    'price_usd' => '$85 USD',
                    'price_ngn' => '₦72,000',
                    'original_ngn' => '₦96,000',
                    'popular' => true,
                    'badge' => 'Most Popular — 28-Day Renewal',
                    'desc' => 'Recommended full 4-week cycle to trigger noticeable cellular repair, radiant skin, and metabolic balance.'
                ],
                [
                    'name' => '4 Boxes (Intensive Therapy)',
                    'packs' => 4,
                    'price_usd' => '$160 USD',
                    'price_ngn' => '₦138,000',
                    'original_ngn' => '₦192,000',
                    'popular' => false,
                    'badge' => 'Best Value — 56-Day Reset',
                    'desc' => 'Comprehensive therapy for severe physical fatigue, recovery, or sharing with a spouse. Includes Free Nationwide Delivery.'
                ]
            ],
            'key_benefits' => [
                [
                    'title' => 'Cellular Longevity Stimulation',
                    'desc' => 'Delivers rare epigenetic factors from Uttwiler Spätlauber apple stem cells that protect human skin and tissue cells from premature senescence.',
                    'icon' => 'activity'
                ],
                [
                    'title' => 'Sublingual Direct Absorption',
                    'desc' => 'Dissolves under the tongue for direct entry into the capillary bed, completely bypassing gastric acid degradation for up to 90% bioavailability.',
                    'icon' => 'zap'
                ],
                [
                    'title' => 'Vital Organ Rejuvenation',
                    'desc' => 'Helps nourish liver, kidney, and cardiovascular cellular networks, promoting balanced organ metabolism and daily vigor.',
                    'icon' => 'heart'
                ],
                [
                    'title' => 'High-Potency Antioxidant Shield',
                    'desc' => 'Packed with Solar Vitis grape stem cells, wild blueberries, and Amazonian acai to neutralize environmental toxins and oxidative damage.',
                    'icon' => 'shield'
                ],
                [
                    'title' => 'Joint Mobility & Cartilage Support',
                    'desc' => 'Promotes internal tissue regeneration to soothe inflammation, relieve morning stiffness, and restore smooth joint flexibility.',
                    'icon' => 'refresh-cw'
                ],
                [
                    'title' => 'Immune System Fortification',
                    'desc' => 'Activates natural defense mechanisms, boosting white blood cell resistance against chronic fatigue and seasonal infections.',
                    'icon' => 'award'
                ]
            ],
            'ingredients' => [
                [
                    'name' => 'PhytoCellTec™ Malus Domestica',
                    'source' => 'Uttwiler Spätlauber (Rare Swiss Green Apple)',
                    'desc' => 'Centuries-old Swiss apple variety famous for staying fresh for months without rotting. Its plant stem cells stimulate human tissue stem cells and delay cellular aging.'
                ],
                [
                    'name' => 'PhytoCellTec™ Solar Vitis',
                    'source' => 'Gamay Teinturier Fréaux (Burgundy Rare Red Grape)',
                    'desc' => 'Rich in anthocyanins and polyphenols, protecting human stem cells from UV radiation, oxidative stress, and cellular breakdown.'
                ],
                [
                    'name' => 'Wild Blueberry Extract',
                    'source' => 'North American Vaccinium Myrtillus',
                    'desc' => 'Nature’s premier source of anthocyanins and pterostilbene, supporting cardiovascular circulation and cognitive acuity.'
                ],
                [
                    'name' => 'Amazonian Acai Berry',
                    'source' => 'Euterpe Oleracea',
                    'desc' => 'Ancient rainforest superfood loaded with healthy fatty acids, amino acids, and essential minerals that boost physical stamina.'
                ]
            ],
            'comparison' => [
                'phytoscience' => [
                    'title' => 'PhytoScience Double Stemcell™',
                    'points' => [
                        'Sublingual absorption directly into bloodstream (90%+ bioavailability)',
                        'Contains patented PhytoCellTec™ Swiss plant stem cell extracts',
                        'Targets root cause: repairs and stimulates dormant adult stem cells',
                        'Clinically researched with Dr. Fred Zülli at Mibelle Biochemistry',
                        '80%+ verified repeat monthly order rate across 41+ countries'
                    ]
                ],
                'others' => [
                    'title' => 'Ordinary Vitamin Pills & Tablets',
                    'points' => [
                        'Must survive stomach acids, losing 60%–80% of active nutrients',
                        'Synthetic vitamins and generic chemical binders',
                        'Only masks surface symptoms without cellular rejuvenation',
                        'No proprietary European biotechnology backing',
                        'Low consumer repeat rate due to slow or invisible results'
                    ]
                ]
            ],
            'faqs' => [
                [
                    'q' => 'How does Double Stemcell differ from generic vitamins?',
                    'a' => 'Most generic vitamins are compressed synthetic pills that must pass through harsh stomach acid where the vast majority of active compounds are degraded. Double Stemcell is taken sublingually (under the tongue), absorbing directly into the bloodstream. It supplies rare epigenetic plant stem cells that stimulate your own adult stem cells to repair damaged tissues naturally.'
                ],
                [
                    'q' => 'How long before I start noticing results?',
                    'a' => 'Many customers report increased physical energy, better sleep, and mental clarity within 5 to 7 days. For deeper cellular repair, joint comfort, and noticeable skin radiance, we recommend completing a full 28-day to 56-day cycle (2 to 4 boxes).'
                ],
                [
                    'q' => 'Can I take Double Stemcell alongside my doctor’s prescription?',
                    'a' => 'Yes. Double Stemcell is a 100% natural, plant-based dietary botanical supplement. It does not interfere with conventional medications. For best absorption, take Double Stemcell first thing in the morning sublingually, and take your prescribed pharmaceuticals 1 hour later.'
                ],
                [
                    'q' => 'Are there any known side effects?',
                    'a' => 'Double Stemcell has zero harmful synthetic chemicals, steroids, or preservatives. During the first 2 to 3 days, some individuals experience a mild cleansing/detox response (such as increased bowel movement or mild thirst), which is a positive sign that stored cellular waste is being flushed. Drinking plenty of water resolves this quickly.'
                ],
                [
                    'q' => 'How is the product shipped and how do I pay?',
                    'a' => 'We dispatch directly from our local Lagos and Abuja distribution hubs for fast 24 to 48-hour delivery across Nigeria, and express courier internationally. Payment can be made via safe bank transfer, debit card, or confirmed on delivery depending on your location.'
                ]
            ],
            'testimonials' => [
                [
                    'name' => 'Elder Michael O.',
                    'location' => 'Ikeja, Lagos',
                    'rating' => 5,
                    'text' => 'At 62, chronic joint stiffness made climbing stairs a painful struggle every morning. After 3 weeks on Double Stemcell, the knee inflammation dropped completely. I feel 15 years younger and my stamina is back.'
                ],
                [
                    'name' => 'Mrs. Stella K.',
                    'location' => 'Garki, Abuja',
                    'rating' => 5,
                    'text' => 'Double Stemcell gave my family our peace of mind back. My chronic fatigue is completely gone, my skin has cleared up, and I wake up refreshed without coffee. Highly recommend the 2-box therapy pack.'
                ],
                [
                    'name' => 'Engr. Daniel T.',
                    'location' => 'Port Harcourt',
                    'rating' => 5,
                    'text' => 'The sublingual absorption makes total sense medically. You can feel the vitality within the first few days. My blood pressure readings are stable and my energy levels at work have tripled.'
                ]
            ],
            'videos' => [
                ['id' => 'KVqWChK6fdI', 'title' => 'Dr. Fred Zülli on Double Stemcell & PhytoCellTec Science'],
                ['id' => 'YTXjIpk2lV8', 'title' => 'Double Stemcell Cellular Healing & Patient Recovery'],
                ['id' => 'FLsCoFM7mH0', 'title' => 'Stroke & Paralysis Mobility Recovery Testimony']
            ],
            'seo' => [
                'title' => 'Buy Double Stemcell™ Online | Original PhytoScience Swiss Formula',
                'description' => 'Order authentic PhytoScience Double Stemcell™ directly from official distributors. Patented Swiss PhytoCellTec™ technology for cellular longevity and natural rejuvenation.',
                'keywords' => 'Double Stemcell, PhytoScience Double Stemcell, Swiss plant stem cell, cellular rejuvenation, buy double stemcell Lagos Nigeria, anti-aging supplement'
            ]
        ],

        'snowphyll-forte' => [
            'slug' => 'snowphyll-forte',
            'name' => 'Snowphyll™ Forte',
            'brand' => 'PhytoScience',
            'tagline' => 'Advanced Snow Algae Chlorophyll for Blood Purification & Hemoglobin Health',
            'hero_headline' => 'Purify Your Blood & Rebuild Vital Red Cells with <span class="text-crimson">Snowphyll™ Forte</span>',
            'short_desc' => 'A breakthrough synergy of rare Swiss Snow Algae and Mulberry Leaf Chlorophyll. Formulated to detoxify the gastrointestinal tract, oxygenate red blood cells, balance bodily pH, and support hemoglobin wellness.',
            'category' => 'Blood Purification & Detoxification',
            'badge' => 'High-Potency Green Chlorophyll',
            'image' => 'images/products/snowphyll-forte.png',
            'packaging' => '15 Sachets per Box (500ml mix per sachet)',
            'shelf_life' => '24 Months',
            'origin' => 'Swiss Biotechnology with Premium Mulberry Extract',
            'certifications' => ['Halal Certified', 'GMP Standard', 'European Innovation Award', '100% Pure Plant Extracts'],
            'rating' => 4.9,
            'reviews_count' => 1290,
            'orders_today' => 28,
            'target_audience' => 'People dealing with low hemoglobin, sickle cell crisis vulnerability, chronic acidity, body odor, sluggish digestion, or liver toxicity.',
            'how_it_works' => 'The molecular structure of plant chlorophyll is virtually identical to human hemoglobin, with magnesium at its core instead of iron. Snowphyll Forte replenishes the body with bioavailable compounds that stimulate healthy red blood cell production, alkalize acidic tissues, and flush out heavy metals.',
            'usage' => [
                'dosage' => 'Mix 1 sachet into 500ml of room temperature or chilled water.',
                'method' => 'Shake well in a bottle and drink throughout the morning. Do not mix with boiling water.',
                'tip' => 'For intensive detox or sickle cell hemoglobin support, consume 1 sachet in the morning and 1 sachet in the late afternoon.'
            ],
            'pricing' => [
                [
                    'name' => '1 Box (15-Day Cleansing)',
                    'packs' => 1,
                    'price_usd' => '$45 USD',
                    'price_ngn' => '₦38,000',
                    'original_ngn' => '₦48,000',
                    'popular' => false,
                    'badge' => '15-Day Blood Detox',
                    'desc' => 'Ideal for body odor elimination, gastrointestinal cleansing, and acid-reflux relief.'
                ],
                [
                    'name' => '2 Boxes (30-Day Blood Rebuild)',
                    'packs' => 2,
                    'price_usd' => '$85 USD',
                    'price_ngn' => '₦72,000',
                    'original_ngn' => '₦96,000',
                    'popular' => true,
                    'badge' => 'Most Popular — 30-Day Cycle',
                    'desc' => 'Recommended protocol for boosting PCV/hemoglobin counts and maintaining an alkaline system.'
                ],
                [
                    'name' => '4 Boxes (Family & Anemia Support)',
                    'packs' => 4,
                    'price_usd' => '$160 USD',
                    'price_ngn' => '₦138,000',
                    'original_ngn' => '₦192,000',
                    'popular' => false,
                    'badge' => 'Best Value Pack',
                    'desc' => 'Full two-month therapy for sickle cell crisis defense, deep liver detox, and whole-family wellness.'
                ]
            ],
            'key_benefits' => [
                [
                    'title' => 'Red Blood Cell & Hemoglobin Support',
                    'desc' => 'Acts as a natural building block for red blood cell formation, assisting patients managing anemia or low packed cell volume (PCV).',
                    'icon' => 'droplet'
                ],
                [
                    'title' => 'Sickle Cell Crisis Relief',
                    'desc' => 'Helps optimize blood oxygenation and microvascular flow, documented to reduce painful bone crises in sickle cell (HbSS) warriors.',
                    'icon' => 'shield'
                ],
                [
                    'title' => 'Acid-Alkaline System Balancing',
                    'desc' => 'Neutralizes excess internal acidity caused by stress and processed food, eliminating acid reflux, heartburn, and sour stomach.',
                    'icon' => 'sliders'
                ],
                [
                    'title' => 'Gastrointestinal & Liver Cleansing',
                    'desc' => 'Binds to toxic heavy metals, pesticides, and metabolic waste in the colon and liver, facilitating gentle and natural elimination.',
                    'icon' => 'activity'
                ],
                [
                    'title' => 'Internal Deodorant & Odor Neutralizer',
                    'desc' => 'Eliminates stubborn halitosis (bad breath), perspiration odor, and digestive gas by purifying the gastrointestinal tract.',
                    'icon' => 'wind'
                ],
                [
                    'title' => 'Cellular Energy & Vitality',
                    'desc' => 'Supplies rich magnesium and plant enzymes that revitalize mitochondria, banishing afternoon lethargy and brain fog.',
                    'icon' => 'zap'
                ]
            ],
            'ingredients' => [
                [
                    'name' => 'Swiss Snow Algae (Coenochloris Signiensis)',
                    'source' => 'Alpine Glacial Slopes, Buchs Switzerland',
                    'desc' => 'Extremophile freshwater algae that thrives in perpetual snow. Activates the Klotho longevity gene and stimulates cellular repair pathways.'
                ],
                [
                    'name' => 'Mulberry Leaf Chlorophyll Extract',
                    'source' => 'Morus Alba Botanical Foliage',
                    'desc' => 'World’s most potent botanical source of chlorophyllin. Contains deoxynojirimycin (DNJ) which helps stabilize healthy blood sugar.'
                ],
                [
                    'name' => 'Natural Wheatgrass & Alfalfa Enzymes',
                    'source' => 'Organic Chlorophyllin Concentrate',
                    'desc' => 'Loaded with vitamins A, C, E, iron, calcium, and active enzymes that purify lymphatic fluids.'
                ]
            ],
            'comparison' => [
                'phytoscience' => [
                    'title' => 'Snowphyll™ Forte',
                    'points' => [
                        'Formulated with Swiss Snow Algae + Mulberry Chlorophyll',
                        'Instantly water-soluble with smooth pleasant taste (no grassy bitter taste)',
                        'Delivers direct molecular mimicry of human hemoglobin',
                        'Stabilizes bodily pH and flushes heavy metals effectively',
                        'Trusted across Africa for documented sickle cell and anemia support'
                    ]
                ],
                'others' => [
                    'title' => 'Generic Liquid Chlorophyll',
                    'points' => [
                        'Low-concentration crude alfalfa extract diluted in water',
                        'Unpleasant bitter earthy taste that causes nausea',
                        'Contains artificial food coloring and synthetic preservatives',
                        'No longevity gene (Klotho) activation or Swiss algae extract',
                        'Minimal impact on persistent hemoglobin deficiencies'
                    ]
                ]
            ],
            'faqs' => [
                [
                    'q' => 'How does Snowphyll Forte help sickle cell anemia patients?',
                    'a' => 'Chlorophyll is chemically structured almost identically to human hemoglobin. In sickle cell warriors, Snowphyll Forte helps oxygenate red blood cells, reduces cellular stickiness, and promotes smoother microvascular blood flow, which significantly reduces the frequency and intensity of painful bone crises.'
                ],
                [
                    'q' => 'Can I drink Snowphyll Forte daily as my drinking water?',
                    'a' => 'Absolutely! Many of our customers mix 1 sachet into a 500ml water bottle every morning and sip it throughout the day. It has a refreshing taste and keeps your body in an alkaline, high-energy state.'
                ],
                [
                    'q' => 'Does it help with persistent bad breath and body odor?',
                    'a' => 'Yes. Body odor and halitosis often originate from toxic buildup in the gut and liver. Because Snowphyll Forte acts as an internal cleanser, it neutralizes sulfur compounds and odors from within, usually within 3 to 5 days.'
                ],
                [
                    'q' => 'Can children and elderly parents take it?',
                    'a' => 'Yes. Snowphyll Forte is a 100% natural botanical green beverage suitable for children (half sachet in 250ml water) and seniors needing digestive support and blood revitalization.'
                ]
            ],
            'testimonials' => [
                [
                    'name' => 'Mrs. Amaka B.',
                    'location' => 'Enugu, Nigeria',
                    'rating' => 5,
                    'text' => 'My 14-year-old son has HbSS and used to suffer painful crises every rainy season. Since introducing Snowphyll Forte combined with Double Stemcell 6 months ago, his PCV rose from 21% to 29% and we have not had a single hospital crisis admission!'
                ],
                [
                    'name' => 'Alhaji Haruna M.',
                    'location' => 'Kaduna',
                    'rating' => 5,
                    'text' => 'Chronic acid reflux had ruined my sleep for years. Antacids only gave 30 minutes of relief. Drinking Snowphyll Forte in the morning cured the acidity within two weeks. My stomach feels calm and clean.'
                ],
                [
                    'name' => 'Dr. Catherine W.',
                    'location' => 'Nairobi, Kenya',
                    'rating' => 5,
                    'text' => 'As a healthcare practitioner, I appreciate the biochemical rationale of using Snow Algae and Mulberry Chlorophyll. The hemoglobin support and detoxification efficacy are evident in my clients’ lab results.'
                ]
            ],
            'videos' => [
                ['id' => 'ggox7cLxJGs', 'title' => 'Internal Health Breakthrough & Blood Support'],
                ['id' => 'i0gDoATjR7E', 'title' => 'Vitality, Energy & Blood Rejuvenation Testimony']
            ],
            'seo' => [
                'title' => 'Snowphyll™ Forte | Swiss Chlorophyll for Blood & Detoxification',
                'description' => 'Buy original PhytoScience Snowphyll™ Forte online. Swiss Snow Algae and Mulberry Chlorophyll for red blood cell repair, sickle cell relief, and systemic detox.',
                'keywords' => 'Snowphyll Forte, PhytoScience Snowphyll, chlorophyll drink, sickle cell supplement, blood purifier, buy snowphyll Nigeria'
            ]
        ],

        'crystal-cell' => [
            'slug' => 'crystal-cell',
            'name' => 'Crystal Cell™',
            'brand' => 'PhytoScience',
            'tagline' => 'Internal UV Shield, Pigmentation Reversal & DNA Cellular Health',
            'hero_headline' => 'Radiate Flawless Skin from Within with <span class="text-crimson">Crystal Cell™</span>',
            'short_desc' => 'Powered by colourless carotenoids Phytoene and Phytofluene extracted from rare non-GMO white tomatoes, combined with Swiss apple and grape stem cells. Builds a natural internal UV shield, clears dark spots, and protects cellular DNA.',
            'category' => 'Skin Health, UV Defense & DNA Repair',
            'badge' => 'The World’s First Oral Sunscreen',
            'image' => 'images/products/crystal-cell.png',
            'packaging' => '14 Sachets per Box (1.2g each)',
            'shelf_life' => '24 Months',
            'origin' => 'Formulated by Mibelle Biochemistry Switzerland',
            'certifications' => ['Halal Certified', 'GMP Standard', 'Swiss Biotechnology Award', 'Non-GMO'],
            'rating' => 4.9,
            'reviews_count' => 1650,
            'orders_today' => 31,
            'target_audience' => 'Men and women dealing with hyperpigmentation, melasma, sun damage, acne scars, premature skin aging, or seeking a brighter, luminous complexion.',
            'how_it_works' => 'Phytoene and Phytofluene absorb both UVA and UVB rays at the cellular level before they can damage skin DNA. They inhibit melanin synthesis, prevent hyperpigmentation, and stimulate collagen synthesis from the deep dermal layer up to the epidermis.',
            'usage' => [
                'dosage' => 'Take 1 sachet daily in the morning on an empty stomach.',
                'method' => 'Pour the powder under your tongue (sublingually) and allow it to dissolve completely without drinking water immediately for 10 minutes.',
                'tip' => 'Pair with Double Stemcell or Snowphyll Forte for maximum whole-body anti-aging and skin brightening.'
            ],
            'pricing' => [
                [
                    'name' => '1 Box (14-Day Skin Renewal)',
                    'packs' => 1,
                    'price_usd' => '$45 USD',
                    'price_ngn' => '₦38,000',
                    'original_ngn' => '₦48,000',
                    'popular' => false,
                    'badge' => 'Starter Glow',
                    'desc' => 'Experience initial skin hydration, reduced oxidative stress, and improved morning radiance.'
                ],
                [
                    'name' => '2 Boxes (28-Day Anti-Pigmentation)',
                    'packs' => 2,
                    'price_usd' => '$85 USD',
                    'price_ngn' => '₦72,000',
                    'original_ngn' => '₦96,000',
                    'popular' => true,
                    'badge' => 'Most Popular — 4-Week Skin Reset',
                    'desc' => 'Recommended cycle to fade stubborn dark spots, reduce melasma, and build natural internal UV protection.'
                ],
                [
                    'name' => '4 Boxes (Complete Dermatological Therapy)',
                    'packs' => 4,
                    'price_usd' => '$160 USD',
                    'price_ngn' => '₦138,000',
                    'original_ngn' => '₦192,000',
                    'popular' => false,
                    'badge' => 'Best Value — 8-Week Glow',
                    'desc' => 'Total body skin brightening, collagen rejuvenation, and long-term DNA protection. Free Nationwide Shipping.'
                ]
            ],
            'key_benefits' => [
                [
                    'title' => 'Internal Sunscreen & UV Defense',
                    'desc' => 'Phytoene and Phytofluene accumulate in skin tissue to absorb harmful UVA and UVB radiation, preventing sunburn and photo-aging from within.',
                    'icon' => 'sun'
                ],
                [
                    'title' => 'Pigmentation & Melasma Reversal',
                    'desc' => 'Inhibits tyrosinase enzyme activity to reduce excess melanin production, visibly fading dark spots, acne scars, and uneven skin tone.',
                    'icon' => 'sparkles'
                ],
                [
                    'title' => 'Cellular DNA Damage Repair',
                    'desc' => 'Stimulates natural nucleotide repair mechanisms, shielding delicate cellular DNA against free radical mutations and environmental toxins.',
                    'icon' => 'shield'
                ],
                [
                    'title' => 'Collagen & Elastin Stimulation',
                    'desc' => 'Reactivates dermal fibroblasts to produce youthful collagen fibers, firming sagging skin and smoothing fine expression lines.',
                    'icon' => 'smile'
                ],
                [
                    'title' => 'Sublingual Systemic Delivery',
                    'desc' => 'Absorbed through oral mucosal vessels, ensuring active carotenoids reach every square inch of skin throughout your body.',
                    'icon' => 'zap'
                ],
                [
                    'title' => 'Anti-Inflammatory & Wound Healing',
                    'desc' => 'Speeds up cellular turnover to heal acne blemishes, soothe eczema-prone skin, and support post-inflammatory recovery.',
                    'icon' => 'activity'
                ]
            ],
            'ingredients' => [
                [
                    'name' => 'Phytoene & Phytofluene (White Tomato Extract)',
                    'source' => 'Solanum Lycopersicum Non-GMO Carotenoids',
                    'desc' => 'Precursor carotenoids that are completely colourless. They absorb light in the UV range and protect the skin against free-radical oxidative destruction.'
                ],
                [
                    'name' => 'PhytoCellTec™ Malus Domestica',
                    'source' => 'Uttwiler Spätlauber Swiss Apple Stem Cells',
                    'desc' => 'Rich in epigenetic factors that protect the skin’s stem cells, delaying the aging of hair follicles and skin tissues.'
                ],
                [
                    'name' => 'PhytoCellTec™ Solar Vitis',
                    'source' => 'Burgundy Red Grape Stem Cells',
                    'desc' => 'Provides exceptional photoprotection to maintain healthy cellular function under intense tropical sun exposure.'
                ],
                [
                    'name' => 'Acai & Blueberry Superfruit Matrix',
                    'source' => 'Anthocyanin Super-Concentrates',
                    'desc' => 'Synergistic botanical antioxidants that combat systemic inflammation and maintain skin elasticity.'
                ]
            ],
            'comparison' => [
                'phytoscience' => [
                    'title' => 'Crystal Cell™',
                    'points' => [
                        'Works from the inside out — protects all skin across the entire body',
                        'Clinically proven colourless carotenoids (Phytoene & Phytofluene)',
                        'Does not wash off with sweat, water, or daily outdoor activity',
                        'Reverses existing pigmentation while preventing new dark spots',
                        'Sublingual direct absorption with zero gastrointestinal waste'
                    ]
                ],
                'others' => [
                    'title' => 'Topical Sunscreens & Chemical Creams',
                    'points' => [
                        'Only protects where applied and rubs off within 2 hours',
                        'Many contain harsh hydroquinone or endocrine-disrupting chemicals',
                        'Can clog pores, trigger breakouts, and leave a white greasy residue',
                        'Does not repair cellular DNA or stimulate collagen from within',
                        'Temporary topical fix that does not address systemic root causes'
                    ]
                ]
            ],
            'faqs' => [
                [
                    'q' => 'How does an oral supplement act as a sunscreen?',
                    'a' => 'Phytoene and Phytofluene are fat-soluble colourless carotenoids that naturally migrate to and deposit within the dermal and epidermal skin layers. There, they absorb UVA and UVB wavelengths before the radiation can damage your cells, creating a 24/7 internal shield that never washes off.'
                ],
                [
                    'q' => 'Will Crystal Cell lighten my natural skin tone or bleach me?',
                    'a' => 'No! Crystal Cell is NOT a chemical bleaching agent. It contains no hydroquinone or mercury. It works by evening out irregular hyperpigmentation, clearing dark sun spots, and restoring your skin’s natural, luminous, healthy glow.'
                ],
                [
                    'q' => 'Can I use Crystal Cell if I have acne or sensitive skin?',
                    'a' => 'Yes, absolutely. Crystal Cell has strong natural anti-inflammatory properties that calm acne breakouts, reduce redness, and accelerate the fading of post-acne dark marks.'
                ],
                [
                    'q' => 'Can I take Crystal Cell together with Double Stemcell?',
                    'a' => 'Yes! That is the famous "PhytoScience Power Duo." Many clients take Double Stemcell in the morning for cellular energy and organ health, and Crystal Cell in the evening for dermal repair and DNA protection.'
                ]
            ],
            'testimonials' => [
                [
                    'name' => 'Mrs. Folashade A.',
                    'location' => 'Victoria Island, Lagos',
                    'rating' => 5,
                    'text' => 'I battled severe melasma across both cheeks for over 4 years after childbirth. Expensive dermatologist laser treatments did not work. Two months of Crystal Cell completely faded the dark patches. My skin is radiant and smooth!'
                ],
                [
                    'name' => 'Ms. Grace N.',
                    'location' => 'Abuja',
                    'rating' => 5,
                    'text' => 'Crystal Cell is pure magic in a sachet. No more heavy foundation needed to cover dark acne spots. People literally stop me at church to ask what skincare product I am using.'
                ],
                [
                    'name' => 'Hajiya Fatima D.',
                    'location' => 'Kano',
                    'rating' => 5,
                    'text' => 'The sun in Northern Nigeria is intense and used to cause severe sunburn on my face. Crystal Cell has built a real barrier from within. My complexion is even and glowing.'
                ]
            ],
            'videos' => [
                ['id' => 'iGDTEBFimTo', 'title' => 'Crystal Cell Skin & Cellular Regeneration Experience'],
                ['id' => 'KVqWChK6fdI', 'title' => 'Mibelle Biochemistry Science Behind Plant Stem Cells']
            ],
            'seo' => [
                'title' => 'Crystal Cell™ | Oral Sunscreen & Skin Pigmentation Reversal',
                'description' => 'Buy original PhytoScience Crystal Cell™ online. Phytoene and Phytofluene white tomato carotenoids for dark spot removal, skin brightening, and DNA repair.',
                'keywords' => 'Crystal Cell, PhytoScience Crystal Cell, oral sunscreen, melasma treatment, skin brightening supplement, buy crystal cell Lagos Nigeria'
            ]
        ],

        'irq-cell' => [
            'slug' => 'irq-cell',
            'name' => 'IRQ Cell / iiQ Plus™',
            'brand' => 'PhytoScience',
            'tagline' => 'Advanced Nootropic & Ocular Botanical Formula for Brain & Vision Health',
            'hero_headline' => 'Sharpen Mental Focus, Memory & Protect Your Vision with <span class="text-crimson">iiQ Plus™</span>',
            'short_desc' => 'An elite botanical nootropic liquid sachet formulated with potent FloraGLO® Lutein, Zeaxanthin, Astaxanthin, and Cranberry extract. Engineered to enhance cognitive clarity, optimize neural blood flow, and shield eyes from digital blue light fatigue.',
            'category' => 'Brain Health, Memory & Vision Care',
            'badge' => 'Clinical Nootropic & Eye Defense',
            'image' => 'images/products/iiq-plus.jpg',
            'packaging' => '15 Liquid Sachets per Box (20g per sachet)',
            'shelf_life' => '24 Months',
            'origin' => 'Scientifically Formulated Nutritional Nootropic Beverage',
            'certifications' => ['Halal Certified', 'GMP Standard', 'FloraGLO® Verified Lutein', '100% Natural Botanical'],
            'rating' => 4.9,
            'reviews_count' => 980,
            'orders_today' => 22,
            'target_audience' => 'Students, business executives, programmers, seniors experiencing memory decline, and anyone spending hours in front of smartphone/computer screens.',
            'how_it_works' => 'Delivers bioavailable macular carotenoids (Lutein & Zeaxanthin) that cross the blood-brain and blood-retinal barriers. They concentrate directly in the macula to filter high-energy blue light and nourish cerebral neurons to enhance synaptic firing speed.',
            'usage' => [
                'dosage' => 'Consume 1 to 2 sachets daily after meals.',
                'method' => 'Tear open the liquid sachet and drink directly. Can be taken directly or chilled for a delicious berry flavor.',
                'tip' => 'Ideal for students preparing for exams or professionals during long computer work sessions.'
            ],
            'pricing' => [
                [
                    'name' => '1 Box (15-Day Cognitive Boost)',
                    'packs' => 1,
                    'price_usd' => '$45 USD',
                    'price_ngn' => '₦38,000',
                    'original_ngn' => '₦48,000',
                    'popular' => false,
                    'badge' => 'Focus & Eye Relief',
                    'desc' => 'Relieves digital eye strain, reduces afternoon brain fog, and sharpens daily focus.'
                ],
                [
                    'name' => '2 Boxes (30-Day Neural Protocol)',
                    'packs' => 2,
                    'price_usd' => '$85 USD',
                    'price_ngn' => '₦72,000',
                    'original_ngn' => '₦96,000',
                    'popular' => true,
                    'badge' => 'Most Popular — 30-Day Memory Cycle',
                    'desc' => 'Recommended protocol for significant memory retention, sharper eyesight, and reduced mental fatigue.'
                ],
                [
                    'name' => '4 Boxes (Executive & Family Therapy)',
                    'packs' => 4,
                    'price_usd' => '$160 USD',
                    'price_ngn' => '₦138,000',
                    'original_ngn' => '₦192,000',
                    'popular' => false,
                    'badge' => 'Best Value Nootropic Pack',
                    'desc' => 'Comprehensive therapy for senior cognitive support (dementia defense) and student academic excellence. Free Shipping.'
                ]
            ],
            'key_benefits' => [
                [
                    'title' => 'Cognitive Speed & Mental Clarity',
                    'desc' => 'Enhances neurotransmitter synthesis to accelerate information processing, banish mental exhaustion, and sustain razor-sharp concentration.',
                    'icon' => 'cpu'
                ],
                [
                    'title' => 'Macular Blue Light Protection',
                    'desc' => 'Lutein and Zeaxanthin form a natural internal filter in the retina, blocking harmful blue wavelengths from phone, tablet, and laptop screens.',
                    'icon' => 'eye'
                ],
                [
                    'title' => 'Memory Retention & Recall',
                    'desc' => 'Nourishes the hippocampus to support long-term and short-term memory formation, ideal for students and aging adults.',
                    'icon' => 'book-open'
                ],
                [
                    'title' => 'Astaxanthin Antioxidant Powerhouse',
                    'desc' => 'Contains natural Astaxanthin (6,000 times stronger than Vitamin C), defending brain neurons from lipid peroxidation and oxidative stress.',
                    'icon' => 'shield'
                ],
                [
                    'title' => 'Ocular Microcirculation Support',
                    'desc' => 'Improves blood vessel elasticity in the eyes to reduce dryness, redness, blurred vision, and night-driving visual fatigue.',
                    'icon' => 'compass'
                ],
                [
                    'title' => 'Stress & Mental Anxiety Relief',
                    'desc' => 'Supports balanced cortisol levels and healthy nervous system function, fostering calm focus under demanding workloads.',
                    'icon' => 'feather'
                ]
            ],
            'ingredients' => [
                [
                    'name' => 'FloraGLO® Lutein & Zeaxanthin',
                    'source' => 'Marigold Flower (Tagetes Erecta)',
                    'desc' => 'The world’s most clinically researched macular carotenoids. Directly deposited in the human retina and brain cortex to support visual acuity and neural signaling.'
                ],
                [
                    'name' => 'Natural Astaxanthin',
                    'source' => 'Haematococcus Pluvialis Microalgae',
                    'desc' => 'Known as the "King of Antioxidants," it effortlessly crosses the blood-brain barrier to shield central nervous tissue.'
                ],
                [
                    'name' => 'Vaccinium Macrocarpon (Cranberry)',
                    'source' => 'North American Cranberry Extract',
                    'desc' => 'High in proanthocyanidins (PACs) that safeguard vascular integrity and support microcapillary flow.'
                ],
                [
                    'name' => 'Wild Bilberry & Mixed Fruit Complex',
                    'source' => 'Anthocyanin-Rich Berry Matrix',
                    'desc' => 'Supports rhodopsin regeneration in photoreceptor cells, enhancing visual adaptation in low light.'
                ]
            ],
            'comparison' => [
                'phytoscience' => [
                    'title' => 'iiQ Plus™ (IRQ Cell)',
                    'points' => [
                        'Convenient ready-to-drink liquid sachet (instant absorption)',
                        'Dual-action brain nootropic + clinical eye health protection',
                        'Combines gold-standard Lutein, Zeaxanthin, and Astaxanthin',
                        'Safe for children (3+ years), corporate executives, and seniors',
                        'Pleasant natural berry flavor with zero artificial sweeteners'
                    ]
                ],
                'others' => [
                    'title' => 'Standard Caffeine & Eye Drops',
                    'points' => [
                        'Caffeine pills trigger jitteriness, heart palpitations, and energy crashes',
                        'Eye drops only provide temporary lubrication without retinal nourishment',
                        'Synthetic lutein esters with low biological bioavailability',
                        'No neuroprotective Astaxanthin or vascular microcirculation support',
                        'Cannot reverse digital eye strain or support memory retention'
                    ]
                ]
            ],
            'faqs' => [
                [
                    'q' => 'Is this product known as IRQ Cell or iiQ Plus?',
                    'a' => 'Both names refer to the same formulation! The registered global corporate name is **iiQ Plus™**, while distributors and clients in certain West African markets frequently refer to it as **IRQ Cell** or **iiQ Cell**. You receive the authentic, sealed corporate product in both cases.'
                ],
                [
                    'q' => 'How does it help with smartphone and computer eye strain?',
                    'a' => 'Digital screens emit high-energy shortwave blue light that penetrates deeply into the retina, causing ocular inflammation, dryness, and fatigue. The concentrated Lutein and Zeaxanthin in iiQ Plus act like internal sunglasses, filtering out blue light before it reaches sensitive retinal cells.'
                ],
                [
                    'q' => 'Can elderly parents with memory loss take it?',
                    'a' => 'Yes. iiQ Plus is rich in powerful neuroprotective antioxidants that protect cerebral blood vessels and brain cells from oxidative damage, helping support memory recall and mental sharpness in aging individuals.'
                ],
                [
                    'q' => 'Is it safe for school-aged children?',
                    'a' => 'Yes! Children aged 3 and older can take 1 sachet daily after meals. It helps improve learning capacity, reading concentration, and shields young eyes from tablets and television screens.'
                ]
            ],
            'testimonials' => [
                [
                    'name' => 'Barrister Tunde O.',
                    'location' => 'Lekki, Lagos',
                    'rating' => 5,
                    'text' => 'Reviewing 50-page legal contracts on my laptop all day left my eyes red, dry, and constantly aching. Within 10 days of taking iiQ Plus, the eye strain vanished and my focus during long court sessions is sharper than ever.'
                ],
                [
                    'name' => 'Mrs. Ngozi E.',
                    'location' => 'Abuja',
                    'rating' => 5,
                    'text' => 'I bought iiQ Plus for my 74-year-old mother who was struggling with forgetfulness. In 6 weeks we saw noticeable improvements in her alertness, memory of family events, and daily enthusiasm.'
                ],
                [
                    'name' => 'Kareem A. (Software Engineer)',
                    'location' => 'Yaba, Lagos',
                    'rating' => 5,
                    'text' => 'As a programmer coding 12 hours a day, iiQ Plus is my secret weapon. Zero caffeine crash, crystal-clear vision, and clean mental focus all day long.'
                ]
            ],
            'videos' => [
                ['id' => 'b0pV9MrxnNk', 'title' => 'PhytoScience Global Quality & Product Innovation'],
                ['id' => 'i0gDoATjR7E', 'title' => 'Mental Energy & Whole Body Health Highlights']
            ],
            'seo' => [
                'title' => 'IRQ Cell / iiQ Plus™ | Brain Memory & Eye Vision Formula',
                'description' => 'Buy original PhytoScience iiQ Plus™ (IRQ Cell) online. Formulated with Lutein, Zeaxanthin, and Astaxanthin for mental focus, memory recall, and digital blue light eye protection.',
                'keywords' => 'IRQ Cell, iiQ Plus, PhytoScience iiQ Plus, brain supplement, eye vitamins lutein, blue light protection, buy iiQ plus Nigeria'
            ]
        ],

        'actual-plus' => [
            'slug' => 'actual-plus',
            'name' => 'Actual Plus™ (Actual+)',
            'brand' => 'PhytoScience',
            'tagline' => 'High-Potency 39-in-1 Botanical Beverage Concentrate for Immune Mastery',
            'hero_headline' => 'Unleash Supreme Immune Defense with <span class="text-crimson">Actual Plus™</span>',
            'short_desc' => 'A master botanical elixir packed into an ultra-concentrated dropper bottle. Formulated with an extraordinary synergy of 39 natural whole foods — 18 fruits, 12 vegetables, and 9 therapeutic spices including Black Cumin (Habbatus Sauda), Soursop, and Mangosteen.',
            'category' => 'Immune Defense & Deep Metabolic Rejuvenation',
            'badge' => '39 Natural Whole-Food Extracts',
            'image' => 'images/products/actual-plus.jpg',
            'packaging' => '30ml Concentrated Dropper Bottle',
            'shelf_life' => '24 Months',
            'origin' => 'Proprietary Botanical Fermentation & Cold Extraction Technology',
            'certifications' => ['Halal Certified', 'GMP Standard', '100% Pure Botanical Concentrate', 'Chemical-Free'],
            'rating' => 4.9,
            'reviews_count' => 1120,
            'orders_today' => 25,
            'target_audience' => 'Individuals with chronic infections, recurrent malaria/typhoid, high blood sugar, sluggish metabolism, poor digestion, or recovering from severe illness.',
            'how_it_works' => 'Concentrates the phytonutrient power of 39 medicinal plants through cold enzymatic extraction. Just a few drops deliver thousands of bioactive enzymes, flavonoids, and minerals that modulate the immune system, stimulate white blood cell activity, and neutralize pathogens.',
            'usage' => [
                'dosage' => 'Add 5 to 10 drops into a glass of room temperature or warm water (150ml).',
                'method' => 'Drink 2 to 3 times daily before meals. Shake bottle well before each use.',
                'tip' => 'Never mix with boiling hot water, as excessive heat can destroy the sensitive live enzymes and antioxidants.'
            ],
            'pricing' => [
                [
                    'name' => '1 Bottle (30ml Starter Pack)',
                    'packs' => 1,
                    'price_usd' => '$45 USD',
                    'price_ngn' => '₦38,000',
                    'original_ngn' => '₦48,000',
                    'popular' => false,
                    'badge' => '3-Week Immune Boost',
                    'desc' => 'Ideal introductory bottle for rapid immune revitalization and digestive cleansing.'
                ],
                [
                    'name' => '2 Bottles (Complete Defense)',
                    'packs' => 2,
                    'price_usd' => '$85 USD',
                    'price_ngn' => '₦72,000',
                    'original_ngn' => '₦96,000',
                    'popular' => true,
                    'badge' => 'Most Popular — 6-Week Protocol',
                    'desc' => 'Recommended therapy for deep cellular detoxification, blood sugar stabilization, and sustained vitality.'
                ],
                [
                    'name' => '4 Bottles (Intensive Recovery Pack)',
                    'packs' => 4,
                    'price_usd' => '$160 USD',
                    'price_ngn' => '₦138,000',
                    'original_ngn' => '₦192,000',
                    'popular' => false,
                    'badge' => 'Best Value Pack',
                    'desc' => 'Full recovery protocol for chronic illness rehabilitation and multi-member family protection. Includes Free Shipping.'
                ]
            ],
            'key_benefits' => [
                [
                    'title' => 'Supreme 39-in-1 Immune Defense',
                    'desc' => 'Combines 18 fruits, 12 vegetables, and 9 spices to deliver unmatched broad-spectrum immune modulation against viral and bacterial threats.',
                    'icon' => 'shield'
                ],
                [
                    'title' => 'Metabolic & Blood Sugar Harmony',
                    'desc' => 'Contains bitter melon, purple sweet potato, and cinnamon extracts that support pancreatic health and balanced blood glucose levels.',
                    'icon' => 'activity'
                ],
                [
                    'title' => 'Anti-Tumor & Cellular Protection',
                    'desc' => 'Harnesses Soursop (Annona Muricata) and Mangosteen xanthones, widely documented for their selective cellular anti-mutagenic properties.',
                    'icon' => 'life-buoy'
                ],
                [
                    'title' => 'Black Cumin (Habbatus Sauda) Power',
                    'desc' => 'Infused with cold-pressed Nigella Sativa, revered for thousands of years as a natural remedy for respiratory, digestive, and immune disorders.',
                    'icon' => 'sun'
                ],
                [
                    'title' => 'Digestive Enzyme & Gut Restoration',
                    'desc' => 'Bioactive plant enzymes assist digestive breakdown, soothe gastric ulcers, alleviate bloating, and enhance nutrient absorption.',
                    'icon' => 'feather'
                ],
                [
                    'title' => 'Rapid Drop-Form Absorption',
                    'desc' => 'Concentrated liquid drops dissolve instantly in water, offering effortless consumption for both children, adults, and elderly patients.',
                    'icon' => 'droplet'
                ]
            ],
            'ingredients' => [
                [
                    'name' => '18 Exotic Medicinal Fruits',
                    'source' => 'Whole-Food Botanical Extracts',
                    'desc' => 'Soursop, Mangosteen, Noni, Dragon Fruit, Malang Apple, Avocado, Goroho Banana, Kiwi, Papaya, Pineapple, Red Fruit, Star Fruit, Mango, Orange, Grape, and Coconut Water.'
                ],
                [
                    'name' => '12 Alkaline Therapeutic Vegetables',
                    'source' => 'Antioxidant-Rich Vegetable Concentrate',
                    'desc' => 'Bitter Melon, Purple Sweet Potato, Purple Eggplant, Celery, Carrot, Spinach, Tomato, Chinese Cabbage, Red Bean, Soybean, Potato, and Wuluh Starfruit.'
                ],
                [
                    'name' => '9 Healing Spices & Herbs',
                    'source' => 'Medicinal Spice Complex',
                    'desc' => 'Black Cumin (Nigella Sativa / Habbatus Sauda), Cinnamon, Garlic, Roselle, Basil, Ketepeng Cina, Manggata Tuber, and White Wild Ginger.'
                ]
            ],
            'comparison' => [
                'phytoscience' => [
                    'title' => 'Actual Plus™ (Actual+)',
                    'points' => [
                        'Concentrated blend of 39 therapeutic botanical whole foods in one bottle',
                        'Includes Soursop, Mangosteen, and Black Cumin (Habbatus Sauda)',
                        'Liquid drop form allows customizable dosage from mild to intensive',
                        'Cold enzymatic extraction preserves live enzymes and micronutrients',
                        'Fast-acting systemic absorption with gentle biological tolerance'
                    ]
                ],
                'others' => [
                    'title' => 'Generic Single-Herb Capsules',
                    'points' => [
                        'Contains only one single herb (e.g. only garlic or only cinnamon)',
                        'Hard gelatin capsules difficult for seniors or ill patients to swallow',
                        'Processed under high heat which destroys sensitive live plant enzymes',
                        'No comprehensive broad-spectrum fruit, vegetable, and spice synergy',
                        'Requires swallowing 10 different pills daily to get comparable coverage'
                    ]
                ]
            ],
            'faqs' => [
                [
                    'q' => 'How many drops of Actual Plus should I take each day?',
                    'a' => 'For general immune maintenance and energy, add 5 to 7 drops into a glass of room temperature water twice daily before meals. For intensive recovery or chronic health challenges, increase to 10 drops 3 times daily.'
                ],
                [
                    'q' => 'Can someone with diabetes or high blood pressure use Actual Plus?',
                    'a' => 'Yes! In fact, Actual Plus contains bitter melon, purple sweet potato, and cinnamon, which are renowned for supporting healthy glucose metabolism and cardiovascular circulation. It contains zero refined sugar or artificial additives.'
                ],
                [
                    'q' => 'Why is it in liquid dropper form instead of a powder or pill?',
                    'a' => 'Liquid concentrates are absorbed far more quickly and gently by the digestive tract. Furthermore, many recovering patients or elderly individuals find it difficult to swallow bulky tablets. Adding drops to a glass of water makes it effortless to consume.'
                ],
                [
                    'q' => 'Can I take Actual Plus together with Double Stemcell or Snowphyll?',
                    'a' => 'Yes! They work synergistically. You can take Double Stemcell under the tongue in the morning, drink Snowphyll Forte throughout the day for blood alkalization, and add Actual Plus drops to your drinking water before meals for supreme immune fortification.'
                ]
            ],
            'testimonials' => [
                [
                    'name' => 'Pastor Emmanuel K.',
                    'location' => 'Benin City, Nigeria',
                    'rating' => 5,
                    'text' => 'I was recovering from a severe viral infection that left me bedridden with persistent chest weakness. A friend brought me Actual Plus. Within 4 days of taking 10 drops in warm water, my appetite returned, my breathing cleared up, and I was back on my feet.'
                ],
                [
                    'name' => 'Mrs. Bunmi T.',
                    'location' => 'Akure',
                    'rating' => 5,
                    'text' => 'The combination of 39 herbs and fruits in this little bottle is unmatched. My fasting blood sugar dropped from 185 to 112 over 6 weeks of consistent use. My doctor was amazed at the stability.'
                ],
                [
                    'name' => 'Chief Okey N.',
                    'location' => 'Onitsha',
                    'rating' => 5,
                    'text' => 'Actual Plus has become our household first-aid remedy. Whenever anyone feels a fever, cold, or stomach upset coming, 7 drops stops it immediately. A bottle lasts a long time and is worth every naira.'
                ]
            ],
            'videos' => [
                ['id' => 'ggox7cLxJGs', 'title' => 'Diabetes, Blood Pressure & Immune Recovery'],
                ['id' => 'ksi3UuBUVuo', 'title' => 'Severe Health Crisis Overcome with PhytoScience']
            ],
            'seo' => [
                'title' => 'Actual Plus™ (Actual+) | 39-in-1 Botanical Immune Drops',
                'description' => 'Buy original PhytoScience Actual Plus™ (Actual+) online. 39 natural fruits, vegetables, and herbs including Soursop and Black Cumin for supreme immune defense and metabolic wellness.',
                'keywords' => 'Actual Plus, PhytoScience Actual Plus, Actual+, immune booster drops, soursop black seed supplement, buy actual plus Nigeria'
            ]
        ]
    ];
}

/**
 * Helper to fetch a single product by slug
 */
function get_product_by_slug(string $slug): ?array {
    $products = get_products_data();
    return $products[$slug] ?? null;
}
