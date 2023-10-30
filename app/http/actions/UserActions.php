<?php 

function getUserByEmail($email)
{
	$result = executeQuery("SELECT *  FROM users WHERE email = '{$email}'");
	return (!empty($result) && count($result) > 0) ? $result[0] : null;

}

function getUserById($id)
{
	$result = executeQuery("SELECT * password FROM users WHERE id = '{$id}'");
	return $result;
 
}

function updateUser($data)
{
	$password = password_hash($data['password'], PASSWORD_DEFAULT);

	executeQuery("UPDATE users SET username = '{$data['username']}', password = '{$password}' WHERE id = '{$_SESSION['user']['id']}'");
	
	return true;
}

function connectUser($data)
{
	if($user = getUserByEmail($data['email'])) {
		if(password_verify($data['password'], $user['password'])) {
			return getUserByEmail($data['email']);
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

	$user = getUserByEmail($data['email']);

	return $user;
}

function startUserSession($user)
{
	$_SESSION['user'] = $user;
	Redirect("/");
}

function updateUserSession($user)
{
	$_SESSION['user'] = $user;
	// var_dump($_SESSION['user']);exit;
}
