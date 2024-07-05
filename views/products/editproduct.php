<?php

require_once "./controllers/productcontroller.php";
require_once "./controllers/providercontroller.php";

if(isset($_POST['id'])){

    $result=productController::update();
    print_r($result);
    //echo '<script>location.href="products"</script>';
}

$proveedores=providerController::All();
$result=productController::find($_GET['id']);

?>


<section class="content">

<div class="card card-outline card-primary">
<div class="card-header">
    <h3 class="card-title font-weight-bold">Modificar producto</h3>


<!--<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
<i class="fas fa-times"></i>
</button>
</div>-->

</div>

<div class="card-body">

    <form action="editproduct" method="post">

    <div class="row">
        <div class="form-group col-md-6">
        
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

       
    </div>
    <div class="row">

        <div class="form-group col-md-6">
            <label>Descripcion</label>
            <input type="text" class="form-control" id="descripcion"  name="descripcion"  value="<?php echo $result['Descripcion']?>" required>
        </div>
        <div class="form-group col-md-3">
          <label>Serie</label>
          <input type="text" class="form-control" id="serie"  name="serie" value="<?php echo $result['Serie']?>">
      </div>
      

    </div>

    <div class="row">
        <div class="form-group col-md-3">
            <label>Factura</label>
            <input type="text" class="form-control" id="factura"  name="factura" value="<?php echo $result['Factura']?>">
        </div>
        <div class="form-group col-md-3">
           <label>Fecha</label>
           <div class="input-group">
            <input id="datepicker" name="fecha" value="<?php echo $result['Fecha'];?>"> 
           </div>
        </div>
        <div class="form-group col-md-3">
            <label>Costo</label>
            <input type="text" class="form-control" id="costo"  name="costo" value="<?php echo $result['Costo'];?>" required>
        </div>
        <div class="form-group col-md-3">
            <label>Iva</label><br>
            <?php if($result['Iva']>0){
                echo '<input class="form-control" type="checkbox" name="iva" checked="true">';
            }
            else{
                echo '<input class="form-control" type="checkbox" name="iva">';
            }?>
            
        </div>
    </div>

    <div class="row">
        
        <div class="form-group col-md-3">
            <label>Precio</label>
            <input type="text" class="form-control" id="precio"  name="precio" value="<?php echo $result['Precio']?>">
        </div>
        
        <div class="form-group col-md-3">
            <label>Gastos</label>
            <input type="text" class="form-control" id="gastos"  name="gastos" value="<?php echo $result['Gastos']?>">
        </div>  

        <div class="form-group col-md-3">
            <label>Activo</label><br>
            <?php if($result['Activo']){
                echo '<input class="form-control" type="checkbox" name="activo" checked="true">';
            }
            else{
                echo '<input class="form-control" type="checkbox" name="activo">';
            }
            ?>
        </div>
        <input type="hidden" name="id" value="<?php echo $result['Id']?>">
    </div>
      
</div>

<div class="card-footer">
    <input type="submit" class="btn btn-primary" value="Guardar">
    <a class="btn btn-danger" href="products">Cancelar</a>


</div>

</form>

</div>

</section>




<script>

$(document).ready(function(){

$('#proveedor').select2({
 theme: 'bootstrap4'
});

$('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
});
});

$("[name='iva']").bootstrapSwitch(
{
    on:'Si',
    off: 'no',
    size: 'md',
    onClass: 'success',
    offClass: 'secondary'
});

$("[name='activo']").bootstrapSwitch(
{
    on:'Si',
    off: 'no',
    size: 'md',
    onClass: 'success',
    offClass: 'secondary'
});


</script>