<?php

namespace App\Models;

use App\Classes\Collection as Collection;
use App\Classes\DBConnection as DBConnection;

class UserCollection extends Collection
{
	private $Connection;

	public function __construct($Connection)
	{
		parent::__construct("UserRow");
		$this->Connection = $Connection;
		$res = $this->Connection->query("SELECT * FROM `Users`");
		foreach ($res as $value)
			$this->add(new UserRow($this->Connection, new User($value["UserId"], $value["Login"], $value["Password"], $value["Age"], $value["About"], $value["DateReg"])));
	}

}




