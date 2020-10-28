<?php
    session_start();
    
    include "sql-connect.php";
        $comentario=$_POST['comenta'];
        $tema=$_POST['tema'];
        $apartado=$_POST['apartado'];
        $nombre=$_SESSION['email'];
       echo $nombre;
    if(isset($comentario) && isset($nombre) && isset($apartado)&& $comentario!="" && $apartado!=""){
        $query3="SELECT id FROM usuario where correo=?";
        $query3=$conn->prepare($query3);
        $query3->execute([$nombre]);
        $idusuario=$query3->fetch();
       echo $idusuario['id'];
        if(isset($idusuario)&& $idusuario!=""){
            $query="INSERT INTO comentario(`id_usuario`,`id_apartado`,`texto`) VALUES (?,?,?)";
            $query=$conn->prepare($query);
            $query->execute(
                array($idusuario['id'],$apartado,$comentario)
            );  
           
       }
        else{
           error();
           return false;
         }
        
    }
    else{
        error();
        return false;
    }
    function error(){
        setcookie("error","Comentario no valido");
        
    }
    

?>