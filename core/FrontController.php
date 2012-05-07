<?php

namespace Core;

require_once 'Exception.php';

/*
@TODO: adicionar verificação de arquivo inexistente ao metodo run()
@TODO: adicionar verificação de solicitação de um controller inexistente
*/
class FrontController {

	private $configs = array();
	private $url;

	public function __construct($configs){
		$this->configs = $configs;
		//retorna a url requisitada
		$this->url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}

	public function run(){

		//se não existir na configuração de padrões
		if(!array_key_exists($this->url, $this->configs['patterns']))
			throw new \Core\Exception("404 Page Not Found");

		if(!file_exists($this->_getControllerFilePath()))
			throw new \Core\Exception($this->_getControllerClassName() . " Application Controller Not Found");

		require_once $this->_getControllerFilePath();
		$refClass = new \ReflectionClass($this->_getControllerClassName());
		$actionController = $refClass->newInstance();
		$actionController->indexAction();
		$actionController->runView();
		
	}

	private function _getControllerFileName(){
		return $this->configs['patterns'][$this->url];
	}

	private function _getControllerFilePath(){
		return APPLICATION_PATH . '/controllers/' . $this->_getControllerFileName() . '.php';
	}

	private function _getControllerClassName(){
		return $controllerClassName = '\Controller\\' . $this->_getControllerFileName();
	}
}