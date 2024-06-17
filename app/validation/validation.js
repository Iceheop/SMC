$(document).ready(function() {
    $('#loginform').submit(function(e) {
        e.preventDefault();

        var info = $(this).serialize();

        $.ajax({
            type: "POST",
            url: 'app/validation/validation.php',
            data: info,
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                if (jsonData.success == "1")
                {       
                    window.location.href = ('app/project/administrador/index.php');
                }
                else if (jsonData.success == "0")
                {
                    swal({ 
                        title: jsonData.text,
                        text: jsonData.mensaje,
                        icon: "error",
                    })
                }
           }
       });
     });
});