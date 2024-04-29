<div class="login-box">

    <div class="login-logo">

        <h1>Aulas Virtuales</h1>

    </div>

    <div class="login-box-body">

        <p class="login-box-msg">Ingresar al Aula</p>

        <div class="login-form-container" style="background-color: #eaf6ff; padding: 20px; border-radius: 10px;">

            <form method="post">

                <div class="form-group has-feedback">

                    <input type="text" class="form-control" name="usuario" placeholder="Usuario">

                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                </div>

                <div class="form-group has-feedback">

                    <input type="password" class="form-control" name="clave" placeholder="Contraseña">

                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                </div>

                <div class="row">

                    <div class="col-xs-6">

                        <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>

                    </div>

                    <div class="col-xs-6">

                        <a href="Crear-Cuenta">
                        <button type="button" class="btn btn-default btn-block btn-flat">
                        Crear Cuenta</button>
                        </a>

                    </div>

                </div>

                <?php

                $ingresar = new UsuariosC();
                $ingresar -> IniciarSesionC();

                ?>

            </form>

        </div>

    </div>
    
</div>
