<?php

$config['patterns'] = array(
	'/' => 'IndexController',
	'/institucional' => 'InstitucionalController',
	'/joao' => 'JoaoController'
);

$pdo = new \PDO("mysql:host=localhost;dbname=brotherframework", 'root', '');