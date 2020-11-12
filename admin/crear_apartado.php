<link rel="stylesheet" href="./../css/crear_contenido.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css"/> <!-- 'classic' theme -->
<h1 class="titulo">Crear Apartado</h1>
<form action="./../insert_apartado.php" method="post" id="crearNuevo" class="from-group">
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
        <div>
            <label class="labelForm" for="nombreApartado">Nombre del apartado:</label>
            <input class="form-control" name="nombreApartado" id="nombreApartado">
        </div>
  
        <div>
            <input class="labelForm btn btn-outline-success mb-2" id="crear" type="submit" value="Crear">
        </div>
    
</form>