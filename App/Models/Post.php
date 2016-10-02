<?php

namespace App\Models;

use App\Core\Object as Object;

class Post extends Object
{
	protected $PostId;
	protected $Title;
	protected $Preview;
	protected $Content;
	protected $DateCreated;
	protected $Views;
	protected $Image;

	public function __get($name)
	{
		switch($name)
		{
			case "PostId": return $this->PostId;  break;
			case "Title": return $this->Title;  break;
			case "Preview": return $this->Preview;  break;
			case "Content": return $this->Content;  break;
			case "DateCreated": return $this->DateCreated;  break;
			case "Views": return $this->Views;  break;
			case "Image": return $this->Image;  break;
			default: return null; break;
		}
	}

	protected function setType($Type)
	{
		parent::__construct($Type);
	}

	public function __construct($PostId, $Title, $Preview, $Content, $Image = "", $DateCreated = null, $Views = 0)
	{
		parent::__construct("Post");
		$this->PostId = $PostId;
		$this->Title = $Title;
		$this->Preview = $Preview;
		$this->Content = $Content;
		$this->DateCreated = $DateCreated;
		$this->Views = $Views;
		$this->Image = $Image;
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
            \"Views\": $this->Views,
			\"Image\": \"$this->Image\"
		}";
	}

	public function isEmpty()
	{
		return (!$this->PostId && !$this->Title && !$this->Preview 
			&& !$this->Content && !$this->DateCreated && !$this->Image);
	}

	public function equal($object)
	{
		return ($this == $object);
	}
}