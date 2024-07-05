 
$(document).ready(function(){

    $('#cliente').select2({
     theme: 'bootstrap4'
    });

    $('#producto').select2({
     theme: 'bootstrap4'
    });

    $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
    });

    $('#vencimiento').hide();

});

function getTotal(){

let total=0;
      $('#tabla tr').each(function(){
          $(this).find('.total').each(function (){
            total=parseFloat(total)+ parseFloat($(this).find('.t').text());
              
          });
     });
     $('#subtotal').val(total.toFixed(2));
     $('#iva').val((total*0.15).toFixed(2));
     $('#total').val((total*1.15).toFixed(2));
}

$("#agregarProducto").on("click",function(){

  let id=$("#producto option:selected").val();

  $.ajax({

      url: "./ajax/ajax.php",
      method: "POST",
      data: {"id": id, "endpoint" : "obtenerProducto"},
      dataType: "json",
      success: function(response){
        
        $("#detalle").append(
              `<tr class="d">
                <td name="boton">
                    <button class="btn btn-danger btn-sm quitar">
                    <i class="fas fa-trash"></i>
                    </button>
                </td>
                <td> 

                    <center>
                    <div class="input-group" style="width:120px">
                        <button class="btn btn-secondary btn-sm restar" type="button">-</button>
                        <input type="text" class="form-control qty" value="1" readonly >  
                        <button class="btn btn-secondary btn-sm sumar" type="button">+</button>
                    </div>
                    </center>

                </td>
                <td class="desc" data-id=${response.Id}>${response.Descripcion}</td>
                <td class="precio">

                    <span>$</span>
                    <span class="pd pred">${response.Precio}<span>

                </td>
                <td name="Precio" class="precio" >

                    <span>C$</span>
                    <span class="p prec">${(response.Precio * 36.62).toFixed(2)}<span>

                </td>
                <td class="total">

                    <span>C$</span>
                    <span class="t">${(response.Precio * 36.62).toFixed(2)}<span>

                </td>
              </tr> `
          );

      getTotal();
      }

  });

});


$('#detalle').on('click','button.quitar',function(){
      $(this).parent().parent().remove();

      getTotal();
});

function setUnitPrice(qty,element){

let price=element.parent().parent().siblings(".precio").find('.p').text();
let tmp=element.parent().parent().siblings(".total");
tmp.find('.t').text((parseFloat(qty)*parseFloat(price)).toFixed(2));

}

$("#detalle").on("click","button.restar",function(){

  let qty=$(this).siblings('.qty').val();
  qty>1 ? qty=qty-1 : qty=1;
  $(this).siblings('.qty').val(qty);

  setUnitPrice(qty,$(this).parent());

  getTotal();
});

$("#detalle").on("click","button.sumar",function(){

  let qty=$(this).siblings('.qty').val();
  qty=parseInt(qty)+1;  
  $(this).siblings('.qty').val(qty);

  setUnitPrice(parseFloat(qty),$(this).parent());

  getTotal();
});



$('#tipo').change(function(){

    if($('#tipo option:selected').val()=='Contado'){
      $('#vencimiento').hide();
    } 
    else{
      $('#vencimiento').show();
    }

});


$("#guardar").click(function(){

  let master=[];
  let detail=[];

  let factura;
  let cambio;
  let tipo;
  let vencimiento;
  let cliente;
  let subtotal;
  let iva;
  let total;
  let usuario;

  $.ajax({
    url: "./ajax/ajax.php",
    method: "POST",
    data: {"endpoint": "consecutivoFactura"},
    dataType: "json",
    success: function(response){

          factura=response.Factura;
          cambio=response.TipoCambio;

          cliente=$('#cliente option:selected').val();
          subtotal=$('#subtotal').val();
          iva=$('#iva').val();
          total=$('#total').val();
          pagada=true;

          var tmp=new Date();
          var fecha=tmp.getFullYear()+'-'+(tmp.getMonth()+1)+'-'+tmp.getDate();
          vencimiento=fecha;
          tipo=$('#tipo option:selected').val();
          if(tipo=="Credito"){
            vencimiento=$("#datepicker").val();
            pagada=false;
          }
          
          usuario=$('#usuario').val();

          master.push({
            "factura":factura,
            "cliente":cliente,
            "tipo": tipo,
            "vencimiento":vencimiento,
            "subtotal":subtotal,
            "iva":iva,
            "pagada": pagada,
            "usuario": usuario
          });

          let tr=$('#tabla tr.d');
          tr.each(function(){
            qty=$(this).find('.qty').val();
            pid=$(this).find('.desc').attr('data-id');
            desc=$(this).find('.desc').text();
            pred=$(this).find('.pred').text();
            prec=$(this).find('.prec').text()
            
            detail.push({     
                "Producto": pid,
                "Descripcion": desc,
                "Cantidad": qty,
                "Precio": pred,
                "PrecioCordoba": prec
            });
          });
          console.log(master);
          $.ajax({
            url: "./ajax/ajax2.php",
            method: "POST",
            data: {"master": JSON.stringify(master),"detail":JSON.stringify(detail),"endpoint":"guardarFactura"},
            success: function(response){
                console.log(response);
                 //var url = "./views/invoices/invoicepdf.php";
                 //window.open(url,'_blank');
    
                setTimeout(function() {
                   window.location.href = "./index.php?p=invoices";
                 }, 1000); 
    
            }
        });
    

           
         


        }
  });

});
