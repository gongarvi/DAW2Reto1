<?php
    session_start();
    
    include "sql-connect.php";
    $comentario=$_POST['comentario'];
    $tema=$_POST['tema'];
    $apartado=$_POST['apartado'];
    $nombre=$_SESSION['email'];
    $comentario_id=$_POST['id'];

    if(isset($comentario) && isset($nombre) && isset($apartado)&& $comentario!="" && $apartado!=""){
        $query="SELECT id FROM usuario WHERE correo=?";
        $query=$conn->prepare($query);
        $query->execute([$nombre]);
        $idusuario=$query->fetch()["id"];
        if(isset($idusuario)&& $idusuario!=""){
            $query="UPDATE comentario SET texto=? WHERE id_usuario=? AND id=? AND id_apartado=?";
            $query=$conn->prepare($query);
            $query->execute([$comentario,$idusuario,$comentario_id,$apartado]);  
            $affected_rows=$query->rowCount();
            if($affected_rows==1){
                crearGalleta("success","El comentario ha sido modificado");
            }elseif($affected_rows==0){
                crearGalleta("warning","No se ha modificado el comentario");
            }else{
                crearGalleta("error","Error al modifica el comentario, ponte en contacto con el administrador");
            }
       }
        else{
            crearGalleta("error","No se ha encontrado al usuario");
        }
    }
    else{
        crearGalleta("error","Faltan campos.");
    }
    function crearGalleta($tipo,$mensaje){
        setcookie($tipo,$mensaje,time()+60,"/");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    

?>