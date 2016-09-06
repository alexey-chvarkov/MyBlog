<?php

namespace App\Models;

use App\Application as Application;
use App\Classes\Collection as Collection;
use App\Classes\DBConnection as DBConnection;

class TableCollection extends Collection
{
	private $Connection;

	public function __construct($Connection)
	{

		parent::__construct("TableRow");
		$this->Connection = $Connection;
		$res = $this->Connection->query("SELECT `TABLE_NAME`, `CREATE_TIME`, `TABLE_COMMENT` FROM INFORMATION_SCHEMA.TABLES WHERE `TABLE_SCHEMA` = '".Application::$Config->dbname."'");
        foreach ($res as $value)
			$this->add(new TableRow($this->Connection, new Table($value["TABLE_NAME"], $value["CREATE_TIME"], $value["TABLE_COMMENT"])));
	}


}
