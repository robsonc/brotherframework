<?php

/*

Este é o ínicio do Brother Framework, que é um framework PHP com um conceito inovador
para o desenvolvimento de aplicações do novo século, este framework ser rápido e robusto
porém com a maior simplicidade possível.

*/

use Core\Controller;

//Seta o diretorio principal da aplicação
if(!defined('APPLICATION_PATH')) define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../app'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../core'),
    get_include_path()
)));

require_once APPLICATION_PATH . '/configs/config.php';
require_once 'FrontController.php';

$frontController = new \Core\FrontController($configs);
try{
	$frontController->run();
}catch(Exception $e){
	$fileName = APPLICATION_PATH . '/controllers/ErrorController.php';
	$className = '\Controller\ErrorController';
	require_once $fileName;
	$controller = new $className($frontController->getRequest());
	$controller->setMessage($e->getMessage());
	$controller->init();
	$controller->indexAction();
	$controller->runView();
}