import peticionAjax from './ajaxCall.js';
$(document).ready(()=>{
    $("#inputTema").value=$("#selectTema").textNode;
    $("#selectTema").change(()=>{
        $("#inputTema").value=$("#selectTema").textNode;
    });
    document.getElementById("selectTema").addEventListener("change",(event)=>{
        var tema = $("#selectTema option:selected").val();
        if(tema === ""){
            event.preventDefault();
            console.log(event);
        }else{
            obtenerColocarApartados(tema);
        }
    });
    document.getElementById("selectApartados").addEventListener("change",obtenerColocarContenido);
    document.getElementById("selectContenido").addEventListener("change",mostrarContenido);
    var radio1 = document.getElementById("inlineRadio1");
    var radio2 = document.getElementById("inlineRadio2");
    radio1.addEventListener("change",()=>{
        if (radio1.checked) {
            document.getElementsByClassName("radio1")[0].style.display="block";
            document.getElementsByClassName("radio2")[0].style.display="none";
        }
    });
    radio2.addEventListener("change",()=>{
        if (radio2.checked) {
            document.getElementsByClassName("radio2")[0].style.display="block";
            document.getElementsByClassName("radio1")[0].style.display="none";
        }
    });
});

function obtenerColocarApartados(tema) {
    ocultarContenido();
    $('#selectApartados').find('option').remove();
    $("#inputTema").val($('#selectTema option:selected').text());
    //AJAX
    var parametros = {tema: tema};
    //Obtengo los apartados segun el tema
    peticionAjax("./../obtener_apartados.php","post",parametros)
        .then((response)=>{
            // Funcion para poner los apartados coneguidos en las opciones
            var apartados = JSON.parse(response);
            $('#selectApartados').find('option').remove();
            $("#selectApartados").append(crearOpcionSeleccionadoBloqueado("Seleciona un apartado por favor."));
            $("#selectContenido").append(crearOpcionSeleccionadoBloqueado("Seleciona un apartado por favor."));
            for(var i = 0; i<apartados.length;i++){
                let option = document.createElement("option");
                option.value=apartados[i]["id"];
                option.textContent=apartados[i]["nombre"];
                $("#selectApartados").append(option);
            }
        })
        .catch((error)=>{
            console.error(error);
        });
}

function obtenerColocarContenido(){
    ocultarContenido();
    var tema = $("#selectTema option:selected").val();
    var apartado = $("#selectApartados option:selected").val();
    $("#inputApartado").val($("#selectApartados option:selected").text());
    var data = {tema:tema,apartado:apartado};
    peticionAjax("./../obtener_contenido.php","post",data)
        .then((response)=>{
            localStorage.setItem("contenido",response);
            var contenido = JSON.parse(response);
            $('#selectContenido').find('option').remove();
            $("#selectContenido").append(crearOpcionSeleccionadoBloqueado("Seleciona un contenido por favor."));
            for(var i = 0; i<contenido.length;i++){
                let option = document.createElement("option");
                option.value=contenido[i]["id"];
                option.textContent=contenido[i]["titulo"];
                $("#selectContenido").append(option);
            }
        })
        .catch((error)=>{
            console.error(error);
        });
}
function crearOpcionSeleccionadoBloqueado(texto){
    var option = document.createElement("option");
    option.value="";
    option.textContent=texto;
    option.disabled=true;
    option.selected=true;
    return option;
}
function mostrarContenido(){
    var contenidoId=$( "#selectContenido option:selected" ).val();
    var contenidoTotal=localStorage.getItem("contenido");
    contenidoTotal=JSON.parse(contenidoTotal);
    var contenido = buscarContenidoPorID(contenidoTotal,contenidoId);
    document.getElementById("contenidoModificar").style.display="block";
    $("#titulo").val(contenido.titulo);
    $("#textArea").val(contenido.texto);
    $("#rutaImg").val(contenido.ruta);
}
function ocultarContenido(){
    document.getElementById("contenidoModificar").style.display="none";
}
function buscarContenidoPorID(contenidoTotal, id){
    var contenido=null;
    contenidoTotal.forEach(element => {
        if(element.id==id){
            contenido=element;
        }
    });
    return contenido;
}



//Validación
document.getElementById("modifica").addEventListener("click",(event)=>{
    var titulo1 =document.getElementById("titulo").value;
    var text1= document.getElementById("textArea").value;
    var urlImagen1=document.getElementById("rutaImg").value; 
    if(titulo1==null || titulo1.length == 0 || /^\s+$/.test(titulo1)){
        alert("Error");
        event.preventDefault();
        document.getElementById("titulo").style.backgroundColor = '#FF5F5F';
    }
    if(text1==null || text1.length == 0 || /^\s+$/.test(text)){
        document.getElementById("textArea").style.backgroundColor = '#FF5F5F';
        event.preventDefault();
    }
    if(urlImagen1==null || urlImagen1.length == 0 || /^\s+$/.test(urlImagen1)){
        document.getElementById("rutaImg").style.backgroundColor = '#FF5F5F';
        event.preventDefault();
    }
});

document.getElementById("titulo").addEventListener('keyup',(event)=>{
    var titulo=event.target.value;
    if(titulo==null || titulo.length == 0 || /^\s+$/.test(titulo)){
        document.getElementById("titulo").style.backgroundColor = '#FF5F5F';
    }
    else{
        document.getElementById("titulo").style.backgroundColor = 'white';
    }
})

document.getElementById("textArea").addEventListener('keydown',(event)=>{
    var text=event.target.value;
    if(text==null || text.length == 0 || /^\s+$/.test(text)){
        document.getElementById("textArea").style.backgroundColor = '#FF5F5F';
    }
    else{
        document.getElementById("textArea").style.backgroundColor = 'white';
    }
})

document.getElementById("rutaImg").addEventListener('keydown',(event)=>{
    var urlImagen=event.target.value;
    if(urlImagen==null || urlImagen.length == 0 || /^\s+$/.test(urlImagen)){
        document.getElementById("rutaImg").style.backgroundColor = '#FF5F5F';
    }
    else{
        document.getElementById("rutaImg").style.backgroundColor = 'white';
    }
})

