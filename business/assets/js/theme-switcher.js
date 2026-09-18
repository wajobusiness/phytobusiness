/**
 * PhytoScience Wellness - Dark & Light Mode Theme Engine
 * Automatically matches system OS theme with persistent manual switching.
 */

(function() {
  'use strict';

  var THEME_STORAGE_KEY = 'ps_theme';
  var MANUAL_FLAG_KEY = 'ps_theme_manual';
  var COOKIE_NAME = 'ps_theme';

  /**
   * Helper to set cookie
   */
  function setCookie(name, value, days) {
    var expires = '';
    if (days) {
      var d = new Date();
      d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = '; expires=' + d.toUTCString();
    }
    document.cookie = name + '=' + (value || '') + expires + '; path=/; SameSite=Lax';
  }

  function getCookie(name) {
    var nameEQ = name + '=';
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) === ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }

  /**
   * Detect OS system preference
   */
  function getSystemTheme() {
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches) {
      return 'light';
    }
    return 'dark'; // default to luxury dark
  }

  /**
   * Determine initial theme
   */
  function getPreferredTheme() {
    try {
      var saved = localStorage.getItem(THEME_STORAGE_KEY) || getCookie(COOKIE_NAME);
      if (saved === 'light' || saved === 'dark') {
        return saved;
      }
    } catch (e) {
      // localStorage may fail in private mode
    }
    return getSystemTheme();
  }

  /**
   * Apply theme to DOM and sync controls
   */
  function applyTheme(theme, isManual) {
    var targetTheme = (theme === 'light') ? 'light' : 'dark';

    // 1. Set data-theme on root <html> element
    document.documentElement.setAttribute('data-theme', targetTheme);

    // 2. Set class for extra framework compatibility if needed
    if (targetTheme === 'light') {
      document.documentElement.classList.add('ps-theme-light');
      document.documentElement.classList.remove('ps-theme-dark');
    } else {
      document.documentElement.classList.add('ps-theme-dark');
      document.documentElement.classList.remove('ps-theme-light');
    }

    // 3. Persist if manual action
    if (isManual) {
      try {
        localStorage.setItem(THEME_STORAGE_KEY, targetTheme);
        localStorage.setItem(MANUAL_FLAG_KEY, 'true');
      } catch (e) {}
      setCookie(COOKIE_NAME, targetTheme, 365);
    }

    // 4. Update UI toggles across the page
    updateToggleButtons(targetTheme);

    // 5. Dispatch event for other components
    try {
      var event = new CustomEvent('psThemeChanged', { detail: { theme: targetTheme } });
      document.dispatchEvent(event);
    } catch (e) {}
  }

  /**
   * Update visual state of all theme toggle buttons on desktop and mobile
   */
  function updateToggleButtons(currentTheme) {
    var isLight = currentTheme === 'light';
    var nextTheme = isLight ? 'dark' : 'light';
    var nextTitle = isLight ? 'Switch to Dark Mode' : 'Switch to Light Mode';

    // Update all button toggles (.js-theme-toggle)
    var toggleButtons = document.querySelectorAll('.js-theme-toggle');
    toggleButtons.forEach(function(btn) {
      btn.setAttribute('aria-label', nextTitle);
      btn.setAttribute('title', nextTitle);
      btn.setAttribute('data-current-theme', currentTheme);

      // Icon visibility
      var sunIcon = btn.querySelector('.ps-theme-icon-sun');
      var moonIcon = btn.querySelector('.ps-theme-icon-moon');
      var label = btn.querySelector('.ps-theme-btn-label');

      if (sunIcon && moonIcon) {
        if (isLight) {
          // When in light mode, show Moon icon to switch to dark
          sunIcon.classList.add('d-none');
          moonIcon.classList.remove('d-none');
        } else {
          // When in dark mode, show Sun icon to switch to light
          sunIcon.classList.remove('d-none');
          moonIcon.classList.add('d-none');
        }
      }

      if (label) {
        label.textContent = isLight ? 'Dark Mode' : 'Light Mode';
      }
    });

    // Update segmented pill toggles in mobile drawer if present
    var pillDark = document.querySelector('.js-theme-pill-dark');
    var pillLight = document.querySelector('.js-theme-pill-light');
    if (pillDark && pillLight) {
      if (isLight) {
        pillLight.classList.add('active');
        pillDark.classList.remove('active');
      } else {
        pillDark.classList.add('active');
        pillLight.classList.remove('active');
      }
    }
  }

  /**
   * Toggle theme between dark and light
   */
  function toggleTheme() {
    var current = document.documentElement.getAttribute('data-theme') || 'dark';
    var next = (current === 'light') ? 'dark' : 'light';
    applyTheme(next, true);
  }

  // Immediately apply preferred theme
  var initialTheme = getPreferredTheme();
  applyTheme(initialTheme, false);

  // Listen for system theme changes if user hasn't explicitly set a preference
  if (window.matchMedia) {
    var mediaQuery = window.matchMedia('(prefers-color-scheme: light)');
    var systemListener = function(e) {
      try {
        var isManual = localStorage.getItem(MANUAL_FLAG_KEY) === 'true';
        if (!isManual) {
          applyTheme(e.matches ? 'light' : 'dark', false);
        }
      } catch (err) {}
    };

    if (mediaQuery.addEventListener) {
      mediaQuery.addEventListener('change', systemListener);
    } else if (mediaQuery.addListener) {
      mediaQuery.addListener(systemListener);
    }
  }

  // Cross-tab synchronization
  window.addEventListener('storage', function(e) {
    if (e.key === THEME_STORAGE_KEY && e.newValue) {
      applyTheme(e.newValue, false);
    }
  });

  // Attach click listeners on DOM ready
  function initThemeListeners() {
    // 1. All toggle buttons
    document.addEventListener('click', function(e) {
      var toggleBtn = e.target.closest('.js-theme-toggle');
      if (toggleBtn) {
        e.preventDefault();
        toggleTheme();
        return;
      }

      // Pill toggle for dark
      var darkPill = e.target.closest('.js-theme-pill-dark');
      if (darkPill) {
        e.preventDefault();
        applyTheme('dark', true);
        return;
      }

      // Pill toggle for light
      var lightPill = e.target.closest('.js-theme-pill-light');
      if (lightPill) {
        e.preventDefault();
        applyTheme('light', true);
        return;
      }
    });

    // Update buttons now that DOM is parsed
    var current = document.documentElement.getAttribute('data-theme') || 'dark';
    updateToggleButtons(current);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initThemeListeners);
  } else {
    initThemeListeners();
  }

  // Expose global API
  window.PS_THEME = {
    get: function() {
      return document.documentElement.getAttribute('data-theme') || 'dark';
    },
    set: function(theme) {
      applyTheme(theme, true);
    },
    toggle: toggleTheme,
    resetToSystem: function() {
      try {
        localStorage.removeItem(THEME_STORAGE_KEY);
        localStorage.removeItem(MANUAL_FLAG_KEY);
      } catch (e) {}
      applyTheme(getSystemTheme(), false);
    }
  };
})();

