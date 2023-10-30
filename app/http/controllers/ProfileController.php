<?php 

function index()
{
	if($_POST) {
		$errors = validateRequest($_POST, [
			'username' => 'required',
			'password' => 'required',
			'repassword' => 'required'
		]);

		if(empty($errors)) { 
			if($_POST['password'] !== $_POST['repassword']) {
				
				$errors['password'] = "Les mots de passe ne correspondent pas";
				return view('profile/index', ['errors' => $errors], 'profile');
			
			} else if(updateUser($_POST)) {
				$user = getUserByEmail($_SESSION['user']['email']);
				updateUserSession($user);
				Redirect("/profile/index");
			} 			
		} else {
			return view('profile/index', ['errors' => $errors], 'profile');
		}		
	}

	return view('profile/index', [], 'profile');
}

function orders()
{
	return view('profile/orders', [], 'profile');
}

function store()
{
	
}