<?php

namespace App\Models;

use App\Application as Application;

class PostRow extends Post
{
	public function __set($name, $value)
	{
		try
		{
			$result = Application::$Database->query("UPDATE `Posts` SET `$name` = '$value' WHERE `PostId` = ".$this->PostId);
			if ($result)
			{
				switch($name)
				{
					case "PostId": $this->PostId = $value;  break;
					case "Title": $this->Title = $value;  break;
					case "Preview": $this->Preview = $value;  break;
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
			Application::$Database->query("SELECT `$name` FROM `Users` WHERE 
				`PostId` = $this->PostId and 
				`Title` = '$this->Title' and
				`Preview` = '$this->Preview' and
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
			$remove = Application::$Database->query("DELETE FROM `Posts` WHERE 
				`PostId` = $this->PostId and 
				`Title` = '$this->Title' and
				`Preview` = '$this->Preview' and
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

	public function __construct($Post)
	{
		parent::__construct($Post->PostId, $Post->Title, $Post->Preview, $Post->Content, $Post->DateCreated, $Post->Views);
		$this->setType("PostRow");
	}

	public function getValue()
	{
		return new Post($this->PostId, $this->Title, $this->Preview, $this->Content, $this->DateCreated, $this->Views);
	}


	public function toString()
	{
		return "{
			\"Type\": \"$this->Type\",
			\"PostId\": $this->PostId,
			\"Title\": \"$this->Title\",
			\"Preview\": \"$this->Preview\",
			\"Content\": \"$this->Content\",
			\"DateCreated\": \"$this->DateCreated\",
			\"Views\": $this->Views
		}";
	}

	public function isEmpty()
	{
		return (!$this->PostId && !$this->Title && !$this->Preview 
			&& !$this->Content && !$this->DateCreated);
	}

	public function equal($object)
	{
		return ($this == $object);
	}
}