import peticionAjax from './ajaxCall.js';
$(document).ready(()=>{
    $("#selectTema").change(obtenerColocarApartados);
    function obtenerColocarApartados() {
        var opcionTema = $( "#selectTema option:selected" ).val();
        var parametros = {tema: opcionTema};
        peticionAjax("./../obtener_apartados.php","post",parametros)
        .then((response)=>{
            var apartado = JSON.parse(response);
            $('#selectApartado').find('option').remove()               
            for(var i = 0; i<apartado.length;i++){
                $("#selectApartado").append($("<option>").attr("value", apartado[i]["id"]).text(apartado[i]['nombre']));
            }      
        })
        .catch((error)=>{
            console.error(error);
        });
    }

});