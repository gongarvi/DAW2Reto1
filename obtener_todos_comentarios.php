<?php
    foreach($_GET as $key=>$i){
        $$key = $i;
    }
    if(isset($tema) && $tema!=="" && isset($apartado) && $apartado!=="" && isset($rowCount) && $rowCount!="" && is_numeric($rowCount)){
        include "sql-connect.php";
        $query="SELECT usuario.correo as email, usuario.nombre as nombre, usuario.apellido as apellido, comentario.texto as comentario, comentario.fecha as fecha,
        comentario.padre as padre, comentario.id as idcomentario FROM usuario INNER JOIN comentario ON comentario.id_usuario=usuario.id  
        INNER JOIN apartado ON apartado.id=comentario.id_apartado WHERE apartado.id=? AND apartado.id_tema=? LIMIT 10 OFFSET ". $rowCount;
        $query=$conn->prepare($query);
        $query->execute([$apartado,$tema]);
        $query_result=$query->fetchAll();
        $result=array();
        foreach($query_result as $row){ 
            $result[]=array(
                "email"=>$row["email"],
                "nombre"=>$row["nombre"],
                "apellido"=>$row["apellido"],
                "comentario"=>$row["comentario"],
                "fecha"=>$row["fecha"],
                "padre"=>$row["padre"],
                "id_comentario"=>$row["idcomentario"]
            );
        }
        echo (json_encode($result));
    }
    echo "";