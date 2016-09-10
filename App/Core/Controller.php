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
        include '../App/Views/'.Application::$Configuration->Template.'/Header.php';
    }

    protected function view($viewName)
    {
        include '../App/Views/'.Application::$Configuration->Template.'/'.$viewName.'.php';
    }

    protected function footer()
    {
        include '../App/Views/'.Application::$Configuration->Template.'/Footer.php';
    }

    protected abstract function main();
}