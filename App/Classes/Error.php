<?php

namespace App\Classes; 

class Error
{
    public $file;
    public $line;
    public $title;
    public $description;

    public function __construct($file, $line, $title = "Unknow", $description = "")
    {
        $this->file = $file;
        $this->line = $line;
        $this->title = $title;
        $this->description = $description;
    }

    public function Output()
    {
        require '../App/Views/Main/Error.php';
    }

}