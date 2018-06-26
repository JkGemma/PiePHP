<?php 

namespace src\Controller;

class AppController extends \Core\Controller{
	
	public function defaultAction(){
		// echo __CLASS__ . " [defaultAction]" . PHP_EOL;
		$this->render("index");
	}
	
	public function addAction(){
		echo __CLASS__ . " [addAction]" . PHP_EOL;
	}
	
	public function indexAction(){
		echo __CLASS__ . " [indexAction]" . PHP_EOL;
	}
}
