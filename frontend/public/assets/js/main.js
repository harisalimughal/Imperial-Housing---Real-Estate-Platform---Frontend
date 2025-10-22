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

// Centralized hero slideshow (works on any page that includes the hero partial)
(function() {
  if (window.__imperialHeroInitialized) return;
  window.__imperialHeroInitialized = true;

  function initHero() {
    try {
      const heroEl = document.getElementById('heroRoot');
      if (!heroEl) return;

      const data = heroEl.dataset && heroEl.dataset.heroImages ? heroEl.dataset.heroImages.split(',').map(s=>s.trim()).filter(Boolean) : [];
      const images = data.length ? data : ['/public/assets/images/hero1.png','/public/assets/images/hero2.png'];
      let idx = 0;

      const nextBtn = document.getElementById('heroNext');
      const prevBtn = document.getElementById('heroPrev');

      let overlay = document.getElementById('heroOverlay');
      if (!overlay) {
        overlay = document.createElement('div');
        overlay.id = 'heroOverlay';
        overlay.className = 'absolute inset-0 bg-cover bg-center transition-opacity duration-700 opacity-0 pointer-events-none';
        heroEl.parentElement.appendChild(overlay);
      }

      function setBackground(i, instant) {
        const url = images[i % images.length];
        overlay.style.backgroundImage = "linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('" + url + "')";
        if (instant) {
          overlay.classList.remove('opacity-0');
          overlay.classList.add('opacity-100');
          heroEl.style.backgroundImage = overlay.style.backgroundImage;
          overlay.classList.remove('opacity-100');
          overlay.classList.add('opacity-0');
        } else {
          overlay.classList.remove('opacity-0');
          overlay.classList.add('opacity-100');
          overlay.addEventListener('transitionend', function onEnd() {
            overlay.removeEventListener('transitionend', onEnd);
            heroEl.style.backgroundImage = overlay.style.backgroundImage;
            overlay.classList.remove('opacity-100');
            overlay.classList.add('opacity-0');
          });
        }
      }

      function next() {
        idx = (idx + 1) % images.length;
        setBackground(idx, false);
      }

      function prev() {
        idx = (idx - 1 + images.length) % images.length;
        setBackground(idx, false);
      }

      if (nextBtn && !nextBtn.dataset.bound) {
        nextBtn.addEventListener('click', function(e){ e.preventDefault(); next(); });
        nextBtn.dataset.bound = '1';
      }
      if (prevBtn && !prevBtn.dataset.bound) {
        prevBtn.addEventListener('click', function(e){ e.preventDefault(); prev(); });
        prevBtn.dataset.bound = '1';
      }

      // Initial set
      setBackground(idx, true);

      // Auto-advance
      setInterval(next, 5000);

    } catch (e) {
      console && console.warn && console.warn('hero init error', e);
    }
  }

  // Initialize on DOM ready or immediately if already loaded
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initHero);
  } else {
    initHero();
  }
})();

// Properties carousel: make it dynamic and page-agnostic
(function() {
  if (window.__imperialPropertiesInit) return;
  window.__imperialPropertiesInit = true;

  function initPropertiesCarousel() {
    const carousel = document.querySelector('.properties-carousel');
    const navBtns = document.querySelectorAll('.carousel-nav-btn');
    if (!carousel || !navBtns.length) return;

    let currentPage = 0;
    const pages = carousel.querySelectorAll('.properties-page');
    const totalPages = pages.length || 1;

    function updateCarousel() {
      const translateX = -(currentPage * 100);
      carousel.style.transform = `translateX(${translateX}%)`;
      navBtns.forEach((btn, index) => {
        if (index === currentPage) {
          btn.className = 'carousel-nav-btn w-8 h-8 rounded bg-[#FCB305] text-white font-semibold text-sm flex items-center justify-center transition-colors';
          btn.setAttribute('data-active', 'true');
        } else {
          btn.className = 'carousel-nav-btn w-8 h-8 rounded bg-gray-200 text-gray-600 font-semibold text-sm flex items-center justify-center hover:bg-gray-300 transition-colors';
          btn.removeAttribute('data-active');
        }
      });
    }

    navBtns.forEach((btn, index) => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        currentPage = index;
        updateCarousel();
      });
    });

    updateCarousel();
      // External next/prev controls (buttons outside the cards)
      const prevArrow = document.getElementById('propertiesPrev');
      const nextArrow = document.getElementById('propertiesNext');
      if (prevArrow && !prevArrow.dataset.bound) {
        prevArrow.addEventListener('click', function(e){
          e.preventDefault();
          currentPage = Math.max(0, currentPage - 1);
          updateCarousel();
        });
        prevArrow.dataset.bound = '1';
      }
      if (nextArrow && !nextArrow.dataset.bound) {
        nextArrow.addEventListener('click', function(e){
          e.preventDefault();
          currentPage = Math.min(totalPages - 1, currentPage + 1);
          updateCarousel();
        });
        nextArrow.dataset.bound = '1';
      }
  }

  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', initPropertiesCarousel);
  else initPropertiesCarousel();
})();

// Tenants horizontal carousel controls — arrows only (no manual scrolling)
(function() {
  function initTenantsCarousel() {
    const container = document.querySelector('.tenants-carousel');
    const next = document.getElementById('tenantsNext');
    const prev = document.getElementById('tenantsPrev');
    if (!container || (!next && !prev)) return;

    // compute scroll amount based on first card width + gap
    function computeScrollAmount() {
      const cards = container.querySelectorAll('.flex-shrink-0');
      if (!cards || cards.length === 0) return Math.round(container.clientWidth * 0.8);
      const first = cards[0].getBoundingClientRect();
      let gap = 0;
      if (cards.length > 1) {
        const second = cards[1].getBoundingClientRect();
        gap = Math.round(second.left - first.right);
      }
      return Math.round(first.width + gap);
    }

    function scrollByAmount(amount) {
      // animate using smooth behavior
      container.scrollBy({ left: amount, behavior: 'smooth' });
    }

    // bind buttons
    if (next && !next.dataset.bound) {
      next.addEventListener('click', function(e) {
        e.preventDefault();
        const amt = computeScrollAmount();
        scrollByAmount(amt);
      });
      next.dataset.bound = '1';
    }

    if (prev && !prev.dataset.bound) {
      prev.addEventListener('click', function(e) {
        e.preventDefault();
        const amt = computeScrollAmount();
        scrollByAmount(-amt);
      });
      prev.dataset.bound = '1';
    }

    // Prevent accidental wheel or touch scroll on the container (arrows only)
    if (!container.dataset.scrollGuard) {
      container.addEventListener('wheel', function(e){ e.preventDefault(); }, { passive: false });
      container.addEventListener('touchmove', function(e){ e.preventDefault(); }, { passive: false });
      container.dataset.scrollGuard = '1';
    }
  }

  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', initTenantsCarousel);
  else initTenantsCarousel();
})();
