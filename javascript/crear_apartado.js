
//Validación del Input texto
    document.getElementById("nombreApartado").addEventListener("keyup", () => {
        var text = document.getElementById("nombreApartado").value;
        if (text == null || text.length == 0 || /^\s+$/.test(text)) {
            document.getElementById("nombreApartado").className="form-control error";
        }
        else{
            document.getElementById("nombreApartado").className="form-control";
        }
    })