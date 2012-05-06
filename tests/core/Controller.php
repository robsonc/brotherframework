<?php

require_once 'Controller.php';

class ControllerTest extends PHPUnit_Framework_TestCase {
	
	public $object;

	protected function setUp(){
		$this->object = new \Core\Controller();
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

	public function testRunView(){
		$this->assertTrue($this->object->runView());

		$this->object->setView('default');
		$this->assertFalse($this->object->runView());

		$this->assertEquals('default', $this->object->getView());
		$this->assertTrue(is_string($this->object->getView()));
	}
}