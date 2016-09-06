<?php

namespace App\Controllers;

use App\Application as Application; 
use App\Classes\Controller as Controller;
use App\Classes\Error as Error;
use App\Classes\Message as Message;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->main();
    }

    public function main()
    {
        $this->header();
        $this->view("Settings");
        $this->footer();
    }

}