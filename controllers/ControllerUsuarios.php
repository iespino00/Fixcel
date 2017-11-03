<?php 
 require_once 'application/DB_Connect.php';
 require_once './models/Usuarios.php';
class ControllerUsuarios
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


    public function crear_empleado($nickname,$password,$nombre,$apellido_paterno,$apellido_materno,$direccion,$telefono,$correo,$tipo)
    {

        //encryptamos la contraseña
        //$password = $this->encriptar_AES("APA91?%3$$",$password);
       
        $stmt = $this->pdo->prepare('insert into usuarios (nickname,password,nombre,apellido_paterno,apellido_materno,direccion,telefono,correo,status,tipo) values(:nickname,:password,:nombre,:apellido_paterno,:apellido_materno,:direccion,:telefono,:correo,:status,:tipo)');

        $result = $stmt->execute(
                            array('nickname' => $nickname,
                                  'password' => $password,
                                  'nombre' => $nombre,
                                  'apellido_paterno' => $apellido_paterno,
                                  'apellido_materno' => $apellido_materno,
                                  'direccion' => $direccion,
                                  'telefono' => $telefono,
                                  'correo' => $correo,
                                  'status' => '1',
                                  'tipo' => $tipo 
                                 ) 
                                 );
        $res = false;

        if($result)
        {
            $res = true;
        }
        
        return $res;
    }
   
    public function getAllUsers() 
    {
        $stmt = $this->pdo->prepare('SELECT * FROM usuarios order by nickname desc');

        $result = $stmt->execute( );

        $array = array();
        $ind = 0;
        foreach ($stmt as $row) 
        {
            // do something with $row
            $itm = new Usuarios();
            $itm->id_user = $row['id_user'];
            $itm->nickname = $row['nickname'];
            $itm->nombre = $row['nombre'];
            $itm->apellido_paterno = $row['apellido_paterno'];
            $itm->apellido_materno = $row['apellido_materno'];
            $itm->direccion = $row['direccion'];
            $itm->telefono = $row['telefono'];
            $itm->correo = $row['correo'];
            $itm->status = $row['status'];
            $itm->tipo = $row['tipo'];
            $itm->password = $row['password'];
            
            $array[$ind] = $itm;
            $ind++;
        }

        return $array;
    }

 
     public function update_user($objUser)
    {

        //encryptamos la contraseña
        //$password = $this->encriptar_AES("APA91?%3$$",$password);
       
        $stmt = $this->pdo->prepare('update usuarios set nickname = :nickname,
                                                         password = :password,
                                                         nombre   = :nombre,
                                                         apellido_paterno = :apellido_paterno,
                                                         apellido_materno = :apellido_materno,
                                                         direccion = :direccion,
                                                         telefono = :telefono,
                                                         correo = :correo,
                                                         status = :status,
                                                         tipo = :tipo
                                                         where id_user=:id_user');

        $stmt->execute(
            array(  'id_user' => $objUser->id_user,
                    'nickname' => $objUser->nickname,
                    'password' => $objUser->password,
                    'nombre' => $objUser->nombre,
                    'apellido_paterno' => $objUser->apellido_paterno,
                    'apellido_materno' => $objUser->apellido_materno,
                    'direccion' => $objUser->direccion,
                    'telefono' => $objUser->telefono,
                    'correo' => $objUser->correo,
                    'status' => $objUser->status,
                    'tipo' => $objUser->tipo,
                 ) );  
                          
             if($stmt)
                {
                 $result = 1;
                }else{
                     return 0;                   
                     }
    }

        public function delete_user($id_user)
    {

        $stmt = $this->pdo->prepare('Delete from usuarios where id_user =:id_user');

        $stmt->execute(
                            array('id_user' => $id_user
                                 ) 
                                 );
           if($stmt)
                {
                 $result = 1;
                }else{
                     return 0;                   
                     }
    }

}
 
?>