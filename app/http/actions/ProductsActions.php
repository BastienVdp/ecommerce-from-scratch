
<?php
/**
 * The above PHP code contains functions to retrieve, store, and update product data in a database.
 * 
 * @return The functions `getProducts`, `getProduct`, `storeProduct`, and `updateProduct` all return
 * different values.
 */

/**
 * The function "getProducts" retrieves all products from a database table.
 * 
 * @return the result of the query executed on the "products" table.
 */
function getProducts()
{
	$result = executeQuery("SELECT * FROM products");
	return $result;
}

/**
 * The function `getProduct` retrieves a product from the database based on its ID.
 * 
 * @param id The parameter "id" is the unique identifier of the product that we want to retrieve from
 * the database.
 * 
 * @return the first row of the result set from the query executed.
 */
function getProduct($id)
{
	
	$result = executeQuery("SELECT * FROM products WHERE id = $id");
	return $result[0];
}

/**
 * The function `storeProduct` stores product data in a database after sanitizing the input.
 * 
 * @param data The parameter is an array that contains the information of a product. It should
 * have the following keys:
 * 
 * @return a boolean value of true.
 */
function storeProduct($data)
{
	try {
		$data['name'] = htmlspecialchars($data['name']);
		$data['description'] = htmlspecialchars($data['description']);
		$data['price'] = htmlspecialchars($data['price']);
		$data['image'] = htmlspecialchars($data['image']);
	} catch (\Throwable $th) {
		throw $th;
	}

	executeQuery("
		INSERT INTO products (name, description, price, image) 
		VALUES ('{$data['name']}', '{$data['description']}', {$data['price']}, '{$data['image']}')
	");

	return true;
}

/**
 * The function `updateProduct` updates the name, description, price, and image of a product in the
 * database.
 * 
 * @param id The id parameter is the unique identifier of the product that needs to be updated. It is
 * used to identify the specific product in the database that needs to be updated.
 * @param data The parameter is an array that contains the updated information for the product.
 * It should have the following keys:
 * 
 * @return a boolean value of true.
 */
function updateProduct($id, $data)
{
	try {
		$data['name'] = htmlspecialchars($data['name']);
		$data['description'] = htmlspecialchars($data['description']);
		$data['price'] = htmlspecialchars($data['price']);
		$data['image'] = htmlspecialchars($data['image']);
	} catch (\Throwable $th) {
		throw $th;
	}

	executeQuery("
		UPDATE products 
		SET name = '{$data['name']}', description = '{$data['description']}', price = {$data['price']}, image = '{$data['image']}'
		WHERE id = {$id}
	");

	return true;
}
?>