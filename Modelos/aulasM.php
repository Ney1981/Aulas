<?php

require_once "ConexionBD.php";

class AulasM extends ConexionBD{

    static public function CrearAulaM($tablaBD, $datosC){
        try{
            $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (materia, id_carrera, id_profesor) VALUES 
            (:materia, :id_carrera, :id_profesor)");
            $pdo->bindParam(":materia", $datosC["materia"], PDO::PARAM_STR);
            $pdo->bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_STR);
            $pdo->bindParam(":id_profesor", $datosC["id_profesor"], PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        }catch (PDOException $e) {
            throw new Exception("Error al crear el aula: " . $e->getMessage());
        }
    }

    static public function VerAulasM($tablaBD){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD"); 
            $pdo->execute();
            $resultado = $pdo->fetchAll();
            return $resultado;
        }catch (PDOException $e) {
            throw new Exception("Error al ver las aulas: " . $e->getMessage());
        }
    }

    static public function VerAulas2M($tablaBD, $columna, $valor){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo->bindParam(":".$columna, $valor, PDO::PARAM_STR);
            $pdo->execute();
            $resultado = $pdo->fetch();
            return $resultado;
        }catch (PDOException $e) {
            echo "Error al ver el Aula: " . $e->getMessage();
            return false;
        }
    }

    static public function BorrarAulaM($tablaBD, $id){
        try{
            $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");
            $pdo->bindParam(':id', $id, PDO::PARAM_INT);
            
            if($pdo->execute()){
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta de eliminación.");
            }
        } catch (PDOException $e) {
            throw new Exception("Error al preparar la consulta: " . $e->getMessage());
        }
        return false;
    }

    static public function SolicitarAulaM($tablaBD, $datosC){
        try{
            $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (materia, id_profesor, observaciones, 
            estado) VALUES (:materia, :id_profesor, :observaciones, :estado)");

            $pdo->bindParam(":materia", $datosC["materia"], PDO::PARAM_STR);
            $pdo->bindParam(":id_profesor", $datosC["id_profesor"], PDO::PARAM_STR);
            $pdo->bindParam(":observaciones", $datosC["observaciones"], PDO::PARAM_STR);
            $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        }catch (PDOException $e) {
            echo "Error al borrar usuario: " . $e->getMessage();
            return false;
        }
    }

    static public function VerSolicitudesM($tablaBD){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD"); 
            $pdo->execute();
            $resultado = $pdo->fetchAll();
            if (!empty($resultado)) {
                return $resultado;
            } else {
                return []; // Devuelve un arreglo vacío si no hay resultados
            }
        } catch (PDOException $e) {
            echo "Error al ver la Solicitud: " . $e->getMessage();
            return false;
        }
    }

    static public function VerSM($tablaBD, $columna, $valor){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna"); 
            $pdo->bindParam(":".$columna, $valor, PDO::PARAM_STR);
            $pdo->execute();
            $resultado = $pdo->fetch();
            if (!empty($resultado)) {
                return $resultado;
            } else {
                return []; // Devuelve un arreglo vacío si no hay resultados
            }
        } catch (PDOException $e) {
            echo "Error al ver la Solicitud: " . $e->getMessage();
            return false;
        }
    }
    
    static public function ActualizarEstadoSM($tablaBD, $datosC){
        try{
            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado = :estado WHERE id = :id");
            $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_STR);
            $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        }catch (PDOException $e) {
            throw new Exception("Error al crear el estado: " . $e->getMessage());
        }
        
    }
      
}