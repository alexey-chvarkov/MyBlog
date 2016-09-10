<?php

namespace App;

use App\Core\Configuration as Configuration;
use App\Core\Database as Database;

use App\Models\PostCollection as PostCollection;

use App\Controllers\MainController as MainController;
use App\Controllers\PostController as PostController;

class Application 
{
    static public $Configuration;
    static public $Database;

    static public function initialize()
    {
        Application::$Configuration = new Configuration();
        Application::$Database = new Database();
        Application::$Database->Posts = new PostCollection();
    }

    static public function start()
    {
        Application::initialize();
        Application::routing();
    }

    static public function routing()
    {
        if ($_POST["type"] == "ajaxquery")
        {
            die("AJAX");
        }
        else
        {
            switch ($_GET["p"])
            {
                case "main": 
                    new MainController();
                break;
                case "post":
                    new PostController();
                break;
                default: exit; break;
            }
        }
    }


}