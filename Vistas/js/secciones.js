$(".box").on("click", ".AgregarArchivo", function(){    

    var Sid = $(this).attr("Sid");

    var datos = new FormData();
    datos.append("Sid", Sid);

    $.ajax({

        url: "http://localhost/Aulas/Ajax/seccionA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function(resultado){

            $("#idS").val(resultado["id"]);

                
        }
    })
})


$(".box").on("click", ".BorrarSeccion", function(){    

    var Sid = $(this).attr("Sid");

    var datos = new FormData();
    datos.append("Sid", Sid);

    $.ajax({

        url: "http://localhost/Aulas/Ajax/seccionA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function(resultado){

            $("#idSE").val(resultado["id"]);

                
        }
    })
})


CKEDITOR.replace("editor");
