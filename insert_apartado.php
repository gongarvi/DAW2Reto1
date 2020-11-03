<?php
include "sql-connect.php";

$temaSeleccionado       = $_POST['selectTema'];
$nombreApartado         = $_POST['nombreApartado'];
$fecha                  = getdate();

if ($temaSeleccionado!=0 && $nombreApartado !="" && isset($nombreApartado)) {
    $id = (getApartadoId($temaSeleccionado,$conn))+1;
    insertarApartado($id,$temaSeleccionado,$nombreApartado,$conn);
}else {
    crearGalleta("error","Rellena todos los campos");
}




function getApartadoId($tema_id, $conn){
    $sql = "SELECT id FROM apartado WHERE id_tema=? ORDER BY id desc";
    $sql = $conn->prepare($sql);
    $sql -> execute([$tema_id]);
    $idApartado = $sql->fetch();
    return $idApartado["id"];
}

function insertarApartado($id,$id_tema,$nombreApartado,$conn){
    $sql = "INSERT INTO apartado (`id`,`id_tema`,`nombre`) VALUES (?,?,?)";
    $sql = $conn->prepare($sql);
    $sql -> execute([$id,$id_tema,$nombreApartado]);
    $affected_rows=$sql->rowCount();
        if($affected_rows==1){
            crearGalleta("success","Datos insertados correctamente");
        }elseif($affected_rows==0){
            crearGalleta("warning","No se han insertado los datos");
        }else{
            crearGalleta("error","Error en la inserción de datos".$sql->errorCode());
        }
    return $conn->lastInsertID();
}

function crearGalleta($tipo,$texto){
    setcookie($tipo,$texto,time()+60,"/");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

?>