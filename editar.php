<?php
    session_start();
    
    include "sql-connect.php";
        $comentario=$_POST['comenta'];
        $tema=$_POST['tema'];
        $apartado=$_POST['apartado'];
        $nombre=$_SESSION['email'];
        $id=$_POST['id'];
      
    if(isset($comentario) && isset($nombre) && isset($apartado)&& $comentario!="" && $apartado!=""){
        $query3="SELECT id FROM usuario WHERE correo=?";
        $query3=$conn->prepare($query3);
        $query3->execute([$nombre]);
        $idusuario=$query3->fetch();
     
        if(isset($idusuario)&& $idusuario!=""){
            $query="UPDATE comentario SET texto=? WHERE id_usuario=? AND id=?";
            $query=$conn->prepare($query);
            $query->execute([$comentario,$idusuario['id'],$id]);  
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
        setcookie("error","Editar falla");
        
    }
    

?>