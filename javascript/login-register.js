document.getElementById("register_email").addEventListener("keyup", comprobarEmail);
document.getElementById("login_email").addEventListener("keyup", comprobarEmail);

document.getElementById("register_password").addEventListener("keyup", comprobarPassword);
document.getElementById("login_password").addEventListener("keyup", comprobarPassword);

document.getElementById("register_name").addEventListener("change", testSomethingWritten);
document.getElementById("register_surname").addEventListener("change", testSomethingWritten);

function comprobarPassword(event){
    var password = event.target.value;
    if (password == null || password.length == 0 || /^\s+$/.test(password)) {
        event.target.className="form-control error";
    } else {
        //La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.NO puede tener otros símbolos.
        if (!comprobarPasswordString(password)) {
            event.target.className="form-control error";
        } else {
            event.target.className="form-control";
        }
    }
}

function comprobarPasswordString(password){
    return  (/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$/).test(password);
}

function comprobarEmail(event){
    var email = event.target.value;
    if (email == null || email.length == 0 || /^\s+$/.test(email)) {
        event.target.className="form-control error";
    } else {
        if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/).test(email)) {
            event.target.className="form-control error";
        } else {
            event.target.className="form-control";
        }
    }
}


function testSomethingWritten(evento) {
    var value = evento.target.value;

    if (value == null || value.length == 0 || /^\s+$/.test(value)) {
        console.log("entro a  value=0");
        evento.target.className="form-control error";
    } else {
        evento.target.className="form-control";
    }
}
