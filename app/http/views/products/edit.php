<div class="space-y-8 flex flex-col mt-4  w-1/2 mx-auto">
	<form action="/products/update/<?= $product['id'] ?>" method="POST">
		<div class="border-b border-gray-900/10 pb-12 ">
			<h2 class="text-2xl font-semibold leading-7 text-gray-900">Editer un produit</h2>
			<p class="mt-2 text-sm leading-6 text-gray-600">Lorem ipsum dolor, sit amet consectetur adipisicing elit doloremque cum maxime.</p>
			<div class="mt-6 flex flex-col gap-6 gap-y-8">
				<div>
					<label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
					<div class="mt-2">
						<div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300">
							<input 
								type="text" 
								name="name" 
								id="name" 
								autocomplete="name" 
								value="<?= $product['name'] ?>" 
								class="block flex-1 border-0 bg-transparent p-1.5 text-gray-900 placeholder:text-gray-400 sm:text-sm sm:leading-6"
							>
						</div>
					</div>
					<?php isset($errors) ? renderErrors($errors, 'name') : null ?>
				</div>

				<div>
					<label for="name" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
					<div class="mt-2">
						<div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300">
							<textarea 
								id="about" 
								name="description" 
								rows="3" 
								class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
							><?= $product['description'] ?></textarea>
						</div>
					</div>
					<?php isset($errors) ? renderErrors($errors, 'description') : null?>
				</div>

				<div>
					<label for="price" class="block text-sm font-medium leading-6 text-gray-900">Prix</label>
					<div class="mt-2">
						<div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300">
							<input 
								type="text" 
								name="price" 
								id="price" 
								autocomplete="price" 
								value="<?= $product['price'] ?>" 
								class="block flex-1 border-0 bg-transparent p-1.5 text-gray-900 placeholder:text-gray-400 sm:text-sm sm:leading-6">
						</div>
					</div>
					<?php isset($errors) ? renderErrors($errors, 'price') : null?>
				</div>

				<div>
					<label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image url</label>
					<div class="mt-2">
						<div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300">
							<input 
								type="text" 
								name="image" 
								id="image" 
								value="<?= $product['image'] ?>" 
								class="block flex-1 border-0 bg-transparent p-1.5 text-gray-900 placeholder:text-gray-400 sm:text-sm sm:leading-6">
						</div>
					</div>
					<?php isset($errors) ? renderErrors($errors, 'image') : null?>
				</div>
			</div>
		</div>
		<div class="mt-6 flex items-center justify-end gap-x-6">
			<a href="/products" type="button" class="text-sm font-semibold leading-6 text-gray-900">Annuler</a>
			<button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
				Ajouter
			</button>
		</div>
	</form>
</div>