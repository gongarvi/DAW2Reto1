<?php
    include "sql-connect.php";
    $tema = $_POST["tema"];
    $apartado = $_POST["apartado"];

    $contenido = getContenido($tema, $apartado, $conn);
    $apartadoJSON = json_encode($contenido, JSON_UNESCAPED_UNICODE);
    echo $apartadoJSON;

    function getContenido($tema, $apartado, $conn){
        $query="SELECT id, titulo, texto, ruta_imagen FROM contenido WHERE id_apartado=? AND id_tema=?";
        $query=$conn->prepare($query);
        $query->execute([$apartado, $tema]);
        $query_result=$query->fetchAll();
        $resultado=array();
        foreach($query_result as $row){
            $resultado[]=array(
                "id"=>$row["id"],
                "titulo"=>$row["titulo"],
                "texto"=>$row["texto"],
                "ruta"=>$row["ruta_imagen"]
            );
        }
        return $resultado;
    }
?>