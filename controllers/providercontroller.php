<?php

require_once "./models/providermodel.php";

class providerController{

    public static function All(){

        return providerModel::All();
    }

    public static function create(){
        $data=array(
            "Nombre" =>$_POST["nombre"],
            "Ruc" =>$_POST["ruc"],
            "Direccion" =>$_POST["direccion"],
            "Telefono" =>$_POST["telefono"],
            "Contacto" =>$_POST["contacto"],
            "Correo" =>$_POST["correo"]
        ); 

        return providerModel::save($data);
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

        return providerModel::update($data, $_POST["id"]);
    }
}

?>