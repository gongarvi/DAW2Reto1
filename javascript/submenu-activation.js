var buttons=document.getElementById("menu").getElementsByTagName("button");

for(let i = 0; i < buttons.length; i++){
    var button = buttons.item(i);
    buttons.item(i).addEventListener("click",abrirSubmenu);
}


function abrirSubmenu(event){
    var tema=event.currentTarget.textContent+"";
    tema=tema.trim();
    phpCallback(tema)
    .then((resolve)=>{
        localStorage.setItem("apartados",resolve.apartados);
        localStorage.setItem("tema_seleccionado",resolve.tema)
        appendToSubmenu(resolve.apartados);
    })
    .catch((error)=>{
        console.log(error);
    });
}



async function phpCallback(tema){
    return new Promise((resolve,reject)=>{
        $.ajax({
        url: "submenu-back.php?tema="+tema+"",
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
function appendToSubmenu(array){
    console.log(array);
    var submenu = document.getElementById("submenu");
    submenu.removeChild(submenu.firstChild);
    submenu.className="submenu submenu-active";
    submenu.addEventListener("click",deappendSubmenu);
    var ul=document.createElement("ul");
    submenu.appendChild(ul);
    array.forEach(element => {
        let li = document.createElement("li");
        let a = document.createElement("a");
        li.appendChild(a);
        a.text=element.nombre;
        a.href="contenido.php?tema="+element.tema+"&apartado="+element.apartado;
        ul.appendChild(li);
    });
       
}

function deappendSubmenu(){
    var submenu = document.getElementById("submenu");
    submenu.className="submenu";
}