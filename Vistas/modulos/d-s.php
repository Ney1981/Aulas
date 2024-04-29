<div class="content-wrapper">

    <section class="content-header">

        <h1>Descripción:</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <?php

                $exp =  explode("/", $_GET["url"]);

                $columna = "id";
                $valor = $exp[1];

                $resultado = SeccionesC::VerSeccionesC($columna, $valor);

                echo '<form method="post">

                        <textarea class="form-control" id="editor" name="descripcion">
                        '.$resultado["descripcion"].'</textarea>

                        <input type="hidden" name="id_aula" value="'.$resultado["id_aula"].'">

                        <br>
                        <button type="submit" class="btn btn-success">Guardar</button>';

                    $descripcion = new SeccionesC();
                    $descripcion -> EditarDescripcionSC();

                    echo '</form>';

                ?>

            </div>

        </div>

    </section>

</div>