<?php
// Obtener el ID de la tarea de la URL
$exp = explode("/", $_GET["url"]);
$tarea_id = $exp[1];

// Obtener los datos de la tarea
$tarea = TareasC::VerTareaC("id", $tarea_id);

// Verificar si la tarea existe
if ($tarea) {
    // Obtener el ID de la sección relacionada con la tarea
    $seccion_id = $tarea["id_seccion"];

    // Obtener los datos de la sección
    $seccion = SeccionesC::VerSeccionesC("id", $seccion_id);

    // Verificar si la sección existe
    if ($seccion) {
        // Obtener el ID del aula relacionada con la sección
        $aula_id = $seccion["id_aula"];

        // Obtener los datos del aula
        $aula = AulasC::VerAulas2C("id", $aula_id);

        // Verificar si el aula existe
        if ($aula) {

            
        } else {
            echo "El aula relacionada no existe.";
        }
    } else {
        echo "La sección relacionada no existe.";
    }
} else {
    echo "La tarea especificada no existe.";
}
?>


<div class="content-wrapper">

    <section class="content-header">

    <?php

        echo '<h1>Entregas de la tarea: <b>'.$tarea["nombre"].'</b></h1>
        <h3>Fecha límite: <b>'.$tarea["fecha_limite"].'</b></h3>';

    ?>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

            <div style="background-color: #154360; padding: 20px;">
            <div class="" style="background-color: #85C1E9; padding: 50px; border-radius: 10px;">

                <table class="table table-hover table-striped table-bordered dt-responsive">

                    <thead>

                        <tr>

                            <th>Alumno</th>
                            <th>Tarea</th>
                            <th></th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php

                            $columna = "id_tarea";
                            $valor = $exp[1];

                            $resultado = TareasC::VerEntregasC($columna, $valor);

                            foreach ($resultado as $key => $value) {

                                $columna = "id";
                                $valor = $value["id_alumno"];

                                $alumno = UsuariosC::VerUsuariosC($columna, $valor);
                                
                                echo '<tr>
                                
                                        <td>'.$alumno["apellido"].' '.$alumno["nombre"].'</td>

                                        <td>
                                        
                                            <a href="http://localhost/Aulas/'.$value["tarea_alumno"].'"
                                            download="'.$alumno["apellido"].'">
                                            
                                                Descargar Entrega

                                            </a>

                                        </td>';

                                        $notas = TareasC::VerNotasC();

                                        foreach ($notas as $key => $nota) {
                                            
                                            if($nota["id_entrega"] == $value["id"]){

                                                // Obtener el estado de la base de datos
                                                $estado_base_datos = $nota["estado"];

                                                echo '<td>
                                                
                                                        <form method="post">
                                                        
                                                            <div class="col-md-2">
                                                            
                                                                Nota:
                                                                <input type="text" name="nota" style="width:100%"
                                                                required value="'.$nota["nota"].'">

                                                                <input type="hidden" name="id" value="'.$nota["id"].'">

                                                                <input type="hidden" name="id_seccion" value="'.$seccion["id"].'">

                                                                <input type="hidden" name="id_tarea" value="'.$exp[1].'">

                                                            </div>

                                                            <div class="col-md-4">
                                                            
                                                                Estado:
                                                                <select required name="estado" style="width:100%">';
                                                                
                                                                    // Generar opciones del estado con el valor predeterminado
                                                                    $estados = array("Pendiente", "Aprobado", "Reprobado");
                                                                    foreach ($estados as $estado) {
                                                                        $selected = ($estado == $estado_base_datos) ? "selected" : "";
                                                                        echo '<option value="'.$estado.'" '.$selected.'>'.$estado.'</option>';
                                                                    }
                                                                
                                                                echo '</select>

                                                            </div>
                                                            <br>

                                                            <button type="submit" class="btn btn-success btn-xs">Cambiar</button>

                                                        </form>
                                                    
                                                    </td>';
                                            }
                                        }

                                    echo '</tr>';
                            }

                            $cambiarNota = new TareasC();
                            $cambiarNota -> CambiarNotaC();

                        ?>

                    </tbody>

                </table>

            </div>
            </div>

            </div>

        </div>

    </section>

</div>
