<?php
namespace App\models;


use App\services\Mailer;

class Message{
    /**
     * @var Mailer
     */
    private $mailer;
    private $table = "messages";
    /**
     * @var QueryBuilder
     */
    private $builder;

    public function __construct(Mailer $mailer,QueryBuilder $builder)
    {
        $this->mailer = $mailer;
        $this->builder = $builder;
    }

    public function sendMessage($data){
        $data['org_copy'] = $data['message'];
        $data['message'] = str_replace(["#name","#email"],[$data['user'],$data['email']],$data['message']);
         $this->addToDB($data);
         $this->mailer->sendMail($data['subject'],$data['message'],$data['email'],$data['file']);
    }
    protected function addToDB($data)
    {
        $this->builder->insert($this->table,[
            "subject"=>$data['subject'],
            "message"=>$data['message'],
            "org_copy"=>$data['org_copy'],
            "file"=>$data['file'],
            "mail"=>$data['email']
        ]);
    }
    public function showSends($id = null)
    {
        if ($id==null)
            return $this->builder->all($this->table);
        else
            return $this->builder->getOne($this->table,$id);
    }
    public function deleteMessage($id)
    {
        return $this->builder->delete($this->table,$id);
    }
}