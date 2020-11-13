<?php
    session_start();
    
    include "sql-connect.php";
    $comentario=$_POST['comentario'];
    $tema=$_POST['tema'];
    $apartado=$_POST['apartado'];
    $nombre=$_SESSION['email'];
    $comentario_id=$_POST['id'];

    if(isset($comentario_id) &&  isset($comentario) && isset($nombre) && isset($apartado)&& $comentario!="" && $apartado!=""
        && $comentario_id!=""){
        $query="UPDATE `comentario` SET `texto`=?, `fecha`=? WHERE `id`=? AND `id_apartado`=?";
        $query=$conn->prepare($query);
        $now=date("Y-m-d H:i:s");
        $params=[$comentario,$now,$comentario_id,$apartado];
        $query->execute($params);  
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
        crearGalleta("error","Esta lleno de: ".$comentario);

    }
    function crearGalleta($tipo,$mensaje){
        setcookie($tipo,$mensaje,time()+60,"/");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    

?>