<?php 
require_once "./controllers/usercontroller.php";

if(isset($_POST['user'])){

    userController::logIn();

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Technonica</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

<link rel="stylesheet" href="./assets/adminlte.min.css">


</head>



<body class="hold-transition login-page">

<img src="./assets/img/logo.jpg" class=" img-rounded" width=200px height=70px>
<br>
<div class="login-box">



<div class="card card-outline card-primary">

<div class="card-body">

<br>

<form action="login" method="post">
<div class="input-group mb-3">
<input type="text" class="form-control" placeholder="Usuario" name='user' required>
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="password" class="form-control" placeholder="Contraseña" name='pass' required>
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="row">
<div class="col-8">

</div>

<div class="col-4">
<button type="submit" class="btn btn-primary btn-block">Ingresar</button>
</div>

</div>
</form>


</div>

</div>


<script src="../../plugins/jquery/jquery.min.js"></script>

<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>
