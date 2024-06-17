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


?>