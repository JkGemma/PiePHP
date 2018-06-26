<?php

namespace src\Controller;
use Model;

class UserController extends \Core\Controller{
	
	public function defaultAction(){
		$this->render("index");
	}
	
	public function addAction(){
		echo __CLASS__ . " [addAction]" . PHP_EOL;
	}
	
	public function indexAction(){
		echo __CLASS__ . " [indexAction]" . PHP_EOL;
	}
	
	public function registerAction(){
		if(!empty($_POST)) {
			$register = new \src\Model\UserModel($this->request);
			$register->create();
			// $register->find(); // OK
			
		}
		else {
			$this->render("register"); // donne la vue au controller
		}
	}
	
	public function logInAction() {
		if(!empty($_POST)){
			$login = new \src\Model\UserModel($this->request);
			$login->connect();
		}
		else {
			$this->render("login"); // donne la vue au controller
		}
	}
	
}
