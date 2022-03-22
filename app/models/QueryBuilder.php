<?php
namespace App\models;

class QueryBuilder
{
    public $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new \PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, DB_LOGIN, DB_PASS);

        }catch (\Exception $exception){
            echo $exception->getMessage();
        }

    }
    public function executeDB($sql)
    {
        $statement = $this->pdo->prepare($sql); //подготовить
        $statement->execute(); //true || false
        $results = $statement->fetch(\PDO::FETCH_OBJ);
        return $results;
    }
    public function executeDBAll($sql)
    {
        $statement = $this->pdo->prepare($sql); //подготовить
        $statement->execute(); //true || false
        $results = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }
    //Список задач
    public function all($table) /// posts , articles, tasks
    {
        $sql = "SELECT * FROM $table ORDER BY id DESC";
        $statement = $this->pdo->prepare($sql); //подготовить
        $statement->execute(); //true || false
        $results = $statement->fetchAll(\PDO::FETCH_OBJ);

        return $results;
    }
    public function distinsName($table,$rowName){
        $sql = "SELECT DISTINCT $rowName FROM $table ORDER BY id DESC";
        $statement = $this->pdo->prepare($sql); //подготовить
        $statement->execute(); //true || false
        $results = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }
    public function where($table,$role){
        $sql = "SELECT * FROM $table $role ORDER BY id DESC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_OBJ);

        return $result;
    }
    public function joinLeft($table1,$table2,$key1,$key2){
        $sql = "SELECT $table1.*,$table2.*,$table1.id as id1 FROM $table1 LEFT JOIN $table2 on $table1.$key1 = $table2.$key2  ORDER BY $table1.id DESC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_OBJ);

        return $result;
    }

    public function joinLeftWithWhere($table1,$table2,$key1,$key2,$role){
        $sql = "SELECT $table1.*,$table2.*,$table1.id as id1 FROM $table1 LEFT JOIN $table2 on $table1.$key1 = $table2.$key2 $role  ORDER BY $table1.id DESC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_OBJ);

        return $result;
    }

    public function joinLeftOne($table1,$table2,$key1,$key2,$id){
        $sql = "SELECT $table1.*,$table2.*,$table1.id as id1 FROM $table1 LEFT JOIN $table2 on $table1.$key1 = $table2.$key2 WHERE $table1.id = $id ORDER BY $table1.id DESC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_OBJ);

        return $result;
    }

    public function wheres($table,$role){
        $sql = "SELECT * FROM $table $role ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_OBJ);

        return $result;
    }
    // Вывод одной задачи
    public function getOne($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(\PDO::FETCH_OBJ);

        return $result;
    }
    public function existInfo($table,$data){
        // 1. Ключи массива
        // 1. Ключи массива
        $keys = array_keys($data);
        // 2. Сформировать строку title, content
        $stringOfKeys = implode(',', $keys);
        //3. Сформировать метки
        $placeholders = ":" . implode(', :', $keys);
        $sql = "SELECT * FROM $table WHERE $stringOfKeys=$placeholders";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
        $result = $statement->fetch(\PDO::FETCH_OBJ);
        if(empty($result)){
            $result=false;
        }
        return $result;
    }
//Сохранение новой задачи
    public function insert($table, $data)
    {
        // 1. Ключи массива
        $keys = array_keys($data);
        // 2. Сформировать строку title, content
        $stringOfKeys = implode(',', $keys);
        //3. Сформировать метки
        $placeholders = ":" . implode(', :', $keys);
//        end test
        $sql = "INSERT INTO $table ($stringOfKeys) VALUES ($placeholders)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data); //true || false
        return $this->pdo->lastInsertId();
    }
//Изменение\обновление существующей задачи
    public function update($table, $data)
    {
        $fields = '';

        foreach($data as $key => $value)
        {
            if($key!="id")
            $fields .= $key . "=:" . $key . ",";
        }
        $fields = rtrim($fields, ',');

        $sql = "UPDATE $table SET $fields WHERE id=:id";

        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data); // true || false
    }
//Удаление задачи
    public function delete($table, $id)
    {
            $sql = "DELETE FROM $table WHERE id=:id";
            $statement = $this->pdo->prepare($sql);
            $statement->bindParam(":id", $id);
            return $statement->execute();
    }
}