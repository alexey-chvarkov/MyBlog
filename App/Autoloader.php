<?php

function __autoload($className)
{
    $className = str_replace("\\", "/", $className);  
    $onlyName = array_pop(explode("/", $className));
    require "../".$className.".php";

}