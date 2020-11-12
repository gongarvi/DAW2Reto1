//Se limpia el localsotarge cada vez que se cambia de pagina, de esta manera si lelva un tiempo sin entrar a la página, recibirá la última actualziación de los apartados
localStorage.clear();

var buttons=document.getElementById("menu").getElementsByClassName("navbar-submenu-opener");

//Añadiendo eventos en el menu, para poder abrir el submenu adecuado
for(let i = 0; i < buttons.length; i++){
    var button = buttons.item(i);
    buttons.item(i).addEventListener("click",abrirSubmenu);
}

var submenu =document.getElementById("submenu");
submenu.addEventListener("click",deappendSubmenu);

function abrirSubmenu(event){
    var tema=event.currentTarget.textContent+"";
    tema=tema.trim();
    //Se verifica si no se ha cambiado el tema, para evitar hacer  otra petición.
    if(!(localStorage.getItem("tema_seleccionado")+""===tema)){
        localStorage.setItem("tema_seleccionado",tema);
        //Obtenemos del php los apartados del tema.
        phpCallback(tema)
        .then((resolve)=>{
            //Guardamos en el localstorage el último apartado guardado.
            localStorage.setItem("apartados",JSON.stringify(resolve.apartados));
            localStorage.setItem("id_tema_seleccionado",JSON.stringify(resolve.tema));
            appendToSubmenu(resolve.tema, resolve.apartados);
        })
        .catch((error)=>{
            console.log(error);
        });
    }else{
        var apartados=JSON.parse(localStorage.getItem("apartados"));
        var tema=JSON.parse(localStorage.getItem("id_tema_seleccionado"));
        appendToSubmenu(tema,apartados);
    }
    
}


//Petición ajax para añadir al submenu
async function phpCallback(tema){
    return new Promise((resolve,reject)=>{
        $.ajax({
        url: "../submenu-back.php?tema="+tema+"",
        type: "get",
            success : (function (data) {        
                data=JSON.parse(data);
                resolve(data);
            }),
            error : (function(error){
                reject(error);
            })
        })
    });
}

//Función para añadir elementos al submenu, tambien se le da unae clase para los efectos.
function appendToSubmenu(tema,array){
    var ul=document.createElement("ul");
    submenu.className="submenu active"
    submenu.appendChild(ul);
    //submenu.animate([{"z-index": '100'},{"background-color":"rgba(0,0,0,0.5)"}],{duration:2000});
    array.forEach(element => {
        let li = document.createElement("li");
        let a = document.createElement("a");
        li.appendChild(a);
        a.text=element.nombre;
        a.href="http://"+window.location.hostname+"/contenido.php?tema="+tema+"&apartado="+element.apartado;
        ul.appendChild(li);
    }); 
    //Esto es para alinear al centro el submenu
    ul.style.marginTop = (-1)*(ul.clientHeight/2)+"px";
}

//Se elmina la clase sobrate y se elimina del DOM los apartados.
function deappendSubmenu(){
    submenu.className="submenu deactive";
    submenu.innerHTML="";
}
