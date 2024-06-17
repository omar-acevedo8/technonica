<?php

  require_once "./controllers/usercontroller.php";

?>

<br>
<section class="content">
<div class="container-fluid">

  <div class="card card-lightblue card-outline">
    <div class="card-header">
      <h6 class="m-0 font-weight-bold">LISTA DE USUARIOS <a class="btn bg-lightblue" href="adduser" >Agregar usuario</a></h6>
    </div>
    <div class="card-body">

    <table width="100%" id="tabla" class="table table-hover display table-sm table-striped table-bordered">
                  <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                      </tr>
                  </thead>
                
                
              <?php

                  $users=userController::All();

                  foreach($users as $user=>$value){
                    
                    echo '<tr>
                    <td>'.$value["Nombre"].'</td>
                    <td>'.$value["Mostrar"].'</td>
                    <td>'.$value["Rol"].'</td>
                    <td>
                        <form action="edituser" method="post">
                          <input type="hidden" name="id" value='.$value["Id"].'/>
                          <button type="submit" class="btn btn-primary"> 
                          <i class="fas fa-pen"></i>
                          </button>
                          </form>
                    </td>
                    </tr>';
                  }
              ?>
              </table>



    </div>
  </div>


</div>
</section>

<script>

$(document).ready(function(){

$('#tabla').DataTable({
    responsive: true,
    "language": {

        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
        },
        "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }}
});

});

</script>






