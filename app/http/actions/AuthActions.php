<?php 

function connectUser($data)
{
	if($user = getUserByEmail($data['email'])) {
		if(password_verify($data['password'], $user['password'])) {
			return true;
		} else {
			return false;
		}
	}
}

function registerUser($data)
{
	// Checker si l'adresse email est déjà prise
	if(getUserByEmail($data['email'])) {
		return false;
	}
	
	$password = password_hash($data['password'], PASSWORD_DEFAULT);

	executeQuery("
		INSERT INTO users (username, email, password) 
		VALUES ('{$data['username']}', '{$data['email']}', '{$password}')
	");

	return true;
}