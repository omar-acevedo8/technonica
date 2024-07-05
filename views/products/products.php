<?php

  require_once "./controllers/productcontroller.php";

?>

<br>
<section class="content">
<div class="container-fluid">

  <div class="card card-primary card-outline">
    <div class="card-header">
      <a class="btn btn-primary " href="addproduct" >Agregar producto</a>
    </div>
    <div class="card-body">

    <table width="100%" id="tabla" class="table table-hover display table-sm table-striped table-bordered">
                  <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>proveedor</th>
                        <th>Serie</th>
                        <th>costo</th>
                        <th>Estado</th>
                        <th></th>
                      </tr>
                  </thead>
                 
              <?php

                  $result=productController::getAll();

                  foreach($result as $key=>$value){
                   
                    $value["Activo"] ? $activo='<span class="badge bg-success">Activo</span>' : $activo='<span class="badge bg-secondary">Inactivo</span>';
                  
                  echo '<tr>
                    <td>'.$value["Descripcion"].'</td>
                    <td>'.$value["Proveedor"].'</td>
                    <td>'.$value["Serie"].'</td>
                    <td>'.$value["Costo"].'</td>
                    <td>'.$activo.'</td>
                    <td>

                          <a class="btn btn-warning btn-sm text-white" href="./index.php?p=editproduct&id='.$value["Id"].'"> 
                             <i class="fas fa-pen"></i>
                          </a>

                       
                           <button class="btn btn-danger btn-sm delete" data-id='.$value["Id"].'> 
                             <i class="fas fa-trash"></i>
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


  $('#tabla').on('click','.delete',function(){

    let eliminar=confirm('Esta seguro desea eliminar este registro');
    let id=$(this).attr("data-id");

    if(eliminar){
      
      $.ajax({

        url: "./ajax/ajax.php",
        method: "POST",
        data: {"id": id, "endpoint" : "eliminarProducto"},
        success: function(response){
          if(response=='ok'){
            window.location.href = "./index.php?p=products";
          }
        }

      });
    }

});

</script>






