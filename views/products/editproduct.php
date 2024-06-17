<?php

require_once "./controllers/productcontroller.php";
require_once "./controllers/providercontroller.php";

$proveedores=providerController::All();

if(isset($_POST['key'])){

    productController::update();
    echo '<script>location.href="products"</script>';
}

$result=productController::find($_POST['id']);

?>


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Modificar producto</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Inicio</a></li>
<li class="breadcrumb-item active">Modificar producto</li>
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

    <form action="editproduct" method="post">
    <div class="row">
        <div class="form-group col-6">
        
                <label >Proveedor</label>
                <select id='proveedor' name='proveedor' class='form-control'>
                <?php

                    foreach($proveedores as $pro){
                        if($pro['Id']==$result['Proveedor']){
                            echo "<option value={$pro['Id']} selected>{$pro['Nombre']}</option>";
                        }else{
                            echo "<option value={$pro['Id']}>{$pro['Nombre']}</option>";
                        }
                    }
                ?>
                </select>
       
        </div>
        <div class="form-group col-3">
            <label>Factura</label>
            <input type="text" class="form-control" id="factura"  name="factura" value="<?php echo $result['Factura']?>">
        </div>
        
        <div class="form-group col-3">
           <label>Fecha</label>
           <div class="input-group">
           <input id="datepicker" width="276"  value="<?php echo $result['Fecha']?>"/> 
           </div>
        </div>


    </div>
    <div class="row">

        <div class="form-group col-6">
            <label>Descripcion</label>
            <input type="text" class="form-control" id="descripcion"  name="descripcion" required value="<?php echo $result['Descripcion']?>">
        </div>
        <div class="form-group col-3">
          <label>Serie</label>
          <input type="text" class="form-control" id="serie"  name="serie" value="<?php echo $result['Serie']?>">
      </div>
      <div class="form-group col-3">
            <label>Costo</label>
            <input type="text" class="form-control" id="costo"  name="costo" value="<?php echo $result['Costo']?>">
        </div>

    </div>

    <div class="row">
        
        <div class="form-group col-3">
            <label>Precio</label>
            <input type="text" class="form-control" id="precio"  name="precio" value="<?php echo $result['Precio']?>">
        </div>
        <div class="form-group col-3">
          <label>Iva</label>
          <input type="text" class="form-control" id="iva"  name="iva" value="<?php echo $result['Iva']?>">
      </div>
        <div class="form-group col-3">
            <label>Gastos</label>
            <input type="text" class="form-control" id="gastos"  name="gastos" value="<?php echo $result['Gastos']?>">
        </div>  

        <input type="hidden" id="key" name="key" value="<?php echo $result['Id']?>">
       
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