<?php

class InicioC{

    static public function VerInicioC(){

        $tablaBD = "inicio";

        $resultado = InicioM::VerInicioM($tablaBD);

        return $resultado;
    }

    static public function GuardarDescripcionC(){

        if(isset($_POST["descripcion"])){

            $tablaBD = "inicio";

            $descripcion = $_POST["descripcion"];

            $resultado = InicioM::GuardarDescripcionM($tablaBD, $descripcion);

            if($resultado == true){

                echo '<script>
                
                        window.location = "Inicio";  
                    </script>';
            }
        }
    }

    static public function GuardarManualProfesorC(){

        if(isset($_POST["manualProfesor"])){

            $rutaPDF = $_POST["manualProfesor"];

            if(isset($_FILES["manualProfesorN"]["tmp_name"]) && !empty($_FILES["manualProfesorN"]["tmp_name"])){

                if(!empty($_POST["manualProfesor"])){

                    unlink($_POST["manualProfesor"]);
                    
                }

                if($_FILES["manualProfesorN"]["type"] == "application/pdf"){

                    $rutaPDF = "Vistas/Manuales/Manual-Profesor.pdf";

                    move_uploaded_file($_FILES["manualProfesorN"]["tmp_name"], $rutaPDF);

                }
            }

            $tablaBD = "inicio";
            $pdf = $rutaPDF;

            $resultado = InicioM::GuardarManualProfesorM($tablaBD, $pdf);

            if($resultado == true){

                echo '<script>
                
                        window.location = "Inicio";  
                    </script>';
            }
        }
    }

    static public function GuardarManualEstudianteC(){

        if(isset($_POST["manualEstudiante"])){

            $rutaPDF = $_POST["manualEstudiante"];

            if(isset($_FILES["manualEstudianteN"]["tmp_name"]) && !empty($_FILES["manualEstudianteN"]["tmp_name"])){

                if(!empty($_POST["manualEstudiante"])){

                    unlink($_POST["manualEstudiante"]);
                    
                }

                if($_FILES["manualEstudianteN"]["type"] == "application/pdf"){

                    $rutaPDF = "Vistas/Manuales/Manual-Estudiante.pdf";

                    move_uploaded_file($_FILES["manualEstudianteN"]["tmp_name"], $rutaPDF);

                }
            }

            $tablaBD = "inicio";
            $pdf = $rutaPDF;

            $resultado = InicioM::GuardarManualEstudianteM($tablaBD, $pdf);

            if($resultado == true){

                echo '<script>
                
                        window.location = "Inicio";  
                    </script>';
            }
        }
    }
}