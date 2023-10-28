<h2 class="text-2xl font-medium mb-6">Nos produits (<?= $productsCount ?>) </h2>
<div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
	<?php 
		foreach($products as $product):
	?>
	<a href="/products/<?= $product['id'] ?>" class="group">
		<div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
			<img src="<?= $product['image'] ?>" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
		</div>
		<h3 class="mt-4 text-sm text-gray-700"><?= $product['name'] ?></h3>
		<p class="mt-1 text-lg font-medium text-gray-900"><?= $product['price'] ?>€</p>
	</a>
	<?php endforeach; ?> 
</div>