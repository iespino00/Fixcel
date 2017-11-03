
<?php

// session_start();
 require_once 'header.php';
 require_once 'models/Usuarios.php';
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
 function validaNum(e)
    {
     var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
    }


  function ok_empleado(title)
      {
             swal({
                  title: title,
                  timer: 1900,
                  showConfirmButton: false
               });

           setTimeout(next, 1000);
      }

  function wrong_empleado(title)
      {
             swal({
                  title: title,
                  timer: 1900,
                  showConfirmButton: false
               });

           setTimeout(next, 1500);
      }

  function next()
      {
      location.href="altas_empleados.php";
      }


     function TratarModeDialog($id,$nickname,$nombre,$apellido_paterno,$apellido_materno,$direccion,$telefono,$correo,$password,$status,$tipo)
       {

         var id=$id;
         var nickname=$nickname;
         var nombre=$nombre;   
         var apellido_paterno=$apellido_paterno;   
         var apellido_materno=$apellido_materno;   
         var direccion=$direccion;   
         var telefono=$telefono;   
         var correo=$correo;
         var password=$password;      
         var status=$status; 
         var tipo=$tipo;  
             
       document.getElementById('id_userMD').value = id;   
       document.getElementById('nicknameMD').value = nickname;
       document.getElementById('nombreMD').value = nombre;
       document.getElementById('apellido_paternoMD').value = apellido_paterno;
       document.getElementById('apellido_maternoMD').value = apellido_materno;
       document.getElementById('direccionMD').value = direccion;
       document.getElementById('telefonoMD').value = telefono;
       document.getElementById('correoMD').value = correo;  
       document.getElementById('passwordMD').value = password;  
       document.getElementById('statusMD').value = status; 
       document.getElementById('tipoMD').value = tipo; 
       
        }

    function TratarModeDialogDelete($id)
       {
       var id=$id;
       document.getElementById('id_userMDD').value = id;  
       }

</script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <?php
        //MENU DE OPCIONES // NAVBAR
        include("menu.php");

       
 if( isset($_POST['registrar']) ) 
   {
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
        $msgCreateOK = "Usuario creado con Éxito!";
        echo '<script>ok_empleado("'.$msgCreateOK.'");</script>'; 
        }
        else
            {
              $msgCreateKO = "Error al crear el Usuario!";
              echo '<script>wrong_empleado("'.$msgAccesoOK.'");</script>';
            }
   } 


    if( isset($_POST['update'])) //Si preciono Actualizar en el Modal
      {

        $objUser = new Usuarios();

        $objUser->id_user = $_REQUEST['id_userMD'];
        $objUser->nickname = $_REQUEST['nicknameMD'];
        $objUser->nombre = $_REQUEST['nombreMD'];
        $objUser->apellido_paterno = $_REQUEST['apellido_paternoMD'];
        $objUser->apellido_materno = $_REQUEST['apellido_maternoMD'];
        $objUser->direccion = $_REQUEST['direccionMD'];
        $objUser->telefono = $_REQUEST['telefonoMD'];
        $objUser->correo = $_REQUEST['correoMD'];
        $objUser->password = $_REQUEST['passwordMD'];
        $objUser->status = $_REQUEST['statusMD'];
        $objUser->tipo = $_REQUEST['tipoMD'];

        $update = $controller_usuarios->update_user($objUser);
           
        if($update = 1)//si x trae 1 quiere decir que
          {  
              $msgUpdateOK = "Datos Actualizados con Éxito!";
              echo '<script>ok_empleado("'.$msgUpdateOK.'");</script>';
          }
          else{
              $msgUpdateKO = "Error al Actualizar Información!";
              echo '<script>ok_empleado("'.$msgUpdateKO.'");</script>';
              }                     
    }

     if( isset($_POST['delete'])) //Si preciono Eliminar en el Modal
      {

        $id_user = $_REQUEST['id_userMDD'];
      
        $delete = $controller_usuarios->delete_user($id_user);
           
        if($delete = 1)//si x trae 1 quiere decir que
          {  
              $msgUpdateOK = "Usuario eliminado con Éxito!";
              echo '<script>ok_empleado("'.$msgUpdateOK.'");</script>';
          }
          else{
              $msgUpdateKO = "Error al Eliminar Usuario!";
              echo '<script>ok_empleado("'.$msgUpdateKO.'");</script>';
              }                     
    }
      ?>

  <div class="content-wrapper">
    <div class="container-fluid">

        <!-- inicia div de registro de usuarios-->
     <center><div class="card-header">Registrar un Empleado <img src="./icons/addUser.svg" style="width:23px; height:23px;" /></div></center>
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
                    <input class="form-control" id="telefono" name="telefono" type="tel" aria-describedby="telHelp" placeholder="Escribe teléfono" onkeypress="return validaNum(event)" maxlength="10">
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
                  <th>Tipo de Usuario</th>
                  <th>Acción</th>
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
                  <th>Tipo de Usuario</th>
                  <th>Acción</th>
                </tr>
              </tfoot>
              <tbody>
              <?php
                  foreach ($users as $u)
                  {
                    if($u->status == 0)
                    {
                      $statusT = "Inactivo";
                    }elseif($u->status == 1)
                        {
                          $statusT = "Activo";
                        }

                  if($u->tipo == 0)
                    {
                      $tipoT = "Empleado";
                    }elseif($u->tipo == 1)
                        {
                          $tipoT = "Administrador";
                        }
                //Obtener variables para enviar el Modal
                 $id = $u->id_user;
                 $nickname = $u->nickname;
                 $nombre = $u->nombre;
                 $apellido_paterno = $u->apellido_paterno;
                 $apellido_materno = $u->apellido_materno;
                 $direccion = $u->direccion;
                 $telefono = $u->telefono;
                 $correo = $u->correo;
                 $tipo = $u->tipo;
                 $status = $u->status;
                 $password = $u->password;

             echo "<tr>
                      <td>$u->nickname</td>
                      <td>$u->nombre". " "."$u->apellido_paterno". " "."$u->apellido_materno</td>
                      <td>$u->direccion</td>
                      <td>$u->telefono</td>
                      <td>$u->correo</td>
                      <td>$statusT</td>
                      <td>$tipoT</td>
                      
                      <td>
                         <a title='Editar Información' data-toggle='modal' data-target='#edit_user_modal' onclick='javascript:TratarModeDialog($id,\"".$nickname."\",\"".$nombre."\",\"".$apellido_paterno."\",\"".$apellido_materno."\",\"".$direccion."\",\"".$telefono."\",\"".$correo."\",\"".$password."\",$status,$tipo);' ><span class='badge badge-pill badge-default'><img src='./icons/edit_user.svg' style='width:23px; height:23px;' /></span></a>

                          <a title='Eliminar Usuario' data-toggle='modal' data-target='#delete_user_modal' onclick='javascript:TratarModeDialogDelete($id);' ><span class='badge badge-pill badge-default'><img src='./icons/delete.svg' style='width:23px; height:23px;' /></span></a>
                      </td>

                      

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
