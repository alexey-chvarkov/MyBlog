<?php

namespace App\Models;

class UserRow extends User
{

	private $Connection;

	public function __set($name, $value)
	{
		if (!$this->Connection)
		{
			$Connection->query("UPDATE `Users` SET `$name` = '$value' WHERE `UserId` = ".$this->UserId);
		}
		else
			return null;
	}

	public function __get($name)
	{
		if (!$this->Connection)
		{
			$Connection = new DBConnection();
			$get = $Connection->query("SELECT `$name` FROM `Users` WHERE 
				`UserId` = $this->UserId and 
				`Login` = '$this->Login' and
				`Password` = '$this->Password' and
				`Age` = $this->Age and
				`About` = '$this->About' and
				`DateReg` = '$this->DateReg' 
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

	public function remove()
	{
		if (!$this->Connection)
		{
			try
			{
				$Connection = new DBConnection();
				$remove = $Connection->query("DELETE FROM `Users` WHERE 
					`UserId` = $this->UserId and 
					`Login` = '$this->Login' and
					`Password` = '$this->Password' and
					`Age` = $this->Age and
					`About` = '$this->About' and
					`DateReg` = '$this->DateReg' 
					");
				return $remove;
			}
			catch (Exception $e)
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	public function __construct($Connection, $User=null)
	{
		
		
		$this->setConnection($Connection);
		
		if ($User)
		{
			parent::__construct($User->UserId, $User->Login, $User->Password, $User->Age, $User->About, $User->DateReg);
		}
		$this->setType("UserRow");
	}

	public function getValue()
	{
		return new User($this->UserId, $this->Login, $this->Password, $this->Age, $this->About, $this->DateReg);
	}


	public function toString()
	{
		$value = $this;
		return "{
			\"Type\": \"$value->Type\",
			\"UserId\": $value->UserId,
			\"Login\": \"$value->Login\",
			\"Password\": \"$value->Password\",
			\"Age\": \"$value->Age\",
			\"About\": \"$value->About\"
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