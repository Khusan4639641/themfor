<?php
namespace App\models;

class Template
{
    protected $table = "template";
    protected $tableMenu = "menu";
    /**
     * @var QueryBuilder
     */
    private $builder;

    /**
     * Template constructor.
     * @param QueryBuilder $builder
     */
    public function __construct(QueryBuilder $builder)
    {

        $this->builder = $builder;
    }
    public function select( $id = null )
    {
        if($id==null)
            return [
                "template" => $this->builder->wheres($this->table," ORDER BY id DESC limit 1")[0],
                "menu" => $this->builder->wheres($this->tableMenu," ORDER BY id DESC limit 1")[0]
            ];
        else
            return [
                $this->builder->getOne($this->table,$id),
                $this->builder->wheres($this->tableMenu," ORDER BY id DESC limit 1")[0]
            ];
    }
    public function selectTemp( $url = '' )
    {
            return [
                "template" => $this->builder->wheres($this->table," WHERE url='".$url."' ORDER BY id DESC limit 1")[0],
                "menu" => $this->builder->wheres($this->tableMenu," ORDER BY id DESC limit 1")[0]
            ];
    }
    public function listTemp()
    {
        return $this->builder->all($this->table);
    }
    public function add($data = null)
    {

        $menu = $this->builder->getOne($this->tableMenu,1);
//
        if( isset($menu->id) && !empty($menu->id) )
                $this->builder->update($this->tableMenu,[
                    "id"=>1,
                    "menu"=>$data["menu"]
                ]);
        else
            $this->builder->insert($this->tableMenu,[
                "menu"=>$data["menu"]
            ]);
//
        if(isset($data) && !empty($data))
            return $this->builder->update($this->table,[
                "id"=>$data['id'],
                "template"=>$data["template"],
                "url"=>$data["url"]
            ]);
        else
            return $this->builder->insert($this->table,[
                "template"=>null,
                "url"=>null
            ]);
    }

    public function del($id)
    {
        return $this->builder->delete($this->table,$id);
    }
}