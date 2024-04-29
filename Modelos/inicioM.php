<?php

require_once "ConexionBD.php";

class InicioM extends ConexionBD{

    static public function VerInicioM($tablaBD){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = 1");
            $pdo->execute();
            $resultado = $pdo->fetch();
            return $resultado;
        }catch (PDOException $e) {
            echo "Error al ver el Aula: " . $e->getMessage();
            return false;
        }
    }

    static public function GuardarDescripcionM($tablaBD, $descripcion){
        try{
            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET descripcion = :descripcion 
            WHERE id = 1");
            $pdo -> bindParam(":descripcion", $descripcion, PDO::PARAM_STR);

            if($exito = $pdo->execute()){
                return $exito;
            }
        }catch (PDOException $e) {
            echo "Error al actualizar carrera: " . $e->getMessage();
        }
        return false;
    }

    static public function GuardarManualProfesorM($tablaBD, $pdf){
        try{
            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET manualProfesor = :pdf 
            WHERE id = 1");
            $pdo -> bindParam(":pdf", $pdf, PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        }catch (PDOException $e) {
            echo "Error al entregar la Tarea: " . $e->getMessage();
            return false;
        }
    }

    static public function GuardarManualEstudianteM($tablaBD, $pdf){
        try{
            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET manualEstudiante = :pdf 
            WHERE id = 1");
            $pdo -> bindParam(":pdf", $pdf, PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        }catch (PDOException $e) {
            echo "Error al entregar la Tarea: " . $e->getMessage();
            return false;
        }
    }
}