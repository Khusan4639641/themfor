<?php
namespace App\controllers;

class adminController extends ParentController
{
    public function webName()
    {
        return $_SERVER['SERVER_NAME'];
    }
    public function index()
    {
        $this->middleware->check();
        echo $this->view->render('admin/statistics', ['url' => '', 'status' => '', 'webName' => $this->webName()]);
    }
}