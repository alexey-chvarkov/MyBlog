<?php

namespace App\Models;

use App\Application as Application;

class PageRow extends Page
{
	public function __set($name, $value)
	{
		try
		{
			if (!is_int($value))
				$value = "'$value'";
			$result = Application::$Database->query("UPDATE `Pages` SET `$name` = $value WHERE `PageId` = ".$this->PageId);
			if ($result)
			{
				switch($name)
				{
					case "PostId": $this->PageId = $value;  break;
					case "Title": $this->Title = $value;  break;
					case "Preview": $this->Alias = $value;  break;
					case "Content": $this->Content = $value;  break;
					case "DateCreated": $this->DateCreated = $value;  break;
					case "Views": $this->Views = $value;  break;
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
			Application::$Database->query("SELECT `$name` FROM `Pages` WHERE 
				`PageId` = $this->PageId and 
				`Title` = '$this->Title' and
				`Alias` = '$this->Alias' and
				`Content` = '$this->Content' and
				`DateCreated` = '$this->DateCreated' and
				`Views` = $this->Views 
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
			$remove = Application::$Database->query("DELETE FROM `Pages` WHERE 
				`PageId` = $this->PageId and 
				`Title` = '$this->Title' and
				`Alias` = '$this->Alias' and
				`Content` = '$this->Content' and
				`DateCreated` = '$this->DateCreated' and
				`Views` = $this->Views
				");
		}
		catch (Exception $e)
		{
			(new Error("Incorrect SQL query", "Check query for remove object: <br/>".$this->toString()))->show();
		}
	}

	public function __construct($Page)
	{
		parent::__construct($Page->PageId, $Page->Title, $Page->Alias, $Page->Content, $Page->DateCreated, $Page->Views);
		$this->setType("PageRow");
	}

	public function getValue()
	{
		return new Post($this->PageId, $this->Title, $this->Alias, $this->Content, $this->DateCreated, $this->Views);
	}


	public function toString()
	{
		return "{
			\"Type\": \"$this->Type\",
			\"PageId\": $this->PageId,
			\"Title\": \"$this->Title\",
			\"Alias\": \"$this->Alias\",
			\"Content\": \"$this->Content\",
			\"DateCreated\": \"$this->DateCreated\",
			\"Views\": $this->Views
		}";
	}

	public function isEmpty()
	{
		return (!$this->PageId && !$this->Title && !$this->Alias 
			&& !$this->Content && !$this->DateCreated);
	}

	public function equal($object)
	{
		return ($this == $object);
	}
}