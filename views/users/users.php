<?php

  require_once "./controllers/usercontroller.php";

  if(isset($_POST["action"]) && $_POST["action"]=="nuevo"){
    userController::create();
   
  }

  if(isset($_POST["action"]) && $_POST["action"]=="edit"){
   userController::edit();
   
  }

?>

<br>
<section class="content">
<div class="container-fluid">

  <div class="card card-primary card-outline">
    <div class="card-header">

    <!--<div class="card-tools">
    <a class="btn btn-primary" href="adduser" >Agregar usuario</a>
    </div>

      <h5 class="m-0 font-weight-bold">Usuarios </h5>-->

      <a class="btn btn-primary" href="adduser" id="add" data-toggle="modal" data-target="#modal">Agregar usuario</a>
      
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

                  $result=userController::All();

                  foreach($result as $key=>$value){
                    
                    echo '<tr>
                    <td>'.$value["Nombre"].'</td>
                    <td>'.$value["Mostrar"].'</td>
                    <td>'.$value["Rol"].'</td>
                    <td>
                      <center>
                          <button id="edit" class="btn btn-warning text-white btn-sm" data-toggle="modal" data-target="#modal" key='.$value["Id"].'> 
                            <i class="fas fa-pen"></i>
                          </button>
                           <button class="btn btn-danger btn-sm delete" data-id='.$value["Id"].'> 
                            <i class="fas fa-trash"></i>
                          </button>
                      </center>
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
        

        <form role="form" method="post" action="users">

        <div class="row">
            <div class="form-group col-12">
              <label>Usuario</label>
              <input type="text" class="form-control" id="usuario"  name="usuario" required>
            </div>

            <div class="form-group col-12">
              <label>Nombre</label>
              <input type="text" class="form-control" id="nombre"  name="nombre" required>
            </div>

            

            <div class="form-group col-12">
              <label>Contraseña</label>
              <input type="password" class="form-control" id="password"  name="password" required>
            </div>

            <div class="form-group col-12">
                  <label for="rolLabelAdd">Rol</label>
                  <select id="rol" name="rol" class="form-control">
                      <option value="Vendedor">Vendedor</option>
                      <option value="Administrador">Administrador</option>
                  </select>
              </div>


        </div>
     
      <input type="hidden" id="id" name="id">
      <input type="hidden" id="action" name="action">


      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Guardar">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
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

$("#title").text("Agregar Usuario");

$("#usuario").val(" ");
$("#nombre").val(" ");
$("#password").val("");

$("#action").val("nuevo");

});



$("#tabla").on("click","#edit", function(){

  $("#title").text("Modificar usuario");

  let key=$(this).attr('key');

    $.ajax({

      url: "./ajax/ajax.php",
      method:"POST",
      data:{"id" : key,"endpoint": "user"},
      dataType: "json",
      success: function(response){
            
        $("#usuario").val(response.Nombre);
        $("#nombre").val(response.Mostrar);
        $("#password").val(response.Clave);

        $("#rol option:selected").text(response.Rol);
          
          $("#id").val(response.Id);
          $("#action").val("edit");
      }
      
      });
    });


  $('#tabla').on('click','.delete',function(){

    let eliminar=confirm('Esta seguro desea eliminar este registro');
    let id=$(this).attr("data-id");

    if(eliminar){
      
      $.ajax({

        url: "./ajax/ajax.php",
        method: "POST",
        data: {"id": id, "endpoint" : "eliminarUsuario"},
        success: function(response){
          if(response=='ok'){
            window.location.href = "./index.php?p=users";
          }
        }

      });
    }

  });

</script>






