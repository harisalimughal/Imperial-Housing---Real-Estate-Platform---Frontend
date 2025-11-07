<?php 
// Include data file
require_once __DIR__ . '/../data/properties.php';

// Get property ID from URL parameter
$propertyId = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Get all properties and find the specific one
$allProperties = getProperties();
$property = null;

foreach ($allProperties as $prop) {
    if ($prop['id'] == $propertyId) {
        $property = $prop;
        break;
    }
}

// If property not found, redirect to home or show error
if (!$property) {
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo htmlspecialchars($property['title']); ?> | Imperial Housing</title>
  <meta name="description" content="<?php echo htmlspecialchars($property['title'] . ' - ' . $property['location']); ?>">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="/public/assets/css/styles.css">
  <link rel="icon" href="/public/assets/images/logo.png" type="image/png">
  
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'sans': ['Inter', 'sans-serif'],
          }
        }
      }
    }
  </script>
  <style>
    /* Property Card Hover Effects */
    .property-card {
      position: relative;
      overflow: visible;
      transition: transform 0.3s ease;
      z-index: 1;
    }

    .property-popup {
      position: absolute;
      top: -20px;
      left: 0;
      width: 100%;
      height: auto;
      min-height: auto;
      max-height: 500px;
      background: white;
      border-radius: 1.5rem;
      opacity: 0;
      transform: scale(0.95) translateY(20px);
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      pointer-events: none;
      z-index: 50;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(0, 0, 0, 0.05);
      overflow: hidden;
      display: flex;
      flex-direction: column;
    }

    .property-popup img {
      height: 256px !important;
      width: 100% !important;
      object-fit: cover !important;
    }

    .property-popup.index-popup {
      width: 350px !important;
      height: auto !important;
      max-height: 500px !important;
      left: 50% !important;
      transform: translateX(-50%) scale(0.95) translateY(20px) !important;
      z-index: 9999 !important;
    }

    .property-card:hover {
      transform: translateY(-5px);
      z-index: 100;
    }

    .property-card:hover .property-popup {
      opacity: 1;
      transform: scale(1) translateY(-30px);
      pointer-events: auto;
    }

    .property-card:hover .property-popup.index-popup {
      opacity: 1;
      transform: translateX(-50%) scale(1) translateY(-10px) !important;
      pointer-events: auto;
    }

    .property-popup.index-popup img {
      width: 350px !important;
      height: 256px !important;
      object-fit: cover !important;
      display: block;
    }

    @media (max-width: 640px) {
      .property-popup.index-popup {
        position: static !important;
        width: calc(100% - 40px) !important;
        left: auto !important;
        transform: none !important;
        margin: 0 auto !important;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08) !important;
      }

      .property-popup {
        position: static !important;
        transform: none !important;
        opacity: 1 !important;
        pointer-events: auto !important;
      }
    }

    /* Tenants Navigation Buttons */
    .tenants-nav-btn {
      cursor: pointer;
      user-select: none;
    }

    .tenants-nav-btn:hover:not([data-active="true"]) {
      background-color: #d1d5db;
    }

    .tenants-nav-btn[data-active="true"] {
      background-color: #151EA6;
      color: white;
    }

    /* Carousel Navigation Buttons */
    .carousel-nav-btn {
      cursor: pointer;
      user-select: none;
    }

    .carousel-nav-btn:hover:not([data-active="true"]) {
      background-color: #d1d5db;
    }

    .carousel-nav-btn[data-active="true"] {
      background-color: #FCB305;
      color: white;
    }
  </style>
