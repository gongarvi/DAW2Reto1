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
            console.log(tema);
            obtenerColocarApartados(tema);
        }
    });
    document.getElementById("selectApartados").addEventListener("change",obtenerColocarContenido);
    document.getElementById("selectContenido").addEventListener("change",mostrarContenido);
    
});


function obtenerColocarApartados(tema) {
    $('#selectApartados').find('option').remove();
    console.log(("#selectTema option:selected").text());
    $("#inputTema").val();
    //AJAX
    var parametros = {tema: tema};
    //Obtengo los apartados segun el tema
    peticionAjax("./../obtener_apartados.php","post",parametros)
        .then((response)=>{
            // Funcion para poner los apartados coneguidos en las opciones
            var apartado = JSON.parse(response);
            $('#selectApartados').find('option').remove()
            for(var i = 0; i<apartado.length;i++){
                $("#selectApartados").append($("<option>").attr("value", apartado[i]['id']).text(apartado[i]['nombre']));
            }
            obtenerColocarContenido();
        })
        .catch((error)=>{
            console.error(error);
        });
}

function obtenerColocarContenido(){
    var tema = $( "#selectTema option:selected" ).val();
    var apartado = $( "#selectApartados option:selected" ).val();
    var data = {tema:tema,apartado:apartado};
    peticionAjax("./../obtener_contenido.php","post",data)
        .then((response)=>{            
            localStorage.setItem("contenido",response);
            var contenido = JSON.parse(response);
            $('#selectContenido').find('option').remove();
            for(var i = 0; i<contenido.length;i++){
                var option = document.createElement("option");
                option.value=contenido[i]["id"];
                option.textContent=contenido[i]["titulo"];
                $("#selectContenido").append(option);
            }
            mostrarContenido();
        })
        .catch((error)=>{

        });
}

function peticionAjax(url, type, data){
    if(url!="" && (type=="post" || type=="get" || type=="delete"|| type=="put") && data!=null){
        return new Promise((resolve, reject)=>{
            $.ajax({
                data: data,
                url:url,
                type:type,
                success:function(response){
                    resolve(response);
                },
                error:function(error){
                    reject(error);
                }
            });
        });
    }
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
function buscarContenidoPorID(contenidoTotal, id){
    var contenido=null;
    contenidoTotal.forEach(element => {
        if(element.id==id){
            contenido=element;
        }
    });
    return contenido;
}