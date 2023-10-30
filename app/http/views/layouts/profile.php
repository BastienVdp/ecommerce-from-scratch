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
	<header class="relative bg-white">
		<div class="bg-indigo-600 text-sm text-white">
			<div class="flex h-10 items-center justify-between mx-auto max-w-7xl px-4">
				Hello, <?= $isConnected ? $user['username'] : 'Visiteur'?>
				<div class="flex items-center">
					<?php 
						if($isConnected) {					
					?>
					<a href="/profile" class="text-white hover:text-gray-200 mr-4">Mon profil</a>
					<span class="h-4 w-px bg-gray-500" aria-hidden="true"></span>
					<a href="/logout" class="ml-4 text-white hover:text-gray-200">Se déconnecter</a>
					<?php } else { ?>
					<a href="/login" class="text-white hover:text-gray-200 mr-4">Se connecter</a>
					<span class="h-4 w-px bg-gray-500" aria-hidden="true"></span>
					<a href="/register" class="ml-4 text-white hover:text-gray-200">S'inscrire</a>
					<?php } ?>	
				</div>
			</div>
		</div>

		<nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-4 px-8 border-b border-gray-200">
			<div class="">
				<div class="flex h-16 items-center">

				<!-- Logo -->
				<div class="flex">
					<a href="#">
						<span class="sr-only">Your Company</span>
						<img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
					</a>
				</div>

				<!-- Menu -->
				<div class="ml-8 block self-stretch">
					<div class="flex h-full space-x-8">
						<div class="flex gap-8">                  
							<a href="/" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">
								Accueil
							</a>
							<a href="/products" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">
								Produits
							</a>
							<?php if($isAdmin) { ?>
							<a href="/products/create" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">
								Ajouter un produit
							</a>
							<?php } ?>
						</div>
					</div>
				</div>

				<div class="ml-auto flex items-center">
					<!-- Search -->
					<div class="flex ml-6">
						<a href="#" class="p-2 text-gray-400 hover:text-gray-500">
							<span class="sr-only">Search</span>
							<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
							</svg>
						</a>
					</div>

					<!-- Cart -->
					<div class="ml-4 flow-root  ml-6">
					<a href="/cart" class="group -m-2 flex items-center p-2">
						<svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
						</svg>
						<span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800"><?= $totalCartCount ?></span>
						<span class="sr-only">items in cart, view bag</span>
					</a>
					</div>
				</div>
				</div>
			</div>
		</nav>
	</header>
	<div class="mx-auto max-w-7xl sm:px-0 px-4 py-6">
		<div class="flex gap-x-6">
			<div class="w-1/4">
				<div class="inline-block text-sm text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm">
					<div class="p-3">
						<div class="flex items-center justify-between mb-2">
							<div class="flex gap-2">
								<a href="#">
									<img class="w-12 h-12 rounded-full" src="http://via.placeholder.com/150" alt="Jese Leos">
								</a>
								<div class="flex flex-col justify-center gap-1">
									<p class="block text-base font-semibold leading-none text-gray-900 dark:text-white">
										<span href="#"><?= $user['username'] ?></span>
									</p>
									<p class="text-sm font-normal">
										<span href="#" class="hover:underline"><?= $user['role'] === '' ? 'Visisteur' : $user['role'] ?></span>
									</p>
								</div>
							</div>
						</div>
						
						<p class="mb-4 text-sm">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, quia?
						</p>
						<ul class="flex text-sm">
							<li class="mr-2">
								<a href="#" class="hover:underline">
									<span class="font-semibold text-gray-900 dark:text-white">799</span>
									<span>Following</span>
								</a>
							</li>
							<li>
								<a href="#" class="hover:underline">
									<span class="font-semibold text-gray-900 dark:text-white">3,758</span>
									<span>Followers</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="w-3/4">			
				<div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 mb-4">
					<ul class="flex flex-wrap">
						<li class="mr-2">
						<?php if($_SERVER['REQUEST_URI'] === '/profile' || $_SERVER['REQUEST_URI'] === '/profile/index') { ?>
								<a href="/profile" class="text-blue-600 border-blue-600 border-b-2 inline-block p-4 pb-4 py-0 rounded-t-lg">
							<?php } else { ?>
								<a href="/profile" class="inline-block p-4 pb-4 py-0 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">
							<?php } ?>
								Informations
							</a>
						</li>
						<li class="mr-2">
							<?php if($_SERVER['REQUEST_URI'] === '/profile/orders') { ?>
								<a href="/profile/orders" class="text-blue-600 border-blue-600 border-b-2 inline-block p-4 pb-4 py-0 rounded-t-lg">
							<?php } else { ?>
								<a href="/profile/orders" class="inline-block p-4 pb-4 py-0 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">
							<?php } ?>
								Commandes
							</a>
						</li>
					</ul>
				</div>
				{{ content }}
			</div>
		</div>
	</div>
</body>
</html>
