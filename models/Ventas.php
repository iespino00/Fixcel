<?php
/**
* 
*/
class Ventas
{
	 public $id_ticket;
	 public $id_user;
     public $nickname;
     public $fecha_ticket;
     public $hora_ticket;
     public $total_venta;
     public $status_ticket;

     public $id_detalle_venta;
     public $id_producto;
     public $cantidad;
     public $costo_act_venta;
     public $costo_act_proveedor;
     public $ganancia;
     public $fecha_venta;
     public $hora_venta;

     public $descripcion_producto;
   
   // constructor
    function __construct() 
    {

    }
 
    // destructor
    function __destruct() 
    {
         
    }
}


?>