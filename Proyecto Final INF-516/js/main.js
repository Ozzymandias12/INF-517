var Preguntas = []



AgegandoRespuestas = function () {
    var respuesta = document.getElementById("Creando")
    var resp = document.createElement("input")
    resp.type = "radio"
    resp.name="resps"
    resp.checked=true
    resp.value = "NuevaRespuesta "
    var lbl = document.createElement("label")
    lbl.innerText = value = "Nueva respuesta"
    lbl.contentEditable = true
    var br = document.createElement("br")

    var btn=document.createElement("button")
    btn.innerText="Borrar"
    btn.style.backgroundColor="transparent"
    btn.style.color="blue"
    btn.style.border="none"
    btn.style.textDecoration="underline"

    btn.addEventListener("click",()=>{
      respuesta.removeChild(resp)
      respuesta.removeChild(lbl)
      respuesta.removeChild(br)
      respuesta.removeChild(btn)
    })

    respuesta.appendChild(resp)
    respuesta.appendChild(lbl)
    respuesta.appendChild(btn)
    respuesta.appendChild(br)
  
 
    console.log(Preguntas)

  }

  AgregandoPreguntas=function(){

    for (let i = 0; i < Preguntas.length; i++) {
      var div = document.createElement("div")
      div.className = "form-Pregunta card"
      var header = document.createElement("header")
      header.className = "header-pregunta card-header"
      var h4 = document.createElement("h4")
      h4.innerText = Preguntas[i].Pregunta
      header.append(h4)

      var respuestas = document.createElement("div")
      respuestas.className = "Respuestas card-body"
      var respuesta = document.createElement("div")
      respuesta.className = "respuesta"

      for (let j = 0; j < Preguntas[i].Respuestas.length; j++) {
        var resp = document.createElement("input")
        resp.type = "radio"
        resp.name=h4.innerHTML.replace(" ", "")
        resp.value = Preguntas[i].Respuestas[j]
        var lbl = document.createElement("label")
        lbl.innerText = value = Preguntas[i].Respuestas[j]

        var br = document.createElement("br")

        respuesta.appendChild(resp)
        respuesta.appendChild(lbl)
        respuesta.appendChild(br)

      }



      respuestas.appendChild(respuesta)

      div.append(header)
      div.appendChild(respuestas)


      document.getElementById("FormPreguntas").append(div)
    }
  }
  





  AgregarPregunta = function () {

    Preguntas.push({ "Pregunta": document.getElementById("preg").innerText, "Respuestas": [] })
    var ban=false
    for (let i of document.getElementById("Creando").childNodes) {
      if(i.checked==true){
        ban=true
      }
      if (i.nodeName == "LABEL") {
        Preguntas[Preguntas.length - 1].Respuestas.push(i.innerText)
        if(ban==true){
          ban=false
          Preguntas[Preguntas.length-1].RespuestaCorrecta=i.innerText
        }
      }
    }
    
  

    console.log(Preguntas)


    for(let i of document.getElementById("FormPreguntas").childNodes){
      document.getElementById("FormPreguntas").removeChild(i)
    }



    for (let i = 0; i < Preguntas.length; i++) {
      var div = document.createElement("div")
      div.className = "form-Pregunta card"
      var header = document.createElement("header")
      header.className = "header-pregunta card-header"
      var h4 = document.createElement("h4")
      h4.innerText = Preguntas[i].Pregunta
      header.append(h4)

      var respuestas = document.createElement("div")
      respuestas.className = "Respuestas card-body"
      var respuesta = document.createElement("div")
      respuesta.className = "respuesta"

      for (let j = 0; j < Preguntas[i].Respuestas.length; j++) {
        var resp = document.createElement("input")
        resp.type = "radio"
        resp.name=h4.innerHTML.replace(" ", "")
        resp.value = Preguntas[i].Respuestas[j]
        var lbl = document.createElement("label")
        lbl.innerText = value = Preguntas[i].Respuestas[j]

        var br = document.createElement("br")

        respuesta.appendChild(resp)
        respuesta.appendChild(lbl)
        respuesta.appendChild(br)

      }



      respuestas.appendChild(respuesta)

      div.append(header)
      div.appendChild(respuestas)


      document.getElementById("FormPreguntas").append(div)
    }

    document.getElementById("preg").innerText="Nueva Pregunta"
    console.log( document.getElementById("Creando").childNodes)
    document.getElementById("Creando").innerHTML=""
    AgegandoRespuestas();
  }

  $.ajax({
    url: 'http://localhost/prog3/getPreguntas.php',
    type:"GET",
    dataType : "json",
	success: function(respuesta) {
        console.log((respuesta));
        xPreguntas=respuesta;
        Preguntas=[]

        for(var i of xPreguntas){
          Pregunta=i.Pregunta
          Respuestas=[]
          for(var j=0; j<xPreguntas.length;j++){
            console.log(i.Id, xPreguntas[j].Id)
            if(i.Id==xPreguntas[j].Id){
              
              Respuestas.push(xPreguntas[j].Respuesta)
              xPreguntas.splice(Number(j), 1)
              j--;
            }
            
          }
          console.log(Respuestas)
          Preguntas.push({Pregunta:Pregunta, Respuestas: Respuestas})
        }

        // for (var i in Preguntas){
        //     Preguntas[i]["Respuestas"]=[]
        // }
        AgregandoPreguntas()
	},
	error: function(err) {
        console.log(err);
    }
});


