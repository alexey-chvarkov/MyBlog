<?php

namespace App;

use App\Classes\Error as Error;
use App\Classes\Config as Config;





class Application
{

    static public $Config;
    static public $DB;

    static public function Initialize()
    {
        Application::$Config = new Config();
        Application::$DB = new DB();
    }

    static public function Main()
    {
        Application::Initialize();
        //Start
        echo "<h1> Всего: ".Application::$DB->Users->count()."</h1>";
        

    }
}

