<?php

namespace App;

use App\Classes\Error as Error;
use App\Classes\Config as Config;

use App\Controllers\UsersController as UsersController;



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
        //Start application
        switch ($_REQUEST["p"])
        {
            case "users":
                new UsersController();
            break;
            default:
                (new Error(null, null, "Not found page", "Try enter other URL."))->Output();
            break;
        }
        

    }
}

