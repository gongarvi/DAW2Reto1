
    <?php
    include "sql-connect.php";
    if (isset($_GET["apartado.id"])) {
        $numApartado = $_GET["apartado.id"];
    }
    if (isset($_GET["apartado.id_tema"])) {
        $numTema = $_GET["apartado.id_tema"];
    }
    $query="SELECT usuario.nombre as nombre_usuario, usuario.apellido as apellido_usuario,comentario.texto as comentario, comentario.fecha as fecha,
        comentario.padre as padre FROM usuario INNER JOIN comentario ON comentario.id_usuario=usuario.id  
        INNER JOIN apartado ON apartado.id=comentario.id_apartado WHERE apartado.id=? AND apartado.id_tema=?";
    $query=$conn->prepare($query);
    $query->execute(array($numApartado,$numTema));
    $comentarios=$query->fetchAll();
    if($comentarios!=null || count($comentarios)>0){
        echo '<div class="divContenido">';
        foreach($comentarios as $comentario){
            echo '<p>'.$comentario['nombre_usuario'] ." ". $comentario['apellido_usuario']." ". $comentario['comentario'].'</p><p id="fecha" style= font-family:"italic";
            font-size:"6px";>'.$comentario['fecha'].'</p>';
        }
        echo '</div>';
    }
?>        
