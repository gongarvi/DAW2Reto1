$(document).ready(()=>{
    $("#selectTema").change(()=>{
        var id=$("#selectTema option:selected").val();
        var texto=$("#selectTema option:selected").text();
        $(".depende").css("display","block");
        $(".depende input").val(texto);
        peticionAjax("./../obtener_temas.php","post",{id_tema:id})
        .then((response)=>{
            var json=JSON.parse(response);
            $("#colorPrincipal").val(json.colorPrincipal);
            $("#colorTexto").val(json.colorTexto);
        })
        .catch((error)=>{
            console.error(error);
        });
    });
});



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