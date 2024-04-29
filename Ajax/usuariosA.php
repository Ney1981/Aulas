<?php

require_once "../Controladores/usuariosC.php";
require_once "../Modelos/usuariosM.php";

class UsuariosA {

    public $VerificarUsuario;

    public function VerificarUsuario() {
        $columna = "usuario";
        $valor = $this->VerificarUsuario;

        $resultado = UsuariosM::VerUsuariosM("usuarios", $columna, $valor); 
        // Devolver true si el usuario existe, false si no existe
        return $resultado !== false;
    }

    public $Uid;

    public function EditarUsuariosA(){

        $columna = "id";
        $valor = $this->Uid;

        $resultado = UsuariosM::VerUsuariosM("usuarios", $columna, $valor); 
        // Verificar si se encontró el usuario
        if ($resultado !== false) {
            // Devolver los datos del usuario en formato JSON
            return $resultado;
        } else {
            // Devolver un mensaje de error en caso de que no se encuentre el usuario
            return array("error" => "El usuario no fue encontrado");
        }
    }
}

if (isset($_POST["VerificarUsuario"])) {
    $verificar = new UsuariosA();
    $verificar->VerificarUsuario = $_POST["VerificarUsuario"];
    $usuarioExiste = $verificar->VerificarUsuario();
    echo json_encode(array("existe" => $usuarioExiste));
}

if (isset($_POST["Uid"])) {
    $editar = new UsuariosA();
    $editar->Uid = $_POST["Uid"];
    $usuarioInfo = $editar->EditarUsuariosA();
    // Devolver la información del usuario como JSON
    echo json_encode($usuarioInfo);
}


?>













