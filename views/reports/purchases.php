<?php

date_default_timezone_set('America/Managua');

$fecha1 = date('y-m-d');
$fecha2 = date('y-m-d');

if (isset($_POST["f1"])) {

  $fecha1 = $_POST["f1"];
  $fecha2 = $_POST["f2"];
}

$result = Model::getBySql("SELECT producto.Fecha as Fecha,
                        proveedor.Nombre as Proveedor,
                        producto.Factura as Factura,
                        producto.Descripcion as Descripcion,
                        producto.Costo as Costo,
                        producto.Iva as Iva
                        FROM proveedor,producto
                        WHERE proveedor.Id=producto.proveedor AND Fecha BETWEEN '{$fecha1}' AND '{$fecha2}'");

$subtotal = 0.00;
$iva = 0.00;
$total = 0.00;

?>

<br>
<section class="content">
  <div class="container-fluid">

    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="m-0 font-weight-bold">Reportes-Compras</h3>
      </div>
      <div class="card-body">
        
      <form action="purchases" method="post">
          
        <div class="row">
            <div id="vencimiento" class="form-group col-md-3">
                <label>Fecha de inicio</label>
                <div class="input-group">
                    <input id="datepicker" name="f1" value="<?php echo $fecha1 ?>">  
                </div>
            </div>    
            <div id="vencimiento" class="form-group col-md-3">
                <label>Fecha final</label>
                <div class="input-group">
                    <input id="datepicker2" name="f2" value="<?php echo $fecha2 ?>">  
                </div>
            </div>
            <div class="col-md-2 ">
                <br>
                <input type="submit" class="btn btn-primary" value="Cargar reporte">
            </div>
        </div>

        </form>
        <br>

        <div class="row">
          <div class="col-md-10">

            <table id="tabla" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Proveedor</th>
                  <th width="20px">No Factura</th>
                  <th>Descripcion</th>
                  <th>Costo</th>
                  <th>Iva</th>
                  <th>Total Unitario</th>
                </tr>

              </thead>
              <tbody id="body">

                <?php
                foreach ($result as $value) {

                  $unitTotal = $value['Costo'] + $value['Iva'];
                  $subtotal = $subtotal + $value['Costo'];
                  $iva = $iva + $value['Iva'];

                  $datetime = new datetime($value['Fecha']);
                  $fecha = $datetime->format('y-m-d');

                  echo "<tr>
                        <td>{$fecha}</td>
                        <td>{$value['Proveedor']}</td>
                        <td>{$value['Factura']}</td>
                        
                       
                        <td>{$value['Descripcion']}</td>
                        <td>{$value['Costo']}</td>
                        <td>{$value['Iva']}</td>
                        <td>{$unitTotal}</td>
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


  

</script>