<?php
namespace App\models;
class Users{
    /*
     * @var \App\models\QueryBuilder
     */
    private $queryBuilder;
    private $protocol;
    public function __construct(QueryBuilder $queryBuilder){
        $this->protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
        $this->protocol.='://';
        $this->queryBuilder = $queryBuilder;
    }
    public function loginUrl(){
        return "/login";
    }
    public function url(){
        return "http://".$_SERVER['SERVER_NAME'];
    }
    public function login($data){

        if (md5($data['norobot']) != $_SESSION['randomnr2']){
            $_SESSION['errorCaptcha']="Error Captcha";
            header('Location: '.'/login');

        }else{

        if(
            $this->queryBuilder->existInfo('users',['login'=>$data['email']])!=false &&
            $this->queryBuilder->existInfo('users',['password'=>md5($data['password'])])!=false
        ){
            $_SESSION['user']='admin';
            $_SESSION['signTime']=time();
            $_SESSION['errorPass']="";
            $_SESSION['errorLog']="";
            header('Location: ' . "/admin");
        }else{
            if($this->queryBuilder->existInfo('users',['login'=>$data['email']])==false){
//              Login
                $_SESSION['errorPass']="";
                $_SESSION['errorLog']="Have Error in Login";

            }
            if($this->queryBuilder->existInfo('users',['password'=>md5($data['password'])])==false){
//              Password
                $_SESSION['errorLog']="";
                $_SESSION['errorPass']="Have Error in Password";

            }
            if($this->queryBuilder->existInfo('users',['login'=>$data['email']])==false && $this->queryBuilder->existInfo('users',['password'=>md5($data['password'])])==false){

                $_SESSION['errorLog']="Have Error in Login";
                $_SESSION['errorPass']="Have Error in Password";

            }
                header('Location: ' . '/login');
            }
        }
    }
    public function userStatus(){
        if($_SESSION['user']=='admin'){
            return true;
        }else{
            return false;
        }
    }
    public function logoutUser(){
        session_destroy();
        header('Location: ' . $this->loginUrl());
    }
}