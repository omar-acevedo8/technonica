<?php

   $routes=array(
        'dashboard' => 'dashboard',
        'users'=>'users/users',
        'clients'=>'clients/clients',
        'products'=>'products/products',
        'providers'=>'providers/providers',
        'invoices'=>'invoices/invoices',
        'addproduct'=>'products/addproduct',
        'editproduct'=>'products/editproduct',
        'addinvoice'=>'invoices/addinvoice'
        
    );


if(isset($_GET["p"])){

    if ($_GET["p"]=="logout"){

        session_destroy();
        echo '<script> window.location = "dashboard";</script>';
    }
    else{

        foreach($routes as $element=>$value){
           
          if($element===$_GET["p"]){
               $validRoute=$value;
               break;
          }
          else{
              $validRoute="errorpage";
          }
        }
      
        include "./views/".$validRoute.".php";
  
    }
  
}

?>