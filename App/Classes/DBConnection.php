<?php

namespace App\Classes;

use App\Application as Application;

class DBConnection
{

	private $Connection;

	private $UseMysqli;

	public function __construct()
	{

		$this->Connection = mysqli_connect(
			Application::$Config->dbserver, 
			Application::$Config->dbuser, 
			Application::$Config->dbpassword, 
			Application::$Config->dbname
		) 
			or (new Error(__FILE__, __LINE__, "Not connect to database", "Incorrect connection configuration: host, user, password or name database."))->Output();
		mysqli_select_db($this->Connection, Application::$Config->dbname) or die ("Not db");
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