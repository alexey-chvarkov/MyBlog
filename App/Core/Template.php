<?php

namespace App\Core; 

class Template extends Object
{
    public $Name;
    public $Description;
    public $Site;
    public $Copyright;
    public $Preview;

    public $IsValid = true;

    private $path = "../App/Views/";
    private $__info;

    public function __construct($Name)
    {
        
        parent::__construct("Template");
        if (file_exists($this->path.$Name."/Info.xml")) {
            $this->__info = simplexml_load_file($this->path.$Name."/Info.xml");
            try {
                $this->Preview = $this->path.$Name."/Preview.png";
                $this->Name = $this->__info->name;
                $this->Description = $this->__info->description;
                $this->Site = $this->__info->site;
                $this->Copyright = $this->__info->copyright;
            }
            catch (Exception $e){
                $this->IsValid = false;
               
            }
        } 
        else {
            $this->IsValid = false;
        }
    }

    public function toString()
	{
		return "{
			\"Type\": \"$this->Type\",
			\"Name\": $this->Name,
			\"Description\": \"$this->Description\",
			\"Site\": $this->Site,
			\"Copyright\": \"$this->Copyright\",
            \"Preview\": \"$this->Preview\",
            \"IsValid\": $this->IsValid
		}";
	}

	public function isEmpty()
	{
		return (!$this->Description && !$this->Name && !$this->Site && !$this->Copyright);
	}

	public function equal($object)
	{
		return ($this == $object);
	}

}