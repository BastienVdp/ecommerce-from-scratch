<?php 

function View($_view, $_params = [], $_layout = 'default')
{
	$layout = getLayout($_layout);
	$view = getView($_view, $_params);
	
	echo str_replace('{{ content }}', $view, $layout);
}

function getView($view, $params = [])
{
	global $config;

	ob_start();
	foreach($params as $key => $value) {
		$$key = $value;
	}

	require $config['alias']['views'] . '/' . $view . '.php';
	return ob_get_clean();
}

function getLayout($layout) 
{
	global $config;
	ob_start();

	require_once dirname(__DIR__) . '/state/CartState.php';
	require_once dirname(__DIR__) . '/state/UserState.php';

	require $config['alias']['views'] . '/layouts/' . $layout . '.php';
	return ob_get_clean();
}