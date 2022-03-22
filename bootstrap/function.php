<?php
set();
function set(){
    $check = file_exists('init/install.json');
    if($check!=false) {
        $keys = file_get_contents('init/install.json');
        $keys = json_decode($keys);
        foreach ($keys as $key=>$val)
            define(strtoupper($key),$val);
    }else
        if($_SERVER['REQUEST_URI']!="/install/" && $_SERVER['REQUEST_URI']!="/install")
                header("location: ". "/install");

}
function SET_JSON_INIT($arg,$value)
{
    $return = [];

    $keys = file_get_contents('init/install.json');
    $keys = json_decode($keys);
    foreach ($keys as $key=>$val)
        if($key==$arg)
            $return[$arg] = $value;
        else
            $return[$key] = $val;

        file_put_contents('init/install.json',json_encode($return));
}

