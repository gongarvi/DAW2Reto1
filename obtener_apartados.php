<?php
header('Content-Type: application/JSON');
include 'sql-connect.php';


$opcionTema="";
if (isset($_POST["tema"])) {
    $opcionTema = $_POST["tema"];
    $apartado = getApartados($opcionTema);
    $apartadoJSON = json_encode($apartado, JSON_UNESCAPED_UNICODE);
    echo $apartadoJSON;
}else{
    echo $opcionTema;
}

function getApartados($opcionTema){
    include "sql-connect.php";
    $query="SELECT id, nombre FROM apartado WHERE id_tema=?";
    $query=$conn->prepare($query);
    $query->execute([$opcionTema]);
    $apartados=$query->fetchAll();
    $resultado=array();
    foreach($apartados as $apartado){
        $resultado[]=array(
            "id"=>$apartado["id"],
            "nombre"=>$apartado["nombre"]
        );
    }
    return $resultado;
}


?>

