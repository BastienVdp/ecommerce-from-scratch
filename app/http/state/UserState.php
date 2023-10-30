<?php 

if($isConnected = isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
} else {
	$user = null;
}

$isAdmin = $isConnected && $user['role'] == 'admin';

