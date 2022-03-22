<?php
namespace App\models;

class Note
{
    /**
     * @var QueryBuilder
     */
    private $builder;
    private $table='notes';

    public function __construct(QueryBuilder $builder)
    {
        $this->builder = $builder;
    }
    public function add($data)
    {
        return $this->builder->insert($this->table,[
            "subject"=>$data['subject'],
            "content"=>$data['content']
        ]);
    }
    public function select($type)
    {
        if(isset($type) && !empty($type))
            if ((int)$type)
               return $this->builder->getOne($this->table,$type);
            elseif ($type=='active')
                return $this->builder->wheres($this->table," WHERE status=0");
            elseif ($type=='finished')
                return $this->builder->wheres($this->table," WHERE status=1");
    }
    public function status($data)
    {
        $check = $this->builder->getOne($this->table,$data['id']);
        if($check->status=='0')
            $this->builder->update($this->table,[
                'id'=>$data['id'],
                'status'=>1
            ]);
        elseif ($check->status=='1')
            $this->builder->update($this->table,[
                'id'=>$data['id'],
                'status'=>0
            ]);
    }
    public function update($data)
    {
        $this->builder->update($this->table,[
            'id'=>$data['id'],
            'subject'=>$data['subject'],
            'content'=>$data['content']
        ]);
    }
    public function delete($data)
    {
        $this->builder->delete($this->table,$data['id']);
    }
}