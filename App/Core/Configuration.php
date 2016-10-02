<?php

namespace App\Core;

class Configuration
{
    private $path = "../App/Configuration.xml";

    public $DBServer;
    public $DBUser;
    public $DBPassword;
    public $DBName;

    public $SiteName;
    public $Background;
    public $AdminPage;
    public $Copyright;

    public $TemplateName;

    private $__config;

    public $Settings = array("db_server", "db_user", "db_password", "db_name", "sitename", 
        "background", "adminpage", "copyright", "template");

    public function __construct()
    {
        if (file_exists($this->path)) {
            $this->__config = simplexml_load_file($this->path);
            try {
                $this->update();
            }
            catch (Exception $e){
                (new Error("Incorrect configuration file", $e->getMessage()))->show();
            }
        } 
        else {
            (new Error("Not finding a configuration file", "Not finding file '$this->path'"))-show();
        }
    }

    private function update()
    {
        $this->DBServer = $this->__config->database->server;
        $this->DBUser = $this->__config->database->user;
        $this->DBPassword = $this->__config->database->password;
        $this->DBName = $this->__config->database->name;
        $this->SiteName = $this->__config->site->name;
        $this->Background = $this->__config->site->background;
        $this->AdminPage = $this->__config->site->adminpage;
        $this->Copyright = $this->__config->site->copyright;
        $this->Template = $this->__config->site->template;
    }

    public function setValue($name, $value)
    {
        switch ($name)
        {
            case "db_server": $this->__config->database->server = $value; break;
            case "db_user": $this->__config->database->user = $value; break;
            case "db_password": $this->__config->database->password = $value; break;
            case "db_name": $this->__config->database->name = $value; break;
            case "sitename": $this->__config->site->name = $value; break;
            case "background": $this->__config->site->background = $value; break;
            case "adminpage": $this->__config->site->adminpage = $value; break;
            case "copyright": $this->__config->site->copyright = $value; break;
            case "template": $this->__config->site->template = $value; break;
        }
        $this->__config->saveXML();
    }

}