<?php
    include "sql-connect.php";
    
    $idUsuarios         = $_POST['id'];
    $nombreUsu     = $_POST['nombreUsu'];
    $apellidoUsu        = $_POST['apellidoUsu'];
    $adminUsu           = $_POST['adminUsu'];

    print_r( $idUsuarios);
    echo "<br>";
    print_r($nombreUsu);
    echo "<br>";
    print_r($apellidoUsu);
    echo "<br>";
    print_r($adminUsu);
    echo (count($idUsuarios));

    for ($i=0; $i <count($idUsuarios) ; $i++) {
        $id=$idUsuarios[$i];
        // echo "<br><br>",$nombreUsu[$id]," - ",$apellidoUsu[$id]," - ",$adminUsu[$id]," - ",$id,"<br>";
        actualizarUsuarios($nombreUsu[$id],$apellidoUsu[$id],$adminUsu[$id],$id,$conn);
    }
    


    function actualizarUsuarios($nombreUsu,$apellidoUsu,$adminUsu,$idUsuarios,$conn){
        $sql="UPDATE usuario SET nombre=?,apellido=?,administrador=? WHERE id=?";
        $sql=$conn->prepare($sql);
        $sql->execute([$nombreUsu,$apellidoUsu,$adminUsu,$idUsuarios]);
        $affected_rows=$sql->rowCount();
        if($affected_rows==1) {
            crearGalleta("success","Se han actualizado los usuarios");
        }elseif($affected_rows==0){
            crearGalleta("warning","No se han actualizado los usuarios");
        }
    }



    function crearGalleta($tipo, $mensaje){
        setcookie($tipo,$mensaje,time()+60,"/");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    


?>