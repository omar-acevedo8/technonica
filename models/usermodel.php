<?php

class userModel{

    public static $table='usuario';

    public static function All(){

        return Model::getAll(self::$table);
    }

    public static function save($data){

        return Model::insert(self::$table,$data);

    }

    public static function update($data,$id){

        return Model::update(self::$table,$data,$id);

    }

    public static function find($id){
        return Model::getByID(self::$table,$id);
    }

    public static function findByUserName($userName){

        return Model::find(self::$table,['Nombre' => $userName],1); 
    }


    public static function create($data){

        return Model::executeSql("INSERT INTO usuario (
                                
                                                        Nombre,
                                                        Mostrar,
                                                        Clave,
                                                        Rol,
                                                        Activo)
                                                VALUES (
                                                        '{$data['Nombre']}',
                                                        '{$data['Mostrar']}',
                                                        '{$data['Clave']}',
                                                        '{$data['Rol']}',
                                                        true
                                                        )");

    }

    public static function delete($id){

        $sql="DELETE FROM usuario 
              WHERE Id={$id}";
              
        return Model::executeSql($sql);
    }


}


?>