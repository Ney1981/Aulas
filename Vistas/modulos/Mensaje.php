<?php

$exp = explode("/", $_GET["url"]);

$columna ="id";
$valor = $exp[1];

$mensaje = MensajesC::VerMensajesC($columna, $valor);

$valor = $mensaje["id_destinatario"];
$Destinatario = UsuariosC::VerUsuariosC($columna, $valor);

$valor = $mensaje["id_envia"];
$Envia = UsuariosC::VerUsuariosC($columna, $valor);

if($_SESSION["id"] != $mensaje["id_destinatario"] && $_SESSION["id"] != $mensaje["id_envia"]){

    echo '<script>
    
            window.location = "http://localhost/Aulas/Mensajes";
        </script>';
}

?>

<div class="content-wrapper">

    <section class="content-header">

        <a href="http://localhost/Aulas/Mensajes">

            <button class="btn btn-primary">Ir a Mensaje</button>

        </a>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <div style="background-color: #00008B; padding: 20px;">
                    <div class="" style="background-color: #0E8EF3; padding: 50px; border-radius: 10px;">

                        <?php

                        echo '<h3>Para: <b>'.$Destinatario["apellido"].' '.$Destinatario["nombre"].'</b></h3>
                                <h3>De: <b>'.$Envia["apellido"].' '.$Envia["nombre"].'</b></h3>
                                <h3>Asunto: <b>'.$mensaje["asunto"].'</b></h3>
                                <h3>Mensaje: '.$mensaje["mensaje"].'</h3>

                                <br>';

                                if($Destinatario["id"] == $_SESSION["id"]){

                                    echo '<a href="http://localhost/Aulas/Enviar-Mensaje/'.$Envia["id"].'">

                                    <button class="btn btn-primary">Responder Mensaje</button>

                                </a>';

                                }     

                        ?>

                    </div>
                </div>

            </div>

        </div>

    </section>

</div>