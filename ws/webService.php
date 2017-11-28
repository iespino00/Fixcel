 <?php 
require_once 'conexion.php';
  require __DIR__ . '/../libs/ticket/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

if($_REQUEST['tarea'] == '1')
{
    if(!isset($_POST['lector'])) exit('No se recibió el valor a buscar');

      function search()
      {
        $mysqli = getConnexion();
        $search = $mysqli->real_escape_string($_POST['lector']);
        $query = "SELECT * FROM codigos_barras
                  inner join productos
                  on codigos_barras.id_producto = productos.id_producto
                  inner join stock
                  on codigos_barras.id_producto = stock.id_producto
                  WHERE codigo_barras = $search
                  AND stock_disponible >= 1 ";

        $res = $mysqli->query($query);
         if($res)
         {
             while($row = $res->fetch_array(MYSQLI_ASSOC)) 
                  {
                   echo json_encode($row);
                  }  
         }else{
               echo $stock=0;
              }  
      }
  search();
}

 

if($_REQUEST['tarea'] == '2')
{ 
  $ko = 0;
  $ok = 1;
    $mysqli = getConnexion();

    $ventas =   $_REQUEST['arrayVentas'];
    $id_user = $_REQUEST['id_user'];
    $fecha_ticket = $_REQUEST['fecha_ticket'];
    $total_venta = $_REQUEST['total_venta'];
    $status_ticket = $_REQUEST['status_ticket'];
    $cantidad = $_REQUEST['cantidad'];
    $fecha_venta = $_REQUEST['fecha_venta'];
    $hora_venta = $_REQUEST['hora_venta'];
   //Se realiza insert a tabla de Ventas
   $queryVenta = "insert into ventas (id_user,total_venta,status_ticket) values($id_user,$total_venta,$status_ticket) ";
   $resVenta = $mysqli->query($queryVenta);
   $LastId= $mysqli->insert_id;
   
       if($resVenta)
       {

            for($i=0;$i<count($ventas);$i++)
            {
                $id_producto = $ventas[$i]['id_producto'];
                $costo_act_venta = $ventas[$i]['costo_unitario'];
                $costo_act_proveedor = $ventas[$i]['costo_proveedor'];
                $ganancia = $costo_act_venta - $costo_act_proveedor;
                 //Hago los insert a la tabla de detalles de venta
                $queryDetalle = "insert into detalle_ventas (id_ticket,id_producto,cantidad,costo_act_venta,costo_act_proveedor,ganancia,fecha_venta,hora_venta) values($LastId,$id_producto,$cantidad,$costo_act_venta,$costo_act_proveedor,$ganancia,'$fecha_venta','$hora_venta')";
                $resDetalle = $mysqli->query($queryDetalle);

                //Obtengo el stock disponible actualizar
                  $queryStock = "select stock_disponible from stock where id_producto = $id_producto limit 1";
                  $resStock = $mysqli->query($queryStock);
                  $res = mysqli_fetch_assoc($resStock);
                  $stk= $res['stock_disponible'];
                  
                  $stkUpd = $stk - $cantidad;

                  $queryUpdStock = "update stock set stock_disponible = $stkUpd where id_producto=$id_producto";
                  $resUpdStock = $mysqli->query($queryUpdStock);

            }

        echo($ok);
       } 
          else{
                echo($ko);
              }
/*
for($i=0;$i<count($ventas);$i++)
  {  
  print_r( $descripcion_producto = $ventas[$i]['descripcion_producto']);
    print_r( $id_user);
  }
*/
//print_r($ventas) ;
 
 // mysqli_close($mysqli);
}


//Imprimir ticket
if($_REQUEST['tarea'] == '3')
{ 
    $mysqli = getConnexion();
    
    $okk= 'Todo bien al imprimir';
    $ventas =   $_REQUEST['arrayVentas'];
    $id_user = $_REQUEST['id_user'];
    $fecha_ticket = $_REQUEST['fecha_ticket'];
    $total_venta = $_REQUEST['total_venta'];
    $status_ticket = $_REQUEST['status_ticket'];
    $cantidad = $_REQUEST['cantidad'];
    $fecha_venta = $_REQUEST['fecha_venta'];
    $hora_venta = $_REQUEST['hora_venta'];


$queryTicket = "SELECT MAX(id_ticket) AS id_ticket FROM ventas";
                  $resTicket = $mysqli->query($queryTicket);
                  $res = mysqli_fetch_assoc($resTicket);
                  $id_ticket= $res['id_ticket'];

   
       $nombre_impresora = "POS-58"; 
       $connector = new WindowsPrintConnector($nombre_impresora);
       $printer = new Printer($connector);
       $printer->setJustification(Printer::JUSTIFY_CENTER);

       $printer->text("*** FIXCEL ***" . "\n");
       $printer->text("'Lo mejor'" . "\n");
       #La fecha también
       $printer->text(date("Y-m-d H:i:s") . "\n");
       $printer->text("TICKET No: " .$id_ticket. "\n");

        for($i=0;$i<count($ventas);$i++)
        {
          $printer->setJustification(Printer::JUSTIFY_LEFT);
          $printer->text($cantidad . " -> " . $ventas[$i]['descripcion_producto'] . "\n");

          $printer->setJustification(Printer::JUSTIFY_RIGHT);
          $printer->text(' $' . $ventas[$i]['costo_unitario'] . "\n");
        }

          $printer->text("--------\n");
          $printer->text("TOTAL: $". $total_venta ."\n");

          $printer->text("Gracias por su compra");
          $printer->feed(3);
          $printer->cut();
          $printer->pulse();
          $printer->close();
   echo $okk;
}
