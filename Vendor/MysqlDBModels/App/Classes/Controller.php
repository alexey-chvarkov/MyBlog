<?php

namespace App\Classes;

use App\Application as Application; 

abstract class Controller
{
    protected $metaTitle;
    protected $metaCharset = "utf-8";
    protected $metaDescription;
    protected $metaKeywords;
    protected $metaAuthor;

    protected $copyright;

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
}