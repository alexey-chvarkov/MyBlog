<?php

namespace App\Models;

use App\Application as Application;

class MenuItemRow extends MenuItem
{
	public function __set($name, $value)
	{
		try
		{
			$result = Application::$Database->query("UPDATE `MenuItems` SET `$name` = '$value' WHERE `MenuItemId` = ".$this->MenuItemId);
			if ($result)
			{
				switch($name)
				{
					case "MenuItemId": $this->MenuItemId = $value;  break;
					case "Title": $this->Title = $value;  break;
					case "URL": $this->URL = $value;  break;
					case "Preoritety": $this->Preoritety = $value;  break;
					default: return; break;
				}
			}
		}
		catch (Exception $e)
		{
			(new Error("Incorrect SQL query", "Check query for update object: <br/>".$this->toString()))->show();
		}
	}

	public function __get($name)
	{
		try
		{
			Application::$Database->query("SELECT `$name` FROM `MenuItems` WHERE 
				`MenuItemId` = $this->MenuItemId and 
				`Title` = '$this->Title' and
				`URL` = '$this->URL' and
				`Preoritety` = $this->Preoritety
				");
			return $get[0][$name];
		}
		catch (Exception $e)
		{
			(new Error("Incorrect SQL query", "Check query for select object: <br/>".$this->toString()))->show();
		}
	}

	public function remove()
	{
		try
		{
			$remove = Application::$Database->query("DELETE FROM `MenuItems` WHERE 
				`MenuItemId` = $this->MenuItemId and 
				`Title` = '$this->Title' and
				`URL` = '$this->URL' and
				`Preoritety` = $this->Preoritety
				");
			if ($remove)
				Application::$Database->MenuItems->__update();
		}
		catch (Exception $e)
		{
			(new Error("Incorrect SQL query", "Check query for remove object: <br/>".$this->toString()))->show();
		}
	}

	public function __construct($MenuItem)
	{
		parent::__construct($MenuItem->MenuItemId, $MenuItem->Title, $MenuItem->URL, $MenuItem->Preoritety);
		$this->setType("MenuItemRow");
	}

	public function getValue()
	{
		return new MenuItem($this->MenuItemId, $this->Title, $this->URL, $this->Preoritety);
	}


	public function toString()
	{
		return "{
			\"Type\": \"$this->Type\",
			\"MenuItemId\": $this->MenuItemId,
			\"Title\": \"$this->Title\",
			\"URL\": \"$this->URL\",
			\"Preoritety\": $this->Preoritety
		}";
	}

	public function isEmpty()
	{
		return (!$this->MenuItemId && !$this->Title && !$this->URL);
	}

	public function equal($object)
	{
		return ($this == $object);
	}
}