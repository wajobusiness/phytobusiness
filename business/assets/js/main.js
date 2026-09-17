/**
 * PhytoScience Wellness - Modern Vanilla JavaScript Suite
 * High-performance, zero jQuery, PageSpeed 90+ optimized
 */

(function () {
  'use strict';

  function initPhytoApp() {
    // 1. Sticky Navigation Bar & Active Highlight
    const navbar = document.querySelector('.ps-navbar');
    const backToTopBtn = document.querySelector('.back-to-top');

    const handleScroll = () => {
      const scrollY = window.scrollY || window.pageYOffset;

      if (navbar) {
        if (scrollY > 30) {
          navbar.classList.add('scrolled');
        } else {
          navbar.classList.remove('scrolled');
        }
      }

      if (backToTopBtn) {
        if (scrollY > 350) {
          backToTopBtn.classList.add('visible');
        } else {
          backToTopBtn.classList.remove('visible');
        }
      }
    };

    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();

    if (backToTopBtn) {
      backToTopBtn.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    }

    // 2. Mobile Navigation Toggle & Drawer
    const navToggleBtn = document.querySelector('[data-ps-toggle="nav"], .js-mobile-hamburger');
    const navMenu = document.querySelector('#psNavMenu');

    if (navToggleBtn && navMenu) {
      navToggleBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        const isOpen = navMenu.classList.contains('show');
        navToggleBtn.setAttribute('aria-expanded', !isOpen);
        navMenu.classList.toggle('show', !isOpen);
      });

      // Close when clicking destination links inside mobile drawer
      navMenu.querySelectorAll('.js-mobile-nav-link').forEach((link) => {
        link.addEventListener('click', () => {
          navMenu.classList.remove('show');
          navToggleBtn.setAttribute('aria-expanded', 'false');
        });
      });
    }

    // 3. Robust Dropdown Menus (Works for Click, Touch, and Fallback)
    const dropdownToggles = document.querySelectorAll('.ps-navbar .dropdown-toggle');

    dropdownToggles.forEach((toggle) => {
      toggle.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();

        const parentDropdown = toggle.closest('.dropdown');
        if (!parentDropdown) return;

        const menu = parentDropdown.querySelector('.dropdown-menu');
        const isCurrentlyOpen = parentDropdown.classList.contains('show') || (menu && menu.classList.contains('show'));

        // Close all other open dropdowns first
        document.querySelectorAll('.ps-navbar .dropdown').forEach((d) => {
          if (d !== parentDropdown) {
            d.classList.remove('show');
            const otherMenu = d.querySelector('.dropdown-menu');
            if (otherMenu) otherMenu.classList.remove('show');
            const otherToggle = d.querySelector('.dropdown-toggle');
            if (otherToggle) otherToggle.setAttribute('aria-expanded', 'false');
          }
        });

        // Toggle this dropdown
        if (isCurrentlyOpen) {
          parentDropdown.classList.remove('show');
          if (menu) menu.classList.remove('show');
          toggle.setAttribute('aria-expanded', 'false');
        } else {
          parentDropdown.classList.add('show');
          if (menu) menu.classList.add('show');
          toggle.setAttribute('aria-expanded', 'true');
        }
      });
    });

    // Close all open dropdowns when clicking outside
    document.addEventListener('click', (e) => {
      if (!e.target.closest('.ps-navbar .dropdown')) {
        document.querySelectorAll('.ps-navbar .dropdown').forEach((d) => {
          d.classList.remove('show');
          const menu = d.querySelector('.dropdown-menu');
          if (menu) menu.classList.remove('show');
          const toggle = d.querySelector('.dropdown-toggle');
          if (toggle) toggle.setAttribute('aria-expanded', 'false');
        });
      }
    });

    // Close dropdowns on ESC key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        document.querySelectorAll('.ps-navbar .dropdown').forEach((d) => {
          d.classList.remove('show');
          const menu = d.querySelector('.dropdown-menu');
          if (menu) menu.classList.remove('show');
          const toggle = d.querySelector('.dropdown-toggle');
          if (toggle) toggle.setAttribute('aria-expanded', 'false');
        });
      }
    });

    // 4. Scroll Reveal Animations (IntersectionObserver)
    const revealElements = document.querySelectorAll('.reveal-init');
    if ('IntersectionObserver' in window && revealElements.length > 0) {
      const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('reveal-visible');
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

      revealElements.forEach((el) => revealObserver.observe(el));
    } else {
      revealElements.forEach((el) => el.classList.add('reveal-visible'));
    }

    // 5. Animated Number Counters
    const counterElements = document.querySelectorAll('[data-counter-target]');
    if ('IntersectionObserver' in window && counterElements.length > 0) {
      const counterObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const el = entry.target;
            const target = parseFloat(el.getAttribute('data-counter-target')) || 0;
            const prefix = el.getAttribute('data-counter-prefix') || '';
            const suffix = el.getAttribute('data-counter-suffix') || '';
            const duration = parseInt(el.getAttribute('data-counter-duration'), 10) || 1800;

            let startTime = null;

            const step = (timestamp) => {
              if (!startTime) startTime = timestamp;
              const progress = Math.min((timestamp - startTime) / duration, 1);
              const easeProgress = 1 - Math.pow(1 - progress, 3);
              const current = Math.floor(easeProgress * target);

              el.textContent = `${prefix}${current.toLocaleString()}${suffix}`;

              if (progress < 1) {
                window.requestAnimationFrame(step);
              } else {
                el.textContent = `${prefix}${target.toLocaleString()}${suffix}`;
              }
            };

            window.requestAnimationFrame(step);
            observer.unobserve(el);
          }
        });
      }, { threshold: 0.3 });

      counterElements.forEach((el) => counterObserver.observe(el));
    }

    // 6. Native Accordion Implementation
    const accordionHeaders = document.querySelectorAll('.ps-accordion-header');
    accordionHeaders.forEach((header) => {
      header.addEventListener('click', () => {
        const parentItem = header.closest('.ps-accordion-item');
        if (!parentItem) return;

        const isCurrentActive = parentItem.classList.contains('active');

        const group = parentItem.closest('[data-accordion-group]');
        if (group) {
          group.querySelectorAll('.ps-accordion-item').forEach((item) => {
            if (item !== parentItem) {
              item.classList.remove('active');
            }
          });
        }

        parentItem.classList.toggle('active', !isCurrentActive);
      });
    });

    // 7. Bulletproof Video Lightbox Engine
    const videoModal = document.getElementById('psVideoModal');
    const videoFrameContainer = document.getElementById('psVideoContainer');
    const modalTitle = document.getElementById('psVideoModalTitle');
    const modalDirectLink = document.getElementById('psVideoDirectLink');
    const modalFallbackBtn = document.getElementById('psVideoFallbackBtn');

    const openVideo = (videoId, title = '') => {
      if (!videoId) return;

      const cleanTitle = title || 'PhytoScience Official Presentation';
      const ytUrl = `https://www.youtube.com/watch?v=${encodeURIComponent(videoId)}`;

      if (modalTitle) modalTitle.textContent = cleanTitle;
      if (modalDirectLink) modalDirectLink.href = ytUrl;
      if (modalFallbackBtn) modalFallbackBtn.href = ytUrl;

      if (!videoModal || !videoFrameContainer) {
        // Direct fallback: Open in new tab immediately
        window.open(ytUrl, '_blank', 'noopener');
        return;
      }

      // Inject standard YouTube responsive iframe with cross-origin referrer policy
      videoFrameContainer.innerHTML = `
        <iframe 
          src="https://www.youtube.com/embed/${encodeURIComponent(videoId)}?autoplay=1&playsinline=1&enablejsapi=1&rel=0&modestbranding=1" 
          title="${cleanTitle.replace(/"/g, '&quot;')}"
          style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
          referrerpolicy="strict-origin-when-cross-origin"
          allowfullscreen>
        </iframe>
      `;

      videoModal.classList.add('active');
      document.body.style.overflow = 'hidden';
    };

    const closeVideo = () => {
      if (!videoModal || !videoFrameContainer) return;
      videoFrameContainer.innerHTML = '';
      videoModal.classList.remove('active');
      document.body.style.overflow = '';
    };

    // Global Event Delegation for Any Video Trigger
    document.addEventListener('click', (e) => {
      const trigger = e.target.closest('[data-video-id], .js-video-trigger');
      if (trigger) {
        e.preventDefault();
        e.stopPropagation();
        const videoId = trigger.getAttribute('data-video-id') || trigger.dataset.videoId;
        const title = trigger.getAttribute('data-video-title') || trigger.dataset.videoTitle || 'PhytoScience Official Video';
        if (videoId) {
          openVideo(videoId, title);
        }
        return;
      }

      // Modal Close Triggers
      if (e.target.closest('[data-close-video]')) {
        e.preventDefault();
        closeVideo();
      }
    });

    // Close on backdrop click or Escape key
    if (videoModal) {
      videoModal.addEventListener('click', (e) => {
        if (e.target === videoModal) closeVideo();
      });

      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && videoModal.classList.contains('active')) {
          closeVideo();
        }
      });
    }

    // 8. Compensation Plan Simulator (on compensation-plan.php)
    const calcForm = document.getElementById('psCompensationCalc');
    if (calcForm) {
      const rankSelect = document.getElementById('calcUserRank');
      const recruitsInput = document.getElementById('calcNewRecruits');
      const recruitRankSelect = document.getElementById('calcRecruitRank');
      const resultSponsor = document.getElementById('calcResultSponsor');
      const resultPairing = document.getElementById('calcResultPairing');
      const resultTotal = document.getElementById('calcResultTotal');

      const updateCalculator = () => {
        const userRank = rankSelect ? rankSelect.value : 'platinum';
        const recruitCount = parseInt(recruitsInput ? recruitsInput.value : 4, 10) || 0;
        const recruitType = recruitRankSelect ? recruitRankSelect.value : 'gold';

        let pvPerUnit = 100;
        let sponsorBonusUnit = 30;

        if (recruitType === 'gold') {
          pvPerUnit = 500;
          sponsorBonusUnit = userRank === 'silver' ? 88 : 177;
        } else if (recruitType === 'platinum') {
          pvPerUnit = 3000;
          if (userRank === 'silver') sponsorBonusUnit = 177;
          else if (userRank === 'gold') sponsorBonusUnit = 300;
          else sponsorBonusUnit = 600;
        } else {
          pvPerUnit = 100;
          sponsorBonusUnit = 30;
        }

        const totalSponsorBonus = recruitCount * sponsorBonusUnit;
        const pairs = Math.floor(recruitCount / 2);
        let pairRate = 0.10;
        if (userRank === 'gold') pairRate = 0.12;
        if (userRank === 'platinum') pairRate = 0.14;

        let pairingBonus = Math.round(pairs * (pvPerUnit * pairRate));
        if (userRank === 'silver' && pairingBonus > 500) {
          pairingBonus = 500;
        }

        const estimatedTotal = totalSponsorBonus + pairingBonus;

        if (resultSponsor) resultSponsor.textContent = `$${totalSponsorBonus.toLocaleString()}`;
        if (resultPairing) resultPairing.textContent = `$${pairingBonus.toLocaleString()}`;
        if (resultTotal) resultTotal.textContent = `$${estimatedTotal.toLocaleString()}`;
      };

      [rankSelect, recruitsInput, recruitRankSelect].forEach((input) => {
        if (input) {
          input.addEventListener('input', updateCalculator);
          input.addEventListener('change', updateCalculator);
        }
      });

      updateCalculator();
    }

    // 9. Gallery Category Filter (on gallery.php)
    const filterBtns = document.querySelectorAll('.js-gallery-filter');
    const galleryItems = document.querySelectorAll('.gallery-item');
    if (filterBtns.length > 0 && galleryItems.length > 0) {
      filterBtns.forEach((btn) => {
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          const filter = btn.getAttribute('data-filter') || 'all';
          filterBtns.forEach((b) => {
            b.classList.remove('btn-ps-primary', 'active');
            b.classList.add('btn-ps-glass');
          });
          btn.classList.remove('btn-ps-glass');
          btn.classList.add('btn-ps-primary', 'active');

          galleryItems.forEach((item) => {
            const cat = item.getAttribute('data-category');
            if (filter === 'all' || cat === filter) {
              item.style.display = '';
            } else {
              item.style.display = 'none';
            }
          });
        });
      });
    }
  }

  // Safe Execution: Run immediately if DOM is ready, or wait for DOMContentLoaded
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initPhytoApp);
  } else {
    initPhytoApp();
  }
})();
