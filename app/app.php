<?php 

session_start();

$config = require dirname(__DIR__) . '/app/config.php';

/* including the file `_include.php` located in the `app/core` directory. 
This line is used to include any necessary core files for the PHP script to run properly. */
require_once dirname(__DIR__) . '/app/core/_include.php';

/* including the file `_include.php` located in the `app/http` directory. 
This line is used to include any necessary http files. 
*/
require_once dirname(__DIR__) . '/app/http/_include.php';

$totalCartCount = 0;

if(isset($_SESSION['cart'])) {
	foreach($_SESSION['cart'] as $product) {
		$totalCartCount += $product['quantity'];
	}
}


