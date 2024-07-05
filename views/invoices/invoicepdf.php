<?php

//$imagen64="


//$master=json_decode($_GET["json1"],true)[0];
//$detail=json_decode($_GET["json2"],true);

require "../../env.php";
require "../../helpers/model.php";

        //$result=Model::getBySql("SELECT max(Id) as orden FROM orden WHERE mesa=".$master['Mesa']);
        //$order=$result[0]['orden'];

       $data=[]; 
        for($var=0; $var<10;$var++){
            $row=array($var,"descripcion".$var,"10,253","20,254");
            array_push($data,$row);
        }
       
        $text="No de serie 500253-252521,500253-252521";

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

    <table class="table tbl-border table-sm mb-4">
        <tr>
            <td style="text-align:right"></td>
            <td width="30px">24 </td>
            <td style="text-align:center"width="60px">06</td>
            <td style="text-align:right"width="30px">24</td>
        </tr>
    </table>

    <table class="table tbl-border table-sm ">
        
        <tr>
            <td style="text-align:right; width:100px;" valign="bottom"></td>
            <td colspan="3">Omar Acevedo</td>
        </tr>
        <tr>
            <td style="text-align:right; width:120px;"></td>
            <td>001-080386-0008V</td>
            <td style="width:100px;"></td>
            <td style="width:130px;">2289-4965</td>
        </tr>
        <tr>
            <td style="text-align:right; width:100px;"></td>
            <td colspan="3" style="color:white;">Barrio 11 de mayo</td>
        </tr>
    </table>
     
    <!--<table class="table table-bordered table-sm" width="100%">-->
    <table class="table tbl-border table-sm" width="100%">
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
                for($var=0; $var<=12;$var++){
                    if($var <10){

                    echo "<tr>
                        <td></td>
                        <td >{$data[$var][0]}</td>
                        <td>{$data[$var][1]}</td>
                        <td style='width:100px; text-align:right'>{$data[$var][2]}</td>
                        <td style='width:100px; text-align:right'>{$data[$var][3]}</td>
                        </tr>";
                    }
                    else{
                        echo "<tr>
                        <td></td>
                        <td style='color:white;'></td>
                        <td>{$text}</td>
                        <td style='width:100px; text-align:right'></td>
                        <td style='width:100px; text-align:right'></td>
                        </tr>";
                    }
                   }
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

    <table class="table tbl-border table-sm ">
        <tr>
            <td style="text-align:right"></td>
            <td width="100px" style="text-align:right">0.00</td>
        </tr>
        <tr>
        <td style="text-align:right"></td>
            <td width="100px" style="text-align:center">C$ 50,486.00</td>
        </tr>
        <tr>
        <td style="text-align:right"></td>
            <td width="100px" style="text-align:right">c$ 50,486.00</td>
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

