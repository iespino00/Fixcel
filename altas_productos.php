
<?php
 
// session_start();
 require_once 'header.php';
 require_once 'models/Productos.php';
 require_once 'models/Subcategorias.php';
 error_reporting(E_ALL ^ E_WARNING);
 $nickname =  $_SESSION['nickname'];
 $tipo =  $_SESSION['tipo'];

 
require_once 'controllers/ControllerProductos.php';
$controller_productos = new ControllerProductos();
$productos = $controller_productos->getAllProductos();

require_once 'controllers/ControllerSubcategorias.php';
$controller_subcategorias = new ControllerSubcategorias();
$subcategorias = $controller_subcategorias->getAllSubcategorias();
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



   function EditModeDialog($id_producto,$descripcion_producto,$costo_unitario,$costo_proveedor,$stock_seguridad,$stock_disponible)
       {

         var id_producto=$id_producto;
         var descripcion_producto=$descripcion_producto;   
         var costo_unitario=$costo_unitario;   
         var costo_proveedor=$costo_proveedor;   
         var stock_seguridad=$stock_seguridad;   
         var stock_disponible=$stock_disponible;   

             
       document.getElementById('id_productoMD').value = id_producto;   
       document.getElementById('descripcion_productoMD').value = descripcion_producto;
       document.getElementById('costo_unitarioMD').value = costo_unitario;
       document.getElementById('costo_proveedorMD').value = costo_proveedor;
       document.getElementById('stock_seguridadMD').value = stock_seguridad;
       document.getElementById('stock_disponibleMD').value = stock_disponible;
       
        }
</script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <?php
        //MENU DE OPCIONES // NAVBAR
        include("menu.php");

       
 if( isset($_POST['registrar']) ) 
   {

           $objProducto = new Productos();
           $objProducto->id_subcategoria = $_REQUEST['id_subcategoria'];
           $objProducto->descripcion_producto = $_REQUEST['descripcion_producto'];
           $objProducto->costo_unitario = $_REQUEST['costo_unitario'];
           $objProducto->costo_proveedor = $_REQUEST['costo_proveedor'];
           $objProducto->stock_seguridad = $_REQUEST['stock_seguridad'];
           $objProducto->stock_disponible = $_REQUEST['stock_disponible'];

          $resultado = $controller_productos->crear_productos($objProducto);
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

   if( isset($_POST['update'])) //Si preciono Actualizar en el Modal
      {
        $objProducto = new Productos();
        $objProducto->id_producto = $_REQUEST['id_productoMD'];
        $objProducto->descripcion_producto = $_REQUEST['descripcion_productoMD'];
        $objProducto->costo_unitario = $_REQUEST['costo_unitarioMD'];
        $objProducto->costo_proveedor = $_REQUEST['costo_proveedorMD'];
        $objProducto->stock_seguridad = $_REQUEST['stock_seguridadMD'];
        $objProducto->stock_disponible = $_REQUEST['stock_disponibleMD'];

        $update = $controller_productos->update_producto($objProducto);
           
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
     <center><div class="card-header">Registrar un Producto</div></center>
          <div class="card-body">
           <form action="altas_productos.php" method="post"  data-ajax="false">

            <div class="form-group">
                 <center><label for="exampleSelect1">Subcategoría:</label></center>
                    <select class="form-control" id="id_subcategoria" name="id_subcategoria" required>
                    <option value="">Selecciona una opción</option>
                      <?php
                      foreach ($subcategorias as $s)
                       {
                            
                       echo '
                            <option value="'.$s->id_subcategoria.'">'.$s->descripcion_subcategoria.'</option> 
                            '; 
                       }
                       ?>
                    </select>

                        <center><label for="exampleInputdescripcion">Descripción del Producto:</label></center>
                        <input class="form-control" id="descripcion_producto" name="descripcion_producto" type="text" placeholder="Descripción" required>
                 <div class="form-row">
       
                      <div class="col-md-6">
                        <center><label for="exampleInputCostoUnitario">Costo Unitario (El público):</label></center>
                        <input class="form-control" id="costo_unitario" name="costo_unitario" type="text" placeholder="Costo de Venta" required>
                     </div>

                     <div class="col-md-6">
                        <center><label for="exampleInputCostoProveedor">Costo Proveedor:</label></center>
                        <input class="form-control" id="costo_proveedor" name="costo_proveedor" type="text" placeholder="Costo del Proveedor" required>
                     </div>

                     <div class="col-md-6">
                        <center><label for="exampleInputStockSeguridad">Stock de Seguridad:</label></center>
                        <input class="form-control" id="stock_seguridad" name="stock_seguridad" type="text" placeholder="Stock para reabastecer producto" onkeypress="return validaNum(event)" required>
                     </div>

                     <div class="col-md-6">
                        <center><label for="exampleInputstock_disponible">Stock de Actual:</label></center>
                        <input class="form-control" id="stock_disponible" name="stock_disponible" type="text" placeholder="Stock Actual del producto" onkeypress="return validaNum(event)" required>
                     </div>

                 </div>


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
                 $id_producto = $p->id_producto;
                 $id_subcategoria = $p->id_subcategoria;
                 $descripcion_producto = $p->descripcion_producto;
                 $costo_unitario = $p->costo_unitario;
                 $costo_proveedor = $p->costo_proveedor;
                 $stock_seguridad = $p->stock_seguridad;
                 $stock_disponible = $p->stock_disponible;
                 
             echo "<tr>
                      <td><center>$p->id_producto</center></td>
                      <td>$p->descripcion_producto</td>
                      <td><center>$p->descripcion_categoria</center></td>
                      <td><center>$p->descripcion_subcategoria</center></td>
                      <td><center>$ $p->costo_unitario</center></td>
                      <td><center>$ $p->costo_proveedor</center></td>
                      <td><center>$p->stock_disponible PZ</center></td>
                      <td><center>$p->stock_seguridad PZ</center></td>
                      <td>
                      <a title='Editar Información' data-toggle='modal' data-target='#edit_prod_modal' onclick='javascript:EditModeDialog($id_producto,\"".$descripcion_producto."\",$costo_unitario,$costo_proveedor,$stock_seguridad,$stock_disponible);'><span class='badge badge-pill badge-default'><img src='./icons/edit_prod.svg' style='width:23px; height:23px;' /></span></a>

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
