<?php

namespace App\Classes;

class DB
{
	private $Connection;

	public function __construct()
	{
		$this->Connection = new DBConnection();
	}

	public function query($sql)
	{
		return mysqli_query($this->Connection, $sql);
	}

}