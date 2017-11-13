<?php 
 require_once 'libs/fpdf/fpdf.php';
  $impresiones= $_REQUEST['cantidadMD'];
        $cod_barras= $_REQUEST['codeMD'];

            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetAutoPageBreak(true, 20);
            $y = $pdf->GetY();

              foreach ($impresiones as $i)
             {

                $pdf->Image('cod_Barras/'.$cod_barras.'.png',10,$y,50,0,'PNG');
                $y = $y+15;
             }
              $pdf->Output(); 
?>