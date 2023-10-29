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
	return View('products/index', compact('products', 'productsCount'));
}

/**
 * The function "create" includes the "create.php" file from the "views/products" directory.
 */
function create()
{
	return View('products/create');
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
			Redirect("/products");
		}
	} else {
		return View('products/create', ['errors' => $errors]);
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
		Redirect("/products");
	}
	return View('products/edit', compact('product'));
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
			Redirect("/products");
		}
	} else {
		return View('products/edit', ['errors' => $errors]);
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
	return View('products/show', compact('product'));
}

?>