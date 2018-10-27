<?php
class route {
	public static function start() {
		$controller_name = "main";	
		$modelname = "main";
		$action = "index";
		$id = "";

		$routes = explode("/", $_SERVER['REQUEST_URI']);

		if (isset($routes[1]) && $routes[1] != ""){
			if ($routes[1] != 'css'){
				$controller_name = $routes[1];
				$modelname = $routes[1];
			}
		}

		$controller_name .= "_controller";
		$modelname .= "_model";

		if (isset($routes[2]) && $routes[2] != "") {
			if ($routes[2] != 'css'){
				$action=$routes[2];
			}
		}

		if (isset($routes[3]) && $routes[3] != "" && is_numeric($routes[3])) {
			$id = $routes[3];
		}

		$contrfile = "app/controllers/" . $controller_name . ".php";
		$modelfile = "app/models/" . $modelname . ".php";

		if (file_exists($contrfile)) {
			include_once "app/controllers/" . $controller_name . ".php";
		}

		if (file_exists($modelfile)) {
			include_once "app/models/" . $modelname . ".php";
		}

		if (!file_exists($contrfile) && !file_exists($modelfile)) {
			route::error404();
		}

		$controller = new $controller_name;
		$action = "action_" . $action;
			
		if (method_exists($controller, $action)) {
			if ($id != "")
				$controller->$action($id);
			else
				$controller->$action();
		} else {
			route::error404();
		}
	}

	public function error404() {
		$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
	}
}
?>