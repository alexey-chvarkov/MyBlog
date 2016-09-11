<?php

namespace App\Models;

use App\Application as Application;
use App\Core\Error as Error;
use App\Core\Collection as Collection;

class MenuItemCollection extends Collection
{

    private $where;

	public function __construct($where = "")
	{
        parent::__construct("MenuItemRow");
        $this->where = $where;
        $this->__update();
    }

    public function __update()
    {
        $where = ($this->where && $this->where != "")? "WHERE ".$this->where : "";
        $result = Application::$Database->query("SELECT * FROM `MenuItems` $where ORDER BY `Preoritety` DESC");
		parent::clear();
        foreach ($result as $value)
			parent::add(new MenuItemRow(new MenuItem($value["MenuItemId"], $value["Title"], $value["URL"], $value["Preoritety"])));
        $preor = $this->count();
        foreach ($this as $value)
        {
            $value->Preoritety = $preor;
            $preor--;
        }
    }
 
    public function insert($MenuItem)
    {
        $result = Application::$Database->query("INSERT INTO `MenuItems`(`Title`, `URL`, `Preoritety`) 
            VALUES ('$MenuItem->Title', '$MenuItem->URL', '$MenuItem->Preoritety')");
        if (!$result) 
            (new Error())->show();
        $this->__update();
        return $this;
    }

	public function getMenuItemById($id)
	{
        return (new MenuItemCollection("`MenuItemId` = $id"))->first();
	}

    public function where($newwhere)
    {
        $out = ($this->where && $this->where != "")? "($this->where) and ($newwhere)" : $newwhere;
        return new MenuItemCollection($out);
    }
}