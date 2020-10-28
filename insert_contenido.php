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
        $temaSeleccionado=insertarTema($tema,$conn);
    }
    echo $apartadoSeleccionado;
    if ($apartadoSeleccionado == 0) {
        $idApartado = getApartadoId($temaSeleccionado,$conn);
        $idApartado++;
        insertarApartado($temaSeleccionado,$apartado,$conn,$idApartado);
        $apartadoSeleccionado = $idApartado;
    }

    
    if ($temaSeleccionado != 0 && $apartadoSeleccionado != 0) {
        $idContenido = getContenidoId($conn);
        insertarDatos($idContenido,$apartadoSeleccionado,$temaSeleccionado,$titulo,$texto,$titulo,$conn);
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
            echo "Insertado correctamente";
        }else{
            echo "Error, no se ha insertado";
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
            echo "Insertado correctamente";
            
        }else{
            echo "Error, no se ha insertado";
        }
    }
?>