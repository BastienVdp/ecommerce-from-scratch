<?php 
/**
 * The above code is a PHP script that defines several functions for managing products, including
 * retrieving, creating, updating, and displaying product information.
 */


/**
 * The index function retrieves products and their count, and then requires the index.php view file.
 */
function index() 
{
	$products = getProducts();
	$productsCount = count($products);
	require_once dirname(__DIR__) . '/views/products/index.php';
}

/**
 * The function "create" includes the "create.php" file from the "views/products" directory.
 */
function create()
{
	require_once dirname(__DIR__) . '/views/products/create.php';
}

/**
 * The function "store" is used to validate and store product information, redirecting to the products
 * page if successful or displaying an error message if validation fails.
 * 
 * @param request The  parameter is an array that contains the data submitted by the user. It
 * typically includes information such as the name, description, price, and image URL of a product.
 */
function store($request)
{
	$errors = validateRequest($request, [
		'name' => 'required',
		'description' => 'required',
		'price' => 'required|numeric',
		'image' => 'required|url',
	]);

	if(empty($errors)) {
		if(storeProduct($request)) {
			header('Location: /products');
			exit;
		}
	} else {
		require_once dirname(__DIR__) . '/views/products/create.php';
	}

}

/**
 * The function "edit" retrieves a product by its ID and displays the edit view for that product, or
 * redirects to the products page if the product does not exist.
 * 
 * @param id The parameter "id" is the identifier of the product that needs to be edited.
 */
function edit($id)
{
	$product = getProduct($id);
	if(!$product) {
		header('Location: /products');
		exit;
	}
	// var_dump($product);exit;
	require_once dirname(__DIR__) . '/views/products/edit.php';
}



/**
 * The function updates a product with the given ID using the provided request data, validates the
 * request data, and redirects to the product page if the update is successful, otherwise it displays
 * the create product view with the validation errors.
 * 
 * @param id The ID of the product that needs to be updated.
 * @param request The parameter is an array that contains the data to be updated for a
 * product. It typically includes the following keys:
 */
function update($id, $request) {
	$errors = validateRequest($request, [
		'name' => 'required',
		'description' => 'required',
		'price' => 'required|numeric',
		'image' => 'required|url',
	]);

	if(empty($errors)) {
		if(updateProduct($id, $request)) {
			header('Location: /products/' . $id);
			exit;
		}
	} else {
		require_once dirname(__DIR__) . '/views/products/update.php';
	}
}

/**
 * The function "show" retrieves a product by its ID and then includes the corresponding view file to
 * display the product.
 * 
 * @param id The parameter "id" is the identifier of the product that we want to display. It is used to
 * retrieve the product information from the database.
 */
function show($id) 
{
	$product = getProduct($id);
	require_once dirname(__DIR__) . '/views/products/show.php';
}

?>