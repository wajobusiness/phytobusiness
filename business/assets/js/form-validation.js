/**
 * PhytoScience Wellness - Form Validation & UX Enhancements
 */

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  const forms = document.querySelectorAll('.needs-validation');

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }

      // Add feedback class
      form.classList.add('was-validated');

      // Check phone format if provided
      const phoneInput = form.querySelector('input[type="tel"]');
      if (phoneInput && phoneInput.value.trim() !== '') {
        const phoneRegex = /^[+]?[(]?[0-9]{1,4}[)]?[-\s./0-9]{6,15}$/;
        if (!phoneRegex.test(phoneInput.value.trim())) {
          phoneInput.setCustomValidity('Please enter a valid telephone or WhatsApp number with country code.');
          event.preventDefault();
          event.stopPropagation();
        } else {
          phoneInput.setCustomValidity('');
        }
      }
    }, false);
  });
});

