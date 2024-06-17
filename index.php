<?php


require_once "./env.php";
require_once "./helpers/model.php";

session_start();

if(isset($_SESSION["auth"]) && $_SESSION["auth"]=="ok"){
  
    include("./template.php");
}
else{

    include("./views/auth/login.php");
}

?>