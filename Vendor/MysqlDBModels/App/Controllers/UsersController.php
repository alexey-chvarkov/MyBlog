<?php

namespace App\Controllers;

use App\Application as Application; 
use App\Classes\Object as Object;
use App\Classes\Controller as Controller;
use App\Classes\Error as Error;
use App\Classes\Message as Message;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->main();
    }

    public function main()
    {
        
        $id = $_REQUEST["id"];
        if (!$id || preg_match("/[^0-9]/s", $id))
        {
            $this->setMeta("All users", "utf-8", "All users", "No tags", "No author");
            $this->header();
            require '../App/Views/'.Application::$Config->templateName.'/Users.php';
        }
        else
        {
            $user = Application::$DB->Users->whereId($id);
            if ($user)
            {
                $this->setMeta("User: '$user->Login'", "utf-8", "Info user: '$user->Login'", "No tags", "No author");
                $this->header();
                require '../App/Views/'.Application::$Config->templateName.'/User.php';
            }
            else
                new Error("Not found page", "Try enter other URL.");
        }
    }


}