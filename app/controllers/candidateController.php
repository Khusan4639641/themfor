<?php
namespace App\controllers;

class candidateController extends ParentController
{
    public function index()
    {
        $this->middleware->check();
        echo $this->view->render('admin/candidate/income_list_view', ['url' => '', 'status' => '', 'webName' => '',"candidates"=>$this->candidate->select('new')]);
    }
    public function activeView()
    {
        $this->middleware->check();
        echo $this->view->render('admin/candidate/income_active_view', ['url' => '', 'status' => '', 'webName' => '',"candidates"=>$this->candidate->select('active')]);
    }
    public function disabledView()
    {
        $this->middleware->check();
        echo $this->view->render('admin/candidate/income_disabled_view', ['url' => '', 'status' => '', 'webName' => '',"candidates"=>$this->candidate->select('disabled')]);
    }
    public function addCandidate()
    {
        $this->candidate->add($_POST);
        header("Location: " ."/");
    }

    public function candidateSelect()
    {
        $this->middleware->check();

        echo json_encode($this->candidate->select($_POST['id']));
    }
    public function resumeCreate()
    {
        $this->middleware->check();

        $this->candidate->resumeCreate($_POST);
    }
    function candidateStatus()
    {
        $this->middleware->check();

        $this->candidate->status($_POST['data'],$_POST['command']);
        header("Location: " .$_SERVER['HTTP_REFERER']);
    }
}