// Grafico Principal
document.addEventListener("DOMContentLoaded", () => {
  var chart = echarts.init(document.querySelector("#trafficChart"));

  $.ajax({
    url: './function/grafico.php', // Cambia esto por la ruta a tu archivo PHP
    method: 'POST', // o 'POST' si es necesario
    dataType: 'json',
    success: function(data) {
      chart.setOption({
        tooltip: {
          trigger: "item",
        },
        legend: {
          top: "5%",
          left: "center",
        },
        series: [
          {
            name: "Estudiantes Totales",
            type: "pie",
            radius: ["40%", "70%"],
            avoidLabelOverlap: false,
            label: {
              show: false,
              position: "center",
            },
            emphasis: {
              label: {
                show: true,
                fontSize: "18",
                fontWeight: "bold",
              },
            },
            labelLine: {
              show: false,
            },
            data: data,
          },
        ],
      });
    }
  });
});

// Iniciar datatable en el apartado de reporte
$(document).ready(function () {
  $("#table_reporte").DataTable();
});

$(document).ready(function () {
  $("#table_academica").DataTable();
});

$(document).ready(function () {
  $("#table_tecnica").DataTable();
});

//mostrar modal (ampliar reporte)

$(document).ready(function () {
  $(".edit_report").click(function () {
    let valor = $(this).attr("id");
    $.ajax({
      type: "POST",
      url: "validation/script/edit.php",
      data: { id: valor, editar},
    })
      .done(function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.success == "1") {
          //variables retornadas
          $("#matricula_a").val(jsonData.matricula_a);
          $("#matricula_d").val(jsonData.matricula_d);
          $("#matricula_r").val(jsonData.matricula_r);
          $("#nota").val(jsonData.nota);
          $("#reporte").text(jsonData.reporte);
          //modal
          $("#amp_report").modal("show");
        } else if (jsonData.success == "0") {
          swal({
            title: jsonData.text,
            text: jsonData.message,
            icon: "error",
          });
        }
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        swal({
          title: jsonData.text,
          text: jsonData.message,
          icon: "error",
        });
      });
  });
});

$(document).ready(function () {
  $(".delete_report_button").click(function () {
    let valor = $(this).attr("id");
    $.ajax({
      type: "POST",
      url: "validation/delete.php",
      data: { id: valor },
    })
      .done(function (response) {
        var jsonData = JSON.parse(response);
        if (jsonData.success == "1") {
          swal({
            title: jsonData.text,
            text: jsonData.message,
            icon: "success",
          });
        } else if (jsonData.success == "0") {
          swal({
            title: jsonData.text,
            text: jsonData.message,
            icon: "error",
          });
        }
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        swal({
          title: jsonData.text,
          text: jsonData.message,
          icon: "error",
        });
      });
  });
});

//area tecnica

$(document).ready(function () {
  $("#amp_area_tecnica").hide();
  $("#area_tecnica").change(function () {
    var valor = $(this).val();
    if (valor == "tecnica") {
      $("#amp_area_tecnica").show();
    } else {
      $("#amp_area_tecnica").hide();
    }
  });
});

$(document).ready(function () {
  $("#amp_add_user").hide();
  $("#add_user").click(function () {
    $("#amp_add_user").show();
  });
  $("#dash_user").click(function () {
    $("#amp_add_user").hide();
  });
});

//Cambiar de area academica

$(document).ready(function () {
  $(".tecnica").hide();
});

$(document).ready(function () {
  $("#academica").click(function () {
    $(".academica").show();
    $(".tecnica").hide();
  });
});

$(document).ready(function () {
  $("#tecnica").click(function () {
    $(".academica").hide();
    $(".tecnica").show();
  });
});
