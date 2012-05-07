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
		if(!array_key_exists($url, $this->configs['patterns']))
			throw new \Core\Exception("404 Page Not Found");

		$controllerFileName = $this->configs['patterns'][$url];
		$controllerFilePath = APPLICATION_PATH . '/controllers/' . $controllerFileName . '.php';
		$controllerClassName = '\Controller\\' . $controllerFileName;


		if(!file_exists($controllerFilePath))
			throw new \Core\Exception($controllerClassName . " Application Controller Not Found");

		require_once $controllerFilePath;
		$actionController = new $controllerClassName();
		$actionController->indexAction();
		$actionController->runView();
		
	}
}