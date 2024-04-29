<?php

require_once "ConexionBD.php";

class CarrerasM extends ConexionBD{

    static public function CrearCarreraM($tablaBD, $carrera){
        try{
            $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre) VALUES (:nombre)");
            $pdo->bindParam(":nombre", $carrera, PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        }catch (PDOException $e) {
            echo "Error al crear carrera: " . $e->getMessage();
            return false;
        }
    }

    static public function VerCarrerasM($tablaBD){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");
            $pdo->execute();
            $resultado = $pdo->fetchAll();
            return $resultado;
        }catch (PDOException $e) {
            echo "Error al ver la carrera: " . $e->getMessage();
            return false;
        }
    }

    static public function EditarCarreraM($tablaBD, $id){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");
            $pdo->bindParam(":id", $id, PDO::PARAM_INT);
            $pdo->execute();
            $resultado = $pdo->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }catch (PDOException $e) {
            echo "Error al ver la carrera: " . $e->getMessage();
            return false;
        }
    }

    static public function ActualizarCarreraM($tablaBD, $datosC){
        try{
            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre WHERE id = :id");
            $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
            $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
            if($exito = $pdo->execute()){
                return $exito;
            }
        }catch (PDOException $e) {
            echo "Error al actualizar carrera: " . $e->getMessage();
        }
        return false;
    }
    
    static public function BorrarCarreraM($tablaBD, $id){
        try{
            $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD  WHERE id = $id");
            if($exito = $pdo->execute()){
                return $exito;
            }
        }catch (PDOException $e) {
            echo "Error al actualizar carrera: " . $e->getMessage();
        }
        return false;
    }
}