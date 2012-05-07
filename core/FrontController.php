<?php

namespace Core;

require_once 'Exception.php';

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

		//se não existir na configuração de padrões
		if(!array_key_exists($url, $this->configs['patterns'])):
			$fileName = APPLICATION_PATH . '/controllers/ErrorController.php';
			$className = '\Controller\ErrorController';
		else:
			$fileName = APPLICATION_PATH . '/controllers/' . $this->configs['patterns'][$url] . '.php';
			$className = '\Controller\\' . $this->configs['patterns'][$url];
		endif;

		if(!file_exists($fileName))
			throw new \Core\Exception($fileName . " file not exist");

		require_once $fileName;
		$controller = new $className();
		$controller->indexAction();
		$controller->runView();
		
	}
}