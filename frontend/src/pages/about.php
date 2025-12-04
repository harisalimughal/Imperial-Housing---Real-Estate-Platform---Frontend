<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>About - Imperial Housing</title>
	<link rel="stylesheet" href="/public/assets/css/styles.css">
	<link rel="icon" href="/public/assets/images/logo.png" type="image/png">
	<script src="https://cdn.tailwindcss.com"></script>
	<script>
		tailwind.config = { theme: { extend: { fontFamily: { 'sans': ['Inter','sans-serif'] } } } }
	</script>
</head>
<body>
  <?php include 'header.php'; ?>

	<?php
	$heroTitle = 'About Imperial Housing';
	$heroSubtitle = 'Learn who we are and why we care about homes';
	$heroImages = '/public/assets/images/hero1.jpg,/public/assets/images/hero2.jpg';
  include 'hero.php';
	?>

  <!-- About Imperial Housing Section (White Background) -->
  <section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-10">
      <div class="grid grid-cols-1 lg:grid-cols-[422px_608px] gap-12 items-stretch">
        <!-- Image Column -->
        <div class="order-2 lg:order-1 flex justify-center items-center overflow-visible">
          <!-- Use object-contain and responsive sizing so the image isn't cropped on the right side -->
          <img src="/public/assets/images/tower.png" alt="Tower Bridge London" class="w-full max-w-[400px] h-auto object-contain rounded-3xl shadow-lg" style="max-height:720px;">
        </div>
        
        <!-- Content Column -->
  <div class="order-1 lg:order-2 flex flex-col">
          <!-- About Us Header -->
          <p class="text-black text-[18px] font-semibold uppercase tracking-wider mb-4">ABOUT US</p>
          
          <!-- About Imperial Housing Section -->
          <div class="mb-8">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">About Imperial Housing</h2>
            <p class="text-gray-700 text-[16px] leading-relaxed mb-4">
              Imperial Housing is a Managing Agent and accommodation provider based in the vibrant city of Birmingham. With a strong presence in the local market, and an increasing presence internationally, we specialise in three key categories: HMOs (House in Multiple Occupation), property developments and sales management.
            </p>
          </div>
          
          <!-- Why Choose Imperial Housing Section -->
          <div class="mb-8">
            <h3 class="text-4xl font-bold text-gray-900 mb-6">Why Choose Imperial Housing?</h3>
            <p class="text-gray-700 text-[16px] leading-relaxed mb-4">
              Since January 2020, Imperial Housing has been a trusted provider of HMO / Supported Accommodation, Serviced Accommodation, and Transitional Housing across Birmingham and the UK. We specialise in creating safe, comfortable, and well-managed homes for individuals, while providing landlords with professional property management that maximises their investment.
            </p>
            <p class="text-gray-700 text-[16px] leading-relaxed">
              With deep knowledge of the Birmingham property market and an expanding UK presence, we deliver tailored solutions that benefit both landlords and tenants. From expert HMO management in Birmingham to serviced accommodation nationwide and Transitional Housing for individuals, Imperial Housing combines professionalism, care, and results-driven service. Choose Imperial Housing for a partner who creates thriving homes, supports landlords, and expands innovative accommodation services across the UK.
            </p>
          </div>
        </div>
      </div>
      
      <!-- Features Section -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
        <!-- The Perfect Residency -->
        <div class="flex flex-col h-full">
          <div class="w-16 h-16 mx-auto mb-4 rounded-lg flex items-center justify-center">
            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M34.4758 3.42541C30.1845 5.30398 26.551 6.95824 26.4012 7.10149C26.1375 7.35375 26.129 7.4342 26.129 9.67053C26.129 11.9602 26.1315 11.9815 26.426 12.276C26.8132 12.6634 27.1433 12.6506 28.125 12.2101C28.5699 12.0104 28.9559 11.8471 28.983 11.8471C29.0101 11.8471 29.0323 13.0993 29.0323 14.6298V17.4125H15.7808H2.52931L2.23246 17.7095C1.94335 17.9986 1.93548 18.0551 1.93548 19.8322C1.93548 21.6094 1.94335 21.6659 2.23246 21.955C2.51843 22.2411 2.58944 22.252 4.16794 22.252H5.80645V24.6717V27.0915H4.16794C2.58944 27.0915 2.51843 27.1024 2.23246 27.3885C1.94335 27.6775 1.93548 27.734 1.93548 29.5112C1.93548 31.2884 1.94335 31.3449 2.23246 31.6339C2.47621 31.8779 2.64919 31.931 3.2002 31.931H3.87097V43.5457V55.1605H2.23246C0.653952 55.1605 0.582944 55.1714 0.296976 55.4575C0.0078629 55.7466 0 55.8031 0 57.5803C0 59.3574 0.0078629 59.4139 0.296976 59.703L0.593831 60H30H59.4062L59.703 59.703C59.9921 59.4139 60 59.3574 60 57.5803C60 55.8031 59.9921 55.7466 59.703 55.4575C59.4171 55.1714 59.346 55.1605 57.7675 55.1605H56.129V43.5457V31.931H56.7998C57.3508 31.931 57.5238 31.8779 57.7675 31.6339C58.0567 31.3449 58.0645 31.2884 58.0645 29.5112C58.0645 27.734 58.0567 27.6775 57.7675 27.3885C57.5238 27.1446 57.3508 27.0915 56.7998 27.0915H56.129V19.4693C56.129 15.2771 56.1512 11.8471 56.1783 11.8471C56.2054 11.8471 56.5914 12.0104 57.0363 12.2101C58.0179 12.6506 58.3481 12.6634 58.7353 12.276C59.0297 11.9816 59.0323 11.9591 59.0323 9.68819C59.0323 7.68271 59.0059 7.36609 58.8206 7.14649C58.5716 6.85153 42.93 -0.0143749 42.5399 2.26112e-05C42.3959 0.00534605 38.7671 1.54684 34.4758 3.42541ZM49.7314 5.14355C53.616 6.84669 56.8625 8.26805 56.9456 8.30217C57.0469 8.34391 57.0968 8.654 57.0968 9.24381V10.1231L49.9508 6.9926C46.0206 5.27071 42.7079 3.86193 42.5892 3.86193C42.4227 3.86193 33.7454 7.60661 28.7601 9.82975L28.0645 10.14V9.2553V8.37076L35.2319 5.22195C39.1738 3.49014 42.4598 2.06733 42.5338 2.06019C42.6079 2.05305 45.8468 3.44054 49.7314 5.14355ZM48.3987 8.4315L54.1331 10.9443L54.1642 19.0179L54.1952 27.0915H42.5806H30.966L30.9971 19.0225L31.0282 10.9535L36.7137 8.44795C39.8407 7.06991 42.4588 5.93699 42.5318 5.93057C42.6047 5.92404 45.2448 7.04946 48.3987 8.4315ZM32.2325 12.87L31.9355 13.1669V16.9286V20.6902L32.2325 20.9871L32.5293 21.2841H36.7742H41.0191L41.3159 20.9871L41.6129 20.6902V16.9286V13.1669L41.3159 12.87L41.0191 12.573H36.7742H32.5293L32.2325 12.87ZM43.8454 12.87L43.5484 13.1669V16.9286V20.6902L43.8454 20.9871L44.1422 21.2841H48.3871H52.632L52.9288 20.9871L53.2258 20.6902V16.9286V13.1669L52.9288 12.87L52.632 12.573H48.3871H44.1422L43.8454 12.87ZM39.6774 16.9286V19.3483H36.7742H33.871V16.9286V14.5088H36.7742H39.6774V16.9286ZM51.2903 16.9286V19.3483H48.3871H45.4839V16.9286V14.5088H48.3871H51.2903V16.9286ZM29.0323 19.8322V20.3162H16.4516H3.87097V19.8322V19.3483H16.4516H29.0323V19.8322ZM11.6129 24.6717V27.0915H9.67742H7.74194V24.6717V22.252H9.67742H11.6129V24.6717ZM17.4194 24.6717V27.0915H15.4839H13.5484V24.6717V22.252H15.4839H17.4194V24.6717ZM23.2258 24.6717V27.0915H21.2903H19.3548V24.6717V22.252H21.2903H23.2258V24.6717ZM29.0323 24.6717V27.0915H27.0968H25.1613V24.6717V22.252H27.0968H29.0323V24.6717ZM56.129 29.5112V29.9952H30H3.87097V29.5112V29.0273H30H56.129V29.5112ZM29.0323 43.5457V55.1605H28.0645H27.0968V48.3852C27.0968 42.3549 27.1173 41.6099 27.2837 41.6099C27.3865 41.6099 27.6042 41.4763 27.7675 41.3129C28.0567 41.0239 28.0645 40.9674 28.0645 39.1902C28.0645 37.413 28.0567 37.3565 27.7675 37.0675L27.4707 36.7705H17.4194H7.36802L7.07117 37.0675C6.78206 37.3565 6.77419 37.413 6.77419 39.1902C6.77419 40.9674 6.78206 41.0239 7.07117 41.3129C7.23448 41.4763 7.45222 41.6099 7.55504 41.6099C7.72137 41.6099 7.74194 42.3549 7.74194 48.3852V55.1605H6.77419H5.80645V43.5457V31.931H17.4194H29.0323V43.5457ZM54.1935 43.5457V55.1605H48.3871H42.5806V48.6823V42.2039L42.2837 41.907L41.9868 41.6099H37.2581H32.5293L32.2325 41.907L31.9355 42.2039V48.6823V55.1605H31.4516H30.9677V43.5457V31.931H42.5806H54.1935V43.5457ZM26.129 39.1902V39.6741H17.4194H8.70968V39.1902V38.7062H17.4194H26.129V39.1902ZM25.1613 48.3852V55.1605H17.4194H9.67742V48.3852V41.6099H17.4194H25.1613V48.3852ZM43.8454 41.907L43.5484 42.2039V45.9655V49.7271L43.8454 50.024L44.1422 50.321H48.3871H52.632L52.9288 50.024L53.2258 49.7271V45.9655V42.2039L52.9288 41.907L52.632 41.6099H48.3871H44.1422L43.8454 41.907ZM40.6452 49.3531V55.1605H37.2581H33.871V49.3531V43.5457H37.2581H40.6452V49.3531ZM51.2903 45.9655V48.3852H48.3871H45.4839V45.9655V43.5457H48.3871H51.2903V45.9655ZM38.0389 47.7144C37.7594 47.994 37.7419 48.0898 37.7419 49.3531C37.7419 50.6165 37.7594 50.7123 38.0389 50.9919C38.226 51.1792 38.474 51.2889 38.7097 51.2889C38.9453 51.2889 39.1933 51.1792 39.3804 50.9919C39.66 50.7123 39.6774 50.6165 39.6774 49.3531C39.6774 48.0898 39.66 47.994 39.3804 47.7144C39.1933 47.5271 38.9453 47.4173 38.7097 47.4173C38.474 47.4173 38.226 47.5271 38.0389 47.7144ZM58.0645 57.5803V58.0642H30H1.93548V57.5803V57.0963H30H58.0645V57.5803Z" fill="#151EA6"/>
            </svg>

          </div>
          <div class="mt-auto text-center">
            <h4 class="text-xl font-bold text-gray-900 mb-3">The Perfect Residency</h4>
            <p class="text-gray-600 mb-2">Comfortable, safe, and modern homes</p>
            <p class="text-gray-600">Designed for convenience and peace of mind</p>
          </div>
        </div>
        
        <!-- Trusted Across The UK -->
        <div class="text-center">
          <div class="w-16 h-16 mx-auto mb-4  rounded-lg flex items-center justify-center">
            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M34.4758 3.42541C30.1845 5.30398 26.551 6.95824 26.4012 7.10149C26.1375 7.35375 26.129 7.4342 26.129 9.67053C26.129 11.9602 26.1315 11.9815 26.426 12.276C26.8132 12.6634 27.1433 12.6506 28.125 12.2101C28.5699 12.0104 28.9559 11.8471 28.983 11.8471C29.0101 11.8471 29.0323 13.0993 29.0323 14.6298V17.4125H15.7808H2.52931L2.23246 17.7095C1.94335 17.9986 1.93548 18.0551 1.93548 19.8322C1.93548 21.6094 1.94335 21.6659 2.23246 21.955C2.51843 22.2411 2.58944 22.252 4.16794 22.252H5.80645V24.6717V27.0915H4.16794C2.58944 27.0915 2.51843 27.1024 2.23246 27.3885C1.94335 27.6775 1.93548 27.734 1.93548 29.5112C1.93548 31.2884 1.94335 31.3449 2.23246 31.6339C2.47621 31.8779 2.64919 31.931 3.2002 31.931H3.87097V43.5457V55.1605H2.23246C0.653952 55.1605 0.582944 55.1714 0.296976 55.4575C0.0078629 55.7466 0 55.8031 0 57.5803C0 59.3574 0.0078629 59.4139 0.296976 59.703L0.593831 60H30H59.4062L59.703 59.703C59.9921 59.4139 60 59.3574 60 57.5803C60 55.8031 59.9921 55.7466 59.703 55.4575C59.4171 55.1714 59.346 55.1605 57.7675 55.1605H56.129V43.5457V31.931H56.7998C57.3508 31.931 57.5238 31.8779 57.7675 31.6339C58.0567 31.3449 58.0645 31.2884 58.0645 29.5112C58.0645 27.734 58.0567 27.6775 57.7675 27.3885C57.5238 27.1446 57.3508 27.0915 56.7998 27.0915H56.129V19.4693C56.129 15.2771 56.1512 11.8471 56.1783 11.8471C56.2054 11.8471 56.5914 12.0104 57.0363 12.2101C58.0179 12.6506 58.3481 12.6634 58.7353 12.276C59.0297 11.9816 59.0323 11.9591 59.0323 9.68819C59.0323 7.68271 59.0059 7.36609 58.8206 7.14649C58.5716 6.85153 42.93 -0.0143749 42.5399 2.26112e-05C42.3959 0.00534605 38.7671 1.54684 34.4758 3.42541ZM49.7314 5.14355C53.616 6.84669 56.8625 8.26805 56.9456 8.30217C57.0469 8.34391 57.0968 8.654 57.0968 9.24381V10.1231L49.9508 6.9926C46.0206 5.27071 42.7079 3.86193 42.5892 3.86193C42.4227 3.86193 33.7454 7.60661 28.7601 9.82975L28.0645 10.14V9.2553V8.37076L35.2319 5.22195C39.1738 3.49014 42.4598 2.06733 42.5338 2.06019C42.6079 2.05305 45.8468 3.44054 49.7314 5.14355ZM48.3987 8.4315L54.1331 10.9443L54.1642 19.0179L54.1952 27.0915H42.5806H30.966L30.9971 19.0225L31.0282 10.9535L36.7137 8.44795C39.8407 7.06991 42.4588 5.93699 42.5318 5.93057C42.6047 5.92404 45.2448 7.04946 48.3987 8.4315ZM32.2325 12.87L31.9355 13.1669V16.9286V20.6902L32.2325 20.9871L32.5293 21.2841H36.7742H41.0191L41.3159 20.9871L41.6129 20.6902V16.9286V13.1669L41.3159 12.87L41.0191 12.573H36.7742H32.5293L32.2325 12.87ZM43.8454 12.87L43.5484 13.1669V16.9286V20.6902L43.8454 20.9871L44.1422 21.2841H48.3871H52.632L52.9288 20.9871L53.2258 20.6902V16.9286V13.1669L52.9288 12.87L52.632 12.573H48.3871H44.1422L43.8454 12.87ZM39.6774 16.9286V19.3483H36.7742H33.871V16.9286V14.5088H36.7742H39.6774V16.9286ZM51.2903 16.9286V19.3483H48.3871H45.4839V16.9286V14.5088H48.3871H51.2903V16.9286ZM29.0323 19.8322V20.3162H16.4516H3.87097V19.8322V19.3483H16.4516H29.0323V19.8322ZM11.6129 24.6717V27.0915H9.67742H7.74194V24.6717V22.252H9.67742H11.6129V24.6717ZM17.4194 24.6717V27.0915H15.4839H13.5484V24.6717V22.252H15.4839H17.4194V24.6717ZM23.2258 24.6717V27.0915H21.2903H19.3548V24.6717V22.252H21.2903H23.2258V24.6717ZM29.0323 24.6717V27.0915H27.0968H25.1613V24.6717V22.252H27.0968H29.0323V24.6717ZM56.129 29.5112V29.9952H30H3.87097V29.5112V29.0273H30H56.129V29.5112ZM29.0323 43.5457V55.1605H28.0645H27.0968V48.3852C27.0968 42.3549 27.1173 41.6099 27.2837 41.6099C27.3865 41.6099 27.6042 41.4763 27.7675 41.3129C28.0567 41.0239 28.0645 40.9674 28.0645 39.1902C28.0645 37.413 28.0567 37.3565 27.7675 37.0675L27.4707 36.7705H17.4194H7.36802L7.07117 37.0675C6.78206 37.3565 6.77419 37.413 6.77419 39.1902C6.77419 40.9674 6.78206 41.0239 7.07117 41.3129C7.23448 41.4763 7.45222 41.6099 7.55504 41.6099C7.72137 41.6099 7.74194 42.3549 7.74194 48.3852V55.1605H6.77419H5.80645V43.5457V31.931H17.4194H29.0323V43.5457ZM54.1935 43.5457V55.1605H48.3871H42.5806V48.6823V42.2039L42.2837 41.907L41.9868 41.6099H37.2581H32.5293L32.2325 41.907L31.9355 42.2039V48.6823V55.1605H31.4516H30.9677V43.5457V31.931H42.5806H54.1935V43.5457ZM26.129 39.1902V39.6741H17.4194H8.70968V39.1902V38.7062H17.4194H26.129V39.1902ZM25.1613 48.3852V55.1605H17.4194H9.67742V48.3852V41.6099H17.4194H25.1613V48.3852ZM43.8454 41.907L43.5484 42.2039V45.9655V49.7271L43.8454 50.024L44.1422 50.321H48.3871H52.632L52.9288 50.024L53.2258 49.7271V45.9655V42.2039L52.9288 41.907L52.632 41.6099H48.3871H44.1422L43.8454 41.907ZM40.6452 49.3531V55.1605H37.2581H33.871V49.3531V43.5457H37.2581H40.6452V49.3531ZM51.2903 45.9655V48.3852H48.3871H45.4839V45.9655V43.5457H48.3871H51.2903V45.9655ZM38.0389 47.7144C37.7594 47.994 37.7419 48.0898 37.7419 49.3531C37.7419 50.6165 37.7594 50.7123 38.0389 50.9919C38.226 51.1792 38.474 51.2889 38.7097 51.2889C38.9453 51.2889 39.1933 51.1792 39.3804 50.9919C39.66 50.7123 39.6774 50.6165 39.6774 49.3531C39.6774 48.0898 39.66 47.994 39.3804 47.7144C39.1933 47.5271 38.9453 47.4173 38.7097 47.4173C38.474 47.4173 38.226 47.5271 38.0389 47.7144ZM58.0645 57.5803V58.0642H30H1.93548V57.5803V57.0963H30H58.0645V57.5803Z" fill="#151EA6"/>
            </svg>

          </div>
          <h4 class="text-xl font-bold text-gray-900 mb-3">Trusted Across The UK</h4>
          <p class="text-gray-600 mb-2">Reliable housing solutions nationwide</p>
          <p class="text-gray-600">From shared homes to supported living</p>
        </div>
        
        <!-- Total Transparency -->
        <div class="text-center">
          <div class="w-16 h-16 mx-auto mb-4  rounded-lg flex items-center justify-center">
            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M34.4758 3.42541C30.1845 5.30398 26.551 6.95824 26.4012 7.10149C26.1375 7.35375 26.129 7.4342 26.129 9.67053C26.129 11.9602 26.1315 11.9815 26.426 12.276C26.8132 12.6634 27.1433 12.6506 28.125 12.2101C28.5699 12.0104 28.9559 11.8471 28.983 11.8471C29.0101 11.8471 29.0323 13.0993 29.0323 14.6298V17.4125H15.7808H2.52931L2.23246 17.7095C1.94335 17.9986 1.93548 18.0551 1.93548 19.8322C1.93548 21.6094 1.94335 21.6659 2.23246 21.955C2.51843 22.2411 2.58944 22.252 4.16794 22.252H5.80645V24.6717V27.0915H4.16794C2.58944 27.0915 2.51843 27.1024 2.23246 27.3885C1.94335 27.6775 1.93548 27.734 1.93548 29.5112C1.93548 31.2884 1.94335 31.3449 2.23246 31.6339C2.47621 31.8779 2.64919 31.931 3.2002 31.931H3.87097V43.5457V55.1605H2.23246C0.653952 55.1605 0.582944 55.1714 0.296976 55.4575C0.0078629 55.7466 0 55.8031 0 57.5803C0 59.3574 0.0078629 59.4139 0.296976 59.703L0.593831 60H30H59.4062L59.703 59.703C59.9921 59.4139 60 59.3574 60 57.5803C60 55.8031 59.9921 55.7466 59.703 55.4575C59.4171 55.1714 59.346 55.1605 57.7675 55.1605H56.129V43.5457V31.931H56.7998C57.3508 31.931 57.5238 31.8779 57.7675 31.6339C58.0567 31.3449 58.0645 31.2884 58.0645 29.5112C58.0645 27.734 58.0567 27.6775 57.7675 27.3885C57.5238 27.1446 57.3508 27.0915 56.7998 27.0915H56.129V19.4693C56.129 15.2771 56.1512 11.8471 56.1783 11.8471C56.2054 11.8471 56.5914 12.0104 57.0363 12.2101C58.0179 12.6506 58.3481 12.6634 58.7353 12.276C59.0297 11.9816 59.0323 11.9591 59.0323 9.68819C59.0323 7.68271 59.0059 7.36609 58.8206 7.14649C58.5716 6.85153 42.93 -0.0143749 42.5399 2.26112e-05C42.3959 0.00534605 38.7671 1.54684 34.4758 3.42541ZM49.7314 5.14355C53.616 6.84669 56.8625 8.26805 56.9456 8.30217C57.0469 8.34391 57.0968 8.654 57.0968 9.24381V10.1231L49.9508 6.9926C46.0206 5.27071 42.7079 3.86193 42.5892 3.86193C42.4227 3.86193 33.7454 7.60661 28.7601 9.82975L28.0645 10.14V9.2553V8.37076L35.2319 5.22195C39.1738 3.49014 42.4598 2.06733 42.5338 2.06019C42.6079 2.05305 45.8468 3.44054 49.7314 5.14355ZM48.3987 8.4315L54.1331 10.9443L54.1642 19.0179L54.1952 27.0915H42.5806H30.966L30.9971 19.0225L31.0282 10.9535L36.7137 8.44795C39.8407 7.06991 42.4588 5.93699 42.5318 5.93057C42.6047 5.92404 45.2448 7.04946 48.3987 8.4315ZM32.2325 12.87L31.9355 13.1669V16.9286V20.6902L32.2325 20.9871L32.5293 21.2841H36.7742H41.0191L41.3159 20.9871L41.6129 20.6902V16.9286V13.1669L41.3159 12.87L41.0191 12.573H36.7742H32.5293L32.2325 12.87ZM43.8454 12.87L43.5484 13.1669V16.9286V20.6902L43.8454 20.9871L44.1422 21.2841H48.3871H52.632L52.9288 20.9871L53.2258 20.6902V16.9286V13.1669L52.9288 12.87L52.632 12.573H48.3871H44.1422L43.8454 12.87ZM39.6774 16.9286V19.3483H36.7742H33.871V16.9286V14.5088H36.7742H39.6774V16.9286ZM51.2903 16.9286V19.3483H48.3871H45.4839V16.9286V14.5088H48.3871H51.2903V16.9286ZM29.0323 19.8322V20.3162H16.4516H3.87097V19.8322V19.3483H16.4516H29.0323V19.8322ZM11.6129 24.6717V27.0915H9.67742H7.74194V24.6717V22.252H9.67742H11.6129V24.6717ZM17.4194 24.6717V27.0915H15.4839H13.5484V24.6717V22.252H15.4839H17.4194V24.6717ZM23.2258 24.6717V27.0915H21.2903H19.3548V24.6717V22.252H21.2903H23.2258V24.6717ZM29.0323 24.6717V27.0915H27.0968H25.1613V24.6717V22.252H27.0968H29.0323V24.6717ZM56.129 29.5112V29.9952H30H3.87097V29.5112V29.0273H30H56.129V29.5112ZM29.0323 43.5457V55.1605H28.0645H27.0968V48.3852C27.0968 42.3549 27.1173 41.6099 27.2837 41.6099C27.3865 41.6099 27.6042 41.4763 27.7675 41.3129C28.0567 41.0239 28.0645 40.9674 28.0645 39.1902C28.0645 37.413 28.0567 37.3565 27.7675 37.0675L27.4707 36.7705H17.4194H7.36802L7.07117 37.0675C6.78206 37.3565 6.77419 37.413 6.77419 39.1902C6.77419 40.9674 6.78206 41.0239 7.07117 41.3129C7.23448 41.4763 7.45222 41.6099 7.55504 41.6099C7.72137 41.6099 7.74194 42.3549 7.74194 48.3852V55.1605H6.77419H5.80645V43.5457V31.931H17.4194H29.0323V43.5457ZM54.1935 43.5457V55.1605H48.3871H42.5806V48.6823V42.2039L42.2837 41.907L41.9868 41.6099H37.2581H32.5293L32.2325 41.907L31.9355 42.2039V48.6823V55.1605H31.4516H30.9677V43.5457V31.931H42.5806H54.1935V43.5457ZM26.129 39.1902V39.6741H17.4194H8.70968V39.1902V38.7062H17.4194H26.129V39.1902ZM25.1613 48.3852V55.1605H17.4194H9.67742V48.3852V41.6099H17.4194H25.1613V48.3852ZM43.8454 41.907L43.5484 42.2039V45.9655V49.7271L43.8454 50.024L44.1422 50.321H48.3871H52.632L52.9288 50.024L53.2258 49.7271V45.9655V42.2039L52.9288 41.907L52.632 41.6099H48.3871H44.1422L43.8454 41.907ZM40.6452 49.3531V55.1605H37.2581H33.871V49.3531V43.5457H37.2581H40.6452V49.3531ZM51.2903 45.9655V48.3852H48.3871H45.4839V45.9655V43.5457H48.3871H51.2903V45.9655ZM38.0389 47.7144C37.7594 47.994 37.7419 48.0898 37.7419 49.3531C37.7419 50.6165 37.7594 50.7123 38.0389 50.9919C38.226 51.1792 38.474 51.2889 38.7097 51.2889C38.9453 51.2889 39.1933 51.1792 39.3804 50.9919C39.66 50.7123 39.6774 50.6165 39.6774 49.3531C39.6774 48.0898 39.66 47.994 39.3804 47.7144C39.1933 47.5271 38.9453 47.4173 38.7097 47.4173C38.474 47.4173 38.226 47.5271 38.0389 47.7144ZM58.0645 57.5803V58.0642H30H1.93548V57.5803V57.0963H30H58.0645V57.5803Z" fill="#151EA6"/>
            </svg>
          </div>
          <h4 class="text-xl font-bold text-gray-900 mb-3">Total Transparency</h4>
          <p class="text-gray-600 mb-2">Clear communication, no hidden terms</p>
          <p class="text-gray-600">Honest, straightforward service you can trust</p>
        </div>

          

      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="py-16 bg-white">
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
          <!-- Mobile-only arrows: appear below the review cards on small screens -->
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
</body>
</html>