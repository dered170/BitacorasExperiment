/* 
* @Sistema de Bitácoras electrónicas. "scripts.js"
* @versión: 1.0  @modificado: 5 de Agosto del 2014
* @autor: Luis Pastén
 */
$(document).ready(function(){
    
});

function login(){
    $.ajax({
       type: "POST",
       url: "../Controlador/Controller_Bitacoras.php",
       data: $('#login').serialize()+"&case=1",
       success: function (data){
           json = JSON.parse(data);
           alert(json.mensaje);
       }      
    });
}

