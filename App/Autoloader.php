<?php



function __autoload($className)
{
    $className = str_replace("\\", "/", $className);  
    $onlyName = array_pop(explode("/", $className));
    //echo $className." ==>  ";
    if (file_exists("../".$className.".php"))
    {
        //echo "> "."../".$className.".php<br/>";
        require "../".$className.".php";
    }

}