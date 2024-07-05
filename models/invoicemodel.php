<?php
class invoiceModel{

    public static function guardarFactura($data){

        $sql="INSERT INTO factura (
            Id,
            Fecha,
            Cliente,
            Tipo,
            Vencimiento,
            Subtotal,
            Iva,
            Pagada,
            Usuario
            ) VALUES (?,?,?,?,?,?,?,{$data['Pagada']},?)";
        
        unset($data['Pagada']);

        $cn=Connection::connect();
        $stmt=$cn->prepare($sql);

        if($stmt -> execute(array_values($data))){ 
            return 'ok';
        }
        else{
            return $cn->errorInfo();
        }
    }


    public static function guardarDetalle($data){
        $sql="INSERT INTO facturaproducto (
            Factura,
            Producto,
            Descripcion,
            Cantidad,
            Precio,
            PrecioCordoba
            ) VALUES (?,?,?,?,?,?)";

        $cn=Connection::connect();
        $stmt=$cn->prepare($sql);

        if($stmt -> execute(array_values($data))){ 
            return 'ok';
        }
        else{
            return $cn->errorInfo();
        }

    }


    public static function obtenerFacturas(){

        $sql="SELECT
            factura.Id as Factura,
            DATE_FORMAT(factura.Fecha, '%d/%m/%Y') as Fecha,
            cliente.Nombre as Cliente,
            factura.Subtotal as SubTotal,
            factura.Iva as Iva,
            TRUNCATE((factura.Subtotal + factura.Iva),2) as Total
         FROM factura,cliente
         WHERE cliente.Id=factura.Cliente
         ORDER BY factura.Id DESC";

        $stmt=Connection::connect()->prepare($sql);
        $stmt -> execute();

        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
}

?>