<?php 

/**
 * La fonction "route" permet de router les requêtes HTTP vers les bonnes fonctions.
 * Par exemple, si l'URL est "/products", la fonction "route" appelle la fonction "index" du contrôleur "ProductsController".
 * Par exemple, si l'URL est "/products/1", la fonction "route" appelle la fonction "show" du contrôleur "ProductsController".
 * Par exemple, si l'URL est "/products/2/edit", la fonction "route" appelle la fonction "edit" du contrôleur "ProductsController".
 * Etc..
 * 
 * @param _url The  parameter is the URL that is being routed. It is a string that represents the
 * path of the requested URL.
 * 
 * @return void
 */
$routes = [
	'/' => [
		'controller' => 'HomeController',
		'action' => 'index'
	], 
	'/products' => [
		'controller' => 'ProductsController',
		'action' => 'index'
	],
	'/admin' => [
		'/' => [
			'controller' => 'AdminController',
			'action' => 'index'
		],
		'/products' => [
			'controller' => 'ProductsController',
			'action' => 'index'
		],
		'/products/create' => [
			'controller' => 'ProductsController',
			'action' => 'create'
		],
		'/products/store' => [
			'controller' => 'ProductsController',
			'action' => 'store'
		],
		'/products/(\d+)/edit' => [
			'controller' => 'ProductsController',
			'action' => 'edit'
		],
		'/products/(\d+)/update' => [
			'controller' => 'ProductsController',
			'action' => 'update'
		],
	]
];

function route($_url) 
{
	global $config;
	global $routes;

	$url = $_url;
	// Divise l'url en segments et les stocke dans un tableau
	$url = explode('/', $url);
    // Enleve les elements vides du tableau
	$url = array_filter($url);

    /* Verifie si l'url n'est pas nulle et on définit la valeur du controller sinon on définit la valeur du controller sur home */
	$controller = isset($url[1]) ? $url[1] : 'home';

	/* Verifie si le deuxieme element de l'url n'est pas nulle et on définit la valeur de l'action sinon on définit la valeur de l'action sur index */ 
	$action = isset($url[2]) ? $url[2] : 'index';

    /* On déclare la variable params qui contient seulement les elements après l'index 2 */
	$params = array_slice($url, 2);

	/* On déclare la variable controllerFile qui contient le chemin du fichier controller */
    $controllerFile = $config['alias']['http'] . '/controllers/' . ucfirst($controller) . 'Controller.php';

    if (file_exists($controllerFile)) {
        require $controllerFile;

        if (is_numeric($action)) {
            $id = (int) $action;
            $action = 'show'; // Si le segment est numérique, il s'agit de l'ID, donc l'action est "show"
			$params = array_slice($url, 3); // On déclare la variable params qui contient seulement les elements après l'index 3 car l'URL est de la forme /controller/action/id

        }

        if (function_exists($action)) {
			// Ajouter middleware ici 
			
			if(isset($id)) { // Si un ID est présent, transmettez-le comme premier paramètre
				call_user_func_array($action, [$id, ...$params]);
			} else {
				// Si la méthode HTTP est POST et que l'action est "update" ou "store", ajoutez le tableau $_POST comme paramètre (ça nous servira à récupérer les données du formulaire dans la fonction du controller)
				if($_SERVER['REQUEST_METHOD'] == 'POST' && 
					($action == 'update' || $action == 'store')
				) {
					$params = [... $params, "request" => $_POST];
				}

				// S'il n'y a pas de paramètres dans l'URL, appelez simplement l'action 
				// ex : /products ou /products/create
				if(empty($params)) {
					// echo "No parameters <br/>";
					$action();
					
				} else {
					// S'il y a des paramètres dans l'URL, appelez l'action et transmettez les paramètres
					// echo "With parameters <br/>";
					call_user_func_array($action, $params);
				}
			}
        } else {
            echo "Action $action non trouvée";
			require 'app/http/views/404.php';
        }
    } else {
        echo "Contrôleur $controller non trouvé";
		require 'app/http/views/404.php';
    }
}

