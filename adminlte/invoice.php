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
            <option selected>Eventual</option>
            <option value="1">Omar Acevedo</option>
            <option value="2">Arelys Corea</option>
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

       

        <div class="form-group col-md-2">
           <label>Vencimiento</label>
           <div class="input-group">
            <input id="datepicker" width="276" />  
           </div>
        </div>


      </div>
   
    <hr>

    <div class="row">

      <div class="col-md-4 form-group mb-1">
        <label >Seleccione un producto</label>
        <div class="input-group">
        
          <select id="producto" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
            <option selected>Computadora de escritorio</option>
            <option value="1">Laptop</option>
            <option value="2">Impresora/option>
          </select>
          <div class="input-group-append">
            <button class="btn bg-lightblue btn-sm" type="button"><i class="fas fa-plus"></i></button>
          </div>
        </div>
      </div>

    </div>
    

    <div class="row">

        <div class=" col-md-12">

            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="100px"></th>
                        <th width="300px">Cantidad</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></td>
                        <td>

                            <div class="input-group m-0">
                              <div class="input-group-prepend">
                                <button class="btn btn-secondary btn-sm" type="button">-</button>
                                <input type="text" class="form-control" value="0" >  
                              </div>
                              <button class="btn btn-secondary btn-sm" type="button">+</button>
                            </div>

                        </td>
                        <td>Computadora de escritorio</td>
                        <td>$550</td>
                        <td>$550</td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></td>
                        <td>

                            <div class="input-group m-0">
                              <div class="input-group-prepend">
                                <button class="btn btn-secondary btn-sm" type="button">-</button>
                                <input type="text" class="form-control" value="0" >  
                              </div>
                              <button class="btn btn-secondary btn-sm" type="button">+</button>
                            </div>

                        </td>
                        <td>Computadora de escritorio</td>
                        <td>$550</td>
                        <td>$550</td>
                    </tr>
                    
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
          <td ><input type="text" class="form-control" value="0.00" readonly></td>
        </tr>
        <tr>
          <th>Iva</th>
          <td><input type="text" class="form-control" value="0.00" readonly></td>
        </tr>
        <tr>
          <th>Total</th>
          <td><input type="text" class="form-control" value="0.00" readonly></td>
        </tr>
        
      </table>
    </div>
    </div>


    </div>
    <div class="card-footer">
      <button class="btn bg-primary"> Guardar</button>
      <button class="btn btn-secondary"> Cancelar</button>
    </div>
</div>
    
</div>
</section>

<script>
 
$(document).ready(function(){

    $('#cliente').select2({
     theme: 'bootstrap4'
    });

    $('#producto').select2({
     theme: 'bootstrap4'
    });

    $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
});

</script>





<!--
<br>
<section class="content">
  <div class="container-fluid">

    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="font-weight-bold">titulo</h5>
      </div>
      <div class="card-body">
 


    </div>
    <div class="card-footer">
      <p></p>
    </div>
</div>
    
</div>
</section>


 <div class="form-group col-6">
            <label>Descripcion</label>
            <input type="text" class="form-control" id="descripcion"  name="descripcion" required>
        </div>




-->


