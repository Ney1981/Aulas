<div class="login-box">

    <div class="login-logo">

        <h1>Aulas Virtuales</h1>

    </div>

    <div class="login-box-body">

        <p class="login-box-msg">Crear una nueva Cuenta</p>

        <div class="login-form-container" style="background-color: #eaf6ff; padding: 20px; border-radius: 10px;">

            <form method="post">

                <div class="form-group has-feedback">

                    <select class="form-control" name="id_carrera" required="">

                        <option value="">Seleccionar su Carrera</option>

                        <?php

                        $resultado = CarrerasC::VerCarrerasC();

                        foreach ($resultado as $key => $value){

                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                        }
                            echo '<input type="hidden" class="form-control" name="link" value="Ingresar">';
                        ?>

                    </select>

                </div>

                <div class="form-group has-feedback">

                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">

                </div>

                <div class="form-group has-feedback">

                    <input type="text" class="form-control" name="apellido" placeholder="Apellido">

                </div>

                <div class="form-group has-feedback">

                    <input type="text" class="form-control" name="documento" placeholder="Documento">

                </div>

                <div class="form-group has-feedback">

                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">

                </div>

                <div class="form-group has-feedback">

                    <input type="password" class="form-control" name="clave" placeholder="Contraseña">
                    <input type="hidden" class="form-control" name="rol" value="Estudiante">

                </div>

                <div class="row">

                    <div class="col-xs-6">

                        <button type="submit" class="btn btn-primary btn-block btn-flat">Crear Cuenta</button>

                    </div>

                    <div class="col-xs-6">

                        <a href="Ingresar">
                        <button type="button" class="btn btn-default btn-block btn-flat">Iniciar Sesion</button>
                        </a>

                    </div>

                </div>

                <?php

                $crear = new UsuariosC();
                $crear -> CrearUsuarioC();

                ?>

            </form>

        </div>

    </div>
    
</div>