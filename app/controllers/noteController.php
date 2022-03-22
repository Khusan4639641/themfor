<?php
namespace App\controllers;

class noteController extends ParentController
{
    public function noteDoneView()
    {
        $this->middleware->check();

        echo $this->view->render('admin/note/note_disabled_list_view', ['url' => '', 'status' => '', 'webName' => '', "notes"=>$this->note->select('finished')]);
    }
    public function noteNewView()
    {
        $this->middleware->check();

        echo $this->view->render('admin/note/note_active_list_view', ['url' => '', 'status' => '', 'webName' => '', "notes"=>$this->note->select('active')]);
    }
    public function noteCreateView()
    {
        $this->middleware->check();

        echo $this->view->render('admin/note/note_create_view', ['url' => '', 'status' => '', 'webName' => '']);
    }
    public function noteEdit($id)
    {
        $this->middleware->check();

        echo $this->view->render('admin/note/note_create_view', ['url' => '', 'status' => '', 'webName' => '',"note"=>$this->note->select($id)]);
    }
    public function noteUpdate()
    {
        $this->middleware->check();

        $this->note->update($_POST);
        header("Location: " ."/admin/note-active");
    }
    public function noteCreate()
    {
        $this->middleware->check();

        $this->note->add($_POST);
        header("Location: " ."/admin/note-active");
    }
    public function viewNote()
    {
        $this->middleware->check();

        echo json_encode($this->note->select($_POST['id']));
    }
    public function noteDoIt()
    {
        $this->middleware->check();

         $this->note->status([
            "id"=>$_POST['id'],
            "status"=>$_POST['status']
        ]);
    }
    public function noteDelete()
    {
        $this->middleware->check();

         $this->note->delete($_POST['id']);
    }
}