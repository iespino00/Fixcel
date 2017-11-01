
<?php

// session_start();
 require_once 'header.php';
 error_reporting(E_ALL ^ E_WARNING);
 $nickname =  $_SESSION['nickname'];
 $tipo =  $_SESSION['tipo'];


require_once 'controllers/ControllerUsuarios.php';
$controller_usuarios = new ControllerUsuarios();

$users = $controller_usuarios->getAllUsers();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>FIXCEL | Altas Empleados </title>
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
 
  function ok_empleado_add()
  {
             swal({
                  title: "Usuario creado con Éxito!",
                  timer: 1900,
                  showConfirmButton: false
               });

           setTimeout(next, 1000);
  }

  function wrong_empleado_add()
  {
             swal({
                  title: "Error al crear el Usuario!",
                  timer: 1900,
                  showConfirmButton: false
               });

           setTimeout(next, 1500);
  }

  function next()
  {
    location.href="altas_empleados.php";
  }
</script>


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <?php
        //MENU DE OPCIONES // NAVBAR
        include("menu.php");

       
 if( isset($_POST['registrar']) ) 
{
    //echo '<script>alert ("'.$_REQUEST['password'].'");</script>';
     $resultado = $controller_usuarios->crear_empleado($_REQUEST['nickname'],
                                              $_REQUEST['password'],
                                              $_REQUEST['nombre'],
                                              $_REQUEST['apellido_paterno'],
                                              $_REQUEST['apellido_materno'],
                                              $_REQUEST['direccion'],
                                              $_REQUEST['telefono'],
                                              $_REQUEST['correo'],
                                              $_REQUEST['tipo']
                                             
                                             );
      if($resultado)
      {
          echo '<script>ok_empleado_add();</script>';
     
      }
      else
      {
          echo '<script>wrong_empleado_add();</script>';
  
      }
} 


      ?>

  <div class="content-wrapper">
    <div class="container-fluid">


        <!-- inicia div de registro de usuarios-->
     <center><div class="card-header">Registrar un Empleado</div></center>
          <div class="card-body">
           <form action="altas_empleados.php" method="post"  data-ajax="false">

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <center><label for="exampleInputName">Nombre:</label></center>
                    <input class="form-control" id="nombre" name="nombre" type="text" aria-describedby="nameHelp" placeholder="Escribe el nombre">
                  </div>
                  <div class="col-md-6">
                    <center><label for="exampleInputLastName">Nickname:</label></center>
                    <input class="form-control" id="nickname" name="nickname" type="text" aria-describedby="nameHelp" placeholder="Escribe el Nickname">
                  </div>
                   <div class="col-md-6">
                    <center><label for="exampleInputLastName">Apellido Paterno:</label></center>
                    <input class="form-control" id="apellido_paterno" name="apellido_paterno" type="text" aria-describedby="nameHelp" placeholder="Escribe el Apellido Paterno">
                  </div>
                   <div class="col-md-6">
                    <center><label for="exampleInputLastName">Apellido Materno:</label></center>
                    <input class="form-control" id="apellido_materno" name="apellido_materno" type="text" aria-describedby="nameHelp" placeholder="Escribe el Apellido Materno">
                  </div>
                  
                   <div class="col-md-6">
                  <center><label for="exampleInputEmail1">Dirección:</label></center>
                <input class="form-control" id="direccion" name="direccion" type="text" aria-describedby="nameHelp" placeholder="Escribe la dirección">
                </div>
                    
                     <div class="col-md-6">
                 <center><label for="example-tel-input">Telefono:</label></center>
                    <input class="form-control" id="telefono" name="telefono" type="tel" aria-describedby="telHelp" placeholder="Escribe teléfono">
                    </div>

                <div class="col-md-6">
                  <center><label for="exampleInputEmail1">Correo:</label></center>
                <input class="form-control" id="correo" name="correo" type="email" aria-describedby="emailHelp" placeholder="Escribe el Correo">
                </div>

                  <div class="col-md-6">
                    <center><label for="exampleSelect1">Tipo de Usuario:</label></center>
                    <select class="form-control" id="tipo" name="tipo">
                      <option value="0">Empleado</option>
                      <option value="1">Administrador</option>
                    </select>
                  </div>

                </div>
              </div>

              <div class="form-group">
                <center><label for="exampleInputPassword1">Password:</label></center>
                <input class="form-control" id="password" name="password" type="password" placeholder="Password">
              </div>
          <center> <input type="submit" class="btn btn-success" id="registrar" name="registrar" value="Registrar"> </center>
            </form>
         </div>
           <hr class="my-4">
       <!-- termina div de registro de usuarios-->


          <!-- INICIA DIV DE TABLA-->
      <div class="card mb-3">
        <center><div class="card-header">
          <i class="fa fa-table"></i> Catálogo de Empleados</div></center>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nickname</th>
                  <th>Nombre Completo</th>
                  <th>Dirección</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th>Status</th>
                  <th>Usuario</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nickname</th>
                  <th>Nombre Completo</th>
                  <th>Dirección</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th>Status</th>
                  <th>Usuario</th>
                </tr>
              </tfoot>
              <tbody>
              <?php
                  foreach ($users as $u)
                  {
                    if($u->status == 0)
                    {
                      $status = "Inactivo";
                    }elseif($u->status == 1)
                        {
                          $status = "Activo";
                        }

                  if($u->tipo == 0)
                    {
                      $tipo = "Empleado";
                    }elseif($u->tipo == 1)
                        {
                          $tipo = "Administrador";
                        }
                 

                echo "<tr>
                      <td>$u->nickname</td>
                      <td>$u->nombre". " "."$u->apellido_paterno". " "."$u->apellido_materno</td>
                      <td>$u->direccion</td>
                      <td>$u->telefono</td>
                      <td>$u->correo</td>
                      <td>$status</td>
                      <td>$tipo</td>
                       </tr>";
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div> <!--TERMINA DIV DE TABLA -->


    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
      <!--Footer y  Cerrar Sesión Modal-->
    <?php
    include ("footer.php");
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
