<?php

namespace App;

use App\Classes\Error as Error;
use App\Classes\Config as Config;

use App\Controllers\SettingsController as SettingsController;



class Application
{

    static public $Config;
    static public $DB;
    static public $Controller;

    static public function Initialize()
    {
        Application::$Config = new Config();
        //Application::$DB = new DB();
    }

    static public function LoadController($Controller)
    {
        Application::$Controller = $Controller;
    }

    static public function Main()
    {
        Application::Initialize();
        //Start application
        if(!$_GET["type"] && !$_GET["method"])
        {
            switch ($_REQUEST["p"])
            {
                case "settings": Application::LoadController(new SettingsController()); break;
                default: new Error("Not found page", "Try enter other URL."); break;
            }
        }
        else
        {
            switch ($_GET["type"])
            {
                case "ajaxquery":
                    switch ($_GET["method"])
                    {
                        case "settings_isconnect" : SettingsController::isConnect($_GET["dbserver"], $_GET["dbuser"], $_GET["dbpassword"], $_GET["dbname"]); break;
                    }
                break;
                default: new Error("Not found page", "Try enter other URL."); break;
            }
        }       
    }

    
}

