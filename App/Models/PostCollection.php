<?php

namespace App\Models;

use App\Application as Application;
use App\Core\Error as Error;
use App\Core\Collection as Collection;

class PostCollection extends Collection
{

    private $where;

	public function __construct($where = "")
	{
        parent::__construct("PostRow");
        $this->where = $where;
        $this->__update();
    }

    private function __update()
    {
        $where = ($this->where && $this->where != "")? "WHERE ".$this->where : "";
        $result = Application::$Database->query("SELECT * FROM `Posts` $where");
		parent::clear();
        foreach ($result as $value)
			parent::add(new PostRow(new Post($value["PostId"], $value["Title"], $value["Preview"], $value["Content"], $value["DateCreated"], $value["Views"])));
    }

    public function insert($Post)
    {
        $result = Application::$Database->query("INSERT INTO `Posts`(`Title`, `Preview`, `Content`) 
            VALUES ('$Post->Title', '$Post->Preview', '$Post->Content')");
        if (!$result) 
            (new Error())->show();
        $this->__update();
        return $this;
    }

	public function getPostById($id)
	{
        return (new PostCollection("`PostId` = $id"))->first();
	}

    public function where($newwhere)
    {
        $out = ($this->where && $this->where != "")? "($this->where) and ($newwhere)" : $newwhere;
        return new PostCollection($out);
    }
}