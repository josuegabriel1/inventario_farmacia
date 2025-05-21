<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
<span class="navbar-brand fw-bold text-uppercase text-light"
      style="pointer-events: none; user-select: none; font-size: 4.1rem;">
  🩺 Bienvenido al Sistema de Citas
</span>

            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  Administrador <b class="caret"></b></a>
                    <ul class="dropdown-menu">
  <li><a href="home.php"><i class="bi bi-house"></i> Volver al Panel</a></li>
  <li><a href="logout.php"><i class="bi bi-box-arrow-right"></i> Salir</a></li>
</ul>

                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="<?php if (isset($home_menu)){echo "active";}?>">
                        <a href="citas.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></i> Citas</a>
                    </li>
                    <li class="<?php if (isset($pacientes)){echo "active";}?>">
                        <a href="ver_citas.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Ver Citas</a>
                    </li>  
                    <li>
                    <img src="IMG/SGC.JPG" width="192px" height="130px">
                    </li>          


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
