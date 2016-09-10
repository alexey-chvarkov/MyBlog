<?php

namespace App\Core;

use App\Application as Application;

class DBConnection
{

	private $Connection;

	public function __construct()
	{
		$this->Connection = mysqli_connect(Application::$Configuration->DBServer, Application::$Configuration->DBUser, Application::$Configuration->DBPassword) 
			or (new Error("No connection to database", "Incorrect connection data: host, user, password"))->show();
		mysqli_select_db($this->Connection, Application::$Configuration->DBName) 
			or (new Error("Databases with the same name is not found", "Incorrect connection data: database name"))->show();

	}

	public function query($sql)
	{
		$res = mysqli_query($this->Connection, $sql);
		if (is_bool($res))
			return $res;
		while ($row = mysqli_fetch_assoc($res)) 
			$out[] = $row;
		return $out;
	}

}