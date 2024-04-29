<?php

require_once "ConexionBD.php";

class MensajesM extends ConexionBD{

    static public function EnviarMensajeM($tablaBD, $datosC){
        try{
            $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_destinatario, id_envia, asunto, 
            mensaje, leido) VALUES (:id_destinatario, :id_envia, :asunto, :mensaje, :leido)");
            $pdo->bindParam(":id_destinatario", $datosC["id_destinatario"], PDO::PARAM_INT);
            $pdo->bindParam(":id_envia", $datosC["id_envia"], PDO::PARAM_INT);
            $pdo->bindParam(":asunto", $datosC["asunto"], PDO::PARAM_STR);
            $pdo->bindParam(":mensaje", $datosC["mensaje"], PDO::PARAM_STR);
            $pdo->bindParam(":leido", $datosC["leido"], PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        }catch (PDOException $e) {
            echo "Error al enviar el mensaje: " . $e->getMessage();
            return false;
        }
    }

    static public function VerUltimoID($tablaBD){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT MAX(id) AS id FROM $tablaBD");
            $pdo->execute();
            $resultado = $pdo->fetch();
            return $resultado;
        }catch (PDOException $e) {
            echo "Error al ver la seccion: " . $e->getMessage();
            return false;
        }
    }

    static public function VerMensajesM($tablaBD, $columna, $valor){
        try{
            if ($columna == null) {
                $pdo = parent::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY fecha DESC");
                $pdo->execute();
                $resultado = $pdo->fetchAll();
                return $resultado;
            }else{
                $pdo = parent::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
                $pdo->bindParam(":".$columna, $valor, PDO::PARAM_INT);
                $pdo->execute();
                $resultado = $pdo->fetch();
                return $resultado;
            }
        }catch (PDOException $e) {
            echo "Error al ver usuarios: " . $e->getMessage();
            return false;
        }
    }

    static public function SinLeerM($tablaBD, $columna, $valor){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo->bindParam(":".$columna, $valor, PDO::PARAM_INT);
            $pdo->execute();
            $resultado = $pdo->fetchAll();
            return $resultado;
        }catch (PDOException $e) {
            echo "Error al ver usuarios: " . $e->getMessage();
            return false;
        }
    }

    static public function LeerMensajeM($tablaBD, $datosC){
        try{
            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET leido = :leido, fecha = :fecha
            WHERE id = :id");
            $pdo->bindParam(":leido", $datosC["leido"], PDO::PARAM_STR);
            $pdo->bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
            $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_STR);
            if($pdo->execute()){
                return true;
            }
        }catch (PDOException $e) {
            echo "Error al leer Mensaje: " . $e->getMessage();
        }
        return false;
    }
}