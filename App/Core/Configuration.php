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

    public $templateName;

    public function __construct()
    {
        if (file_exists($this->path)) {
            $config = simplexml_load_file($this->path);
            try {
                $this->DBServer = $config->database->server;
                $this->DBUser = $config->database->user;
                $this->DBPassword = $config->database->password;
                $this->DBName = $config->database->name;
                $this->SiteName = $config->site->name;
                $this->Background = $config->site->background;
                $this->AdminPage = $config->site->adminpage;
                $this->Copyright = $config->site->copyright;
            }
            catch (Exception $e){
                (new Error("Incorrect configuration file", $e->getMessage()))->show();
            }
        } 
        else {
            (new Error("Not finding a configuration file", "Not finding file '$this->path'"))-show();
        }
    }

}