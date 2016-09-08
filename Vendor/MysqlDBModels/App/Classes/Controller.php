<?php

namespace App\Classes;

use App\Application as Application; 
use App\Classes\Object as Object; 

abstract class Controller extends Object
{
    protected $metaTitle;
    protected $metaCharset = "utf-8";
    protected $metaDescription;
    protected $metaKeywords;
    protected $metaAuthor;

    protected $copyright;

    public $scriptName;

    public function __construct($type = "Controller")
    {
        $this->setType($type);
    }

    protected function setType($type)
    {
        parent::_construct($type);
    }

    public function getType()
    {
        return $this->Type;
    }

    protected function setMeta($metatitle, $charset, $decription, $keywords, $author)
    {
        $this->metaTitle = $metatitle;
        $this->metaCharset = $charset;
        $this->metaDescription = $decription;
        $this->metaKeywords = $keywords;
        $this->metaAuthor = $author;
    }

    protected function header()
    {
        include '../App/Views/'.Application::$Config->templateName.'/Header.php';
    }

    protected function view($viewName)
    {
        include '../App/Views/'.Application::$Config->templateName.'/'.$viewName.'.php';
    }

    protected function footer()
    {
        include '../App/Views/'.Application::$Config->templateName.'/Footer.php';
    }

    protected abstract function main();

    public function toString()
	{
		return "{
            \"Type\": \"$this->Type\",
			\"MetaTitle\": \"$this->metaTitle\",
			\"MetaCharset\": $this->metaCharset,
			\"MetaDescription\": \"$this->metaDescription\",
            \"MetaKeywords\": \"$this->metaKeywords\",
            \"MetaAuthor\": \"$this->metaAuthor\"
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