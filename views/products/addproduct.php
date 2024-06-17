<?php

require_once "./controllers/productcontroller.php";
require_once "./controllers/providercontroller.php";

$proveedores=providerController::All();

if(isset($_POST['descripcion'])){

    productController::create();
    echo '<script>location.href="products"</script>';
}

?>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Agregar producto</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Inicio</a></li>
<li class="breadcrumb-item active">Agregar producto</li>
</ol>
</div>
</div>
</div>
</section>


<section class="content">

<div class="card card-outline card-lightblue">
<!--<div class="card-header">
<h3 class="card-title"></h3>


<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
<i class="fas fa-times"></i>
</button>
</div>

</div>
-->
<div class="card-body">

    <form action="addproduct" method="post">
    <div class="row">
        <div class="form-group col-6">
        
                <label >Proveedor</label>
                <select id='proveedor' name='proveedor' class='form-control'>
                <?php

                    foreach($proveedores as $pro){
                        echo "<option value={$pro['Id']}>{$pro['Nombre']}</option>";
                    }
                ?>
                </select>
       
        </div>
        <div class="form-group col-3">
            <label>Factura</label>
            <input type="text" class="form-control" id="factura"  name="factura">
        </div>

        <div class="form-group col-3">
           <label>Fecha</label>
           <div class="input-group">
           <input id="datepicker" width="276" /> 
           </div>
        </div>


       
    </div>
    <div class="row">

        <div class="form-group col-6">
            <label>Descripcion</label>
            <input type="text" class="form-control" id="descripcion"  name="descripcion" required>
        </div>
        <div class="form-group col-3">
          <label>Serie</label>
          <input type="text" class="form-control" id="serie"  name="serie" >
      </div>
      <div class="form-group col-3">
            <label>Costo</label>
            <input type="text" class="form-control" id="costo"  name="costo">
        </div>

    </div>

    <div class="row">
        
        <div class="form-group col-3">
            <label>Precio</label>
            <input type="text" class="form-control" id="precio"  name="precio">
        </div>
        <div class="form-group col-3">
          <label>Iva</label>
          <input type="text" class="form-control" id="iva"  name="iva">
      </div>
        <div class="form-group col-3">
            <label>Gastos</label>
            <input type="text" class="form-control" id="gastos"  name="gastos">
        </div>  
       
    </div>
      
</div>

<div class="card-footer">
<input type="submit" class="btn bg-lightblue" value="Guardar">
<a class="btn btn-secondary" href="products">Cancelar</a>

</form>
</div>

</div>

</section>

<script>
  

$(document).ready(function(){

    $('#proveedor').select2({
     theme: 'bootstrap4'
    });

    $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
    });
});
</script>