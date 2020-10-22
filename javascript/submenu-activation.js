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
        console.log(tema);
        appendToSubmenu(resolve);
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
                resolve(data);
            }),
            error : (function(error){
                reject(error);
            })
        })
    });
}
function appendToSubmenu(array){
    document.getElementById("submenu").setAttribute("class","submenu-active");
}