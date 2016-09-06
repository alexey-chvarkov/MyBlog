<?php

namespace App\Models;

use App\Classes\Object as Object;

class User extends Object
{
	public $UserId;
	public $Login;
	public $Password;
	public $Age;
	public $About;
	public $DateReg;

	protected function setType($Type)
	{
		parent::__construct($Type);
	}

	public function __construct($UserId, $Login, $Password, $Age, $About = null, $DateReg = null)
	{
		parent::__construct("User");
		$this->UserId = $UserId;
		$this->Login = $Login;
		$this->Password = $Password;
		$this->Age = $Age;
		$this->About = $About;
		$this->DateReg = $DateReg;
	}

	public function toString()
	{
		return "{
			\"Type\": \"$this->Type\",
			\"UserId\": $this->UserId,
			\"Login\": \"$this->Login\",
			\"Password\": \"$this->Password\",
			\"Age\": \"$this->Age\",
			\"About\": \"$this->About\"
		}";
	}

	public function isEmpty()
	{
		return (!$this->UserId && !$this->Login && !$this->Password 
			&& !$this->Age && !$this->About);
	}

	public function equal($object)
	{
		return ($this == $object);
	}
}
