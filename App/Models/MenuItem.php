<?php

namespace App\Models;

use App\Core\Object as Object;

class MenuItem extends Object
{
	protected $MenuItemId;
	protected $Title;
	protected $URL;
	protected $Preoritety;

	public function __get($name)
	{
		switch($name)
		{
			case "MenuItemId": return $this->MenuItemId;  break;
			case "Title": return $this->Title;  break;
			case "URL": return $this->URL;  break;
			case "Preoritety": return $this->Preoritety;  break;
			default: return null; break;
		}
	}

	protected function setType($Type)
	{
		parent::__construct($Type);
	}

	public function __construct($MenuItemId, $Title, $URL, $Preoritety = 0)
	{
		parent::__construct("Post");
		$this->MenuItemId = $MenuItemId;
		$this->Title = $Title;
		$this->URL = $URL;
		$this->Preoritety = $Preoritety;
	}

	public function toString()
	{
		return "{
			\"Type\": \"$this->Type\",
			\"MenuItemId\": $this->MenuItemId,
			\"Title\": \"$this->Title\",
			\"URL\": \"$this->URL\",
			\"Preoritety\": \"$this->Preoritety\"
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