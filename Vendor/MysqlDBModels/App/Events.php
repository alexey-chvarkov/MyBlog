<?php

namespace App;

use App\Application as Application;
use App\Controllers\SettingsController as SettingsController;

class Events
{
    static public function invoke($methodName)
    {
        switch ($methodName)
        {
            case "tryconnect": SettingsController::tryConnect_Click();
            case "set": SettingsController::set_Click();

        }
    }
}