<?php

namespace App\Models;

use App\Application as Application;

class TableRow extends Table
{

	private $Connection;

	public function __set($name, $value)
	{
		if (!$this->Connection)
		{
			$Connection->query("SELECT `TABLE_NAME`, `CREATE_TIME`, `TABLE_COMMENT` FROM INFORMATION_SCHEMA.TABLES WHERE `TABLE_SCHEMA` = '".Application::$Config->dbname."'");
		}
		else
			return null;
	}

	public function __get($name)
	{
		if (!$this->Connection)
		{
			$Connection = new DBConnection();
			$get = $Connection->query("SELECT `$name` FROM `INFORMATION_SCHEMA.TABLES` WHERE 
				`TABLE_NAME` = '$this->Name' and 
				`CREATE_TIME` = '$this->Created' and
				`TABLE_COMMENT` = '$this->Comment'
				");
			return $get[0][$name];
		}
		else
			return null;

	}

	public function setConnection($Connection)
	{
		$this->Connection = $Connection;
	}

	public function __construct($Connection, $Table=null)
	{
		
		
		$this->setConnection($Connection);
		
		if ($Table)
		{
			parent::__construct($Table->Name, $Table->Created, $Table->Comment);
		}
		$this->setType("TableRow");
	}

	public function getValue()
	{
		return new Table($this->Name, $this->Created, $this->Comment);
	}


	public function toString()
	{
		return "{
			\"Type\": \"$this->Type\",
			\"Name\": $this->Name,
			\"Created\": \"$this->Created\",
			\"Comment\": \"$this->Comment\"
		}";
	}

	public function isEmpty()
	{
		return (!$this->Name && !$this->Created && !$this->Comment);
	}

	public function equal($object)
	{
		return ($this == $object);
	}
}