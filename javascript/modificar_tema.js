
$(()=>{
    const pickrTexto = crearPicker("#colorTexto");
    const pickrPrincipal = crearPicker("#colorPrincipal");
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

            pickrTexto.setColor(json.colorTexto);
            pickrPrincipal.setColor(json.colorPrincipal);

            $("#colorPrincipal").parent().find(".input-group-text").css("background-color",json.colorPrincipal);
            $("#colorTexto").parent().find(".input-group-text").css("background-color",json.colorTexto);
            $("#colorPrincipal").click(()=>{
                pickrPrincipal.show();
            });
            $("#colorTexto").click(()=>{
                pickrTexto.show();
            });
        })
        .catch((error)=>{
            console.error(error);
        });
    });
});


function crearPicker(element,color="#FFF") {
    var pickr = Pickr.create({
        el:element,
        useAsButton:true,
        default:color,
        container:"#contenido",
        theme: 'classic', // or 'monolith', or 'nano'
        components: {

            // Main components
            preview: false,
            opacity: true,
            hue: true,

            // Input / output Options
            interaction: {
                hex: true,
                input: true,
            }
    }
    });
    pickr.on('change', (color, instance) => {
        if(color!=null){
            $(element).val(color.toHEXA().toString());
            $(element).parent().find(".input-group-text").css("background-color",color.toHEXA().toString());
        }
    });
    return pickr;
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