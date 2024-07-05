<?php

class productModel{

   public static function guardarProducto($data){
        
        $sql="INSERT INTO producto(
            Descripcion,
            Serie
            
            ) VALUES (?,?)";

       // unset($data['Activo']);

        $cn=Connection::connect();
        $stmt=$cn->prepare($sql);

        if($stmt -> execute(array_values($data))){ 
            return 'ok';
        }
        else{
            return $cn->errorInfo();
        }
    }

    public static function modificarProducto($data,$id){

        $sql="UPDATE producto SET
            Descripcion=?,
            Serie=?,
            Costo=?,
            Precio=?,
            Gastos=?,
            Proveedor=?,
            Factura=?,
            Fecha=?,
            Iva=?,
            Activo={$data['Activo']},
            Facturado=?
            WHERE Id={$id}";

        unset($data['Activo']);

        $cn=Connection::connect();
        $stmt=$cn->prepare($sql);

        if($stmt -> execute(array_values($data))){ 
            return 'ok';
        }
        else{
            return $cn->errorInfo();
        }
    }




    public static $table='producto';

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