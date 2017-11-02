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
                    <select class="form-control" id="tipoMD" name="tipo">
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
              <p><input type='text' placeholder='id' id='idMD' name='idMD' required></p>
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