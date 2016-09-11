<?php

namespace App\Models;

use App\Application as Application;

class SideItemRow extends SideItem
{
	public function __set($name, $value)
	{
		try
		{
			$result = Application::$Database->query("UPDATE `SideItems` SET `$name` = '$value' WHERE `SideItemId` = ".$this->PostId);
			if ($result)
			{
				switch($name)
				{
					case "SideItemId": $this->SideItemId = $value;  break;
					case "Title": $this->Title = $value;  break;
					case "Content": $this->Content = $value;  break;
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
			Application::$Database->query("SELECT `$name` FROM `SideItems` WHERE 
				`SideItemId` = $this->SideItemId and 
				`Title` = '$this->Title' and
				`URContentL` = '$this->Content' and
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
			$remove = Application::$Database->query("DELETE FROM `SideItems` WHERE 
				`SideItemId` = $this->SideItemId and 
				`Title` = '$this->Title' and
				`Content` = '$this->Content' and
				`Preoritety` = $this->Preoritety
				");
		}
		catch (Exception $e)
		{
			(new Error("Incorrect SQL query", "Check query for remove object: <br/>".$this->toString()))->show();
		}
	}

	public function __construct($SideItem)
	{
		parent::__construct($SideItem->SideItemId, $SideItem->Title, $SideItem->Content, $SideItem->Preoritety);
		$this->setType("SideItemRow");
	}

	public function getValue()
	{
		return new SideItem($this->SideItemId, $this->Title, $this->Content, $this->Preoritety);
	}


	public function toString()
	{
		return "{
			\"Type\": \"$this->Type\",
			\"SideItemId\": $this->SideItemId,
			\"Title\": \"$this->Title\",
			\"Content\": \"$this->Content\",
			\"Preoritety\": $this->Preoritety
		}";
	}

	public function isEmpty()
	{
		return (!$this->SideItemId && !$this->Title && !$this->Content);
	}

	public function equal($object)
	{
		return ($this == $object);
	}
}