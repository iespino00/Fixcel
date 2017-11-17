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

  $ventas =   $_REQUEST['arrayVentas'];

for($i=0;$i<count($ventas);$i++)
  {  
  print_r( $descripcion_producto = $ventas[$i]['descripcion_producto']);
  }

//print_r($ventas) ;
}

