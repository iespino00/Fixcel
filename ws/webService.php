 <?php 
require_once 'conexion.php';

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
    while ($row = $res->fetch_array(MYSQLI_ASSOC)) 
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

  $ko='Error';
  $ok = 'Todo Ok';
    $mysqli = getConnexion();

    $ventas =   $_REQUEST['arrayVentas'];
    $id_user = $_REQUEST['id_user'];
    $fecha_ticket = $_REQUEST['fecha_ticket'];
    $total_venta = $_REQUEST['total_venta'];
    $status_ticket = $_REQUEST['status_ticket'];
    $cantidad = $_REQUEST['cantidad'];
    $fecha_venta = $_REQUEST['fecha_venta'];
    $hora_venta = $_REQUEST['hora_venta'];
 
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
                 
                $queryDetalle = "insert into detalle_ventas (id_ticket,id_producto,cantidad,costo_act_venta,costo_act_proveedor,ganancia) values($LastId,$id_producto,$cantidad,$costo_act_venta,$costo_act_proveedor,$ganancia)";
                $resDetalle = $mysqli->query($queryDetalle);

               if($resDetalle)
                 {
                  print_r($ok);
                 }else
                     {
                       print_r($ko);
                     }
            }
        
       }
          else{
                print_r($ko);
              }
/*
for($i=0;$i<count($ventas);$i++)
  {  
  print_r( $descripcion_producto = $ventas[$i]['descripcion_producto']);
    print_r( $id_user);
  }
*/
//print_r($ventas) ;

  mysqli_close($mysqli);
}

