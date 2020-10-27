<?php
header('Content-Type: application/JSON');
include 'sql-connect.php';

function getApartados(){
    include "sql-connect.php";
    if (isset($_POST["tema"])) {
        $numApartado = $_POST["tema"];
    }
    $query="SELECT id, nombre FROM apartado WHERE id_tema=?";
    $query=$conn->prepare($query);
    $query->execute([$numApartado]);
    $apartados=$query->fetchall();
    
    return $apartados;
}

$opcionTema = $_POST['tema'];
$apartado = getApartados($opcionTema);
$apartadoJSON = json_encode($apartado, JSON_UNESCAPED_UNICODE);

echo $apartadoJSON;


?>

