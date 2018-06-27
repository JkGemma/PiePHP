<?php
namespace Core;

class Router{
	private static $routes;
	
	public static function connect ($url, $route) {
		self::$routes[$url] = $route;
	}
	
	public static function get($url) {
		// retourne un tableau associatif contenant
		// + le controller a instancier
		// + la méthode du controller a appeler
		// + un tableau contenant les paramètres à passer à la méthode du controller
		if(array_key_exists($url, self::$routes)){
			return self::$routes[$url];
		}
		else {
			
			// Routeur Static
			$staticURL = explode('/', $url);
			array_shift($staticURL);
			$action = $staticURL[1] ?? 'default';
			
			$url = array('controller' => $staticURL[0], 'action' => $action);
			
			if(class_exists("src\Controller\\".ucfirst($url['controller'])."Controller")) {
				if(method_exists("src\Controller\\".ucfirst($url['controller'])."Controller", $url['action']."Action")) {
					return $url;
				}
			}
			else {
				return self::$routes["/404"];
			}
			return self::$routes["/404"];
		}
	}
}
