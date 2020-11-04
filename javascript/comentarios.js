
$(()=>{
    var rowCount=$("#comentarios_contenido")[0].childNodes.length;
    console.log(rowCount);
    rowCount++;
    if(rowCount<10){
        $(".btn_verMas").hide();
    }else{
        $(".btn_verMas").click(verMasComentarios);
    }
    $(".btn_editar").click(editarComentario);
    $("form").submit(cambiarComentario);
    function verMasComentarios(){
        let params = new URLSearchParams(location.search);
        let tema = params.get("tema");
        let apartado = params.get("apartado");
        peticionAjax("./obtener_todos_comentarios.php","get",{tema:tema,apartado:apartado,rowCount:rowCount})
        .then((response)=>{
            if(response!=""){
                var data = JSON.parse(response);
                if(data.length!=10){
                    $(".btn_verMas").hide();
                }
                rowCount+=data.length; 
                for(let i = 0 ; i < data.length ; i++){
                    cargarDatos(data[i]);
                }   
            }else{
                console.log("no se han podido cargar los comentarios");
            }
        })
        .catch((error)=>{
            console.error(error);
        });
    }

});
function cambiarComentario(event){
    //El bloque donde se encuentran los datos del comentario
    var bloque=event.target.parentNode;
    console.log(bloque);
    var comentario_bloque=$((bloque.parentNode)).find("p.comentario span");
    $(bloque).find("input[name=comentario]").val(comentario_bloque.text());
}

function cargarDatos(data){
    let divComentario=$("#comentarios_contenido div")[0];
    let nuevoDivComentario=divComentario.cloneNode(true);
    $(nuevoDivComentario).find("p.fecha").text(data.fecha);
    $(nuevoDivComentario).find("p.comentario").text(data.nombre+" "+data.apellido+" ");
    let span=document.createElement("span");
    span.textContent=data.comentario;
    $(nuevoDivComentario).find("p.comentario").append(span);
    $(nuevoDivComentario).find("form input[name=id]").val(data.id_comentario);
    $(nuevoDivComentario).find("form input[name=guardar]").click(cambiarComentario)
    $(nuevoDivComentario).find("form input[name=editar]").click(editarComentario);
    $(nuevoDivComentario).find("form input[name=comentario]").val(data.comentario);
    console.log(nuevoDivComentario);
    $("#comentarios_contenido").append(nuevoDivComentario);
}
function editarComentario(event){
    //Obtener el padre del elemento seleccionado
    var padre=event.target.parentNode;
    //Mostrar el boton editar
    var btnGuardar=$(padre).find("input[type='submit']");
    btnGuardar.removeAttr("hidden");
    //Habilitar el p para poder escribir y ponerlo como foco
    var comentario=($(padre.parentNode).find("p span"));
    comentario.attr("contentEditable",true);
    comentario.focus();    
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