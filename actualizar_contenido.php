<?php
    if(isset($_POST["titulo"]) && $_POST["titulo"]!="" && isset($_POST["texto"]) && $_POST["texto"]!=""  && isset($_POST["selectTema"]) 
    && $_POST["selectTema"]!="" && isset($_POST["selectApartados"]) && $_POST["selectApartados"]!="" 
    && isset($_POST["selectContenido"]) && $_POST["selectContenido"]!=""){
        $ruta_imagen="";
        if(isset($_POST["imagen"]) && $_POST["imagen"]!=""){
            //TODO Actualziar imagen en el servidor
        }elseif(isset($_POST["ruta_imagen"]) && $_POST["ruta_imagen"]!=""){
            $ruta_imagen=$_POST["ruta_imagen"];
        }
        $id_contenido=$_POST["selectContenido"];
        $id_apartado=$_POST["selectApartados"];
        $id_tema=$_POST["selectTema"];
        $titulo=$_POST["titulo"];
        $texto=$_POST["texto"];
        include "sql-connect.php";
        $query="UPDATE contenido
            SET titulo=?, texto=?, ruta_imagen=?
            WHERE id=? AND id_apartado=? AND id_tema=?";
        $query=$conn->prepare($query);
        $query->execute([$titulo,$texto,$ruta_imagen,$id_contenido,$id_apartado,$id_tema]);
        $affected_rows=$query->rowCount();
        if($affected_rows==1){
            setcookie("success","Se ha modificado el contenido correctamente.",time()+60,"/");
        }
        elseif($affected_rows==0){
            setcookie("warning","No se ha modificado ningun contenido.",time()+60,"/");
        }else{
            setcookie("error","Se han modificado varios registros, contacte con el administrador.",time()+60,"/");
        }
    }else{
        setcookie("error","Faltan campos por completar.",time()+60,"/");
    }
    header("Location: " . $_SERVER["HTTP_REFERER"]);

?>