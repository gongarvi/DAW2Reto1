<div id="comentario">                   
    <?php
        include "sql-connect.php";
        $query="SELECT usuario.nombre, usuario.apellido ,comentario.texto, comentario.fecha,comentario.padre, apartado.nombre FROM usuario INNER JOIN  
            comentario ON comentario.id_usuario=usuario.id  INNER JOIN apartado ON apartado.id=comentario.id_apartado WHERE apartado.id=? 
        AND apartado.id_tema=?";
        $query=$conn->prepare($query);
        $query->execute();
        $comentarios=$query->fetchAll();
        foreach($comentarios as $comentario){
            echo '<p>'.$comentario['usuario.nombre'] ." ". $comentario['usuario.apellido']." ". $comentario['comentario.texto'].'</p><p id="fecha" style= font-family:"italic";
            font-size:"6px";>'.$comentario['fecha'].'</p>';
        }
    ?>
    
    
    <form name="coment" class="from-group" method="post" action="coment.php">
        <label for="comentario">Escribe comentario</label>
        <input class="form-control" type="text" name="comenta" id="comenta" required>
        <input class="btn btn-primary mb-2" type="submit" value="añadir">
    </form>
</div>

       