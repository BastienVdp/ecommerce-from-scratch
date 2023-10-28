<?php 
	try {
		$db = new PDO(
			'mysql:host=' . $config['database']['host'] . ';dbname=' . $config['database']['name'] . ';charset=utf8', $config['database']['username'], $config['database']['password']
		);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
?>