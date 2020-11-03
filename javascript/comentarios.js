$(()=>{
    $(".btn_editar").click(editarComentario);
});

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
$("form").submit((event)=>{

    //El bloque donde se encuentran los datos del comentario
    var bloque=event.target.parentNode;
    var comentario_bloque=$(bloque).find("p span");
    var input=document.createElement("input");
    input.type="hidden";
    input.name="comentario"
    input.value=comentario_bloque.text();
    for(let i = 0;i<document.forms.length;i++){
        if(document.forms[i]==event.target){
            document.forms[i].append(input);
        }
    }
});