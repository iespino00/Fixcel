<?php 
 require_once 'application/DB_Connect.php';
 require_once './models/Subcategorias.php';
class ControllerSubcategorias
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

    public function crear_subcategorias($descripcion_subcategoria,$id_categoria)
    {

        //encryptamos la contraseña
        //$password = $this->encriptar_AES("APA91?%3$$",$password);
       
        $stmt = $this->pdo->prepare('insert into subcategorias_productos (descripcion_subcategoria, id_categoria) values(:descripcion_subcategoria, :id_categoria)');

                   $stmt->execute(
                            array('descripcion_subcategoria' => $descripcion_subcategoria,
                                  'id_categoria' => $id_categoria
                                 ) 
                                 );
        if($stmt)
                {
                 $result = 1;
                }else{
                     return 0;                   
                     }
    }


   
    public function getAllSubcategorias() 
    {

       $stmt = $this->pdo->prepare('SELECT * FROM subcategorias_productos
                                     inner join categoria_productos
                                     on subcategorias_productos.id_categoria = categoria_productos.id_categoria
                                     order by subcategorias_productos.descripcion_subcategoria ASC');

        $result = $stmt->execute( );

        $array = array();
        $ind = 0;
        foreach ($stmt as $row) 
        {
            // do something with $row
            $itm = new Subcategorias();
            $itm->id_categoria = $row['id_categoria'];
            $itm->descripcion_categoria = $row['descripcion_categoria'];
            $itm->id_subcategoria = $row['id_subcategoria'];
            $itm->descripcion_subcategoria = $row['descripcion_subcategoria'];
          
            $array[$ind] = $itm;
            $ind++;
        }

        return $array;
    }


         public function update_subcategoria($objSubcategorias)
    {

        //encryptamos la contraseña
        //$password = $this->encriptar_AES("APA91?%3$$",$password);
       
        $stmt = $this->pdo->prepare('update subcategorias_productos set descripcion_subcategoria = :descripcion_subcategoria
                                                         where id_subcategoria=:id_subcategoria');

        $stmt->execute(
            array(  'id_subcategoria' => $objSubcategorias->id_subcategoria,
                    'descripcion_subcategoria' => $objSubcategorias->descripcion_subcategoria
                 ) );  
                          
             if($stmt)
                {
                 $result = 1;
                }else{
                     return 0;                   
                     }
    }



}
 
?>