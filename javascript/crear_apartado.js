//Validación del Select Tema
    document.getElementById("selectTema").addEventListener("blur", () => {
        var select = document.getElementById("selectTema").value;
        if (select == "Elige un tema") {
            document.getElementById("selectTema").style.backgroundColor = '#FF5F5F';
        } else {
            document.getElementById("selectTema").style.backgroundColor = 'white';
            document.getElementById("inputTemaid").addEventListener("blur", () => {
                var inputema = document.getElementById("inputTema").value;

                if (inputema == null || inputema.length == 0 || /^\s+$/.test(inputema)) {
                    document.getElementById("inputTemaid").style.backgroundColor = '#FF5F5F';
                } else {
                    document.getElementById("inputTemaid").style.backgroundColor = 'white';
                }
            })
        }
    })
//Validación del Input texto
    document.getElementById("nombreApartado").addEventListener("blur", () => {
        var text = document.getElementById("nombreApartado").value;
        if (text == null || text.length == 0 || /^\s+$/.test(text)) {
            document.getElementById("nombreApartado").style.backgroundColor = '#FF5F5F';
        }
        else{
            document.getElementById("nombreApartado").style.backgroundColor = 'white';
        }
    })