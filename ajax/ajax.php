<?php

require_once "../env.php";
require_once "../helpers/model.php";

if(isset($_POST["endpoint"]) &&  $_POST["endpoint"]=="client"){

    $table="cliente";
    $result=Model::getByID($table,$_POST["id"]);
    echo json_encode($result);
}

if(isset($_POST["endpoint"]) &&  $_POST["endpoint"]=="provider"){
    
    $table="proveedor";
    $result=Model::getByID($table,$_POST["id"]);
    echo json_encode($result);
}

if(isset($_POST["endpoint"]) &&  $_POST["endpoint"]=="user"){
    
    $table="usuario";
    $result=Model::getByID($table,$_POST["id"]);
    echo json_encode($result);
}

if(isset($_POST["endpoint"]) &&  $_POST["endpoint"]=="consecutivoFactura"){
    
    $result=Model::getBySQLFirst("SELECT * FROM empresa WHERE Id=1");
   // Model::executeSql("UPDATE empresa SET factura=factura+1 WHERE Id=1");
    echo json_encode($result);
}

if(isset($_POST["endpoint"]) &&  $_POST["endpoint"]=="eliminarUsuario"){
    
    echo Model::executeSql("DELETE FROM usuario 
                            WHERE Id={$_POST['id']}");
}

if(isset($_POST["endpoint"]) &&  $_POST["endpoint"]=="eliminarProveedor"){
    
    echo Model::executeSql("DELETE FROM proveedor 
                            WHERE Id={$_POST['id']}");
}

if(isset($_POST["endpoint"]) &&  $_POST["endpoint"]=="eliminarCliente"){
    
    echo Model::executeSql("DELETE FROM cliente 
                            WHERE Id={$_POST['id']}");
}

if(isset($_POST["endpoint"]) &&  $_POST["endpoint"]=="eliminarProducto"){
    
    echo Model::executeSql("DELETE FROM producto 
                            WHERE Id={$_POST['id']}");
}


if(isset($_POST["endpoint"]) &&  $_POST["endpoint"]=="obtenerProducto"){
    
    $result= Model::getBySql("SELECT *
                            FROM producto 
                            WHERE Id={$_POST['id']} AND Activo=1 AND Facturado=False");
    echo json_encode($result[0]);
}


?>