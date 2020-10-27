<div id="comentario">
    <div class="divContenido">
        <?php
        include "sql-connect.php";
        if (isset($_GET["apartado.id"])) {
            $numApartado = $_GET["apartado.id"];
        }
        if (isset($_GET["apartado.id_tema"])) {
            $numTema = $_GET["apartado.id_tema"];
        }
        $query="SELECT usuario.nombre, usuario.apellido ,comentario.texto, comentario.fecha,comentario.padre FROM usuario INNER JOIN  
            comentario ON comentario.id_usuario=usuario.id  INNER JOIN apartado ON apartado.id=comentario.id_apartado WHERE apartado.id=? 
            AND apartado.id_tema=?";
        $query=$conn->prepare($query);
        $query->execute(array($numApartado,$numTema));
        $comentarios=$query->fetchAll();
        foreach($comentarios as $comentario){
<<<<<<< HEAD
            echo '<div class="divContenido""><p style="color: red;">'.$comentario['nombre']." ". $comentario['apellido']."</p><p> ". $comentario['texto'].'</p><p id="fecha" style= font-family:"italic";
            font-size:"6px";>'.$comentario['fecha'].'</p></div>';
=======
            echo '<p>'.$comentario['usuario.nombre'] ." ". $comentario['usuario.apellido']." ". $comentario['comentario.texto'].'</p><p id="fecha" style= font-family:"italic";
            font-size:"6px";>'.$comentario['fecha'].'</p>';
>>>>>>> 3befd80a5148ac87ab4d6090c5bba0e502133f97
        }
    ?>

<!--Los styles del echo son provisionales-->
        <form name="coment" class="from-group" method="post" action="coment.php">
            <label for="comentario">Escribe comentario</label>
            <input class="form-control" type="text" name="comenta" id="comenta" required>
            <input class="btn btn-primary mb-2" type="submit" value="añadir">
        </form>
    </div>
</div>