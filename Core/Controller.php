<?php
namespace Core;

class Controller {
	protected static $_render;
	protected $request;
	
	public function __construct(){
		$this->request = new Request();
		return $this->request = $this->request->getParams();
		
	}

	public function __destruct() {
		echo self::$_render;
	}
	
	protected function render($view, $scope = []) {
		extract($scope);
		
		$controller = basename(get_class($this));
		$controller = explode("\\", $controller);
		$controller = end($controller);
		
		$f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View',
		str_replace('Controller', '', $controller), $view]) . '.php';

		if (file_exists($f)) {
			
			ob_start();
			include($f);
			$view = ob_get_clean();
			
			ob_start();
			include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View','index']) . '.php');
			
			self::$_render = ob_get_clean();
		}
	}
}
