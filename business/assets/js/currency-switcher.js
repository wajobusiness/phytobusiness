/**
 * PhytoScience Wellness - Multi-Currency Auto-Detection & Real-Time Switcher
 * Automatically detects visitor's country & local currency, with persistent manual switcher.
 */

(function() {
  'use strict';

  // Supported Currency Definitions & Exchange Multipliers (Base: USD)
  const CURRENCIES = {
    NGN: { code: 'NGN', symbol: '₦', name: 'Nigerian Naira', flag: '🇳🇬', rate: 1600, decimals: 0, symbolFirst: true, roundTo: 1000 },
    USD: { code: 'USD', symbol: '$', name: 'US Dollar', flag: '🇺🇸', rate: 1.0, decimals: 0, symbolFirst: true, roundTo: 5 },
    GBP: { code: 'GBP', symbol: '£', name: 'British Pound', flag: '🇬🇧', rate: 0.80, decimals: 0, symbolFirst: true, roundTo: 1 },
    EUR: { code: 'EUR', symbol: '€', name: 'Euro', flag: '🇪🇺', rate: 0.92, decimals: 0, symbolFirst: true, roundTo: 1 },
    GHS: { code: 'GHS', symbol: 'GH₵', name: 'Ghanaian Cedi', flag: '🇬🇭', rate: 15.5, decimals: 0, symbolFirst: true, roundTo: 10 },
    KES: { code: 'KES', symbol: 'KSh', name: 'Kenyan Shilling', flag: '🇰🇪', rate: 130, decimals: 0, symbolFirst: true, roundTo: 50 },
    ZAR: { code: 'ZAR', symbol: 'R', name: 'South African Rand', flag: '🇿🇦', rate: 18.5, decimals: 0, symbolFirst: true, roundTo: 10 },
    MYR: { code: 'MYR', symbol: 'RM', name: 'Malaysian Ringgit', flag: '🇲🇾', rate: 4.45, decimals: 0, symbolFirst: true, roundTo: 5 },
    CAD: { code: 'CAD', symbol: 'CA$', name: 'Canadian Dollar', flag: '🇨🇦', rate: 1.36, decimals: 0, symbolFirst: true, roundTo: 5 },
    AUD: { code: 'AUD', symbol: 'A$', name: 'Australian Dollar', flag: '🇦🇺', rate: 1.52, decimals: 0, symbolFirst: true, roundTo: 5 },
    AED: { code: 'AED', symbol: 'AED', name: 'UAE Dirham', flag: '🇦🇪', rate: 3.67, decimals: 0, symbolFirst: true, roundTo: 5 },
    XOF: { code: 'XOF', symbol: 'CFA', name: 'West African CFA', flag: '🌍', rate: 600, decimals: 0, symbolFirst: false, roundTo: 500 },
    INR: { code: 'INR', symbol: '₹', name: 'Indian Rupee', flag: '🇮🇳', rate: 84, decimals: 0, symbolFirst: true, roundTo: 50 }
  };

  // Country Code to Currency Map
  const COUNTRY_CURRENCY_MAP = {
    NG: 'NGN', GB: 'GBP', US: 'USD', GH: 'GHS', KE: 'KES', ZA: 'ZAR',
    MY: 'MYR', CA: 'CAD', AU: 'AUD', AE: 'AED', IN: 'INR',
    // Eurozone
    FR: 'EUR', DE: 'EUR', IT: 'EUR', ES: 'EUR', NL: 'EUR', BE: 'EUR',
    IE: 'EUR', PT: 'EUR', AT: 'EUR', FI: 'EUR', GR: 'EUR',
    // CFA Franc
    SN: 'XOF', CI: 'XOF', CM: 'XOF', BJ: 'XOF', TG: 'XOF', BF: 'XOF',
    ML: 'XOF', NE: 'XOF', GA: 'XOF', CG: 'XOF'
  };

  // Fixed PhytoScience Marketing Price Overrides
  const MARKETING_OVERRIDES = {
    NGN: {
      45: '₦38,000', 55: '₦48,000',
      85: '₦72,000', 110: '₦96,000',
      160: '₦138,000', 220: '₦192,000',
      130: '₦110,000', 650: '₦550,000', 1950: '₦1,650,000', 3900: '₦3,300,000'
    },
    USD: {
      45: '$45', 55: '$55',
      85: '$85', 110: '$110',
      160: '$160', 220: '$220',
      130: '$130', 650: '$650', 1950: '$1,950', 3900: '$3,900'
    },
    GBP: {
      45: '£35', 55: '£45',
      85: '£68', 110: '£88',
      160: '£128', 220: '£175',
      130: '£105', 650: '£520', 1950: '£1,560', 3900: '£3,120'
    },
    EUR: {
      45: '€42', 55: '€52',
      85: '€80', 110: '€102',
      160: '€150', 220: '€205',
      130: '€120', 650: '€600', 1950: '€1,800', 3900: '€3,600'
    },
    MYR: {
      45: 'RM 200', 55: 'RM 245',
      85: 'RM 380', 110: 'RM 490',
      160: 'RM 710', 220: 'RM 980',
      130: 'RM 420', 650: 'RM 2,100', 1950: 'RM 6,300', 3900: 'RM 12,600'
    }
  };

  /**
   * Helper to format numbers with commas
   */
  function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
  }

  /**
   * Convert a base USD amount to the requested currency
   */
  function convertPrice(usdAmount, currencyCode) {
    const curr = CURRENCIES[currencyCode] || CURRENCIES.USD;
    const roundedUsd = Math.round(usdAmount);

    // Check marketing overrides first
    if (MARKETING_OVERRIDES[currencyCode] && MARKETING_OVERRIDES[currencyCode][roundedUsd]) {
      return MARKETING_OVERRIDES[currencyCode][roundedUsd];
    }

    if (currencyCode === 'USD') {
      return '$' + formatNumber(Math.round(usdAmount));
    }

    const raw = usdAmount * curr.rate;
    const roundTo = curr.roundTo || 1;
    let finalVal;
    if (roundTo > 1) {
      finalVal = Math.round(raw / roundTo) * roundTo;
    } else {
      finalVal = Math.round(raw);
    }

    const formatted = formatNumber(finalVal);
    return curr.symbolFirst ? (curr.symbol + (curr.symbol.length > 1 ? ' ' : '') + formatted) : (formatted + ' ' + curr.symbol);
  }

  /**
   * Cookie helper to set persistence
   */
  function setCookie(name, value, days) {
    let expires = '';
    if (days) {
      const date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = '; expires=' + date.toUTCString();
    }
    document.cookie = name + '=' + (value || '') + expires + '; path=/; SameSite=Lax';
  }

  function getCookie(name) {
    const nameEQ = name + '=';
    const ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) === ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }

  /**
   * Determine user currency via saved preference, timezone heuristic, or Geo API
   */
  async function detectCurrency() {
    // 1. Saved preference in localStorage or cookie
    const saved = localStorage.getItem('ps_currency') || getCookie('ps_currency');
    if (saved && CURRENCIES[saved.toUpperCase()]) {
      return saved.toUpperCase();
    }

    // 2. Server-side pre-detected variable if available
    if (window.PS_DETECTED_CURRENCY && CURRENCIES[window.PS_DETECTED_CURRENCY]) {
      return window.PS_DETECTED_CURRENCY;
    }

    // 3. Timezone heuristic (Instant, offline & no network required)
    try {
      const tz = Intl.DateTimeFormat().resolvedOptions().timeZone || '';
      if (tz.includes('Lagos') || tz.includes('Nigeria')) return 'NGN';
      if (tz.includes('London')) return 'GBP';
      if (tz.includes('Accra')) return 'GHS';
      if (tz.includes('Nairobi')) return 'KES';
      if (tz.includes('Johannesburg')) return 'ZAR';
      if (tz.includes('Kuala_Lumpur')) return 'MYR';
      if (tz.includes('Paris') || tz.includes('Berlin') || tz.includes('Rome') || tz.includes('Madrid') || tz.includes('Amsterdam') || tz.includes('Brussels') || tz.includes('Dublin')) return 'EUR';
      if (tz.includes('Toronto') || tz.includes('Vancouver') || tz.includes('Montreal')) return 'CAD';
      if (tz.includes('Sydney') || tz.includes('Melbourne') || tz.includes('Brisbane')) return 'AUD';
      if (tz.includes('Dubai')) return 'AED';
      if (tz.includes('Calcutta') || tz.includes('Kolkata') || tz.includes('Delhi')) return 'INR';
      if (tz.includes('New_York') || tz.includes('Chicago') || tz.includes('Los_Angeles') || tz.includes('Denver')) return 'USD';
    } catch (e) {}

    // 4. Fast Geo-IP API Lookup (2 second timeout)
    try {
      const controller = new AbortController();
      const timeoutId = setTimeout(() => controller.abort(), 2000);
      const res = await fetch('https://get.geojs.io/v1/ip/country.json', { signal: controller.signal });
      clearTimeout(timeoutId);
      if (res.ok) {
        const data = await res.json();
        const code = (data.country || '').toUpperCase();
        if (COUNTRY_CURRENCY_MAP[code]) {
          return COUNTRY_CURRENCY_MAP[code];
        }
      }
    } catch (err) {
      // Ignore network abort or failure
    }

    // Default fallback: NGN for African traffic / USD general
    return 'NGN';
  }

  /**
   * Update all dynamic pricing elements across the DOM
   */
  function applyCurrency(currencyCode) {
    if (!CURRENCIES[currencyCode]) return;
    const curr = CURRENCIES[currencyCode];

    // Save to persistent storage
    localStorage.setItem('ps_currency', currencyCode);
    setCookie('ps_currency', currencyCode, 365);
    window.PS_CURRENT_CURRENCY = currencyCode;

    // 1. Update all primary price elements
    document.querySelectorAll('[data-price-usd]').forEach(elem => {
      const usd = parseFloat(elem.getAttribute('data-price-usd'));
      if (!isNaN(usd)) {
        elem.textContent = convertPrice(usd, currencyCode);
      }
    });

    // 2. Update all original / strikethrough price elements
    document.querySelectorAll('[data-original-usd]').forEach(elem => {
      const usd = parseFloat(elem.getAttribute('data-original-usd'));
      if (!isNaN(usd)) {
        const prefix = elem.getAttribute('data-prefix') || '';
        elem.textContent = prefix + convertPrice(usd, currencyCode);
      }
    });

    // 3. Update Order Lead Form Package Selector Dropdown
    const pkgSelect = document.getElementById('package-select');
    if (pkgSelect) {
      Array.from(pkgSelect.options).forEach(opt => {
        const usd = parseFloat(opt.getAttribute('data-usd'));
        const origUsd = parseFloat(opt.getAttribute('data-orig-usd'));
        const tierName = opt.getAttribute('data-tier-name') || opt.text.split('—')[0].trim();
        
        if (!isNaN(usd)) {
          const newPrice = convertPrice(usd, currencyCode);
          opt.textContent = `${tierName} — ${newPrice}`;
          opt.value = `${tierName} - ${newPrice} (${currencyCode})`;
        }
      });
    }

    // 4. Update UI Switcher triggers (Navbar & Floating badges)
    document.querySelectorAll('.js-curr-code').forEach(el => el.textContent = curr.code);
    document.querySelectorAll('.js-curr-flag').forEach(el => el.textContent = curr.flag);
    document.querySelectorAll('.js-curr-symbol').forEach(el => el.textContent = curr.symbol);
    document.querySelectorAll('.js-curr-label').forEach(el => el.textContent = `${curr.flag} ${curr.code} (${curr.symbol})`);

    // 5. Update active classes on switcher items
    document.querySelectorAll('.js-currency-btn, .js-currency-item').forEach(btn => {
      const target = btn.getAttribute('data-currency');
      if (target === currencyCode) {
        btn.classList.add('active');
        btn.setAttribute('aria-selected', 'true');
      } else {
        btn.classList.remove('active');
        btn.removeAttribute('aria-selected');
      }
    });

    // 6. Update <select> dropdowns if present
    document.querySelectorAll('.js-currency-select').forEach(sel => {
      sel.value = currencyCode;
    });

    // Dispatch global custom event for external listeners
    window.dispatchEvent(new CustomEvent('ps:currency-changed', {
      detail: { currency: curr, code: currencyCode }
    }));
  }

  // Public Global API
  window.PhytoCurrency = {
    getCurrencies: () => CURRENCIES,
    getCurrent: () => window.PS_CURRENT_CURRENCY || 'NGN',
    setCurrency: (code) => applyCurrency(code),
    convert: (usd, code) => convertPrice(usd, code || window.PS_CURRENT_CURRENCY || 'NGN')
  };

  // Initialization when DOM is ready
  document.addEventListener('DOMContentLoaded', async function() {
    // 1. Detect or read initial currency
    const activeCurrency = await detectCurrency();
    applyCurrency(activeCurrency);

    // 2. Attach click handlers to any currency dropdown items
    document.addEventListener('click', function(e) {
      const item = e.target.closest('[data-currency]');
      if (item) {
        e.preventDefault();
        const code = item.getAttribute('data-currency');
        if (code && CURRENCIES[code]) {
          applyCurrency(code);
        }
      }
    });

    // 3. Attach change handlers to any currency select elements
    document.addEventListener('change', function(e) {
      if (e.target.classList.contains('js-currency-select')) {
        const code = e.target.value;
        if (code && CURRENCIES[code]) {
          applyCurrency(code);
        }
      }
    });
  });

})();
