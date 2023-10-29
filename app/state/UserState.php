<?php 
$isConnected = isset($_SESSION['user']);

if($isConnected) {
	$user = getUserByEmail($_SESSION['user']['email']);
	$user = [
		'id' => $user['id'],
		'username' => $user['username'],
		'email' => $user['email']
	];
} else {
	$user = null;
}

?>