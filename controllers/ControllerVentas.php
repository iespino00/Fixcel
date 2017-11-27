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

                           $result = 1; 
                        }

                     
                    }else{
                         return 0;                   
                         }
            }



}
 
?>