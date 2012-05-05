<?php

namespace Core;

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

	public function loadModel($domainModel){
		require_once APPLICATION_PATH . '/domain/models/' . $domainModel . '.php';
	}

	public function setView($view){
		$this->view = $view;
	}

	public function getView(){
		return $this->view;
	}

	public function runView(){
		include APPLICATION_PATH . '/views/' . $this->view . '.php';
	}
}