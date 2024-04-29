<div class="content-wrapper">

    <section class="content-header">

        <h1>Aulas Virtuales</h1>

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

                        if($value["id_carrera"] == $_SESSION["id_carrera"]){

                            echo '<div class="col-lg-3 col-xs-6">
                                <div class="small-box bg-green">
                                        
                                <div class="inner">
                                    <h4>'.$value["materia"].'</h4>';

                                    $columna = "id";
                                    $valor = $value["id_profesor"];
                                    $profesor = UsuariosC::VerUsuariosC($columna, $valor);

                                echo '<p>Profesor: ' . $profesor["apellido"] . ' ' . $profesor
                                ["nombre"] . '</p>';
                            echo '</div>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="Inscribir/'.$value["id"].'">
                                    <button class="btn btn-primary">Ir al Aula</button></a>
                                </div>
                            </div>
                        
                            </div>
                        </div>';
                        }
                        
                        }
                            
                    ?>

                </div>

                </div>

                </div>

            </div>

        </div>

    </section>

</div>