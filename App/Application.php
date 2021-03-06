<?php

namespace App;

use App\Core\Configuration as Configuration;
use App\Core\Database as Database;

use App\Models\Page as Page;

use App\Models\PostCollection as PostCollection;
use App\Models\PageCollection as PageCollection;
use App\Models\MenuItemCollection as MenuItemCollection;
use App\Models\SideItemCollection as SideItemCollection;

use App\Controllers\AdminController as AdminController;
use App\Controllers\MainController as MainController;
use App\Controllers\PostController as PostController;
use App\Controllers\PageController as PageController;

use App\Models\SideItem as SideItem;

class Application 
{
    static public $Configuration;
    static public $Database;

    static public function initialize()
    {
        Application::$Configuration = new Configuration();
        Application::$Database = new Database();
        Application::$Database->Posts = new PostCollection();
        Application::$Database->Pages = new PageCollection();
        Application::$Database->MenuItems = new MenuItemCollection();
        Application::$Database->SideItems = new SideItemCollection();
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
                case Application::$Configuration->AdminPage:
                    new AdminController();
                break;
                case "main": 
                    new MainController();
                break;
                case "post":
                    new PostController();
                break;
                default:          
                    new PageController();
                break;
            }
        }
    }


}