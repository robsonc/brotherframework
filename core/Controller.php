<?php

namespace Core;

class Controller {
	
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

	public function loadModel($domainModel){
		require_once APPLICATION_PATH . '/domain/models/' . $domainModel . '.php';
	}
}