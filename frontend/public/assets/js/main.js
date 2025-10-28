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

// Custom pointer: light dot that follows the mouse with slight smoothing
(function(){
  if (window.__imperialCursorInitialized) return;
  window.__imperialCursorInitialized = true;

  // don't run on touch devices or if reduced motion is requested
  try {
    if (window.matchMedia && window.matchMedia('(pointer: coarse)').matches) return;
    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  } catch(e) {}

  function isInteractive(el){
    if(!el) return false;
    try{
      return el.closest && (
        el.closest('a, button, input, textarea, select, [role="button"], [data-cursor-hover]')
      );
    }catch(e){ return false; }
  }

  document.addEventListener('DOMContentLoaded', function(){
    // create cursor element
    var cursor = document.createElement('div');
    cursor.className = 'custom-cursor';
    cursor.setAttribute('aria-hidden','true');
    document.body.appendChild(cursor);

    var mouseX = window.innerWidth/2, mouseY = window.innerHeight/2;
    var curX = mouseX, curY = mouseY;
    var rafId = null;

    function onMove(e){
      mouseX = e.clientX;
      mouseY = e.clientY;
      // ensure cursor is visible when pointer moves
      if(cursor.style.display === 'none') cursor.style.display = '';
    }

    function loop(){
      // basic lerp for smooth trailing
      curX += (mouseX - curX) * 0.22;
      curY += (mouseY - curY) * 0.22;
      cursor.style.left = curX + 'px';
      cursor.style.top = curY + 'px';
      rafId = requestAnimationFrame(loop);
    }

    // enlarge when hovering interactive elements
    var hoverTargets = 'a, button, input, textarea, select, [role="button"]';

    function onPointerOver(e){
      var target = e.target;
      if (isInteractive(target)) cursor.classList.add('cursor--hover');
    }
    function onPointerOut(e){
      var related = e.relatedTarget;
      // if leaving to another interactive element keep hover state
      if (isInteractive(related)) return;
      cursor.classList.remove('cursor--hover');
    }

    // hide cursor on pointerdown briefly to avoid visual clutter when tapping
    function onPointerDown(){ cursor.style.opacity = '0.6'; cursor.style.transform = 'translate(-50%,-50%) scale(0.9)'; }
    function onPointerUp(){ cursor.style.opacity = ''; cursor.style.transform = ''; }

    // keyboard navigation: hide custom cursor when tabbing so focus rings are clear
    function onFirstTab(e){
      if (e.key === 'Tab') {
        document.documentElement.classList.add('keyboard-navigation');
        window.removeEventListener('keydown', onFirstTab);
      }
    }

    // attach events
    window.addEventListener('pointermove', onMove, {passive:true});
    document.addEventListener('pointerover', onPointerOver, true);
    document.addEventListener('pointerout', onPointerOut, true);
    document.addEventListener('pointerdown', onPointerDown, true);
    document.addEventListener('pointerup', onPointerUp, true);
    window.addEventListener('keydown', onFirstTab, true);

    // Start loop
    loop();

    // Hide cursor when leaving window
    window.addEventListener('mouseout', function(e){
      if (!e.relatedTarget && !e.toElement) cursor.style.display = 'none';
    });
    window.addEventListener('mouseover', function(){ cursor.style.display = ''; });
  });
})();

// Global reveal-on-scroll initializer
(function(){
  if (window.__imperialRevealInitialized) return;
  window.__imperialRevealInitialized = true;

  function initReveal(){
    try {
      if(!('IntersectionObserver' in window)){
        document.querySelectorAll('.reveal').forEach(function(el){ el.classList.add('revealed'); });
        return;
      }

      // Auto-apply .reveal to direct children of containers we care about (grid sections)
      document.querySelectorAll('.grid, .properties-grid, .max-w-6xl, .max-w-7xl').forEach(function(grid){
        Array.from(grid.children).forEach(function(child){
          if(!(child instanceof HTMLElement)) return;
          if(child.classList.contains('reveal')) return;
          child.classList.add('reveal');
          // choose left or right based on center
          try{
            var r = child.getBoundingClientRect();
            var cx = r.left + r.width/2;
            if(cx < window.innerWidth/2) child.classList.add('reveal-left'); else child.classList.add('reveal-right');
          }catch(e){}
        });
      });

      var obs = new IntersectionObserver(function(entries, observer){
        entries.forEach(function(entry){
          if(entry.isIntersecting){
            entry.target.classList.add('revealed');
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.12, rootMargin: '0px 0px -10% 0px' });

      document.querySelectorAll('.reveal').forEach(function(el){ obs.observe(el); });
    } catch(e) { console && console.warn && console.warn('reveal init error', e); }
  }

  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', initReveal); else initReveal();
})();


// Testimonials carousel simple slider
(function(){
  function initTestimonials() {
    const track = document.getElementById('testimonialsTrack');
    const prev = document.getElementById('testimonialsPrev');
    const next = document.getElementById('testimonialsNext');
    if (!track || (!prev && !next)) return;

    const slides = track.children.length;
    let index = 0;

    function update() {
      track.style.transform = `translateX(${-index * 100}%)`;
    }

    if (prev && !prev.dataset.bound) {
      prev.addEventListener('click', function(e){ e.preventDefault(); index = Math.max(0, index - 1); update(); });
      prev.dataset.bound = '1';
    }
    if (next && !next.dataset.bound) {
      next.addEventListener('click', function(e){ e.preventDefault(); index = Math.min(slides - 1, index + 1); update(); });
      next.dataset.bound = '1';
    }
  }

  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', initTestimonials);
  else initTestimonials();
})();

// Count-up animation for stats (animates when visible)
(function() {
  function animateCount(el, target, duration) {
    const start = 0;
    const range = target - start;
    const startTime = performance.now();

    function step(now) {
      const elapsed = now - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const eased = progress < 0.5 ? (2 * progress * progress) : (-1 + (4 - 2 * progress) * progress); // easeInOutQuad-ish
      const value = Math.floor(start + eased * range);
      el.textContent = value;
      if (progress < 1) requestAnimationFrame(step);
      else el.textContent = String(target);
    }

    requestAnimationFrame(step);
  }

  function initCountups() {
    const nodes = Array.from(document.querySelectorAll('.countup'));
    if (!nodes.length) return;

    // Observer that starts animation on enter and resets on leave, so it runs each time
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        const el = entry.target;
        const target = parseInt(el.getAttribute('data-target') || '0', 10) || 0;
        const duration = parseInt(el.getAttribute('data-duration') || '1800', 10);

        if (entry.isIntersecting) {
          // start from 0 each time we enter
          el.textContent = '0';
          // small timeout to ensure text updates before animation
          setTimeout(() => animateCount(el, target, duration), 50);
        } else {
          // reset so it can animate again on next enter
          el.textContent = '0';
        }
      });
    }, { threshold: 0.4 });

    nodes.forEach(n => observer.observe(n));
  }

  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', initCountups);
  else initCountups();
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
