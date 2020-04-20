<?php

class defaultController extends controller
{
	public function indexAction()
	{
		$this->render('index', $data);
	}
}