</head>
<body>

  <?php include 'header.php'; ?>

  <!-- Property Details Section -->
  <section class="py-8 bg-white">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
      
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Left Side - Property Images -->
        <div class="space-y-4">
          <!-- Main Image -->
          <div class="relative">
            <img id="mainImage" src="<?php echo htmlspecialchars($property['image']); ?>" 
                 class="w-full h-[400px] object-cover rounded-2xl transition-all duration-300" 
                 alt="<?php echo htmlspecialchars($property['title']); ?>">

          </div>
          
          <!-- Thumbnail Images -->
          <div class="grid grid-cols-4 gap-2">
            <img src="<?php echo htmlspecialchars($property['image']); ?>" 
                 class="thumbnail-image w-full h-20 object-cover rounded-lg cursor-pointer border-2 border-blue-500 transition-all duration-200 hover:opacity-80" 
                 data-image="<?php echo htmlspecialchars($property['image']); ?>"
                 alt="Property view 1">
            <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                 class="thumbnail-image w-full h-20 object-cover rounded-lg cursor-pointer border-2 border-transparent transition-all duration-200 hover:opacity-80" 
                 data-image="https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                 alt="Property view 2">
            <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                 class="thumbnail-image w-full h-20 object-cover rounded-lg cursor-pointer border-2 border-transparent transition-all duration-200 hover:opacity-80" 
                 data-image="https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                 alt="Property view 3">
            <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                 class="thumbnail-image w-full h-20 object-cover rounded-lg cursor-pointer border-2 border-transparent transition-all duration-200 hover:opacity-80" 
                 data-image="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                 alt="Property view 4">
          </div>
        </div>

        <!-- Right Side - Property Details -->
        <div class="space-y-6">
          <!-- Property Title -->
          <h1 class="text-3xl font-bold text-gray-900"><?php echo htmlspecialchars($property['title']); ?></h1>
          
          <!-- Location -->
          <div class="flex items-center text-gray-600">
            <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
            </svg>
            <span><?php echo htmlspecialchars($property['location']); ?></span>
          </div>

          <!-- Property Features Pills -->
          <div class="flex flex-wrap gap-3">
            <div class="flex items-center bg-blue-100 text-blue-800 px-3 py-2 rounded-lg">
              <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
              </svg>
              <?php echo $property['bedrooms']; ?> Bedrooms
            </div>
            <div class="flex items-center bg-blue-100 text-blue-800 px-3 py-2 rounded-lg">
              <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
              </svg>
              <?php echo $property['bathrooms']; ?> Bathrooms
            </div>
            <div class="flex items-center bg-blue-100 text-blue-800 px-3 py-2 rounded-lg">
              <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
              </svg>
              <?php echo htmlspecialchars($property['area']); ?>
            </div>
            <div class="flex items-center bg-blue-100 text-blue-800 px-3 py-2 rounded-lg">
              <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1V8a1 1 0 00-1-1h-3z"/>
              </svg>
              2 Garages
            </div>
          </div>

          <!-- Separator Line -->
          <hr class="border-gray-400">

          <!-- Agent Info -->
          <div class="flex items-center justify-between py-4">
            <div class="flex items-center">
              <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <span class="text-gray-700 font-medium">Michel Smith</span>
            </div>
            <div class="flex items-center text-gray-500">
              <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
              </svg>
              <span class="text-sm">1 days ago</span>
            </div>
          </div>

          <!-- Price -->
          <div class="text-4xl font-bold text-gray-900 relative inline-block">
            <?php echo htmlspecialchars($property['price']); ?>
            <span class="absolute -top-1 left-full ml-2 text-xs text-red-500 font-normal whitespace-nowrap">
              (<span class="line-through">$20.99</span> Normal price)
            </span>
          </div>

          <!-- Separator Line -->
          <hr class="border-gray-400">

          <!-- WhatsApp Button -->
          <div class="pt-4">
            <a href="https://wa.me/1234567890?text=I'm interested in <?php echo urlencode($property['title']); ?>" 
               class="bg-[#25D366] hover:bg-[#1DA851] text-white rounded-xl font-medium transition-colors flex items-center justify-center text-xl"
               style="width: 220px; height: 70px;">
              <svg class="w-7 h-7 mr-3" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
              </svg>
              Whatsapp
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- What's Special Section -->
  <section class="py-12 bg-white">
    <div class="max-w-5xl mx-auto px-8 sm:px-12 lg:px-16">
      <h2 class="text-3xl font-bold text-gray-900 mb-8">What's Special</h2>
      
      <!-- Special Features Tags -->
      <div class="flex flex-wrap gap-3 mb-8">
        <span class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full text-sm font-medium">PRIVATE BACKYARD</span>
        <span class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full text-sm font-medium">UPDATED SS APPLIANCES</span>
        <span class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full text-sm font-medium">ABUNDANT NATURAL LIGHT</span>
        <span class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full text-sm font-medium">GRANITE COUNTERS</span>
      </div>
      
      <div class="flex flex-wrap gap-3 mb-8">
        <span class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full text-sm font-medium">SLEEK KITCHEN</span>
        <span class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full text-sm font-medium">SOAKING TUB</span>
        <span class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full text-sm font-medium">WALK-IN CLOSET</span>
      </div>

      <!-- Property Description -->
      <div class="text-gray-700 leading-relaxed">
        <p class="mb-4">
          This Move-In Ready Home Offering Modern Comfort, Convenience & Thoughtful Upgrades Is Eligible For $10K In DOWN PAYMENT ASSISTANCE (+Up To $5K In CLOSING COSTS!)! Built In 2012 & Freshly Updated, This 2-Story Home Combines Style & Function With A Bright Open Floor Plan & An Expansive, Fully Fenced Backyard Perfect ... 
          <a href="#" class="text-blue-600 hover:underline">Read More</a>
        </p>
      </div>
    </div>
  </section>

  <!-- Contact Form Section -->
  <section class="py-12 bg-gray-50">
    <div class="max-w-3xl mx-auto px-8 sm:px-12 lg:px-16">
      <form class="space-y-6">
        <!-- First Row: Name and Email -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <input type="text" name="name" placeholder="Name" 
                   class="w-full px-4 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none text-gray-700 placeholder-gray-400">
          </div>
          <div>
            <input type="email" name="email" placeholder="Email" 
                   class="w-full px-4 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none text-gray-700 placeholder-gray-400">
          </div>
        </div>

        <!-- Second Row: Contact Number and Text Box -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <input type="tel" name="contact_number" placeholder="Contact Number" 
                   class="w-full px-4 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none text-gray-700 placeholder-gray-400">
          </div>
          <div>
            <input type="text" name="text_box" placeholder="Text Box" 
                   class="w-full px-4 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none text-gray-700 placeholder-gray-400">
          </div>
        </div>

        <!-- Third Row: Postal Code and Requirement -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <input type="text" name="postal_code" placeholder="Postal Code" 
                   class="w-full px-4 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none text-gray-700 placeholder-gray-400">
          </div>
          <div>
            <input type="text" name="requirement" placeholder="Requirement" 
                   class="w-full px-4 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none text-gray-700 placeholder-gray-400">
          </div>
        </div>

        <!-- Message Field -->
        <div>
          <textarea name="message" rows="6" placeholder="Message" 
                    class="w-full px-4 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none text-gray-700 placeholder-gray-400 resize-none"></textarea>
        </div>

        <!-- Send Button -->
        <div class="flex justify-center">
          <button type="submit" 
                  class="bg-[#FCB305] hover:bg-[#E6A004] text-white px-12 py-4 rounded-2xl font-semibold text-lg transition-colors">
            Send
          </button>
        </div>
      </form>

      <!-- Contact Information -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
        <!-- Reservation -->
        <div class="flex items-center space-x-3">
          <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
            </svg>
          </div>
          <div>
            <h4 class="font-semibold text-gray-900">Reservation</h4>
            <p class="text-gray-600 text-sm">+44 (0) 203 370 6999</p>
          </div>
        </div>

        <!-- Email Info -->
        <div class="flex items-center space-x-3">
          <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
              <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
            </svg>
          </div>
          <div>
            <h4 class="font-semibold text-gray-900">Email Info</h4>
            <p class="text-gray-600 text-sm">info@mkm-housing.co.uk</p>
          </div>
        </div>

        <!-- Address -->
        <div class="flex items-center space-x-3">
          <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
            </svg>
          </div>
          <div>
            <h4 class="font-semibold text-gray-900">Address</h4>
            <p class="text-gray-600 text-sm">Croydon House 11 St Paul's Square</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Similar Properties Section -->
  <section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-10">
      <div class="text-center mb-16">
        <p class="text-[18px] uppercase text-gray-500 tracking-wide mb-2">SIMILAR PROPERTIES</p>
        <h2 class="text-[46px] font-bold mb-4 leading-tight">You Might Also Like</h2>
      </div>
      
      <!-- Properties Carousel Container -->
      <div class="relative">
        <div class="properties-carousel-container overflow-hidden">
          <div class="properties-carousel flex transition-transform duration-500 ease-in-out" id="similarPropertiesCarousel">
            <?php 
            // Get all properties excluding current one
            $similarProperties = array_filter($allProperties, function($prop) use ($propertyId) {
                return $prop['id'] != $propertyId;
            });
            $similarProperties = array_values($similarProperties);
            
            // Group properties into pages of 6 (2 rows x 3 columns)
            $propertiesPerPage = 6;
            $propertyPages = array_chunk($similarProperties, $propertiesPerPage);
            
            foreach ($propertyPages as $pageIndex => $propertiesPage): ?>
              <div class="properties-page min-w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" data-page="<?php echo $pageIndex; ?>">
                <?php foreach ($propertiesPage as $property): ?>
                  <div class="property-card bg-white rounded-3xl shadow-lg hover:shadow-xl transition duration-300 relative" style="overflow: visible;">
                    <div class="relative">
                      <img src="<?php echo htmlspecialchars($property['image']); ?>" class="h-64 w-full object-cover rounded-3xl" alt="<?php echo htmlspecialchars($property['title']); ?>">

                    </div>
                    <div class="p-4 text-center">
                      <h3 class="font-bold text-lg mb-2 text-gray-800">
                        <a href="product.php?id=<?php echo $property['id']; ?>" class="hover:text-[#151EA6] transition-colors">
                          <?php echo htmlspecialchars($property['title']); ?>
                        </a>
                      </h3>
                      <div class="flex items-center justify-center text-gray-600 mb-2">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm"><?php echo htmlspecialchars($property['location']); ?></span>
                      </div>
                      <div class="text-[#FCB305] font-bold text-xl mb-2"><?php echo htmlspecialchars($property['price']); ?></div>
                      <div class="flex justify-center items-center gap-4 text-gray-600 text-sm">
                        <span><?php echo $property['bedrooms']; ?> beds</span>
                        <span><?php echo $property['bathrooms']; ?> baths</span>
                        <span><?php echo htmlspecialchars($property['area']); ?></span>
                      </div>
                    </div>

                    <!-- Hover Popup -->
                    <div class="property-popup index-popup">
                      <div class="relative h-full flex flex-col">
                        <img src="<?php echo htmlspecialchars($property['image']); ?>" class="h-64 w-full object-cover rounded-3xl" alt="<?php echo htmlspecialchars($property['title']); ?>">


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

                      <!-- Full-width price display at bottom -->
                      <div class="card-price-cta bg-[#FCB305] text-white text-center px-4 py-3 rounded-full font-bold text-sm">
                        <?php echo htmlspecialchars($property['price']); ?>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      
      <!-- Navigation and View All Link -->
      <div class="flex justify-end items-center mt-12 gap-4">
        <div class="flex items-center gap-2">
          <?php 
          $totalPages = count($propertyPages);
          for ($i = 0; $i < $totalPages; $i++): ?>
            <button class="carousel-nav-btn w-8 h-8 rounded font-semibold text-sm flex items-center justify-center transition-colors" 
                    data-page="<?php echo $i; ?>" 
                    <?php echo $i === 0 ? 'data-active="true"' : ''; ?>>
              <?php echo $i + 1; ?>
            </button>
          <?php endfor; ?>
        </div>
        <a href="properties.php" class="text-gray-800 font-semibold text-sm hover:text-[#FCB305] transition-colors">VIEW ALL</a>
      </div>
    </div>
  </section>

  <!-- For Tenants Section -->
  <section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-10">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold mb-4 flex items-center justify-center gap-3">
          For Tenants
          <svg width="61" height="56" viewBox="0 0 61 56" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0094 2.34571C9.30011 4.90988 8.86166 5.22053 8.60095 6.17848C8.40695 6.89149 8.53588 9.37659 8.84041 10.795C9.58683 14.2719 11.5703 18.1403 13.9373 20.7355L14.5579 21.416L14.2605 22.7628C13.5545 25.9608 13.5371 29.0098 14.2068 32.1592C14.3393 32.7823 14.456 33.3344 14.466 33.386C14.4761 33.4378 14.0279 33.6542 13.47 33.8672C12.9122 34.0801 12.2845 34.3769 12.0752 34.5266L11.6945 34.7988L11.568 34.4646C11.1121 33.2601 10.441 32.4975 9.37407 31.9713L8.66684 31.6225H5.81747H2.9681L2.28211 31.9715C1.47253 32.3832 0.620451 33.255 0.258699 34.0413C0.000118725 34.6036 0 34.6085 0 43.6074V52.6109L0.329102 53.2839C0.729914 54.1035 1.51195 54.8507 2.41306 55.275C3.08136 55.5897 3.1089 55.5923 5.81747 55.5923C8.52603 55.5923 8.55358 55.5897 9.22187 55.275C10.5557 54.6469 11.5109 53.4331 11.6589 52.1782C11.7019 51.8134 11.7793 51.6061 11.8599 51.6396C11.9321 51.6697 13.6733 52.4542 15.7292 53.383C17.7852 54.3118 19.8421 55.1728 20.3001 55.2964C21.5652 55.6376 22.7721 55.7691 25.7631 55.8918C29.2882 56.0363 42.7199 56.036 43.8289 55.8912C44.8572 55.7571 45.8628 55.4158 46.5454 54.9693C47.0082 54.6666 58.1878 44.3779 59.4095 43.1304C59.6985 42.8352 60.0996 42.2449 60.3008 41.8186C60.6252 41.1314 60.6667 40.9218 60.6667 39.9702C60.6667 39.0101 60.6265 38.8118 60.2863 38.089C59.6286 36.6922 58.3856 35.7296 56.7797 35.3733C56.4043 35.2899 56.097 35.2129 56.097 35.202C56.097 35.1912 56.2325 34.7838 56.398 34.2968C57.0165 32.4767 57.2996 30.7217 57.3684 28.2807C57.4545 25.2314 57.2148 23.4226 56.3731 20.7706C55.5268 18.103 53.5423 14.5519 52.7007 14.1987C51.8909 13.8588 51.1106 14.3877 51.1106 15.2766C51.1106 15.5899 51.3047 15.9916 51.8885 16.8866C53.2162 18.922 54.1524 21.2043 54.6926 23.7222C54.9147 24.7574 54.9557 25.3276 54.9601 27.4487C54.9662 30.2894 54.8219 31.3275 54.115 33.53C53.5777 35.2039 53.233 35.8846 52.7464 36.2325C52.5323 36.3853 50.514 38.2229 48.2612 40.3157C46.0084 42.4085 43.9783 44.2065 43.7497 44.3113C43.3855 44.4783 42.3812 44.5063 35.6171 44.5385C30.3534 44.5636 27.7613 44.5345 27.4637 44.4469C26.2154 44.0799 26.0372 42.4686 27.1756 41.8423C27.4989 41.6645 28.1175 41.6325 32.2365 41.5801L36.929 41.5205L37.7124 41.1329C39.1448 40.4242 40.0645 39.0645 40.1377 37.5476C40.1735 36.8042 40.1958 36.7515 40.5721 36.5187C41.3895 36.0132 41.8621 35.5699 42.3231 34.8766C44.3283 31.8604 43.0172 27.8873 39.607 26.6449C39.0205 26.4312 38.5465 26.3937 35.6171 26.3287C31.8887 26.2458 31.9341 26.2558 31.0854 25.3311C29.7432 23.8683 30.129 21.6294 31.8928 20.6482L32.5303 20.2936L37.6162 20.2339L42.7021 20.1743L42.9885 19.8397C43.3924 19.3678 43.37 18.7946 42.9286 18.298L42.5823 17.9085L39.6637 17.8727L36.745 17.8371V16.1642V14.4914L36.398 14.1429C36.0068 13.7499 35.5136 13.6878 34.9814 13.9642C34.4687 14.2305 34.3705 14.6066 34.3705 16.3042V17.8489H33.6743C30.7235 17.8489 28.3972 19.7487 27.9377 22.5341C27.4592 25.4349 29.6401 28.3118 32.6114 28.6994C33.0892 28.7618 34.6316 28.8144 36.0391 28.8164C38.5508 28.82 38.6093 28.8258 39.2151 29.129C40.951 29.9978 41.4265 32.2221 40.1969 33.7205C40.0094 33.9489 39.6708 34.2359 39.4444 34.3584L39.0327 34.5812L38.5715 34.2104C38.3179 34.0064 37.8432 33.7164 37.5167 33.5659L36.9231 33.2921L26.9245 33.2596L16.9259 33.2272L16.8073 32.7826C16.0636 29.9943 15.9222 27.0748 16.3956 24.2856C16.5011 23.6641 16.5965 23.1452 16.6076 23.1325C16.6187 23.1197 16.9934 23.2942 17.4403 23.52C18.5343 24.0731 19.0273 24.0665 20.1144 23.4836C22.6976 22.0986 25.1529 19.2442 26.9511 15.5357C27.8416 13.6993 28.3277 12.2772 28.6648 10.5231C28.7992 9.82319 28.9092 9.22824 28.9092 9.20082C28.9092 9.17351 29.3575 9.01371 29.9056 8.84592C33.9219 7.61536 38.3356 7.74367 42.2657 9.20511C44.1243 9.8963 44.5333 9.90011 44.9402 9.22967C45.4078 8.4593 45.1067 7.76382 44.1175 7.32951C39.8467 5.45391 34.1891 5.0816 29.7314 6.38252L28.9508 6.61042L28.8054 6.064C28.7094 5.70374 28.5067 5.37329 28.2106 5.09448C27.6243 4.54246 19.3724 0.0700198 18.8177 0.0035962C18.4582 -0.0393347 17.8096 0.276565 14.0094 2.34571ZM22.6031 4.62129C24.6676 5.74154 26.4056 6.70558 26.4654 6.76377C26.6263 6.92035 26.5523 8.94383 26.348 9.97548C25.8895 12.2899 24.7448 14.9732 23.2699 17.1907C22.402 18.4957 20.5726 20.3921 19.5405 21.0566L18.7791 21.5469L18.201 21.2184C16.3483 20.1657 14.1398 17.4976 12.7063 14.5799C11.6003 12.3289 11.0253 10.2382 10.8984 8.00591L10.8303 6.80885L14.7349 4.69725C16.8825 3.53585 18.6869 2.58541 18.7446 2.58517C18.8024 2.58481 20.5387 3.50115 22.6031 4.62129ZM20.0538 9.97405L18.1935 11.8779L17.4668 11.2235C17.067 10.8636 16.6199 10.5376 16.4729 10.4992C15.7574 10.3121 15.0186 10.8847 15.0186 11.6263C15.0186 12.2043 15.1857 12.4231 16.6255 13.7293C17.6641 14.6715 17.7868 14.7483 18.2532 14.7483C18.7527 14.7483 18.7796 14.7254 21.1002 12.3335C22.6057 10.7816 23.4783 9.79076 23.542 9.56084C23.7696 8.73943 23.2692 8.07018 22.4274 8.07018C21.9212 8.07018 21.888 8.09678 20.0538 9.97405ZM47.7772 10.5653C47.0625 11.2832 47.4494 12.4278 48.4524 12.5629C48.8753 12.6199 48.9929 12.581 49.3398 12.2697C49.6739 11.9699 49.7399 11.8281 49.7399 11.4093C49.7399 10.9943 49.6734 10.8483 49.3548 10.5623C48.8278 10.0892 48.2501 10.0903 47.7772 10.5653ZM8.36765 34.1569C8.59489 34.2715 8.90215 34.5477 9.05032 34.7706L9.31982 35.1758L9.31934 43.5952C9.31899 51.8362 9.31388 52.023 9.07881 52.4104C8.93147 52.653 8.62992 52.8988 8.29856 53.046C7.81084 53.2627 7.5557 53.2821 5.66016 53.2466C3.37995 53.2037 3.12374 53.137 2.61192 52.4519C2.38041 52.1419 2.37365 51.9229 2.34301 43.7266C2.3131 35.711 2.322 35.2999 2.53357 34.902C2.6555 34.6724 2.96346 34.3647 3.21789 34.2182C3.64921 33.9699 3.82492 33.9518 5.81747 33.9501C7.61768 33.9485 8.01956 33.9812 8.36765 34.1569ZM36.7545 35.8946C37.9922 36.5521 38.0675 38.1242 36.8963 38.8555C36.4506 39.134 36.4234 39.1358 31.7586 39.1951L27.069 39.2547L26.3289 39.5981C24.8833 40.2687 24.0079 41.5728 23.9978 43.0708C23.9877 44.565 24.8595 45.9022 26.2798 46.571L26.9503 46.8868L34.9266 46.9199C43.6729 46.9561 44.0298 46.9332 45.1778 46.2642C45.4907 46.0819 47.6251 44.1887 49.9211 42.0571C52.2171 39.9255 54.2654 38.0905 54.473 37.9794C55.3881 37.4894 56.6673 37.6139 57.4597 38.27C57.9469 38.6734 58.346 39.4208 58.3501 39.938C58.3575 40.8497 58.2185 40.9983 51.6859 47.0614C47.7904 50.6771 45.2088 52.9866 44.8886 53.1422C44.0539 53.5481 42.7213 53.6229 36.3888 53.6197C26.1594 53.6145 21.9307 53.4019 20.4055 52.8164C20.0872 52.6943 17.9971 51.7696 15.7606 50.7616L11.6943 48.9288V43.418V37.9072L12.3293 37.3242C12.6786 37.0036 13.3118 36.5695 13.7363 36.3595C15.2306 35.6206 14.9327 35.6384 26.0709 35.6274L36.2327 35.6175L36.7545 35.8946Z" fill="#151EA6"/>
          </svg>

        </h2>
      </div>

      <!-- Carousel wrapper -->
      <div class="relative">
        <!-- Prev/Next buttons (no bg) - enlarged, bolder and moved further out -->
        <button id="tenantsPrev" aria-label="Previous tenants" class="hidden md:block absolute top-1/2 transform -translate-y-1/2 p-3 z-10" style="left:-72px;">
          <svg class="w-7 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button id="tenantsNext" aria-label="Next tenants" class="hidden md:block absolute top-1/2 transform -translate-y-1/2 p-3 z-10" style="right:-72px;">
          <svg class="w-7 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" d="M9 5l7 7-7 7"/></svg>
        </button>

  <div class="tenants-carousel flex gap-6 overflow-hidden snap-x snap-mandatory scroll-smooth py-4">
          <div class="min-w-[260px] snap-start rounded-xl overflow-hidden transition duration-300 flex-shrink-0">
            <img src="https://images.unsplash.com/photo-1449824913935-59a10b8d2000?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="h-48 w-full object-cover rounded-xl" alt="London Apartments">
            <div class="p-6">
              <h3 class="font-bold text-lg mb-2">London Apartments</h3>
              <p class="text-gray-600 mb-4">Premium city living</p>
              <a href="product.php?id=5" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg w-full text-center block transition-colors">View Property</a>
            </div>
          </div>

          <div class="min-w-[260px] snap-start rounded-xl overflow-hidden transition duration-300 flex-shrink-0">
            <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="h-48 w-full object-cover rounded-xl" alt="Birmingham Flats">
            <div class="p-6">
              <h3 class="font-bold text-lg mb-2">Birmingham Flats</h3>
              <p class="text-gray-600 mb-4">Modern urban living</p>
              <a href="product.php?id=12" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg w-full text-center block transition-colors">View Property</a>
            </div>
          </div>

          <div class="min-w-[260px] snap-start rounded-xl overflow-hidden transition duration-300 flex-shrink-0">
            <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="h-48 w-full object-cover rounded-xl" alt="Manchester Homes">
            <div class="p-6">
              <h3 class="font-bold text-lg mb-2">Manchester Homes</h3>
              <p class="text-gray-600 mb-4">Family-friendly areas</p>
              <a href="product.php?id=22" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg w-full text-center block transition-colors">View Property</a>
            </div>
          </div>

          <div class="min-w-[260px] snap-start rounded-xl overflow-hidden transition duration-300 flex-shrink-0">
            <img src="https://images.unsplash.com/photo-1560185007-cde436f6a4d0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="h-48 w-full object-cover rounded-xl" alt="Leeds Properties">
            <div class="p-6">
              <h3 class="font-bold text-lg mb-2">Leeds Properties</h3>
              <p class="text-gray-600 mb-4">Affordable housing</p>
              <a href="product.php?id=14" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg w-full text-center block transition-colors">View Property</a>
            </div>
          </div>
        </div>

          <!-- Mobile-only arrows for tenants: plain black icons, no background -->
          <div class="md:hidden flex justify-center gap-6 mt-4">
            <button onclick="document.getElementById('tenantsPrev').click()" aria-label="Previous tenants" class="p-3 text-black">
              <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button onclick="document.getElementById('tenantsNext').click()" aria-label="Next tenants" class="p-3 text-black">
              <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" d="M9 5l7 7-7 7"/></svg>
            </button>
          </div>

      </div>
      

    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="bg-white">
    <!-- full-bleed stripe with centered overlapping circle -->
    <div class="w-full" style="height:106px;background-color:#60D6694D;position:relative;margin-top:100px;margin-bottom:100px;">
      <!-- animated circle border styles -->
      <style>
        .testimonial-circle{position:relative;width:206px;height:206px;margin-top:-30px;display:flex;align-items:center;justify-content:center;flex-direction:column;text-align:center;pointer-events:auto;border-radius:50%;background:#4ade80}
        .testimonial-circle::before{content:'';position:absolute;inset:-6px;border-radius:50%;background:conic-gradient(from 0deg,#22c55e,#4ade80,#22c55e,#4ade80);animation:spin 3s linear infinite;z-index:-1}
        .testimonial-circle::after{content:'';position:absolute;inset:-3px;border-radius:50%;background:#4ade80;z-index:-1}
        @keyframes spin{from{transform:rotate(0deg)}to{transform:rotate(360deg)}}
      </style>

      <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
        <div class="testimonial-circle">
          <div class="text-black font-extrabold text-4xl">98%</div>
          <div class="text-sm text-black">Customers<br> Satisfaction</div>
        </div>
      </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-10">
      <div class="mb-8"></div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        <!-- Left summary -->
        <div class="col-span-1 flex flex-col items-start justify-center">
          <h3 class="text-3xl font-bold mb-4">Excellent</h3>
          <div class="flex items-center mb-4">
            <div class="flex items-center text-yellow-400 mr-3">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.96a1 1 0 00.95.69h4.163c.969 0 1.371 1.24.588 1.81l-3.37 2.449a1 1 0 00-.364 1.118l1.287 3.96c.3.921-.755 1.688-1.54 1.118l-3.37-2.449a1 1 0 00-1.175 0L5.21 17.841c-.785.57-1.84-.197-1.54-1.118l1.287-3.96a1 1 0 00-.364-1.118L1.223 8.367c-.783-.57-.38-1.81.588-1.81h4.163a1 1 0 00.95-.69l1.286-3.96z"/></svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.96a1 1 0 00.95.69h4.163c.969 0 1.371 1.24.588 1.81l-3.37 2.449a1 1 0 00-.364 1.118l1.287 3.96c.3.921-.755 1.688-1.54 1.118l-3.37-2.449a1 1 0 00-1.175 0L5.21 17.841c-.785.57-1.84-.197-1.54-1.118l1.287-3.96a1 1 0 00-.364-1.118L1.223 8.367c-.783-.57-.38-1.81.588-1.81h4.163a1 1 0 00.95-.69l1.286-3.96z"/></svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.96a1 1 0 00.95.69h4.163c.969 0 1.371 1.24.588 1.81l-3.37 2.449a1 1 0 00-.364 1.118l1.287 3.96c.3.921-.755 1.688-1.54 1.118l-3.37-2.449a1 1 0 00-1.175 0L5.21 17.841c-.785.57-1.84-.197-1.54-1.118l1.287-3.96a1 1 0 00-.364-1.118L1.223 8.367c-.783-.57-.38-1.81.588-1.81h4.163a1 1 0 00.95-.69l1.286-3.96z"/></svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.96a1 1 0 00.95.69h4.163c.969 0 1.371 1.24.588 1.81l-3.37 2.449a1 1 0 00-.364 1.118l1.287 3.96c.3.921-.755 1.688-1.54 1.118l-3.37-2.449a1 1 0 00-1.175 0L5.21 17.841c-.785.57-1.84-.197-1.54-1.118l1.287-3.96a1 1 0 00-.364-1.118L1.223 8.367c-.783-.57-.38-1.81.588-1.81h4.163a1 1 0 00.95-.69l1.286-3.96z"/></svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.96a1 1 0 00.95.69h4.163c.969 0 1.371 1.24.588 1.81l-3.37 2.449a1 1 0 00-.364 1.118l1.287 3.96c.3.921-.755 1.688-1.54 1.118l-3.37-2.449a1 1 0 00-1.175 0L5.21 17.841c-.785.57-1.84-.197-1.54-1.118l1.287-3.96a1 1 0 00-.364-1.118L1.223 8.367c-.783-.57-.38-1.81.588-1.81h4.163a1 1 0 00.95-.69l1.286-3.96z"/></svg>
            </div>
          </div>

          <div class="mb-6"><strong class="font-semibold">Based on <span class="text-black">414 Reviews</span></strong></div>
          <img src="/public/assets/images/google-logo.png" alt="Google" class="w-36"/>
        </div>

        <!-- Carousel -->
        <div class="col-span-2 relative">
          <button id="testimonialsPrev" aria-label="Previous testimonial" class="hidden md:block absolute top-1/2 transform -translate-y-1/2 p-4 z-10 text-gray-700" style="left:-48px;">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"/></svg>
          </button>
          <div class="testimonials-carousel overflow-hidden">
            <div class="flex gap-6 transition-transform duration-300" id="testimonialsTrack">
              <!-- Single testimonial card -->
              <div class="min-w-full bg-white rounded-lg p-6">
                <div class="flex items-start gap-4">
                  <img src="/public/assets/images/avatar1.png" class="w-12 h-12 rounded-full" alt="avatar">
                  <div>
                    <div class="font-bold">James Cooper</div>
                    <div class="text-sm text-gray-500">Founder of Urban Digital Labs</div>
                  </div>
                </div>
                <p class="mt-4 text-gray-700">"We were looking for a tool that could streamline our project management, and cine delivered beyond our expectations. With seamless collaboration features and real-time analytics, we've seen a 30% improvement in overall team productivity."</p>
                <a href="#" class="text-sm text-blue-600 mt-3 inline-block">Read more</a>
              </div>

              <div class="min-w-full bg-white rounded-lg p-6">
                <div class="flex items-start gap-4">
                  <img src="/public/assets/images/avatar1.png" class="w-12 h-12 rounded-full" alt="avatar">
                  <div>
                    <div class="font-bold">James Cooper</div>
                    <div class="text-sm text-gray-500">Founder of Urban Digital Labs</div>
                  </div>
                </div>
                <p class="mt-4 text-gray-700">"We were looking for a tool that could streamline our project management, and cine delivered beyond our expectations. With seamless collaboration features and real-time analytics, we've seen a 30% improvement in overall team productivity."</p>
                <a href="#" class="text-sm text-blue-600 mt-3 inline-block">Read more</a>
              </div>

              <div class="min-w-full bg-white rounded-lg p-6">
                <div class="flex items-start gap-4">
                  <img src="/public/assets/images/avatar1.png" class="w-12 h-12 rounded-full" alt="avatar">
                  <div>
                    <div class="font-bold">James Cooper</div>
                    <div class="text-sm text-gray-500">Founder of Urban Digital Labs</div>
                  </div>
                </div>
                <p class="mt-4 text-gray-700">"We were looking for a tool that could streamline our project management, and cine delivered beyond our expectations. With seamless collaboration features and real-time analytics, we've seen a 30% improvement in overall team productivity."</p>
                <a href="#" class="text-sm text-blue-600 mt-3 inline-block">Read more</a>
              </div>
            </div>
          </div>
          <button id="testimonialsNext" aria-label="Next testimonial" class="hidden md:block absolute top-1/2 transform -translate-y-1/2 p-4 z-10 text-gray-700" style="right:-48px;">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg>
          </button>

          <!-- Mobile-only arrows: centered under reviews on small screens -->
          <div class="md:hidden flex justify-center gap-6 mt-4">
            <button onclick="document.getElementById('testimonialsPrev').click()" aria-label="Previous testimonial" class="p-3 text-black">
              <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button onclick="document.getElementById('testimonialsNext').click()" aria-label="Next testimonial" class="p-3 text-black">
              <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </button>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- Google Map Section -->
  <section class="py-0 bg-white">
    <div class="w-full h-96 relative">
      <div id="map" class="w-full h-full bg-gray-200 relative overflow-hidden">
        <!-- Map Container -->
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.394407857956!2d-0.1276474!3d51.5073509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604b900d26973%3A0x4291f3172409ea92!2sLondon%2C%20UK!5e0!3m2!1sen!2sus!4v1635000000000!5m2!1sen!2sus"
          width="100%" 
          height="100%" 
          style="border:0;" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade"
          class="grayscale">
        </iframe>
        
        <!-- Location Markers -->
        <div class="absolute top-12 left-16">
          <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center shadow-lg">
            <svg class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
            </svg>
          </div>
        </div>

        <div class="absolute top-8 right-20">
          <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center shadow-lg">
            <svg class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
            </svg>
          </div>
        </div>

        <div class="absolute bottom-16 left-20">
          <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center shadow-lg">
            <svg class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
            </svg>
          </div>
        </div>

        <div class="absolute bottom-8 right-24">
          <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center shadow-lg">
            <svg class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
            </svg>
          </div>
        </div>

        <div class="absolute top-20 left-1/3">
          <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center shadow-lg">
            <svg class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
            </svg>
          </div>
        </div>

        <div class="absolute top-1/3 right-16">
          <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center shadow-lg">
            <svg class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
            </svg>
          </div>
        </div>

        <!-- Center Large Marker -->
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
          <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center shadow-xl border-4 border-white">
            <div class="w-3 h-3 bg-white rounded-full"></div>
          </div>
        </div>

        <!-- Map Controls -->
        <div class="absolute bottom-6 right-6">
          <div class="bg-green-500 rounded-lg p-3 shadow-lg cursor-pointer hover:bg-green-600 transition duration-300">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
            </svg>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include 'footer.php'; ?>

  <script src="/public/assets/js/main.js"></script>
  
  <!-- Image Gallery Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const mainImage = document.getElementById('mainImage');
      const thumbnails = document.querySelectorAll('.thumbnail-image');
      
      thumbnails.forEach(function(thumbnail) {
        thumbnail.addEventListener('click', function() {
          // Get the image URL from data attribute
          const newImageSrc = this.getAttribute('data-image');
          
          // Update main image with fade effect
          mainImage.style.opacity = '0.5';
          
          setTimeout(function() {
            mainImage.src = newImageSrc;
            mainImage.style.opacity = '1';
          }, 150);
          
          // Update active thumbnail styling
          thumbnails.forEach(function(thumb) {
            thumb.classList.remove('border-blue-500');
            thumb.classList.add('border-transparent');
          });
          
          // Add active styling to clicked thumbnail
          thumbnail.classList.remove('border-transparent');
          thumbnail.classList.add('border-blue-500');
        });
      });
    });

    // Tenants Carousel Navigation
    const tenantsCarousel = document.querySelector('.tenants-carousel');
    const tenantsNavBtns = document.querySelectorAll('.tenants-nav-btn');
    const tenantsPrevBtn = document.getElementById('tenantsPrev');
    const tenantsNextBtn = document.getElementById('tenantsNext');
    
    let currentTenantsPage = 0;
    const tenantsPerPage = window.innerWidth >= 768 ? 3 : 1; // 3 on desktop, 1 on mobile
    const totalTenantsPages = 2;

    function updateTenantsCarousel(page) {
      if (tenantsCarousel) {
        const scrollAmount = page * (260 + 24) * tenantsPerPage; // card width + gap
        tenantsCarousel.scrollTo({
          left: scrollAmount,
          behavior: 'smooth'
        });
        
        // Update navigation buttons
        tenantsNavBtns.forEach(btn => {
          btn.removeAttribute('data-active');
          if (parseInt(btn.dataset.page) === page) {
            btn.setAttribute('data-active', 'true');
          }
        });
        
        currentTenantsPage = page;
      }
    }

    // Navigation button clicks
    tenantsNavBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const page = parseInt(btn.dataset.page);
        updateTenantsCarousel(page);
      });
    });

    // Arrow button functionality
    if (tenantsPrevBtn) {
      tenantsPrevBtn.addEventListener('click', () => {
        const newPage = currentTenantsPage > 0 ? currentTenantsPage - 1 : totalTenantsPages - 1;
        updateTenantsCarousel(newPage);
      });
    }

    if (tenantsNextBtn) {
      tenantsNextBtn.addEventListener('click', () => {
        const newPage = currentTenantsPage < totalTenantsPages - 1 ? currentTenantsPage + 1 : 0;
        updateTenantsCarousel(newPage);
      });
    }

    // Similar Properties Carousel Navigation
    const similarPropertiesCarousel = document.getElementById('similarPropertiesCarousel');
    const carouselNavBtns = document.querySelectorAll('.carousel-nav-btn');
    
    let currentCarouselPage = 0;

    function updateSimilarPropertiesCarousel(page) {
      if (similarPropertiesCarousel) {
        const translateX = page * -100; // Move by 100% for each page
        similarPropertiesCarousel.style.transform = `translateX(${translateX}%)`;
        
        // Update navigation buttons
        carouselNavBtns.forEach(btn => {
          btn.removeAttribute('data-active');
          if (parseInt(btn.dataset.page) === page) {
            btn.setAttribute('data-active', 'true');
          }
        });
        
        currentCarouselPage = page;
      }
    }

    // Navigation button clicks for Similar Properties
    carouselNavBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const page = parseInt(btn.dataset.page);
        updateSimilarPropertiesCarousel(page);
      });
    });
  </script>
</body>
</html>