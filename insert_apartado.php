<?php
include "sql-connect.php";

$temaSeleccionado       = $_POST['selectTema'];
$nombreApartado         = $_POST['nombreApartado']


if ($temaSeleccionado!=0 || $nombreApartado !="" || isset($nombreApartado)) {
    $id = getApartadoId($temaSeleccionado,$conn);
    insertarApartado($id,$temaSeleccionado,$nombreApartado);
}




function getApartadoId($tema_id, $conn){
    $sql = "SELECT id FROM apartado WHERE id_tema=? ORDER BY id desc";
    $sql = $conn->prepare($sql);
    $sql -> execute([$tema_id]);
    $idApartado = $sql->fetch();
    return $idApartado["id"];
}

function insertarApartado(){
    $sql = "INSERT INTO apartado (`id`,`id_tema`,`nombre`) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt -> execute([$id,$id_tema,$nombreApartado]);
    return $conn->lastInsertID();
}

?>