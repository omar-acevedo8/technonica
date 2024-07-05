<?php

require_once "./controllers/clientcontroller.php";
require_once "./controllers/productcontroller.php";
?>

<br>

<section class="content">
<div class="container-fluid">

  <div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="font-weight-bold">Nueva Factura</h6>
    </div>
    <div class="card-body">

      <div class="row">

        <div class="col-md-4 form-group mb-1">
          <label >Cliente</label>
          <div class="input-group">
        
          <select id="cliente" class="custom-select" id="cliente" >
          <?php
            $values=clientController::All();
            foreach($values as $value){
              echo "<option value={$value['Id']}>{$value['Nombre']}</option>";
            }
          ?>
          </select>
          
          </div>

        </div>

          <div class="form-group col-md-2">
            <label >Tipo de pago</label>
            <select name="tipo" id="tipo" class="form-control">
              <option value="Contado">Contado</option>
              <option value="Credito">Credito</option>
            </select>
          </div>

       

        <div id="vencimiento" class="form-group col-md-2">
           <label>Vencimiento</label>
           <div class="input-group">
            <input id="datepicker" width="276">  
           </div>
        </div>


      </div>

      <input type="hidden" value="<?php echo $_SESSION['nombre']; ?>" id="usuario">
   
    <hr>

    <div class="row">

      <div class="col-md-4 form-group mb-1">
        <label >Seleccione un producto</label>
        <div class="input-group">
        
          <select id="producto" class="custom-select" >
          <?php
            $values=productController::obtenerProductoActivo();
            foreach($values as $value){
              echo "<option value={$value['Id']}>{$value['Descripcion']}</option>";
            }
          ?>
          </select>
          <div class="input-group-append">
            <button id="agregarProducto" class="btn bg-lightblue btn-sm" type="button"><i class="fas fa-plus"></i></button>
          </div>
        </div>
      </div>

    </div>

    <div class="row">

        <div class=" col-md-12">

            <table class="table table-sm table-striped table-bordered" id="tabla">
                <thead>
                    <tr>
                        <th width="100px"></th>
                        <th width="300px">Cantidad</th>
                        <th>Descripcion</th>
                        <th>Precio $</th>
                        <th>Precio C$</th>
                        <th>Total C$</th>
                    </tr>
                </thead>
                <tbody id="detalle">

              </tbody>
            </table>
        </div>
    </div>

    <div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
      <table class="table table-sm table-bordered m-0 ">
        <tr>
          <th>Subtotal</th>
          <td ><input id="subtotal" type="text" class="form-control" value="0.00" readonly></td>
        </tr>
        <tr>
          <th>Iva</th>
          <td><input id="iva" type="text" class="form-control" value="0.00" readonly></td>
        </tr>
        <tr>
          <th>Total</th>
          <td><input id="total" type="text" class="form-control" value="0.00" readonly></td>
        </tr>
        
      </table>
    </div>
    </div>


    </div>
    <div class="card-footer">
      <button class="btn bg-primary" id="guardar"> Guardar</button>
      <a href='invoices' class="btn btn-danger"> Cancelar</a>
    </div>
</div>
    
</div>
</section>

<script src="./views/js/invoice.js"></script>



