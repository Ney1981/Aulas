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
            // Mostrar la información del aula
            echo '<div class="content-wrapper">';
            echo '<section class="content-header">';
            echo '<a href="http://localhost/Aulas/Aula/'.$seccion["id_aula"].'">';
            echo '<h1>'. $aula["materia"] .'</h1>';
            echo '</a>';
            if($_SESSION["rol"] == "Profesor"){

                echo '<form method="post">
                
                        <h3>Tarea: <input type="text" name="nombre" value="'.$tarea["nombre"].'">
                        <button class="btn btn-success btn-xs" type="submit" data-toggle="tooltip"
                            title="Guardar"><i class="fa fa-check"></i></button></h3>

                        <input type="hidden" name="id" value="'.$exp[1].'">

                        <h3>Fecha Límite:
                        
                            <i class="fa fa-calendar"></i>

                            <input type="text" id="datepicker" name="fecha_limite" value="'.$tarea["fecha_limite"].'">
                            <button class="btn btn-success btn-xs" type="submit" data-toggle="tooltip"
                            title="Guardar"><i class="fa fa-check"></i></button>

                        </h3>

                    
                    
                    </section>  
                    
                    <section class="content">
                    <div class="box">
                    <div class="box-body">

                    <div style="background-color: #00008B; padding: 20px;">
                    <div class="" style="background-color: #0E8EF3; padding: 50px; border-radius: 10px;">

                        <button class="btn btn-success pull-right" type="submit">
                        Guardar <i class="fa fa-check"></i></button>

                        <br><br>

                        <textarea id="editor" name="descripcion">
                        
                            '.$tarea["descripcion"].'
                        
                        </textarea>

                        </form>';

                        $guardarTarea = new TareasC();
                        $guardarTarea -> GuardarTareaC();
                        
                echo '<hr>
                    <h3>Archivos:</h3>
                
                    <form method="post" enctype="multipart/form-data">
                
                        <input type="text" name="nombre" placeholder="Nombre de la Tarea" 
                        required>
                        
                        <br><br>

                        <b>Subir Tarea:</b> <input type="file" name="tarea" required>

                        <input type="hidden" name="id_tarea" value="'.$exp[1].'" required>
                        <input type="hidden" name="id_seccion" value="'.$seccion["id"].'" required>

                        <br>

                        <button type="submit" class="btn btn-success">Subir</button>';

                    $subirTarea = new TareasC();
                    $subirTarea -> SubirTareaC();

                    echo '</form>
                    
                    <hr>';

                    $columna = "id_tarea";
                    $valor = $exp[1];

                    $Tareas = TareasC::VerTC($columna, $valor);

                    foreach ($Tareas as $key => $value) {
                        
                        echo '<h3>'.$value["nombre"].'
                        
                                <a href="http://localhost/Aulas/'.$value["tarea"].'" 
                                download="'.$value["nombre"].'">
                        
                                    <buton class="btn btn-success">Descargar</button>

                                </a>
                                </h3>';
                    }
                    
                    echo '<hr>
                    
                        <a href="http://localhost/Aulas/Entregas/'.$exp[1].'"><button class="btn btn-primary">
                        Ver Entregas</button></a>

                    </div>

                </div>

                </div>
                </div>

            </section>';

            }else{

                echo '<h3>Tarea: '.$tarea["nombre"].'

                        <h2>Fecha Límite:</2>
                        
                            <i class="fa fa-calendar"></i>

                            '.$tarea["fecha_limite"].'

                        </h3>

                    </section>  
                    
                    <section class="content">
                    <div class="box">
                    <div class="box-body">

                    <div style="background-color: #00008B; padding: 20px;">
                    <div class="" style="background-color: #0E8EF3; padding: 50px; border-radius: 10px;">
                        
                        '.$tarea["descripcion"].'
                        
                        <hr>';


                        //Esta es la parte de los Estudiantes 
                        $columna = "id_tarea";
                        $valor = $exp[1];

                        $Tareas = TareasC::VerTC($columna, $valor);

                        foreach ($Tareas as $key => $value) {
                        
                        echo '<h3>'.$value["nombre"].'
                        
                                <a href="http://localhost/Aulas/'.$value["tarea"].'" 
                                download="'.$value["nombre"].'">
                        
                                    <button class="btn btn-success">Descargar</button>

                                </a>
                                </h3>';
                            }

                            echo '<hr>
                            <h3>Entregas</h3>';

                            $columna = "id_alumno";
                            $valor = $_SESSION["id"];

                            $entregas = TareasC::VerEntregasC($columna, $valor);

                            foreach ($entregas as $key => $ent) {
                                
                                if($ent["id_tarea"] == $exp[1]){

                                    $notas = TareasC::VerNotasC();

                                    foreach ($notas as $key => $nota) {
                                        
                                        if($nota["id_entrega"] == $ent["id"]){

                                            if($nota["estado"] == "Pendiente"){

                                                echo '<p><a href="http://localhost/Aulas/
                                                '.$ent["tarea_alumno"].'" download="'.$ent["tarea_alumno"].'">
                                                '.$value["nombre"].' -</a>
                                                
                                                <button class="btn btn-warning btn-xs">
                                                '.$nota["estado"].'</button></p>';

                                            }else if($nota["estado"] == "Reprobado"){

                                                echo '<p><a href="http://localhost/Aulas/
                                                '.$ent["tarea_alumno"].'" download="'.$ent["tarea_alumno"].'">
                                                '.$value["nombre"].' -</a>
                                                
                                                <button class="btn btn-danger btn-xs">Nota: '.$nota["nota"].'
                                                - '.$nota["estado"].'</button></p>';

                                            }else{

                                                echo '<p><a href="http://localhost/Aulas/
                                                '.$ent["tarea_alumno"].'" download="'.$ent["tarea_alumno"].'">
                                                '.$value["nombre"].' -</a>
                                                
                                                <button class="btn btn-success btn-xs">Nota: '.$nota["nota"].'
                                                - '.$nota["estado"].'</button></p>';
                                            }
                                        }
                                    }
                                }
                            }

                            $fecha_limite = strtotime($tarea["fecha_limite"]);
                            $fecha_actual = strtotime(date("Y-m-d"));

                            if($fecha_actual <= $fecha_limite){

                                echo '<h3>Enviar Entrega:</h3>
                                
                                <form method="post" enctype="multipart/form-data">
                                
                                    <input type="file" name="tarea_alumno" required>

                                    <input type="hidden" name="id_tarea" value="'.$tarea["id"].'">

                                    <input type="hidden" name="id_seccion" value="'.$seccion["id"].'">

                                    <input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'">
                                    
                                    <br>

                                    <button class="btn btn-primary btn-sm" type="submit">Enviar</button>

                                </form>';

                                $entrega = new TareasC();
                                $entrega -> EntregarTareaC();

                            } else {
                                // Mostrar mensaje de que ya pasó la fecha límite
                                echo '<p><span style="color: red;">La fecha límite para 
                                        enviar esta tarea ha Expirado.</span></p>';
                            }
                                     
                        echo '</div>

                        </div>
                        </div>
                    </div>

                    </div>
                    </div>

                </section>';
            }
            
            
            echo '</div>';
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
