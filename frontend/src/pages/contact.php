<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact - Imperial Housing</title>
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
	$heroTitle = 'Contact Us';
	$heroSubtitle = 'Get in touch — we are here to help';
	$heroImages = '/public/assets/images/hero2.jpg,/public/assets/images/hero1.jpg';
	include 'hero.php';
	?>

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
								placeholder="Required Moving Date" 
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
								name="postal_code" 
								placeholder="Postal Code" 
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
						<p class="text-gray-600">1250, Coventry Road, B25 8BJ, Birmingham</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Google Map Section -->
	<section class="py-0 bg-white">
		<div class="w-full h-96 relative">
			<div id="map" class="w-full h-full bg-gray-200 relative overflow-hidden group">
				<!-- Map Container -->
				<iframe 
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d155358.8942334246!2d-1.9690508!3d52.4796992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870942d1b417173%3A0xca81fef0aeee7998!2sBirmingham%2C%20UK!5e0!3m2!1sen!2sus!4v1635000000000!5m2!1sen!2sus"
					width="100%" 
					height="100%" 
					style="border:0;pointer-events:none;" 
					allowfullscreen="" 
					loading="lazy" 
					referrerpolicy="no-referrer-when-downgrade"
					class="grayscale">
				</iframe>

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

				</div>
			</div>
		</div>
	</section>


	<script>
		// Make map clickable to open Google Maps
		document.addEventListener('DOMContentLoaded', function() {
			const mapContainer = document.getElementById('map');
			if (mapContainer) {
				mapContainer.style.cursor = 'pointer';
				mapContainer.addEventListener('click', function() {
					window.open('https://www.google.com/maps/place/Birmingham,+UK/@52.4796992,-1.9026911,12z', '_blank');
				});
				
				// Add hover effect to remove grayscale
				const iframe = mapContainer.querySelector('iframe');
				if (iframe) {
					mapContainer.addEventListener('mouseenter', function() {
						iframe.classList.remove('grayscale');
					});
					mapContainer.addEventListener('mouseleave', function() {
						iframe.classList.add('grayscale');
					});
				}
			}
		});
	</script>

	<?php include 'footer.php'; ?>
</body>
</html>