<?php

namespace App\Controllers;

use App\Application as Application;
use App\Core\Message as Message;
use App\Core\Controller as Controller;

use App\Models\MenuItem as MenuItem;
use App\Models\MenuItemCollection as MenuItemCollection;

use App\Models\SideItem as SideItem;
use App\Models\SideItemCollection as SideItemCollection;

class AdminController extends Controller
{
    
    public $Open;

    public $AdminPageName;

    public $ChangeMenuItemId = null;
    public $ChangeSideItemId = null;
    public $IsOpenAddMenuItem = false;

    private $_OpenList = array(null,
        "menu_manager", "side_manager", "page_manager", 
        "post_manager", "parametrs_settings", "design_settings",
        "menu_manager_add", "side_manager_add", "side_manager_change"
    );

    public function __construct()
    {
        $this->AdminPageName = Application::$Configuration->AdminPage;
        parent::__construct();
        $this->main();
    }

    //Menu events

    private function menuItemAdd()
    {
        if ($_REQUEST["new_title"] && $_REQUEST["new_url"])
        {
            Application::$Database->MenuItems->insert(new MenuItem(null, $_REQUEST["new_title"], $_REQUEST["new_url"]));
            $this->Messages[] = new Message("Added menu item.", "Item '".$_REQUEST["new_title"]."' successfully added.");
            $this->setLocation("?p=$this->AdminPageName&open=menu_manager");
        }
    }

    private function menuDeleteSelectedItems()
    {
        $deleted = 0;
        foreach ($_REQUEST as $key => $value)
        {
            $params = explode("_", $key);
            if ($params[0] == "menu-item-select" && $params[1] && $value == "on") 
            {
                $this->menuItemDelete($params[1], false);
                $deleted++;
            }
        }
        if ($deleted > 0)
            $this->Messages[] = new Message("Deleted menu item.", "Selected $deleted menu items successfully deleted.", "red");       
    }

    private function menuItemChange($id)
    {
        $this->ChangeMenuItemId = $id;
    }

