<div class="content-wrapper">

    <section class="content-header">

        <h1>Mensajes</h1>

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

                echo '<h3>'.$sinLeer.' Mensajes sin leer.</h3>';
            }

            ?>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <a href="http://localhost/Aulas/Mensajes">

                    <button class="btn btn-primary">Recibidos</button>

                </a>

                <a href="http://localhost/Aulas/Mensajes/Enviados">

                    <button class="btn btn-warning">Enviados</button>

                </a>

                <br><br>

                <div style="background-color: #154360; padding: 20px;">
                    <div class="" style="background-color: #85C1E9; padding: 50px; border-radius: 10px;">

                            <?php

                            $exp = explode("/", $_GET["url"]);

                            if(isset($exp[1])){

                                echo '<table class="table table-hover table-bordered 
                                        table-striped dt-responsive">

                                        <thead>
                                            <tr>
                                                <th>Destinatario</th>
                                                <th>Asunto</th>
                                                <th>Mensaje</th>
                                                <th>Fecha</th>
                                                <th></th>
                                            </tr>
                                        </thead>
            
                                        <tbody>';

                                        $columna = null;
                                        $valor = null;

                                        $resultado = MensajesC::VerMensajesC($columna, $valor);

                                        foreach ($resultado as $key => $value) {
                                            
                                            if($_SESSION["id"] == $value["id_envia"]){

                                                $columna = "id";
                                                $valor = $value["id_destinatario"];

                                                $destinatario = UsuariosC::VerUsuariosC($columna, $valor);

                                                echo '<tr>
                                                
                                                        <td>'.$destinatario["apellido"].' '.$destinatario["nombre"].'</td>

                                                        <td>'.$value["asunto"].'</td>';

                                                        $mensaje = substr($value["mensaje"], 0, 30);

                                                    echo '<td>'.$mensaje.'...</td>

                                                        <td>'.$value["fecha"].'</td>

                                                        <td>
                                                        
                                                            <a href="http://localhost/Aulas/Mensaje/'.$value["id"].'">

                                                                <button class="btn btn-primary">Leer</button>

                                                            </a>
                                                        
                                                        </td>

                                                    </tr>';
                                            }
                                        }
                                
                                echo '</tbody>
            
                                    </table>';

                            }else{

                                echo '<table class="table table-hover table-bordered 
                                        table-striped dt-responsive">

                                        <thead>
                                            <tr>
                                                <th>Envía</th>
                                                <th>Asunto</th>
                                                <th>Mensaje</th>
                                                <th>Fecha</th>
                                                <th></th>
                                            </tr>
                                        </thead>
            
                                        <tbody>';

                                        $columna = null;
                                        $valor = null;

                                        $resultado = MensajesC::VerMensajesC($columna, $valor);

                                        foreach ($resultado as $key => $value) {
                                            
                                            if($_SESSION["id"] == $value["id_destinatario"]){

                                                $columna = "id";
                                                $valor = $value["id_envia"];

                                                $destinatario = UsuariosC::VerUsuariosC($columna, $valor);

                                                if($value["leido"] == "No"){

                                                    echo '<tr style="background: #1B4F72; color: #fff">';

                                                }else{

                                                    echo '<tr style="color: black">';

                                                }

                                                echo '
                                                
                                                        <td>'.$destinatario["apellido"].' '.$destinatario["nombre"].'</td>

                                                        <td>'.$value["asunto"].'</td>';

                                                        $mensaje = substr($value["mensaje"], 0, 30);

                                                    echo '<td>'.$mensaje.'...</td>

                                                        <td>'.$value["fecha"].'</td>';

                                                        if($value["leido"] == "No"){

                                                            echo '<td>
                                                            
                                                                    <form method="post">
                                                                
                                                                        <input type="hidden" name="idM" value="'.$value["id"].'">

                                                                        <input type="hidden" name="fecha" value="'.$value["fecha"].'">

                                                                        <button class="btn btn-default" type="submit">Leer</button>

                                                                    </form>

                                                                </td>';

                                                                $leer = new MensajesC();
                                                                $leer -> LeerMensajeC();

                                                        }else{

                                                            echo '<td>
                                                                    <a href="http://localhost/Aulas/Mensaje/'.$value["id"].'">

                                                                        <button class="btn btn-primary">Leer</button>

                                                                    </a>
                                                                    
                                                                </td>';
                                                        }

                                            echo '</tr>';

                                            }
                                        }
                                
                                echo '</tbody>
            
                                    </table>';

                            }

                            ?>

                        </div>

                    </div>

            </div>

        </div>

    </section>

</div>