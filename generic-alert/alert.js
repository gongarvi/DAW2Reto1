$(document).ready(()=>{
    var alert = document.getElementsByClassName("alert")[0];
    var tipo=localStorage.getItem("tipo");
    var mensaje=localStorage.getItem("mensaje");
    localStorage.clear();
    if((tipo!="" && mensaje!="")&&(mensaje!=null && tipo!=null)){
        if(tipo=="error"){
            tipo="danger";
        }
        console.log("entra");
        alert.className=("alert alert-"+tipo);
        alert.textContent=mensaje;
        
        $(".modal").modal();
        setTimeout(()=>{$(".modal").modal("hide");},4000);
    }
});