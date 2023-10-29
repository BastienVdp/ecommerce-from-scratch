<?php 

function index()
{
	return view('auth/login', [], 'guest');
}

function store($request)
{
	$errors = validateRequest($request, [
		'email' => 'required|email',
		'password' => 'required',
	]);

	if(empty($errors)) {
		if(connectUser($request)) {
			startUserSession($request);
		} else {
			return View('auth/login', ['errors' => ['email' => 'Email ou mot de passe incorrect']], 'guest');
		}
	} else {
		return View('auth/login', ['errors' => $errors], 'guest');
	}
}