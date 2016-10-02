<?php

namespace App\Controllers;

use App\Core\Controller as Controller;

class MainController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->main();
    }

    public function main()
    {
        $this->header();
        $this->view("Carousel");
        $this->view("MainView");
        $this->footer();
    }

}