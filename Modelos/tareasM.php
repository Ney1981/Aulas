<?php

require_once "ConexionBD.php";

class TareasM extends ConexionBD{

    static public function AgregarTareaM($tablaBD, $datosC){
        try{
            $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre, id_seccion) VALUES 
            (:nombre, :id_seccion)");
            $pdo->bindParam(":id_seccion", $datosC["id_seccion"], PDO::PARAM_INT);
            $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        }catch (PDOException $e) {
            echo "Error al Crear la Tarea: " . $e->getMessage();
            return false;
        }
    }

    static public function VerTareaIdM($tablaBD){
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

    static public function VerTareasM($tablaBD, $columna, $valor){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo->bindParam(":".$columna, $valor, PDO::PARAM_STR);
            $pdo->execute();
            $resultado = $pdo->fetchAll();
            return $resultado;
        }catch (PDOException $e) {
            echo "Error al ver la Tarea: " . $e->getMessage();
            return false;
        }
    }

    static public function VerTareaM($tablaBD, $columna, $valor){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo->bindParam(":".$columna, $valor, PDO::PARAM_STR);
            $pdo->execute();
            $resultado = $pdo->fetch();
            return $resultado;
        }catch (PDOException $e) {
            echo "Error al ver la Tarea: " . $e->getMessage();
            return false;
        }
    }

    static public function GuardarTareaM($tablaBD, $datosC){
        try{
            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET fecha_limite = :fecha_limite, 
            nombre = :nombre, descripcion = :descripcion WHERE id = :id");
            $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
            $pdo -> bindParam(":fecha_limite", $datosC["fecha_limite"], PDO::PARAM_STR);
            $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
            $pdo -> bindParam(":descripcion", $datosC["descripcion"], PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        }catch (PDOException $e) {
            echo "Error al Guardar la Tarea: " . $e->getMessage();
            return false;
        }
    }

    static public function SubirTareaM($tablaBD, $datosC){
        try{
            $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre, id_tarea, tarea, id_seccion) 
            VALUES (:nombre, :id_tarea, :tarea, :id_seccion)");
            $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
            $pdo -> bindParam(":id_tarea", $datosC["id_tarea"], PDO::PARAM_INT);
            $pdo -> bindParam(":tarea", $datosC["tarea"], PDO::PARAM_STR);
            $pdo -> bindParam(":id_seccion", $datosC["id_seccion"], PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        }catch (PDOException $e) {
            echo "Error al Subir la Tarea: " . $e->getMessage();
            return false;
        }
    }

    static public function VerTM($tablaBD, $columna, $valor){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo->bindParam(":".$columna, $valor, PDO::PARAM_STR);
            $pdo->execute();
            $resultado = $pdo->fetchAll();
            return $resultado;
        }catch (PDOException $e) {
            echo "Error al ver la Tarea: " . $e->getMessage();
            return false;
        }
    }

    static public function EntregarTareaM($tablaBD, $datosC){
        try{
            $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, id_tarea, tarea_alumno, id_seccion) 
            VALUES (:id_alumno, :id_tarea, :tarea_alumno, :id_seccion)");
            $pdo -> bindParam(":id_tarea", $datosC["id_tarea"], PDO::PARAM_INT);
            $pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
            $pdo -> bindParam(":tarea_alumno", $datosC["tarea_alumno"], PDO::PARAM_STR);
            $pdo -> bindParam(":id_seccion", $datosC["id_seccion"], PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        }catch (PDOException $e) {
            echo "Error al entregar la Tarea: " . $e->getMessage();
            return false;
        }
    }

    static public function VerEntregaIDM($tablaBD){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT MAX(id) AS id FROM $tablaBD");
            $pdo->execute();
            $resultado = $pdo->fetch();
            return $resultado;
        }catch (PDOException $e) {
            echo "Error al ver la Tarea: " . $e->getMessage();
            return false;
        }
    }

    static public function CrearNotaM($tablaBD2, $datosC2){
        try{
            $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD2 (id_entrega, estado, id_tarea, id_seccion) 
            VALUES (:id_entrega, :estado, :id_tarea, :id_seccion)");
            $pdo -> bindParam(":id_entrega", $datosC2["id_entrega"], PDO::PARAM_INT);
            $pdo -> bindParam(":estado", $datosC2["estado"], PDO::PARAM_STR);
            $pdo -> bindParam(":id_tarea", $datosC2["id_tarea"], PDO::PARAM_STR);
            $pdo -> bindParam(":id_seccion", $datosC2["id_seccion"], PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        }catch (PDOException $e) {
            echo "Error al entregar la Tarea: " . $e->getMessage();
            return false;
        }
    }

    static public function VerEntregasM($tablaBD, $columna, $valor){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna
            ORDER BY id DESC");
            $pdo->bindParam(":".$columna, $valor, PDO::PARAM_STR);
            $pdo->execute();
            $resultado = $pdo->fetchAll();
            return $resultado;
        }catch (PDOException $e) {
            echo "Error al ver la Tarea: " . $e->getMessage();
            return false;
        }
    }

    static public function VerNotasM($tablaBD){
        try{
            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");
            $pdo->execute();
            $resultado = $pdo->fetchAll();
            return $resultado;
        }catch (PDOException $e) {
            echo "Error al ver la Tarea: " . $e->getMessage();
            return false;
        }
    }

    static public function CambiarNotaM($tablaBD, $datosC){
        try{
            $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nota = :nota, 
            estado = :estado WHERE id = :id");
            $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
            $pdo -> bindParam(":nota", $datosC["nota"], PDO::PARAM_STR);
            $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
            $exito = $pdo->execute();
            return $exito;
        }catch (PDOException $e) {
            echo "Error al entregar la Tarea: " . $e->getMessage();
            return false;
        }
    }
}