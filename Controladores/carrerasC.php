<?php

class CarrerasC{

    public function CrearCarreraC(){

        if(isset($_POST["carrera"])){

            $tablaBD = "carreras";
            $carrera = $_POST["carrera"];
            $resultado  = CarrerasM::CrearCarreraM($tablaBD, $carrera);

            if($resultado == true) {
                echo '<script>
                swal({
                    type: "success",
                    title: "La Carrera se ha Creado Correctamente",
                    showConfirmButton: true,
                    confirmButtontext: "ok"
                }).then(function(resultado){
                    if(resultado.value){
                        window.location = "http://localhost/Aulas/Carreras";
                    }
                });
                </script>';
            }
        }
    }

    static public function VerCarrerasC(){

        $tablaBD = "Carreras";
        $resultado = CarrerasM::VerCarrerasM($tablaBD);
        return $resultado;
    }

    public function EditarCarreraC(){

        $tablaBD = "Carreras";
        $exp = explode("/", $_GET["url"]);
        $id = $exp[1];

        $resultado = CarrerasM::EditarCarreraM($tablaBD, $id);

        echo '<div class="col-md-6 col-xs-12">

                <h2>Nombre de la carrera:</h2>
                <input type="text" class="form-control input-lg" name="nombreE" 
                value="'.$resultado["nombre"].'" require="">

                <input type="hidden" name="Cid" value="'.$resultado["id"].'">
                <br>

                <button type="submit" class="btn btn-success">Guardar Cambios</button>

            </div>';

    }

    public function ActualizarCarreraC(){
        if(isset($_POST["Cid"])){
    
            $tablaBD = "Carreras";
            $datosC = array(
                "id" => $_POST["Cid"],
                "nombre" => $_POST["nombreE"]
            );
    
            $resultado = CarrerasM::ActualizarCarreraM($tablaBD, $datosC);
    
            if($resultado == true) {
                echo '<script>
                    swal({
                        type: "success",
                        title: "La Carrera se ha Actualizado Correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Ok"
                    }).then(function(resultado){
                        if(resultado.value){
                            window.location = "http://localhost/Aulas/Carreras";
                        }
                    });
                </script>';
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "Error al Actualizar la Carrera",
                        text: "Hubo un problema al actualizar la carrera. Por favor, inténtelo de nuevo.",
                        showConfirmButton: true,
                        confirmButtonText: "Ok"
                    });
                </script>';
            }
        }
    }
    
    public function BorrarCarreraC(){

        $exp = explode("/", $_GET["url"]);
        $id = $exp[1];

        if(isset($id)){

            $tablaBD = "carreras";

            $resultado = CarrerasM::BorrarCarreraM($tablaBD, $id);

            if($resultado == true){

                echo '<script>
                    swal({
                        type: "success",
                        title: "La Carrera se ha Borrado Correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Ok"
                    }).then(function(resultado){
                        if(resultado.value){
                            window.location = "http://localhost/Aulas/Carreras";
                        }
                    });
                </script>';
            }
        }
    }
    
}