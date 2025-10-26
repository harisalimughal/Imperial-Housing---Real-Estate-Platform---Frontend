<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Testimonials - Imperial Housing</title>
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
	// Include testimonials data
	include '../data/testimonials.php';
	
	// Get all testimonials
	$allTestimonials = getTestimonials();
	
	$heroTitle = 'Testimonials';
	$heroSubtitle = 'Hear from our satisfied clients';
	$heroImages = '/public/assets/images/hero1.png,/public/assets/images/hero2.png';
	include '../partials/hero.php';
	?>

	<!-- Video Testimonials Section -->
	<section class="py-20 bg-white">
		<div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
			<div class="text-center mb-16">
				<h1 class="text-4xl font-bold mb-6">Client Testimonials</h1>
				<p class="text-gray-600 text-lg">Hear from our satisfied clients about their experience with Imperial Housing</p>
			</div>

			<!-- Video Grid - 4 columns, 3 rows -->
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
				
				<?php foreach ($allTestimonials as $testimonial): ?>
				<!-- Video Card <?php echo $testimonial['id']; ?> -->
				<div class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition duration-300 relative">
					<div class="relative">
						<img src="<?php echo htmlspecialchars($testimonial['image']); ?>" 
							 class="h-64 w-full object-cover rounded-3xl" alt="<?php echo htmlspecialchars($testimonial['title']); ?>">
						<div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 rounded-3xl">
							<button class="w-16 h-16 bg-white bg-opacity-90 rounded-full flex items-center justify-center hover:bg-opacity-100 transition-all" 
									onclick="window.open('<?php echo htmlspecialchars($testimonial['video_url']); ?>', '_blank')">
								<svg class="w-6 h-6 text-gray-800 ml-1" fill="currentColor" viewBox="0 0 24 24">
									<path d="M8 5v14l11-7z"/>
								</svg>
							</button>
						</div>
					</div>
					<div class="p-4 flex flex-col items-center">
						<h3 class="font-bold text-lg mb-2 text-gray-800 text-left"><?php echo htmlspecialchars($testimonial['title']); ?></h3>
						<p class="text-gray-600 text-sm mb-4 text-left"><?php echo htmlspecialchars($testimonial['description']); ?></p>
						<a href="<?php echo htmlspecialchars($testimonial['video_url']); ?>" class="text-blue-600 text-sm font-medium hover:text-blue-700 text-left">Read More.....</a>
					</div>
				</div>
				<?php endforeach; ?>

			</div>
		</div>
	</section>

	<?php include '../partials/footer.php'; ?>
</body>
</html>