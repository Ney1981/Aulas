<?php

$exp = explode("/", $_GET["url"]);

$columna = "id";
$valor = $exp[1];

$aula = AulasC::VerAulas2C($columna, $valor);

if($_SESSION["rol"] == "Estudiante"){

    $columna = "id_aula";
    $valor = $exp[1];
    $columna2 = "id_alumno";
    $valor2 = $_SESSION["id"];

    $inscripto = AlumnosC::VerInscriptoC($columna, $valor, $columna2, $valor2);

    if($inscripto == false){

        echo '<script>
        
            window.location = "http://localhost/Aulas/Aulas-Virtuales";
        </script>';
    }

}else if($_SESSION["rol"] == "Profesor" && $_SESSION["id"] != $aula["id_profesor"]){

    echo '<script>
        
            window.location = "http://localhost/Aulas/Mis-Aulas";
        </script>';
}

?>

<div class="content-wrapper">

    <section class="content-header">

        <?php

        echo '<h1>Aula Virtual de la materia: <b>'.$aula["materia"].'</b></h1>';

        ?>

    </section>

    <section class="content">

        <?php

        if($_SESSION["rol"] == "Profesor"){

            echo '<form method="post">

                    <input type="hidden" name="id_aula" value="'.$exp[1].'">

                    <button type="submit" class="btn btn-primary">Agregar Nueva Sección</button>';

                $crearS = new SeccionesC();
                $crearS -> CrearSeccionC();

                echo '</form>';

        }else{

            $columna = "id";
            $valor = $aula["id_profesor"];

            $profesor = UsuariosC::VerUsuariosC($columna, $valor);

            echo '<h3><b>Profesor: </b>'.$profesor["apellido"].' '.$profesor["nombre"].' - 
            
                <a href="http://localhost/Aulas/Enviar-Mensaje/'.$profesor["id"].'">Enviar Mensaje</a>

            </h3>';

        }

        if($_SESSION["rol"] == "Profesor"){

            echo '<a href="http://localhost/Aulas/Inscriptos/'.$exp[1].'">
            
                <button class="btn btn-success pull-right">Ver Alumnos Inscriptos</button>    
            </a>
            
            <br>';

        }else if($_SESSION["rol"] == "Estudiante"){

            echo '<form method="post">

                <input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'">
                <input type="hidden" name="id_aula" value="'.$exp[1].'">


            </form>';

            // <button type="submit" class="btn btn-danger">Dar de Baja</button>


            $darbaja = new AlumnosC();
            $darbaja -> DarBajaC();

        }

        ?>

        <br><br>
        
        <div style="background-color: #154360; padding: 20px;">
            <div class="" style="background-color: #85C1E9; padding: 50px; border-radius: 10px;">

        <?php

        $columna = null;
        $valor = null;

        $resultado =SeccionesC::VerSeccionesC($columna, $valor);

        foreach ($resultado as $key => $value) {
            
            if($value["id_aula"] == $exp[1]){

                echo '<div class="box">

                <div class="box-header">';

                    if($_SESSION["rol"] == "Profesor"){

                        echo '<form method="post">
    
                                <h3 class="box-title"><input type="text" name="nombre"
                                class="form-control" value="'.$value["nombre"].'"></h3>

                                <input type="hidden" name="id_seccion"
                                value="'.$value["id"].'">
    
                                <button type="submit" class="btn btn-success">
                                <i class="fa fa-pencil"></i></button>';

                                $nombre = new SeccionesC();
                                $nombre -> EditarNombreSC();
    
                            echo '</form>';

                    }else{

                        echo '<h3 class="box-title">'.$value["nombre"].'</h3>';

                    }
    
                    echo '<div class="box-tools pull-right">
    
                        <button type="button" class="btn" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>';

                        if($_SESSION["rol"] == "Profesor"){

                            echo '<button class="btn btn-danger BorrarSeccion" Sid="'.$value["id"].'" 
                            data-toggle="modal" data-target="#BorrarSeccion"><i class="fa fa-times"></i>
                                </button>';
                        }
    
                    echo '</div>
    
                </div>
    
                <div class="box-body">
                
                
            <div class="" style="background-color: #85C1E9; padding: 50px; border-radius: 10px;">';

                if($_SESSION["rol"] == "Profesor"){

                    if($value["descripcion"] == ""){

                        echo '<a href="http://localhost/Aulas/D-S/'.$value["id"].'">
    
                                <button class="btn btn-success">Agregar Descripción</button>
    
                            </a>';
                    }else{

                        echo ''.$value["descripcion"].'
                        
                        <a href="http://localhost/Aulas/D-S/'.$value["id"].'">
    
                                <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
    
                            </a>
                        ';
                    }

                }else{

                    echo $value["descripcion"];
                }

                if($_SESSION["rol"] == "Profesor"){

                    echo '<hr>
                    
                        <button class="btn btn-primary AgregarArchivo" Sid="'.$value["id"].'" 
                        data-toggle="modal" 
                        data-target="#AgregarArchivo">Agregar Archivo</button>';

                    echo '<br>
                        <h3><b>Archivos:</b></h3>';

                        $columna = "id_seccion";
                        $valor = $value["id"];

                        $archivos = SeccionesC::VerArchivosC($columna, $valor);

                        foreach ($archivos as $key => $arch) {
                            
                            echo '<form method="post">
                            
                                    '.$arch["nombre"].' - <a href="http://localhost/Aulas/'.$arch["archivo"].'"
                                    download="'.$arch["nombre"].'">Descargar Archivos</a>

                                    <input type="hidden" name="id" value="'.$arch["id"].'">
                                    <input type="hidden" name="id_a" value="'.$exp[1].'">
                                    <input type="hidden" name="archivo" value="'.$arch["archivo"].'">

                                    <button class="btn btn-danger btn-xs" type="submit" data-toggle="tooltip" 
                                    title="Eliminar Archivo"><i class="fa fa-trash"></i></button>

                                </form>
                                <br>';

                                $borrarArch = new SeccionesC();
                                $borrarArch -> borrarArchivoC();

                        }

                        echo '<hr>
                            
                                <h3><b>Tareas:</b></h3>
                                
                                <form method="post" >
                                
                                    <input type="hidden" name="idSeccion" value="'.$value["id"].'">

                                    <button type="submit" class="btn btn-warning">Agregar Tarea</button>

                                </form>
                                <br>';

                        $columna = "id_seccion";
                        $valor = $value["id"];

                        $Tareas = TareasC::VerTareasC($columna, $valor);

                        foreach ($Tareas as $key => $tarea) {
                        
                            echo '<form method="post">
                            
                            <a href="http://localhost/Aulas/Tarea/'.$tarea["id"].'">
                        
                            <button type="button" class="btn btn-warning">'.$tarea["nombre"].'
                            <i class="fa fa-eye"></i></button> - ';

                            if($tarea["fecha_limite"] == ""){

                            echo 'Sin Fecha Límite Aún.';

                    }else{

                        echo $tarea["fecha_limite"];
                    }

                        echo '</a>
                        
                            
                            
                                <input type="hidden" name="idT" value="'.$tarea["id"].'">
                                <input type="hidden" name="idAula" value="'.$exp[1].'">

                                <button class="btn btn-danger btn-xs" type="submit" data-toggle="tooltip" 
                                    title="Eliminar Archivo"> <i class="fa fa-trash"></i></button>';

                            $borrarTarea = new SeccionesC();
                            $borrarTarea -> BorrarTareaC();

                            echo '</form>

                        <br><br>';
                    }

                        
                }else{

                    echo '<hr>
                    
                    <h3><b>Archivos:</b></h3>';

                        $columna = "id_seccion";
                        $valor = $value["id"];

                        $archivos = SeccionesC::VerArchivosC($columna, $valor);

                        foreach ($archivos as $key => $arch) {
                            
                            echo '
                            
                                    '.$arch["nombre"].' - <a href="http://localhost/Aulas/'.$arch["archivo"].'"
                                    download="'.$arch["nombre"].'">Descargar Archivos</a>
                                    <br><br>';

                    }

                    echo '<hr>
                            <h3><b>Tareas:</b></h3>';

                    $columna = "id_seccion";
                    $valor = $value["id"];

                    $Tareas = TareasC::VerTareasC($columna, $valor);

                    foreach ($Tareas as $key => $tarea) {
                        
                        echo '<a href="http://localhost/Aulas/Tarea/'.$tarea["id"].'">
                        
                        <button type="button" class="btn btn-warning">'.$tarea["nombre"].'
                        <i class="fa fa-eye"></i></button> - ';

                    if($tarea["fecha_limite"] == ""){

                        echo 'Sin Fecha Límite Aún.';

                    }else{

                        echo $tarea["fecha_limite"];
                        
                    }

                        echo '</a>';
                    }
                }

                echo '</div>
    
            </div>';
            }
        }

        ?>

        </div>
        </div>

    </section>

