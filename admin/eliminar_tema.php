<link rel="stylesheet" href="./../css/crear_contenido.css">
<form id="crearNuevo" class="form-group" action="./../delete_tema.php" method="post">
    <h1>Eliminar Tema</h1>
    <div>
        <label class="labelForm" for="apartado">Tema:</label>
        <select name="tema" class="form-control" id="selectTema">
            <option value="" disabled selected>Seleccione un tema por favor</option>
            <?php
                include_once "../sql-connect.php";
                $query="SELECT id, nombre FROM tema";
                $query=$conn->prepare($query);
                $query->execute();
                $datos=$query->fetchall();
                foreach($datos as $dato){
                    echo '<option value="'.$dato['id'].'">'.$dato['nombre'].'</option>';
                }
            ?>
        </select>
    </div>
    <div>
        <input class="labelForm btn btn-danger mb-2" type="submit" value="Eliminar">
    </div>
    
</form>