<?php
if(isset($_GET['f'])){
    $fact=$_GET['f'];
    Model::executeSql("UPDATE factura SET Pagada=1 WHERE Id={$fact}");
}

$result = Model::getBySql("SELECT factura.Id as Id,
                        factura.Fecha as Fecha,
                        cliente.Nombre as Cliente,
                        factura.Vencimiento as Vencimiento,
                        factura.Subtotal as Subtotal,
                        factura.Iva as Iva,
                        factura.Usuario as Usuario
                         FROM cliente,factura
                         WHERE cliente.Id=factura.Cliente AND PAGADA=0");


$subtotal = 0.00;
$iva = 0.00;
$total = 0.00;

?>

<br>
<section class="content">
  <div class="container-fluid">

    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="m-0 font-weight-bold">Reportes-Facturas por cobrar</h3>
      </div>
      <div class="card-body">
        
      
        <div class="row">
          <div class="col-md-10">

            <table id="tabla" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th></th>
                  <th width="20px">No Factura</th>
                  <th>Fecha</th>
                  <th>Cliente</th>
                  <th>Vencimiento</th>
                  <th>Subtotal</th>
                  <th>Iva</th>
                  <th>Total Unitario</th>
                  <th>Vendedor</th>
                </tr>

              </thead>
              <tbody id="body">

                <?php
                foreach ($result as $value) {

                  $unitTotal = $value['Subtotal'] + $value['Iva'];
                  $subtotal = $subtotal + $value['Subtotal'];
                  $iva = $iva + $value['Iva'];

                  $datetime = new datetime($value['Fecha']);
                  $fecha = $datetime->format('y-m-d');

                  $datetime2 = new datetime($value['Vencimiento']);
                  $fecha2 = $datetime2->format('y-m-d');

                  $fecha2<=date('y-m-d') ? $fecha2= "<span class='badge badge-danger'>".$fecha2."</span>" : $fecha2= "<span class='badge badge-success'>".$fecha2."</span>";

                  echo "<tr>
                        <td>
                          <a href='index.php?p=credits&f={$value['Id']}' class='btn bg-lightblue btn-sm'>
                            <i class='fas fa-coin'></i>Pagar
                          </a>
                        </td>
                        <td >{$value['Id']}</td>
                        <td>{$fecha}</td>
                        <td>{$value['Cliente']}</td>
                        <td>{$fecha2}</td>
                        <td>{$value['Subtotal']}</td>
                        <td>{$value['Iva']}</td>
                        <td>{$unitTotal}</td>
                        <td>{$value['Usuario']}</td>
                        
                        </tr>";
                }

                $total = $subtotal + $iva;

                ?>

              </tbody>
            </table>
          </div>

          <div class="col-md-2">
            <table class="table table-striped table-bordered" width="100%">
              <thead>
                <tr>
                  <th>Resumen</th>
                  <th>Cantidad</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <th>Sub total</th>
                  <th><span>C$</span><?= $subtotal ?></th>

                </tr>
                <tr>
                  <th>Iva</th>
                  <th><span>C$</span><?= $iva ?></th>

                </tr>
                <tr>
                  <th>Total</th>
                  <th><span>C$</span><?= $total ?></th>
                </tr>

              </tbody>

            </table>
          </div>



        </div>
</section>





<div class="modal fade" id="modal">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header ">
        <h6 class="modal-title font-weight-bold" id="title">Detalle</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <table class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>Cantidad</th>
              <th>Descripcion</th>
              <th>Precio</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody id="venta">



          </tbody>
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>


    </div>
  </div>
</div>




<script>
  $(document).ready(function() {
    $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yy-mm-dd'
    });

    $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yy-mm-dd'
    });

    $('#tabla').DataTable({
        responsive: true,
        "language": {

          "sProcessing": "Procesando...",
          "sLengthMenu": "Mostrar _MENU_ registros",
          "sZeroRecords": "No se encontraron resultados",
          "sEmptyTable": "Ningún dato disponible en esta tabla",
          "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
          "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
          "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix": "",
          "sSearch": "Buscar:",
          "sUrl": "",
          "sInfoThousands": ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        }

      });


    });


  $('#tabla').on("click", ".ver", function() {
    
    let key = $(this).data('key');
   
    $.ajax({
      url: "./ajax/ajax2.php",
      method: "POST",
      data: {
        "key": key,
        "endpoint": "venta"
      },
      dataType: "json",
      success: function(response) {
       $("#venta").empty();
        $.each(response, function(index, item) {
          
          let t = item.Precio * item.Cantidad
          $("#venta").append(
            `<tr>
              <td>${item.Cantidad}</td>
              <td>${item.Descripcion}</td>
              <td>${item.Precio}</td>
              <td>${t}</td>
            </tr>`
          );
        });
      }

    });

  });
</script>