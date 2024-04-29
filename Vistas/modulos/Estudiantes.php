<?php

if ($_SESSION["rol"] != "Administrador") {
    echo '<script>window.location = "Inicio";</script>';
    return;
}

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>Estudiantes</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

            <div style="background-color: #154360; padding: 20px;">
            <div class="" style="background-color: #85C1E9; padding: 50px; border-radius: 10px;">

                <table class="table table-hover table-bordered table-striped dt-responsive">

                    <thead>
                        <tr>
                            <th>Apellido</th>
                            <th>Nombres</th>
                            <th>Documento</th>
                            <th>Carrera</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        $exp = explode("/", $_GET["url"]);

                        $columna = null;
                        $valor = null;
                        $resultado = UsuariosC::VerUsuariosC($columna, $valor);
                        foreach ($resultado as $key => $value){

                            if(isset($exp[1])){

                                if($value["id_carrera"] == $exp[1]){

                                    echo '<tr>
                                    
                                            <td>'.$value["apellido"].'</td>
                                            <td>'.$value["nombre"].'</td>
                                            <td>'.$value["documento"].'</td>';
    
                                            $carrera = CarrerasC::VerCarrerasC();
    
                                            foreach ($carrera as $key => $c) {
                                                
                                                if($c["id"] == $value["id_carrera"]){
    
                                                    echo '<td>'.$c["nombre"].'</td>';
                                                }
                                            }
    
                                            echo'<td>'.$value["usuario"].'</td>';
                                            // Hashea la contraseña antes de mostrarla
                                            $clave_hashed = hash_pbkdf2("sha256", $value["clave"], $value["salt"], 1000, 32);
                                            echo '<td>'.$clave_hashed.'</td>
                                        </tr>';
                                    }

                            }else{

                                if($value["rol"] == "Estudiante"){

                                    echo '<tr>
                                    
                                            <td>'.$value["apellido"].'</td>
                                            <td>'.$value["nombre"].'</td>
                                            <td>'.$value["documento"].'</td>';
    
                                            
    
                                            $carrera = CarrerasC::VerCarrerasC();
    
                                            foreach ($carrera as $key => $c) {
                                                
                                                if($c["id"] == $value["id_carrera"]){
    
                                                    echo '<td>'.$c["nombre"].'</td>';
                                                }
                                            }
    
                                            
    
                                            echo'<td>'.$value["usuario"].'</td>';
                                            // Hashea la contraseña antes de mostrarla
                                            $clave_hashed = hash_pbkdf2("sha256", $value["clave"], $value["salt"], 1000, 32);
                                            echo '<td>'.$clave_hashed.'</td>
                                        </tr>';
                                }
                            }

                            
                        }

                        ?>

                    </tbody>

                </table>

                </div>
                </div>

            </div>

        </div>

    </section>

</div>

<?php

function encryptPassword($password) {
    // No necesitas esta función en este caso, ya que estás usando PBKDF2 para hashear las contraseñas
}

?>
