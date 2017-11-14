<?php 
if(!isset($_POST['lector'])) exit('No se recibió el valor a buscar');

require_once 'conexion.php';

function search()
{
  $mysqli = getConnexion();
  $search = $mysqli->real_escape_string($_POST['lector']);
  $query = "SELECT * FROM codigos_barras
			inner join productos
			on codigos_barras.id_producto = productos.id_producto
             WHERE codigo_barras = $search ";

  $res = $mysqli->query($query);

  while ($row = $res->fetch_array(MYSQLI_ASSOC)) 
     {
    //	echo "<p><a>$row[id_producto]   $row[descripcion_producto]</a></p>";
   //   echo " <input type='text' value=$row[descripcion_producto] >";
      echo json_encode($row,JSON_NUMERIC_CHECK);
  	 }
}

search();