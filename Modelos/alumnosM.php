<?php

require_once "ConexionBD.php";

class AlumnosM extends ConexionBD{

    static public function InscribirmeM($tablaBD, $datosC){
        try{
            $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, id_aula) 
            VALUES (:id_alumno_param, :id_aula_param)");
            $pdo->bindParam(":id_alumno_param", $datosC["id_alumno"], PDO::PARAM_INT);
            $pdo->bindParam(":id_aula_param", $datosC["id_aula"], PDO::PARAM_INT);
            $exito = $pdo->execute();
            return $exito;
        }catch (PDOException $e) {
            echo "Error al crear usuario: " . $e->getMessage();
            return false;
        }
    }

    static public function DarBajaM($tablaBD, $datosC){
        try{
            $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id_alumno = 
            :id_alumno_param AND id_aula = :id_aula_param"); 
            $pdo->bindParam(":id_alumno_param", $datosC["id_alumno"], PDO::PARAM_INT);
            $pdo->bindParam(":id_aula_param", $datosC["id_aula"], PDO::PARAM_INT);
            $exito = $pdo->execute();
            return $exito;
        }catch (PDOException $e) {
            echo "Error al crear usuario: " . $e->getMessage();
            return false;
        }
    }

    static public function VerInscriptosM($tablaBD, $columna, $valor){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :columna_valor");
            $pdo->bindParam(":columna_valor", $valor, PDO::PARAM_STR);
            $pdo->execute();
            $resultado = $pdo->fetchAll();
            return $resultado;
        }catch (PDOException $e) {
            echo "Error al ver la carrera: " . $e->getMessage();
            return false;
        }
    }

    static public function VerInscriptoM($tablaBD, $columna, $valor, $columna2, $valor2){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :columna_valor AND 
            $columna2 = :columna2_valor");
            $pdo->bindParam(":columna_valor", $valor, PDO::PARAM_STR);
            $pdo->bindParam(":columna2_valor", $valor2, PDO::PARAM_STR);
            $pdo->execute();
            $resultado = $pdo->fetch();
            return $resultado;
        }catch (PDOException $e) {
            echo "Error al ver la carrera: " . $e->getMessage();
            return false;
        }
    }
}
