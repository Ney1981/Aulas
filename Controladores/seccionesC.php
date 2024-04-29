<?php

class SeccionesC{

    public function CrearSeccionC(){

        if(isset($_POST["id_aula"])){

            $tablaBD = "secciones";

            $datosC = array("id_aula"=>$_POST["id_aula"], "nombre"=>"Nueva Seccion");

            $resultado = SeccionesM::CrearSeccionM($tablaBD, $datosC);

            if($resultado == true){
                
                echo '<script>window.location = "http://localhost/Aulas/Aula/'.$_POST["id_aula"].'";
                </script>';
            }
        }
    }

    static public function VerSeccionesC($columna, $valor){

        $tablaBD = "secciones";

        $resultado = SeccionesM::VerSeccionesM($tablaBD, $columna, $valor);

        return $resultado;
    }

    public function EditarNombreSC(){

        if(isset($_POST["id_seccion"])){

            $tablaBD = "secciones";

            $exp = explode("/", $_GET["url"]);

            $datosC = array("id_seccion"=>$_POST["id_seccion"], "nombre"=>$_POST["nombre"]);

            $resultado = SeccionesM::EditarNombreSM($tablaBD, $datosC);

            if($resultado == true){
                
                echo '<script>window.location = "http://localhost/Aulas/Aula/'.$exp[1].'";
                </script>';
            }

        }
    }

    public function EditarDescripcionSC(){

        if(isset($_POST["id_aula"])){

            $tablaBD = "secciones";

            $exp = explode("/", $_GET["url"]);

            $datosC = array("id_seccion"=>$exp[1], "descripcion"=>$_POST["descripcion"]);

            $resultado = SeccionesM::EditarDescripcionSM($tablaBD, $datosC);

            if($resultado == true){
                
                echo '<script>window.location = "http://localhost/Aulas/Aula/'.$_POST["id_aula"].'";
                </script>';
            }

        }
    }

    public function AgregarArchivoC(){

        if(isset($_POST["nombreA"])){

            $rutaArchivo = "";

            if($_FILES["archivo"]["type"] == "application/pdf"){

                $nombre = mt_rand(10, 999);
 
                $rutaArchivo = "Vistas/Archivos/".$_POST["id_s"]."-".$nombre.".pdf";
 
                move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaArchivo);
            }

            if($_FILES["archivo"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){

                $nombre = mt_rand(10, 999);
 
                $rutaArchivo = "Vistas/Archivos/".$_POST["id_s"]."-".$nombre.".doc";
 
                move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaArchivo);
            }

            if($_FILES["archivo"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){

                $nombre = mt_rand(10, 999);
 
                $rutaArchivo = "Vistas/Archivos/".$_POST["id_s"]."-".$nombre.".xlsx";
 
                move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaArchivo);
            }

            $tablaBD = "archivos";

            $datosC = array("nombre"=>$_POST["nombreA"], "id_seccion"=>$_POST["id_s"],
            "archivo"=>$rutaArchivo);

            $resultado = SeccionesM::AgregarArchivoM($tablaBD, $datosC);

            if($resultado == true){
                
                echo '<script>window.location = "http://localhost/Aulas/Aula/'.$_POST["id_a"].'";
                </script>';
            }
        }
    }

    static public function VerArchivosC($columna, $valor){

        $tablaBD = "archivos";

        $resultado = SeccionesM::VerArchivosM($tablaBD, $columna, $valor);

        return $resultado;

    }

    static public function borrarArchivoC(){

        if(isset($_POST["id"])){

            $tablaBD = "archivos";

            $id = $_POST["id"];

            unlink($_POST["archivo"]);

            $resultado = SeccionesM::borrarArchivoM($tablaBD, $id);

            if($resultado == true){
                
                echo '<script>window.location = "http://localhost/Aulas/Aula/'.$_POST["id_a"].'";
                </script>';
            }
        }
    }

    public function BorrarTareaC(){

        if(isset($_POST["idT"])){

            $tablaBD = "tareas";

            $id = $_POST["idT"];

            $resultado = SeccionesM::BorrarTareaM($tablaBD, $id);

            $tablaBD2 = "tarea";
            $resultado = SeccionesM::BorrarTareasM($tablaBD2, $id);

            $dirT = "Vistas/Tareas";

            foreach (glob($dirT."/*-".$id."-*.*") as $tareas) {
                
                unlink($tareas);
            }

            $tablaBD3 = "entregas";
            $resultado = SeccionesM::BorrarTareasM($tablaBD3, $id);

            $dirE = "Vistas/Entregas";

            foreach (glob($dirE."/*-".$id."-*.*") as $entregas) {
                
                unlink($entregas);
            }

            $tablaBD4 = "notas";
            $resultado = SeccionesM::BorrarNotaM($tablaBD4, $id);

            if($resultado == true){
                
                echo '<script>window.location = "http://localhost/Aulas/Aula/'.$_POST["idAula"].'";
                </script>';
            }
        }
    }

    public function BorrarSeccionC(){

        if(isset($_POST["idS"])){

            $tablaBD = "tareas";

            $id = $_POST["idS"];

            $resultado = SeccionesM::BorrarTarea2M($tablaBD, $id);

            $tablaBD2 = "tarea";
            $resultado = SeccionesM::BorrarTareas2M($tablaBD2, $id);

            $dirT = "Vistas/Tareas";

            foreach (glob($dirT."/".$id."-*-*.*") as $tareas) {
                
                unlink($tareas);
            }

            $tablaBD3 = "entregas";
            $resultado = SeccionesM::BorrarTareas2M($tablaBD3, $id);

            $dirE = "Vistas/Entregas";

            foreach (glob($dirE."/".$id."-*-*.*") as $entregas) {
                
                unlink($entregas);
            }

            $tablaBD4 = "notas";
            $resultado = SeccionesM::BorrarNotas2M($tablaBD4, $id);

            $tablaBD5 = "archivos";
            $resultado = SeccionesM::BorrarArchivosM($tablaBD5, $id);

            $tablaBD6 = "secciones";
            $resultado = SeccionesM::BorrarSeccionM($tablaBD6, $id);

            $dirA = "Vistas/Archivos";

            foreach (glob($dirA."/".$id."-*.*") as $archivos) {
                
                unlink($archivos);
            }

            if($resultado == true){
                
                echo '<script>window.location = "http://localhost/Aulas/Aula/'.$_POST["id_a"].'";
                </script>';
            }
        }
    }
}
?>
