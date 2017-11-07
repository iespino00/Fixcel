
<?php

// session_start();
 require_once 'header.php';
 require_once 'models/Categorias.php';
 error_reporting(E_ALL ^ E_WARNING);
 $nickname =  $_SESSION['nickname'];
 $tipo =  $_SESSION['tipo'];
 $pass = $_SESSION['password'];
 $iduser = $_SESSION['id_user'];


require_once 'controllers/ControllerUsuarios.php';
$controller_usuarios = new ControllerUsuarios();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>FIXCEL | Configuración de Cuenta </title>
  <link rel="shortcut icon" href="Images/login.png">
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
    <!--ALERT -->
  <script src="dist_alert/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist_alert/sweetalert.css">

  <script>


  function ok_empleado(title)
      {
             swal({
                  title: title,
                  timer: 1900,
                  showConfirmButton: false
               });

           setTimeout(next, 1000);
      }


  function next()
      {
      location.href="panel.php";
      }

</script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <?php
        //MENU DE OPCIONES // NAVBAR
        include("menu.php");

       
 if( isset($_POST['registrar']) ) 
   {

          $resultado = $controller_usuarios->change_password($_REQUEST['id_user'],$_REQUEST['password']);
          if($resultado = 1)
            {
            $_SESSION['password'] = $_REQUEST['password'];
            $msgCreateOK = "Cambio realizado con Éxito!";
            echo '<script>ok_empleado("'.$msgCreateOK.'");</script>'; 
            }
            else
                {
                  $msgCreateKO = "Error al cambiar la Contraseña!";
                  echo '<script>wrong_empleado("'.$msgAccesoOK.'");</script>';
                }

   } 
      ?>

  <div class="content-wrapper">
    <div class="container-fluid">

        <!-- inicia div de registro de usuarios-->
     <center><div class="card-header">Cambiar Contraseña a: <b><h2><?php echo $nickname; ?></h2></b></div></center>
          <div class="card-body">
           <form action="config_cuenta.php" method="post"  data-ajax="false">

      <hr class="my-4">
          <div class="form-group">

             <center><label for="exampleInputPassword1">Nueva Contraseña:</label></center>
             <input class="form-control" id="password" name="password" type="password" placeholder="password" value="<?php echo $pass;?>" required>
             <input class="form-control" id="id_user" name="id_user" type="text" placeholder="password" value="<?php echo $iduser;?>" style='visibility:hidden' required>
          </div>

          <center> <input type="submit" class="btn btn-success" id="registrar" name="registrar" value="Cambiar"> </center>
            </form>
         </div>
        
  
       <!-- termina div de registro de usuarios-->

    </div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
      <!--Footer y  Modales-->
    <?php
    include ("footer.php");
    include ("modales.php");
    ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
  
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
     <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>
