
<?php
    require_once "./models/invoicemodel.php";
    require_once "./controllers/invoicecontroller.php";

    $values=invoiceController::obtenerFacturas();
?>

<br>
<section class="content">
<div class="container-fluid">

  <div class="card card-primary card-outline">
    <div class="card-header">
      <a class="btn btn-primary" href="addinvoice" >Nueva factura</a>
    </div>
    <div class="card-body">

    <table width="100%" id="tabla" class="table table-hover display table-sm table-striped table-bordered">
                  <thead>
                    <tr>
                        <th>Factura</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Subtotal</th>
                        <th>Iva</th>
                        <th>Total</th>
                        <th></th>
                      </tr>
                  </thead>
                    <tbody>

                  <?php

                  foreach($values as $value){
                    echo "<tr>
                            <td>{$value['Factura']}</td>
                            <td>{$value['Fecha']}</td>
                            <td>{$value['Cliente']}</td>
                            <td>{$value['SubTotal']}</td>
                            <td>{$value['Iva']}</td>
                            <td>{$value['Total']}</td>
                            <th>
                            <center>
                                <button class='btn btn-danger btn-sm'>Anular</button>
                            </center>
                            </th>
                          </tr>";
                    }
                    ?>
                    </tbody>
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