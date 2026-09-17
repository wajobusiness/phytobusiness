/**
 * PhytoScience Wellness - Modern Vanilla JavaScript Suite
 * High-performance, zero jQuery, PageSpeed 90+ optimized
 */

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  // 1. Sticky Navigation Bar & Active Highlight
  const navbar = document.querySelector('.ps-navbar');
  const backToTopBtn = document.querySelector('.back-to-top');

  const handleScroll = () => {
    const scrollY = window.scrollY || window.pageYOffset;
    
    if (navbar) {
      if (scrollY > 40) {
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

  // 2. Mobile Navigation Toggle
  const navToggleBtn = document.querySelector('[data-ps-toggle="nav"]');
  const navMenu = document.querySelector('#psNavMenu');

  if (navToggleBtn && navMenu) {
    navToggleBtn.addEventListener('click', () => {
      const isExpanded = navToggleBtn.getAttribute('aria-expanded') === 'true';
      navToggleBtn.setAttribute('aria-expanded', !isExpanded);
      navMenu.classList.toggle('show');
    });

    // Close when clicking nav links on mobile
    navMenu.querySelectorAll('.ps-nav-link').forEach(link => {
      link.addEventListener('click', () => {
        navMenu.classList.remove('show');
        navToggleBtn.setAttribute('aria-expanded', 'false');
      });
    });
  }

  // 3. Scroll Reveal Animations (IntersectionObserver)
  const revealElements = document.querySelectorAll('.reveal-init');
  if ('IntersectionObserver' in window && revealElements.length > 0) {
    const revealObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('reveal-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    revealElements.forEach(el => revealObserver.observe(el));
  } else {
    // Fallback for older browsers
    revealElements.forEach(el => el.classList.add('reveal-visible'));
  }

  // 4. Animated Number Counters
  const counterElements = document.querySelectorAll('[data-counter-target]');
  if ('IntersectionObserver' in window && counterElements.length > 0) {
    const counterObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
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
            // Ease-out cubic calculation
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

    counterElements.forEach(el => counterObserver.observe(el));
  }

  // 5. Native Accordion Implementation
  const accordionHeaders = document.querySelectorAll('.ps-accordion-header');
  accordionHeaders.forEach(header => {
    header.addEventListener('click', () => {
      const parentItem = header.closest('.ps-accordion-item');
      if (!parentItem) return;

      const isCurrentActive = parentItem.classList.contains('active');
      
      // Optional: Close siblings if grouped
      const group = parentItem.closest('[data-accordion-group]');
      if (group) {
        group.querySelectorAll('.ps-accordion-item').forEach(item => {
          if (item !== parentItem) {
            item.classList.remove('active');
          }
        });
      }

      parentItem.classList.toggle('active', !isCurrentActive);
    });
  });

  // 6. Ultra-Fast Modal Video Lightbox (Lazy iframe injection with full event delegation)
  const videoModal = document.getElementById('psVideoModal');
  const videoFrameContainer = document.getElementById('psVideoContainer');
  const modalTitle = document.getElementById('psVideoModalTitle');
  const modalDirectLink = document.getElementById('psVideoDirectLink');

  const openVideo = (videoId, title = '') => {
    if (!videoModal || !videoFrameContainer) {
      // Fallback if modal not present: open in new tab directly
      window.open(`https://www.youtube.com/watch?v=${encodeURIComponent(videoId)}`, '_blank', 'noopener');
      return;
    }

    if (modalTitle) modalTitle.textContent = title || 'PhytoScience Presentation';
    if (modalDirectLink) {
      modalDirectLink.href = `https://www.youtube.com/watch?v=${encodeURIComponent(videoId)}`;
      modalDirectLink.style.display = 'inline-flex';
    }

    videoFrameContainer.innerHTML = `
      <iframe 
        class="w-100 h-100" 
        src="https://www.youtube.com/embed/${encodeURIComponent(videoId)}?autoplay=1&rel=0&enablejsapi=1" 
        title="${encodeURIComponent(title || 'Video')}"
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
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

  // Event delegation on document: Catches ANY click on [data-video-id] or .js-video-trigger
  document.addEventListener('click', (e) => {
    const trigger = e.target.closest('[data-video-id], .js-video-trigger');
    if (trigger) {
      e.preventDefault();
      const videoId = trigger.getAttribute('data-video-id') || trigger.dataset.videoId;
      const title = trigger.getAttribute('data-video-title') || trigger.dataset.videoTitle || 'PhytoScience Official Presentation';
      if (videoId) {
        openVideo(videoId, title);
      }
    }

    // Modal close triggers
    if (e.target.closest('[data-close-video]')) {
      e.preventDefault();
      closeVideo();
    }
  });

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

  // 7. Interactive Compensation Simulator (on compensation-plan.php)
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

      // Base point values: Silver = 100, Gold = 500, Platinum = 3000
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
        // Silver
        pvPerUnit = 100;
        sponsorBonusUnit = 30;
      }

      const totalSponsorBonus = recruitCount * sponsorBonusUnit;

      // Binary Pairs: pairs = floor(recruitCount / 2)
      const pairs = Math.floor(recruitCount / 2);
      let pairRate = 0.10; // ~10-14% of weaker leg PV
      if (userRank === 'gold') pairRate = 0.12;
      if (userRank === 'platinum') pairRate = 0.14;

      let pairingBonus = Math.round(pairs * (pvPerUnit * pairRate));
      
      // Capping rules for Silver
      if (userRank === 'silver' && pairingBonus > 500) {
        pairingBonus = 500; // illustrative daily cap
      }

      const estimatedTotal = totalSponsorBonus + pairingBonus;

      if (resultSponsor) resultSponsor.textContent = `$${totalSponsorBonus.toLocaleString()}`;
      if (resultPairing) resultPairing.textContent = `$${pairingBonus.toLocaleString()}`;
      if (resultTotal) resultTotal.textContent = `$${estimatedTotal.toLocaleString()}`;
    };

    [rankSelect, recruitsInput, recruitRankSelect].forEach(input => {
      if (input) {
        input.addEventListener('input', updateCalculator);
        input.addEventListener('change', updateCalculator);
      }
    });

    updateCalculator();
  }
});

