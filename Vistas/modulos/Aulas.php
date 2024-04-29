<?php

if ($_SESSION["rol"] != "Administrador") {
    echo '<script>
        window.location = "Inicio";
    </script>';
    return;
}

?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>Aulas Virtuales</h1>
        <br>

        <form method="post">

            <div class="row">

                <div class="col-md-3">
                    <h2>Carrera:</h2>
                    <select name="id_carrera" id="select2" class="form-control" required="">
                        <option value="">Seleccionar...</option>

                        <?php
                        $resultado = CarrerasC::VerCarrerasC();
                        foreach ($resultado as $key => $value) {
                            echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                        }
                        ?>

                    </select>
                </div>

                <div class="col-md-3">
                    <h2>Profesor:</h2>
                    <select name="id_profesor" id="select2-1" class="form-control" required="">
                        <option value="">Seleccionar...</option>

                        <?php
                        $columna = null;
                        $valor = null;
                        $resultado = UsuariosC::VerUsuariosC($columna, $valor);
                        foreach ($resultado as $key => $value) {
                            if ($value["rol"] == "Profesor") {
                                echo '<option value="' . $value["id"] . '">' . $value["apellido"] . ' 
                                ' . $value["nombre"] . '</option>';
                            }
                        }
                        ?>

                    </select>
                </div>

                <div class="col-md-3">
                    <h2>Materia</h2>
                    <input type="text" class="form-control" name="materia" required="">
                </div>
            </div>
            <br>

            <button class="btn btn-primary" type="submit">Crear Nueva Aula</button>

            <?php
            $aulasC = new AulasC();
            $aulasC->CrearAulaC();
            ?>
        </form>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

            <div style="background-color: #154360; padding: 20px;">
            <div class="" style="background-color: #85C1E9; padding: 50px; border-radius: 10px;">

                        <div class="row">
                            <?php
                            $aulasC = new AulasC();
                            $resultado = $aulasC->VerAulasC();
                            foreach ($resultado as $key => $value) {
                                echo '<div class="col-lg-3 col-xs-6">
                                    <div class="small-box bg-green">
                                        <button class="btn btn-danger pull-right BorrarAula" Aid="'.$value["id"].'"
                                            data-toggle="tooltip" title="Eliminar"><i class="fa fa-times"></i></button>
                                        <div class="inner">
                                            <h4>'.$value["materia"].'</h4>';

                                $columna = "id";
                                $valor = $value["id_profesor"];
                                $profesor = UsuariosC::VerUsuariosC($columna, $valor);

                                echo '<p>Profesor: ' . $profesor["apellido"] . ' ' . $profesor["nombre"] . '</p>';
                                echo '</div>
                                    </div>
                                </div>';
                            }
                            $borrar = new AulasC();
                            $borrar -> BorrarAulaC();
                            ?>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </section>

</div>
