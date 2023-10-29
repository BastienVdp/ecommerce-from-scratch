<?php

$_SESSION['cart'] = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$totalCartCount = 0;

if(isset($_SESSION['cart'])) {
	foreach($_SESSION['cart'] as $product) {
		$totalCartCount += $product['quantity'];
	}
}

require 'actions/CartActions.php';
require 'actions/ProductsActions.php';