</div>

<div class="modal fade" id="AgregarArchivo">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">

                            <h2>Nombre del Archivo:</h2>

                            <input type="text" class="form-control input-lg" name="nombreA" required="">

                            <input type="hidden" id="idS" name="id_s" value="">

                            <?php

                            echo '<input type="hidden" name="id_a" value="'.$exp[1].'">';

                            ?>
                            
                        </div>

                        <div class="form-group">

                            <h2>Archivo:</h2>

                            <input type="file" class="form-control input-lg" name="archivo" required="">

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Agregar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

                </div>

                <?php

                $agregar = new SeccionesC();
                $agregar -> AgregarArchivoC();

                ?>

            </form>

        </div>

    </div>

</div>

<div class="modal fade" id="BorrarSeccion">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post">

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">

                            <h2>¿Eliminar esta Seccion?</h2>

                            <input type="hidden" class="form-control input-lg" id="idSE" name="idS" required="">

                            <?php

                            echo '<input type="hidden" name="id_a" value="'.$exp[1].'">';

                            ?>
                            
                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-success">Si</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

                </div>

                <?php

                $borrarSeccion = new SeccionesC();
                $borrarSeccion -> BorrarSeccionC();

                ?>

            </form>

        </div>

    </div>

</div>

<?php

$tarea = new TareasC();
$tarea -> AgregarTareaC();