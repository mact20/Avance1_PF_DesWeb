var noPreguntas=localStorage.getItem("noPreguntas");
var correctas=localStorage.getItem("correctas")

var calculate_click = function(){
    var nombre= $("#name").val();
    localStorage.setItem("title",nombre);
}

window.onload = function () {
    $("#calculate").click(calculate_click);
}