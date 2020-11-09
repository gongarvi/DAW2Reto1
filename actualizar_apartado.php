<?php
    foreach($_POST as $key=>$i){
        $$key=$i;
    }
    if(isset($inputApartado) && $inputApartado!="" && isset($selectApartados) && $selectApartados!="" && isset($selectTema) && $selectTema!=""){
        include_once "./sql-connect.php";
        $query="UPDATE apartado
            SET nombre=?
            WHERE id=? AND id_tema=?";
        $query=$conn->prepare($query);
        $query->execute([$inputApartado,$selectApartados,$selectTema]);
        $affected_rows=$query->rowCount();
        if($affected_rows==1) {
            crearGalleta("success","Se ha actualizado el apartado");
        }elseif($affected_rows==0){
            crearGalleta("warning","No se ha actualizado el apartado");
        }else{
            crearGalleta("error","Se han actualizado varios apartados, contacte con el administrador");
        }
    }else{
        crearGalleta("error","Error en la inserción de datos");
    }
    function crearGalleta($tipo, $mensaje){
        setcookie($tipo,$mensaje,time()+60,"/");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

?>