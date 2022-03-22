<?php
namespace App\controllers;

class emailController extends ParentController
{
    public function index()
    {
        $this->middleware->check();

        $emails = $this->candidate->select('mail');
        echo $this->view->render('admin/message/message_new', ['url' => '', 'status' => '', 'webName' => '',"emails"=>$emails]);
    }
    public function messageNew()
    {
        $this->middleware->check();

        $this->message->sendMessage($_POST);
    }
    public function messageDelete()
    {
        $this->middleware->check();

        $this->message->deleteMessage($_POST['id']);
    }
    public function messageShow()
    {
        $this->middleware->check();

        echo json_encode($this->form->fileUploads());
    }
    public function fileSize()
    {
        $this->middleware->check();

        echo filesize($_POST['file']);
    }
    function messageHistory()
    {
        $this->middleware->check();

        echo $this->view->render('admin/message/send_list_view', ['url' => '', 'status' => '', 'messages' => $this->message->showSends()]);
    }
    function messageHistoryId()
    {
        $this->middleware->check();

        echo json_encode($this->message->showSends($_POST['id']));
    }
    function messageCopy($id)
    {
        $this->middleware->check();

        $file = $this->message->showSends($id)->file;
        $file = str_replace(['[',']',"\""],"",$file);
        $files = explode(",",$file);
        echo $this->view->render('admin/message/message_new', [
            'url' => '',
            'files' => $files,
            'webName' => '',
            "message"=>$this->message->showSends($id)
        ]);
    }

}