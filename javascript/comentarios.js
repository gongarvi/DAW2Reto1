let params = new URLSearchParams(location.search);
const tema_id = params.get("tema") ;
const apartado_id = params.get("apartado");
$(()=>{
    var rowCount=$("#comentarios_contenido")[0].childNodes.length;
    if(rowCount<10){
        $(".btn_verMas").hide();
    }else{
        $(".btn_verMas").click(verMasComentarios);
    }
    
    $(".btn_editar").click(editarComentario);

    $("#comentarios_contenido").find("form.editar").submit(cambiarComentario);
    function verMasComentarios(){
        var params={tema:tema_id,apartado:apartado_id,rowCount:rowCount};
        $(".btn_Guardar").attr("hidden",true);
        peticionAjax("./obtener_todos_comentarios.php","get",params)
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
    var bloque=event.target.parentNode;
    console.log(bloque);
    var comentario_bloque=$((bloque)).find("p.comentario span");
    $(bloque).find("input[name=comentario]").val(comentario_bloque.text());
}

function cargarDatos(data){
    let divComentario=document.createElement("div");
    let fecha=document.createElement("p");
    fecha.textContent=data.fecha;
    let comentario=document.createElement("p");
    comentario.textContent=data.nombre+" "+data.apellido+" ";
    let spanComentario=document.createElement("span");
    spanComentario.textContent=data.comentario;
    comentario.append(spanComentario);
    divComentario.append(comentario);
    divComentario.append(fecha);
    
    if(email==data.email){
        let editar=document.createElement("form");
        editar.action="editar.php";
        editar.method="post";
        $(`<input type="button" class="btn btn-info btn_editar" name="editar" value="Editar">`).appendTo(editar);
        $(`<input type="submit" class="btn btn-info btn_Guardar" id="guardar" name="guardar" value="Guardar" hidden>`).appendTo(editar);
        $(`<input type="hidden" name="apartado" value="${apartado_id}">`).appendTo(editar);
        $(`<input type="hidden" name="tema" value="${tema_id}">`).appendTo(editar);
        $(`<input type="hidden" name="id" value="${data.id_comentario}">`).appendTo(editar);
        $(`<input type="hidden" name="comentario" value="${data.comentario}">`).appendTo(editar);
        
        let borrar=document.createElement("form");
        borrar.action="eliminar.php";
        borrar.method="post";
        $(`<input type="submit" class="btn btn-danger btn_eliminar" name="eliminar"  value="Borrar">`).appendTo(borrar)
        $(`<input type="hidden" name="apartado" value="${apartado_id}">`).appendTo(borrar);
        $(`<input type="hidden" name="tema" value="${tema_id}">`).appendTo(borrar);
        $(`<input type="hidden" name="id" value="${data.id_comentario}">`).appendTo(borrar);
        divComentario.append(editar);
        divComentario.append(borrar);
    }
    $("#comentarios_contenido").append(divComentario);
    $("#comentarios_contenido").on("click",".btn_editar",editarComentario)

}
function editarComentario(event){
    //Obtener el padre del elemento seleccionado
    var padre=event.target.parentNode;
    //Mostrar el boton editar
    var btnGuardar=$(padre).find("input[type='submit']");
    btnGuardar.attr("hidden",false);
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