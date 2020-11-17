<?php

include "sql-connect.php";

$temaSeleccionado= $_POST["selectTema"];
$apartadoSeleccionado   = $_POST["selectApartado"];

echo $apartadoSeleccionado."   ".$temaSeleccionado;

if ($temaSeleccionado != 0 && $apartadoSeleccionado != 0) {
    deleteApartado($apartadoSeleccionado,$temaSeleccionado,$conn);
}
crearGalleta("error","Faltan datos por insertar");

function deleteApartado($apartadoSeleccionado,$temaSeleccionado,$conn){
    $sql = "DELETE FROM apartado WHERE id = ? AND id_tema=?";
    $sql=$conn->prepare($sql);
    $sql->execute([$apartadoSeleccionado,$temaSeleccionado]);
    $affected_rows=$sql->rowCount();
    echo $affected_rows;
    if($affected_rows==1){
        crearGalleta("success","Datos eliminados correctamente");
    }elseif($affected_rows==0){
        crearGalleta("warning","No se han eliminado los datos");
    }else{
        crearGalleta("error","Error en la insercion de datos".$sql->errorCode());
    }
}

function crearGalleta($tipo,$texto){
    setcookie($tipo,$texto,time()+60,"/");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

?>