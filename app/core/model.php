<?php

class model
{
	public $db;

	public function __construct()
	{
		$this->db = new PDO(DB_DSN, DB_USR, DB_PWD);
	}
}
