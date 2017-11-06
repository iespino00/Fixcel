
<?php

// session_start();
 require_once 'header.php';
 require_once 'models/Categorias.php';
 require_once 'models/Subcategorias.php';
 error_reporting(E_ALL ^ E_WARNING);
 $nickname =  $_SESSION['nickname'];
 $tipo =  $_SESSION['tipo'];


require_once 'controllers/ControllerCategorias.php';
$controller_categorias = new ControllerCategorias();
$categorias = $controller_categorias->getAllCategorias();

require_once 'controllers/ControllerSubcategorias.php';
$controller_Subcategorias = new ControllerSubcategorias();
$subcategorias = $controller_Subcategorias->getAllSubcategorias();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>FIXCEL | Altas Categorías </title>
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
      location.href="altas_subCategorias.php";
      }


   function TratarModeDialog($id_subcategoria,$descripcion_subcategoria)
       {

         var id_subcategoria=$id_subcategoria;
         var descripcion_subcategoria=$descripcion_subcategoria;
             
       document.getElementById('id_subcategoriaMD').value = id_subcategoria;   
       document.getElementById('descripcion_subcategoriaMD').value = descripcion_subcategoria;
       }


</script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <?php
        //MENU DE OPCIONES // NAVBAR
        include("menu.php");

       
      if( isset($_POST['registrar']) ) 
        {

          $resultado = $controller_Subcategorias->crear_subcategorias($_REQUEST['descripcion_subcategoria'],$_REQUEST['id_categoria']);
          if($resultado = 1)
            {
            $msgCreateOK = "Subcategoría creada con Éxito!";
            echo '<script>ok("'.$msgCreateOK.'");</script>'; 
            }
            else
                {
                  $msgCreateKO = "Error al crear la Subcategoria!";
                  echo '<script>ok("'.$msgAccesoOK.'");</script>';
                }

        } 
     
    if( isset($_POST['update'])) //Si preciono Actualizar en el Modal
          {

        $objSubcategorias = new Subcategorias();

        $objSubcategorias->id_subcategoria = $_REQUEST['id_subcategoriaMD'];
        $objSubcategorias->descripcion_subcategoria = $_REQUEST['descripcion_subcategoriaMD'];
       

        $update = $controller_Subcategorias->update_subcategoria($objSubcategorias);
           
        if($update = 1)//si x trae 1 quiere decir que
          {  
              $msgUpdateOK = "Datos Actualizados con Éxito!";
              echo '<script>ok("'.$msgUpdateOK.'");</script>';
          }
          else{
              $msgUpdateKO = "Error al Actualizar Información!";
              echo '<script>ok("'.$msgUpdateKO.'");</script>';
              }                     
        }



      ?>

  <div class="content-wrapper">
    <div class="container-fluid">

        <!-- inicia div de registro de usuarios-->
     <center><div class="card-header">Registrar una Subcategorias</div></center>
          <div class="card-body">
           <form action="altas_subCategorias.php" method="post"  data-ajax="false">
              <div class="form-group">
                   <center>
                    <center><label for="exampleSelect1">Categoria:</label></center>
                    <select class="form-control" id="id_categoria" name="id_categoria" required>
                    <option value="">Selecciona una opción</option>
                      <?php
                      foreach ($categorias as $c)
                       {
                            
                       echo '
                            <option value="'.$c->id_categoria.'">'.$c->descripcion_categoria.'</option> 
                            '; 
                       }
                       ?>
                    
                    </select>
                    </center>
             
                <center><label for="exampleInputPassword1">Descripción de la Categoría:</label></center>
                <input class="form-control" id="descripcion_subcategoria" name="descripcion_subcategoria" type="text" placeholder="Categoría" required>
              </div>

          <center> <input type="submit" class="btn btn-success" id="registrar" name="registrar" value="Registrar"> </center>
            </form>
         </div>
        
        <hr class="my-4">
       <!-- termina div de registro de usuarios-->

          <!-- INICIA DIV DE TABLA-->
      <div class="card mb-3">
        <center><div class="card-header">
          <i class="fa fa-table"></i> Catálogo de Subcategorías</div></center>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th><center>ID</center></th>
                   <th><center>Categoría</center></th>
                  <th><center>Descripción Subcategoria</center></th>
                  <th><center>Acción</center></th>     
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th><center>ID</center></th>
                   <th><center>Categoría</center></th>
                  <th><center>Descripción Subcategoria</center></th>
                  <th><center>Acción</center></th>  
                </tr>
              </tfoot>
              <tbody>
              <?php
                  foreach ($subcategorias as $s)
                  {
                      $id_subcategoria = $s->id_subcategoria;
                      $descripcion_subcategoria = $s->descripcion_subcategoria;

             echo "<tr>
                      <td><center>$s->id_subcategoria</center></td>
                      <td><center>$s->descripcion_categoria</center></td>
                      <td>$s->descripcion_subcategoria</td>
                      <td>
                         <center><a title='Editar Información' data-toggle='modal' data-target='#edit_subcategoria_modal' onclick='javascript:TratarModeDialog($id_subcategoria,\"".$descripcion_subcategoria."\");' ><span class='badge badge-pill badge-default'><img src='./icons/edit_user.svg' style='width:23px; height:23px;' /></span></a></center>
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
