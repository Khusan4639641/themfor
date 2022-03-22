<?php
namespace App\controllers;

class loginController extends ParentController
{
    public function index(){
        if($this->users->userStatus())
            header("location: ". "/admin");
        else
            echo $this->view->render('login', ['url' => '', 'status' => '', 'webName' => '']);
    }
    public function login()
    {
        $this->users->login($_POST);
    }
    public function logout()
    {
        $this->users->logoutUser();
    }

}