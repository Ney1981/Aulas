<?php

if ($_SESSION["rol"] != "Administrador") {
    echo '<script>window.location = "Inicio";</script>';
    return;
}

?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>Gestor de Usuarios "Administradores y Profesores"</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#CrearUsuario">Crear Nuevo Usuario</button>
            </div>

            <div class="box-body">
                <h2>Mostrar usuarios de tipo:</h2>
                <a href="http://localhost/Aulas/Usuarios">
                    <button class="btn btn-defauld">Todos</button>
                </a>
                <a href="http://localhost/Aulas/Usuarios/1">
                    <button class="btn btn-primary">Administradores</button>
                </a>
                <a href="http://localhost/Aulas/Usuarios/2">
                    <button class="btn btn-success">Profesores</button>
                </a>
                <br><br>

                <div style="background-color: #154360; padding: 20px;">
                <div class="" style="background-color: #85C1E9; padding: 50px; border-radius: 10px;">

                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Rol</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $exp = explode("/", $_GET["url"]);
                        $columna = null;
                        $valor = null;
                        $resultado = UsuariosC::VerUsuariosC($columna, $valor);
                        foreach ($resultado as $key => $value) {

                            if(isset($exp[1]) && $exp[1] == 1){

                                if($value["rol"] == "Administrador"){

                                    echo '<tr>
                                    <td>'.$value["apellido"].'</td>
                                    <td>'.$value["nombre"].'</td>
                                    <td>'.$value["documento"].'</td>
                                    <td>'.$value["usuario"].'</td>';
                                    // Hashea la contraseña antes de mostrarla
                                    $clave_hashed = hash_pbkdf2("sha256", $value["clave"], $value["salt"], 1000, 32);
                                    echo '<td>'.$clave_hashed.'</td>
                                    <td>'.$value["rol"].'</td>

                                    <td>
                                    
                                    </td>
                                </tr>';
                                }
                            }else if(isset($exp[1]) && $exp[1] == 2){

                                if($value["rol"] == "Profesor"){
                                    echo '<tr>
                                    <td>'.$value["apellido"].'</td>
                                    <td>'.$value["nombre"].'</td>
                                    <td>'.$value["documento"].'</td>
                                    <td>'.$value["usuario"].'</td>';
                                    // Hashea la contraseña antes de mostrarla
                                    $clave_hashed = hash_pbkdf2("sha256", $value["clave"], $value["salt"], 1000, 32);
                                    echo '<td>'.$clave_hashed.'</td>
                                    <td>'.$value["rol"].'</td>

                                    <td>
                                    
                                    </td>
                                </tr>';
                                }
                            }else{
                                if($value["rol"] != "Estudiante"){

                                    echo '<tr>
                                    <td>'.$value["apellido"].'</td>
                                    <td>'.$value["nombre"].'</td>
                                    <td>'.$value["documento"].'</td>
                                    <td>'.$value["usuario"].'</td>';
                                    // Hashea la contraseña antes de mostrarla
                                    $clave_hashed = hash_pbkdf2("sha256", $value["clave"], $value["salt"], 1000, 32);
                                    echo '<td>'.$clave_hashed.'</td>
                                    <td>'.$value["rol"].'</td>

                                    <td>
                                    
                                        <button class="btn btn-success EditarUsuario" data-toggle="modal" 
                                        data-target="#EditarUsuario" data-uid="'.$value["id"].'">
                                        <i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger BorrarUsuario" data-uid="'.$value["id"].'"
                                        Ufoto="'.$value["foto"].'"><i class="fa fa-trash"></i></button>

                                    </td>
                                </tr>';
                                }

                            }
                            
                        }
                        ?>
                    </tbody>
                    </div>
                    </div>
                </table>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="CrearUsuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Tipo de Usuario:</h2>
                            <select class="form-control input-lg" name="rol" required="">
                                <option value="">Seleccionar...</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Profesor">Profesores</option>
                            </select>
                        </div>
                        <?php
                        $exp = explode("/", $_GET["url"]);
                        echo '<input type="hidden" name="link" value="'.$exp[0].'">';
                        ?>
                        <div class="form-group">
                            <h2>Apellido</h2>
                            <input type="text" class="form-control input-lg" name="apellido" required="">
                            <input type="hidden" class="form-control input-lg" name="id_carrera" value="0">
                        </div>
                        <div class="form-group">
                            <h2>Nombre:</h2>
                            <input type="text" class="form-control input-lg" name="nombre" required="">
                        </div>
                        <div class="form-group">
                            <h2>Documento:</h2>
                            <input type="text" class="form-control input-lg" name="documento" required="">
                        </div>
                        <div class="form-group">
                            <h2>Usuario:</h2>
                            <input type="text" class="form-control input-lg" id="usuario" name="usuario" required="">
                        </div>
                        <div class="form-group">
                            <h2>Contraseña:</h2>
                            <input type="password" class="form-control input-lg" name="clave" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
                <?php
                $crear = new UsuariosC();
                $crear->CrearUsuarioC();
                ?>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="EditarUsuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Tipo de Usuario:</h2>
                            <select class="form-control input-lg" id="rol" name="rolE" required="">
                                <option value="">Seleccionar...</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Profesor">Profesores</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <h2>Apellido</h2>
                            <input type="text" class="form-control input-lg" id="apellido" name="apellidoE" required="">
                            <input type="hidden" class="form-control input-lg" id="id" name="idE">
                        </div>

                        <div class="form-group">
                            <h2>Nombre:</h2>
                            <input type="text" class="form-control input-lg" id="nombre" name="nombreE" required="">
                        </div>

                        <div class="form-group">
                            <h2>Documento:</h2>
                            <input type="text" class="form-control input-lg" id="documento" name="documentoE" required="">
                        </div>

                        <div class="form-group">
                            <h2>Contraseña:</h2>
                            <input type="password" class="form-control input-lg" id="clave" name="claveE" required="">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
                <?php
                $Actualizar = new UsuariosC();
                $Actualizar->ActualizarUsuarioC();
                ?>
            </form>
        </div>
    </div>
</div>

<?php

$borrar = new UsuariosC();
$borrar -> BorrarUsuarioC(); 
?>
