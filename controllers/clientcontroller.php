<?php

require_once "./models/clientmodel.php";

class clientController{

    public static function All(){

        return clientModel::All();
    }

    public static function Create(){
        $data=array(
            "Nombre" =>$_POST["nombre"],
            "Ruc" =>$_POST["ruc"],
            "Direccion" =>$_POST["direccion"],
            "Telefono" =>$_POST["telefono"],
            "Contacto" =>$_POST["contacto"],
            "Correo" =>$_POST["correo"]
        ); 

        return clientModel::save($data);
    }

    public static function edit(){

        $data=array(
            "Nombre" =>$_POST["nombre"],
            "Ruc" =>$_POST["ruc"],
            "Direccion" =>$_POST["direccion"],
            "Telefono" =>$_POST["telefono"],
            "Contacto" =>$_POST["contacto"],
            "Correo" =>$_POST["correo"]
        ); 

        return clientModel::update($data, $_POST["id"]);
    }
}

?>