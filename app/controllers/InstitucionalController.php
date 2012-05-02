<?php

namespace Controller;

use Core\Controller;

require_once CORE_PATH . '/Controller.php';

class InstitucionalController extends Controller {

	public $user;

	public function __construct(){

		$this->loadModel('User');
		$this->user = new \Domain\Model\User();
	}

	public function indexAction(){
		
		$title = 'Institucional';

		$this->user->setUsername('robsoncoutinho');

		include APPLICATION_PATH . '/views/home.php';

	}
}