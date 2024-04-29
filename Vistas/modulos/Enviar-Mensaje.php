<div class="content-wrapper">

    <section class="content-header">

        <h1>Enviar Mensaje</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <div style="background-color: #154360; padding: 20px;">
                    <div class="" style="background-color: #85C1E9; padding: 50px; border-radius: 10px;">

                        <?php

                        $exp = explode("/", $_GET["url"]);

                        $columna = "id";
                        $valor = $exp[1];

                        $Destinatario = UsuariosC::VerUsuariosC($columna, $valor);

                        ?>

                        <h2>Para: <b><?= $Destinatario["apellido"] ?> <?= $Destinatario["nombre"] ?></b></h2>

                        <form method="post">
                            
                            <input type="hidden" name="id_destinatario" value="<?= $Destinatario["id"] ?>">

                            <input type="hidden" name="id_envia" value="<?= isset($_SESSION["id"]) ? $_SESSION["id"] : '' ?>">

                            <h2>Asunto:</h2>
                            <input type="text" class="form-control input-lg" name="asunto" required="">

                            <h2>Mensaje:</h2>
                            <textarea id="editor" name="mensaje" required=""></textarea>
                            
                            <br>
                            <button type="submit" class="btn btn-primary">Enviar Mensaje</button>

                        </form>

                        <?php


                        $mensajes = new MensajesC();
                        $mensajes->EnviarMensajeC();

                        ?>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>