    private function menuItemSave($id)
    {
        if ($_REQUEST["menu-item-save_$id"] &&  $_REQUEST["menu-item-title_$id"] && $_REQUEST["menu-item-url_$id"])
        {
            Application::$Database->MenuItems->getMenuItemById($id)->Title = $_REQUEST["menu-item-title_$id"];
            Application::$Database->MenuItems->getMenuItemById($id)->URL = $_REQUEST["menu-item-url_$id"];
            Application::$Database->MenuItems->__update();
            $this->Messages[] = new Message("Changed menu item.", "Item '".$_REQUEST["menu-item-title_$id"]."' successfully changed.");
        }
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
                Application::$Database->MenuItems->__recountingPreoritety();
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
                Application::$Database->MenuItems->__recountingPreoritety();
                Application::$Database->MenuItems->__update();
                break;
            }
        }
    }

    private function menuItemDelete($id, $showMessage=true)
    {
        $MenuItem = Application::$Database->MenuItems->getMenuItemById($id);
        if ($MenuItem)
        {
            $getTitle = $MenuItem->getValue()->Title;
            $MenuItem->remove();
            if ($showMessage)
                $this->Messages[] = new Message("Deleted menu item.", "Item '$getTitle' successfully deleted.", "red");
        }
    }

    //Side Events

    private function sideItemAdd()
    {
        if ($_REQUEST["new_title"] && $_REQUEST["new_content"])
        {
            Application::$Database->SideItems->insert(new SideItem(null, $_REQUEST["new_title"], $_REQUEST["new_content"]));          
            $this->Messages[] = new Message("Added side item.", "Item '".$_REQUEST["new_title"]."' successfully added.");
            $this->setLocation("?p=$this->AdminPageName&open=side_manager");
        }
    }

    private function sideDeleteSelectedItems()
    {
        $deleted = 0;
        foreach ($_REQUEST as $key => $value)
        {
            $params = explode("_", $key);
            if ($params[0] == "side-item-select" && $params[1] && $value == "on") 
            {
                $this->sideItemDelete($params[1], false);
                $deleted++;
            }
        }
        if ($deleted > 0)
            $this->Messages[] = new Message("Deleted side item.", "Selected $deleted menu items successfully deleted.", "red");       
    }

    private function sideItemChange($id)
    {
        $this->setLocation("?p=$this->AdminPageName&open=side_manager_change&id=$id");
    }

    private function sideItemSave($id)
    {
        if ($_REQUEST["title"] &&  $_REQUEST["content"] && $id && Application::$Database->SideItems->getSideItemById($id))
        {
            Application::$Database->SideItems->getSideItemById($id)->Title = $_REQUEST["title"];
            Application::$Database->SideItems->getSideItemById($id)->Content = $_REQUEST["content"];
            Application::$Database->SideItems->__update();
            $this->Messages[] = new Message("Changed side item.", "Item '".$_REQUEST["title"]."' successfully changed.");
            $this->setLocation("?p=$this->AdminPageName&open=side_manager");
        }
    }

    private function sideItemPreoritetyInc($id)
    {
        Application::$Database->SideItems->__update();
        for ($i = 0; $i < Application::$Database->SideItems->count(); $i++)
        {
            if (Application::$Database->SideItems[$i]->getValue()->SideItemId == $id && $i > 0)
            {
                $nextPreoritety = Application::$Database->SideItems[$i - 1]->getValue()->Preoritety;
                $thisPreoritety = Application::$Database->SideItems[$i]->getValue()->Preoritety;
                Application::$Database->SideItems[$i - 1]->Preoritety = $thisPreoritety;
                Application::$Database->SideItems[$i]->Preoritety = $nextPreoritety;
                Application::$Database->SideItems->__recountingPreoritety();
                Application::$Database->SideItems->__update();
                break;
            }
        }
    }

    private function sideItemPreoritetyDec($id)
    {
        Application::$Database->SideItems->__update();
        for ($i = 0; $i < Application::$Database->SideItems->count(); $i++)
        {
            if (Application::$Database->SideItems[$i]->getValue()->SideItemId == $id && $i < Application::$Database->SideItems->count()-1)
            {
                $prevPreoritety = Application::$Database->SideItems[$i + 1]->getValue()->Preoritety;
                $thisPreoritety = Application::$Database->SideItems[$i]->getValue()->Preoritety;
                Application::$Database->SideItems[$i + 1]->Preoritety = $thisPreoritety;
                Application::$Database->SideItems[$i]->Preoritety = $prevPreoritety;
                Application::$Database->SideItems->__recountingPreoritety();
                Application::$Database->SideItems->__update();
                break;
            }
        }
    }

    private function sideItemDelete($id, $showMessage=true)
    {
        $SideItem = Application::$Database->SideItems->getSideItemById($id);
        if ($SideItem)
        {
            $getTitle = $SideItem->getValue()->Title;
            $SideItem->remove();
            if ($showMessage)
                $this->Messages[] = new Message("Deleted side item.", "Item '$getTitle' successfully deleted.", "red");
        }
    }





    public function action()
    {
        foreach ($_REQUEST as $key => $value)
            $this->Events($key);
    }

    public function main()
    {
        $this->action();
        if (in_array($_GET["open"], $this->_OpenList))
        {
            $this->view("Admin/Header");

            switch($_GET["open"])
            {
                case null: $this->view("Admin/MainView"); break; break;
                case "menu_manager": $this->view("Admin/MenuManagerView");  break; break;
                case "menu_manager_add": $this->view("Admin/MenuManagerAddView");  break; break;
                case "side_manager": $this->view("Admin/SideManagerView");  break; break;
                case "side_manager_add": $this->view("Admin/SideManagerAddView"); break; break;
                case "side_manager_change": 
                    $this->ChangeSideItemId = $_REQUEST["id"]; 
                    if (Application::$Database->SideItems->getSideItemById($this->ChangeSideItemId))
                        $this->view("Admin/SideManagerChangeView"); 
                    break; 
                
                break;
                case "page_manager": $this->view("Admin/PageManagerView"); break; break;
                case "post_manager": $this->view("Admin/PostManagerView"); break; break;
                case "parametrs_settings": $this->view("Admin/ParametrsSettingsView"); break; break;
                case "design_settings": $this->view("Admin/DesignSettingsView"); break; break;
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
        //foreach (Application::$Configuration->Settings as $setting)
        //{
        //        Application::$Configuration->setValue($setting,$_REQUEST[$setting]);
        //}
        // Application::$Configuration->update();
    }

    private function Events($key)
    {
        $params = explode("_", $key);
        if (count($params) == 2)
        { 
            $name = $params[0];
            $id = $params[1];
            switch ($name)
            {
                case "menu-item-inc": $this->menuItemPreoritetyInc($id); break; break;
                case "menu-item-dec": $this->menuItemPreoritetyDec($id); break; break;
                case "menu-item-change": $this->menuItemChange($id) ; break; break;
                case "menu-item-save": $this->menuItemSave($id); break; break;
                case "menu-item-del": $this->menuItemDelete($id); break; break;

                case "side-item-inc": $this->sideItemPreoritetyInc($id); break; break;
                case "side-item-dec": $this->sideItemPreoritetyDec($id); break; break;
                case "side-item-del": $this->sideItemDelete($id); break; break;
                case "side-item-change": $this->sideItemChange($id); break; break;
            }
        }
        if (count($params) == 1)
        {
            switch ($params[0])
            {
                case "menu-item-add": $this->menuItemAdd(); break;
                case "side-item-add": $this->sideItemAdd(); break;
                case "menu-delete-selected": $this->menuDeleteSelectedItems(); break;
                case "side-delete-selected": $this->sideDeleteSelectedItems(); break;
                case "side-item-save": $this->sideItemSave($_REQUEST["id"]); break; break;
            }
        } 
    }



}