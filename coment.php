<?php
    session_start();
    $comentario=['comenta'];
    $tema=$_SESSION['apartado.id_tema'];
    $apartado=$_SERVER['apartado.id'];
    $nombre=$_SESSION['name'];
    $idusuario="SELECT usuario.id FROM usuario INNER JOIN comentario ON comentario.id_usuario=usuario.id WHERE usuario.nombre=$nombre";
   
    if(isset($comentario) && isset($idusuario) && isset($apartado)&& $comentario!="" && $idusuario!="" && $apartado!=""){
        include "sql-connect.php";
        $query="INSERT INTO comentario(`id_usuario','id_apartado,'texto'`) VALUES (?,?,?)";
        $query=$conn->prepare($query);
        $query->execute(
            array($idusuario,$comentario,$apartado)
        );  
    }
    else{
        error();
    }
    function error(){
        setcookie("error","Comentario no valido");
    }

?>