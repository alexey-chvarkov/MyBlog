<?php

namespace App\Classes; 

use App\Application as Application;

class Error
{
    public $file;
    public $line;
    public $title;
    public $description;

    public function __construct($title = "Unknow", $description = "An unknown error occurred", $file = null, $line = null)
    {
        $this->file = $file;
        $this->line = $line;
        $this->title = $title;
        $this->description = $description;
        include '../App/Views/'.Application::$Config->templateName.'/Error.php';
        exit;
    }

}