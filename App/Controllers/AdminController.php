<?php

namespace App\Controllers;

use App\Core\Controller as Controller;

class AdminController extends Controller
{
    
    public $Open;

    private $_OpenList = array(null,
        "menu_manager", "side_manager", "page_manager", 
        "post_manager", "parametrs_settings", "design_settings"
    );

    public function __construct()
    {
        parent::__construct();
        $this->main();
    }

    public function main()
    {
        if (in_array($_GET["open"], $this->_OpenList))
        {
            $this->view("Admin/Header");

            switch($_GET["open"])
            {
                case null: $this->view("Admin/MainView");  break;
                case "menu_manager": $this->view("Admin/MenuManagerView");  break;
                case "side_manager": $this->view("Admin/SideManagerView");  break;
                case "page_manager": $this->view("Admin/PageManagerView");  break;
                case "post_manager": $this->view("Admin/PostManagerView");  break;
                case "parametrs_settings": $this->view("Admin/ParametrsSettingsView");  break;
                case "design_settings": $this->view("Admin/DesignSettingsView");  break;
            }
            $this->view("Admin/Footer");
        }
        else
            $this->view("Page404");
    }

}