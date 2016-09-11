<?php

namespace App\Core;

use App\Models\Post as Post;
use App\Models\PostRow as PostRow;
use App\Models\PostCollection as PostCollection;

class Database
{
	private $Connection;

    public $Posts;
	public $MenuItems;
	public $SideItems;

	public function __construct()
	{
		$this->Connection = new DBConnection();
	}

	public function query($sql)
	{
		return $this->Connection->query($sql);
	}

}
