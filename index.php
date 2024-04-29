<?php

require_once "Controladores/plantillaC.php";

require_once "Controladores/usuariosC.php";
require_once "Modelos/usuariosM.php";

require_once "Controladores/carrerasC.php";
require_once "Modelos/carrerasM.php";

require_once "Controladores/aulasC.php";
require_once "Modelos/aulasM.php";

require_once "Controladores/alumnosC.php";
require_once "Modelos/alumnosM.php";

require_once "Controladores/seccionesC.php";
require_once "Modelos/seccionesM.php";

require_once "Controladores/tareasC.php";
require_once "Modelos/tareasM.php";

require_once "Controladores/mensajesC.php";
require_once "Modelos/mensajesM.php";

require_once "Controladores/inicioC.php";
require_once "Modelos/inicioM.php";

$plantilla = new Plantilla();
$plantilla -> LlamarPlantilla();