<?php
    include_once "sql-connect.php";
/*
    $nombreTema         = $_POST['nombreTema'];
    $colorPrincipal     = $_POST['colorPrincipal'];
    $colorTexto         = $_POST['colorTexto'];
*/

    foreach($_POST as $key=>$i){
        $$key = $i;
    }

    if ((!isset($nombreTema)||$nombreTema == "")||(!isset($colorPrincipal)||$colorPrincipal == "")||(!isset($colorTexto)||$colorTexto == "")){
        crearGalleta("error","Por favor rellena todos los campos");
    }else{
        if(comprobarTema($nombreTema,$conn)==0){
            insertarTema($nombreTema,$colorPrincipal,$colorTexto,$conn);   
        }else{
            crearGalleta("error","El nombre del tema que ha insertado ya existe");
        }
    }
    

    function comprobarTema($nombreTema, $conn){
        $sql = "SELECT nombre FROM tema WHERE nombre=?";
        $sql = $conn ->prepare($sql);
        $sql -> execute([$nombreTema]);
        $nombresTema = $sql->fetchAll();
        return count($nombresTema);
    }


    function insertarTema($nombreTema,$colorPrincipal,$colorTexto,$conn){
        $sql = "INSERT INTO tema (`nombre`,`color_asociado`,`color_texto`) VALUES (?,?,?)";
        $sql = $conn->prepare($sql);
        $sql -> execute([$nombreTema,$colorPrincipal, $colorTexto]);
        // comprobación
        $affected_rows=$sql->rowCount();
        if($affected_rows==1){
            crearGalleta("success","Datos insertados correctamente");
        }elseif($affected_rows==0){
            crearGalleta("warning","No se han insertado los datos");
        }else{
            crearGalleta("error","Error en la insercion de datos".$sql->errorCode());
        }

    }

    
    function crearGalleta($tipo,$texto){
        setcookie($tipo,$texto,time()+60,"/");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

?>  