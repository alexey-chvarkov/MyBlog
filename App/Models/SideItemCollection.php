<?php

namespace App\Models;

use App\Application as Application;
use App\Core\Error as Error;
use App\Core\Collection as Collection;

class SideItemCollection extends Collection
{

    private $where;

	public function __construct($where = "")
	{
        parent::__construct("SideItemRow");
        $this->where = $where;
        $this->__update();
    }

    public function __update()
    {
        $where = ($this->where && $this->where != "")? "WHERE ".$this->where : "";
        $result = Application::$Database->query("SELECT * FROM `SideItems` $where ORDER BY `Preoritety` DESC");
		parent::clear();
        foreach ($result as $value)
			parent::add(new SideItemRow(new SideItem($value["SideItemId"], $value["Title"], $value["Content"], $value["Preoritety"])));
    }

    public function insert($SideItem)
    {
        $result = Application::$Database->query("INSERT INTO `SideItems`(`Title`, `Content`, `Preoritety`) 
            VALUES ('$SideItem->Title', '$SideItem->Content', '$SideItem->Preoritety')");
        if (!$result) 
            (new Error())->show();
        $this->__update();
        return $this;
    }

	public function getSideItemById($id)
	{
        return (new SideItemCollection("`SideItemId` = $id"))->first();
	}

    public function where($newwhere)
    {
        $out = ($this->where && $this->where != "")? "($this->where) and ($newwhere)" : $newwhere;
        return new SideItemCollection($out);
    }
}