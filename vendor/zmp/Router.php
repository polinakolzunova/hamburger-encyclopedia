<?php
/**
 * Created by PhpStorm.
 * User: PolinaKolzunova
 * Date: 06.02.2020
 * Time: 10:46
 */

namespace zmp;

use \App;

/**
 * Парсинг url, вызов соответствующего контролера/действия
 */
class Router {

	public function start() {
		$route = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
		//$route = str_replace('/' . PROJECT_NAME, '', $route);

		if (isset(App::$config['routing'][$route])) {
			$controller     = 'app\\controllers\\' . App::$config['routing'][$route][0] . 'Controller';
			$action         = App::$config['routing'][$route][1];
			$beforeAction   = "beforeAction";
			$controller_obj = new $controller();

			if (method_exists($controller_obj, $beforeAction)) {
				$controller_obj->$beforeAction($action);
			}

			$controller_obj->$action();
		} else {
			echo "This path dosn't exist (or router dosn't work correctly)";
		}
	}

}