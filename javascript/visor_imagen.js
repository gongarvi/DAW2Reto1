$(document).ready(function(){
    $("body").on('click','.imgTutorial',(event)=>{
        imgElement=event.target;
        let imageSRC=$(imgElement).attr("src");
        $("#visor img").attr("src",imageSRC);
        $("#visor").removeClass("no-ver");
        $("#visor").addClass("ver");
        $("#visor img").addClass("imgDisplay");
        let imgWidth=$("#visor img").width();
        let imgHeight=$("#visor img").height();
        windowWidth=$(window).width();
        windowHeight=$(window).height();
        $("#visor img").width();
        $("#visor img").css("margin-left",((windowWidth/2)-(imgWidth/2))+"px");
        $("#visor img").css("margin-top",((windowHeight/2)-(imgHeight/2))+"px");
    });
    $("#visor").click(()=>{
        $("#visor").removeClass("ver");
        $("#visor img").removeClass("imgDisplay");
        $("#visor").addClass("no-ver");
        $("#visor img").css("margin-left",0+"px");
        $("#visor img").css("margin-top",0+"px");
    });
});

//Validacion de crear comentario
document.getElementById("comenta").addEventListener("blur",()=>{
    var comentario=document.getElementById("comenta").value;
    if (comentario == null || comentario.length == 0 || /^\s+$/.test(comentario)) {
        document.getElementById("comenta").style.backgroundColor = '#FF5F5F';
    }
    else{
        document.getElementById("comenta").style.backgroundColor = 'white';
    }
});