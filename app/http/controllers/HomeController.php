<?php 

/**
 * The index function includes the index.php file located in the views/home directory.
 */
function index() 
{
	return View('home/index');
	// require_once dirname(__DIR__) . '/views/home/index.php';
}
?>