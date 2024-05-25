<div class="login-box">

    <div class="login-logo">

    <h1 style="font-weight: bolder">Aulas Virtuales</h1>

    </div>

    <div class="login-box-body">

        <p class="login-box-msg">Crear una nueva Cuenta</p>

        <div class="login-form-container" style="background-color: #0C86F3; padding: 20px; border-radius: 10px;">

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

                    <input type="text" class="form-control" style="padding: 20px; border-radius: 10px;"
                    name="nombre" placeholder="Nombre">

                </div>

                <div class="form-group has-feedback">

                    <input type="text" class="form-control" style="padding: 20px; border-radius: 10px;"
                    name="apellido" placeholder="Apellido">

                </div>

                <div class="form-group has-feedback">

                    <input type="text" class="form-control" style="padding: 20px; border-radius: 10px;"
                    name="documento" placeholder="Documento">

                </div>

                <div class="form-group has-feedback">

                    <input type="text" class="form-control" style="padding: 20px; border-radius: 10px;"
                    id="usuario" name="usuario" placeholder="Usuario">

                </div>

                <div class="form-group has-feedback">

                    <input type="password" class="form-control" style="padding: 20px; border-radius: 10px;"
                    name="clave" placeholder="Contraseña">
                    <input type="hidden" class="form-control" name="rol" value="Estudiante">

                </div>

                <div class="row">

                    <div class="col-xs-6">

                        <button type="submit" class="btn btn-primary btn-block btn-flat" 
                        style="background-color: #003399; padding: 10px; border-radius: 10px;">
                        Crear Cuenta</button>

                    </div>

                    <div class="col-xs-6">

                        <a href="Ingresar">
                        <button type="button" class="btn btn-default btn-block btn-flat" 
                        style="background-color: #FFFFFF; padding: 10px; border-radius: 10px;">
                        Iniciar Sesion</button>
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