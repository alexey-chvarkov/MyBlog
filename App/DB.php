<?php

namespace App;

use App\Classes\DBConnection as DBConnection;
use App\Classes\Collection as Collection;
use App\Models\UserCollection as UserCollection;


class DB
{
	private $Connection;

	public $Users;

	public function __construct()
	{
		$this->Connection = new DBConnection();
		$this->Users = new UserCollection($this->Connection);
		
	}

	public function query($sql)
	{
		return $this->Connection->query($sql);
	}

}
