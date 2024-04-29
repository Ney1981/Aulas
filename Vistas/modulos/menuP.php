<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    
        <ul class="sidebar-menu">

            <li>
                <a href="http://localhost/Aulas/Inicio">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>

            <li>
                <a href="http://localhost/Aulas/Mis-Aulas">
                    <i class="fa fa-university"></i>
                    <span>Mis Aulas</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list-ul"></i>
                    <span>Solicitar Aulas Virtuales</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- Nuevo código del menú -->
                    <li>
                        <a href="http://localhost/Aulas/Pedir-Aula">
                            <i class="fa fa-edit"></i>
                            <span>Pedir Nueva Aula</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/Aulas/Solicitudes">
                            <i class="fa fa-check-square-o"></i>
                            <span>Ver Solicitudes</span>
                        </a>
                    </li>
                    <!-- Fin del nuevo código del menú -->
                </ul>
            </li>

            <li>
            <a href="http://localhost/Aulas/Mensajes">
              <i class="fa fa-envelope"></i>
              <span>Mensajes</span>

              <span class="pull-right-container">

                <?php

                $columna = "id_destinatario";
                $valor = $_SESSION["id"];

                $resultado = MensajesC::SinLeerC($columna, $valor);
                $sinLeer = 0;

                foreach ($resultado as $key => $value) {
                  
                  if($value["leido"] == "No"){

                    ++$sinLeer;
                  }

                }

                if($sinLeer > 0){

                  echo '<small class="label pull-right bg-blue" data-toggle="tooltip" 
                      title="Sin Leer">'.$sinLeer.'</small>';
                }

                ?>

              </span>

            </a>
          </li>

        </ul>

    </section>
    <!-- /.sidebar -->
</aside>
