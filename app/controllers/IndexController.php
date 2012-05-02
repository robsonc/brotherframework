<?php

namespace Controller;

use Core\Controller;

require_once CORE_PATH . '/Controller.php';

class IndexController extends Controller {

	public $user;

	public function __construct(){

		$this->loadModel('User');
		$this->user = new \Domain\Model\User();
	}

	public function indexAction(){
		
		$title = 'Home';

		$users = $this->user->getAll();
		$robsoncoutinho = $this->user->getById(4);
		var_dump($robsoncoutinho);

		include APPLICATION_PATH . '/views/home.php';

	}
}