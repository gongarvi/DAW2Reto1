

var inicio=function () {
    document.getElementById("register_email").addEventListener("blur", validacion);
    document.getElementById("register_password").addEventListener("blur", validar);
    document.getElementById("register_name").addEventListener("blur", validar1);
    document.getElementById("register_surname").addEventListener("blur", validar2);
    document.register.addEventListener("submit", prueba);
    console.log("PRUEBA");
}

function validacion() {
    var email=document.getElementById("register_email").value;
    console.log("PRueba email")
    /*if( !(/\w+([-+.´]\w+)*@\w+([-.]\w+([-.]\w+)/.test(email))){
        
    }*/
    if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/).test(email)){
        alert("Error Email");
        document.getElementById("register_email").style.backgroundColor="red";
       // email.style.backgroundColor="red";
        return false;
    }
    else{
        console.log("WORKS");
        document.getElementById("register_email").style.backgroundColor="green";
    }

}

var prueba=function () {
    alert("Funciona javascript");
}
//La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.NO puede tener otros símbolos.

function validar() {
    var password = document.getElementById("register_password").value;
    console.log("prueba2");
    if (password == null || password.length == 0 || /^\s+$/.test(password)) {
        alert("Escriba una contraseña");
        document.getElementById("register_password").style.backgroundColor = 'red';
        return false;
    } else {
        ///^(?.*[A-Z])(?=,*[a-z])(?=.*\d)[A-Za-Z\d]{8,16}$/
        if(!(/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/).test(password)){
alert("NO cumple con los requisitos de seguridad");
document.getElementById("register_password").style.backgroundColor = 'red';
        }
        else{
            document.getElementById("register_password").style.backgroundColor = 'green';
        }
    }
}
function validar1(){
    var name = document.getElementById("register_name").value;
    console.log("prueba2");
    if (name == null || name.length == 0 || /^\s+$/.test(name)) {
   
        
        document.getElementById("register_name").style.backgroundColor = 'red';
        return false;
    }
    else{
        
        document.getElementById("register_name").style.backgroundColor = 'green';
    }
}
function validar2(){
    var surname = document.getElementById("register_surname").value;
    console.log("prueba2");
    if (surname == null || surname.length == 0 || /^\s+$/.test(surname)) {
        
        
        document.getElementById("register_surname").style.backgroundColor = 'red';
        return false;
    }
    else{
        
        document.getElementById("register_surname").style.backgroundColor = 'green';
    }
}
window.addEventListener('load', inicio);