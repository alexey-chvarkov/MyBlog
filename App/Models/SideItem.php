<?php

namespace App\Models;

use App\Core\Object as Object;

class SideItem extends Object
{
	protected $SideItemId;
	protected $Title;
	protected $Content;
	protected $Preoritety;

	public function __get($name)
	{
		switch($name)
		{
			case "SideItemId": return $this->SideItemId;  break;
			case "Title": return $this->Title;  break;
			case "Content": return $this->Content;  break;
			case "Preoritety": return $this->Preoritety;  break;
			default: return null; break;
		}
	}

	protected function setType($Type)
	{
		parent::__construct($Type);
	}

	public function __construct($SideItemId, $Title, $Content, $Preoritety = 0)
	{
		parent::__construct("Post");
		$this->SideItemId = $SideItemId;
		$this->Title = $Title;
		$this->Content = $Content;
		$this->Preoritety = $Preoritety;
	}

	public function toString()
	{
		return "{
			\"Type\": \"$this->Type\",
			\"SideItemId\": $this->SideItemId,
			\"Title\": \"$this->Title\",
			\"Content\": \"$this->Content\",
			\"Preoritety\": \"$this->Preoritety\"
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