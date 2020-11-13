$("td").dblclick(function(event){
    if($(event.target).attr("type")=="text"){
        // console.log("entra");
        $(event.target).attr('readonly',false);  
        $(event.target).focus();
    }
});
$("input[type=text]").focusout(function(event) {
   $(event.target).attr('readonly',true);
    
});

$("form input").click((event)=>{
    let idSelccionado=$(event.target.parentNode.parentNode).find("input[type=hidden]").val();
    $("form input[name=elId]").val(idSelccionado);
});