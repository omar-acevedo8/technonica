<?php

require_once "./models/usermodel.php";

class userController{

    public static function logIn(){

        $resultTemp=userModel::findByUserName($_POST['user']);
        if(!empty($resultTemp)){
            $result=$resultTemp[0];
        
            if ($_POST["user"]==$result['Nombre'] && $_POST["pass"]==$result['Clave']){

                $_SESSION["auth"]="ok";
                $_SESSION["user"]=$result['Nombre'];
                $_SESSION["nombre"]=$result['Mostrar'];
                $_SESSION["rol"]=$result['Rol'];

                echo '<script> window.location="dashboard"</script>';
            }
             else{
                echo '<br><div class="alert alert-danger">Usuario o contraseña Incorrectos, Intentelo de nuevo</div>';
            }
        }else{
            echo '<br><div class="alert alert-danger">Usuario o contraseña Incorrectos, Intentelo de nuevo</div>';
        }
        
    }
    
    
    public static function All(){

        return userModel::All();
    }

    
}

?>