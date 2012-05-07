<?php

$configs['patterns'] = array(
	'/' => 'IndexController',
	'/institucional' => 'InstitucionalController',
	'/joao' => 'JoaoController',
	'/contato' => 'ContatoController'
);

$pdo = new \PDO("mysql:host=localhost;dbname=brotherframework", 'root', '');