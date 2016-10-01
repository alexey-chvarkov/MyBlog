<?php

namespace App\Models;

use App\Application as Application;
use App\Core\Error as Error;
use App\Core\Collection as Collection;

class PageCollection extends Collection
{

    private $where;

	public function __construct($where = "")
	{
        parent::__construct("PageRow");
        $this->where = $where;
        $this->__update();
    }

    public function __update()
    {
        $where = ($this->where && $this->where != "")? "WHERE ".$this->where : "";
        $result = Application::$Database->query("SELECT * FROM `Pages` $where");
		parent::clear();
        foreach ($result as $value)
			parent::add(new PageRow(new Page($value["PageId"], $value["Title"], $value["Alias"], $value["Content"], $value["DateCreated"], $value["Views"])));
    }

    public function insert($Page)
    {
        $result = Application::$Database->query("INSERT INTO `Pages`(`Title`, `Alias`, `Content`) 
            VALUES ('$Page->Title', '$Page->Alias', '$Page->Content')");
        if (!$result) 
            (new Error())->show();
        $this->__update();
        return $this;
    }

	public function getPageById($id)
	{
        return (new PageCollection("`PageId` = $id"))->first();
	}
    
    public function getPageByAlias($alias)
	{
        return (new PageCollection("`Alias` = '$alias'"))->first();
	}

    public function where($newwhere)
    {
        $out = ($this->where && $this->where != "")? "($this->where) and ($newwhere)" : $newwhere;
        return new PageCollection($out);
    }
}