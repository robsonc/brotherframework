<?php

namespace Core;

class FrontController {

	public static function run($config){
		//retorna a url requisitada
		$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

		if($url == '/'):
			require_once APPLICATION_PATH . '/controllers/IndexController.php';
			$controller = new \Controller\IndexController();
		else:
			$fileName = $config['patterns'][$url];
			$className = '\Controller\\' . $config['patterns'][$url];
			require_once APPLICATION_PATH . '/controllers/' . $fileName . '.php';
			$controller = new $className();
		endif;

		$controller->indexAction();
		$controller->runView();
	}
}