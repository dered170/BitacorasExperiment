/* 
 * @Sistema de Bitácoras electrónicas. "scripts.js"
 * @versión: 1.0  @modificado: 5 de Agosto del 2014
 * @autor: Luis Pastén
 */
$(document).ready(function() {
    $('#contrasena').keypress(function(e) {
        if (e.keyCode == 13) {
            $('#enviar').focus().click();
        }
    });

});


function login() {
    $.ajax({
        type: "POST",
        url: "../Controlador/Controller_Bitacoras.php",
        data: $('#login').serialize() + "&case=1",
        success: function(data) {
            json = JSON.parse(data);
            if (json.tipo === "Exito") {
                var item = $("<div class='alert alert-success'>" + json.mensaje + "</div>").hide().fadeIn(150);
                $(".alert-container").html(item);
                setTimeout("location.href='../Vista/"+json.url+"'",1500);
            } else if (json.tipo === "Error") {
                var item = $("<div class='alert alert-warning'>" + json.mensaje + "</div>").hide().fadeIn(150);
                $(".alert-container").html(item);
            } else {
                var item = $("<div class='alert alert-danger'>" + json.mensaje + "</div>").hide().fadeIn(150);
                $(".alert-container").html(item);
            }

        }
    });
}
