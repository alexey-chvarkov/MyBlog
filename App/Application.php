<?php

namespace App;

use App\Classes\Error as Error;
use App\Classes\Config as Config;
use App\Classes\DBConnection as DBConnection;
use App\Classes\DB as DB;

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


    }
}

