<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="text-center mt-3 mb-3">
    <p style="color: white; font-weight: bold; margin-top: 10px;">
        Bienvenido al Sistema de Gestión Clínico
    </p>
</div>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  Administrador <b class="caret"></b></a>
                   <ul class="dropdown-menu">
  <li><a href="citas.php"><i class="bi bi-calendar"></i> Citas</a></li>
  <li><a href="crear_usuario.php"><i class="bi bi-person-plus"></i> Crear Usuario</a></li>
  <li><a href="ver_usuarios.php"><i class="bi bi-people"></i> Ver Usuarios</a></li>
  <li><a href="logout.php"><i class="bi bi-box-arrow-right"></i> Salir</a></li>
</ul>

                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="<?php if (isset($pacientes)){echo "active";}?>">
                      <a href="pacientes.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Pacientes</a>
                    </li>
                    <li class="<?php if (isset($pacientes)){echo "active";}?>">
                      <a href="pacientes_expedientes.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Pacientes con Expedientes</a>
                    </li>
                    <li class="<?php if (isset($pacientes_lista)){echo "active";}?>">
                        <a href="pacientes_lista.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Ver Pacientes</a>
                    </li>
                    <li class="<?php if (isset($home_menu)){echo "active";}?>">
                        <a href="home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></i> Venta de productos</a>
                    </li>
                    <li class="<?php if (isset($item_menu)){echo "active";}?>">
                        <a href="item.php"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Lista de productos</a>
                    </li>
                    <li class="<?php if (isset($products_menu)){echo "active";}?>">
                        <a href="product.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Perfil del producto</a>
                    </li>
                    <li class="<?php if (isset($stock_menu)){echo "active";}?>">
                        <a href="stock.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Inventario</a>
                    </li>
                    <li class="<?php if (isset($stock_menu)){echo "active";}?>">
                        <a href="productos_vendidos.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Productos mas vendidos</a>
                    </li>
                    <li>
                        <a href="pdf.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Manual de ayuda</a>
                    </li>
                    <li>
                    <img src="IMG/SGC.JPG" width="190px" height="120px">
                    </li>


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
