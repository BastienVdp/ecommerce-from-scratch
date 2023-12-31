<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $config['name']?></title>

	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/forms@0.5.6/src/index.min.js"></script>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
	<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
		{{ content }}
	</div>
</body>
</html>
