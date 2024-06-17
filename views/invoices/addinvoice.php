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
                        <th>Precio</th>
                        <th>Total</th>
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

    $("#cliente").append(
      ` <option selected>Eventual</option>
            <option value="1">Omar Acevedo</option>
            <option value="2">Arelys Corea</option>`
    );

});

function getTotal(){

let total=0;
      $('#tabla tr').each(function(){
          $(this).find('.total').each(function (){
              total=total+ parseFloat($(this).find('.t').text());
          });
     });
     $('#subtotal').val(total.toFixed(2));
     $('#iva').val((total*0.15).toFixed(2));
     $('#total').val((total*1.15).toFixed(2));
}

$("#agregarProducto").on("click",function(){

$("#detalle").append(
   `<tr>
    <td name="boton">
      <button class="btn btn-danger btn-sm quitar">
        <i class="fas fa-trash"></i>
      </button>
    </td>
    <td name="Cantidad">

        <div class="input-group m-0">
          <div class="input-group-prepend">
            <button class="btn btn-secondary btn-sm restar" type="button">-</button>
            <input type="text" class="form-control qty" value="1" readonly>  
          </div>
          <button class="btn btn-secondary btn-sm sumar" type="button">+</button>
        </div>

    </td>
    <td name="Descripcion" >Computadora de escritorio</td>
    <td name="Precio" class="precio"><span>$</span><span class="p">550<span></td>
    <td name="Total" class="total"><span>$</span><span class="t">550<span></td>
    </tr> `
);

getTotal();

});


$('#detalle').on('click','button.quitar',function(){
      $(this).parent().parent().remove();

      getTotal();
});

function setUnitPrice(qty,element){

let price=element.parent().parent().siblings(".precio").find('.p').text();
let tmp=element.parent().parent().siblings(".total");
tmp.find('.t').text(parseFloat(qty)*parseFloat(price));

}

$("#detalle").on("click","button.restar",function(){

  let qty=$(this).siblings('.qty').val();
  qty>1 ? qty=qty-1 : qty=1;
  $(this).siblings('.qty').val(qty);

  setUnitPrice(qty,$(this).parent());

  getTotal();
});

$("#detalle").on("click","button.sumar",function(){

  let qty=$(this).siblings().find('.qty').val();
  qty=parseInt(qty)+1;  
  $(this).siblings().find('.qty').val(qty);

  setUnitPrice(qty,$(this));

  getTotal();
});

</script>



