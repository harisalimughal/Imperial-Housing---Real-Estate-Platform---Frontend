<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact - Imperial Housing</title>
	<link rel="stylesheet" href="/public/assets/css/styles.css">
	<script src="https://cdn.tailwindcss.com"></script>
	<script>
		tailwind.config = { theme: { extend: { fontFamily: { 'sans': ['Inter','sans-serif'] } } } }
	</script>
</head>
<body>
	<?php include '../partials/header.php'; ?>

	<main class="container mx-auto px-6 py-20">
		<h1 class="text-4xl font-bold mb-6">Contact Us</h1>
		<p class="text-gray-700 mb-4">You can reach us via phone or email:</p>
		<ul class="space-y-2 text-gray-700">
			<li>Phone: <a href="tel:+442033706999" class="text-blue-600">+44 (0) 203 370 6999</a></li>
			<li>Email: <a href="mailto:example@example.com" class="text-blue-600">example@example.com</a></li>
			<li>Address: 124 Brooklyn, New York, United States</li>
		</ul>
	</main>

	<?php include '../partials/footer.php'; ?>
</body>
</html>