<?php

if($_SESSION["rol"] != "Administrador"){

    echo '<script>
    
        window.location = "Inicio";
    </script>';

    return;

}

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>Gestor de Carreras</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header">

                <form method="post">

                    <div class="col-md-6 col-xs-12">

                        <input type="text" class="form-control" name="carrera" 
                        placeholder="Ingresar Nueva Carrera">

                    </div>

                    <button type="submit" class="btn btn-primary">Agregar Carrera</button>

                    <?php

                    $crear = new CarrerasC();
                    $crear -> CrearCarreraC();

                    ?>

                </form>

            </div>

            <div class="box-body">

            <div style="background-color: #00008B; padding: 20px;">
            <div class="" style="background-color: #0E8EF3; padding: 50px; border-radius: 10px;">

                <table class="table table-hover table-bordered table-striped dt-responsive">

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>Nombre</th>
                            <th></th>

                        </tr>

                    </thead>
                    
                    <tbody>

                        <?php

                        $resultado = CarrerasC::VerCarrerasC();

                        foreach ($resultado as $key => $value){

                            echo '<tr>
                            
                                    <td>'.$value["id"].'</td>
                                    <td>'.$value["nombre"].'</td>

                                    <td>
                                    
                                        <div class="btn-group">
                                        
                                            <a href="Editar-Carrera/'.$value["id"].'">
                                                <button class="btn btn-success">Editar</button>
                                            </a>
                                            <a href="Carreras/'.$value["id"].'">
                                                <button class="btn btn-danger">Borrar</button>
                                            </a>
                                            <a href="Estudiantes/'.$value["id"].'">
                                                <button class="btn btn-primary">Estudiantes</button>
                                            </a>

                                        </div>

                                    </td>

                                </tr>';
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

$borrar = new CarrerasC();
$borrar -> BorrarCarreraC();