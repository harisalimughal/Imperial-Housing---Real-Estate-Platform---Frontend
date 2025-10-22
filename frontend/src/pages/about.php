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
	<?php include '../partials/header.php'; ?>

	<?php
	$heroTitle = 'About Imperial Housing';
	$heroSubtitle = 'Learn who we are and why we care about homes';
	$heroImages = '/public/assets/images/hero1.png,/public/assets/images/hero2.png';
	include '../partials/hero.php';
	?>

	<main class="container mx-auto px-6 py-20">
		<!-- About Us Section -->
		<div class="mb-16">
			<p class="text-blue-600 text-sm font-semibold uppercase tracking-wider mb-4">ABOUT US</p>
			
			<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
				<!-- Image Column -->
				<div class="order-2 lg:order-1">
					<div class="w-full h-96 bg-gradient-to-br from-blue-500 to-blue-700 rounded-lg shadow-lg flex items-center justify-center">
						<div class="text-center text-white">
							<svg class="w-16 h-16 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
								<path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
							</svg>
							<p class="text-lg font-semibold">Tower Bridge Image</p>
							<p class="text-sm opacity-80">Placeholder - Add tower-bridge.jpg</p>
						</div>
					</div>
				</div>
				
				<!-- Content Column -->
				<div class="order-1 lg:order-2">
					<!-- About Imperial Housing Section -->
					<div class="mb-8">
						<h1 class="text-4xl font-bold text-gray-900 mb-6">About Imperial Housing</h1>
						<p class="text-gray-700 text-lg leading-relaxed mb-4">
							MKM Housing is a Managing Agent and accommodation provider based in the vibrant city of Birmingham. With a strong presence in the local market, and an increasing presence internationally, we specialise in three key categories: HMOs (House in Multiple Occupation), Serviced Accommodation, and Sales.
						</p>
					</div>
					
					<!-- Why Choose Imperial Housing Section -->
					<div class="mb-8">
						<h2 class="text-3xl font-bold text-gray-900 mb-6">Why Choose Imperial Housing?</h2>
						<p class="text-gray-700 text-lg leading-relaxed">
							Our success is a testament to our unwavering commitment to delivering excellence in every aspect of our business. With a deep understanding of the Birmingham property market and a passion for providing top-notch services, we pride ourselves on fostering lasting relationships with property owners, tenants, and homebuyers. At MKM Housing, we're not just in the business of property management; we're in the business of creating homes and experiences. We invite you to explore our website and discover the world of possibilities we offer. Welcome to MKM Housing, where exceptional service meets the vibrant heart of Birmingham.
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Features Section -->
		<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
			<!-- The Perfect Residency -->
			<div class="text-center">
				<div class="w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-lg flex items-center justify-center">
					<svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
					</svg>
				</div>
				<h3 class="text-xl font-bold text-gray-900 mb-3">The Perfect Residency</h3>
				<p class="text-gray-600 mb-2">Comfortable, safe, and modern homes</p>
				<p class="text-gray-600">Designed for convenience and peace of mind</p>
			</div>
			
			<!-- Trusted Across The UK -->
			<div class="text-center">
				<div class="w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-lg flex items-center justify-center">
					<svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
					</svg>
				</div>
				<h3 class="text-xl font-bold text-gray-900 mb-3">Trusted Across The UK</h3>
				<p class="text-gray-600 mb-2">Reliable housing solutions nationwide</p>
				<p class="text-gray-600">From shared homes to supported living</p>
			</div>
			
			<!-- Total Transparency -->
			<div class="text-center">
				<div class="w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-lg flex items-center justify-center">
					<svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
					</svg>
				</div>
				<h3 class="text-xl font-bold text-gray-900 mb-3">Total Transparency</h3>
				<p class="text-gray-600 mb-2">Clear communication, no hidden terms</p>
				<p class="text-gray-600">Honest, straightforward service you can trust</p>
			</div>
		</div>
	</main>

	<?php include '../partials/footer.php'; ?>
</body>
</html>