<header class="main-header">
    <!-- Logo -->
    <a href="http://localhost/Aulas/Inicio" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b class="fa fa-university"></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Aula Virtual</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

            <?php

            if($_SESSION["foto"] == ""){

              echo '<img src="http://localhost/Aulas/Vistas/img/img-1.png" class="user-image" alt="User Image">';

            }else{

              echo '<img src="http://localhost/Aulas/'.$_SESSION["foto"].'" class="user-image" alt="User Image">';

            }

            echo '<span class="hidden-xs">'.$_SESSION["nombre"].' '.$_SESSION["apellido"].'</span>';

            ?>
              
              
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="height: auto;">

              <?php

              echo '<p>
              '.$_SESSION["nombre"].' '.$_SESSION["apellido"].'';

              if($_SESSION["id_carrera"] == 0){

              echo '<br><br><small>'.$_SESSION["rol"].'</small>';

              }else{

              $resultado = CarrerasC::VerCarrerasC();

              foreach ($resultado as $key => $value) {
        
              if($value["id"] == $_SESSION["id_carrera"]){

            echo '<br><br><small>'.$value["nombre"].'</small>';
        }
    }
}

echo'</p>';
?>


                
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="http://localhost/Aulas/Mis-Datos" class="btn btn-primary btn-flat">Mis Datos</a>
                </div>
                <div class="pull-right">
                  <a href="http://localhost/Aulas/Salir" class="btn btn-danger btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          

        </ul>
      </div>
    </nav>
  </header>