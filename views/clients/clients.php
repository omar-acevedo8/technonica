<?php

  require_once "./controllers/clientcontroller.php";


  if(isset($_POST["action"]) && $_POST["action"]=="nuevo"){
    clientController::create();
  }

  if(isset($_POST["action"]) && $_POST["action"]=="edit"){
    clientController::edit();
  }

?>

<br>
<section class="content">
<div class="container-fluid">

  <div class="card card-lightblue card-outline">
    <div class="card-header">
      <h6 class="m-0 font-weight-bold">Lista de clientes <button class="btn bg-lightblue" id="add" data-toggle="modal" data-target="#modal">Agregar</button></h6>
    </div>
    <div class="card-body">

    <table width="100%" id="tabla" class="table table-hover display table-sm table-striped table-bordered">
                  <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Ruc</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th></th>
                      </tr>
                  </thead>
                
              <?php

                  $result=clientController::All();

                  foreach($result as $key=>$value){
                    
                    echo '<tr>
                    <td>'.$value["Nombre"].'</td>
                    <td>'.$value["Ruc"].'</td>
                    <td>'.$value["Direccion"].'</td>
                    <td>'.$value["Telefono"].'</td>
                    <td>
                        
                      <button id="edit" class="btn btn-primary" data-toggle="modal" data-target="#modal" key='.$value["Id"].'> 
                          <i class="fas fa-pen"></i>
                      </button>
                          
                    </td>
                    </tr>';
                  }
              ?>
              </table>



    </div>
  </div>


</div>
</section>




<div class="modal fade" id="modal">
<div class="modal-dialog ">
<div class="modal-content">
<div class="modal-header ">
<h6 class="modal-title font-weight-bold" id="title"></h6>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
      <div class="modal-body">
        

      <form role="form" method="post" action="clients">

      <div class="row">
      <div class="form-group col-7">
          <label>Nombre</label>
          <input type="text" class="form-control" id="nombre"  name="nombre" required>
      </div>

      <div class="form-group col-5">
          <label>RUC</label>
          <input type="text" class="form-control" id="ruc"  name="ruc" >
      </div>
      </div>

      <div class="row">
      <div class="form-group col-12">
          <label>Direccion</label>
          <input type="text" class="form-control" id="direccion"  name="direccion" >
      </div>
      </div>

      <div class="row">
      <div class="form-group col-3">
          <label>Telefono</label>
          <input type="text" class="form-control" id="telefono"  name="telefono" >
      </div>
      <div class="form-group col-4">
          <label>Contacto</label>
          <input type="text" class="form-control" id="contacto"  name="contacto" >
      </div>
      <div class="form-group col-5">
          <label>Correo</label>
          <input type="text" class="form-control" id="correo"  name="correo" >
      </div>
      </div>

      <input type="hidden" id="id" name="id">
      <input type="hidden" id="action" name="action">


      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Guardar">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>

      </form>
    </div>
  </div>
</div>


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

$("#add").on("click", function(){

    $("#title").text("Agregar Cliente");

    $("#nombre").val(" ");
    $("#ruc").val(" ");
    $("#direccion").val(" ");
    $("#telefono").val(" ");
    $("#contacto").val(" ");
    $("#correo").val(" ");

    $("#action").val("nuevo");

});


$("#tabla").on("click","#edit", function(){

  $("#title").text("Modificar Cliente");

  let key=$(this).attr('key');

  $.ajax({

    url: "./ajax/ajax.php",
    method:"POST",
    data:{"id" : key,"endpoint": "client"},
    dataType: "json",
    success: function(response){
            
         $("#nombre").val(response.Nombre);
         $("#ruc").val(response.Ruc);
         $("#direccion").val(response.Direccion);
         $("#telefono").val(response.Telefono);
         $("#contacto").val(response.Contacto);
         $("#correo").val(response.Correo);

         $("#id").val(response.Id);
         $("#action").val("edit");
     }
    
    });
  
   

});


</script>