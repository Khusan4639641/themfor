<?php
namespace App\controllers;

class formController extends ParentController
{
    public function createView()
    {
        $this->middleware->check();

        echo $this->view->render('admin/form/form_create_view', ['url' => '', 'status' => '', 'webName' => '',"images"=>$this->form->fileImages()]);
    }
    public function formList()
    {
        $this->middleware->check();

        $forms = $this->form->showForm();
        $type = "Active";
        echo $this->view->render('admin/form/form_list_view', ['url' => '', 'status' => '', 'webName' => '','forms'=>$forms,'type'=>$type]);
    }
    public function formListDis()
    {
        $this->middleware->check();

        $forms = $this->form->showFormDis();
        $type = "Disabled";
        echo $this->view->render('admin/form/form_list_view', ['url' => '', 'status' => '', 'webName' => '','forms'=>$forms,'type'=>$type]);
    }
    public function select()
    {
        $this->middleware->check();

        echo $this->form->property($_POST['id']);
    }
    public function saveForm()
    {
        $this->middleware->check();

        echo $this->form->addNew($_POST['data']);
    }
    public function htmlToText()
    {
        $this->middleware->check();

        var_dump($_POST['data']);
    }
    public function showOne()
    {
        $this->middleware->check();

        $forms = $this->form->showForm($_POST['id']);
        echo json_encode($forms);
    }
    public function deleteForm()
    {
        $this->middleware->check();

        echo $this->form->deleteForm($_POST['id']);
    }
    public function deleteFormImage()
    {
        $this->middleware->check();

        echo $this->form->deleteFormFile($_POST['file']);
    }
    public function deleteUploadFile()
    {
        $this->middleware->check();

        echo $this->form->deleteFormFile($_POST['file']);
    }
    public function deleteFormVideo()
    {
        $this->middleware->check();

        echo $this->form->deleteFormFile($_POST['file']);
    }
    public function disableForm()
    {
        $this->middleware->check();

        echo $this->form->disableForm($_POST['id']);
    }
    public function formEdit($id)
    {
        $this->middleware->check();

        $forms = $this->form->showForm($id);
        echo $this->view->render('admin/form/form_create_view', ['url' => '', 'status' => '', 'webName' => '','forms'=>$forms,"images"=>$this->form->fileImages()]);
    }
    public function saveUpdateForm()
    {
        $this->middleware->check();

        echo $this->form->updateForm($_POST['data']);
    }
    public function showForm($form)
    {
        $forms = $this->form->showForm($form);
        $forms = $forms[0];
        if(isset($forms) && !empty($forms))
            echo $this->view->render('admin/form/form_send', ['forms'=>$forms]);
        else
            echo $this->view->render('404');
    }
    public function formCheckUrl()
    {
        $this->middleware->check();

        echo  $this->form->checkUrl($_POST['url']);
    }
    public function uploadFormImage()
    {
        $this->middleware->check();

       echo $this->form->uploadFileImage($_FILES['file']);
    }
    public function uploadFormVideo()
    {
        $this->middleware->check();

        echo $this->form->uploadFileVideo($_FILES['file']);
    }
    public function formCopy($id)
    {
        $this->middleware->check();

        $this->middleware->check();

        $forms = $this->form->showForm($id);
        $type = 'copy';
        echo $this->view->render('admin/form/form_create_view', ['url' => '', 'status' => '', 'webName' => '','forms'=>$forms,"images"=>$this->form->fileImages(),'type'=>$type]);
    }
    public function imagesShow()
    {
        $this->middleware->check();

        echo json_encode($this->form->fileImages());
    }

    public function videosShow()
    {
        $this->middleware->check();

        echo json_encode($this->form->fileVideos());
    }
}