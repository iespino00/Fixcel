<?php
//session_start();
//if(!isset($_SESSION)) { session_start(); }
 require_once 'header.php';
 error_reporting(E_ALL ^ E_WARNING);

 $nickname =  $_SESSION['nickname'];
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
  <title>FIXCEL | Panel </title>
  <link rel="shortcut icon" href="Images/login.png">
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
<!-- <script src="http://code.jquery.com/jquery-latest.js"></script>
 <script src="js/jquery-1.9.1.min.js"></script>-->
  <script>

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
  </script>


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <?php
        //MENU DE OPCIONES // NAVBAR

        include("menu.php");
      ?>

  <div class="content-wrapper">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <center><h1>VENTAS FIXCEL</h1></center>
           <!--<center><input type="text" id="lector" name="lector" onkeyup = "getProducto()" autofocus ></center>
           <input type="text" name="id" id="id" readonly>
        
          <p>Este es un ejemplo de una página en blanco aqui irá el contenido depende de lo que selecciones.<?php echo  $tipo ; ?></p> -->

           <input type="text" class="form-control" id="lector" placeholder="" onkeyup = "getProducto()"  autofocus> 
        </div>

           
         <div class="col-md-3 col-md-offset-3" id="result"></div>
      </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
      <!--Footer y  Cerrar Sesión Modal-->
    <?php
    include ("footer.php");
    include("modales.php");
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/searchBar.js"></script>

  </div>
</body>

</html>
