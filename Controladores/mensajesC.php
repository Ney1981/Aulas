<?php

class MensajesC{

    static public function EnviarMensajeC(){

        if(isset($_POST["id_destinatario"]) && isset($_POST["id_envia"])){

            $tablaBD = "mensajes";

            $datosC = array(
                "id_destinatario" => $_POST["id_destinatario"], "id_envia" => $_POST["id_envia"],
                "asunto" => isset($_POST["asunto"]) ? $_POST["asunto"] : '',
                "mensaje" => isset($_POST["mensaje"]) ? $_POST["mensaje"] : '',
                "leido" => "No"
            );

            if(empty($datosC["id_envia"])) {
                echo '<script>
                    swal({
                        type: "error",
                        title: "Error",
                        text: "El remitente del mensaje no está definido.",
                        showConfirmButton: true,
                        confirmButtonText: "Ok"
                    });
                </script>';
                return; // Detener la ejecución si no hay remitente definido
            }

            $resultado = MensajesM::EnviarMensajeM($tablaBD, $datosC);

            if($resultado == true) {

                $resultado2 = MensajesM::VerUltimoID($tablaBD); 

                echo '<script>
                swal({
                    type: "success",
                    title: "El Mensaje se ha enviado Correctamente",
                    showConfirmButton: true,
                    confirmButtontext: "ok"
                }).then(function(resultado){
                    if(resultado.value){
                        window.location = "http://localhost/Aulas/Mensaje/'.$resultado2["id"].'";
                    }
                });
                </script>';
            }
        }
    }

    static public function VerMensajesC($columna, $valor){

        $tablaBD = "mensajes";

        $resultado = MensajesM::VerMensajesM($tablaBD, $columna, $valor);

        return $resultado;
    }

    static public function SinLeerC($columna, $valor){

        $tablaBD = "mensajes";

        $resultado = MensajesM::SinLeerM($tablaBD, $columna, $valor);

        return $resultado;
    }

    static public function LeerMensajeC(){

        if(isset($_POST["idM"])){

            $tablaBD = "mensajes";

            $datosC = array("id"=>$_POST["idM"], "fecha"=>$_POST["fecha"], "leido"=>"Si");

            $resultado = MensajesM::LeerMensajeM($tablaBD, $datosC);

            if($resultado == true){

                echo '<script>

                        window.location = "http://localhost/Aulas/Mensaje/'.$_POST["idM"].'";
                    
                </script>';
            }
        }
    }
}
