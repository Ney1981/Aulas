$(".table").DataTable({
    "language": {
        "sSearch": "Buscar:",
        "sEmptyTable": "No hay datos en la Tabla",
        "sZeroRecords": "No se encontraron resultados",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total _TOTAL_",
        "SInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrando de un total de _MAX_ registros)",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "sLoadingRecords": "Cargando...",
        "sLengthMenu": "Mostrar _MENU_ registros"
    }
});

$("#usuario").change(function() {
    $(".alert").remove();
    var usuario = $(this).val();
    var datos = new FormData();
    datos.append("VerificarUsuario", usuario);
    var campoUsuario = $(this); // Selecciona el campo de usuario
    $.ajax({
        url: "Ajax/usuariosA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function(resultado) {
            if (resultado.existe) { // Verifica si el usuario existe
                campoUsuario.parent().after('<div class="alert alert-danger">El Usuario ya Existe.</div>');
                $("#usuario").val("");
            } else {
                // Usuario no existe, puedes mostrar un mensaje de éxito
                campoUsuario.parent().after('<div class="alert alert-success">Usuario Válido.</div>');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            console.error(error);
        }
    })

})

$(".table").on("click", ".EditarUsuario", function(){
    var Uid = $(this).data("uid"); // Obtener el ID del usuario del atributo de datos
    var datos = new FormData();
    datos.append("Uid", Uid); // Agregar el ID del usuario a los datos del formulario
    
    $.ajax({
        url: "Ajax/usuariosA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function(resultado) {
            // Verificar si se recibió un objeto JSON válido
            if (typeof resultado === "object" && resultado !== null) {
                // Actualizar los campos del formulario con los datos del usuario
                $("#id").val(resultado.id);
                $("#rol").val(resultado.rol);
                $("#apellido").val(resultado.apellido);
                $("#nombre").val(resultado.nombre);
                $("#documento").val(resultado.documento);
                $("#clave").val(resultado.clave);
            } else {
                console.error("Error: Datos del usuario no válidos");
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            console.error(error);
        }
    });
});

$(".table").on("click", ".BorrarUsuario", function(){
    var Uid = $(this).data("uid");
    var Ufoto = $(this).data("ufoto"); // Corrección: usar data("ufoto") en lugar de val("Ufoto")
    swal({
        type: 'warning',
        title: '¿Estás seguro de borrar este Usuario?',
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#3085d6',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33'
    }).then(function(resultado){
        if (resultado.value) { // Verificar si el usuario confirmó la eliminación
            window.location = "index.php?url=Usuarios&Uid="+Uid+"&Ufoto="+Ufoto;
        }
    });
});

$(".sidebar-menu").tree();