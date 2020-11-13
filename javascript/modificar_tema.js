import peticionAjax from './ajaxCall.js';

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

//Validación del Input Color principal
document.getElementById("colorPrincipal").addEventListener("change", () => {
    var color = document.getElementById("colorPrincipal").value;
    if (color == null || color.length == 0 || /^\s+$/.test(color)) {
        document.getElementById("colorPrincipal").className="form-control error";
    }
    else{
        document.getElementById("colorPrincipal").className="form-control";
    }
});
//Validación del Input Color secundario Texto
document.getElementById("colorTexto").addEventListener("change", () => {
    var tema = document.getElementById("colorTexto").value;
    if (tema == null || tema.length == 0 || /^\s+$/.test(tema)) {
        document.getElementById("colorTexto").className="form-control error";
    }
    else{
        document.getElementById("colorTexto").className="form-control";
    }
});
document.getElementById("inputTema").addEventListener("keyup",(event)=>{
    var inputTema=event.target.value;
    if(inputTema== null || inputTema.length == 0 || /^\s+$/.test(inputTema)){
        document.getElementById("inputTema").className="form-control error";
    }
    else{
        document.getElementById("inputTema").className="form-control";
    }
});
