<?php

require_once "ConexionBD.php";

class UsuariosM extends ConexionBD {

    static public function IniciarSesionM($tablaBD, $datosC) {
        try {
            $pdo = parent::cBD()->prepare("SELECT * FROM $tablaBD WHERE usuario = :usuario LIMIT 1");
            $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
            $pdo->execute();
            $resultado = $pdo->fetch();
            $pdo->closeCursor();
            return $resultado;
        } catch (PDOException $e) {
            echo "Error al iniciar sesión: " . $e->getMessage();
            return false;
        }
    }

    static public function VerPerfilM($tablaBD, $id) {
        try {
            $pdo = parent::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id LIMIT 1");
            $pdo->bindParam(":id", $id, PDO::PARAM_INT);
            $pdo->execute();
            $resultado = $pdo->fetch();
            $pdo->closeCursor();
            return $resultado;
        } catch (PDOException $e) {
            echo "Error al ver perfil: " . $e->getMessage();
            return false;
        }
    }

    static public function EditarPerfilM($tablaBD, $datosC) {
        try {
            $pdo = parent::cBD()->prepare("UPDATE $tablaBD SET clave = :clave, nombre = :nombre, 
            apellido = :apellido, documento = :documento, foto = :foto WHERE id = :id");
            $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
            $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
            $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
            $pdo->bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
            $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
            $pdo->bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        } catch (PDOException $e) {
            echo "Error al editar perfil: " . $e->getMessage();
            return false;
        }
    }

    static public function CrearUsuarioM($tablaBD, $datosC) {
        try{
            $pdo = parent::cBD()->prepare("INSERT INTO $tablaBD (nombre, apellido, documento, usuario, clave, 
            id_carrera, rol) VALUES (:nombre, :apellido, :documento, :usuario, :clave, :id_carrera, :rol)");
            $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
            $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
            $pdo->bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
            $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
            $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
            $pdo->bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
            $pdo->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        } catch (PDOException $e) {
            echo "Error al crear usuario: " . $e->getMessage();
            return false;
        }
    }

    static public function VerUsuariosM($tablaBD, $columna = null, $valor = null) {
        try {
            if ($columna == null) {
                $pdo = parent::cBD()->prepare("SELECT * FROM $tablaBD");
                $pdo->execute();
                $resultado = $pdo->fetchAll();
                return $resultado;
            } else {
                $tipoDato = is_numeric($valor) ? PDO::PARAM_INT : PDO::PARAM_STR;
                $pdo = parent::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :valor LIMIT 1");
                $pdo->bindParam(":valor", $valor, $tipoDato);
                $pdo->execute();
                $resultado = $pdo->fetch();
                return $resultado !== false ? $resultado : false;
            }
        } catch (PDOException $e) {
            echo "Error al ver usuarios: " . $e->getMessage();
            return false;
        }
    }    

    static public function ActualizarUsuarioM($tablaBD, $datosC){
        try{
            $pdo = parent::cBD()->prepare("UPDATE $tablaBD SET clave = :clave, nombre = :nombre, 
            apellido = :apellido, documento = :documento, rol = :rol WHERE id = :id");
            $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
            $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
            $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
            $pdo->bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
            $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
            $pdo->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        } catch (PDOException $e) {
            echo "Error al crear usuario: " . $e->getMessage();
            return false;
        }
    }

    static public function BorrarUsuarioM($tablaBD, $id){
        try{
            $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");
            $pdo->bindParam(":id", $id, PDO::PARAM_INT);
            $exito = $pdo->execute();
            return $exito;
        } catch (PDOException $e) {
            echo "Error al borrar usuario: " . $e->getMessage();
            return false;
        }
    }    

}
    
