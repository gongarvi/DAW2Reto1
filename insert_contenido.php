<?php 
    // <!-- lastinsertId() -->
    include "sql-connect.php";

    $tema                   = $_POST['inputTema'];
    $temaSeleccionado       = $_POST['selectTema'];
    $apartado               = $_POST['inputApartado'];
    $apartadoSeleccionado   = $_POST['selectApartado'];
    $titulo                 = $_POST['titulo'];
    $texto                  = $_POST['texto'];
    $archivo                = $_POST['archivo'];
    $ruta                   = $_POST['rutaImg'];
    

    if ($temaSeleccionado == 0) {
        if($tema!=""){
            $temaSeleccionado=insertarTema($tema,$conn);
        }else{
            crearGalleta("error","Datos insuficientes");
        }
    }

    if ($apartadoSeleccionado == 0) {
        if($apartado!=""){
            $idApartado = getApartadoId($temaSeleccionado,$conn);
            $idApartado++;
            insertarApartado($temaSeleccionado,$apartado,$conn,$idApartado);
            $apartadoSeleccionado = $idApartado;
        }else{
            crearGalleta("error","Datos insuficientes");

        }
    }
    
    echo "id apartado: $apartadoSeleccionado";
    
    if ($temaSeleccionado != 0 && $apartadoSeleccionado != 0) {
        $idContenido = getContenidoId($conn)+1;
        echo " id contenido: $idContenido";
        if ($texto=="" || $titulo=="" ) {
            crearGalleta("error","Contenido no insertado");
        }else{
            insertarDatos($idContenido,$apartadoSeleccionado,$temaSeleccionado,$titulo,$texto,$ruta,$conn);
            crearGalleta("success","Datos creados correctamente");
        }
    }
    



    // Funcion para insertar el tema
    function insertarTema($tema,$conn){
        $sql = "INSERT INTO tema (`nombre`) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt -> execute([$tema]);
        return $conn->lastInsertID();
    }

    // Funcion para coger el ultimo id de apartado
    function getApartadoId($tema_id, $conn){
        $sql = "SELECT id FROM apartado WHERE id_tema=? ORDER BY id desc";
        $sql = $conn->prepare($sql);
        $sql -> execute([$tema_id]);
        $idApartado = $sql->fetch();
        return $idApartado["id"];
    }


    // Funcion para insertar el apartado
    function insertarApartado($temaSeleccionado,$apartado,$conn,$id){
        $sql="INSERT INTO apartado (`id`,`id_tema`,`nombre`) VALUES (?,?,?)";
        $sql= $conn->prepare($sql);
        $sql->execute([$id,$temaSeleccionado,$apartado]);
        if($sql){
        
        }else{
            crearGalleta("error","Error en la insercion de apartado");
        }
    }

    // Funcion para coger el ultimo id de contenido 
    function getContenidoId($conn){
        $sql = "SELECT id FROM contenido ORDER BY id desc";
        $sql = $conn->prepare($sql);
        $sql -> execute();
        $idContenido = $sql->fetch();
        return $idContenido["id"];
    }

    // Funcion para insertar los datos 
    function insertarDatos($id,$apartado_id,$tema_id,$titulo,$texto,$ruta,$conn){
        $sql="INSERT INTO contenido (`id`,`id_apartado`,`id_tema`,`texto`,`ruta_imagen`,`titulo`) VALUES (?,?,?,?,?,?)";
        $sql= $conn->prepare($sql);
        $sql->execute([$id,$apartado_id,$tema_id,$texto,$ruta,$titulo]);
        if($sql){
            header('Location: http://localhost/admin/contenido.php?option=crear');
        }else{
            crearGalleta("error","error en la insercion de datos");
        }
    }

    function crearGalleta($tipo,$texto){
        setcookie($tipo,$texto,time()+60,"/");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

?>