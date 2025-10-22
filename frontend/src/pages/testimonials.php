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
	$heroTitle = 'Testimonials';
	$heroSubtitle = 'Hear from our satisfied clients';
	$heroImages = '/public/assets/images/hero1.png,/public/assets/images/hero2.png';
	include '../partials/hero.php';
	?>

	<main class="container mx-auto px-6 py-20">
		<h1 class="text-4xl font-bold mb-6">Testimonials</h1>
		<p class="text-gray-700">Read what our satisfied clients say about our services.</p>
	</main>

	<?php include '../partials/footer.php'; ?>
</body>
</html>