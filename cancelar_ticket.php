<?php
//session_start();
//if(!isset($_SESSION)) { session_start(); }
 require_once 'header.php';
 error_reporting(E_ALL ^ E_WARNING);
 require_once 'controllers/ControllerVentas.php';
  
 $controller_Ventas = new ControllerVentas();
 $nickname =  $_SESSION['nickname'];
 $id_user =  $_SESSION['id_user'];
 $tipo =  $_SESSION['tipo'];


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>FIXCEL | Cancelación </title>
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

<script >
  
    function alerta(title)
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
      location.href="cancelar_ticket.php";
      }

</script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <?php
        //MENU DE OPCIONES // NAVBAR

        include("menu.php");

              if( isset($_POST['cancelar']) ) 
            {
          echo '<input type="cancelar" disabled>';
                   
          $resultado = $controller_Ventas->cancelar_venta($_REQUEST['id_ticket'],$id_user,$_REQUEST['observacion']);
          if($resultado = 1)
            {
            $msgCreateOK = "Ticket cancelado con Éxito!";
            echo '<script>alerta("'.$msgCreateOK.'");</script>'; 
            }
            else
                {
                  $msgCreateKO = "Error al cancelar el Ticket!";
                  echo '<script>alerta("'.$msgAccesoOK.'");</script>';
                }

           } 

      ?>

   <div class="content-wrapper">
    <div class="container-fluid">

        <!-- inicia div de consulta-->
     <center><div class="card-header"><h4> Cancelar Venta </h4></div></center>
            
             
        <form action="cancelar_ticket.php" method="post"  data-ajax="false">
             <div class="form-group">
                <center><label for="exampleInputPassword1">No.Ticket a cancelar:</label></center>
                <input type="text" class="form-control" id="id_ticket" name="id_ticket" placeholder="Id del ticket" required> 
                
                 <center><label for="exampleTextarea">Observación de la cancelación</label></center>
                <textarea class="form-control" id="observacion" name="observacion" rows="3" required></textarea>
            </div>
          <center> <input type="submit" class="btn btn-danger" id="cancelar" name="cancelar" value="Cancelar Venta"> </center>
        </form>

        <hr class="my-4">
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

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
     <!-- Custom scripts for this page-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </div>

  <script >
    
  </script>
</body>

</html>
