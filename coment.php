<?php
    session_start();
    $comentario=$_POST['comenta'];
    $idusuario="SELECT id_usuario FROM usuario INNER JOIN  
    comentario ON comentario.id_usuario=usuario.id WHERE usuario.nombre=$_SESSION['nombre']";
    $fecha=date("d/m/y h:i:s");
    if(isset($comentario) && isset($fecha) &&  isset($idusuario) && $comentario!="" && $idusuario!="" && $fecha!="" ){
        include "sql-connect.php";
        $query="INSERT INTO comentario(`id_usuario','texto','fecha`) VALUES (?,?,?)";
        $query=$conn->prepare($query);
        $query->execute(
            array($idusuario,$comentario,$fecha);
        );  
    }
    else{
        error()
    }
    function error(){
        setcookie("Error","Comentario no valido")
    }

?>