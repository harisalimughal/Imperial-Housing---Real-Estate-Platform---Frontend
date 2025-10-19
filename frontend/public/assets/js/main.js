// Enhanced mobile menu toggle for PHP includes
document.addEventListener('DOMContentLoaded', () => {
  // Global guard to avoid double-initialization when the script is loaded twice
  if (window.__imperialMobileMenuInitialized) return;
  window.__imperialMobileMenuInitialized = true;

  // Function to setup hamburger menu
  function setupMobileMenu() {
    const btn = document.getElementById('mobileMenuBtn');
    const menu = document.getElementById('mobileMenu');
    const panel = document.getElementById('mobileMenuPanel');
    const closeBtn = document.getElementById('mobileMenuCloseBtn');

    if (btn && menu) {
      // Protect against binding the same handler multiple times
      if (btn.dataset.mobileMenuBound === '1') return;

      // centralized toggle to animate panel and rotate hamburger
      function toggleMenu() {
        const backdrop = document.getElementById('mobileMenuBackdrop');
        const svg = btn.querySelector('svg');
        const isHidden = menu.classList.contains('hidden');

        if (isHidden) {
          // opening: show container, backdrop, then animate panel in
          menu.classList.remove('hidden');
          if (backdrop) backdrop.classList.remove('hidden');
          document.body.classList.add('overflow-hidden');
          // animate panel from scale/opacity
          if (panel) {
            // force reflow to pick up transition
            panel.getBoundingClientRect();
            panel.classList.remove('opacity-0', 'scale-95', 'translate-y-2');
            panel.classList.add('opacity-100', 'scale-100', 'translate-y-0');
          }
          if (svg) svg.classList.add('rotate-90');
        } else {
          // closing: animate panel out then hide container
          if (panel) {
            panel.classList.remove('opacity-100', 'scale-100', 'translate-y-0');
            panel.classList.add('opacity-0', 'scale-95', 'translate-y-2');
            // wait for transition to finish
            const onEnd = function(e) {
              if (e.target !== panel) return;
              panel.removeEventListener('transitionend', onEnd);
              menu.classList.add('hidden');
            };
            panel.addEventListener('transitionend', onEnd);
          } else {
            menu.classList.add('hidden');
          }
          if (backdrop) backdrop.classList.add('hidden');
          document.body.classList.remove('overflow-hidden');
          if (svg) svg.classList.remove('rotate-90');
        }
      }

      btn.addEventListener('click', function(e) {
        e.preventDefault();
        toggleMenu();
      });

      // mark bound so re-runs won't attach another listener
      btn.dataset.mobileMenuBound = '1';
    }
  }

  // Mobile services submenu toggle
  function setupMobileServices() {
    const svcBtn = document.getElementById('mobileServicesBtn');
    const svcMenu = document.getElementById('mobileServicesMenu');
    if (!svcBtn || !svcMenu) return;

    if (svcBtn.dataset.bound === '1') return;

    svcBtn.addEventListener('click', function(e) {
      e.preventDefault();
      const expanded = svcBtn.getAttribute('aria-expanded') === 'true';
      svcBtn.setAttribute('aria-expanded', String(!expanded));
      svcMenu.classList.toggle('hidden');
      // rotate caret
      const caret = svcBtn.querySelector('.mobile-services-caret');
      if (caret) caret.classList.toggle('rotate-180');
    });

    svcBtn.dataset.bound = '1';
  }

  // Initialize
  setupMobileMenu();
  setupMobileServices();

  // Close behavior: close button and Escape key
  (function setupCloseHandlers() {
    const menu = document.getElementById('mobileMenu');
    const close = document.getElementById('mobileMenuCloseBtn');
    const backdrop = document.getElementById('mobileMenuBackdrop');
    if (!menu) return;

    // reuse toggleMenu if available on the btn scope
    const btn = document.getElementById('mobileMenuBtn');
    const toggleMenu = btn && btn.onclick && typeof btn.onclick === 'function' ? btn.onclick : null;

    if (close && close.dataset && close.dataset.bound !== '1') {
      close.addEventListener('click', function() {
        // if our toggle function is on the node via event listener, call the btn click
        if (btn) btn.click();
        else {
          menu.classList.add('hidden');
          if (backdrop) backdrop.classList.add('hidden');
          document.body.classList.remove('overflow-hidden');
        }
      });
      close.dataset.bound = '1';
    }

    // touch / pointer visual feedback for close button: rotate and light red bg
    if (close && close.dataset && close.dataset.pressBound !== '1') {
      const svg = close.querySelector('svg');
      const addPressed = () => {
        close.classList.add('bg-red-100');
        if (svg) svg.classList.add('rotate-90');
      };
      const removePressed = () => {
        close.classList.remove('bg-red-100');
        if (svg) svg.classList.remove('rotate-90');
      };

      // Pointer events (preferred) and touch fallbacks
      close.addEventListener('pointerdown', addPressed);
      close.addEventListener('pointerup', removePressed);
      close.addEventListener('pointercancel', removePressed);
      close.addEventListener('pointerleave', removePressed);

      // Fallback for older touch-only browsers
      close.addEventListener('touchstart', addPressed, {passive: true});
      close.addEventListener('touchend', removePressed);

      close.dataset.pressBound = '1';
    }

    if (backdrop && !backdrop.dataset.bound) {
      backdrop.addEventListener('click', function() {
        if (btn) btn.click();
        else {
          menu.classList.add('hidden');
          backdrop.classList.add('hidden');
          document.body.classList.remove('overflow-hidden');
        }
      });
      backdrop.dataset.bound = '1';
    }

    // close on Escape
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && !menu.classList.contains('hidden')) {
        if (btn) btn.click();
        else {
          menu.classList.add('hidden');
          document.body.classList.remove('overflow-hidden');
        }
      }
    });
  })();

  // hero carousel handled inline in page-specific scripts
});
