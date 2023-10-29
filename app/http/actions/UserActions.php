<?php 

function getUserByEmail($email)
{
	$result = executeQuery("SELECT id, username, email, password  FROM users WHERE email = '{$email}'");
	return (!empty($result) && count($result) > 0) ? $result[0] : null;

}

function getUserById($id)
{
	$result = executeQuery("SELECT id, username, email, password FROM users WHERE id = '{$id}'");
	return (!empty($result) && count($result) > 0) ? $result[0] : null;

}

function startUserSession($data)
{
	$_SESSION['user'] = [
		'email' => $data['email'],
		'username' => $data['username']
	];
	Redirect("/");
}