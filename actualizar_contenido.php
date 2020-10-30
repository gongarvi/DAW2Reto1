<?php
    if(isset($_POST["titulo"]) && $_POST["titulo"]!="" && isset($_POST["texto"]) && $_POST["texto"]!=""  && isset($_POST["selectTema"]) 
    && $_POST["selectTema"]!="" && isset($_POST["selectApartados"]) && $_POST["selectApartados"]!="" 
    && isset($_POST["selectContenido"]) && $_POST["selectContenido"]!=""){
        include "sql-connect.php";
        $ruta_imagen="";
        $id_contenido=$_POST["selectContenido"];
        $id_apartado=$_POST["selectApartados"];
        $id_tema=$_POST["selectTema"];
        $titulo=$_POST["titulo"];
        $texto=$_POST["texto"];
        if(isset($_POST["inlineRadioOptions"]) && $_POST["inlineRadioOptions"]==="archivo"){
            //TODO Actualziar imagen en el servidor
            $imagen = $_FILES["archivo"];
            if(!is_dir("./media")){
                mkdir("./media");
            }
            if($imagen["type"]==="image/png" || $imagen["type"]==="image/jpg" || $imagen["type"]==="image/jpeg"){
                $tipo=substr($imagen["type"],6);
                move_uploaded_file($imagen["tmp_name"],"./media/".$id_tema."_".$id_apartado."_".$id_contenido.".".$tipo);
                $ruta_imagen="http://".$_SERVER["SERVER_NAME"]."/media/".$id_tema."_".$id_apartado."_".$id_contenido.".".$tipo;                
            }else{
                sendCookie("error", "Tipo de archivo no permitido.");
            }
            var_dump($imagen);
            die();
        }elseif(isset($_POST["inlineRadioOptions"]) && $_POST["inlineRadioOptions"]==="ruta"){
            $ruta_imagen=$_POST["ruta_imagen"];
        }
        echo $ruta_imagen;
        $query="UPDATE contenido
            SET titulo=?, texto=?, ruta_imagen=?
            WHERE id=? AND id_apartado=? AND id_tema=?";
        $query=$conn->prepare($query);
        $query->execute([$titulo,$texto,$ruta_imagen,$id_contenido,$id_apartado,$id_tema]);
        $affected_rows=$query->rowCount();
        if($affected_rows==1){
            sendCookie("success","Se ha modificado el contenido correctamente.");
        }
        elseif($affected_rows==0){
            sendCookie("warning","No se ha modificado ningun contenido.");
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