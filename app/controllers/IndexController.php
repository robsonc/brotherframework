<?php

namespace Controller;

use Core\Controller;

require_once CORE_PATH . '/Controller.php';

class IndexController extends Controller {

	public function indexAction(){
		
		$title = 'Home';
		include VIEWS_PATH . '/home.php';

	}
}