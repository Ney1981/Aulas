<?php

class ConexionBD{
    private const HOST = "localhost";
    private const DBNAME = "aulas";
    private const USER = "root";
    private const PASS = "";

    static public function cBD(){
        try {
            $bd = new PDO("mysql:host=".self::HOST.";dbname=".self::DBNAME, self::USER, self::PASS);
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $bd->exec("set names utf8");
            return $bd;
        } catch (PDOException $e) {
            // Manejo de errores
            echo "Error de conexión: " . $e->getMessage();
            die(); // Otra acción, como redirigir a una página de error
        }
    }
}
