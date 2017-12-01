<?php 
 require_once 'application/DB_Connect.php';
 require_once './models/Ventas.php';
class ControllerVentas
{
    private $db;
    private $pdo;
    function __construct() 
    {
        // connecting to database
        $this->db = new DB_Connect();
        $this->pdo = $this->db->connect();
    }
 
    function __destruct() { }


 public function cancelar_venta($id_ticket,$id_user,$observacion)
            {     
            $status_ticket = 0;

            $VALID_STATUS = $this->pdo->prepare('select * from ventas where id_ticket = :id_ticket limit 1');
            $VALID_STATUS->execute(array('id_ticket' => $id_ticket));
            $arreglo = $VALID_STATUS->fetch(PDO::FETCH_ASSOC);
            $estatus = $arreglo['status_ticket'];
                if($estatus == 1) //Si el ticket tiene status de 1 (activo entonces cancelalo)
                  {
                     $stmt_statusTkt = $this->pdo->prepare('update ventas set status_ticket = :status_ticket
                                         where id_ticket=:id_ticket');

            $stmt_statusTkt->execute(
                            array('id_ticket' => $id_ticket,
                                  'status_ticket' => $status_ticket
                                 ) 
                          );
                              
                 if($stmt_statusTkt)
                    {

                   $stmt_cancelacion = $this->pdo->prepare('insert into anulacion_ventas (id_ticket, id_user, observacion) values(:id_ticket, :id_user, :observacion)');

                   $stmt_cancelacion->execute(
                            array('id_ticket' => $id_ticket,
                                  'id_user' => $id_user,
                                  'observacion' => $observacion
                                 ) 
                                 );
                        if($stmt_cancelacion)
                        {

                            $stmt_detalleVentas = $this->pdo->prepare('SELECT * FROM detalle_ventas
                                                                       WHERE id_ticket = :id_ticket');
                            $stmt_detalleVentas->execute(
                                                        array('id_ticket' => $id_ticket) 
                                                        );
                            foreach ($stmt_detalleVentas as $row) 
                                    {
                                     
                                    $id_producto = $row['id_producto'];
                                                                     
                                    $stmt_stock = $this->pdo->prepare('select stock_disponible from stock where id_producto = :id_producto limit 1');
                                    $stmt_stock->execute(
                                                        array('id_producto' => $id_producto) 
                                                        );
                                    $arr = $stmt_stock->fetch(PDO::FETCH_ASSOC);
                                    $stk = $arr['stock_disponible'];

                                    $stock_update = $stk + 1;

                                    $stmt_upd_stock = $this->pdo->prepare('update stock set stock_disponible = :stock_disponible
                                         where id_producto=:id_producto');

                                    $stmt_upd_stock->execute(
                                                    array('id_producto' => $id_producto,
                                                          'stock_disponible' => $stock_update
                                                         ) 
                                                  );
                                     

                                    }

                          return $result = 1; 
                        }

                     
                    }else{
                        return $result = 0;                   
                         }
                  }
                  else{ //si el ticket tiene status de 0 retorna el mensaje de que ya estaba cancelado
                 return   $result = 3;
                      }
           
            }

public function getVentas()
{
  $stmt = $this->pdo->prepare('SELECT * FROM ventas
                                     inner join usuarios
                                     on ventas.id_user = usuarios.id_user
                                     where status_ticket= 1
                                     order by ventas.id_ticket asc');
        $result = $stmt->execute( );

        $array = array();
        $ind = 0;
        foreach ($stmt as $row) 
        {
            $itm = new Ventas();
            $itm->id_ticket = $row['id_ticket'];
            $itm->nickname = $row['nickname'];
            $date= new DateTime($row['fecha_ticket']) ;  
            $itm->fecha_ticket = $date->format('Y-m-d');
            $time= new DateTime($row['fecha_ticket']) ;  
            $itm->hora_ticket = $date->format('h:i:s');
           // $itm->fecha_ticket = $row['fecha_ticket'];
            $itm->total_venta = $row['total_venta'];
         
            $array[$ind] = $itm;
            $ind++;
        }

        return $array;
}

public function getDetalleVentas()
{
    $stmt = $this->pdo->prepare('SELECT * FROM detalle_ventas
                                     inner join productos
                                     on detalle_ventas.id_producto = productos.id_producto
                                     order by detalle_ventas.id_ticket asc');
        $result = $stmt->execute( );

        $array = array();
        $ind = 0;
        foreach ($stmt as $row) 
        {
            $itm = new Ventas();
            $itm->id_ticket = $row['id_ticket'];
            $itm->descripcion_producto = $row['descripcion_producto'];
            $itm->cantidad = $row['cantidad'];
            $itm->costo_act_venta = $row['costo_act_venta'];
            $itm->costo_act_proveedor = $row['costo_act_proveedor'];
            $itm->ganancia = $row['ganancia'];
            

            $array[$ind] = $itm;
            $ind++;
        }

        return $array;
}


  /*   public function getAllVentas()
     {
        $stmt = $this->pdo->prepare('SELECT * FROM ventas
                                     inner join detalle_ventas
                                     on ventas.id_ticket = detalle_ventas.id_ticket
                                     inner join usuarios
                                     on ventas.id_user = usuarios.id_user
                                     inner join productos
                                     on detalle_ventas.id_producto = productos.id_producto
                                     where status_ticket= 1
                                     order by ventas.id_ticket asc');
        $result = $stmt->execute( );

        $array = array();
        $ind = 0;
        foreach ($stmt as $row) 
        {
            $itm = new Ventas();
            $itm->id_ticket = $row['id_ticket'];
            $itm->nickname = $row['nickname'];
            $itm->fecha_ticket = $row['fecha_ticket'];
            $itm->total_venta = $row['total_venta'];

            $itm->ganancia = $row['ganancia'];
            $itm->descripcion_producto = $row['descripcion_producto'];
          
            $array[$ind] = $itm;
            $ind++;
        }

        return $array;
     }
*/

}
 
?>