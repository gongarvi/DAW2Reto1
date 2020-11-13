<?php 
    include_once "sql-connect.php";

    $tema                   = $_POST['inputTema'];
    $temaSeleccionado       = $_POST['selectTema'];
    $apartado               = $_POST['inputApartado'];
    $apartadoSeleccionado   = $_POST['selectApartado'];
    $titulo                 = $_POST['titulo'];
    $texto                  = $_POST['texto'];
    $archivo                = $_FILES['archivo'];
    $ruta                   = $_POST['rutaImg'];
    $radioBtn               = $_POST['inlineRadioOptions'];

    
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

    
    if ($temaSeleccionado != 0 && $apartadoSeleccionado != 0) {
        $idContenido = getContenidoId($conn)+1;
        if ($radioBtn === "archivo") {
            if($_FILES["archivo"]["error"]==0){
                
                if (!is_dir("./media")) {
                    mkdir("./media");
                }
                
                if($archivo["type"]==="image/png" || $archivo["type"]==="image/JPG" || $archivo["type"]==="image/jpeg"){
                    $tipo=substr($archivo["type"],6);
                    move_uploaded_file($archivo['tmp_name'],"./media/".$temaSeleccionado."_".$apartadoSeleccionado."_".$idContenido.".".$tipo);
                    $ruta="http://".$_SERVER["SERVER_NAME"]."/media/".$temaSeleccionado."_".$apartadoSeleccionado."_".$idContenido.".".$tipo;
                }else{
                    crearGalleta("error", "Tipo de archivo no permitido.");
                }
            }
        }
        if ($texto=="" || $titulo=="" ) {
            crearGalleta("error","Contenido no insertado");
        }else{
            insertarDatos($idContenido,$apartadoSeleccionado,$temaSeleccionado,$titulo,$texto,$ruta,$conn);
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