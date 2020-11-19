//funcion que obtiene los datos introducidos en el formulario de crea-videoconferencia con JQuery

function getformVC() {
    var config = {};
    $('input').each(function() {
        config[this.name] = this.value;
    });
    $('textarea').each(function() {
        config[this.name] = this.value;
    });
    console.log(config);
}

$(document).ready(function() {
    $("#prueba1").mousedown(function(e) {
        //1: izquierda, 2: medio/ruleta, 3: derecho
        if (e.which == 3) {
            $('#mensaje1').text("Editar videoconferencia");
        }
    });
});


//W3.js, le agrega nombres a los titulos de la videoconferencia

var titulosVC = { "nombreAsig": "Informática", "nombreVC": "Clase 1.2", "descripcionVC": "Hardware y software" };
w3.displayObject("idvc", titulosVC);