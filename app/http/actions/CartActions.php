<?php 
/**
 * The function checks if a product with a given ID is in the shopping cart.
 * 
 * @param id The parameter `` is the product ID that we want to check if it is in the cart.
 * 
 * @return a boolean value. It returns true if the product with the given id is found in the cart, and
 * false otherwise.
 */
function checkIfProductIsInCart($id) 
{
	foreach($_SESSION['cart'] as $product) {
		if($product['productId'] == $id) return true;
	}
	return false;
}

/**
 * The function "getProductsInCart" retrieves the products stored in the cart, checks their quantity,
 * and calculates the total price for each product.
 * 
 * @return an array of products in the cart. Each product in the array includes the product details
 * (retrieved using the getProduct function), the quantity of the product in the cart, and the total
 * price of the product (calculated by multiplying the product price by the quantity).
 */
function getProductsInCart()
{
	// On récupère les id stocké dans le panier
	// On récupère les produits correspondant à ces id et on check la quantité par rapport au session panier
	// 
	$productsInCart = [];
	foreach($_SESSION['cart'] as $product) {
		$_product = getProduct($product['productId']);
		$productsInCart[] = [
			...$_product, 
			"quantity" => $product['quantity'],
			"price" => $_product['price'] * $product['quantity']
		];			
	}

	return $productsInCart;
}
?>