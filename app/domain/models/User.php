<?php

namespace Domain\Model;

class User {

	private $id = null;
	private $username;

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setUsername($username){
		$this->username = $username;
	}

	public function getUsername(){
		return $this->username;
	}

	public function save(){
		global $pdo;

		$sql = "INSERT INTO user (id, username) VALUES (?, ?)";

		$stat = $pdo->prepare($sql);
		$stat->execute(array(
			$this->getId(), 
			$this->getUsername()
		));
	}

	public function update(){
		global $pdo;

		$sql = "UPDATE user SET username = ? WHERE id = ?";

		$stat = $pdo->prepare($sql);
		$stat->execute(array( 
			$this->getUsername(),
			$this->getId()
		));
	}

	public function delete(){
		global $pdo;

		$sql = "DELETE FROM user WHERE id = ?";

		$stat = $pdo->prepare($sql);
		$stat->execute(array(
			$this->getId()
		));	
	}

	public function getById($id){
		global $pdo;

		$sql = "SELECT * FROM user WHERE id = ?";

		$stat = $pdo->prepare($sql);
		$stat->execute(array(
			$id
		));
		
		return $stat->fetchObject();
	}

	public function getAll(){
		global $pdo;

		$sql = "SELECT * FROM user";

		$stat = $pdo->prepare($sql);
		$stat->execute(array(
			$this->getId()
		));
		
		return $stat->fetchAll(\PDO::FETCH_CLASS);		
	}
}