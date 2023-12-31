<?php 

function index()
{
	return view('auth/register', [], 'guest');
}

function store($request)
{
	$errors = validateRequest($request, [
		'email' => 'required|email',
		'username' => 'required',
		'password' => 'required',
		'repassword' => 'required',
	]);

	if(empty($errors)) {
		if($user = registerUser($request)) {
			startUserSession($user);
		} else {
			return View('auth/register', ['errors' => ['email' => 'L\' adresse email est déjà prise']], 'guest');
		}
	} else {
		return View('auth/register', ['errors' => $errors], 'guest');
	}
}