<?php

namespace App\Classes;

class Config
{
    private $path = "../App/Configuration.xml";

    public $dbserver;
    public $dbuser;
    public $dbpass;
    public $dbname;

    public $templateName;

    public function __construct()
    {
        if (file_exists($this->path)) {
            $config = simplexml_load_file($this->path);
            try {
                $this->dbserver = $config->database->server;
                $this->dbuser = $config->database->user;
                $this->dbpassword = $config->database->password;
                $this->dbname = $config->database->name;
                $this->templateName = $config->template->name;
            }
            catch (Exception $e){
                new Error("Incorrect configuration file", $e->getMessage(), __FILE__, __LINE__);
            }
        } 
        else {
            new Error("Not finding a configuration file", "Not finding file '$this->path'", __FILE__, __LINE__);
        }
    }

}