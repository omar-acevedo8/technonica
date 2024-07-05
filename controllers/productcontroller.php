<?php

require_once "./models/productmodel.php";

class productController{

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

        if($_POST['iva']){
            $iva=$_POST['costo']*0.15;
        }else{
            $iva=0;
        }

        if(isset($_POST['activo'])){
            $activo=1;
        }else{
            $activo=0;
        }

        $_POST['precio']==null ? $precio=$_POST['precio'] : $precio=0;  
        $_POST['gastos']==null ? $gastos=$_POST['gastos'] : $gastos=0;
        

        $data=array(
            "Descripcion"=>$_POST['descripcion'],
            "Serie"=>$_POST['serie'],
            "Costo"=>$_POST['costo'],
            "Precio"=>$precio,
            "Gastos"=>$gastos,
            "Proveedor"=>$_POST['proveedor']
        );
       
        return productModel::guardarProducto($data);
    }

     public static function update(){

        if($_POST['iva']){
            $iva=$_POST['costo']*0.15;
        }else{
            $iva=0;
        }

        if(isset($_POST['activo'])){
            $activo=1;
        }else{
            $activo=0;
        }

       
      
        $data=array(
            "Descripcion"=>$_POST['descripcion'],
            "Serie"=>$_POST['serie'],
            "Costo"=>$_POST['costo'],
            "Precio"=>$_POST['precio'],
            "Gastos"=>$_POST['gastos'],
            "Proveedor"=>$_POST['proveedor'],
            "Factura"=>$_POST['factura'],
            "Fecha"=>$_POST['fecha'],
            "Iva"=>$iva,
            "Activo"=>$activo,
            "Facturado"=>false
        );
    
        return productModel::modificarProducto($data,$_POST['id']); 
      
    }

    public static function All(){

        return productModel::All();
    }
     
    public static function find($id){

        return productModel::find($id);
    }
}

?>