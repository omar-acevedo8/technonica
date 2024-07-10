<?php

class invoiceController{

    public static function guardarFactura($maestro,$detalle){

        $result2='';
        $maestro['tipo']=='Contado' ? $vence=date('y-m-d') : $vence=$maestro['vencimiento'];
        $maestro['tipo']=='Contado' ? $pagada=1 : $pagada=0; 

        $data=array(
            "Id"=>$maestro['factura'],
            "Fecha"=>date('y-m-d'),
            "Cliente"=>$maestro['cliente'],
            "Tipo"=>$maestro['tipo'],
            "Vencimiento"=>$vence,
            "Subtotal"=>$maestro['subtotal'],
            "Iva"=>$maestro['iva'],
            "Pagada"=>$pagada,
            "Usuario"=>$maestro['usuario'],
            "Comentario"=>$maestro['comentario']
        );

        if(invoiceModel::guardarFactura($data)=='ok'){

            foreach($detalle as $det){

                $data2=array(
                    "Factura"=>$maestro['factura'],
                    "Producto"=>$det['Producto'],
                    "Descripcion"=>$det['Descripcion'],
                    "Cantidad"=>$det['Cantidad'],
                    "Precio"=>$det['Precio'],
                    "PrecioCordoba"=>$det['PrecioCordoba'],
                );

               $result2= invoiceModel::guardarDetalle($data2);

            }
            return 'ok';
        }
        return $result2;
    }

    public static function obtenerFacturas(){
        return invoiceModel::obtenerFacturas();
    }
}

?>