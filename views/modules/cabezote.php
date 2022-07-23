<header class="main-header">


  <a href="inicio" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">
      <img src="views/img/plantilla/icono-blanco.png" class="img-responsive" style="padding:10px" alt="">
    </span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">
      <img src="views/img/plantilla/logo-blanco-lineal.png" class="img-responsive" style="padding:10px 0px" alt="">
    </span>
  </a>

  <nav class="navbar navbar-static-top" role="navigation">
    <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">toggle navigation</span>
    </a>

    <!-- Perfil de usuario-->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="" class="dropdown-toggle" data-toggle="dropdown">
            <?php

            if ($_SESSION["foto"] != "") {
              echo '<img src="' . $_SESSION["foto"] . '" class="user-image" alt="">';
            } else {
              echo '<img src="views/img/usuarios/default/anonymous.png" class="user-image" alt="">';
            }


            ?>
            <span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>

          </a>

          <!--Dropdown toggle-->
          <ul class="dropdown-menu">
            <li class="user-body">
              <div class="pull-rigth">
                <a href="salir" class="btn btn-default btn-flat">salir</a>
              </div>

            </li>

          </ul>
        </li>
      </ul>
    </div>

  </nav>

</header>