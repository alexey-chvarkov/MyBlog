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

    protected $MenuItems;
    protected $SideItems;

    protected function __construct()
    {
        $this->MenuItems = Application::$Database->MenuItems;
        $this->SideItems = Application::$Database->SideItems;
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
        include '../App/Views/Header.php';
    }

    protected function view($viewName)
    {
        include '../App/Views/'.$viewName.'.php';
    }

    protected function footer()
    {
        include '../App/Views/Footer.php';
    }

    protected abstract function main();
}