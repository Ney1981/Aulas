<?php

require_once "../Controladores/seccionesC.php";
require_once "../Modelos/seccionesM.php";

class SeccionesA{

    public $Sid;
    
    public function AgregarArchivoA(){

        $columna = "id";
        $valor = $this->Sid;

        $resultado = SeccionesC::VerSeccionesC($columna, $valor);

        echo json_encode($resultado);
    }
}

if(isset($_POST["Sid"])){

    $a = new SeccionesA();
    $a -> Sid = $_POST["Sid"];
    $a -> AgregarArchivoA();
}