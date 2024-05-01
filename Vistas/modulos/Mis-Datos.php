<div class="content-wrapper">

    <section class="content-header">

        <h1>Perfil Personal</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

            <div style="background-color: #154360; padding: 20px;">
                <div class="" style="background-color: #85C1E9; padding: 50px; border-radius: 10px;">

                    <form method="post" enctype="multipart/form-data">

                        <div class="row">

                            <?php

                            $perfil = new UsuariosC();
                            $perfil -> VerPerfilC();

                            ?>

                        </div>

                </div>
            </div>

        <div class="box-footer">

            <button type="submit" class="btn btn-success btn-lg pull-right">Guardar</button>

            <?php

            $editarPerfil = new UsuariosC();
            $editarPerfil -> EditarPerfilC();

            ?>

            </form>

            </div>
            

            </div>

        </div>

    </section>

</div>