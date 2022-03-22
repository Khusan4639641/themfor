<?php
namespace App\controllers;

class landingController extends ParentController
{

    public function creatView()
    {
        $this->middleware->check();

        echo $this->view->render('admin/landing/create_view',
            ['url' => '',
                'status' => '',
                'webName' => '',
                "images"=>$this->form->fileImages(),
                "template"=>$this->template->select(),
                "listTemple"=>$this->template->listTemp(),
                'forms'=>$this->form->showForm()]);
    }
    public function pageView($url = "")
    {
        echo $this->view->render('admin/landing/view',
            ['url' => '',
                'status' => '',
                'webName' => '',
                "template"=>$this->template->selectTemp($url)]);
    }

    public function saveTemplate()
    {
        $this->middleware->check();

        echo $this->template->add($_POST);
    }
    public function deleteTemplate()
    {
        $this->middleware->check();

        echo $this->template->del($_POST['id']);
    }
    public function newTemplate()
    {
        $this->middleware->check();

        echo $this->template->add();
    }
    public function selectTemplate()
    {
        $this->middleware->check();

        echo json_encode($this->template->select($_POST['id']));
    }
}