<?php

namespace src\Controller;

class ErrorController extends \Core\Controller{
	public function errorAction(){
		$this->render("404");
	}
	
	public function defaultAction(){
		$this->render("index");
		// echo __CLASS__ . " [defaultAction]" . PHP_EOL;
	}
}
