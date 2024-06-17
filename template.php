
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Technonica</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

<link rel="stylesheet" href="./assets/adminlte.min.css">

<!-- DataTables -->
<link rel="stylesheet" href="./assets/css/datatable/dataTables.bootstrap4.css">


<script src="./assets/js/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="./assets/js/bootstrap.bundle.min.js"></script>

<script src="./assets/js/adminlte.js"></script>

<script src="./assets/js/jquery-ui.min.js"></script>


<!-- DataTables -->
<script src="./assets/js/datatable/jquery.dataTables.js"></script>
<script src="./assets/js/datatable/dataTables.bootstrap4.js"></script>

<link href="./assets/css/datatable/responsive/responsive.bootstrap.min.css" rel="stylesheet">
<script src="./assets/js/datatable/responsive/responsive.bootstrap.min.js"></script>
<script src="./assets/js/datatable/responsive/dataTables.responsive.min.js"></script>

 <!-- Select2 -->
 <link rel="stylesheet" href="./assets/css/select2/select2.min.css">
<link rel="stylesheet" href="./assets/css/select2/select2-bootstrap4.min.css">

<script src="./assets/js/select2/select2.full.min.js"></script>


<!--datetimepicker-->
<link rel="stylesheet" href="./assets/css/select2/select2.min.css">
<script src="./assets/js/select2/select2.full.min.js"></script>


<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />


</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
<!--<body class="hold-transition sidebar-mini layout-fixed">-->
<div class="wrapper">

<!--<nav class="main-header navbar navbar-expand  navbar-primary navbar-light">--> 
<!--<nav class="main-header navbar navbar-expand  bg-lightblue navbar-light">-->
<nav class="main-header navbar navbar-expand  navbar-white navbar-light">   

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>

</ul>

<ul class="navbar-nav ml-auto">


<li class="nav-item">
<a class="nav-link"  href="logout" role="button">

<i class="fas fa-sign-out-alt"></i>Salir
</a>
</li>
</ul>
</nav>

<?php

   include "./views/menu.php";
  

?>

<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">

        <br>

       <?php include "./views/route.php"; ?>
       
        </div>
    </section>
</div>




<footer class="main-footer">
<strong>Copyright &copy; 2024 Todos los derechos reservados.

</footer>





</body>
</html>
