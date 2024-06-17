<?php

class Model {

    /*

        ------Insertar datos--------------

        $data=array(
            "" => "",
            "" => 1,
            "" => $_POST["id"]
        );

        Model::insert($table,$data);

        ---------obtener datos------------

        $table="tabla";
        $id=valor;

        Model::getall($table);
        Model::getByID($table,$id);

        $sql="select * from tabla where campo=valor and campo2={$variable}";
        Model::getBySql($sql);
        
        find($table, $conditions = ["campo" =>valor, "campo" => valor2], $limit = null)


        ------modificar datos--------------

        $data=array(
            "" => "",
            "" => 1,
            "" => $_POST["id"]
        );

        Model::update($table,$data,$id);

        ------eliminar------
        Model::delete($table,$id);

    */ 


   public static function getAll($table){
        $sql="SELECT * FROM {$table}";
		$stmt=Connection::connect()->prepare($sql);
        $stmt -> execute();

		return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByID($table,$id){
        $sql="SELECT * FROM {$table} WHERE id={$id}";
		$stmt=Connection::connect()->prepare($sql);
        $stmt -> execute();

		return $stmt -> fetch(PDO::FETCH_ASSOC);
    }

    public static function insert($table,$data){
        
        $columns = implode(", ", array_keys($data));
        $values = implode(", ", array_fill(0, count($data), '?'));
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";

        $cn=Connection::connect();
		$stmt=$cn->prepare($sql);

        if($stmt -> execute(array_values($data))){ 
            return 'ok';
        }
        else{
            return $cn->errorInfo();
        }
    }

    public static function update($table,$data,$id){

        $set = [];
        foreach ($data as $key => $value) {
            $set[] = "{$key} = ?";
        }
        $set = implode(", ", $set);
        $sql = "UPDATE {$table} SET {$set} WHERE id = ?";

        $cn=Connection::connect();
		$stmt=$cn->prepare($sql);
        
        if($stmt -> execute(array_merge(array_values($data), [$id]))){ 
            return 'ok';
        }
        else{
            return $cn->errorInfo();
        }
    }

    public static function delete($table,$id){

        $sql = "DELETE FROM {$table} WHERE id = ?";

        $cn=Connection::connect();
		$stmt=$cn->prepare($sql);
        
        if($stmt -> execute([$id])){ 
            return 'ok';
        }
        else{
            return $cn->errorInfo();
        }

    }

    public static function find($table, $conditions = [], $limit = null){

        $where = [];
        foreach ($conditions as $key => $value) {
            $where[] = "{$key} = ?";
        }
        $whereClause = implode(" AND ", $where);
        $limitClause = $limit ? "LIMIT {$limit}" : "";
        $sql = "SELECT * FROM {$table} WHERE {$whereClause} {$limitClause}";

        $cn=Connection::connect();
		$stmt=$cn->prepare($sql);

        $stmt->execute(array_values($conditions));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


    public static function getBySql($sql){

        $cn=Connection::connect();
		$stmt=$cn->prepare($sql);
              
        $stmt -> execute();

		return $stmt -> fetchAll(PDO::FETCH_ASSOC);

    }

    public static function executeSql($sql)
    {
        $cn=Connection::connect();
		$stmt=$cn->prepare($sql);
        
        if($stmt -> execute()){ 
            return 'ok';
        }
        else{
            return $cn->errorInfo();
        }
    }

}

?>