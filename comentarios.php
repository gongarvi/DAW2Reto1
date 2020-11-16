<link rel="stylesheet" href="css/comentarios.css">
<?php

    include_once "sql-connect.php";
    if (isset($_GET["apartado.id"])) {
        $numApartado = $_GET["apartado.id"];
    }
    if (isset($_GET["apartado.id_tema"])) {
        $numTema = $_GET["apartado.id_tema"];
    }

    
    $query="SELECT usuario.correo as email, usuario.nombre as nombre_usuario, usuario.apellido as apellido_usuario,comentario.texto as comentario, comentario.fecha as fecha,
        comentario.padre as padre, comentario.id as idcomentario FROM usuario INNER JOIN comentario ON comentario.id_usuario=usuario.id  
        INNER JOIN apartado ON apartado.id=comentario.id_apartado WHERE apartado.id=? AND apartado.id_tema=? LIMIT 10 OFFSET 0";
    $query=$conn->prepare($query);
    $query->execute(array($numApartado,$numTema));
    $comentarios=$query->fetchAll();
    if($comentarios!=null || count($comentarios)>0){
        echo '<div class="divContenido"> 
        <div id="comentarios_contenido">';  
         $i=0;      
        foreach($comentarios as $comentario){
            echo '<div>
                <p class="comentario">'.$comentario['nombre_usuario'] ." ". $comentario['apellido_usuario'].": <br>". 
                    '<span contentEditable = "false">'.$comentario["comentario"].'</span>'.
                '</p>
                <p class="fecha">'.$comentario['fecha'].'</p>';
                if(isset($_SESSION["email"])){
                    if($_SESSION["email"]===$comentario["email"] || $_SESSION["administrador"]){
                        //Editar
                        echo ' <form class="editar" action="actualizar_comentario.php" method="post">
                        <input type="button" class="btn btn_editar material-icons" name="editar" value="create">
                        <input type="hidden" name="apartado" value="'.$numApartado.'"> 
                        <input type="hidden" name="tema" value="'.$numTema.'">
                        <input type="hidden" name="id" value="'.$comentario['idcomentario'].'">
                        <input type="submit" class="btn btn_Guardar material-icons" id="guardar" name="guardar" value="save" hidden>
                        <input type="hidden" name="comentario" value="'.$comentario["comentario"].'">
                        </form>';
                        //Eliminar
                        echo '<form class="borrar" action="delete_comentario.php" method="post" >
                        <input type="submit" class="btn btn_eliminar material-icons" name="eliminar"  value="delete">
                        <input type="hidden" name="apartado" value="'.$numApartado.'">
                        <input type="hidden" name="tema" value="'.$numTema.'">
                        <input type="hidden" name="id" value="'.$comentario['idcomentario'].'">
                        </form>';
                    }
                }
            echo  '</div>'; 
        }
        echo '</div>
            <button class="btn btn_info btn_verMas">Ver mas</button>
        </div>';
    }
?> 
<script> 
    const email = "<?php echo (isset($_SESSION["email"]))?$_SESSION["email"]:"";?>";
    const administrador = <?php  
        if(isset($_SESSION["administrador"])){
            if(($_SESSION["administrador"]==1)){
                echo 'true';
            }
            else{
                echo 'false';
            }
        }
        else{
            echo 'false';
        } 
        ?>;
</script>
<script src="javascript/comentarios.js" type="module"></script>
