<?php

namespace Core;

class FrontController {

	private $configs = array();

	public function __construct($configs){
		$this->configs = $configs;
	}

	public function run(){
		//retorna a url requisitada
		$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

		if($url == '/'):
			require_once APPLICATION_PATH . '/controllers/IndexController.php';
			$controller = new \Controller\IndexController();
		else:
			$fileName = $this->configs['patterns'][$url];
			$className = '\Controller\\' . $this->configs['patterns'][$url];
			require_once APPLICATION_PATH . '/controllers/' . $fileName . '.php';
			$controller = new $className();
		endif;

		$controller->indexAction();
		$controller->runView();
	}
}