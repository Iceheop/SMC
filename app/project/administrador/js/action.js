// Modal Agregar Alumno
$(document).ready(function () {
  $(".add_alumno").click(function () {
    $("#añadirAlumnoModal").modal("show");
    $("#formAñadirAlumno").submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
          type: "POST",
          url: "validation/action.php",
          data: formData + "&añadir",
      })
      .done(function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.success == "1") {
          $("#formAñadirAlumno")[0].reset();
          var option = {
            animation: true,
            delay: 4000,
          };
          var toastEl = document.querySelector("#notification");
          var toast = new bootstrap.Toast(toastEl, option);
          toast.show();
        } else if (jsonData.success == "0") {
          swal({
            title: jsonData.text,
            icon: "error",
          });
        }
      });
    });
  });
});

// Modal Eliminar Alumno
$(document).ready(function () {
  $(".delete_alumno").click(function () {
    var data = $(this).attr("id");
    /* mostrar modal */
    $("#eliminarAlumnoModal").modal("show");
    /* confirmar Eliminación */
    $(".btn-delete-alumno").click(function () {
      /* ocultar modal */
      $("#eliminarAlumnoModal").modal("hide");
      /* enviando el id para eliminar */
      $.ajax({
        type: "POST",
        url: "validation/action.php",
        data: { eliminar: data },
      })
      /* respuesta true */
        .done(function (response) {
          var jsonData = JSON.parse(response);
          if (jsonData.success == "1") {
            var option = {
              animation: true,
              delay: 4000,
            };
            var toastEl = document.querySelector("#notification");
            var toast = new bootstrap.Toast(toastEl, option);
            toast.show();
          } else if (jsonData.success == "0") {
            swal({
              title: jsonData.text,
              icon: "error",
            });
          }
        })
        /* respuesta false */
        .fail(function () {
          swal({
            icon: "error",
          });
        });
    });
  });
});

// Modal Editar Alumno
$(document).ready(function () {
  $(".edit_alumno").click(function () {
    var data = $(this).attr("id");
    $("#editarAlumnoModal").modal("show");
  });
});

// Modal Ver Alumno
$(document).ready(function () {
  $(".see_alumno").click(function () {
    swal({
      title: "Ver Alumno",
      text: "Hola mundooooooo",
      icon: "warning",
    });
  });
});
