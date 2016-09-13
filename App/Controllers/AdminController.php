<?php

namespace App\Controllers;

use App\Application as Application;
use App\Core\Message as Message;
use App\Core\Controller as Controller;

use App\Models\MenuItem as MenuItem;
use App\Models\MenuItemCollection as MenuItemCollection;

class AdminController extends Controller
{
    
    public $Open;

    public $ChangeMenuItemId = null;

    private $_OpenList = array(null,
        "menu_manager", "side_manager", "page_manager", 
        "post_manager", "parametrs_settings", "design_settings"
    );

    public function __construct()
    {
        parent::__construct();
        $this->main();
    }

    private function menuItemPreoritetyInc($id)
    {
        Application::$Database->MenuItems->__update();
        for ($i = 0; $i < Application::$Database->MenuItems->count(); $i++)
        {
            if (Application::$Database->MenuItems[$i]->getValue()->MenuItemId == $id && $i > 0)
            {
                $nextPreoritety = Application::$Database->MenuItems[$i - 1]->getValue()->Preoritety;
                $thisPreoritety = Application::$Database->MenuItems[$i]->getValue()->Preoritety;
                Application::$Database->MenuItems[$i - 1]->Preoritety = $thisPreoritety;
                Application::$Database->MenuItems[$i]->Preoritety = $nextPreoritety;
                Application::$Database->MenuItems->__update();
                break;
            }
        }
    }

    private function menuItemPreoritetyDec($id)
    {
        Application::$Database->MenuItems->__update();
        for ($i = 0; $i < Application::$Database->MenuItems->count(); $i++)
        {
            if (Application::$Database->MenuItems[$i]->getValue()->MenuItemId == $id && $i < Application::$Database->MenuItems->count()-1)
            {
                $prevPreoritety = Application::$Database->MenuItems[$i + 1]->getValue()->Preoritety;
                $thisPreoritety = Application::$Database->MenuItems[$i]->getValue()->Preoritety;
                Application::$Database->MenuItems[$i + 1]->Preoritety = $thisPreoritety;
                Application::$Database->MenuItems[$i]->Preoritety = $prevPreoritety;
                Application::$Database->MenuItems->__update();
                break;
            }
        }
    }

    public function menuItemSave($id)
    {
        if ($_REQUEST["menu-item-save_$id"] &&  $_REQUEST["menu-item-title_$id"] && $_REQUEST["menu-item-url_$id"])
        {
            Application::$Database->MenuItems->getMenuItemById($id)->Title = $_REQUEST["menu-item-title_$id"];
            Application::$Database->MenuItems->getMenuItemById($id)->URL = $_REQUEST["menu-item-url_$id"];
            Application::$Database->MenuItems->__update();
            $this->Messages[] = new Message("Changed menu item.", "Item '".$_REQUEST["menu-item-title_$id"]."' successfully changed.");
        }
    }

    public function action()
    {
        foreach ($_REQUEST as $key => $value)
        {        
            if (stristr($key, "menu-item"))
                $this->menuItemsEvents($key);
            if (stristr($key, "set-parametrs"))
                $this->setParametrs();

        }
    }

    public function main()
    {
        $this->action();
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
            foreach ($this->Messages as $Message)
                $Message->show();
        }
        else
            $this->view("Page404");
    }



    private function setParametrs()
    {
        $this->Messages[] = new Message("The parameters are set.", "The entered parameters are saved successfully.", "green");
        foreach (Application::$Configuration->Settings as $setting)
        {
            echo "$setting <br/>";
                Application::$Configuration->setValue($setting,$_REQUEST[$setting]);
        }
       // Application::$Configuration->update();
    }

    private function menuItemsEvents($key)
    {
        $params = explode("_", $key);
        if (count($params) == 2)
        { 
            $name = $params[0];
            $id = $params[1];
            switch ($name)
            {
                case "menu-item-inc":
                    $this->menuItemPreoritetyInc($id);
                break;
                case "menu-item-dec":
                    $this->menuItemPreoritetyDec($id);
                break;
                case "menu-item-change":
                    $this->ChangeMenuItemId = $id;
                break;
                case "menu-item-save":
                    $this->menuItemSave($id);
                break;
                case "menu-item-del":
                    $MenuItem = Application::$Database->MenuItems->getMenuItemById($id);
                    if ($MenuItem)
                    {
                        $getTitle = $MenuItem->getValue()->Title;
                        $MenuItem->remove();
                        $this->Messages[] = new Message("Deleted menu item.", "Item '$getTitle' successfully deleted.", "red");
                    }
                break;
            }
            if (count($params) == 1)
            {
                switch ($params[0])
                {
                    case "menu-item-add":
                        if ($_REQUEST["new_title"] && $_REQUEST["new_url"])
                        {
                            Application::$Database->MenuItems->insert(new MenuItem(null, $_REQUEST["new_title"], $_REQUEST["new_url"]));
                            $this->Messages[] = new Message("Added menu item.", "Item '".$_REQUEST["new_title"]."' successfully added.");
                        }
                    break;
                }
            } 
        }
    }


}