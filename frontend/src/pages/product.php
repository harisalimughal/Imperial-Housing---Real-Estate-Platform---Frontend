<?php 
// Prevent caching to fix back button issues
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

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

// Get property images from folder
$propertyImagesFolder = __DIR__ . '/../../public/assets/images/properties/p' . $propertyId;
$propertyImages = [];

if (is_dir($propertyImagesFolder)) {
    $files = scandir($propertyImagesFolder);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..' && preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $file)) {
            $propertyImages[] = $file;
        }
    }
    
    // Sort images numerically (1.jpg, 2.jpg, 3.jpg, etc.)
    usort($propertyImages, function($a, $b) {
        $numA = (int)preg_replace('/[^0-9]/', '', $a);
        $numB = (int)preg_replace('/[^0-9]/', '', $b);
        return $numA - $numB;
    });
}

// If no images found in folder, use the default image from property data
if (empty($propertyImages)) {
    $propertyImages = [$property['image']];
    $useDefaultImages = true;
} else {
    // Convert to full paths
    $propertyImages = array_map(function($img) use ($propertyId) {
        return '/public/assets/images/properties/p' . $propertyId . '/' . $img;
    }, $propertyImages);
    $useDefaultImages = false;
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
            <img id="mainImage" src="<?php echo htmlspecialchars($propertyImages[0]); ?>" 
                 class="w-full h-[400px] object-cover rounded-2xl transition-all duration-300" 
                 alt="<?php echo htmlspecialchars($property['title']); ?>">

          </div>
          
          <!-- Thumbnail Images -->
          <div class="grid grid-cols-4 gap-2">
            <?php foreach ($propertyImages as $index => $image): ?>
            <img src="<?php echo htmlspecialchars($image); ?>" 
                 class="thumbnail-image w-full h-20 object-cover rounded-lg cursor-pointer border-2 <?php echo $index === 0 ? 'border-blue-500' : 'border-transparent'; ?> transition-all duration-200 hover:opacity-80" 
                 data-image="<?php echo htmlspecialchars($image); ?>"
                 alt="Property view <?php echo $index + 1; ?>">
            <?php endforeach; ?>
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
              <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 640 512">
                <path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/>
              </svg>
              <?php echo $property['bedrooms']; ?> beds
            </div>
            <div class="flex items-center bg-blue-100 text-blue-800 px-3 py-2 rounded-lg">
              <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 512 512">
                <path d="M96 77.3c0-7.3 5.9-13.3 13.3-13.3c3.5 0 6.9 1.4 9.4 3.9l14.9 14.9C130 91.8 128 101.7 128 112c0 19.9 7.2 38 19.2 52c-5.3 9.2-4 21.1 3.8 29c9.4 9.4 24.6 9.4 33.9 0L289 89c9.4-9.4 9.4-24.6 0-33.9c-7.9-7.9-19.8-9.1-29-3.8C246 39.2 227.9 32 208 32c-10.3 0-20.2 2-29.2 5.5L163.9 22.6C149.4 8.1 129.7 0 109.3 0C66.6 0 32 34.6 32 77.3V256c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H96V77.3zM32 352v16c0 28.4 12.4 54 32 71.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V464H384v16c0 17.7 14.3 32 32 32s32-14.3 32-32V439.6c19.6-17.6 32-43.1 32-71.6V352H32z"/>
              </svg>
              <?php echo $property['bathrooms']; ?> baths
            </div>
            <div class="flex items-center bg-blue-100 text-blue-800 px-3 py-2 rounded-lg">
              <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 448 512">
                <path d="M24 0C10.7 0 0 10.7 0 24S10.7 48 24 48h8V196.9c-1.9 1.4-3.8 2.9-5.6 4.4C10.9 214.5 0 232.9 0 256c0 46.9 14.3 84.1 37 112.5c14.2 17.7 31.1 31.3 48.5 41.8L65.6 469.9c-3.3 9.8-1.6 20.5 4.4 28.8s15.7 13.3 26 13.3H352c10.3 0 19.9-4.9 26-13.3s7.7-19.1 4.4-28.8l-19.8-59.5c17.4-10.5 34.3-24.1 48.5-41.8c22.7-28.4 37-65.5 37-112.5c0-23.1-10.9-41.5-26.4-54.6c-1.8-1.5-3.7-3-5.6-4.4V48h8c13.3 0 24-10.7 24-24s-10.7-24-24-24H24zM384 256.3c0 1-.3 2.6-3.8 5.6c-4.8 4.1-14 9-29.3 13.4C320.5 284 276.1 288 224 288s-96.5-4-126.9-12.8c-15.3-4.4-24.5-9.3-29.3-13.4c-3.5-3-3.8-4.6-3.8-5.6l0-.3 0-.1 0 0 0 0c0 0 0 0 0 0s0 0 0 0c0-33.9 4.3-66.6 11.3-95.8c6.9-28.9 16.7-53.1 27.6-68.3c10.7-15 21.8-20.8 28.8-22.7c6.9-1.9 18.1-2.9 34.5-2.9h91.8c16.4 0 27.6 1.1 34.5 2.9c6.9 1.9 18.1 7.7 28.8 22.7c10.9 15.2 20.7 39.4 27.6 68.3c6.9 29.2 11.3 61.9 11.3 95.8l0 0 0 0 0 0 0 .1 0 .3zM216 464h16c13.3 0 24-10.7 24-24s-10.7-24-24-24H216c-13.3 0-24 10.7-24 24s10.7 24 24 24z"/>
              </svg>
              <?php echo $property['wc']; ?> WC
            </div>
          </div>

          <!-- Separator Line -->
          <hr class="border-gray-400">

          <!-- Property Description -->
          <div class="bg-gray-50 rounded-2xl p-6">
            <h2 class="text-2xl font-bold mb-4 text-gray-900">𝗦𝘂𝗽𝗽𝗼𝗿𝘁𝗲𝗱 𝗦𝗵𝗮𝗿𝗲𝗱 𝗔𝗰𝗰𝗼𝗺𝗺𝗼𝗱𝗮𝘁𝗶𝗼𝗻</h2>
            
            <div class="text-gray-700 leading-relaxed space-y-4">
              <p class="font-semibold">
                We have <?php echo $property['bedrooms']; ?> rooms available in this <?php echo $property['bedrooms']; ?> bedroom #supportedaccommodation in <?php echo htmlspecialchars($property['area']); ?> Birmingham.
              </p>
              
              <p>
                As you can see it's a stunning large property with huge double rooms.
              </p>
              
              <p class="font-semibold">Rooms also available in:</p>
              <ul class="space-y-2">
                <li class="flex items-center">
                  <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  Sparkbrook
                </li>
                <li class="flex items-center">
                  <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  Balsall Health
                </li>
                <li class="flex items-center">
                  <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  Hall Green
                </li>
                <li class="flex items-center">
                  <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  Yardley Wood
                </li>
                <li class="flex items-center">
                  <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  Sparkhill
                </li>
                <li class="flex items-center">
                  <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  Moseley
                </li>
              </ul>
              
              <p class="font-semibold mt-6">All properties have:</p>
              <ul class="space-y-2">
                <li class="flex items-center">
                  <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  Fully furnished rooms with all essentials provided
                </li>
                <li class="flex items-center">
                  <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  Professional cleaning service for communal areas
                </li>
                <li class="flex items-center">
                  <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  All bills inclusive, including unlimited Fast WiFi
                </li>
                <li class="flex items-center">
                  <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  Prime and desired locations
                </li>
              </ul>
              
              <p class="font-semibold mt-6">
                Book your room now with us and live a hassle and stress-free life.
              </p>
              
              <p class="font-semibold text-gray-700 mt-4">
                If interested please call <a href="tel:07557538026" class="text-blue-600 underline hover:text-blue-800">07557538026</a>
              </p>
            </div>
          </div>









          <!-- Separator Line -->
          <hr class="border-gray-400">

          <!-- Contact Buttons -->
          <div class="pt-4 flex gap-4">
            <!-- Call Button -->
            <a href="tel:07557538026" 
               class="flex-1 bg-[#25D366] hover:bg-[#1DA851] text-white rounded-xl font-medium transition-colors flex items-center justify-center text-xl"
               style="height: 70px;">
              <svg class="w-7 h-7 mr-3" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 00-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/>
              </svg>
              Call
            </a>
            
            <!-- Email Button -->
            <a href="mailto:imperialhousingwm@gmail.com?subject=Inquiry about <?php echo urlencode($property['title'] . ' - ' . $property['area'] . ' Birmingham'); ?>" 
               class="flex-1 bg-[#EA4335] hover:bg-[#D33426] text-white rounded-xl font-medium transition-colors flex items-center justify-center text-xl"
               style="height: 70px;">
              <svg class="w-7 h-7 mr-3" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
              </svg>
              Email
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Form Section -->
  <!-- Contact Form Section -->
	<section class="py-20 bg-white">
		<div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-10">
			<div class="max-w-4xl mx-auto">
				<!-- Contact Form -->
				<form class="space-y-6">
					<!-- First Row - Name and Email -->
					<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
						<div>
							<input 
								type="text" 
								name="name" 
								placeholder="Name" 
								required 
								class="w-full px-4 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700 placeholder-gray-500"
							>
						</div>
						<div>
							<input 
								type="email" 
								name="email" 
								placeholder="Email" 
								required 
								class="w-full px-4 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700 placeholder-gray-500"
							>
						</div>
					</div>

					<!-- Second Row - Contact Number and Required Moving Date -->
					<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
						<div>
							<input 
								type="tel" 
								name="contact_number" 
								placeholder="Contact Number" 
								required 
								class="w-full px-4 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700 placeholder-gray-500"
							>
						</div>
						<div>
							<input 
								type="date" 
								name="required_moving_date" 
								placeholder="Request Move IN" 
								required 
								class="w-full px-4 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700 placeholder-gray-500"
							>
						</div>
					</div>

					<!-- Third Row - Postal Code and Area -->
					<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
						<div>
							<input 
								type="text" 
								name="post_code" 
								placeholder="Post Code" 
								class="w-full px-4 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700 placeholder-gray-500"
							>
						</div>
						<div class="relative">
							<select 
								name="area" 
								required 
								class="w-full px-4 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700 appearance-none bg-white"
							>
								<option value="" disabled selected class="text-gray-500">Area</option>
								<option value="aston">Aston</option>
								<option value="balsall-heath">Balsall Heath</option>
								<option value="bartley-green">Bartley Green</option>
								<option value="bournville">Bournville</option>
								<option value="edgbaston">Edgbaston</option>
								<option value="erdington">Erdington</option>
								<option value="hall-green">Hall Green</option>
								<option value="handsworth">Handsworth</option>
								<option value="harborne">Harborne</option>
								<option value="hodge-hill">Hodge Hill</option>
								<option value="kings-heath">Kings Heath</option>
								<option value="ladywood">Ladywood</option>
								<option value="lozells">Lozells</option>
								<option value="moseley">Moseley</option>
								<option value="northfield">Northfield</option>
								<option value="perry-barr">Perry Barr</option>
								<option value="quinton">Quinton</option>
								<option value="selly-oak">Selly Oak</option>
								<option value="selly-park">Selly Park</option>
								<option value="small-heath">Small Heath</option>
								<option value="sparkbrook">Sparkbrook</option>
								<option value="sparkhill">Sparkhill</option>
								<option value="stirchley">Stirchley</option>
								<option value="sutton-coldfield">Sutton Coldfield</option>
								<option value="winson-green">Winson Green</option>
								<option value="yardley">Yardley</option>
							</select>
							<div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
								<svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
								</svg>
							</div>
						</div>
					</div>

					<!-- Message Field -->
					<div>
						<textarea 
							name="message" 
							placeholder="Message" 
							rows="6" 
							required 
							class="w-full px-4 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700 placeholder-gray-500 resize-none"
						></textarea>
					</div>

					<!-- Submit Button -->
					<div class="text-center">
						<button 
							type="submit" 
							class="px-16 py-4 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-lg transition duration-300 transform hover:scale-105"
						>
							Send
						</button>
					</div>
				</form>

				<!-- Contact Information -->
				<div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
					<!-- Reservation -->
					<div class="flex flex-col items-center">
						<div class="w-10 h-10 bg-blue-700 rounded-lg flex items-center justify-center mb-4" style="background-color: #151EA6;">
							<svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
							</svg>
						</div>
						<h3 class="font-semibold text-gray-900 mb-1">Reservation</h3>
						<p class="text-gray-600">07557538026</p>
					</div>

					<!-- Email Info -->
					<div class="flex flex-col items-center">
						<div class="w-10 h-10 bg-blue-700 rounded-lg flex items-center justify-center mb-4" style="background-color: #151EA6;">
							<svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
							</svg>
						</div>
						<h3 class="font-semibold text-gray-900 mb-1">Email Info</h3>
						<p class="text-gray-600">imperialhousingwm@gmail.com</p>
					</div>

					<!-- Address -->
					<div class="flex flex-col items-center">
						<div class="w-10 h-10 bg-blue-700 rounded-lg flex items-center justify-center mb-4" style="background-color: #151EA6;">
							<svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
							</svg>
						</div>
						<h3 class="font-semibold text-gray-900 mb-1">Address</h3>
						<p class="text-gray-600">1250 Coventry Road, B25 8BJ, Birmingham</p>
					</div>
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

  <?php include 'footer.php'; ?>

  <script src="/public/assets/js/main.js"></script>
  <script src="/public/assets/js/back-button-fix.js"></script>
  
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
