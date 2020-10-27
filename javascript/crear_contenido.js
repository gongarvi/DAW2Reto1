$(document).ready(()=>{
    radio1 = document.getElementById("inlineRadio1");
    radio2 = document.getElementById("inlineRadio2");
    radio1.addEventListener("change",()=>{
        if (radio1.checked) {
            document.getElementsByClassName("radio1")[0].style.display="block";
            document.getElementsByClassName("radio2")[0].style.display="none";
        }
    });
    radio2.addEventListener("change",()=>{
        if (radio2.checked) {
            document.getElementsByClassName("radio2")[0].style.display="block";
            document.getElementsByClassName("radio1")[0].style.display="none";
        }
    });


    // Cargar los select
    $(".selectTema").change(obtenerColocarApartados);
    $(".selectApartado").change(comprobarOpcion);
});

function obtenerColocarApartados() {
    $('.selectApartado').find('option').remove();
    var opcionTema = $( ".selectTema option:selected" ).val();

    // Si la opcion seleccionada es la 0:
    if (opcionTema == 0) {
        document.getElementById("inputTema").style.display="block";
        document.getElementById("inputApartado").style.display="block";
        document.getElementById("selectApartados").style.display="none";
    }else{
        document.getElementById("inputTema").style.display="none";
        document.getElementById("inputApartado").style.display="none";
        document.getElementById("selectApartados").style.display="block";
    }

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
        $('.selectApartado').find('option').remove()
        for(var i = 0; i<apartado.length;i++){
            $(".selectApartado").append($("<option>").attr("id", i).text(apartado[i]['nombre']));
        }
        $(".selectApartado").append($("<option>").attr("value", '0').text('Crear un nuevo apartado...'));

        },
        error:function(error){
        console.log(error);
        }
    });
}

function comprobarOpcion() {
    var opcionApartado = $( ".selectApartado option:selected" ).val();
    if (opcionApartado == 0) {
        document.getElementById("inputApartado").style.display="block";
    }else{
        document.getElementById("inputApartado").style.display="none";
    }
}
