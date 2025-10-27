<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tenants - Imperial Housing</title>
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
	$heroTitle = 'For Tenants';
	$heroSubtitle = 'Browse homes, apply and move in with confidence';
	$heroImages = '/public/assets/images/hero2.png,/public/assets/images/hero1.png';
	include 'hero.php';
	?>

	<!-- Main Content Section -->
	<section class="py-20 bg-white">
		<div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-10">
			<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
				
				<!-- Left Content -->
				<div class="space-y-8">
					<!-- Book Now Button -->
					<div>
						<button class="inline-block bg-[#151EA6] hover:bg-[#0f1790] text-white px-6 md:px-8 py-2 md:py-3 rounded-2xl font-medium text-sm md:text-base transition-shadow shadow-sm">
							Book Now
						</button>
					</div>
					
					<!-- Paragraph -->
					<div>
						<p class="text-gray-600 text-lg leading-relaxed">
							At Imperial Housing, we provide more than just a place to live — we offer safe and supportive accommodation that helps you move toward independent living. Our homes provide comfort, stability, and personalized support, empowering you to take the next step in life with confidence. Whether you're transitioning from care, overcoming challenges, or rebuilding independence, we're here to help you feel truly at home.
						</p>
					</div>
					
					<!-- Get in Touch Button -->
					<div>
						<button class="inline-block bg-[#FCB305] hover:bg-[#e6a004] text-white px-6 md:px-8 py-2 md:py-3 rounded-2xl font-medium text-sm md:text-base transition-shadow shadow-sm">
							Get in Touch
						</button>
					</div>
				</div>
				
				<!-- Right Image -->
				<div class="flex justify-center lg:justify-end">
					<div class="relative">
						<img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
							 alt="Beautiful family home with brick exterior and well-manicured garden" 
							 class="rounded-3xl shadow-2xl w-full max-w-lg h-auto object-cover">
					</div>
				</div>
				
			</div>
		</div>
	</section>

	<!-- What Is Supported Accommodation Section -->
	<section class="py-20 bg-black">
		<div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-10">
			<div class="text-center">
				<h2 class="text-4xl md:text-5xl font-bold text-[#FCB305] mb-8">
					What Is Supported Accommodation?
				</h2>
				<p class="text-white text-lg md:text-xl leading-relaxed max-w-6xl mx-auto">
					Supported accommodation is housing where you have your own space and privacy, while also getting access to support from trained staff who can help you manage daily life. We work with people who may need extra support to live independently — whether that's managing money, accessing benefits, building life skills, or finding education or work opportunities. At MKM Housing, we believe everyone deserves a safe and supportive place to live.
				</p>
			</div>
		</div>
	</section>

	<!-- Who We Support Section -->
	<section class="py-20 bg-white">
		<div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-10">
			<div class="max-w-4xl">
				<h2 class="text-4xl md:text-5xl font-bold text-black mb-8">
					Who We Support
				</h2>
				<p class="text-gray-800 text-lg md:text-xl mb-8">
					We welcome referrals and applications from individuals who:
				</p>
				<ul class="space-y-4 text-gray-800 text-lg md:text-xl mb-8">
					<li class="flex items-start">
						<span class="text-black mr-3">•</span>
						<span>Are aged 18 or over</span>
					</li>
					<li class="flex items-start">
						<span class="text-black mr-3">•</span>
						<span>Need a safe, stable home environment</span>
					</li>
					<li class="flex items-start">
						<span class="text-black mr-3">•</span>
						<span>May have additional support needs</span>
					</li>
					<li class="flex items-start">
						<span class="text-black mr-3">•</span>
						<span>Are ready to work with our team to build life skills and move toward independence</span>
					</li>
				</ul>
				<p class="text-gray-800 text-lg md:text-xl">
					If you're unsure whether you qualify, <strong class="font-bold text-black">get in touch</strong> — we'll guide you through the process.
				</p>
			</div>
		</div>
	</section>

	<!-- Your Responsibilities Section -->
	<section class="py-20 bg-black">
		<div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-10">
			<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
				
				<!-- Left Content -->
				<div class="space-y-8">
					<h2 class="text-4xl md:text-5xl font-bold text-white mb-8">
						Your Responsibilities
					</h2>
					<p class="text-white text-lg md:text-xl mb-8">
						We believe in mutual respect and shared responsibility. As a tenant, you'll be expected to:
					</p>
					<ul class="space-y-4 text-white text-lg md:text-xl mb-8">
						<li class="flex items-start">
							<span class="text-white mr-3">•</span>
							<span>Pay rent or contribute through benefits</span>
						</li>
						<li class="flex items-start">
							<span class="text-white mr-3">•</span>
							<span>Respect your housemates, staff, and property</span>
						</li>
						<li class="flex items-start">
							<span class="text-white mr-3">•</span>
							<span>Follow your tenancy agreement and house rules</span>
						</li>
						<li class="flex items-start">
							<span class="text-white mr-3">•</span>
							<span>Engage with your support plan</span>
						</li>
						<li class="flex items-start">
							<span class="text-white mr-3">•</span>
							<span>Communicate any issues or concerns</span>
						</li>
					</ul>
					<p class="text-white text-lg md:text-xl">
						Our team will support you every step of the way — you'll never have to face challenges alone.
					</p>
				</div>
				
				<!-- Right Image -->
				<div class="flex justify-center lg:justify-end">
					<div class="relative">
						<img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
							 alt="Beautiful family home with brick exterior and well-manicured garden" 
							 class="rounded-3xl shadow-2xl w-full max-w-lg h-auto object-cover">
					</div>
				</div>
				
			</div>
		</div>
	</section>

	<!-- Our Responsibilities Section -->
	<section class="py-20 bg-white">
		<div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-10">
			<div class="max-w-4xl">
				<h2 class="text-4xl md:text-5xl font-bold text-black mb-8">
					Our Responsibilities
				</h2>
				<p class="text-gray-800 text-lg md:text-xl mb-8">
					We are committed to providing you with the best possible support and accommodation. Our responsibilities include:
				</p>
				<ul class="space-y-4 text-gray-800 text-lg md:text-xl mb-8">
					<li class="flex items-start">
						<span class="text-black mr-3">•</span>
						<span>Providing safe, clean, and well-maintained accommodation</span>
					</li>
					<li class="flex items-start">
						<span class="text-black mr-3">•</span>
						<span>Offering 24/7 support when needed</span>
					</li>
					<li class="flex items-start">
						<span class="text-black mr-3">•</span>
						<span>Helping you develop life skills and independence</span>
					</li>
					<li class="flex items-start">
						<span class="text-black mr-3">•</span>
						<span>Respecting your privacy and personal space</span>
					</li>
					<li class="flex items-start">
						<span class="text-black mr-3">•</span>
						<span>Connecting you with community resources and services</span>
					</li>
					<li class="flex items-start">
						<span class="text-black mr-3">•</span>
						<span>Supporting your transition to independent living</span>
					</li>
				</ul>
				<p class="text-gray-800 text-lg md:text-xl">
					Your success is our priority, and we're here to help you achieve your goals every step of the way.
				</p>
			</div>
		</div>
	</section>

	<!-- How to Apply Section -->
	<section class="py-20 bg-black">
		<div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-10">
			<div class="max-w-4xl">
				<h2 class="text-4xl md:text-5xl font-bold text-[#FCB305] mb-8">
					How to Apply
				</h2>
				<p class="text-white text-lg md:text-xl mb-8">
					Getting started is simple:
				</p>
				<ul class="space-y-4 text-white text-lg md:text-xl mb-8">
					<li class="flex items-start">
						<span class="text-white mr-3">•</span>
						<span>Check your eligibility – you can contact us or take a quick online check.</span>
					</li>
					<li class="flex items-start">
						<span class="text-white mr-3">•</span>
						<span>Complete the application form – tell us a bit about your background and support needs.</span>
					</li>
					<li class="flex items-start">
						<span class="text-white mr-3">•</span>
						<span>Assessment meeting – we'll invite you for a friendly chat to understand how we can best support you.</span>
					</li>
					<li class="flex items-start">
						<span class="text-white mr-3">•</span>
						<span>Move in – once accepted, we'll help you settle in and begin your personalised support plan.</span>
					</li>
				</ul>
				<p class="text-white text-lg md:text-xl">
					Need help with your application? Our team can guide you through every step — just call or email us.
				</p>
			</div>
		</div>
	</section>

	<!-- Need More Information Section -->
	<section class="py-20 bg-gray-50">
		<div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-10">
			<div class="text-center mb-12">
				<h2 class="text-4xl md:text-5xl font-bold text-black mb-6">
					Need More Information?
				</h2>
				<p class="text-gray-700 text-lg mb-8">
					And say goodbye to stressing about viewing, listing, and rent. We will take care of your concerns and make sure that you are satisfied with our services. With MKM Housing, your property is in safe hands.
				</p>
				
				<!-- Contact Info -->
				<div class="mb-12">
					<h3 class="text-2xl font-bold text-black mb-6">Contact Info</h3>
					<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
						<div class="flex items-center justify-center space-x-2">
							<div class="w-8 h-8 bg-[#151EA6] rounded flex items-center justify-center">
								<svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
									<path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
								</svg>
							</div>
							<div class="text-left">
								<div class="text-sm font-medium text-gray-600">Reservation</div>
								<div class="text-sm text-gray-800">+44 (0) 203 370 6999</div>
							</div>
						</div>
						<div class="flex items-center justify-center space-x-2">
							<div class="w-8 h-8 bg-[#151EA6] rounded flex items-center justify-center">
								<svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
									<path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
									<path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
								</svg>
							</div>
							<div class="text-left">
								<div class="text-sm font-medium text-gray-600">Email Info</div>
								<div class="text-sm text-gray-800">info@mkhousing.co.uk</div>
							</div>
						</div>
						<div class="flex items-center justify-center space-x-2">
							<div class="w-8 h-8 bg-[#151EA6] rounded flex items-center justify-center">
								<svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
									<path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
								</svg>
							</div>
							<div class="text-left">
								<div class="text-sm font-medium text-gray-600">Address</div>
								<div class="text-sm text-gray-800">Grosvenor House 11 St Paul's Square</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Contact Form -->
			<div class="bg-white rounded-3xl shadow-lg p-8">
				<p class="text-center text-gray-700 mb-8">
					Please fill out the form to register your interest. Our team will contact you within 48 hours.
				</p>
				
				<form class="space-y-6">
					<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
						<input type="text" placeholder="Name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
						<input type="email" placeholder="Email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
					</div>
					<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
						<input type="date" placeholder="Date of Birth" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
						<input type="tel" placeholder="Phone Number" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
					</div>
					<input type="text" placeholder="Address" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
					
					<!-- Benefits Checkboxes -->
					<div class="space-y-3">
						<div class="flex items-center space-x-3">
							<input type="checkbox" id="universal-credit" checked class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
							<label for="universal-credit" class="text-gray-700">Universal Credit</label>
						</div>
						<div class="flex items-center space-x-3">
							<input type="checkbox" id="housing-benefit" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-blue-500">
							<label for="housing-benefit" class="text-gray-700">Housing Benefit</label>
						</div>
						<div class="flex items-center space-x-3">
							<input type="checkbox" id="jsa" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-blue-500">
							<label for="jsa" class="text-gray-700">Jobseeker's Allowance (JSA)</label>
						</div>
						<div class="flex items-center space-x-3">
							<input type="checkbox" id="esa" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-blue-500">
							<label for="esa" class="text-gray-700">Employment and Support Allowance (ESA)</label>
						</div>
						<div class="flex items-center space-x-3">
							<input type="checkbox" id="pip" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-blue-500">
							<label for="pip" class="text-gray-700">Personal Independence Payment (PIP)</label>
						</div>
						<div class="flex items-center space-x-3">
							<input type="checkbox" id="dla" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-blue-500">
							<label for="dla" class="text-gray-700">Disability Living Allowance (DLA)</label>
						</div>
						<div class="flex items-center space-x-3">
							<input type="checkbox" id="income-support" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-blue-500">
							<label for="income-support" class="text-gray-700">Income Support</label>
						</div>
						<div class="flex items-center space-x-3">
							<input type="checkbox" id="carers-allowance" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-blue-500">
							<label for="carers-allowance" class="text-gray-700">Carer's Allowance</label>
						</div>
						<div class="flex items-center space-x-3">
							<input type="checkbox" id="pension-credit" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-blue-500">
							<label for="pension-credit" class="text-gray-700">Pension Credit</label>
						</div>
						<div class="flex items-center space-x-3">
							<input type="checkbox" id="other" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-blue-500">
							<label for="other" class="text-gray-700">Other (please specify): ____________________________</label>
						</div>
					</div>
					
					<div>
						<label class="block text-gray-700 mb-2">Briefly describe your current situation or support needs: (Example: mental health, homelessness, learning difficulty, leaving care, etc.)</label>
						<textarea placeholder="Message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
					</div>
					
					<!-- When do you need accommodation -->
					<div class="space-y-3">
						<p class="text-gray-700 font-medium">When do you need accommodation?</p>
						<div class="flex items-center space-x-3">
							<input type="radio" id="immediately" name="accommodation-time" checked class="w-4 h-4 text-green-600 border-gray-300 focus:ring-green-500">
							<label for="immediately" class="text-gray-700">Immediately</label>
						</div>
						<div class="flex items-center space-x-3">
							<input type="radio" id="within-month" name="accommodation-time" class="w-4 h-4 text-gray-600 border-gray-300 focus:ring-blue-500">
							<label for="within-month" class="text-gray-700">Within 1 month</label>
						</div>
						<div class="flex items-center space-x-3">
							<input type="radio" id="flexible" name="accommodation-time" class="w-4 h-4 text-gray-600 border-gray-300 focus:ring-blue-500">
							<label for="flexible" class="text-gray-700">Flexible</label>
						</div>
					</div>
					
					<!-- Application method -->
					<div class="space-y-3">
						<p class="text-gray-700 font-medium">Are you applying directly or through an agency?</p>
						<div class="flex items-center space-x-3">
							<input type="radio" id="myself" name="application-method" checked class="w-4 h-4 text-green-600 border-gray-300 focus:ring-green-500">
							<label for="myself" class="text-gray-700">Myself</label>
						</div>
						<div class="flex items-center space-x-3">
							<input type="radio" id="referral-agency" name="application-method" class="w-4 h-4 text-gray-600 border-gray-300 focus:ring-blue-500">
							<label for="referral-agency" class="text-gray-700">Referral agency</label>
						</div>
					</div>
					
					<!-- Consent -->
					<div class="flex items-start space-x-3">
						<input type="checkbox" id="consent" class="w-4 h-4 text-gray-600 border-gray-300 rounded focus:ring-blue-500 mt-1">
						<label for="consent" class="text-gray-700 text-sm">I give consent for MKM Housing to use my information to process this application.</label>
					</div>
					
					<button type="submit" class="w-full bg-[#FCB305] hover:bg-[#e6a004] text-white py-4 px-6 rounded-lg font-semibold text-lg transition-colors duration-300">
						Send
					</button>
				</form>
				
				<p class="text-center text-gray-600 text-sm mt-6">
					MKM Housing complies with the Supported Accommodation Quality Standards and follows the National Statement of Expectations for Supported Housing to ensure every tenant receives safe, respectful, and high-quality support.
				</p>
			</div>
		</div>
	</section>

	<?php include 'footer.php'; ?>
</body>
</html>