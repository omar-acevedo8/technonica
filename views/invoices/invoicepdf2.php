<?php

//$imagen64="

require "../../env.php";
require "../../helpers/model.php";

       
        $f=$_GET['f'];
        $factura=Model::getBySqlFirst("SELECT cliente.Nombre as Cliente,
                                              cliente.Ruc as Ruc,
                                              cliente.Telefono as Telefono,
                                              DATE_FORMAT(factura.Fecha, '%Y/%m/%d') as Fecha,
                                              factura.Subtotal as Subtotal,
                                              factura.Iva as Iva,
                                              factura.Comentario as Comentario,
                                              TRUNCATE((factura.Subtotal + factura.Iva),2) as Total
                                              FROM factura,cliente
                                              WHERE cliente.Id=factura.Cliente AND factura.Id={$f}");

        $detalle=Model::getBySql("SELECT Descripcion,Cantidad,Precio
                                FROM facturaproducto
                                WHERE factura={$f}");

      $comentario=$factura['Comentario'];
      $moneda="<span>$<span>";

      
ob_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>factura</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
</head>

<style>
   .tbl-border td{
        border:none;
    }
</style>
<body>

    <div style="height:95px;"></div>

    <table  class="table tbl-border table-sm mb-4">
        <tr>
            <td style="text-align:right"></td>
            <td width="30px"><?=date('d',strtotime($factura['Fecha']))?></td>
            <td style="text-align:center"width="60px"><?=date('m',strtotime($factura['Fecha']))?></td>
            <td style="text-align:right"width="30px"><?=date('Y',strtotime($factura['Fecha']))?></td>
        </tr>
    </table>

    <table  class="table tbl-border table-sm ">
        
        <tr>
            <td style="text-align:right; width:100px;" valign="bottom"></td>
            <td colspan="3"><?= $factura['Cliente']?></td>
        </tr>
        <tr>
            <td style="text-align:right; width:120px;"></td>
            <td><?= $factura['Ruc']?></td>
            <td style="width:100px;"></td>
            <td style="width:130px;"><?= $factura['Telefono']?></td>
        </tr>
        <tr>
            <td style="text-align:right; width:100px;"></td>
            <td colspan="3" style="color:white;">Barrio 11 de mayo</td>
        </tr>
    </table>
     
    <!--<table class="table table-bordered table-sm" width="100%">-->
    <table  class="table tbl-border table-sm" width="100%">
        <thead>
            <tr>
                <td style="width:65px"></td>
                <td style="width:50px; color:white">Cant.</td>
                <td style="color:white">Descripcion</td>
                <td style="width:100px; text-align:right; color:white">Precio</td>
                <td style="width:100px; text-align:right; color:white">sub total</td>
            </tr>
        </thead>
       
        <tbody>
            
            <?php

                $totalLines=count($detalle);

                foreach($detalle as $det){

                    $totalUnitario=number_format($det['Cantidad']*$det['Precio'],2);

                    echo "<tr>
                        <td></td>
                        <td >{$det['Cantidad']}</td>
                        <td>{$det['Descripcion']}</td>
                        <td style='width:100px; text-align:right'>{$moneda} {$det['Precio']}</td>
                        <td style='width:100px; text-align:right'>{$moneda} {$totalUnitario}</td>
                        </tr>";
                }
                for($var=$totalLines; $var<10;$var++){
                    echo "<tr>
                        <td style='color:white;'>1</td>
                        <td ></td>
                        <td></td>
                        <td style='width:100px; text-align:right'></td>
                        <td style='width:100px; text-align:right'></td>
                        </tr>";
                    }
                   
                   
                    $line1 = substr($comentario, 0, 39);
                    $line2 = substr($comentario, 39, 39);
                    $line3 = substr($comentario, 78, 39);


                       $l=htmlspecialchars($line1);
                        echo "<tr>
                            <td></td>
                            <td style='color:white;'></td>
                            <td>{$l}</td>
                            <td style='width:100px; text-align:right'></td>
                            <td style='width:100px; text-align:right'></td>
                            </tr>"; 
                            $l=htmlspecialchars($line2);
                        echo "<tr>
                            <td></td>
                            <td style='color:white;'></td>
                            <td>{$l}</td>
                            <td style='width:100px; text-align:right'></td>
                            <td style='width:100px; text-align:right'></td>
                            </tr>";   
                            $l=htmlspecialchars($line3);
                        echo "<tr>
                            <td></td>
                            <td style='color:white;'></td>
                            <td>{$l}</td>
                            <td style='width:100px; text-align:right'></td>
                            <td style='width:100px; text-align:right'></td>
                            </tr>";     

                        
                


                   /* echo "<tr>
                    <td></td>
                    <td style='color:white;'></td>
                    <td>{$comentario}</td>
                    <td style='width:100px; text-align:right'></td>
                    <td style='width:100px; text-align:right'></td>
                    </tr>"; */  
                    /*echo "<tr>
                    <td></td>
                    <td style='color:white;'></td>
                    <td>{$text}</td>
                    <td style='width:100px; text-align:right'></td>
                    <td style='width:100px; text-align:right'></td>
                    </tr>"; 
                    echo "<tr>
                    <td></td>
                    <td style='color:white;'></td>
                    <td>{$text}</td>
                    <td style='width:100px; text-align:right'></td>
                    <td style='width:100px; text-align:right'></td>
                    </tr>"; */
                    
             ?>          
            
            ?>
          <!--  <tr>
                <td></td>
                <td>Cant.</td>
                <td>Descripcion</td>
                <td style="width:100px; text-align:right">Precio</td>
                <td style="width:100px; text-align:right">sub total</td>
            </tr>
            <tr>
                <td></td>
                <td>Cant.</td>
                <td>Descripcion</td>
                <td style="width:100px; text-align:right">Precio</td>
                <td style="width:100px; text-align:right">sub total</td>
            </tr>
            <tr>
                <td></td>
                <td>Cant.</td>
                <td>Descripcion</td>
                <td style="width:100px; text-align:right">Precio</td>
                <td style="width:100px; text-align:right">sub total</td>
            </tr>
            <tr>
                <td></td>
                <td>Cant.</td>
                <td>Descripcion</td>
                <td style="width:100px; text-align:right">Precio</td>
                <td style="width:100px; text-align:right">sub total</td>
            </tr>
            <tr>
                <td></td>
                <td>Cant.</td>
                <td>Descripcion</td>
                <td style="width:100px; text-align:right">Precio</td>
                <td style="width:100px; text-align:right">sub total</td>
            </tr>
            <tr>
                <td></td>
                <td>Cant.</td>
                <td>Descripcion</td>
                <td style="width:100px; text-align:right">Precio</td>
                <td style="width:100px; text-align:right">sub total</td>
            </tr>
            <tr>
                <td></td>
                <td>Cant.</td>
                <td>Descripcion</td>
                <td style="width:100px; text-align:right">Precio</td>
                <td style="width:100px; text-align:right">sub total</td>
            </tr>
            <tr>
                <td></td>
                <td>Cant.</td>
                <td>Descripcion</td>
                <td style="width:100px; text-align:right">Precio</td>
                <td style="width:100px; text-align:right">sub total</td>
            </tr>
            <tr>
                <td></td>
                <td>Cant.</td>
                <td>Descripcion</td>
                <td style="width:100px; text-align:right">Precio</td>
                <td style="width:100px; text-align:right">sub total</td>
            </tr>
            <tr>
                <td></td>
                <td>Cant.</td>
                <td>Descripcion</td>
                <td style="width:100px; text-align:right">Precio</td>
                <td style="width:100px; text-align:right">sub total</td>
            </tr>
            <tr>
                <td></td>
                <td>Cant.</td>
                <td>Descripcion</td>
                <td style="width:100px; text-align:right">Precio</td>
                <td style="width:100px; text-align:right">sub total</td>
            </tr> 
            <tr>
                <td></td>
                <td>Cant.</td>
                <td>Descripcion</td>
                <td style="width:100px; text-align:right">Precio</td>
                <td style="width:100px; text-align:right">sub total</td>
            </tr>  -->              
        </tbody>
    </table>
    
    <div style="height:70px; " class="mb-2"></div>

    <table  class="table tbl-border table-sm ">
        <tr>
            <td style="text-align:right"></td>
            <td width="100px" style="text-align:right"><span>$</span><span> <?= number_format($factura['Subtotal']/36.62,2)?></span></td>
        </tr>
        <tr>
        <td style="text-align:right"></td>
            <td width="100px" style="text-align:right"><span>$</span><span> <?= number_format($factura['Iva']/36.62,2)?></span></td>
        </tr>
        <tr>
        <td style="text-align:right"></td>
            <td width="100px" style="text-align:right"><span>$</span><span> <?=number_format($factura['Total']/36.62,2)?></span></td>
        </tr>
    </table>

      

    
</body>
</html>



<?php

$html=ob_get_clean();

require_once("../../libs/dompdf/autoload.inc.php");

use Dompdf\Dompdf;



$dompdf=new DomPdf();

$options=$dompdf->getOptions();
$options->set('isRemoteEnabled',true);



$dompdf->loadHtml($html);

$height=250;//mm
$width=78;//mm
//$paper_format=array(0,0,($width/25.4)*72,($height/25.4)*72);//ticket
$paper_format='letter';
$type="portrait";//vertical
//$type="landscape";//horizontal

//$dompdf->setPaper($paper_format,$type);
$dompdf->setPaper($paper_format);
$dompdf->render();
$dompdf->stream("quote",array('Attachment'=>0));

?>

