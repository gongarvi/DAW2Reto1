

<div class="divContenido">
    <form name="coment" class="from-group" method="post" action="coment.php">
        <label for="comentario">Escribe comentario</label>
        <input class="form-control" type="text" name="comenta" id="comenta" required>
        <input type="hidden" name="apartado" value=<?php echo '"'.$_GET['apartado'].'"';?>>
        <input type="hidden" name="tema" value=<?php echo '"'.$_GET['tema'].'"';?>>
        <input class="btn btn-primary mb-2" type="submit" value="Añadir">
    </form>
</div>