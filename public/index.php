<?php

/*

Este é o ínicio do Brother Framework, que é um framework PHP com um conceito inovador
para o desenvolvimento de aplicações do novo século, este framework ser rápido e robusto
porém com a maior simplicidade possível.

*/

use Core\Controller;

//Seta o diretorio principal da aplicação
if(!defined('APPLICATION_PATH')) define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../app'));
if(!defined('CORE_PATH')) define('CORE_PATH', realpath(dirname(__FILE__) . '/../core'));

require_once APPLICATION_PATH . '/configs/config.php';

//retorna a url requisitada
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if($url == '/'):
	require_once APPLICATION_PATH . '/controllers/IndexController.php';
	$controller = new \Controller\IndexController();
	$controller->indexAction();
else:
	switch($url):
		case '/institucional':
			$fileName = $patterns[$url];
			$className = '\Controller\\' . $patterns[$url];
			//var_dump($class);
			require_once APPLICATION_PATH . '/controllers/' . $fileName . '.php';
			$controller = new $className();
			$controller->indexAction();
	endswitch;
endif;