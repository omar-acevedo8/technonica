<?php

date_default_timezone_set('America/Managua');

require_once "../env.php";
require_once "../models/invoicemodel.php";
require_once "../controllers/invoicecontroller.php";

require_once "../helpers/model.php";


if(isset($_POST["endpoint"]) &&  $_POST["endpoint"]=="guardarFactura"){
    
    $master=json_decode($_POST["master"],true)[0];
    $detail=json_decode($_POST["detail"],true);

    $result=invoiceController::guardarFactura($master,$detail);
}


if(isset($_POST["endpoint"]) &&  $_POST["endpoint"]=="venta"){

    $key=$_POST["key"];
    $result=Model::getBySql("SELECT Descripcion,
                            Cantidad,
                            (Precio*36.62) as Precio
                            FROM facturaproducto
                            WHERE Factura={$key}");
    echo json_encode($result);
    
}

?>