<?php
require 'app/app.php';

?>
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
	<?php require $config['alias']['includes'] . '/header.php'; ?>
	<div class="mx-auto max-w-7xl px-4 py-6">
		<?php route($_SERVER['REQUEST_URI']); ?>
	</div>
	<?php require $config['alias']['includes'] . '/footer.php'; ?>
</body>
</html>
