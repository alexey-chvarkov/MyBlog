<?php

namespace App\Controllers;

use App\Application as Application; 
use App\Classes\Error as Error;

class UsersController
{
    public $metaTitle;

    public $title;

    //Logic
    public function __construct()
    {

        $id = $_REQUEST["id"];
        if (preg_match("/[^0-9]/s", $id))
        {
            $this->metaTitle = "All users";
            $this->title = "All users: ".Application::$DB->Users->count();
            require '../App/Views/'.Application::$Config->templateName.'/Header.php';
            require '../App/Views/'.Application::$Config->templateName.'/Users.php';
        }
        else
        {
            $user = Application::$DB->Users->whereId($id);
            if ($user)
            {
                $this->metaTitle = "User: '$user->Login'";
                $this->title = "User: '$user->Login'";
                require '../App/Views/'.Application::$Config->templateName.'/Header.php';
                require '../App/Views/'.Application::$Config->templateName.'/User.php';
            }
            else
                (new Error(null, null, "Not found page", "Try enter other URL."))->Output();
        }

        //Footer
        require '../App/Views/'.Application::$Config->templateName.'/Footer.php';
    }
}