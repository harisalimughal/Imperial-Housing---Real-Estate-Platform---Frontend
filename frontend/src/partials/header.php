<!-- Header -->
<header class="bg-white shadow-sm border-b px-10">
  <div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
      <!-- Logo -->
      <div class="flex items-center space-x-2">
      <img src="/public/assets/images/LogoBgblack.png" alt="Imperial Housing" class="w-16 h-16 object-contain">
      </div>
      
      <!-- Navigation -->
      <nav class="hidden md:flex items-center space-x-8">
  <a href="/src/pages/index.php" class="nav-link text-gray-700 hover:brand-yellow transition-colors duration-200">Home</a>
  <a href="/src/pages/about.php" class="nav-link text-gray-700 hover:brand-yellow transition-colors duration-200">About</a>
  <a href="/src/pages/properties.php" class="nav-link text-gray-700 hover:brand-yellow transition-colors duration-200">Properties</a>

        <!-- Services dropdown -->
        <div class="relative group">
          <button id="servicesBtn" aria-expanded="false" class="text-gray-700 hover:brand-yellow transition-all duration-200 flex items-center space-x-2 focus:outline-none focus:brand-yellow">
            <span>Services</span>
            <svg id="servicesCaret" class="w-4 h-4 transform transition-transform duration-200 group-hover:rotate-180" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
          </button>
          <div id="servicesMenu" class="opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 absolute right-0 mt-2 w-56 bg-white text-gray-700 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50 py-1 transform translate-y-1 group-hover:translate-y-0">
            <a href="/src/pages/services.php#hmo" class="block px-4 py-2 text-sm text-gray-700 hover:brand-yellow transition-colors duration-150">HMO (Support Living)</a>
            <a href="/src/pages/services.php#design" class="block px-4 py-2 text-sm text-gray-700 hover:brand-yellow transition-colors duration-150">Design & Renovation</a>
          </div>
        </div>

  <a href="/src/pages/testimonials.php" class="nav-link text-gray-700 hover:brand-yellow transition-colors duration-200">Testimonials</a>
  <a href="/src/pages/tenants.php" class="nav-link text-gray-700 hover:brand-yellow transition-colors duration-200">Tenants</a>
  <a href="/src/pages/contact.php" class="nav-link text-gray-700 hover:brand-yellow transition-colors duration-200">Contact</a>
      </nav>
      
      <!-- CTA Button -->
      <div class="flex items-center space-x-5">
        <a href="/src/pages/contact.php" class="inline-block bg-[#151EA6] hover:bg-[#0f1790] text-white px-6 md:px-8 py-2 md:py-3 rounded-2xl font-medium text-sm md:text-base transition-shadow shadow-sm"> 
          Book Now
        </a>
        
        <!-- Mobile Menu Button -->
        <button id="mobileMenuBtn" class="md:hidden p-2 hover:bg-gray-100 rounded transition-colors">
          <svg class="w-6 h-6 text-gray-700 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>

  <!-- Backdrop for mobile menu -->
  <div id="mobileMenuBackdrop" class="hidden fixed inset-0 bg-black bg-opacity-70 z-40"></div>

  <!-- Mobile menu: fixed overlay with centered panel so it doesn't push page content -->
  <div id="mobileMenu" class="md:hidden hidden fixed inset-0 z-50 overflow-auto">
  <div class="flex items-start justify-center min-h-full pt-16 px-4 pb-6">
  <div id="mobileMenuPanel" class="w-full max-w-md bg-white rounded-2xl shadow-2xl ring-1 ring-black ring-opacity-5 overflow-hidden pointer-events-auto opacity-0 scale-95 translate-y-2 transform transition-all duration-300 ease-out">
        <div class="flex items-center justify-between px-6 py-4 border-b">
          <div class="flex items-center space-x-2">
            <img src="/public/assets/images/LogoBgblack.png" alt="Imperial Housing" class="w-12 h-12 object-contain">
          </div>
          <button id="mobileMenuCloseBtn" data-pressable="true" class="p-2 rounded hover:bg-red-100">
            <svg class="w-6 h-6 text-gray-700 transform transition-transform duration-200 hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
          </button>
        </div>
        <div class="px-6 py-4 space-y-2">
          <a href="/src/pages/index.php" class="block py-2 text-gray-700 hover:brand-yellow">Home</a>
          <a href="/src/pages/about.php" class="block py-2 text-gray-700 hover:brand-yellow">About</a>
          <a href="/src/pages/properties.php" class="block py-2 text-gray-700 hover:brand-yellow">Properties</a>
          <div class="border-t my-2"></div>
          <!-- Mobile services toggle -->
          <button id="mobileServicesBtn" aria-expanded="false" class="w-full text-left py-2 text-gray-700 font-medium flex items-center justify-between">
            <span>Services</span>
            <svg class="w-4 h-4 text-gray-700 transform transition-transform mobile-services-caret" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
          </button>
          <div id="mobileServicesMenu" class="pl-4 hidden">
            <a href="/src/pages/services.php#hmo" class="block py-1 text-gray-600 hover:brand-yellow">HMO (Support Living)</a>
            <a href="/src/pages/services.php#design" class="block py-1 text-gray-600 hover:brand-yellow">Design & Renovation</a>
          </div>
          <a href="/src/pages/testimonials.php" class="block py-2 text-gray-700 hover:brand-yellow">Testimonials</a>
          <a href="/src/pages/tenants.php" class="block py-2 text-gray-700 hover:brand-yellow">Tenants</a>
          <a href="/src/pages/contact.php" class="block py-2 text-gray-700 hover:brand-yellow">Contact</a>
        </div>
      </div>
    </div>
  </div>
  </div>
</header>