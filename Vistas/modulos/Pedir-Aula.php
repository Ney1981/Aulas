<?php

if($_SESSION["rol"] != "Profesor"){

    echo '<script>
    
        window.location = "Inicio";
    </script>';

    return;

}

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>Solicitar Aulas Virtuales</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <form method="post">

                    <h2>Nombre de las Materia:</h2>
                    <input type="text" class="input-lg" name="materia" required="">

                    <?php

                    echo '<input type="hidden" class="input-lg" name="id_profesor" 
                    value="'.$_SESSION["id"].'">';

                    ?>

                    <br>
                    <h2>Observaciones:</h2>

                    <textarea id="editor" name="observaciones"></textarea>

                    <br><br>

                    <button type="submit" class="btn btn-primary">Solicitar</button>

                    <?php

                    $solicitar = new AulasC();
                    $solicitar -> SolicitarAulaC();

                    ?>

                </form>

            </div>

        </div>

    </section>

</div>