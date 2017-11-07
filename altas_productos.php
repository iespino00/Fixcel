
<?php

// session_start();
 require_once 'header.php';
 require_once 'models/Productos.php';
 error_reporting(E_ALL ^ E_WARNING);
 $nickname =  $_SESSION['nickname'];
 $tipo =  $_SESSION['tipo'];

 
require_once 'controllers/ControllerProductos.php';
$controller_productos = new ControllerProductos();

$productos = $controller_productos->getAllProductos();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>FIXCEL | Altas Productos </title>
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
  <script src="js/excel.js"></script>
  <script>
 function validaNum(e)
    {
     var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
    }


  function ok(title)
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
      location.href="altas_productos.php";
      }

</script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <?php
        //MENU DE OPCIONES // NAVBAR
        include("menu.php");

       
 if( isset($_POST['registrar']) ) 
   {

          $resultado = $controller_productos->crear_productos($_REQUEST['descripcion_categoria']);
          if($resultado = 1)
            {
            $msgCreateOK = "Producto creado con Éxito!";
            echo '<script>ok("'.$msgCreateOK.'");</script>'; 
            }
            else
                {
                  $msgCreateKO = "Error al crear el Producto!";
                  echo '<script>ok("'.$msgAccesoOK.'");</script>';
                }

   } 
      ?>

  <div class="content-wrapper">
    <div class="container-fluid">

        <!-- inicia div de registro de usuarios-->
     <center><div class="card-header">Registrar un Producto</div></center>
          <div class="card-body">
           <form action="altas_productos.php" method="post"  data-ajax="false">

              <div class="form-group">
                <center><label for="exampleInputPassword1">Descripción del Producto:</label></center>
                <input class="form-control" id="descripcion_producto" name="descripcion_producto" type="text" placeholder="Descripción" required>
              </div>

          <center> <input type="submit" class="btn btn-success" id="registrar" name="registrar" value="Registrar"> </center>
            </form>
         </div>
        
        <hr class="my-4">
       <!-- termina div de registro de usuarios-->

          <!-- INICIA DIV DE TABLA-->
      <div class="card mb-3">
        <div class="card-header">
          <center><i class="fa fa-table"></i> Catálogo de Productos</center>
          <center><a title='Exportar a Excel' onclick="tableToExcel('dataTable', 'Productos')"><span class='badge badge-pill badge-default'><img src='./icons/xls.svg' style='width:35px; height:35px;' /></span></a></center>
              </div>
          

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th><center>ID Producto</center></th>
                  <th><center>Descripción</center></th>
                  <th><center>Categoria</center></th>
                  <th><center>Subcategoría</center></th>
                  <th><center>$ Al público</center></th>
                  <th><center>$ Proveedor</center></th>
                   <th><center>Stock de Disponible</center></th>
                  <th><center>Stock de Seguridad</center></th>
                  <th><center>Acción</center></th>
                  
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th><center>ID Producto</center></th>
                  <th><center>Descripción</center></th>
                  <th><center>Categoria</center></th>
                  <th><center>Subcategoría</center></th>
                  <th><center>$ Al público</center></th>
                  <th><center>$ Proveedor</center></th>
                   <th><center>Stock de Disponible</center></th>
                 <th><center>Stock de Seguridad</center></th>
                  <th><center>Acción</center></th>

               </tr>
              </tfoot>
              <tbody>
              <?php
                  foreach ($productos as $p)
                  {


             echo "<tr>
                      <td><center>$p->id_producto</center></td>
                      <td>$p->descripcion_producto</td>
                      <td><center>$p->descripcion_categoria</center></td>
                      <td><center>$p->descripcion_subcategoria</center></td>
                      <td><center>$ $p->costo_unitario</center></td>
                      <td><center>$ $p->costo_proveedor</center></td>
                      <td><center>$p->stock_disponible PZ</center></td>
                      <td><center>$p->stock_seguridad PZ</center></td>
                      <td></td>
                 </tr>";
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <center><div class="card-footer small text-muted">Presiona la tecla F5 Para actualizar la tabla</div></center>
      </div> <!--TERMINA DIV DE TABLA -->

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
