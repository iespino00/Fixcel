<?php
//session_start();
//if(!isset($_SESSION)) { session_start(); }
 require_once 'header.php';
 error_reporting(E_ALL ^ E_WARNING);

 $nickname =  $_SESSION['nickname'];
  $user =  $_SESSION['id_user'];
 $tipo =  $_SESSION['tipo'];
  
 $date = date("Y/m/d");
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>FIXCEL | Panel </title>
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

<!-- <script src="http://code.jquery.com/jquery-latest.js"></script>
 <script src="js/jquery-1.9.1.min.js"></script>-->
  <script>
     var objRes;
     var arrayVentas=[];
     var total_venta= 0;
     var id_user ='<?php echo $user;?>';
     var fecha_ticket ='<?php echo $date;?>';
     var fecha_venta = fecha_ticket;
     var hora_venta;
     var cantidad = 1;
     var status_ticket = 1;
     var ganancia = 0;
     var stk_actual=0;
     var cont= 0;
     var acc_lector;
     
   /* function getProducto()
    {
    var min_length = 0; // min caracters to display the autocomplete
      var keyword = $('#lector').val();
      if (keyword.length >= min_length) {
        $.ajax({
          url: 'ws/autocomplete.php',
          type: 'POST',
          data: {keyword:keyword,tarea:'1'},
          success:function(data){
            $('#id').show();
            $('#id').html(data);
          }
        });
      } else {
        $('#id').hide();
      }
    }
*/
/*function cambioInput(id)
   {
  var lector = 'lector';
  document.getElementById('text').innerHTML = 'Modificado';
  console.log("cambiando los otros inputs " + id);
  }*/

  window.onload = function() {
 document.getElementById("registrar").disabled = true;
        };

  </script>


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <?php
        //MENU DE OPCIONES // NAVBAR

        include("menu.php");
      ?>



        <div class="content-wrapper">
    <div class="container-fluid">

        <!-- inicia div de consulta-->
     <center><div class="card-header"><h4>** VENTAS FIXCEL **</h4></div></center>
             <hr class="my-4">
             <input type="text" class="form-control" id="lector" placeholder="" oninput = "getProducto()"  autofocus> 
        <hr class="my-4">
       <!-- termina div de registro de usuarios-->
      <center><a id="cont" name="cont">0 Productos Enlistados</a></center>
        <center><div class="col-md-3 col-md-offset-3" id="result"></div></center>
        
          <!-- INICIA DIV DE TABLA-->
   
           <div class="col-12" style="width:100%; height:300px; overflow: scroll;" >
                <table style="width:100%" border="4" id="tabla" >
                    <tr bgcolor="#4BE746">
                    <th><center>Cod.Producto</center></th>
                    <th><center>Descripción</center></th> 
                    <th><center>Precio</center></th>
                    <th><center>Acción</center></th>  
                    </tr>
                </table>
           </div>
                
    <!--TERMINA DIV DE TABLA -->
     <hr class="my-4">
            
             <center>
              <div class="form-row">
                 <div class="col-md-2">
                 </div>
                 <div class="col-md-2">
                 </div>
                  <div class="col-md-2">
                       <h5>Fecha: </h5>
                       <input type="text" class="form-control" id="fecha_ticket" name="fecha_ticket" readonly value="<?php echo $date;?>">
                   </div>

                    <div class="col-md-2">
                       <h5>Pago Total: </h5>
                       <input type="text" class="form-control" id="total_venta" name="total_venta" placeholder="Total a Pagar" readonly>
                    </div>
              </div>
              </center>

      <hr class="my-3">

       <center> <input type="submit" class="btn btn-danger" id="registrar" name="registrar" value="Realizar la Compra" onclick="pagar();"> </center>

      <hr class="my-3">
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
    <script type="text/javascript" src="js/searchBar.js"></script>
  </div>

  <script >
    
  </script>
</body>

</html>
