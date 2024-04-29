<?php

require_once "ConexionBD.php";

class SeccionesM extends ConexionBD{

    static public function CrearSeccionM($tablaBD, $datosC){
        try{
            $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_aula, nombre) 
            VALUES (:id_aula, :nombre)");
            $pdo -> bindParam(":id_aula", $datosC["id_aula"], PDO::PARAM_INT);
            $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        }catch (PDOException $e) {
            echo "Error al borrar usuario: " . $e->getMessage();
            return false;
        }
    }

    static public function VerSeccionesM($tablaBD, $columna, $valor){
        try{
            if ($columna == null) {
                $pdo = parent::cBD()->prepare("SELECT * FROM $tablaBD");
                $pdo->execute();
                $resultado = $pdo->fetchAll();
                return $resultado;
            }else {
                $tipoDato = is_numeric($valor) ? PDO::PARAM_INT : PDO::PARAM_STR;
                $pdo = parent::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :valor LIMIT 1");
                $pdo->bindParam(":valor", $valor, $tipoDato);
                $pdo->execute();
                $resultado = $pdo->fetch();
                return $resultado !== false ? $resultado : false;
            }
        }catch (PDOException $e) {
            echo "Error al ver usuarios: " . $e->getMessage();
            return false;
        }
    }

    static public function EditarNombreSM($tablaBD, $datosC){
        try{
            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre WHERE id = :id");
            $pdo -> bindParam(":id", $datosC["id_seccion"], PDO::PARAM_INT);
            $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
            if($exito = $pdo->execute()){
                return $exito;
            }
        }catch (PDOException $e) {
            echo "Error al actualizar carrera: " . $e->getMessage();
        }
        return false;
    }

    static public function EditarDescripcionSM($tablaBD, $datosC){
        try{
            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET descripcion = :descripcion WHERE id = :id");
            $pdo -> bindParam(":id", $datosC["id_seccion"], PDO::PARAM_INT);
            $pdo -> bindParam(":descripcion", $datosC["descripcion"], PDO::PARAM_STR);
            if($exito = $pdo->execute()){
                return $exito;
            }
        }catch (PDOException $e) {
            echo "Error al actualizar carrera: " . $e->getMessage();
        }
        return false;
    }

    static public function AgregarArchivoM($tablaBD, $datosC){
        try{
            $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre, id_seccion, archivo) VALUES 
            (:nombre, :id_seccion, :archivo)");
            $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
            $pdo->bindParam(":id_seccion", $datosC["id_seccion"], PDO::PARAM_STR);
            $pdo->bindParam(":archivo", $datosC["archivo"], PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        }catch (PDOException $e) {
            echo "Error al borrar usuario: " . $e->getMessage();
            return false;
        }
    }

    static public function VerArchivosM($tablaBD, $columna, $valor){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo->bindParam(":".$columna, $valor, PDO::PARAM_STR);
            $pdo->execute();
            $resultado = $pdo->fetchAll();
            return $resultado;
        }catch (PDOException $e) {
            echo "Error al ver la seccion: " . $e->getMessage();
            return false;
        }
    }

    static public function borrarArchivoM($tablaBD, $id){
        try{
            $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");
            $pdo->bindParam(':id', $id, PDO::PARAM_INT);

            if($pdo->execute()){
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta de eliminación.");
            }
        }catch (PDOException $e) {
            throw new Exception("Error al preparar la consulta: " . $e->getMessage());
        }
        return false;
    }

    static public function BorrarTareaM($tablaBD, $id){
        try{
            $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");
            $pdo->bindParam(':id', $id, PDO::PARAM_INT);

            if($pdo->execute()){
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta de eliminación.");
            }
        }catch (PDOException $e) {
            throw new Exception("Error al preparar la consulta: " . $e->getMessage());
        }
        return false;
    }

    static public function BorrarTareasM($tablaBD2, $id){
        try{
            $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD2 WHERE id_tarea = :id");
            $pdo->bindParam(':id', $id, PDO::PARAM_INT);

            if($pdo->execute()){
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta de eliminación.");
            }
        }catch (PDOException $e) {
            throw new Exception("Error al preparar la consulta: " . $e->getMessage());
        }
        return false;
    }

    static public function BorrarEntregasM($tablaBD3, $id){
        try{
            $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD3 WHERE id_tarea = :id");
            $pdo->bindParam(':id', $id, PDO::PARAM_INT);

            if($pdo->execute()){
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta de eliminación.");
            }
        }catch (PDOException $e) {
            throw new Exception("Error al preparar la consulta: " . $e->getMessage());
        }
        return false;
    }

    static public function BorrarNotaM($tablaBD4, $id){
        try{
            $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD4 WHERE id_tarea = :id");
            $pdo->bindParam(':id', $id, PDO::PARAM_INT);

            if($pdo->execute()){
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta de eliminación.");
            }
        }catch (PDOException $e) {
            throw new Exception("Error al preparar la consulta: " . $e->getMessage());
        }
        return false;
    }

    



    static public function BorrarTarea2M($tablaBD, $id){
        try{
            $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id_seccion = :id");
            $pdo->bindParam(':id', $id, PDO::PARAM_INT);

            if($pdo->execute()){
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta de eliminación.");
            }
        }catch (PDOException $e) {
            throw new Exception("Error al preparar la consulta: " . $e->getMessage());
        }
        return false;
    }

    static public function BorrarTareas2M($tablaBD2, $id){
        try{
            $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD2 WHERE id_seccion = :id");
            $pdo->bindParam(':id', $id, PDO::PARAM_INT);

            if($pdo->execute()){
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta de eliminación.");
            }
        }catch (PDOException $e) {
            throw new Exception("Error al preparar la consulta: " . $e->getMessage());
        }
        return false;
    }

    static public function BorrarEntregas2M($tablaBD3, $id){
        try{
            $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD3 WHERE id_seccion = :id");
            $pdo->bindParam(':id', $id, PDO::PARAM_INT);

            if($pdo->execute()){
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta de eliminación.");
            }
        }catch (PDOException $e) {
            throw new Exception("Error al preparar la consulta: " . $e->getMessage());
        }
        return false;
    }

    static public function BorrarNotas2M($tablaBD4, $id){
        try{
            $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD4 WHERE id_seccion = :id");
            $pdo->bindParam(':id', $id, PDO::PARAM_INT);

            if($pdo->execute()){
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta de eliminación.");
            }
        }catch (PDOException $e) {
            throw new Exception("Error al preparar la consulta: " . $e->getMessage());
        }
        return false;
    }

    static public function BorrarArchivosM($tablaBD5, $id){
        try{
            $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD5 WHERE id_seccion = :id");
            $pdo->bindParam(':id', $id, PDO::PARAM_INT);

            if($pdo->execute()){
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta de eliminación.");
            }
        }catch (PDOException $e) {
            throw new Exception("Error al preparar la consulta: " . $e->getMessage());
        }
        return false;
    }

    static public function BorrarSeccionM($tablaBD6, $id){
        try{
            $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD6 WHERE id = :id");
            $pdo->bindParam(':id', $id, PDO::PARAM_INT);

            if($pdo->execute()){
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta de eliminación.");
            }
        }catch (PDOException $e) {
            throw new Exception("Error al preparar la consulta: " . $e->getMessage());
        }
        return false;
    }
    
}