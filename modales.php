    



    <!-- MODAL DE CERRAR SESIÓN-->

   <div class="modal fade" id="logout_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h5 class="modal-title" id="exampleModalLabel">¿Deseas cerrar Sesión?</h5></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Da clic en "Salir" si deseas terminar tu sesión.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary btn-danger" href="index.php">Salir</a>
          </div>
        </div>
      </div>
    </div>



    <!-- MODAL CORTE DE CAJA-->

   <div class="modal fade" id="corte_modal" tabindex="-1" role="dialog" aria-labelledby="corte_modalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h5 class="modal-title" id="exampleModalLabel">¿Deseas Realizar el Corte del Día?</h5></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Da clic en "SI" si deseas hacer el corte del día.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
            <a class="btn btn-primary btn-danger" href="#">Si</a>
          </div>
        </div>
      </div>
    </div>

        <!-- MODAL MODIFICAR USUARIOS-->

   <div class="modal fade" id="edit_user_modal" tabindex="-1" role="dialog" aria-labelledby="edit_user_modallLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h5 class="modal-title" id="edit_user_modallLabel">Modificar Información</h5></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form name="update" action='altas_empleados.php'  method='POST' enctype='multipart/form-data'>
              <div class="card-body">
                <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <center><label for="exampleInputName">Nombre:</label></center>
                    <input class="form-control" id="nombreMD" name="nombreMD" type="text" aria-describedby="nameHelp" placeholder="Escribe el nombre">
                  </div>
                  <div class="col-md-6">
                    <center><label for="exampleInputLastName">Nickname:</label></center>
                    <input class="form-control" id="nicknameMD" name="nicknameMD" type="text" aria-describedby="nameHelp" placeholder="Escribe el Nickname">
                  </div>
                   <div class="col-md-6">
                    <center><label for="exampleInputLastName">Apellido Paterno:</label></center>
                    <input class="form-control" id="apellido_paternoMD" name="apellido_paternoMD" type="text" aria-describedby="nameHelp" placeholder="Escribe el Apellido Paterno">
                  </div>
                   <div class="col-md-6">
                    <center><label for="exampleInputLastName">Apellido Materno:</label></center>
                    <input class="form-control" id="apellido_maternoMD" name="apellido_maternoMD" type="text" aria-describedby="nameHelp" placeholder="Escribe el Apellido Materno">
                  </div>
                  
                   <div class="col-md-6">
                  <center><label for="exampleInputEmail1">Dirección:</label></center>
                <input class="form-control" id="direccionMD" name="direccionMD" type="text" aria-describedby="nameHelp" placeholder="Escribe la dirección">
                </div>
                    
                     <div class="col-md-6">
                 <center><label for="example-tel-input">Telefono:</label></center>
                    <input class="form-control" id="telefonoMD" name="telefonoMD" type="tel" aria-describedby="telHelp" placeholder="Escribe teléfono">
                    </div>

                <div class="col-md-6">
                  <center><label for="exampleInputEmail1">Correo:</label></center>
                <input class="form-control" id="correoMD" name="correoMD" type="email" aria-describedby="emailHelp" placeholder="Escribe el Correo">
                </div>

                  <div class="col-md-6">
                    <center><label for="exampleSelect1">Tipo de Usuario:</label></center>
                    <select class="form-control" id="tipoMD" name="tipoMD">
                      <option value="0">Empleado</option>
                      <option value="1">Administrador</option>
                    </select>
                  </div>

                </div>
              </div>
              
              <div class="col-md-6">
                    <center><label for="exampleSelect1">Estado de la Cuenta:</label></center>
                    <select class="form-control" id="statusMD" name="statusMD">
                      <option value="1">Activa</option>
                      <option value="0">Inactiva</option>
                      </select>
                  </div>

              <div class="form-group">
                <center><label for="exampleInputPassword1">Password:</label></center>
                <input class="form-control" id="passwordMD" name="passwordMD" type="password" placeholder="Password">
              </div>
              <p><input type='text' placeholder='id' id='id_userMD' name='id_userMD' style='visibility:hidden' required></p>
            </div>
                              
            <!--  <center><button type='submit' class='button small special' id='update' name='update'>Actualizar</button></center>-->
           

            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
              <a ><button type='submit' class='btn btn-primary btn-danger' id='update' name='update'>Actualizar</button></a>
             <!-- <a class="btn btn-primary btn-danger" href="#">Si</a>-->
            </div>
          </form>
        </div>
      </div>
    </div>

       <!-- MODAL DELETE USUARIOS-->

   <div class="modal fade" id="delete_user_modal" tabindex="-1" role="dialog" aria-labelledby="edit_user_modallLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h5 class="modal-title" id="edit_user_modallLabel">Seguro que deseas eliminar el Usuario</h5></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form name="update" action='altas_empleados.php'  method='POST' enctype='multipart/form-data'>
              <div class="card-body">
               <p><input type='text' placeholder='id' id='id_userMDD' name='id_userMDD' style='visibility:hidden' required></p>
              </div>
                    
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
              <a ><button type='submit' class='btn btn-primary btn-danger' id='delete' name='delete'>SI</button></a>
             <!-- <a class="btn btn-primary btn-danger" href="#">Si</a>-->
            </div>
          </form>
        </div>
      </div>
    </div>




  <!-- MODAL MODIFICAR SUBCATEGORIAS-->

   <div class="modal fade" id="edit_subcategoria_modal" tabindex="-1" role="dialog" aria-labelledby="edit_subcategoria_modallLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h5 class="modal-title" id="edit_subcategoria_modallLabel">Modificar Información</h5></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form name="update" action='altas_subcategorias.php'  method='POST' enctype='multipart/form-data'>
             <center> <div class="card-body">
                <div class="form-group">
                    <center><label for="exampleInputName">Descripción Subcategoria:</label></center>
                    <input class="form-control" id="descripcion_subcategoriaMD" name="descripcion_subcategoriaMD" type="text" aria-describedby="nameHelp" placeholder="Escribe el nombre">

              </div>

              <p><input type='text' placeholder='id' id='id_subcategoriaMD' name='id_subcategoriaMD' style='visibility:hidden' required></p>
            </div></center>
                              
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
              <a ><button type='submit' class='btn btn-primary btn-danger' id='update' name='update'>Actualizar</button></a>
             <!-- <a class="btn btn-primary btn-danger" href="#">Si</a>-->
            </div>
          </form>
        </div>
      </div>
    </div>


            <!-- MODAL MODIFICAR PRODUCTO-->

   <div class="modal fade" id="edit_prod_modal" tabindex="-1" role="dialog" aria-labelledby="edit_prod_modalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h5 class="modal-title" id="edit_prod_modallLabel">Modificar Información</h5></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form name="update" action='altas_productos.php'  method='POST' enctype='multipart/form-data'>
             <center> <div class="card-body">
                
                <div class="form-group">
                       <center><label for="exampleInputdescripcion">Descripción del Producto:</label></center>
                            <input class="form-control" id="descripcion_productoMD" name="descripcion_productoMD" type="text" placeholder="Descripción" required>
                     <div class="form-row">
           
                          <div class="col-md-6">
                            <center><label for="exampleInputCostoUnitario">Costo Unitario (El público):</label></center>
                            <input class="form-control" id="costo_unitarioMD" name="costo_unitarioMD" type="text" placeholder="Costo de Venta" required>
                         </div>

                         <div class="col-md-6">
                            <center><label for="exampleInputCostoProveedor">Costo Proveedor:</label></center>
                            <input class="form-control" id="costo_proveedorMD" name="costo_proveedorMD" type="text" placeholder="Costo del Proveedor" required>
                         </div>

                         <div class="col-md-6">
                            <center><label for="exampleInputStockSeguridad">Stock de Seguridad:</label></center>
                            <input class="form-control" id="stock_seguridadMD" name="stock_seguridadMD" type="text" placeholder="Stock para reabastecer producto" onkeypress="return validaNum(event)" required>
                         </div>

                         <div class="col-md-6">
                            <center><label for="exampleInputstock_disponible">Stock de Actual:</label></center>
                            <input class="form-control" id="stock_disponibleMD" name="stock_disponibleMD" type="text" placeholder="Stock Actual del producto" onkeypress="return validaNum(event)" required>
                         </div>

                     </div>


                </div>

              <p><input type='text' placeholder='id' id='id_productoMD' name='id_productoMD' style='visibility:hidden' required></p>
            </div></center>
                              
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
              <a ><button type='submit' class='btn btn-primary btn-danger' id='update' name='update'>Actualizar</button></a>
             <!-- <a class="btn btn-primary btn-danger" href="#">Si</a>-->
            </div>
          </form>
        </div>
      </div>
    </div>


                <!-- MODAL IMPRIMIR CÓDIGO DE BARRAS-->

   <div class="modal fade" id="print_barras_modal" tabindex="-1" role="dialog" aria-labelledby="print_barras_modalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h5 class="modal-title" id="print_barras_modallLabel">Imprimir</h5></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form name="update" action='print_barcode.php'  method='POST' enctype='multipart/form-data'>
             <center> <div class="card-body">
                
                <div class="form-group">
                    <div class="col-md-7">
                       <center><label for="exampleInputdescripcion">Presiona en "Aceptar" si deseas imprimir el Código de Barras:</label></center>
                            <input class="form-control" id="cantidadMD" name="cantidadMD" type="number" placeholder="Copias" onkeypress="return validaNum(event)" min="1" max="18"  style='visibility:hidden' >

                       <input class="form-control" id="codeMD" name="codeMD" type="text" placeholder="Codigo" style='visibility:hidden' required>
                     </div>

                </div>

            
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
              <a ><button type='submit' class='btn btn-primary btn-danger' id='print' name='print'>Imprimir</button></a>
             <!-- <a class="btn btn-primary btn-danger" href="#">Si</a>-->
            </div>
          </form>
        </div>
      </div>
    </div>