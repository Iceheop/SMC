$(document).ready(function() {
    // Mostrar el spinner
    $("#loader").show();
});

$(window).on('load', function() {
    setTimeout(function() {
        // Ocultar el spinner
        $("#loader").hide();
    }, 1000);
});
