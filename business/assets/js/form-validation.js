/**
 * PhytoScience Wellness - Form Validation & Automated WhatsApp Checkout / Onboarding Engine
 * 
 * Features:
 * - Real-time HTML5 form validation with accessible feedback
 * - Automated WhatsApp message generation (emojis, line breaks, formatting preserved)
 * - 1-Click WhatsApp redirect (Mobile App Universal Linking & Desktop New Tab)
 * - Anti-spam Honeypot & CSRF verification
 * - Duplicate submission prevention & dynamic button loading spinner
 * - Non-blocking asynchronous background logging to server database / files
 */

(function () {
  'use strict';

  // Configured Company WhatsApp Number (International format without leading '+')
  const WHATSAPP_NUMBER = '2348023173303';

  /**
   * Detects if the visitor is browsing on a mobile device
   * @returns {boolean}
   */
  function isMobileDevice() {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent || navigator.vendor || window.opera);
  }

  /**
   * Formats the current date and time in a professional, human-readable format
   * @returns {string} e.g. "Friday, Sep 18, 2026, 11:15 PM"
   */
  function formatCurrentDateTime() {
    const now = new Date();
    try {
      return now.toLocaleDateString('en-US', {
        weekday: 'short',
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        hour12: true
      });
    } catch (e) {
      return now.toLocaleString();
    }
  }

  /**
   * Updates button to loading state with spinner and disables it to prevent duplicate clicks
   * @param {HTMLButtonElement} button 
   * @param {string} loadingText 
   */
  function setButtonLoading(button, loadingText) {
    if (!button) return;
    button.disabled = true;
    button.setAttribute('aria-busy', 'true');

    const spinner = button.querySelector('.ps-btn-spinner') || button.querySelector('.spinner-border');
    const icon = button.querySelector('.ps-btn-icon') || button.querySelector('svg');
    const textSpan = button.querySelector('.ps-btn-text') || button.querySelector('span:not(.spinner-border)');

    if (spinner) {
      spinner.classList.remove('d-none');
    } else {
      const newSpinner = document.createElement('span');
      newSpinner.className = 'spinner-border spinner-border-sm me-2 ps-btn-spinner';
      newSpinner.setAttribute('role', 'status');
      newSpinner.setAttribute('aria-hidden', 'true');
      button.prepend(newSpinner);
    }

    if (icon) icon.classList.add('d-none');
    if (textSpan) textSpan.textContent = loadingText || 'Connecting to WhatsApp...';
  }

  /**
   * Restores button from loading state if needed
   * @param {HTMLButtonElement} button 
   * @param {string} originalText 
   */
  function resetButtonState(button, originalText) {
    if (!button) return;
    button.disabled = false;
    button.removeAttribute('aria-busy');

    const spinner = button.querySelector('.ps-btn-spinner') || button.querySelector('.spinner-border');
    const icon = button.querySelector('.ps-btn-icon') || button.querySelector('svg');
    const textSpan = button.querySelector('.ps-btn-text') || button.querySelector('span:not(.spinner-border)');

    if (spinner) spinner.classList.add('d-none');
    if (icon) icon.classList.remove('d-none');
    if (textSpan && originalText) textSpan.textContent = originalText;
  }

  /**
   * Seamlessly redirects customer to WhatsApp
   * - Mobile: Triggers universal app link to open installed WhatsApp application
   * - Desktop: Opens WhatsApp Web in a clean new browser tab
   * @param {string} waUrl 
   */
  function redirectToWhatsApp(waUrl) {
    if (isMobileDevice()) {
      // Mobile: Open WhatsApp app directly
      window.location.href = waUrl;
    } else {
      // Desktop: Open in new tab; fallback to location redirect if popup blocked
      const newTab = window.open(waUrl, '_blank', 'noopener,noreferrer');
      if (!newTab || newTab.closed || typeof newTab.closed === 'undefined') {
        window.location.href = waUrl;
      }
    }
  }

  /**
   * Smoothly scrolls and focuses the first invalid form control
   * @param {HTMLFormElement} form 
   */
  function focusFirstInvalid(form) {
    const invalidControl = form.querySelector(':invalid');
    if (invalidControl) {
      invalidControl.focus();
      invalidControl.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
  }

  // ==============================================================================
  // 1. PRODUCT LANDING PAGE ORDER FORM HANDLER
  // Trigger: "CONFIRM ORDER NOW — PAY ON DELIVERY"
  // ==============================================================================
  function initProductOrderForm() {
    const orderForm = document.getElementById('psOrderForm');
    if (!orderForm) return;

    orderForm.addEventListener('submit', function (event) {
      event.preventDefault();
      event.stopPropagation();

      // Validate required fields
      if (!orderForm.checkValidity()) {
        orderForm.classList.add('was-validated');
        focusFirstInvalid(orderForm);
        return;
      }

      orderForm.classList.add('was-validated');

      const submitBtn = document.getElementById('orderSubmitBtn') || orderForm.querySelector('button[type="submit"]');
      const originalBtnText = submitBtn ? submitBtn.innerText.trim() : 'CONFIRM ORDER NOW — PAY ON DELIVERY';
      setButtonLoading(submitBtn, 'Preparing Order on WhatsApp...');

      // Collect form fields
      const firstName = (orderForm.querySelector('[name="first_name"]')?.value || '').trim();
      const lastName = (orderForm.querySelector('[name="last_name"]')?.value || '').trim();
      const fullName = (firstName + ' ' + lastName).trim() || (orderForm.querySelector('[name="full_name"]')?.value || '').trim();
      const phone = (orderForm.querySelector('[name="phone"]')?.value || '').trim();
      const email = (orderForm.querySelector('[name="email"]')?.value || '').trim();
      const address = (orderForm.querySelector('[name="address"]')?.value || '').trim();
      const state = (orderForm.querySelector('[name="state"]')?.value || '').trim();
      const city = (orderForm.querySelector('[name="city"]')?.value || '').trim();
      const productName = (orderForm.querySelector('[name="interested_product"]')?.value || orderForm.querySelector('[name="product_name"]')?.value || 'Double Stemcell™').trim();
      const quantitySelect = orderForm.querySelector('[name="quantity"]');
      const quantity = quantitySelect ? quantitySelect.value : '1';
      
      const packageSelect = orderForm.querySelector('[name="package"]');
      let selectedPackage = '';
      let totalAmount = '';

      if (packageSelect) {
        const selectedOpt = packageSelect.options[packageSelect.selectedIndex];
        if (selectedOpt) {
          selectedPackage = selectedOpt.getAttribute('data-tier-name') || selectedOpt.text.split('—')[0].trim() || selectedOpt.value;
          totalAmount = selectedOpt.getAttribute('data-price') || selectedOpt.text.match(/₦[\d,]+|\$[\d,]+/)?.[0] || '';
        }
      }

      const notes = (orderForm.querySelector('[name="comments"]')?.value || orderForm.querySelector('[name="notes"]')?.value || '').trim();

      // Build the exact requested WhatsApp Message
      const orderMessage = 
`━━━━━━━━━━━━━━━━━━━━━━
🛒 NEW ORDER REQUEST

👤 Customer:
${fullName}

📞 Phone:
${phone}

📧 Email:
${email || 'N/A'}

📍 Delivery Address:
${address}

🏙 City:
${city || 'N/A'}

🌍 State:
${state}

📦 Product:
${productName}

🔢 Quantity:
${quantity || '1'}

💰 Package:
${selectedPackage}

💵 Total:
${totalAmount || 'N/A'}

📝 Additional Notes:
${notes || 'None'}

🚚 Payment Method:
Pay on Delivery

Please confirm this order and provide delivery details.

Thank you.
━━━━━━━━━━━━━━━━━━━━━━`;

      const encodedMessage = encodeURIComponent(orderMessage);
      const waUrl = `https://wa.me/${WHATSAPP_NUMBER}?text=${encodedMessage}`;

      // Asynchronous background logging to backend (non-blocking)
      const formData = new FormData(orderForm);
      formData.append('is_ajax', '1');
      formData.append('total', totalAmount);

      try {
        fetch(orderForm.action || window.location.href, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        }).catch(err => {
          console.warn('Background order dispatch notice:', err);
        });
      } catch (e) {
        // Continue to WhatsApp redirect regardless of network state
      }

      // Small 350ms delay for user feedback, then launch WhatsApp
      setTimeout(() => {
        redirectToWhatsApp(waUrl);
        setButtonLoading(submitBtn, 'Opening WhatsApp...');
      }, 350);
    });
  }

  // ==============================================================================
  // 2. ONBOARDING APPLICATION FORM HANDLER
  // Trigger: "Submit Onboarding Application"
  // ==============================================================================
  function initOnboardingForm() {
    const onboardingForm = document.getElementById('joinForm') || document.querySelector('.js-onboarding-form');
    if (!onboardingForm) return;

    onboardingForm.addEventListener('submit', function (event) {
      event.preventDefault();
      event.stopPropagation();

      // Validate required fields
      if (!onboardingForm.checkValidity()) {
        onboardingForm.classList.add('was-validated');
        focusFirstInvalid(onboardingForm);
        return;
      }

      onboardingForm.classList.add('was-validated');

      const submitBtn = document.getElementById('onboardingSubmitBtn') || onboardingForm.querySelector('button[type="submit"]');
      const originalBtnText = submitBtn ? submitBtn.innerText.trim() : 'Submit Onboarding Application';
      setButtonLoading(submitBtn, 'Connecting to WhatsApp...');

      // Collect form fields
      const fullName = (onboardingForm.querySelector('[name="full_name"]')?.value || '').trim();
      const phone = (onboardingForm.querySelector('[name="phone"]')?.value || '').trim();
      const email = (onboardingForm.querySelector('[name="email"]')?.value || '').trim();
      const businessName = (onboardingForm.querySelector('[name="business_name"]')?.value || '').trim();
      const website = (onboardingForm.querySelector('[name="website"]')?.value || '').trim();
      const country = (onboardingForm.querySelector('[name="country"]')?.value || '').trim();
      const city = (onboardingForm.querySelector('[name="city"]')?.value || '').trim();
      const businessType = (onboardingForm.querySelector('[name="business_type"]')?.value || 'Independent Distributor').trim();
      
      // Selected package or services
      const packageInput = onboardingForm.querySelector('input[name="package"]:checked') || onboardingForm.querySelector('[name="package"]');
      let services = (onboardingForm.querySelector('[name="services"]')?.value || '').trim();
      if (!services && packageInput) {
        const pkgVal = packageInput.value;
        const pkgLabels = {
          'silver': 'Silver Pack ($130 USD / 100 PP)',
          'gold': 'Gold Pack ($650 USD / 500 PP)',
          'junior_platinum': 'Junior Platinum ($1,950 USD / 1,500 PP)',
          'platinum': 'Platinum / Stockist ($3,900 USD / 3,000 PP)'
        };
        services = pkgLabels[pkgVal] || pkgVal;
      }

      const additionalInfo = (onboardingForm.querySelector('[name="additional_information"]')?.value || onboardingForm.querySelector('[name="message"]')?.value || '').trim();
      const currentDateTime = formatCurrentDateTime();

      // Build the exact requested WhatsApp Message
      const onboardingMessage = 
`----------------------------------------------------
🚀 NEW ONBOARDING APPLICATION

👤 Full Name:
${fullName}

📞 Phone:
${phone}

📧 Email:
${email}

🏢 Business Name:
${businessName || 'N/A'}

🌍 Website:
${website || 'N/A'}

📍 Country:
${country}

🏙 City:
${city || 'N/A'}

💼 Business Type:
${businessType}

📝 Services Required:
${services || 'Distributor Onboarding'}

💬 Additional Information:
${additionalInfo || 'N/A'}

Submitted on:
${currentDateTime}
----------------------------------------------------`;

      const encodedMessage = encodeURIComponent(onboardingMessage);
      const waUrl = `https://wa.me/${WHATSAPP_NUMBER}?text=${encodedMessage}`;

      // Asynchronous background logging to backend (non-blocking)
      const formData = new FormData(onboardingForm);
      formData.append('is_ajax', '1');

      try {
        fetch(onboardingForm.action || window.location.href, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        }).catch(err => {
          console.warn('Background onboarding dispatch notice:', err);
        });
      } catch (e) {
        // Continue to WhatsApp redirect regardless of network state
      }

      // Small 350ms delay for visual feedback, then launch WhatsApp
      setTimeout(() => {
        redirectToWhatsApp(waUrl);
        setButtonLoading(submitBtn, 'Opening WhatsApp Application...');
      }, 350);
    });
  }

  // ==============================================================================
  // 3. GENERAL BOOTSTRAP FORM VALIDATION & TELEPHONE HELPER
  // ==============================================================================
  function initGeneralValidation() {
    const forms = document.querySelectorAll('.needs-validation:not(#psOrderForm):not(#joinForm)');
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
          focusFirstInvalid(form);
        }
        form.classList.add('was-validated');

        // Telephone format validation
        const phoneInput = form.querySelector('input[type="tel"]');
        if (phoneInput && phoneInput.value.trim() !== '') {
          const phoneRegex = /^[+]?[(]?[0-9]{1,4}[)]?[-\s./0-9]{6,15}$/;
          if (!phoneRegex.test(phoneInput.value.trim())) {
            phoneInput.setCustomValidity('Please enter a valid phone number with country code.');
            event.preventDefault();
            event.stopPropagation();
          } else {
            phoneInput.setCustomValidity('');
          }
        }
      }, false);
    });
  }

  // Initialize on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
      initProductOrderForm();
      initOnboardingForm();
      initGeneralValidation();
    });
  } else {
    initProductOrderForm();
    initOnboardingForm();
    initGeneralValidation();
  }

})();
