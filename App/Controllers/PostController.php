<?php

namespace App\Controllers;

use App\Application as Application;
use App\Core\Controller as Controller;

class PostController extends Controller
{

    public $Post;

    public function __construct()
    {
        $this->main();
    }

    public function main()
    {        
        $this->Post = Application::$Database->Posts->getPostById($_GET["id"]);
        if ($this->Post) {
            $this->header();
            $this->view("PostView");
            $this->footer();
            $this->Post->Views++;
        }
        else {
            $this->view("Page404");
        }
    }


}