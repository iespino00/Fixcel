<?php
/**
* 
*/
class Productos
{
	 public $id_producto;
	 public $id_subcategoria;
     public $descripcion_subcategoria;
     public $descripcion_categoria;
     public $descripcion_producto;
     public $costo_unitario;
     public $costo_proveedor;
     public $stock_seguridad;
     public $fecha_registro;
     public $stock_disponible;
     public $codigo_barras;
   
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