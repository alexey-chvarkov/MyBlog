<?php

namespace App\Controllers;

use App\Core\Controller as Controller;

class AdminEditorController extends Controller
{

    public $formats = array("php", "html", "css", "js", "xml");

    public $items;

    public $content;

    public function __construct()
    {
        parent::__construct();
        $this->items = scandir(dirname($_GET["file"]), 1);
        $this->content = file_get_contents($_GET["file"]);
        $this->main();
    }

    public function main()
    {   
        $this->view("../Admin/EditorView");
    }
}
