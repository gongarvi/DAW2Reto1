<?php
    $resultado="";
    if(isset($_GET["tema"])){
        $tema=$_GET["tema"];
        include "sql-connect.php";
        $query="SELECT t.id as tema_id, a.id as apartado_id, a.nombre as nombre FROM apartado as a JOIN  tema as t ON t.id=a.id_tema WHERE t.nombre=?";
        $query=$conn->prepare($query);
        $query->execute([$tema]);
        $apartados=$query->fetchAll();
        if(count($apartados)==0){
            header('HTTP/1.1 404 Not Found');
        }else{
            $resultado=array();
            foreach($apartados as $apartado){
                $resultado[]=array(
                    "tema"=>$apartado["tema_id"],
                    "apartado"=>$apartado["apartado_id"],
                    "nombre"=>$apartado["nombre"]
                );
            }
        }
    }
    else{
        header('HTTP/1.1 404 Not Found');
    }
    echo json_encode($resultado);