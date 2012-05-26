<?php

require_once 'Controller.php';
require_once 'Request.php';

class ControllerTest extends PHPUnit_Framework_TestCase {
	
	public $object;

	protected function setUp(){
		$this->object = new \Core\Controller(new \Core\Request());
	}

	public function testGetPost(){
		
		$this->assertTrue(is_array($this->object->getPost()));
	}

	public function testGetGet(){
		$this->assertTrue(is_array($this->object->getGet()));
	}

	public function testGetDefaultView(){
		$this->assertEquals('index', $this->object->getView());
	}

	public function testSuccessRunView(){
		$this->object->runView();
	}

	/**
	 * @expectedException \Core\Exception
	 */
	public function testRunViewLaunchException(){
		$this->object->setView('entao');
		$this->assertFalse($this->object->runView());
	}

	public function testGetViewReturnString(){
		$this->assertTrue(is_string($this->object->getView()));
	}

	public function testSetView(){
		$this->object->setView('home');
		$this->assertEquals('home', $this->object->getView());
	}

	public function testSuccessLoadModel(){
		$this->object->loadModel('User');
		$user = new \Domain\Model\User();
		$this->assertInstanceOf('\Domain\Model\User', $user);
	}

	/**
	 * @expectedException \Core\Exception
	 */
	public function testLoadModelLaunchException(){
		$this->object->loadModel('Usuario');
	}
}