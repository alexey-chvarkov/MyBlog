<?php

namespace App\Core; 

class Error extends Object
{
    public $Title;
    public $Description;

    public function __construct($title = "Unknow", $description = "An unknown error occurred")
    {
        parent::__construct("Error");
        $this->Title = $title;
        $this->Description = $description;
    }

    public function show()
    {
        die ("Error: $this->Title. $this->Description.");
    }

    public function toString()
	{
		return "{
			\"Type\": \"$this->Type\",
			\"Title\": $this->Title,
			\"Description\": \"$this->Description\"
		}";
	}

	public function isEmpty()
	{
		return (!$this->Description && !$this->Title);
	}

	public function equal($object)
	{
		return ($this == $object);
	}

}