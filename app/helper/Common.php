<?php
namespace App\helper;

class Common
{
    public static function isPost()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            return true;
        }

        return false;
    }
    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return false|mixed|string
     */
    public static function getPathUrl()
    {
        $pathUrl = $_SERVER["REQUEST_URI"];
        if($position = strpos($pathUrl,'?'))
        {
            $pathUrl = substr($pathUrl,0,$position);
        }

        return $pathUrl;

    }
    public static function url()
    {
        return "/".$_SERVER["SERVER_NAME"];
    }
    public static function Crypt($name)
    {
         require_once 'app/Tools/Crypt/'.$name.".php";
    }

}