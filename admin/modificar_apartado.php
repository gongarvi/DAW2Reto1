<link rel="stylesheet" href="./../css/crear_contenido.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css"/> <!-- 'classic' theme -->
<h1 class="titulo">Modificar Apartado</h1>
<form action="./../actualizar_apartado.php" method="post" id="crearNuevo" class="from-group">
    
    <div>
        <label class="labelForm" for="apartado">Tema:</label>
        <select id="selectTema" name="selectTema" placeholder="Elige un tema" class="form-control">
            <option disabled selected>Elige un tema</option>
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
    <div >
        <label class="labelForm" for="apartado">Apartado:</label>
        <select id="selectApartados" class="form-control" name="selectApartados">
            <option value="" disabled selected>Seleccione un tema por favor</option>
        </select>
    </div>
    <div class="depende">
        <input id="inputApartado" type="text" class="form-control" placeholder="Nombre del apartado" name="inputApartado" aria-describedby="basic-addon1">
    </div>
    <div>
        <input class="labelForm btn btn-outline-warning mb-2" id="crear" type="submit" value="Modificar">
    </div>
    
</form>
<script src="../moduls/pickr-master/dist/pickr.min.js"></script>
<script type="module" src="../javascript/modificar_apartado.js"></script>
