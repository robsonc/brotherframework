<?php

namespace Controller;

require_once 'Controller.php';

class IndexController extends \Core\Controller {

	public $view = 'home';
	public $user;

	public function init(){
		$this->loadModel('User');
		$this->user = new \Domain\Model\User();
	}

	public function indexAction(){
		
		$this->title = 'Home';
		$this->users = $this->user->getAll();

	}
}