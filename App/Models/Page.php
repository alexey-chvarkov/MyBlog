<?php

namespace App\Models;

use App\Core\Object as Object;

class Page extends Object
{
	protected $PageId;
	protected $Title;
	protected $Alias;
	protected $Content;
	protected $DateCreated;
	protected $Views;

	public function __get($name)
	{
		switch($name)
		{
			case "PageId": return $this->PageId;  break;
			case "Title": return $this->Title;  break;
			case "Alias": return $this->Alias;  break;
			case "Content": return $this->Content;  break;
			case "DateCreated": return $this->DateCreated;  break;
			case "Views": return $this->Views;  break;
			default: return null; break;
		}
	}

	protected function setType($Type)
	{
		parent::__construct($Type);
	}

	public function __construct($PageId, $Title, $Alias, $Content, $DateCreated = null, $Views = 0)
	{
		parent::__construct("Page");
		$this->PageId = $PageId;
		$this->Title = $Title;
		$this->Alias = $Alias;
		$this->Content = $Content;
		$this->DateCreated = $DateCreated;
		$this->Views = $Views;
	}

	public function toString()
	{
		return "{
			\"Type\": \"$this->Type\",
			\"PostId\": $this->PageId,
			\"Title\": \"$this->Title\",
			\"Preview\": \"$this->Alias\",
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