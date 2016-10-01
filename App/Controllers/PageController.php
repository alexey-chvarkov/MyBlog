<?php

namespace App\Controllers;

use App\Application as Application;
use App\Core\Controller as Controller;

class PageController extends Controller
{

    public $Page;

    public function __construct()
    {
        parent::__construct();
        $this->main();
    }

    public function main()
    {        
        $this->Page = Application::$Database->Pages->getPageByAlias($_GET["p"]);
        if ($this->Page) {
            $this->header();
            $this->view("PageView");
            $this->footer();
            $this->Page->Views = $this->Page->getValue()->Views + 1;
            
        }
        else {
            $this->view("Page404");
        }
    }
}