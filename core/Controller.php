<?php

namespace Core;

require_once 'Exception.php';

class Controller {
	
	protected $view = 'index';
	private $post;
	private $get;

	public function __construct(){
		$this->post = $_POST;
		$this->get = $_GET;
	}

	public function getPost(){
		return $this->post;
	}

	public function getGet(){
		return $this->get;
	}

	private function _loadFile($fileName){
		if(file_exists($fileName)){
			include $fileName;
			return true;
		}		
	}

	public function loadModel($domainModel){
		$fileName = APPLICATION_PATH . '/domain/models/' . $domainModel . '.php';
		if(!$this->_loadFile($fileName)){
			throw new \Core\Exception('Arquivo de modelo não encontrado. --> ' . $fileName);
		}
	}

	public function setView($view){
		$this->view = $view;
	}

	public function getView(){
		return $this->view;
	}

	public function runView(){
		$fileName = APPLICATION_PATH . '/views/' . $this->view . '.php'; 
		if(!$this->_loadFile($fileName)){
			throw new \Core\Exception('Arquivo de visão não encontrado. --> ' . $fileName);
		}
	}
}