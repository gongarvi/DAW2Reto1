<?php
    if(isset($_POST["tema"]) && $_POST["tema"]){
        $tema=$_POST["tema"];
        include "sql-connect.php";
        $query="DELETE FROM tema WHERE id=?";
        $query=$conn->prepare($query);
        $query->execute([$tema]);
        $affected_rows=$query->rowCount();
        if($affected_rows==1){
            setcookie("success","Se ha eliminado el tema correctamente.",time()+60,"/");
        }
        elseif($affected_rows==0){
            setcookie("warning","No se ha eliminado ningun tema.",time()+60,"/");
        }else{
            setcookie("error","Se han eliminado varios registros, contacte con el administrador.",time()+60,"/");
        }
    }else{
        setcookie("error","Faltan campos por completar.",time()+60,"/");
    }
    header("Location: " . $_SERVER["HTTP_REFERER"]);
?>