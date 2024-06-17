<?php

class clientModel{

    public static $table='Cliente';

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
  
}


?>