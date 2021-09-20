var noPreguntas=parseFloat(localStorage.getItem("noPreguntas"));
var correctas=parseFloat(localStorage.getItem("correctas"));
var calificacion= correctas*100/noPreguntas;

window.onload = function () {
    $("#noP").text($("#noP").text()+noPreguntas);
    $("#noC").text($("#noC").text()+correctas);
    $("#grade").text($("#grade").text()+calificacion.toFixed(2));
}

/*var calculate_click = function(){
    var nombre= $("#name").val();
    localStorage.setItem("title",nombre);
}*/