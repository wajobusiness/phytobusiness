<?php
/**
 * PhytoScience Wellness - Multi-Currency Configuration & Auto-Detection
 * Provides currency exchange rates, country mappings, and formatting helpers.
 */

declare(strict_types=1);

/**
 * Supported global currencies and conversion multipliers (relative to base USD)
 */
function get_supported_currencies(): array {
    return [
        'NGN' => [
            'code' => 'NGN',
            'symbol' => '₦',
            'name' => 'Nigerian Naira',
            'country' => 'Nigeria',
            'flag' => '🇳🇬',
            'rate' => 1600.0,
            'decimals' => 0,
            'symbol_first' => true,
            'round_to' => 1000,
        ],
        'USD' => [
            'code' => 'USD',
            'symbol' => '$',
            'name' => 'US Dollar',
            'country' => 'United States / Global',
            'flag' => '🇺🇸',
            'rate' => 1.0,
            'decimals' => 0,
            'symbol_first' => true,
            'round_to' => 5,
        ],
        'GBP' => [
            'code' => 'GBP',
            'symbol' => '£',
            'name' => 'British Pound',
            'country' => 'United Kingdom',
            'flag' => '🇬🇧',
            'rate' => 0.80,
            'decimals' => 0,
            'symbol_first' => true,
            'round_to' => 1,
        ],
        'EUR' => [
            'code' => 'EUR',
            'symbol' => '€',
            'name' => 'Euro',
            'country' => 'European Union',
            'flag' => '🇪🇺',
            'rate' => 0.92,
            'decimals' => 0,
            'symbol_first' => true,
            'round_to' => 1,
        ],
        'GHS' => [
            'code' => 'GHS',
            'symbol' => 'GH₵',
            'name' => 'Ghanaian Cedi',
            'country' => 'Ghana',
            'flag' => '🇬🇭',
            'rate' => 15.5,
            'decimals' => 0,
            'symbol_first' => true,
            'round_to' => 10,
        ],
        'KES' => [
            'code' => 'KES',
            'symbol' => 'KSh',
            'name' => 'Kenyan Shilling',
            'country' => 'Kenya',
            'flag' => '🇰🇪',
            'rate' => 130.0,
            'decimals' => 0,
            'symbol_first' => true,
            'round_to' => 50,
        ],
        'ZAR' => [
            'code' => 'ZAR',
            'symbol' => 'R',
            'name' => 'South African Rand',
            'country' => 'South Africa',
            'flag' => '🇿🇦',
            'rate' => 18.5,
            'decimals' => 0,
            'symbol_first' => true,
            'round_to' => 10,
        ],
        'MYR' => [
            'code' => 'MYR',
            'symbol' => 'RM',
            'name' => 'Malaysian Ringgit',
            'country' => 'Malaysia (HQ)',
            'flag' => '🇲🇾',
            'rate' => 4.45,
            'decimals' => 0,
            'symbol_first' => true,
            'round_to' => 5,
        ],
        'CAD' => [
            'code' => 'CAD',
            'symbol' => 'CA$',
            'name' => 'Canadian Dollar',
            'country' => 'Canada',
            'flag' => '🇨🇦',
            'rate' => 1.36,
            'decimals' => 0,
            'symbol_first' => true,
            'round_to' => 5,
        ],
        'AUD' => [
            'code' => 'AUD',
            'symbol' => 'A$',
            'name' => 'Australian Dollar',
            'country' => 'Australia',
            'flag' => '🇦🇺',
            'rate' => 1.52,
            'decimals' => 0,
            'symbol_first' => true,
            'round_to' => 5,
        ],
        'AED' => [
            'code' => 'AED',
            'symbol' => 'AED',
            'name' => 'UAE Dirham',
            'country' => 'United Arab Emirates',
            'flag' => '🇦🇪',
            'rate' => 3.67,
            'decimals' => 0,
            'symbol_first' => true,
            'round_to' => 5,
        ],
        'XOF' => [
            'code' => 'XOF',
            'symbol' => 'CFA',
            'name' => 'West African CFA Franc',
            'country' => 'Francophone West Africa',
            'flag' => '🌍',
            'rate' => 600.0,
            'decimals' => 0,
            'symbol_first' => false,
            'round_to' => 500,
        ],
        'INR' => [
            'code' => 'INR',
            'symbol' => '₹',
            'name' => 'Indian Rupee',
            'country' => 'India',
            'flag' => '🇮🇳',
            'rate' => 84.0,
            'decimals' => 0,
            'symbol_first' => true,
            'round_to' => 50,
        ],
    ];
}

