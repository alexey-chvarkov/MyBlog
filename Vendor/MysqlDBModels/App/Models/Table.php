<?php

namespace App\Models;

use App\Classes\Object as Object;

class Table extends Object
{
	public $Name;
    public $Rows;
    public $Created;
    public $Comment;


	protected function setType($Type)
	{
		parent::__construct($Type);
	}

	public function __construct($Name, $Created, $Comment)
	{
		parent::__construct("Table");
		$this->Name = $Name;
		$this->Created = $Created;
		$this->Comment = $Comment;
	}

	public function toString()
	{
		return "{
			\"Type\": \"$this->Type\",
			\"Name\": $this->Name,
			\"Created\": \"$this->Created\",
			\"Comment\": \"$this->Comment\"
		}";
	}

	public function isEmpty()
	{
		return (!$this->Name && !$this->Created && !$this->Comment);
	}

	public function equal($object)
	{
		return ($this == $object);
	}
}
