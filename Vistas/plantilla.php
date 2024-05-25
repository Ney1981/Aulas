<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aula Virtual</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/select2/dist/css/select2.min.css">

  <link rel="stylesheet" href="http://localhost/Aulas/Vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script src="http://localhost/Aulas/Vistas/sweetalert2/sweetalert2.all.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini login-page"  style="background: 
linear-gradient(to right, rgb(173, 216, 230), rgb(0, 0, 139));">


  <?php

  if(isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true){

    echo '<div class="wrapper">';

    include "modulos/cabecera.php";

    if($_SESSION["rol"] == "Administrador"){

      include "modulos/menu.php";

    }else if($_SESSION["rol"] == "Estudiante"){

      include "modulos/menuE.php";

    }else{

      include "modulos/menuP.php";

    }

    

    $url = array();

    if(isset($_GET["url"])){

      $url = explode("/", $_GET["url"]);

      if($url[0] == "Inicio" || $url[0] == "Salir" || $url[0] == "Mis-Datos" 
      || $url[0] == "Usuarios" || $url[0] == "Carreras" || $url[0] == "Editar-Carrera" 
      || $url[0] == "Estudiantes" || $url[0] == "Aulas" || $url[0] == "Aulas-Virtuales" 
      || $url[0] == "Inscribir" || $url[0] == "Aula" || $url[0] == "Mis-Aulas" 
      || $url[0] == "Inscriptos" || $url[0] == "D-S" || $url[0] == "Tarea" 
      || $url[0] == "Entregas" || $url[0] == "Pedir-Aula" || $url[0] == "Solicitudes"
      || $url[0] == "Enviar-Mensaje" || $url[0] == "Mensaje" || $url[0] == "Mensajes"){

        include "modulos/".$url[0].".php";

      }

    }else{

      include "modulos/Inicio.php";
      
    }

    echo '</div>';

  }else if(isset($_GET["url"])){

    if($_GET["url"] == "Ingresar"){

      include "modulos/Ingresar.php";

    }else if($_GET["url"] == "Crear-Cuenta"){

      include "modulos/Crear-Cuenta.php";

    }else{

      include "modulos/Ingresar.php";

    }

  }else{

    include "modulos/Ingresar.php";

  }

  ?>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="http://localhost/Aulas/Vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="http://localhost/Aulas/Vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="http://localhost/Aulas/Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="http://localhost/Aulas/Vistas/bower_components/raphael/raphael.min.js"></script>
<script src="http://localhost/Aulas/Vistas/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="http://localhost/Aulas/Vistas/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="http://localhost/Aulas/Vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="http://localhost/Aulas/Vistas/bower_components/moment/min/moment.min.js"></script>
<script src="http://localhost/Aulas/Vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="http://localhost/Aulas/Vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="http://localhost/Aulas/Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://localhost/Aulas/Vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/Aulas/Vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="http://localhost/Aulas/Vistas/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://localhost/Aulas/Vistas/dist/js/demo.js"></script>

<script src="http://localhost/Aulas/Vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="http://localhost/Aulas/Vistas/bower_components/select2/dist/js/select2.full.min.js"></script>

<script src="http://localhost/Aulas/Vistas/bower_components/datatables.net-bs/dataTables.bootstrap.min.js"></script>

<script src="http://localhost/Aulas/Vistas/bower_components/datatables.net-bs/dataTables.responsive.min.js"></script>

<script src="http://localhost/Aulas/Vistas/bower_components/datatables.net-bs/responsive.bootstrap.min.js"></script>

<script src="http://localhost/Aulas/Vistas/bower_components/ckeditor/ckeditor.js"></script>

<script src="http://localhost/Aulas/Vistas/bower_components/bootstrap-colorpicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="http://localhost/Aulas/Vistas/js/usuarios.js"></script>

<script src="http://localhost/Aulas/Vistas/js/aulas.js"></script>

<script src="http://localhost/Aulas/Vistas/js/secciones.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Agregar evento de clic al botón para mostrar el menú
        $("#mostrar-menu").click(function() {
            // Toggle para agregar o quitar la clase 'active' en el elemento .treeview
            $(".treeview").toggleClass("active");
            // Toggle para agregar o quitar la clase 'menu-open' en el elemento .treeview
            $(".treeview").toggleClass("menu-open");
            // Obtener el atributo aria-expanded del enlace dentro de .treeview
            var ariaExpanded = $(".treeview > a").attr("aria-expanded");
            // Invertir el valor de aria-expanded
            ariaExpanded = ariaExpanded === "true" ? "false" : "true";
            // Establecer el atributo aria-expanded con el nuevo valor
            $(".treeview > a").attr("aria-expanded", ariaExpanded);
            // Toggle para mostrar u ocultar los elementos del menú hijo
            $(".treeview-menu").slideToggle();
        });
    });
</script>

