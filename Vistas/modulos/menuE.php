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
            <a href="http://localhost/Aulas/Aulas-Virtuales">
              <i class="fa fa-university"></i>
              <span>Aulas Virtuales</span>
            </a>
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