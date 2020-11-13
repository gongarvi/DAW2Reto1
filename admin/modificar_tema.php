<link rel="stylesheet" href="./../css/crear_contenido.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css"/> <!-- 'classic' theme -->
<h1 class="titulo">Modificar Tema</h1>
<form id="crearNuevo" class="form-group" action="./../actualizar_tema.php" method="post">

    <div>
        <label class="labelForm" for="apartado">Tema:</label>
        <select name="selectTema" class="form-control" id="selectTema">
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
    <div class="depende">
        <input type="text" class="form-control" placeholder="Nombre del nuevo tema" name="inputTema" aria-describedby="basic-addon1">
    </div>
    <div class="form-row">
        <div class="col-6">
            <label class="labelForm" for="colorPrincipal">Color principal:</label>
            <div class="input-group">
                <input class="form-control" readonly name="colorPrincipal" id="colorPrincipal">
                    <div class="input-group-append">
                        <span class="input-group-text">⠀</span>
                    </div>
            </div>        
        </div>

        <div class="col-6">
            <label class="labelForm" for="colorTexto">Color secundario:</label>               
            <div class="input-group">
                <input class="form-control" readonly name="colorTexto" id="colorTexto">
                <div class="input-group-append">
                    <span class="input-group-text">⠀</span>
                </div>
            </div>                      
        </div>
    </div>
    <div>
        <input class="labelForm btn btn-outline-warning mb-2" type="submit" value="Modificar">
    </div>
</form>
<script src="../moduls/pickr-master/dist/pickr.min.js"></script>
<script type="module" src="./../javascript/modificar_tema.js"></script>