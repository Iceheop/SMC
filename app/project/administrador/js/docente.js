/* const { default: swal } = require("sweetalert"); */

$(document).ready(function () {
    /* tablas docente */
    $('#table_docente_academico').DataTable();
    $('#table_docente_tecnico').DataTable();
    /* cambiar de tabla */
    $(".docente_tecnica").hide();

    $("#academica").click(function () {
        $(".docente_academica").show();
        $(".docente_tecnica").hide();
    });

    $("#tecnica").click(function () {
        $(".docente_academica").hide();
        $(".docente_tecnica").show();
    });

    /* select agregar docente */
    $('#add_docente').click(function () {
        $('#select_add_docente_modal').modal('show');
    })
    /* agregar docente academico */
    $('#add_docente_academico').click(function () {
        $('#select_add_docente_modal').modal('hide');
        $('#add_docente_academico_modal').modal('show');
    })
    $('#add_docente_tecnico').click(function () {
        $('#select_add_docente_modal').modal('hide');
        $('#add_docente_tecnico_modal').modal('show');
    })
    
    $('#send_add_docente_academico').click(function () {
        $('#add_docente_academico_modal').modal('hide');
        swal({
            title: "¡Ación exictosa!",
            text: "¡Docente academico añadido con exicto!",
            icon: "success"
          });
    })

    $('#send_add_docente_tecnico').click(function () {
        $('#add_docente_tecnico_modal').modal('hide');
        swal({
            title: "¡Ación exictosa!",
            text: "¡Docente tecnico añadido con exicto!",
            icon: "success"
          });
    })
});
