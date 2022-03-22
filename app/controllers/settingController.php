<?php
namespace App\controllers;

class settingController extends ParentController
{
    public function settingView()
    {
        $this->middleware->check();

        echo $this->view->render('admin/setting/list', ['url' => '', 'status' => '', 'webName' => '']);
    }
    public function set()
    {
        $this->middleware->check();

        echo $this->settings->set([
            "key" => array_keys($_POST)[0],
            "val" => array_values($_POST)[0]
        ]);
    }
    public function select()
    {
        $this->middleware->check();

        echo $this->settings->select();
    }
    public function passCheck()
    {
        $this->middleware->check();

        echo $this->settings->passCheck($_POST['pass']);
    }
}