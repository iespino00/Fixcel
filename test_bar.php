<?php 
 require_once 'libs/fpdf/fpdf.php';

  $cod_barras= "00000000004";

            $pdf=new FPDF();
            //Primera página
            $pdf->AddPage();
            $pdf->SetFont('Arial','',15);
            $pdf->Cell(40,20);
            $pdf->Write(5,'A continuación mostramos una imagen ');
            $pdf->Image('cod_Barras/'.$cod_barras.'.png' , 80 ,22, 35 , 38,'PNG', 'http://www.desarrolloweb.com');

            $pdf->Output();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
	
	  <!--  <input type="text" name="lector" autofocus > 
	    <img src="libs/barcode/barcode.php?text=00000000001&size=40&codetype=Code39&print=true" />
-->
</body>
</html>