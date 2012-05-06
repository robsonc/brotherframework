<?php

$patterns = array(
	'/' => 'IndexController',
	'/institucional' => 'InstitucionalController',
	'/joao' => 'JoaoController'
);

$controllers = array(
	'IndexController' => array(
		'Models' => array(
			'User'
		),
		'Views' => array(
			'home'
		)	
	)
);

$pdo = new \PDO("mysql:host=localhost;dbname=brotherframework", 'root', '');