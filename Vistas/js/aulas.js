$("#select2").select2();
$("#select2-1").select2();


$(".row").on("click", ".BorrarAula", function() {
    var Aid = $(this).attr("Aid");
    swal({
        type: "warning",
        title: "¿Estás seguro de querer borrar el Aula?",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        cancelButtonColor: "#d33",
        confirmButtonText: "Aceptar",
        confirmButtonColor: "#3085d6"
    }).then(function(resultado) {

        if (resultado.value) {

            window.location = "index.php?url=Aulas&Aid=" + Aid;
        }
    })
})


$(".box").on("click", ".CrearAula", function(){

    var Soid = $(this).attr("Soid");

    var datos = new FormData();
    datos.append("Soid", Soid);

    $.ajax({

        url: "http://localhost/Aulas/Ajax/aulasA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        
        success: function(resultado){

            $("#id").val(resultado["id"]);
            $("#id_profesor").val(resultado["id_profesor"]);
            $("#materia").val(resultado["materia"]);
        }

    })
})

$("#datepicker").datepicker({

    autoclose: true
})
    