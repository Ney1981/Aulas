<?php

class AlumnosC{

    public function InscribirmeC(){

        if(isset($_POST["id_alumno"])){

            $tablaBD = "Inscripciones"; // Reemplaza "nombre_de_la_tabla" con el nombre real de la tabla en tu base de datos

            $datosC = array("id_alumno"=>$_POST["id_alumno"], "id_aula"=>$_POST["id_aula"]);

            $resultado = AlumnosM::InscribirmeM($tablaBD, $datosC);

            if($resultado == true){ // Corregido el operador de comparación

                echo '<script>
                
                    window.location = "http://localhost/Aulas/Aula/'.$_POST["id_aula"].'";
                </script>'; 
            }
        }
    }

    public function DarBajaC(){

        if(isset($_POST["id_aula"])){

            $tablaBD = "Inscripciones";

            $datosC = array("id_alumno"=>$_POST["id_alumno"], "id_aula"=>$_POST["id_aula"]);

            $resultado = AlumnosM::DarBajaM($tablaBD, $datosC);

            if($resultado === true){

                echo '<script>
                
                    window.location = "http://localhost/Aulas/Aulas-Virtuales";
                </script>'; 
            }
        }
    }

    static public function VerInscriptosC($columna, $valor){

        $tablaBD = "Inscripciones";

        $resultado = AlumnosM::VerInscriptosM($tablaBD, $columna, $valor);

        return $resultado;
    }

    static public function VerInscriptoC($columna, $valor, $columna2, $valor2){

        $tablaBD = "Inscripciones";

        $resultado = AlumnosM::VerInscriptoM($tablaBD, $columna, $valor, $columna2, $valor2);

        return $resultado;

    }
}
?>
