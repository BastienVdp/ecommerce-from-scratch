<?php 

$totalCartCount = 0;
if(isset($_SESSION['cart'])) {
	foreach($_SESSION['cart'] as $product) {
		$totalCartCount += $product['quantity'];
	}
}