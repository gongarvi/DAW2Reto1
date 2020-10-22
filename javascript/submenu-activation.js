var buttons=document.getElementById("menu").getElementsByTagName("button");


for(let i = 0; i < buttons.length; i++){
    var button = buttons.item(i);
    buttons.item(i).addEventListener("click",abrirSubmenu);
}

var submenu =document.getElementById("submenu");
submenu.addEventListener("click",deappendSubmenu);

function abrirSubmenu(event){
    var tema=event.currentTarget.textContent+"";
    tema=tema.trim();
    if(!(localStorage.getItem("tema_seleccionado")+""===tema)){
        localStorage.setItem("tema_seleccionado",tema);
        phpCallback(tema)
        .then((resolve)=>{
            console.log(resolve);
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
function appendToSubmenu(tema,array){
    submenu.className="submenu submenu-active";
    var ul=document.createElement("ul");
    submenu.appendChild(ul);
    array.forEach(element => {
        let li = document.createElement("li");
        let a = document.createElement("a");
        li.appendChild(a);
        a.text=element.nombre;
        a.href="contenido.php?tema="+tema+"&apartado="+element.apartado;
        ul.appendChild(li);
    }); 
    ul.style.marginTop = (-1)*(ul.clientHeight/2)+"px";
}

function deappendSubmenu(){
    submenu.className="submenu";
    submenu.innerHTML="";
}
