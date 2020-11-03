<?php
    var_dump($_POST);
    if(isset($_POST["selectTema"]) && $_POST["selectTema"]!="" && isset($_POST["inputTema"]) 
    && $_POST["inputTema"]!="" && isset($_POST["colorPrincipal"]) && $_POST["colorPrincipal"]!="" 
    && isset($_POST["colorTexto"]) && $_POST["colorTexto"]!=""){
        foreach($_POST as $key=>$i){
            $$key=$i;
        }
        include_once "sql-connect.php";
        $query="UPDATE tema
            SET nombre=?, color_asociado=?, color_texto=?
            WHERE id=?";
        $query=$conn->prepare($query);
        $query->execute([$inputTema,$colorPrincipal,$colorTexto,$selectTema]);
        $affected_rows=$query->rowCount();
        if($affected_rows==1){
            sendCookie("success","Se ha modificado el tema correctamente.");
        }
        elseif($affected_rows==0){
            sendCookie("warning","No se ha modificado el tema.");
        }else{
            sendCookie("error","Se han modificado varios registros, contacte con el administrador.");
        }
    }else{
        sendCookie("error","Faltan campos por completar.");
    }
   function sendCookie($type, $text){
        setcookie($type,$text,time()+60,"/");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
?>