<?php

class app
{
	public $controller, $action, $params;

	public function __construct()
	{
		$url = isset($_GET['url']) && !empty($_GET['url']) ? 
			trim($_GET['url'], '/') : 'default/index';

		$url = explode('/', $url);

		$this->controller = isset($url[0]) ? $url[0].'Controller' : 'defaultController';
		$this->action = isset($url[1]) ? $url[1].'Action' : 'indexAction';

		array_shift($url);
		array_shift($url);

		$this->params = $url;
	}

	public function run()
	{
		if (file_exists($file = CDIR."/{$this->controller}.php")) {
			require_once $file;
			if (class_exists($this->controller)) {
				$controller = new $this->controller;
				if (method_exists($controller, $this->action)) {
					call_user_func_array([$controller, $this->action], $this->params);
				} else {
					exit("Metod mevcut değil: {$this->action}");
				}
			} else {
				exit("Sınıf mevcut değil: $this->controller");
			}
		} else {
			exit("Controller dosyası mevcut değil: {$this->controller}.php");
		}
	}
}
