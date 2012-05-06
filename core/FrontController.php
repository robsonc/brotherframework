<?php

namespace Core;

/*
@TODO: adicionar verificação de arquivo inexistente ao metodo run()
@TODO: adicionar verificação de solicitação de um controller inexistente
*/
class FrontController {

	private $configs = array();

	public function __construct($configs){
		$this->configs = $configs;
	}

	public function run(){
		//retorna a url requisitada
		$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

		if(!array_key_exists($url, $this->configs['patterns'])):
			$fileName = APPLICATION_PATH . '/controllers/NotFoundController.php';
			$className = '\Controller\NotFoundController';
		else:
			$fileName = APPLICATION_PATH . '/controllers/' . $this->configs['patterns'][$url] . '.php';
			$className = '\Controller\\' . $this->configs['patterns'][$url];
		endif;

		require_once $fileName;
		$controller = new $className();
		$controller->indexAction();
		$controller->runView();
		
	}
}