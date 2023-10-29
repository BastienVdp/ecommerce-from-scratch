
<?php 


/**
 * The above PHP code defines functions for managing a shopping cart, including adding products,
 * removing products, and displaying the cart view.
 */


/**
 * The index function retrieves the products in the cart and then renders the cart view.
 */
function index() 
{
	$productsInCart = getProductsInCart();
	return View('cart/index', compact('productsInCart'));
}

/**
 * The function "store" adds a product to the shopping cart and updates the quantity if the product is
 * already in the cart.
 * 
 * @param request The parameter is an array that contains the data sent to the function. It is
 * assumed to have an 'id' key, which represents the product ID.
 */
function store($request) 
{
	if(isset($request['id'])) {
		if(checkIfProductIsInCart($request['id'])) {
			$index = array_search($request['id'], array_column($_SESSION['cart'], 'productId'));
			$_SESSION['cart'][$index]['quantity']++;
		} else {
			$_SESSION['cart'][] = [
				"productId" => $request['id'],
				"quantity" => 1
			];
		}
		Redirect("/cart");
	}
}

function remove($id)
{

	if(checkIfProductIsInCart($id)) {
		$index = array_search($id, array_column($_SESSION['cart'], 'productId'));
		if($_SESSION['cart'][$index]['quantity'] > 1) {
			$_SESSION['cart'][$index]['quantity']--;
		} else {
			unset($_SESSION['cart'][$index]);
		}
		Redirect('/cart');
	}
}



