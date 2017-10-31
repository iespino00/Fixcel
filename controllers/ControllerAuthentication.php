<?php

require_once './models/Authentication.php';
 
class ControllerAuthentication
{
    private $db;
    private $pdo;
    function __construct() 
    {
        require_once './application/DB_Connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->pdo = $this->db->connect();

    }
 
    function __destruct() 
    {
         
    }

    public function login($nickname, $password) 
    {
        $stmt = $this->pdo->prepare('SELECT * FROM usuarios WHERE nickname = :nickname AND password = :password');

        $stmt->execute(
              array('nickname' => $nickname, 
                    'password' => $password) );

        foreach ($stmt as $row) 
        {
            // do something with $row
            $auth = new Authentication();
            $auth->id_user = $row['id_user'];
            $auth->nickname = $row['nickname'];
            $auth->tipo = $row['tipo'];
            $auth->status = $row['status'];
            
       
            return $auth;
        }

        return null;

    }

  

   

   
 
    
   

 
    
   

    

    

}
 
?>