<?php 
// Prevent caching to fix back button issues
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Include data file
require_once __DIR__ . '/../data/properties.php';

// Get current page from URL parameter, default to 1
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 18; // Show 18 properties per page (6 rows x 3 columns)

// Get paginated properties
$result = paginateProperties(getProperties(), $currentPage, $perPage);
$properties = $result['properties'];
$pagination = $result['pagination'];
// Helpful debug: visit /properties.php?debug=1 to see how many properties were returned for this page
if (isset($_GET['debug']) && $_GET['debug'] == '1') {
  echo '<pre style="background:#111;color:#fff;padding:12px;border-radius:8px;">';
  echo "properties on this page: " . count($properties) . "\n";
  echo "ids: ";
  print_r(array_column($properties, 'id'));
  echo '</pre>';
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Properties | Imperial Housing</title>
  <meta name="description" content="Browse all available properties at Imperial Housing.">
  <link rel="stylesheet" href="/public/assets/css/styles.css">
  <link rel="icon" href="/public/assets/images/logo.png" type="image/png">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'brand-yellow': '#FCB305',
          }
        }
      }
    }
  </script>
  <style>
    :root {
      --brand-yellow: #FCB305;
    }
    .text-brand-yellow {
      color: var(--brand-yellow);
    }
    .bg-brand-yellow {
      background-color: var(--brand-yellow);
    }
    
    /* Custom Range Slider */
    .range-slider::-webkit-slider-thumb {
      appearance: none;
      height: 20px;
      width: 20px;
      border-radius: 50%;
      background: #FCB305;
      cursor: pointer;
      border: 3px solid white;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    
    .range-slider::-moz-range-thumb {
      height: 20px;
      width: 20px;
      border-radius: 50%;
      background: #FCB305;
      cursor: pointer;
      border: 3px solid white;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    
    .range-slider::-webkit-slider-track {
      height: 8px;
      border-radius: 4px;
      background: #e5e7eb;
    }
    
    .range-slider::-moz-range-track {
      height: 8px;
      border-radius: 4px;
      background: #e5e7eb;
      border: none;
    }
    
    /* Custom Select Dropdown */
    .custom-select {
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
    }
    
    .custom-select::-ms-expand {
      display: none;
    }

    /* Property Card Hover Effects */
    .property-card {
      position: relative;
      overflow: visible;
      transition: transform 0.3s ease;
    }

    .property-popup {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: auto;
      background: white;
      border-radius: 1.5rem;
      opacity: 0;
      transform: scale(0.95) translateY(20px);
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      pointer-events: none;
      z-index: 20;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(0, 0, 0, 0.05);
      /* no inner border so image can touch edges */
      overflow: hidden;
    }

    /* Ensure parent containers don't clip the popup */
    .max-w-6xl, .container, .properties-grid, .max-w-7xl {
      overflow: visible !important;
    }

    /* Higher stacking for property popups */
    .property-popup { z-index: 9999; }

    .property-card:hover {
      transform: translateY(-5px);
      z-index: 30;
    }

    .property-card:hover .property-popup {
      opacity: 1;
      transform: scale(1) translateY(-10px);
      pointer-events: auto;
    }

    /* Properties page specific popup sizing */
    .property-popup.properties-listing {
      width: 300px !important;
      height: auto !important;
      max-height: 420px !important;
      left: 50% !important;
      transform: translateX(-50%) scale(0.95) translateY(20px) !important;
      z-index: 9999 !important;
    }

    .property-card:hover .property-popup.properties-listing {
      opacity: 1;
      transform: translateX(-50%) scale(1) translateY(-10px) !important;
      pointer-events: auto;
    }

    .property-popup.properties-listing img {
      width: 300px !important;
      height: 200px !important;
      object-fit: cover !important;
      display: block;
    }

    /* Mobile: make the popup inline and full-width so it doesn't overflow */
    @media (max-width: 767px) {
      .property-popup.properties-listing {
        position: relative !important;
        width: 100% !important;
        left: 0 !important;
        transform: none !important;
        max-height: none !important;
        box-shadow: none !important;
        margin-top: 8px;
      }
      .property-popup.properties-listing img {
        width: 100% !important;
        height: 200px !important;
        object-fit: cover !important;
      }
      /* ensure hover rules still reveal popup on mobile if needed */
      .property-card:hover .property-popup {
        opacity: 1;
        transform: none;
        pointer-events: auto;
      }
    }

    /* Add breathing room around hovered cards */
    .properties-grid {
      padding: 20px 0;
    }
  </style>
</head>
<body>
  <?php include 'header.php'; ?>

  <?php
  $heroTitle = 'Featured Properties';
  $heroSubtitle = 'Browse our latest listings and find your next home';
  $heroImages = '/public/assets/images/hero1.jpg,/public/assets/images/hero2.jpg';
  include 'hero.php';
  ?>

  <!-- Properties Section -->
  <section class="py-32 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
      <div class="text-center mb-16">
        <h1 class="text-5xl font-bold mb-4 text-gray-800">All Properties</h1>
        <p class="text-xl text-gray-600">Discover your perfect home from our extensive collection</p>
      </div>

  <div class="flex flex-col lg:flex-row gap-8">
        <!-- Filter Sidebar -->
        <div class="w-full lg:w-80 flex-shrink-0">
          <div class="bg-white rounded-2xl p-6 shadow-lg lg:sticky lg:top-8">
            <h2 class="text-xl font-bold mb-6 text-gray-800">Find Your Property</h2>
            
            <!-- Location -->
            <div class="mb-6">
              <label class="block text-sm font-semibold text-gray-700 mb-2">Location</label>
              <div class="relative">
                <select id="locationSelect" class="custom-select w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#FCB305] focus:border-transparent">
                  <option>Birmingham</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                  <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </div>
              </div>
            </div>

            <!-- Property Area -->
            <div class="mb-6">
              <label class="block text-sm font-semibold text-gray-700 mb-2">Property Area</label>
              <div class="relative">
                <select id="areaSelect" class="custom-select w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#FCB305] focus:border-transparent">
                  <option>Select your Area</option>
                  <option>Hodge Hill</option>
                  <option>Winson Green</option>
                  <option>Erdington</option>
                  <option>Lozells</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                  <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </div>
              </div>
            </div>

            <!-- Property Type -->
            <div class="mb-6">
              <label class="block text-sm font-semibold text-gray-700 mb-2">Property Type</label>
              <div class="relative">
                <select id="typeSelect" class="custom-select w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#FCB305] focus:border-transparent">
                  <option>Select your Type</option>
                  <option>House</option>
                  <option>Flats</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                  <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </div>
              </div>
            </div>

            <!-- Bedrooms Range -->
            <div class="mb-6">
              <label class="block text-sm font-semibold text-gray-700 mb-2">Bedrooms: <span id="bedroomValue" class="text-[#FCB305] font-bold">1</span></label>
              <div class="flex items-center justify-between text-sm text-gray-600 mb-2">
                <span>01</span>
                <span>10</span>
              </div>
              <div class="relative">
                <input type="range" min="1" max="10" value="1" id="bedroomSlider" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer range-slider">
                <div class="flex justify-between text-xs text-gray-500 mt-1">
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                </div>
              </div>
            </div>

            <!-- Bathroom Range -->
            <div class="mb-6">
              <label class="block text-sm font-semibold text-gray-700 mb-2">Bathroom: <span id="bathroomValue" class="text-[#FCB305] font-bold">1</span></label>
              <div class="flex items-center justify-between text-sm text-gray-600 mb-2">
                <span>01</span>
                <span>10</span>
              </div>
              <div class="relative">
                <input type="range" min="1" max="10" value="1" id="bathroomSlider" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer range-slider">
                <div class="flex justify-between text-xs text-gray-500 mt-1">
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Properties Grid -->
        <div class="flex-1">
          <div class="properties-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12" style="overflow: visible;">
            <?php foreach ($properties as $property): ?>
            <div class="property-card bg-white rounded-3xl shadow-lg hover:shadow-xl transition duration-300 relative" style="overflow: visible;" data-type="<?php echo htmlspecialchars($property['type']); ?>">
              <div class="relative">
                <img src="<?php echo htmlspecialchars($property['image']); ?>" class="h-48 sm:h-64 w-full object-cover rounded-3xl" alt="<?php echo htmlspecialchars($property['title']); ?>">

              </div>
              <div class="p-4 text-center">
                <h3 class="font-bold text-lg mb-2 text-gray-800">
                  <a href="product.php?id=<?php echo $property['id']; ?>" class="hover:text-[#151EA6] transition-colors">
                    <?php echo htmlspecialchars($property['title']); ?>
                  </a>
                </h3>
                <div class="flex items-center justify-center text-gray-600">
                  <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                  </svg>
                  <span class="text-sm"><?php echo htmlspecialchars($property['location']); ?></span>
                </div>
              </div>

              <!-- Hover Popup -->
              <div class="property-popup properties-listing">
                <div class="relative h-full flex flex-col">
                  <img src="<?php echo htmlspecialchars($property['image']); ?>" class="h-48 sm:h-64 w-full object-cover rounded-3xl" alt="<?php echo htmlspecialchars($property['title']); ?>">


                  <div class="p-3 flex-1 flex flex-col">
                    <h3 class="font-bold text-sm mb-1 text-gray-800">
                      <a href="product.php?id=<?php echo $property['id']; ?>" class="hover:text-[#151EA6] transition-colors underline decoration-2 underline-offset-2">
                        <?php echo htmlspecialchars($property['title']); ?>
                      </a>
                    </h3>
                    <div class="flex items-center text-gray-600 mb-2">
                      <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                      </svg>
                      <span class="text-xs"><?php echo htmlspecialchars($property['location']); ?></span>
                    </div>

                    <hr class="border-gray-200 mb-2">

                    <div class="flex justify-center items-center gap-4 text-gray-600 text-xs mb-2">
                      <div class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 640 512"><path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/></svg><span><?php echo $property['bedrooms']; ?> beds</span></div>
                      <div class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 512 512"><path d="M96 77.3c0-7.3 5.9-13.3 13.3-13.3c3.5 0 6.9 1.4 9.4 3.9l14.9 14.9C130 91.8 128 101.7 128 112c0 19.9 7.2 38 19.2 52c-5.3 9.2-4 21.1 3.8 29c9.4 9.4 24.6 9.4 33.9 0L289 89c9.4-9.4 9.4-24.6 0-33.9c-7.9-7.9-19.8-9.1-29-3.8C246 39.2 227.9 32 208 32c-10.3 0-20.2 2-29.2 5.5L163.9 22.6C149.4 8.1 129.7 0 109.3 0C66.6 0 32 34.6 32 77.3V256c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H96V77.3zM32 352v16c0 28.4 12.4 54 32 71.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V464H384v16c0 17.7 14.3 32 32 32s32-14.3 32-32V439.6c19.6-17.6 32-43.1 32-71.6V352H32z"/></svg><span><?php echo $property['bathrooms']; ?> baths</span></div>
                      <div class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 448 512"><path d="M24 0C10.7 0 0 10.7 0 24S10.7 48 24 48h8V196.9c-1.9 1.4-3.8 2.9-5.6 4.4C10.9 214.5 0 232.9 0 256c0 46.9 14.3 84.1 37 112.5c14.2 17.7 31.1 31.3 48.5 41.8L65.6 469.9c-3.3 9.8-1.6 20.5 4.4 28.8s15.7 13.3 26 13.3H352c10.3 0 19.9-4.9 26-13.3s7.7-19.1 4.4-28.8l-19.8-59.5c17.4-10.5 34.3-24.1 48.5-41.8c22.7-28.4 37-65.5 37-112.5c0-23.1-10.9-41.5-26.4-54.6c-1.8-1.5-3.7-3-5.6-4.4V48h8c13.3 0 24-10.7 24-24s-10.7-24-24-24H24zM384 256.3c0 1-.3 2.6-3.8 5.6c-4.8 4.1-14 9-29.3 13.4C320.5 284 276.1 288 224 288s-96.5-4-126.9-12.8c-15.3-4.4-24.5-9.3-29.3-13.4c-3.5-3-3.8-4.6-3.8-5.6l0-.3 0-.1 0 0 0 0c0 0 0 0 0 0s0 0 0 0c0-33.9 4.3-66.6 11.3-95.8c6.9-28.9 16.7-53.1 27.6-68.3c10.7-15 21.8-20.8 28.8-22.7c6.9-1.9 18.1-2.9 34.5-2.9h91.8c16.4 0 27.6 1.1 34.5 2.9c6.9 1.9 18.1 7.7 28.8 22.7c10.9 15.2 20.7 39.4 27.6 68.3c6.9 29.2 11.3 61.9 11.3 95.8l0 0 0 0 0 0 0 .1 0 .3zM216 464h16c13.3 0 24-10.7 24-24s-10.7-24-24-24H216c-13.3 0-24 10.7-24 24s10.7 24 24 24z"/></svg><span><?php echo $property['wc']; ?> WC</span></div>
                    </div>
                  </div>
                </div>

                <!-- Full-width View Property button at bottom with no white space below -->
                <a href="product.php?id=<?php echo $property['id']; ?>" class="block bg-[#FCB305] text-white text-center px-4 py-3 rounded-full font-bold text-sm hover:bg-[#e0a004] transition-colors">
                  View Property
                </a>
              </div>
            </div>
            <?php endforeach; ?>
          </div>

          <!-- Pagination -->
          <div class="flex justify-center items-center gap-4">
            <?php if ($pagination['has_prev']): ?>
              <a href="?page=<?php echo $pagination['current_page'] - 1; ?>" class="px-4 py-2 bg-gray-200 text-gray-600 rounded hover:bg-gray-300 transition-colors">Previous</a>
            <?php endif; ?>
            
            <div class="flex items-center gap-2">
              <?php for ($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                <?php if ($i == $pagination['current_page']): ?>
                  <span class="w-10 h-10 rounded bg-[#FCB305] text-white font-semibold flex items-center justify-center"><?php echo $i; ?></span>
                <?php else: ?>
                  <a href="?page=<?php echo $i; ?>" class="w-10 h-10 rounded bg-gray-200 text-gray-600 font-semibold flex items-center justify-center hover:bg-gray-300 transition-colors"><?php echo $i; ?></a>
                <?php endif; ?>
              <?php endfor; ?>
            </div>

            <?php if ($pagination['has_next']): ?>
              <a href="?page=<?php echo $pagination['current_page'] + 1; ?>" class="px-4 py-2 bg-gray-200 text-gray-600 rounded hover:bg-gray-300 transition-colors">Next</a>
            <?php endif; ?>
          </div>

          <div class="text-center mt-8 text-gray-600">
            Showing <?php echo count($properties); ?> of <?php echo $pagination['total_properties']; ?> properties
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include 'footer.php'; ?>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get all filter elements with more specific selectors
      const locationSelect = document.getElementById('locationSelect');
      const areaSelect = document.getElementById('areaSelect');
      const typeSelect = document.getElementById('typeSelect');
      const bedroomSlider = document.getElementById('bedroomSlider');
      const bathroomSlider = document.getElementById('bathroomSlider');
      const amenityButtons = document.querySelectorAll('.grid.grid-cols-2.gap-2 button');
      const propertyCards = document.querySelectorAll('.property-card');

      console.log('Filter elements found:', {
        locationSelect: !!locationSelect,
        areaSelect: !!areaSelect,
        typeSelect: !!typeSelect,
        bedroomSlider: !!bedroomSlider,
        bathroomSlider: !!bathroomSlider,
        amenityButtons: amenityButtons.length,
        propertyCards: propertyCards.length
      });

      // Store original properties data for filtering
      const propertiesData = [];
      propertyCards.forEach((card, index) => {
        try {
          const titleElement = card.querySelector('h3 a');
          const locationElement = card.querySelector('.p-4 .flex.items-center.justify-center.text-gray-600 span');
          
          // Get bedroom and bathroom data from the popup - updated selectors for flex layout
          const bedroomsElement = card.querySelector('.property-popup .flex.justify-center.items-center.gap-4 div:nth-child(1) span');
          const bathroomsElement = card.querySelector('.property-popup .flex.justify-center.items-center.gap-4 div:nth-child(2) span');
          
          const title = titleElement ? titleElement.textContent.trim() : '';
          const location = locationElement ? locationElement.textContent.trim() : '';
          const bedroomsText = bedroomsElement ? bedroomsElement.textContent : '0';
          const bathroomsText = bathroomsElement ? bathroomsElement.textContent : '0';
          
          // Extract area from title (e.g., "Hodge Hill, B36" -> "Hodge Hill")
          const area = title.split(',')[0].trim().toLowerCase();
          
          const bedrooms = parseInt(bedroomsText.match(/\d+/)?.[0] || '0');
          const bathrooms = parseInt(bathroomsText.match(/\d+/)?.[0] || '0');
          
          console.log(`Property ${index}:`, { title, location, area, bedrooms, bathrooms });
          
          propertiesData.push({
            element: card,
            title: title.toLowerCase(),
            location: location.toLowerCase(),
            area: area,
            type: card.getAttribute('data-type')?.toLowerCase() || '',
            bedrooms: bedrooms,
            bathrooms: bathrooms,
            amenities: []
          });
        } catch (error) {
          console.error(`Error processing property ${index}:`, error);
        }
      });

      // Selected amenities tracking
      let selectedAmenities = [];

      // Filter function
      function filterProperties() {
        console.log('Filtering properties...');
        
        const selectedLocation = locationSelect ? locationSelect.value.toLowerCase() : '';
        const selectedArea = areaSelect ? areaSelect.value.toLowerCase() : '';
        const selectedType = typeSelect ? typeSelect.value.toLowerCase() : '';
        const minBedrooms = bedroomSlider ? parseInt(bedroomSlider.value) : 1;
        const minBathrooms = bathroomSlider ? parseInt(bathroomSlider.value) : 1;

        console.log('Filter values:', {
          selectedLocation,
          selectedArea,
          selectedType,
          minBedrooms,
          minBathrooms,
          selectedAmenities
        });

        let visibleCount = 0;

        propertiesData.forEach((property, index) => {
          let shouldShow = true;

          // Location filter
          if (selectedLocation && selectedLocation !== 'new york, us' && selectedLocation !== 'select your location') {
            const locationMatch = property.location.includes(selectedLocation.split(',')[0].trim());
            if (!locationMatch) {
              shouldShow = false;
              console.log(`Property ${index} filtered out by location`);
            }
          }

          // Area filter - match against the area extracted from title
          if (selectedArea && selectedArea !== 'select your area') {
            const areaMatch = property.area.includes(selectedArea);
            if (!areaMatch) {
              shouldShow = false;
              console.log(`Property ${index} filtered out by area: ${property.area} !== ${selectedArea}`);
            }
          }

          // Type filter
          if (selectedType && selectedType !== 'select your type') {
            let typeMatch = false;
            
            // Map filter values to property types
            if (selectedType === 'flats') {
              // 'Flats' in filter should match 'Flat' or 'Apartment' type
              typeMatch = (property.type === 'flat' || property.type === 'apartment');
            } else {
              // Direct match for other types (e.g., 'house' === 'house')
              typeMatch = (property.type === selectedType);
            }
            
            if (!typeMatch) {
              shouldShow = false;
              console.log(`Property ${index} filtered out by type: property.type="${property.type}" selectedType="${selectedType}"`);
            }
          }

          // Bedrooms filter
          if (property.bedrooms < minBedrooms) {
            shouldShow = false;
            console.log(`Property ${index} filtered out by bedrooms: ${property.bedrooms} < ${minBedrooms}`);
          }

          // Bathrooms filter
          if (property.bathrooms < minBathrooms) {
            shouldShow = false;
            console.log(`Property ${index} filtered out by bathrooms: ${property.bathrooms} < ${minBathrooms}`);
          }

          // Show/hide property
          if (shouldShow) {
            property.element.style.display = 'block';
            visibleCount++;
          } else {
            property.element.style.display = 'none';
          }
        });

        console.log(`Showing ${visibleCount} of ${propertiesData.length} properties`);

        // Update results count
        const resultsText = document.querySelector('.text-center.mt-8.text-gray-600');
        if (resultsText) {
          resultsText.textContent = `Showing ${visibleCount} of ${propertiesData.length} properties`;
        }
      }

      // Add event listeners
      if (locationSelect) locationSelect.addEventListener('change', filterProperties);
      if (areaSelect) areaSelect.addEventListener('change', filterProperties);
      if (typeSelect) typeSelect.addEventListener('change', filterProperties);
      if (bedroomSlider) bedroomSlider.addEventListener('input', filterProperties);
      if (bathroomSlider) bathroomSlider.addEventListener('input', filterProperties);

      // Amenity buttons
      amenityButtons.forEach(button => {
        button.addEventListener('click', function(e) {
          e.preventDefault();
          const amenity = this.textContent.trim().toLowerCase();
          
          if (this.classList.contains('bg-[#FCB305]')) {
            // Remove amenity
            this.classList.remove('bg-[#FCB305]', 'text-white');
            this.classList.add('border', 'border-gray-300', 'hover:border-[#FCB305]', 'hover:text-[#FCB305]');
            selectedAmenities = selectedAmenities.filter(a => a !== amenity);
          } else {
            // Add amenity
            this.classList.add('bg-[#FCB305]', 'text-white');
            this.classList.remove('border', 'border-gray-300', 'hover:border-[#FCB305]', 'hover:text-[#FCB305]');
            selectedAmenities.push(amenity);
          }
          
          filterProperties();
        });
      });

      // Update slider display values
      function updateSliderDisplay() {
        const bedroomValueSpan = document.getElementById('bedroomValue');
        const bathroomValueSpan = document.getElementById('bathroomValue');
        
        if (bedroomSlider && bedroomValueSpan) {
          bedroomValueSpan.textContent = bedroomSlider.value;
        }
        
        if (bathroomSlider && bathroomValueSpan) {
          bathroomValueSpan.textContent = bathroomSlider.value;
        }
      }

      if (bedroomSlider) {
        bedroomSlider.addEventListener('input', () => {
          updateSliderDisplay();
          filterProperties();
        });
      }
      
      if (bathroomSlider) {
        bathroomSlider.addEventListener('input', () => {
          updateSliderDisplay();
          filterProperties();
        });
      }

      // Initialize
      updateSliderDisplay();
      
      // Test filter on page load
      setTimeout(() => {
        console.log('Testing initial filter...');
        filterProperties();
      }, 1000);
    });
  </script>
</body>
</html>
