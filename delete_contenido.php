<?php
    if(isset($_POST["selectTema"]) && $_POST["selectTema"]!="" && isset($_POST["selectApartados"]) 
    && $_POST["selectApartados"]!="" && isset($_POST["selectContenido"]) && $_POST["selectContenido"]!=""){
        include "sql-connect.php";
        $id_tema=$_POST["selectTema"];
        $id_apartado=$_POST["selectApartados"];
        $id_contenido=$_POST["selectContenido"];
        $query="DELETE FROM contenido WHERE id =? AND id_apartado=? AND id_tema=?";
        $query=$conn->prepare($query);
        $query->execute([$id_contenido,$id_apartado,$id_tema]);
        $affected_rows=$query->rowCount();
        if($affected_rows==1){
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