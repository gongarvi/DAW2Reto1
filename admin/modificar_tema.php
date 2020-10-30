<link rel="stylesheet" href="./../css/crear_contenido.css">
<form id="crearNuevo" class="form-group" action="./../actualizar_tema.php" method="post">
    <h1>Modificar Tema</h1>
    <div>
        <label class="labelForm" for="apartado">Tema:</label>
        <select name="selectTema" class="form-control" id="selectTema">
            <option value="" disabled selected>Seleccione un tema por favor</option>
            <?php
                include "sql-connect.php";
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
    <div class="depende">
        <input type="text" class="form-control" placeholder="Nombre del nuevo tema" name="inputTema" aria-describedby="basic-addon1">
    </div>
    <div class="form-row">
        <div class="col-6">
            <label  for="colorPrincipal">Color Principal</label>
            <input class="form-control" type="text" name="colorPrincipal" id="colorPrincipal">
        </div>
        <div class="col-6">
            <label for="colorTexto">Color Texto</label>
            <input class="form-control" type="text" name="colorTexto" id="colorTexto">
        </div>
    </div>
    <div>
        <input class="labelForm btn btn-warning mb-2" type="submit" value="Modificar">
    </div>
</form>
<script src="./../javascript/modificar_tema.js"></script>