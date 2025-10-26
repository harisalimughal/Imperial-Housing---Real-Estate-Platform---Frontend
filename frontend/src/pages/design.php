<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Design & Renovation - Imperial Housing</title>
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
	$heroTitle = 'Design & Renovation';
	$heroSubtitle = 'Transform spaces with our expert design and renovation services';
	$heroImages = '/public/assets/images/hero1.png,/public/assets/images/hero2.png';
	include '../partials/hero.php';
	?>

	<!-- Space Planning Section -->
	<section class="py-20 bg-white">
		<div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-10">
			<div class="text-center mb-12">
				<h2 class="text-4xl md:text-5xl font-bold text-black mb-6">Space Planning</h2>
				<p class="text-gray-600 text-lg max-w-3xl mx-auto">
					Transforming your dream space to reality through meticulous design, quality craftsmanship and modern living. Design & Renovation Ltd. is ready to work with you to build the cottage or home you've been dreaming of. A finished product is only as good as the team managing the project. Building on time, on budget, and presenting you, the client, with a product to be proud of, means years of satisfaction for us all. Build it right the first time.
				</p>
			</div>

			<!-- Before & After Grid -->
			<div class="space-y-8">
				<!-- Labels -->
				<div class="grid grid-cols-2 gap-8 text-center">
					<h3 class="text-2xl font-bold text-black">Before</h3>
					<h3 class="text-2xl font-bold text-black">After</h3>
				</div>

				<!-- Image Grid -->
				<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
					<!-- Row 1 -->
					<img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?auto=format&fit=crop&q=80" alt="Old traditional house exterior" class="rounded-2xl shadow-lg w-full h-48 object-cover hover:shadow-xl transition duration-300">
					<img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&q=80" alt="Dated living room interior" class="rounded-2xl shadow-lg w-full h-48 object-cover hover:shadow-xl transition duration-300">
					<img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&q=80" alt="Modern house exterior" class="rounded-2xl shadow-lg w-full h-48 object-cover hover:shadow-xl transition duration-300">
					<img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&q=80" alt="Contemporary living room" class="rounded-2xl shadow-lg w-full h-48 object-cover hover:shadow-xl transition duration-300">

					<!-- Row 2 -->
					<img src="https://images.unsplash.com/photo-1595514535316-47e0ed123915?auto=format&fit=crop&q=80" alt="Old style kitchen" class="rounded-2xl shadow-lg w-full h-48 object-cover hover:shadow-xl transition duration-300">
					<img src="https://images.unsplash.com/photo-1576941089067-2de3c901e126?auto=format&fit=crop&q=80" alt="Outdated bathroom" class="rounded-2xl shadow-lg w-full h-48 object-cover hover:shadow-xl transition duration-300">
					<img src="https://images.unsplash.com/photo-1556912172-45b7abe8b7e1?auto=format&fit=crop&q=80" alt="Modern kitchen design" class="rounded-2xl shadow-lg w-full h-48 object-cover hover:shadow-xl transition duration-300">
					<img src="https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?auto=format&fit=crop&q=80" alt="Luxury modern bathroom" class="rounded-2xl shadow-lg w-full h-48 object-cover hover:shadow-xl transition duration-300">

					<!-- Row 3 -->
					<img src="https://images.unsplash.com/photo-1558211583-d26f610c1eb1?auto=format&fit=crop&q=80" alt="Old patio area" class="rounded-2xl shadow-lg w-full h-48 object-cover hover:shadow-xl transition duration-300">
					<img src="https://images.unsplash.com/photo-1505691938895-1758d7feb511?auto=format&fit=crop&q=80" alt="Traditional bedroom" class="rounded-2xl shadow-lg w-full h-48 object-cover hover:shadow-xl transition duration-300">
					<img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80" alt="Modern house with pool" class="rounded-2xl shadow-lg w-full h-48 object-cover hover:shadow-xl transition duration-300">
					<img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&q=80" alt="Contemporary bedroom" class="rounded-2xl shadow-lg w-full h-48 object-cover hover:shadow-xl transition duration-300">
				</div>
			</div>
		</div>
	</section>

	<!-- Interior Design Section -->
	<section class="py-16 px-4 md:px-8 bg-gray-50">
		<div class="container mx-auto max-w-4xl">
			<div class="flex flex-col items-center text-center">
				<!-- Text Content -->
				<div class="mb-12">
					<h2 class="text-4xl font-bold mb-6">Interior Design</h2>
					<p class="text-gray-600 leading-relaxed mb-8 max-w-3xl mx-auto">
						Transforming your dream space to reality through meticulous design, quality craftmanship and modern living. Design & Renovation Ltd. is ready to work with you to build the cottage or home you've been dreaming of. A finished product is only as good as the team managing the project. Building on time, on budget, and presenting you, the client, with a product to be proud of, means years of satisfaction for us all. Build it right the first time.
					</p>
				</div>
				<!-- Image -->
				<div class="w-full max-w-3xl">
					<img src="/public/assets/images/interior.png" alt="Modern interior design with neutral tones" class="w-full h-auto rounded-2xl shadow-lg">
				</div>
			</div>
		</div>
	</section>

	<!-- Portfolio Section -->
	<section class="py-16 bg-white">
		<div class="container mx-auto px-4 max-w-6xl">
			<div class="text-center mb-12">
				<h2 class="text-4xl font-bold mb-4">Portfolio</h2>
				<p class="text-gray-600 max-w-2xl mx-auto">
					Transforming your dream space to reality through meticulous design.
				</p>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
				<!-- Portfolio Item 1 -->
				<div class="property-card bg-white rounded-3xl shadow-lg hover:shadow-xl transition duration-300 relative" style="overflow: visible;">
					<div class="relative">
						<img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0" alt="Modern Living Room" class="h-64 w-full object-cover rounded-3xl">
						<a href="#" class="absolute top-4 right-4 w-8 h-8  rounded-full flex items-center justify-center shadow-md hover:bg-blue-700 transition-colors">
							<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M7.89355 0.607422H11.5359M11.5359 0.607422V4.43193M11.5359 0.607422L4.55469 7.93774M8.19708 7.93774H4.55469M4.55469 7.93774V4.11322" stroke="white" stroke-width="1.21413" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M5.46394 0.607422H1.21449C1.05348 0.607422 0.899074 0.674578 0.785227 0.794117C0.67138 0.913657 0.607422 1.07579 0.607422 1.24484V11.4435C0.607422 11.6126 0.67138 11.7747 0.785227 11.8943C0.899074 12.0138 1.05348 12.081 1.21449 12.081H10.9275C11.0885 12.081 11.2429 12.0138 11.3568 11.8943C11.4706 11.7747 11.5346 11.6126 11.5346 11.4435V6.98161" stroke="white" stroke-width="1.21413" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</a>
					</div>
					<div class="p-4 text-center">
						<h3 class="font-bold text-lg mb-2">Why Imperial Housing is the right Property managing agency for Birmingham Landlords.</h3>
						<div class="text-gray-600 text-sm">As a landlord in Birmingham it can be challenging to ensure your rental properties and...</div>
					</div>
				</div>

				<!-- Portfolio Item 2 -->
				<div class="property-card bg-white rounded-3xl shadow-lg hover:shadow-xl transition duration-300 relative" style="overflow: visible;">
					<div class="relative">
						<img src="https://images.unsplash.com/photo-1556912172-45b7abe8b7e1" alt="Modern Kitchen" class="h-64 w-full object-cover rounded-3xl">
						<a href="#" class="absolute top-4 right-4 w-8 h-8  rounded-full flex items-center justify-center shadow-md hover:bg-blue-700 transition-colors">
							<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M7.89355 0.607422H11.5359M11.5359 0.607422V4.43193M11.5359 0.607422L4.55469 7.93774M8.19708 7.93774H4.55469M4.55469 7.93774V4.11322" stroke="white" stroke-width="1.21413" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M5.46394 0.607422H1.21449C1.05348 0.607422 0.899074 0.674578 0.785227 0.794117C0.67138 0.913657 0.607422 1.07579 0.607422 1.24484V11.4435C0.607422 11.6126 0.67138 11.7747 0.785227 11.8943C0.899074 12.0138 1.05348 12.081 1.21449 12.081H10.9275C11.0885 12.081 11.2429 12.0138 11.3568 11.8943C11.4706 11.7747 11.5346 11.6126 11.5346 11.4435V6.98161" stroke="white" stroke-width="1.21413" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</a>
					</div>
					<div class="p-4 text-center">
						<h3 class="font-bold text-lg mb-2">Why Imperial Housing is the right Property managing agency for Birmingham Landlords.</h3>
						<div class="text-gray-600 text-sm">As a landlord in Birmingham it can be challenging to ensure your rental properties and...</div>
					</div>
				</div>

				<!-- Portfolio Item 3 -->
				<div class="property-card bg-white rounded-3xl shadow-lg hover:shadow-xl transition duration-300 relative" style="overflow: visible;">
					<div class="relative">
						<img src="https://images.unsplash.com/photo-1552321554-5fefe8c9ef14" alt="Modern Bathroom" class="h-64 w-full object-cover rounded-3xl">
						<a href="#" class="absolute top-4 right-4 w-8 h-8  rounded-full flex items-center justify-center shadow-md hover:bg-blue-700 transition-colors">
							<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M7.89355 0.607422H11.5359M11.5359 0.607422V4.43193M11.5359 0.607422L4.55469 7.93774M8.19708 7.93774H4.55469M4.55469 7.93774V4.11322" stroke="white" stroke-width="1.21413" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M5.46394 0.607422H1.21449C1.05348 0.607422 0.899074 0.674578 0.785227 0.794117C0.67138 0.913657 0.607422 1.07579 0.607422 1.24484V11.4435C0.607422 11.6126 0.67138 11.7747 0.785227 11.8943C0.899074 12.0138 1.05348 12.081 1.21449 12.081H10.9275C11.0885 12.081 11.2429 12.0138 11.3568 11.8943C11.4706 11.7747 11.5346 11.6126 11.5346 11.4435V6.98161" stroke="white" stroke-width="1.21413" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</a>
					</div>
					<div class="p-4 text-center">
						<h3 class="font-bold text-lg mb-2">Why Imperial Housing is the right Property managing agency for Birmingham Landlords.</h3>
						<div class="text-gray-600 text-sm">As a landlord in Birmingham it can be challenging to ensure your rental properties and...</div>
					</div>
				</div>

				<!-- Portfolio Item 4 -->
				<div class="property-card bg-white rounded-3xl shadow-lg hover:shadow-xl transition duration-300 relative" style="overflow: visible;">
					<div class="relative">
						<img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750" alt="Modern House" class="h-64 w-full object-cover rounded-3xl">
						<a href="#" class="absolute top-4 right-4 w-8 h-8 rounded-full flex items-center justify-center shadow-md hover:bg-blue-700 transition-colors">
							<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M7.89355 0.607422H11.5359M11.5359 0.607422V4.43193M11.5359 0.607422L4.55469 7.93774M8.19708 7.93774H4.55469M4.55469 7.93774V4.11322" stroke="white" stroke-width="1.21413" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M5.46394 0.607422H1.21449C1.05348 0.607422 0.899074 0.674578 0.785227 0.794117C0.67138 0.913657 0.607422 1.07579 0.607422 1.24484V11.4435C0.607422 11.6126 0.67138 11.7747 0.785227 11.8943C0.899074 12.0138 1.05348 12.081 1.21449 12.081H10.9275C11.0885 12.081 11.2429 12.0138 11.3568 11.8943C11.4706 11.7747 11.5346 11.6126 11.5346 11.4435V6.98161" stroke="white" stroke-width="1.21413" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</a>
					</div>
					<div class="p-4 text-center">
						<h3 class="font-bold text-lg mb-2">Why Imperial Housing is the right Property managing agency for Birmingham Landlords.</h3>
						<div class="text-gray-600 text-sm">As a landlord in Birmingham it can be challenging to ensure your rental properties and...</div>
					</div>
				</div>
			</div>

			<!-- Pagination and View All -->
			<div class="relative mt-8">
				<!-- Centered Pagination -->
				<div class="flex justify-center items-center">
					<div class="flex items-center gap-2">
						<button class="w-8 h-8 rounded font-semibold text-sm flex items-center justify-center transition-colors bg-[#FCB305] text-white" data-page="0" data-active="true">1</button>
						<button class="w-8 h-8 rounded font-semibold text-sm flex items-center justify-center transition-colors hover:bg-gray-200" data-page="1">2</button>
						<button class="w-8 h-8 rounded font-semibold text-sm flex items-center justify-center transition-colors hover:bg-gray-200" data-page="2">3</button>
						<button class="w-8 h-8 rounded font-semibold text-sm flex items-center justify-center transition-colors hover:bg-gray-200" data-page="3">4</button>
					</div>
				</div>
				<!-- Absolutely Positioned View All -->
				<a href="#" class="text-gray-800 font-semibold text-sm hover:text-[#FCB305] transition-colors absolute right-0 top-1/2 -translate-y-1/2">VIEW ALL</a>
			</div>
		</div>
	</section>

	<?php include '../partials/footer.php'; ?>
</body>
</html>