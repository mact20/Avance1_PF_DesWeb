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