//checkear que tema esta seleccionado y coger los colores


    //AJAX
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
            if (apartado.length<1) {
                document.getElementById("inputApartado").style.display="block";
            }else{
                for(var i = 0; i<apartado.length;i++){
                    $("#selectApartado").append($("<option>").attr("value", apartado[i]["id"]).text(apartado[i]['nombre']));
                }
            }
            $("#selectApartado").append($("<option>").attr("value", '0').text('Crear un nuevo apartado...'));

        },
        error:function(error){
        console.log(error);
        }
    });

//reemplazar los colores al menu y a los divs de contenido