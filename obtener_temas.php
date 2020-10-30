<?php
    include "sql-connect.php";
    $id_tema = $_POST["id_tema"];
    if(isset($_POST["id_tema"]) && $_POST["id_tema"]!=""){
        $tema_unparsed = getTema($id_tema,$conn);
        $temaJSON = json_encode($tema_unparsed, JSON_UNESCAPED_UNICODE);
        echo $temaJSON;
    }

    function getTema($tema,$conn){
        $query="SELECT color_asociado, color_texto FROM tema WHERE id=?";
        $query=$conn->prepare($query);
        $query->execute([$tema]);
        $query_result=$query->fetch();
        $resultado=array(
            "colorPrincipal"=>$query_result["color_asociado"], 
            "colorTexto"=>$query_result["color_texto"]
        );
        return $resultado;
    }
?>