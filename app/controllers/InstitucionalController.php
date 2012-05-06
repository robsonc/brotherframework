<?php

namespace Controller;

require_once 'Controller.php';

class InstitucionalController extends \Core\Controller {

	public $view = 'institucional';
	public $user;

	public function __construct(){

		$this->loadModel('User');
		$this->user = new \Domain\Model\User();
	}

	public function indexAction(){
		$this->list = array('Robson Coutinho', 'Eliane Mendes');
	}
}