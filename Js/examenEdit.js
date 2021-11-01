let numPregunta = 1;
function myFunction(){
   let html;
   let tipo = document.querySelector('input[name="tipoPregunta"]:checked').value;
    console.log(tipo)
    if (tipo === 'multiple') {
        html = '<div class="content">' + 
                `<h4>Pregunta ${numPregunta} </h4>` + 
                `<input  type="text" placeholder="Ingresa la pregunta 1" name="numPreg${numPregunta}" style="text-align: left;"/> ` +
                `<input  type="text" value="multiple" name="tipoPreg${numPregunta}" style="text-align: left;"/> ` +
                '<p>Selecciona la respuesta correcta</p> ' +
                `<input type="radio" name="respuesta${numPregunta}" value="Op1"/><input type="text" name="opcion1${numPregunta}" placeholder="Ingresa el valor de la opcion"><br> ` +
                `<input type="radio" name="respuesta${numPregunta}" value="Op2"/><input type="text" name="opcion2${numPregunta}" placeholder="Ingresa el valor de la opcion"><br> ` +
                `<input type="radio" name="respuesta${numPregunta}" value="Op3"/><input type="text" name="opcion3${numPregunta}" placeholder="Ingresa el valor de la opcion"><br> ` +
                `<div class="resMultiple"style="font-family: serif;"></div>` +
                '</div>'
    } else if (tipo === 'abierta') {
        html = '<div class="content"> ' +
                `<h4>Pregunta ${numPregunta} </h4>` + 
                `<input  type="text" placeholder="Ingresa la pregunta 3" name="numPreg${numPregunta}" style="text-align: left;"/> `+
                `<input  type="text" value="abierta" name="tipoPreg${numPregunta}" style="text-align: left;"/> ` +
                '<p>Escribe la respuesta correcta</p> ' +
                `<input type="text" name="respuesta${numPregunta}"/> ` +
                '<div class="resAbierta"style="font-family: serif;"></div>' +
                '</div>'
    } else if (tipo === 'file') {
        html = '<div class="content"> ' +
                `<h4>Pregunta ${numPregunta} </h4>` + 
                `<input  type="text" placeholder="Ingresa la pregunta 3" name="numPreg${numPregunta}" style="text-align: left;"/> `+
                `<input  type="text" value="file" name="tipoPreg${numPregunta}" style="text-align: left;"/> ` +
                '<div class="resFile"style="font-family: serif;"></div>' +
                '</div>'
    }
   document.getElementById("Preguntas").innerHTML += html;
   document.getElementById("numPreguntas").value  = numPregunta;
   numPregunta++;
};