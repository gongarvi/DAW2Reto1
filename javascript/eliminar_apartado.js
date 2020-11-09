$(document).ready(()=>{

    
    // console.log(opcionTema);

    $("#selectTema").change(obtenerColocarApartados);
    // var opcionTema = $( "#selectTema option:selected" ).val();
    function obtenerColocarApartados() {
        // alert("entra");
        var opcionTema = $( "#selectTema option:selected" ).val();
        var parametros = {tema: opcionTema};
        //Obtengo los apartados segun el tema
        $.ajax({
            data: parametros,
            url:"./../obtener_apartados.php",
            type:"post",
            success:function(response){              
            // Funcion para poner los apartados coneguidos en las opciones
                var apartado = JSON.parse(response);
                $('#selectApartado').find('option').remove()               
                for(var i = 0; i<apartado.length;i++){
                    $("#selectApartado").append($("<option>").attr("value", apartado[i]["id"]).text(apartado[i]['nombre']));
                }                
            },
            error:function(error){
            console.log(error);
            }
        });

    }

});