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

		if(!file_exists($this->_getControllerFilePath()))
			throw new \Core\Exception("Error 404 Page Not Found");

		$this->_runController();

	}

	private function _runController(){
		
		require_once $this->_getControllerFilePath();
		$refClass = new \ReflectionClass($this->_getControllerClassName());
		$actionController = $refClass->newInstance();
		$actionController->indexAction();
		$actionController->runView();

	}

	private function _getControllerFileName(){
		if($this->url !== '/')
			$fileName = ucfirst(substr($this->url, 1)) . 'Controller';
		else
			$fileName = 'IndexController';

		return $fileName;
	
	}

	private function _getControllerFilePath(){
	
		return APPLICATION_PATH . '/controllers/' . $this->_getControllerFileName() . '.php';
	
	}

	private function _getControllerClassName(){
	
		return $controllerClassName = '\Controller\\' . $this->_getControllerFileName();
	
	}
}