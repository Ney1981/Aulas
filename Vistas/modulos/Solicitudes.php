<?php

if($_SESSION["rol"] != "Profesor" && $_SESSION["rol"] != "Administrador"){

    echo '<script>
    
        window.location = "Inicio";
    </script>';

    return;

}

?>

<div class="content-wrapper">

    <section class="content-header">

        <?php

        if($_SESSION["rol"] == "Profesor"){

            echo '<h1>Mis Solicitudes</h1>';

        }else{

            echo '<h1>Solicitudes de Aulas</h1>';
        }

        ?>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

            <div style="background-color: #00008B; padding: 20px;">
            <div class="" style="background-color: #0E8EF3; padding: 50px; border-radius: 10px;">

                <?php

                if($_SESSION["rol"] == "Profesor"){

                    echo'<h2>Aún no Aprobadas</h2>
                    
                        <table class="table table-hover table-bordered table-striped dt-responsive">

                        <thead>

                            <tr>

                                <th>Materia</th>
                                <th>Observaciones</th>
                                <th>Estado</th>

                            </tr>

                        </thead>

                        <tbody>';

                        $resultado = AulasC::VerSolicitudesC();

                        foreach ($resultado as $key => $value) {

                            if($value["estado"] != "Aprobada" && $_SESSION["id"] == $value
                            ["id_profesor"]){

                                echo '<tr>

                                    <td>'.$value["materia"].'</td>
                                    <td>'.$value["observaciones"].'</td>
                                    <td><button class="btn btn-primary">'.$value["estado"].'</button></td>
                                
                                </tr>';

                            }
                             
                        }

                    echo '</tbody>

                    </table>';

                    echo'<h2>Aprobadas</h2>
                    
                        <table class="table table-hover table-bordered table-striped dt-responsive">

                        <thead>

                            <tr>

                                <th>Materia</th>
                                <th>Observaciones</th>
                                <th>Estado</th>

                            </tr>

                        </thead>

                        <tbody>';

                        $resultado = AulasC::VerSolicitudesC();

                        foreach ($resultado as $key => $value) {

                            if($value["estado"] == "Aprobada" && $_SESSION["id"] == $value
                            ["id_profesor"]){

                                echo '<tr>

                                    <td>'.$value["materia"].'</td>
                                    <td>'.$value["observaciones"].'</td>
                                    <td><button class="btn btn-success">'.$value["estado"].'</button></td>
                                
                                </tr>';

                            }
                             
                        }

                    echo '</tbody>

                    </table>';

                }else{

                    echo'<h2>Aún no Aprobadas</h2>
                    
                        <table class="table table-hover table-bordered table-striped dt-responsive">

                        <thead>

                            <tr>

                                <th>Materia</th>
                                <th>Profesor</th>
                                <th>Observaciones</th>
                                <th>Estado</th>
                                <th></th>

                            </tr>

                        </thead>

                        <tbody>';

                        $resultado = AulasC::VerSolicitudesC();

                        foreach ($resultado as $key => $value) {

                            if($value["estado"] != "Aprobada"){

                                echo '<tr>

                                    <td>'.$value["materia"].'</td>';

                                    $columna = "id";
                                    $valor = $value["id_profesor"];

                                    $profesor = UsuariosC::VerUsuariosC($columna, $valor);

                                    echo '<td>'.$profesor["apellido"].' '.$profesor["nombre"].'</td>';

                                echo '<td>'.$value["observaciones"].'</td>
                                    <td><button class="btn btn-primary">'.$value["estado"].'</button></td>

                                    <td>
                                    
                                        <button class="btn btn-success CrearAula" Soid="'.$value["id"].'" 
                                        data-toggle="modal" data-target="#CrearAula">Aprobar</button>

                                    </td>
                                
                                </tr>';

                            }
                             
                        }

                    echo '</tbody>

                    </table>';

                    echo'<h2>Aprobadas</h2>
                    
                        <table class="table table-hover table-bordered table-striped dt-responsive">

                        <thead>

                            <tr>

                                <th>Materia</th>
                                <th>Profesor</th>
                                <th>Observaciones</th>
                                <th>Estado</th>

                            </tr>

                        </thead>

                        <tbody>';

                        $resultado = AulasC::VerSolicitudesC();

                        foreach ($resultado as $key => $value) {

                            if($value["estado"] == "Aprobada"){

                                echo '<tr>

                                    <td>'.$value["materia"].'</td>';

                                    $columna = "id";
                                    $valor = $value["id_profesor"];

                                    $profesor = UsuariosC::VerUsuariosC($columna, $valor);

                                    echo '<td>'.$profesor["apellido"].' '.$profesor["nombre"].'</td>';

                                echo '<td>'.$value["observaciones"].'</td>
                                    <td><button class="btn btn-success">'.$value["estado"].'</button></td>
                                
                                </tr>';

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

<div class="modal fade" id="CrearAula">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post">

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">

                            <h2>Carrera:</h2>

                            <select id="select2" class="form-control input-lg" style="width: 100%"
                            name="id_carrera" required="">
                        
                                <option value="">Seleccionar...</option>

                                <?php

                                $resultado = CarrerasC::VerCarrerasC();

                                foreach ($resultado as $key => $value) {
                                    
                                    echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                }

                                ?>

                            </select>

                        </div>

                        <div class="form-group">

                            <input type="hidden" name="id_profesor" id="id_profesor" value="">
                            <input type="hidden" name="id" id="id" value="">

                            <h2>Materia:</h2>
                            <input type="text" class="form-control input-lg" name="materia" id="materia" readonly="">

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-success">Aprobar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                </div>

                <?php

                $aula = new AulasC();
                $aula -> CrearAulaC();
                $aula -> ActualizarEstadoSC();

                ?>

            </form>

        </div>
    
    </div>

</div>