/**
 * ISO 2-letter Country Code to Currency Code mapping
 */
function get_country_to_currency_map(): array {
    return [
        'NG' => 'NGN',
        'GB' => 'GBP',
        'US' => 'USD',
        'GH' => 'GHS',
        'KE' => 'KES',
        'ZA' => 'ZAR',
        'MY' => 'MYR',
        'CA' => 'CAD',
        'AU' => 'AUD',
        'AE' => 'AED',
        'IN' => 'INR',
        // Eurozone
        'FR' => 'EUR', 'DE' => 'EUR', 'IT' => 'EUR', 'ES' => 'EUR',
        'NL' => 'EUR', 'BE' => 'EUR', 'IE' => 'EUR', 'PT' => 'EUR',
        'AT' => 'EUR', 'FI' => 'EUR', 'GR' => 'EUR',
        // CFA Franc zone
        'SN' => 'XOF', 'CI' => 'XOF', 'CM' => 'XOF', 'BJ' => 'XOF',
        'TG' => 'XOF', 'BF' => 'XOF', 'ML' => 'XOF', 'NE' => 'XOF',
        'GA' => 'XOF', 'CG' => 'XOF'
    ];
}

/**
 * Detect the visitor's preferred currency via cookies, Cloudflare IP header, or server headers
 */
function detect_visitor_currency(): string {
    $currencies = get_supported_currencies();

    // 1. User manual selection cookie
    if (!empty($_COOKIE['ps_currency'])) {
        $c = strtoupper(trim($_COOKIE['ps_currency']));
        if (isset($currencies[$c])) {
            return $c;
        }
    }

    // 2. Cloudflare Country header
    $countryCode = strtoupper($_SERVER['HTTP_CF_IPCOUNTRY'] ?? '');
    
    // 3. Fallback to cPanel mod_geoip or server country headers
    if ($countryCode === '' || $countryCode === 'XX' || $countryCode === 'T1') {
        $countryCode = strtoupper($_SERVER['GEOIP_COUNTRY_CODE'] ?? $_SERVER['HTTP_X_COUNTRY_CODE'] ?? '');
    }

    if ($countryCode !== '') {
        $map = get_country_to_currency_map();
        if (isset($map[$countryCode])) {
            return $map[$countryCode];
        }
    }

    // 4. Default to NGN for Nigerian traffic, USD for general international
    return 'NGN';
}

/**
 * Convert a base USD amount to any target currency and format it
 */
function convert_usd_price(float $usdAmount, string $targetCurrency = 'NGN'): string {
    $currencies = get_supported_currencies();
    $curr = $currencies[$targetCurrency] ?? $currencies['USD'];

    // Special fixed values for flagship tiers to preserve exact marketing pricing
    if ($targetCurrency === 'NGN') {
        if ($usdAmount >= 44 && $usdAmount <= 46) return '₦38,000';
        if ($usdAmount >= 54 && $usdAmount <= 56) return '₦48,000';
        if ($usdAmount >= 84 && $usdAmount <= 86) return '₦72,000';
        if ($usdAmount >= 105 && $usdAmount <= 115) return '₦96,000';
        if ($usdAmount >= 155 && $usdAmount <= 165) return '₦138,000';
        if ($usdAmount >= 190 && $usdAmount <= 225) return '₦192,000';
        // Membership packages
        if ($usdAmount >= 125 && $usdAmount <= 135) return '₦110,000';
        if ($usdAmount >= 640 && $usdAmount <= 660) return '₦550,000';
        if ($usdAmount >= 1900 && $usdAmount <= 2000) return '₦1,650,000';
        if ($usdAmount >= 3800 && $usdAmount <= 4000) return '₦3,300,000';
    }

    if ($targetCurrency === 'USD') {
        return '$' . number_format($usdAmount, $curr['decimals']);
    }

    // Calculate converted value
    $rawVal = $usdAmount * $curr['rate'];
    $roundTo = $curr['round_to'] ?? 1;

    if ($roundTo > 1) {
        $val = round($rawVal / $roundTo) * $roundTo;
    } else {
        $val = round($rawVal);
    }

    $formattedNumber = number_format($val, $curr['decimals']);

    if (!empty($curr['symbol_first'])) {
        return $curr['symbol'] . $formattedNumber;
    } else {
        return $formattedNumber . ' ' . $curr['symbol'];
    }
}
