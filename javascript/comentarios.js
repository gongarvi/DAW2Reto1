let params = new URLSearchParams(location.search);
const tema_id = params.get("tema") ;
const apartado_id = params.get("apartado");
import peticionAjax from './ajaxCall.js';
var rowCount=0;
$(()=>{
    if(rowCount=$("#comentarios_contenido")[0]!=null){
        rowCount=$("#comentarios_contenido")[0].childNodes.length;
    }else{
        rowCount=0;
    }
    if(rowCount<10){
        $(".btn_verMas").hide();
    }else{
        $(".btn_verMas").click(verMasComentarios);
    }
    
    $(".btn_editar").click(editarComentario);
    $(".btn_eliminar").click(confirmarBorrado);

    $("#comentarios_contenido").find("form.editar").submit(cambiarComentario);

    //Validacion de crear comentario
    if(document.getElementById("comenta")!=null){
        document.getElementById("comenta").addEventListener("blur",()=>{
            var comentario=document.getElementById("comenta").value;
            if (comentario == null || comentario.length == 0 || /^\s+$/.test(comentario)) {
                document.getElementById("comenta").className="form-control error";
            }
            else{
                document.getElementById("comenta").className="form-control";
            }
        });
    }

});

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
function cambiarComentario(event){
    var bloque=event.target.parentNode;
    console.log(bloque);
    var comentario_bloque=$((bloque)).find("p.comentario span");
    $(bloque).find("input[name=comentario]").val(comentario_bloque.text());
}

function cargarDatos(data){
    let divComentario=document.createElement("div");
    let fecha=document.createElement("p");
    fecha.className="fecha";
    fecha.textContent=data.fecha;
    let comentario=document.createElement("p");
    comentario.className="comentario";
    comentario.textContent=data.nombre+" "+data.apellido+" ";
    let spanComentario=document.createElement("span");
    spanComentario.textContent=data.comentario;
    comentario.append(spanComentario);
    divComentario.append(comentario);
    divComentario.append(fecha);
    
    if(email==data.email||administrador){
        let editar=document.createElement("form");
        editar.className="editar";
        editar.action="actualizar_comentario.php";
        editar.method="post";
        $(`<input type="button" class="btn btn_editar material-icons" name="editar" value="create">`).appendTo(editar);
        $(`<input type="submit" class="btn btn_Guardar material-icons" id="guardar" name="guardar" value="save" hidden>`).appendTo(editar);
        $(`<input type="hidden" name="apartado" value="${apartado_id}">`).appendTo(editar);
        $(`<input type="hidden" name="tema" value="${tema_id}">`).appendTo(editar);
        $(`<input type="hidden" name="id" value="${data.id_comentario}">`).appendTo(editar);
        $(`<input type="hidden" name="comentario" value="${data.comentario}">`).appendTo(editar);
        $("#comentarios_contenido").on("submit","form.editar",cambiarComentario);

        let borrar=document.createElement("form");
        borrar.action="delete_comentario.php";
        borrar.method="post";
        $(`<input type="submit" class="btn btn_eliminar material-icons" name="eliminar"  value="delete">`).appendTo(borrar);
        $(`<input type="hidden" name="apartado" value="${apartado_id}">`).appendTo(borrar);
        $(`<input type="hidden" name="tema" value="${tema_id}">`).appendTo(borrar);
        $(`<input type="hidden" name="id" value="${data.id_comentario}">`).appendTo(borrar);
        divComentario.append(editar);
        divComentario.append(borrar);
    }
    $("#comentarios_contenido").append(divComentario);
    $("#comentarios_contenido").on("click",".btn_editar",editarComentario);
    $("#comentarios_contenido").on("click",".btn_eliminar",confirmarBorrado);

}

function confirmarBorrado(event){
    if(!confirm("¿Seguro que quieres borrar el comentario?")){
        return false;
    };
}

