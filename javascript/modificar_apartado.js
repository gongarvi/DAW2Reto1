import peticionAjax from './ajaxCall.js';
$(()=>{
    $("#selectTema").change(()=>{
        var id=$("#selectTema option:selected").val();
        peticionAjax("./../obtener_apartados.php","post",{tema:id})
        .then((response)=>{
            var option;
            var apartados = JSON.parse(response);
            $('#selectApartados').find('option').remove();
            $("#selectApartados").append(crearOpcionSeleccionadoBloqueado("Seleccione un apartado por favor"));
            for(var i = 0; i<apartados.length;i++){
                option = document.createElement("option");
                option.value=apartados[i]["id"];
                option.textContent=apartados[i]["nombre"];
                $("#selectApartados").append(option);
            }
        })
        .catch((error)=>{
            console.error(error);
        });
    });
    $("#selectApartados").change(()=>{
        $(".depende").show();
        $("#inputApartado").val($("#selectApartados option:selected").text());
    });
    $("#inputApartado").keyup(()=>{
        var texto=$("#inputApartado").val();
        if(texto===""){
            $("#inputApartado").css("background-color","#FF5F5F");
        }else{
            $("#inputApartado").css("background-color","white");
        }
    });
});
function crearOpcionSeleccionadoBloqueado(texto){
    var option = document.createElement("option");
    option.value="";
    option.textContent=texto;
    option.disabled=true;
    option.selected=true;
    return option;
}
