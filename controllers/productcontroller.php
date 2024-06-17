<?php

require_once "./models/productmodel.php";

class productController{

    public static function All(){

        return productModel::All();
    }

    public static function getAll(){
        return Model::getBySql("SELECT producto.Descripcion as Descripcion,
                                     proveedor.Nombre as Proveedor,
                                     producto.Serie as Serie,
                                     producto.Costo as Costo,
                                     producto.Id as Id,
                                     producto.Activo as Activo
                              FROM proveedor,producto
                              WHERE  proveedor.Id=producto.Proveedor");
    }

    public static function create(){
        $data=array(
            "Descripcion"=>$_POST['descripcion'],
            "Serie"=>$_POST['serie'],
            "Costo"=>$_POST['costo'],
            "Precio"=>$_POST['precio'],
            "Gastos"=>$_POST['gastos'],
            "Proveedor"=>$_POST['proveedor'],
            "Factura"=>$_POST['factura'],
            "Fecha"=>$_POST['fecha'],
            "Iva"=>$_POST['iva'],
            "Activo"=>false,
            "Facturado"=>false
        );

        return productModel::Save($data);
    }

    public static function find($id){

        return productModel::find($id);
    }

    public static function update(){

        $data=array(
            "Descripcion"=>$_POST['descripcion'],
            "Serie"=>$_POST['serie'],
            "Costo"=>$_POST['costo'],
            "Precio"=>$_POST['precio'],
            "Gastos"=>$_POST['gastos'],
            "Proveedor"=>$_POST['proveedor'],
            "Factura"=>$_POST['factura'],
            "Fecha"=>$_POST['fecha'],
            "Iva"=>$_POST['iva'],
            "Activo"=>false,
            "Facturado"=>false
        );

        return productModel::update($data,$_POST['key']);
    }
}

?>