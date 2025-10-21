<?php 
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

    /* Add breathing room around hovered cards */
    .properties-grid {
      padding: 20px 0;
    }
  </style>
</head>
<body>
  <?php include '../partials/header.php'; ?>

  <!-- Properties Section -->
  <section class="py-32 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
      <div class="text-center mb-16">
        <h1 class="text-5xl font-bold mb-4 text-gray-800">All Properties</h1>
        <p class="text-xl text-gray-600">Discover your perfect home from our extensive collection</p>
      </div>

      <div class="flex gap-8">
        <!-- Filter Sidebar -->
        <div class="w-80 flex-shrink-0">
          <div class="bg-white rounded-2xl p-6 shadow-lg sticky top-8">
            <h2 class="text-xl font-bold mb-6 text-gray-800">Find Your Property</h2>
            
            <!-- Location -->
            <div class="mb-6">
              <label class="block text-sm font-semibold text-gray-700 mb-2">Location</label>
              <div class="relative">
                <select class="custom-select w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#FCB305] focus:border-transparent">
                  <option>New York, US</option>
                  <option>Los Angeles, CA</option>
                  <option>Beverly Hills, CA</option>
                  <option>Santa Monica, CA</option>
                  <option>Hollywood, CA</option>
                  <option>West Hollywood, CA</option>
                  <option>Malibu, CA</option>
                  <option>Venice, CA</option>
                  <option>Manhattan Beach, CA</option>
                  <option>Bel Air, CA</option>
                  <option>Studio City, CA</option>
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
                <select class="custom-select w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#FCB305] focus:border-transparent">
                  <option>Select your Area</option>
                  <option>Downtown</option>
                  <option>Suburbs</option>
                  <option>Waterfront</option>
                  <option>Hills</option>
                  <option>Beach Area</option>
                  <option>City Center</option>
                  <option>Residential</option>
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
                <select class="custom-select w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#FCB305] focus:border-transparent">
                  <option>Select your Type</option>
                  <option>House</option>
                  <option>Apartment</option>
                  <option>Condo</option>
                  <option>Villa</option>
                  <option>Townhouse</option>
                  <option>Mansion</option>
                  <option>Studio</option>
                  <option>Penthouse</option>
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
              <label class="block text-sm font-semibold text-gray-700 mb-2">Bedrooms</label>
              <div class="flex items-center justify-between text-sm text-gray-600 mb-2">
                <span>01</span>
                <span>6</span>
              </div>
              <div class="relative">
                <input type="range" min="1" max="6" value="3" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer range-slider">
                <div class="flex justify-between text-xs text-gray-500 mt-1">
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
              <label class="block text-sm font-semibold text-gray-700 mb-2">Bathroom</label>
              <div class="flex items-center justify-between text-sm text-gray-600 mb-2">
                <span>01</span>
                <span>5</span>
              </div>
              <div class="relative">
                <input type="range" min="1" max="5" value="2" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer range-slider">
                <div class="flex justify-between text-xs text-gray-500 mt-1">
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                  <span>•</span>
                </div>
              </div>
            </div>

            <!-- Amenities -->
            <div class="mb-6">
              <label class="block text-sm font-semibold text-gray-700 mb-4">Amenities</label>
              <div class="grid grid-cols-2 gap-2">
                <button class="px-3 py-2 text-sm border border-gray-300 rounded-lg hover:border-[#FCB305] hover:text-[#FCB305] transition-colors">Backyard</button>
                <button class="px-3 py-2 text-sm bg-[#FCB305] text-white rounded-lg">Balcony</button>
                <button class="px-3 py-2 text-sm border border-gray-300 rounded-lg hover:border-[#FCB305] hover:text-[#FCB305] transition-colors">Fireplace</button>
                <button class="px-3 py-2 text-sm border border-gray-300 rounded-lg hover:border-[#FCB305] hover:text-[#FCB305] transition-colors">Gym</button>
                <button class="px-3 py-2 text-sm border border-gray-300 rounded-lg hover:border-[#FCB305] hover:text-[#FCB305] transition-colors">Swimming Pool</button>
                <button class="px-3 py-2 text-sm border border-gray-300 rounded-lg hover:border-[#FCB305] hover:text-[#FCB305] transition-colors">Garage</button>
                <button class="px-3 py-2 text-sm border border-gray-300 rounded-lg hover:border-[#FCB305] hover:text-[#FCB305] transition-colors">Playground</button>
                <button class="px-3 py-2 text-sm border border-gray-300 rounded-lg hover:border-[#FCB305] hover:text-[#FCB305] transition-colors">Surveillance Cameras</button>
                <button class="px-3 py-2 text-sm border border-gray-300 rounded-lg hover:border-[#FCB305] hover:text-[#FCB305] transition-colors">Laundry</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Properties Grid -->
        <div class="flex-1">
          <div class="properties-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12" style="overflow: visible;">
            <?php foreach ($properties as $property): ?>
            <div class="property-card bg-white rounded-3xl shadow-lg hover:shadow-xl transition duration-300 relative" style="overflow: visible;">
              <div class="relative">
                <img src="<?php echo htmlspecialchars($property['image']); ?>" class="h-64 w-full object-cover rounded-3xl" alt="<?php echo htmlspecialchars($property['title']); ?>">
                <div class="absolute top-4 left-4">
                  <span class="<?php echo getStatusBadgeColor($property['status']); ?> text-white px-4 py-2 rounded-full text-sm font-semibold"><?php echo htmlspecialchars($property['status']); ?></span>
                </div>
              </div>
              <div class="p-4 text-center">
                <h3 class="font-bold text-lg mb-2 text-gray-800"><?php echo htmlspecialchars($property['title']); ?></h3>
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
                  <img src="<?php echo htmlspecialchars($property['image']); ?>" class="h-64 w-full object-cover rounded-3xl" alt="<?php echo htmlspecialchars($property['title']); ?>">
                  <div class="absolute top-2 left-2">
                    <span class="<?php echo getStatusBadgeColor($property['status']); ?> text-white px-2 py-1 rounded-full text-xs font-semibold"><?php echo htmlspecialchars($property['status']); ?></span>
                  </div>

                  <div class="p-3 flex-1 flex flex-col">
                    <h3 class="font-bold text-sm mb-1 text-gray-800"><?php echo htmlspecialchars($property['title']); ?></h3>
                    <div class="flex items-center text-gray-600 mb-2">
                      <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                      </svg>
                      <span class="text-xs"><?php echo htmlspecialchars($property['location']); ?></span>
                    </div>

                    <hr class="border-gray-200 mb-2">

                    <div class="grid grid-cols-2 gap-2 text-gray-600 text-xs mb-2">
                      <div class="flex items-center"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18M3 6h18M3 18h18"></path></svg><span><?php echo htmlspecialchars($property['area']); ?></span></div>
                      <div class="flex items-center justify-end"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 6v12"></path></svg><span><?php echo $property['garages'] ?? 2; ?> Garages</span></div>

                      <div class="flex items-center"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14"></path></svg><span><?php echo $property['bedrooms']; ?> Bedrooms</span></div>
                      <div class="flex items-center justify-end"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10a4 4 0 01-8 0"></path></svg><span><?php echo $property['bathrooms']; ?> Bathrooms</span></div>

                      <div class="col-span-2 flex items-center justify-between text-xs text-gray-500 mt-1">
                        <div class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg><span>Michel Smith</span></div>
                        <div class="flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg><span>1 days ago</span></div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Full-width price button at bottom with no white space below -->
                <div class="bg-[#FCB305] text-white text-center px-4 py-3 rounded-full font-bold text-sm">
                  <?php echo htmlspecialchars($property['price']); ?>
                </div>
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

  <?php include '../partials/footer.php'; ?>
</body>
</html>