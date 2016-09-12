<?php

namespace App\Core; 

class Message extends Object
{
    public $Title;
    public $Content;
    public $Color;
    public $Hash;

    public function __construct($title, $content, $color = "green")
    {
        parent::__construct("Message");
        $this->Title = $title;
        $this->Content = $content;
        $this->Color = $color;
        $this->Hash = md5(microtime());
    }

    public function show()
    {
        include '../App/Views/Message.php';
    }

    public function toString()
	{
		return "{
			\"Type\": \"$this->Type\",
			\"Title\": $this->Title,
			\"Content\": \"$this->Content\",
            \"Color\": \"$this->Color\",
            \"Hash\": \"$this->Hash\"
		}";
	}

	public function isEmpty()
	{
		return (!$this->Content && !$this->Title);
	}

	public function equal($object)
	{
		return ($this == $object);
	}

}