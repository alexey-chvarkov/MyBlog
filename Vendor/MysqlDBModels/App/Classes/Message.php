<?php

namespace App\Classes;

use App\Application as Application;

class Message
{
    private $title;
    private $content;
    private $color;

    private $hash;

    public function __construct($title, $content, $color="green")
    {
        $this->title = $title;
        $this->content = $content;
        $this->color = $color;
        $this->hash = md5(microtime());
        include '../App/Views/'.Application::$Config->templateName.'/Message.php';
    }
}