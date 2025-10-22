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
	<?php include '../partials/header.php'; ?>

	<?php
	$heroTitle = 'For Tenants';
	$heroSubtitle = 'Browse homes, apply and move in with confidence';
	$heroImages = '/public/assets/images/hero2.png,/public/assets/images/hero1.png';
	include '../partials/hero.php';
	?>

	<main class="container mx-auto px-6 py-20">
		<h1 class="text-4xl font-bold mb-6">For Tenants</h1>
		<p class="text-gray-700">Find apartments, apply for tenancy, and get support from our tenant services team.</p>
	</main>

	<?php include '../partials/footer.php'; ?>
</body>
</html>