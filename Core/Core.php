<?php 
namespace Core;
require_once("routes.php");

class Core{
	
	public function run() {
		$url = "";
		$tab_url = array_filter(explode("/", trim($_SERVER['REQUEST_URI'])));
		array_shift($tab_url);
		
		if((count($tab_url) == 0)) {
			$url = "/" ;
		}
		else {
			foreach ($tab_url as $value) {
				$value = strpos($value, "?") ? strstr($value, "?" , true) : $value;
				$url .= '/'.$value;
			}
		}
		$url = Router::get($url);
		$this->getUrl($url);	
	}
	
	public function getUrl($url) {
		$controller = "src\\Controller\\" . ucfirst($url["controller"])."Controller";
		$action = $url["action"]."Action";
		
		$call = new $controller();
		$call->$action();
	}
}
