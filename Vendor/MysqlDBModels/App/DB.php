<?php

namespace App;

use App\Classes\DBConnection as DBConnection;
use App\Classes\Collection as Collection;
use App\Models\UserCollection as UserCollection;
use App\Models\TableCollection as TableCollection;


class DB
{
	private $Connection;

	public $Tables;

	public function __construct()
	{
		$this->Connection = new DBConnection();
		$this->Tables = new TableCollection($this->Connection);
		
	}

	public function query($sql)
	{
		return $this->Connection->query($sql);
	}

}
