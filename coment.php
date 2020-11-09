<?php
    session_start();
    
    include_once "sql-connect.php";
    
        $comentario=$_POST['comenta'];
        $tema=$_POST['tema'];
        $apartado=$_POST['apartado'];
        $nombre=$_SESSION['email'];
       
    if(isset($comentario) && isset($nombre) && isset($apartado)&& $comentario!="" && $apartado!=""){
        $query="SELECT id FROM usuario where correo=?";
        $query=$conn->prepare($query);
        $query->execute([$nombre]);
        $idusuario=$query->fetch();
     
        if(isset($idusuario)&& $idusuario!=""){
            $query="INSERT INTO comentario(`id_usuario`,`id_apartado`,`texto`) VALUES (?,?,?)";
            $query=$conn->prepare($query);
            $query->execute(
                array($idusuario['id'],$apartado,$comentario)
            );  
            $affected_rows=$query->rowCount();
            if($affected_rows==1){
                crearGalleta("success","Se ha podido insertar el comentario");
            }elseif($affected_rows==0){
                crearGalleta("warning","No se ha podido insertar el comentario");
            }else{
                crearGalleta("error","Error en la insercion de datos".$conn->errorCode());
            }
        }
        else{
            crearGalleta("error","No se ha encontrado el usuario, contacte con el administrador");
        }      
    }
    else{
        crearGalleta("error","Faltan campos por completar");
    }
    function crearGalleta($tipo, $mensaje){
        setcookie($tipo,$mensaje,time()+60,"/");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

?>