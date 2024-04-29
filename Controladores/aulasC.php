<?php

class AulasC{

    public static function CrearAulaC(){

        if(isset($_POST["materia"]) && isset($_POST["id_carrera"]) && isset($_POST["id_profesor"])){
            $exp = explode("/", $_GET["url"]);

            $tablaBD = "aulas";
            $datosC = array(
                "materia" => $_POST["materia"], 
                "id_carrera" => $_POST["id_carrera"], 
                "id_profesor" => $_POST["id_profesor"]
            );

            try {
                $resultado = AulasM::CrearAulaM($tablaBD, $datosC);

                if($resultado == true) {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "El Aula se ha Creado Correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Ok"
                        }).then(function(resultado){
                            if(resultado.value){
                                window.location = "http://localhost/Aulas/'.$exp[0].'";
                            }
                        });
                    </script>';
                } else {
                    throw new Exception("Hubo un problema al crear el aula. Por favor, inténtelo de nuevo.");
                }
            } catch (Exception $e) {
                echo '<script>
                    swal({
                        type: "error",
                        title: "Error",
                        text: "'.$e->getMessage().'",
                        showConfirmButton: true,
                        confirmButtonText: "Ok"
                    });
                </script>';
            }
        }
    }

    public static function VerAulasC(){
        
        $tablaBD = "aulas";
        try {
            $resultado = AulasM::VerAulasM($tablaBD);
            return $resultado;
        } catch (Exception $e) {
            echo '<script>
                swal({
                    type: "error",
                    title: "Error",
                    text: "'.$e->getMessage().'",
                    showConfirmButton: true,
                    confirmButtonText: "Ok"
                });
            </script>';
            return false;
        }
    }

    public static function VerAulas2C($columna, $valor){

        $tablaBD = "aulas";
        try {
            $resultado = AulasM::VerAulas2M($tablaBD, $columna, $valor);
            return $resultado;
        } catch (Exception $e) {
            echo '<script>
                swal({
                    type: "error",
                    title: "Error",
                    text: "'.$e->getMessage().'",
                    showConfirmButton: true,
                    confirmButtonText: "Ok"
                });
            </script>';
            return false;
        }
    }

    public static function BorrarAulaC(){

        if(isset($_GET["Aid"])){
            $tablaBD = "aulas";
            $id = $_GET["Aid"];
            
            try {
                $resultado = AulasM::BorrarAulaM($tablaBD, $id);
                if($resultado == true){
                    echo '<script>
                        window.location = "Aulas";
                        </script>';
                }
            } catch (Exception $e) {
                echo '<script>
                    swal({
                        type: "error",
                        title: "Error",
                        text: "'.$e->getMessage().'",
                        showConfirmButton: true,
                        confirmButtonText: "Ok"
                    });
                </script>';
            }
        }
    }

    public static function SolicitarAulaC(){

        if(isset($_POST["materia"])){
            $tablaBD = "solicitudes";

            $datosC = array("materia"=>$_POST["materia"], "id_profesor"=>$_POST["id_profesor"],
            "observaciones"=>$_POST["observaciones"], "estado"=>"Solicitada");

            $resultado = AulasM::SolicitarAulaM($tablaBD, $datosC);
            
            if($resultado == true) {
                echo '<script>
                    swal({
                        type: "success",
                        title: "La Solicitud ha sido Enviada Correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Ok"
                    }).then(function(resultado){
                        if(resultado.value){
                            window.location = "Solicitudes";
                        }
                    });
                </script>';
            }

        }
    }

    public static function VerSolicitudesC() {

        $resultado = AulasM::VerSolicitudesM("solicitudes");

        if ($resultado !== false) {
            return $resultado;
        } else {
            return [];
        }
    }

    static public function VerSC($columna, $valor) {

        $tablaBD = "solicitudes";

        $resultado = AulasM::VerSM($tablaBD, $columna, $valor);

        if ($resultado !== false) {
            return $resultado;
        } else {
            return [];
        }
    }

    public function ActualizarEstadoSC(){

        if(isset($_POST["id"])){

            $tablaBD = "solicitudes";

            $datosC = array("id"=>$_POST["id"], "estado"=>"Aprobada");

            $resultado = AulasM::ActualizarEstadoSM($tablaBD, $datosC);

        }
    }
}

