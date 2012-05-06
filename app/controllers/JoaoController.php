<?php

namespace Controller;

require_once 'Controller.php';

class JoaoController extends \Core\Controller {

	public $view = 'institucional';
	public $user;

	public function __construct(){

		$this->loadModel('User');
		$this->user = new \Domain\Model\User();
	}

	public function indexAction(){
		$this->list = array('João Guilherme', 'Show de bola');
	}
}