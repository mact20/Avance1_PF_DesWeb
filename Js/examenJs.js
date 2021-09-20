var correctas=0;
var noPreguntas=5;

var revisar_click = function(){
    correctas=0;
    for(j=1;j<=4;j++){
        check("p"+j,"res"+j);
    }
    localStorage.setItem("correctas", correctas)
    localStorage.setItem("noPreguntas", noPreguntas)
}

function check(name,res){
    var elements=document.getElementsByName(name);
    if(elements[0].type==="radio"){
        for(i=0;i<4;i++){
            var elementR=elements[i];
                if(elementR.value==="correct" && elementR.checked){
                    $("#"+res).text("Correcto");
                    $("#"+res).css("color","green");
                    correctas++;
                    break;
                }
            if(i===3){
                $("#"+res).text("Incorrecto");
                $("#"+res).css("color","red");
            }
        }
    }
    if(elements[0].type==="text"){
        if(elements[0].value==elements[1].value){
            $("#"+res).text("Correcto");
            $("#"+res).css("color","green");
            correctas++;
        }
        else{
            $("#"+res).text("Incorrecto");
            $("#"+res).css("color","red");
        }
    }
}


function tituloExamen(){
    document.writeln("<h3>"+title+"</h3>");
}

function preguntas(){
    for(i=0;i<10;i++){
        document.writeln("<div id=\"content\">");
        document.writeln("Pregunta "+(i+1));
        document.writeln("</div>");
    }
}


window.onload = function () {
    $("#revisar").click(revisar_click);
}