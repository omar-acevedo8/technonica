<br>
<section class="content">
<div class="container-fluid">

  <div class="card card-lightblue card-outline">
    <div class="card-header">
      <a class="btn bg-lightblue" href="addinvoice" >Nueva factura</a>
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