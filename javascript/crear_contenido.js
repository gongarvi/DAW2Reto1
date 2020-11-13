import peticionAjax from './ajaxCall.js';
$(document).ready(()=>{
    // window.location.reload();
    document.getElementById("inlineRadio1")
    document.getElementById("inputTema").style.display="none";
    document.getElementById("inputApartado").style.display="none";
    var radio1 = document.getElementById("inlineRadio1");
    var radio2 = document.getElementById("inlineRadio2");
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
    $("#selectTema").change(obtenerColocarApartados);
    $("#selectApartado").change(comprobarOpcion);
});




function obtenerColocarApartados() {
    $('#selectApartado').find('option').remove();
    var opcionTema = $( "#selectTema option:selected" ).val();

    // Si la opcion seleccionada es la 0:
    if (opcionTema == 0) {
        document.getElementById("inputTema").style.display="block";
        document.getElementById("inputApartado").style.display="block";
        document.getElementById("selectApartado").style.display="none";
    }else{
        document.getElementById("inputTema").style.display="none";
        document.getElementById("inputApartado").style.display="none";
        document.getElementById("selectApartado").style.display="block";
    }

    //AJAX
    var parametros = {tema: opcionTema};
    //Obtengo los apartados segun el tema
    peticionAjax("./../obtener_apartados.php","post",parametros).then((response)=>{
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

    })
    .catch((error)=>{
        console.log(error);
    });
}

function comprobarOpcion() {
    var opcionApartado = $( "#selectApartado option:selected" ).val();
    if (opcionApartado == 0) {
        document.getElementById("inputApartado").style.display="block";
    }else{
        document.getElementById("inputApartado").style.display="none";
    }
}

//Crear Contenido

//Validación del Input Titulo
document.getElementById("titulo").addEventListener("blur", () => {
    var titulo = document.getElementById("titulo").value;
    if (titulo == null || titulo.length == 0 || /^\s+$/.test(titulo)) {
        document.getElementById("titulo").style.backgroundColor = '#FF5F5F';
    }
    else{
        document.getElementById("titulo").style.backgroundColor = 'white';
    }
})
//Validación del Input texto
document.getElementById("texto").addEventListener("blur", () => {
    var text = document.getElementById("texto").value;
    if (text == null || text.length == 0 || /^\s+$/.test(text)) {
        document.getElementById("texto").style.backgroundColor = '#FF5F5F';
    }
    else{
        document.getElementById("texto").style.backgroundColor = 'white';
    }
})
//Validación del Input texto
document.getElementById("texto").addEventListener("blur", () => {
    var text = document.getElementById("texto").value;
    if (text == null || text.length == 0 || /^\s+$/.test(text)) {
        document.getElementById("texto").style.backgroundColor = '#FF5F5F';
    }
    else{
        document.getElementById("texto").style.backgroundColor = 'white';
    }
})
//Fin de crear contenido

