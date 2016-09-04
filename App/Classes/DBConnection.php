<?php

namespace App\Classes;

use App\Application as Application;

class DBConnection
{

	private $Connection;

	public function __construct()
	{
		$this->Connection = mysqli_connect(Application::$Config->dbserver, Application::$Config->dbuser, Application::$Config->dbpassword) 
			or (new Error(__FILE__, __LINE__, "No connection to database", "Incorrect connection data: host, user, password"))->Output();
		mysqli_select_db($this->Connection, Application::$Config->dbname) 
			or (new Error(__FILE__, __LINE__, "Databases with the same name is not found", "Incorrect connection data: database name"))->Output();

	}

	public function query($sql)
	{
		$res = mysqli_query($this->Connection, $sql);
		if (is_bool($res))
			return $res;
		while ($row = mysqli_fetch_assoc($res)) {
			$out[] = $row;
		}
		return $out;
	}

}