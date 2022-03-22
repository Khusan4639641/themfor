<?php
namespace App\models;

class Settings
{
    /**
     * @var QueryBuilder
     */
    private $builder;
    private $table = "settings";
    private $tableUser = "users";

    public function __construct(QueryBuilder $builder)
    {
        $this->builder = $builder;
    }
    public function set($data)
    {
        $id = $this->builder->existInfo($this->table, ['property' => $data['key']])->id;
        if (!empty($id)) {

            if ($data['key'] == "password" || $data['key'] == "gmail_pass") {
                $val = $data['val'];
                $data['val'] = md5($data['val']);
            }else{
                $val = $data['val'];
            }
            if($data['key'] == "password" || $data['key'] == "login")
                    $this->builder->update($this->tableUser, [
                        'id' => 1,
                        $data['key'] => $data['val']
                    ]);

            SET_JSON_INIT($data['key'], $val);

            return $this->builder->update($this->table, [
                  'id' => $id,
                  'property' => $data['key'],
                  'value' => $data['val']
              ]);
        }
         else{
             if($data['key'] == "login" || $data['key']=="password")
                  $this->builder->insert($this->tableUser, [
                     'property' => $data['key'],
                     'value' => $data['val']
                 ]);

                 return $this->builder->insert($this->table, [
                     'property' => $data['key'],
                     'value' => $data['val']
                 ]);
         }
    }

    public function select()
    {
        return json_encode($this->builder->all($this->table));
    }
    public function passCheck($pass)
    {
        $check = $this->builder->wheres($this->table," where property ='password' and value='".md5($pass)."'");
        $gnail = $this->builder->wheres($this->table," where property ='gmail_pass'");
        if($check)
            return json_encode(['true',$gnail[0]->value]);
        else
            return json_encode(['false']);
    }
}