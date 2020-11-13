<?php
    include "sql-connect.php";

    $idUsuarios         = $_POST['id'];
    $nombreUsu     = $_POST['nombreUsu'];
    $apellidoUsu        = $_POST['apellidoUsu'];
    $adminUsu           = $_POST['adminUsu'];
    

    if($_POST['boton'] != 'Modificar')
    {
        
        $elId=$_POST['elId'];
        eliminarUsuario($elId,$conn);
    }elseif($_POST['boton'] == 'Modificar')
    {
        actualizarUsuarios($nombreUsu,$apellidoUsu,$adminUsu,$idUsuarios,$conn);
    }
    


    function actualizarUsuarios($nombreUsu,$apellidoUsu,$adminUsu,$idUsuarios,$conn){
        $sql="UPDATE usuario SET nombre=?,apellido=?,administrador=? WHERE id=?";
        $sql=$conn->prepare($sql);
        $suma_rows=0;
        foreach($idUsuarios as $id){
            $sql->execute([$nombreUsu[$id],$apellidoUsu[$id],$adminUsu[$id],$id]);
            $affected_rows=$sql->rowCount();
            if($affected_rows>1||$affected_rows<0){
                break;
                $suma_rows=-1;
                crearGalleta("error","Hubo un error en la inserción de datos");
            }else{
                $suma_rows=$suma_rows+$affected_rows;
            }

        }


        if($suma_rows>=1) {
            crearGalleta("success","Se han actualizado los usuarios");
        }elseif($affected_rows==0){
            crearGalleta("warning","No se han actualizado los usuarios");
        }
    }

    function eliminarUsuario($id,$conn){
        $sql="DELETE FROM usuario WHERE id =?";
        $sql=$conn->prepare($sql);
        $sql->execute([$id]);
        $affected_rows=$sql->rowCount();
        if($affected_rows==1){
            crearGalleta("success","Se ha eliminado el usuario.");
        }elseif($affected_rows==0){
            crearGalleta("warning","No se ha eliminado ningun usuario.");
        }else{
            crearGalleta("error","Se han eliminado varios registros, contacte con el administrador.");
        }
    }

    function crearGalleta($tipo, $mensaje){
        setcookie($tipo,$mensaje,time()+60,"/");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    
    
?>