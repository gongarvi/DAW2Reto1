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

    //Validaciones de inputs
    
    //Validación del Input Titulo
    document.getElementById("titulo").addEventListener("keydown", () => {
        var titulo = document.getElementById("titulo").value;
        if (titulo == null || titulo.length == 0 || /^\s+$/.test(titulo)) {
            document.getElementById("titulo").className="form-control error";
        }
        else{
            if(titulo.length>64){
                document.getElementById("titulo").className="form-control error";
            }
            else{
                document.getElementById("titulo").className="form-control";
            }
        }
    });
    //Validación del Input texto
    document.getElementById("texto").addEventListener("keyup", () => {
        var text = document.getElementById("texto").value;
        if (text == null || text.length == 0 || /^\s+$/.test(text)) {
            document.getElementById("texto").className="form-control error";
        }
        else{
            if(text.length>512){
                document.getElementById("texto").className="form-control error";
            }
            else{
                document.getElementById("texto").className="form-control";
            }
        }
    });
    //Fin de crear contenido



});

function obtenerColocarApartados() {

    $('#selectApartado').find('option').remove();
    var opcionTema = $( "#selectTema option:selected" ).val();

    // Si la opcion seleccionada es la 0:
    if (opcionTema == 0) {
        $(".depende").show();
        document.getElementById("selectApartado").style.display="none";
    }else{
        $(".depende").hide();
        document.getElementById("selectApartado").style.display="block";
    }

    //AJAX
    var parametros = {tema: opcionTema};
    //Obtengo los apartados segun el tema
    peticionAjax("./../obtener_apartados.php","post",parametros).then((response)=>{
        var apartado = JSON.parse(response);
        $('#selectApartado').find('option').remove();
        if (apartado.length<1) {
            $("#inputApartado").show();
        }else{
            for(var i = 0; i<apartado.length;i++){
                $("#selectApartado").append($("<option>").attr("value", apartado[i]["id"]).text(apartado[i]['nombre']));
            }
        }
        $("#selectApartado").append($("<option>").attr("value", '0').text('Crear un nuevo apartado...'));
        comprobarOpcion();
    })
    .catch((error)=>{
        console.log(error);
    });
}

function comprobarOpcion() {
    console.log("entra");
    var opcionApartado = $( "#selectApartado option:selected" ).val();
    if (opcionApartado == 0) {
        $("#inputApartado").parent().show();
    }else{
        $("#inputApartado").parent().hide();
    }
}
