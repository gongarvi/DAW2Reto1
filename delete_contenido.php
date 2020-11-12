<?php
    if(isset($_POST["selectTema"]) && $_POST["selectTema"]!="" && isset($_POST["selectApartados"]) 
    && $_POST["selectApartados"]!="" && isset($_POST["selectContenido"]) && $_POST["selectContenido"]!=""){
        include_once "sql-connect.php";
        $id_tema=$_POST["selectTema"];
        $id_apartado=$_POST["selectApartados"];
        $id_contenido=$_POST["selectContenido"];
        $query="SELECT ruta_imagen FROM contenido WHERE id =? AND id_apartado=? AND id_tema=?";
        $query=$conn->prepare($query);
        $query->execute([$id_contenido,$id_apartado,$id_tema]);
        $contenido=$query->fetch();

        $ruta=$contenido["ruta_imagen"];
        $ruta_parseada = explode("/",$ruta);
        $tipo="";
        if($ruta_parseada[2]==$_SERVER["SERVER_NAME"]){
            $tipo=explode(".",$ruta_parseada[(count($ruta_parseada)-1)])[1];
        }
        $query="DELETE FROM contenido WHERE id =? AND id_apartado=? AND id_tema=?";
        $query=$conn->prepare($query);
        $query->execute([$id_contenido,$id_apartado,$id_tema]);
        $affected_rows=$query->rowCount();
        if($affected_rows==1){
            $ruta="media/".$id_tema."_".$id_apartado."_".$id_contenido.".".$tipo;
            if(file_exists($ruta)){
                unlink($ruta);
            }
            setcookie("success","Se ha eliminado el contenido correctamente.",time()+60,"/");
        }
        elseif($affected_rows==0){
            setcookie("warning","No se ha eliminado ningun contenido.",time()+60,"/");
        }else{
            setcookie("error","Se han eliminado varios registros, contacte con el administrador.",time()+60,"/");
        }
        
    }else{
        setcookie("error","Faltan campos por completar.",time()+60,"/");
    }
    header("Location: " . $_SERVER["HTTP_REFERER"]);

?>