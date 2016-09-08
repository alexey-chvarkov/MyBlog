<?php

namespace App\Controllers;

use App\Application as Application; 
use App\Classes\Object as Object;
use App\Classes\DBConnection as DBConnection;
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
        $this->scriptName = "settings";
        $this->header();
        $this->view("Settings");
        $this->footer();
    }

   static  public function isConnect($server, $dbuser, $password, $dbname)
    {
        if (DBConnection::tryConnect($server, $dbuser, $password, $dbname))
        new Message("OK", "OK","green");
        else
        new Message("ERR", "ERR","red");
    }

    static public function tryConnect_Click()
    {
        new Message("TRY CLICK", "OK");
    }

    static public function set_Click()
    {
        new Message("SET CLICK", "OK");
    }





}