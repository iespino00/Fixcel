<?php 
 require_once 'application/DB_Connect.php';
 require_once './models/Productos.php';
class ControllerProductos
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



    public function getAllProductos() //Inicia GetAllProductos
    {
        $stmt = $this->pdo->prepare('SELECT * FROM productos
                                     inner join subcategorias_productos
                                     on productos.id_subcategoria = subcategorias_productos.id_subcategoria
                                     inner join categoria_productos
                                     on subcategorias_productos.id_categoria = categoria_productos.id_categoria
                                     inner join stock
                                     on productos.id_producto = stock.id_producto
                                     order by productos.id_producto asc');

        $result = $stmt->execute( );

        $array = array();
        $ind = 0;
        foreach ($stmt as $row) 
        {
            $itm = new Productos();
            $itm->id_producto = $row['id_producto'];
            $itm->id_subcategoria = $row['id_subcategoria'];
            $itm->descripcion_subcategoria = $row['descripcion_subcategoria'];
            $itm->descripcion_categoria = $row['descripcion_categoria'];
            $itm->descripcion_producto = $row['descripcion_producto'];
            $itm->costo_unitario = $row['costo_unitario'];
            $itm->costo_proveedor = $row['costo_proveedor'];
            $itm->stock_seguridad = $row['stock_seguridad'];
            $itm->fecha_registro = $row['fecha_registro'];
             $itm->stock_disponible = $row['stock_disponible'];
          
            $array[$ind] = $itm;
            $ind++;
        }

        return $array;
    }     //Termina GetAllProductos
      



    public function crear_productos($descripcion_categoria) //Inicia GetAllProductos
    {

        //encryptamos la contraseña
        //$password = $this->encriptar_AES("APA91?%3$$",$password);
       
        $stmt = $this->pdo->prepare('insert into categoria_productos (descripcion_categoria) values(:descripcion_categoria)');

                   $stmt->execute(
                            array('descripcion_categoria' => $descripcion_categoria
                                 ) 
                                 );
        if($stmt)
                {
                 $result = 1;
                }else{
                     return 0;                   
                     }
    }      //Termina CrearProductos
   



}
 
?>