<?php

namespace App;

use App\Core\Configuration as Configuration;
use App\Core\Database as Database;
use App\Models\Post as Post;
use App\Models\PostCollection as PostCollection;

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
                    //echo Application::$Database->Posts->where("`Title` = 'Hello world'")->where("`PostId` = 3")->toString();
                    echo "<br/><br/>";
                    Application::$Database->Posts[1]->PostId=777;
                    echo "<br/><br/>";
                    echo Application::$Database->Posts->toString();
                    
                break;
                default: die("exit"); break;
            }
        }
    }


}