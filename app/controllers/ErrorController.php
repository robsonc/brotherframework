<?php

namespace Controller;

require_once 'Controller.php';

class ErrorController extends \Core\Controller {

	public $view = 'error';
	public $message = 'Application Error';

	public function indexAction(){
		
	}

	public function setMessage($message){
		$this->message = $message;
	}
}