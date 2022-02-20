<?php

class Routing {

	public static function buildRoute() {

		/*Контроллер и action по умолчанию*/
		$controllerName = "IndexController";
		$modelName = "Tasks_Model";
		$action = "index";
		
		$url =  preg_match('([\w\s]+\/)', $_SERVER['PHP_SELF'], $matches);
		$url = str_replace($matches, '', $_SERVER['REQUEST_URI']);

		//$route = explode("/", $_SERVER['REQUEST_URI']);
		$route = explode("/", $url);

		/*Определяем контроллер*/
		if($route[1] != '') {
			$controllerName = ucfirst($route[1]. "Controller");
			$modelName = ucfirst($route[0]. "Model");
		}

		//require_once CONTROLLER_PATH . $controllerName . ".php"; //IndexController.php
		$args = [];
		if(isset($route[2]) && $route[2] !='') {
			$req=explode('?', $route[2]);
			$action = $req[0];
			
			
			if(isset ($req[1])){
				//$args = explode('&', $req[1]);
				parse_str($req[1], $args);
			}
		}
		
		// Примитивный автозагрузчик (не хочу для этого проекта делать полноценный)
		spl_autoload_register(function ($class_name) {
			if(strpos($class_name, 'Model')) {
				require_once MODEL_PATH . $class_name . '.php';
			}
			if(strpos($class_name, 'Controller')) {
				require_once CONTROLLER_PATH . $class_name . '.php';
			}
		});
		
		$controller = new $controllerName();
		$controller->args = $args;
		$controller->$action(); // $controller->index();
	}

	public function errorPage() {

	}


}