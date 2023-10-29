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
		// var_dump($$key, $value);
	}

	require $config['alias']['views'] . '/' . $view . '.php';
	return ob_get_clean();
}

function getLayout($layout) 
{
	global $config;
	ob_start();
	require $config['alias']['views'] . '/layouts/' . $layout . '.php';
	return ob_get_clean();
}