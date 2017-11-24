  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="panel.php">FIXCEL Bienvenido <?php echo $_SESSION['nickname'];?> </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

      <?php
       if($_SESSION['tipo'] == 1)
        {
      ?>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Catálogos">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-cubes"></i>
            <span class="nav-link-text"><b>Catálogos (Altas)</b></span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="altas_empleados.php" class="fa fa-user-circle-o"> Empleados</a>
            </li>
            <li>
              <a href="altas_categorias.php" class="fa fa-list-alt"> Categoria de productos</a>
            </li>
            <li>
              <a href="altas_subCategorias.php" class="fa fa-list-ul"> Subcategoria de productos</a>
            </li>
            <li>
              <a href="altas_productos.php" class="fa fa-barcode" > Productos</a>
            </li>
         </ul>
      </li>


      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reportes">
          <a class="nav-link" href="reportes.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text"><b>Reportes</b></span>
          </a>
      </li>
     
     <?php
        }
      if($_SESSION['tipo'] == 0)
       {?>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Stock de productos">
                 <a class="nav-link" href="stock_report.php">
                  <i class="fa fa-fw fa-table"></i>
                  <span class="nav-link-text"><b>Stock de Productos</b></span>
                </a>
              </li>
      <?php }
      ?>
      
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Imprimir Códigos de Barras">
          <a class="nav-link" href="print_barcode.php">
            <i class="fa fa-barcode"></i>
            <span class="nav-link-text"><b>Códigos de Barras</b></span>
          </a>
        </li>
		
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sección de Ventas">
          <a class="nav-link" href="panel.php">
            <i class="fa fa-money"></i>
            <span class="nav-link-text"><b>Vender</b></span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Cancelación de Tickets">
          <a class="nav-link" href="cancelar_ticket.php">
            <i class="fa fa-ticket"></i>
            <span class="nav-link-text"><b>Cancelar Ticket</b></span>
          </a>
        </li>

      </ul>

      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
         <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#corte_modal"><b>Hacer corte del día</b></button></a>
        <br>
       </li>

        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Buscar producto...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <!--
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#logout_modal">
            <i class="fa fa-fw fa-sign-out"></i>Cerrar Sesión</a>
        </li>    -->

        <li>
          <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Opciones
            </button>
             <div class="dropdown-menu dropdown-menu-right">
              <a href="config_cuenta.php"><button class="dropdown-item" type="button"  >Configuración de la cuenta</button></a>
              <a data-toggle="modal" data-target="#logout_modal"> <button class="dropdown-item" type="button">Cerrar Sesión</button></a>
            </div>
        </div>
        </li>

      </ul>
    </div>
  </nav>