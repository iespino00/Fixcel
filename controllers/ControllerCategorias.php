<?php 
 require_once 'application/DB_Connect.php';
 require_once './models/Categorias.php';
class ControllerCategorias
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


    public function crear_categorias($descripcion_categoria)
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
    }
   
    public function getAllCategorias() 
    {
        $stmt = $this->pdo->prepare('SELECT * FROM categoria_productos order by id_categoria desc');

        $result = $stmt->execute( );

        $array = array();
        $ind = 0;
        foreach ($stmt as $row) 
        {
            // do something with $row
            $itm = new Usuarios();
            $itm->id_categoria = $row['id_categoria'];
            $itm->descripcion_categoria = $row['descripcion_categoria'];
          
            $array[$ind] = $itm;
            $ind++;
        }

        return $array;
    }



}
 
?>