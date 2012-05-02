<?php

namespace Controller;

use Core\Controller;

require_once CORE_PATH . '/Controller.php';

class InstitucionalController extends Controller {

	public function indexAction(){
		
		$title = 'Institucional';
		include VIEWS_PATH . '/home.php';
	}
}