<?php
namespace App\models;


class Middleware
{
    public function __construct()
    {
//        1. check install file

//        2. check login

//        var_dump(ADMIN_PASS);

//        die();
    }
    public function check(){
        $this->isLogin();
    }
    protected function isLogin(){
        if($_SESSION['user']=='admin'){
            if(!(isset($_SESSION['signTime']) && !empty($_SESSION['signTime']))){
                session_destroy();
                header('Location: ' . '/login');
            }else{
//                logout time
                if(time()-$_SESSION['signTime']>=5000){
                    session_destroy();
                    header('Location: ' . '/login');
                }else{
                    $_SESSION['signTime']=time();
                }
            }
        }else{
            if(isset($_SESSION) && !empty($_SESSION))
                session_destroy();
                header('Location: ' . '/login');
        }
    }
}