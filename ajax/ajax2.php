<?php

require_once "../env.php";
require_once "../models/invoicemodel.php";
require_once "../controllers/invoicecontroller.php";

if(isset($_POST["endpoint"]) &&  $_POST["endpoint"]=="guardarFactura"){
    
    $master=json_decode($_POST["master"],true)[0];
    $detail=json_decode($_POST["detail"],true);

    $result=invoiceController::guardarFactura($master,$detail);
}

?>