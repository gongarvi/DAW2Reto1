<?php
     foreach($_POST as $key=>$i){
        $$key = $i;
    }
    if(isset($tema) && $tema!=="" && isset($apartado) && $apartado!=="" && isset($idcomentario) && $idcomentario!=""){
        include "sql-connect.php";
        $query="DELETE FROM comentario WHERE ";
        $query=$conn->prepare($query);
        $query->execute([$apartado,$tema]);
        $query_result=$query->fetchAll();
        $result=array();
        
        echo (json_encode($result));
    }