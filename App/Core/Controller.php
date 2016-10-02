<?php

namespace App\Core;

use App\Application as Application; 

abstract class Controller
{
    protected $metaTitle;
    protected $metaCharset = "utf-8";
    protected $metaDescription;
    protected $metaKeywords;
    protected $metaAuthor;

    protected $pageTitle;

    protected $MenuItems;
    protected $SideItems;

    protected $Messages;

    protected $TemplateName;

    protected function __construct()
    {
        $this->MenuItems = Application::$Database->MenuItems;
        $this->SideItems = Application::$Database->SideItems;
        $this->TemplateName = Application::$Configuration->Template;
    }

    protected function setMeta($metatitle, $charset, $decription, $keywords, $author)
    {
        $this->metaTitle = $metatitle;
        $this->metaCharset = $charset;
        $this->metaDescription = $decription;
        $this->metaKeywords = $keywords;
        $this->metaAuthor = $author;
    }

    protected function setLocation($url)
    {
        header("Location: $url");
    }

    protected function header()
    {
        include '../App/Views/'.$this->TemplateName.'/Header.php';
    }

    protected function view($viewName)
    {
        include '../App/Views/'.$this->TemplateName.'/'.$viewName.'.php';
    }

    protected function footer()
    {
        include '../App/Views/'.$this->TemplateName.'/Footer.php';
    }

    protected abstract function main();
}