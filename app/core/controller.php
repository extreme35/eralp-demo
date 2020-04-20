<?php

class controller
{
	public function render($file, array $params = [])
	{
		return view::render($file, $params);
	}
	public function model($model)
	{
		if (file_exists($file = MDIR."/{$model}.php")) {
			require_once $file;
			if (class_exists($model)) {
				return new $model;
			} else {
				exit("Model dosyasında sınıf tanımlı değil: $model");
			}
		} else {
			exit("Model dosyası bulunamadı: {$model}.php");
		}
	}
	public function redirect($path)
	{
		header("Location: {$path}");
	}
	public static function url()
	{
		return URL.'/?url='.implode('/', func_get_args());
	}
}
