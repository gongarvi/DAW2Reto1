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
    //Validación del Input Titulo
    document.getElementById("titulo").addEventListener("keydown", () => {
        var titulo = document.getElementById("titulo").value;
        if (titulo == null || titulo.length == 0 || /^\s+$/.test(titulo)) {
            document.getElementById("titulo").className="form-control error";
        }
        else{
            if(titulo.length>64){
                document.getElementById("titulo").className="form-control error";
            }
            else{
                document.getElementById("titulo").className="form-control";
            }
        }
    });
    //Validación del Input texto
    document.getElementById("textArea").addEventListener("keyup", () => {
        var text = document.getElementById("texto").value;
        if (text == null || text.length == 0 || /^\s+$/.test(text)) {
            document.getElementById("texto").className="form-control error";
        }
        else{
            if(text.length>512){
                document.getElementById("texto").className="form-control error";
            }
            else{
                document.getElementById("texto").className="form-control";
            }
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
