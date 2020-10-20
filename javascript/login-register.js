document.getElementById("register_email").addEventListener("change", () => {
    var email = document.getElementById("register_email").value;
    if (email == null || email.length == 0 || /^\s+$/.test(email)) {
        document.getElementById("register_email").style.backgroundColor = "white";
    } else {
        if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/).test(email)) {
            document.getElementById("register_email").style.backgroundColor = "red";
        } else {
            document.getElementById("register_email").style.backgroundColor = "white";
        }
    }

});
document.getElementById("register_password").addEventListener("change", () => {
    var password = document.getElementById("register_password").value;
    if (password == null || password.length == 0 || /^\s+$/.test(password)) {
        document.getElementById("register_password").style.backgroundColor = 'white';
    } else {
        //La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.NO puede tener otros símbolos.
        if (!(/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/).test(password)) {
            document.getElementById("register_password").style.backgroundColor = 'red';
        } else {
            document.getElementById("register_password").style.backgroundColor = "white";
        }
    }
});
document.getElementById("register_name").addEventListener("change", testSomethingWritten);
document.getElementById("register_surname").addEventListener("change", testSomethingWritten);


function testSomethingWritten(evento) {
    var value = evento.target.value;
    if (value == null || value.length == 0 || /^\s+$/.test(value)) {
        evento.target.style.backgroundColor = "white";
    } else {
        if (!(/^[a-zA-Z ]*$/).test(value)) {
        evento.target.style.backgroundColor = "red";
        console.log("Error");
        }
        else{
            evento.target.style.backgroundColor="white";
            console.log("Funciona");
        }
        
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 37db0a8155e1ffca74adef28426902ae6afb74d9
