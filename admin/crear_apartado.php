<link rel="stylesheet" href="./../css/crear_contenido.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css"/> <!-- 'classic' theme -->
<form action="./../insert_apartado.php" method="post" id="crearNuevo" class="from-group">
    <h1>Crear Apartado</h1>
    <div>
            <label class="labelForm" for="apartado">Tema:</label>
            <select id="selectTema" name="selectTema" placeholder="Elige un tema" class="form-control">
                <option disabled selected>Elige un tema</option>
                <?php
                    include "sql-connect.php";
                    $query="SELECT id, nombre FROM tema";
                    $query=$conn->prepare($query);
                    $query->execute();
                    $datos=$query->fetchall();
                    foreach($datos as $dato){
                        echo '<option value="'.$dato['id'].'">'.$dato['nombre'].'</option>';
                    }
                    echo '<option id="0" value="0">Crear nuevo tema...</option>';
                ?>
            </select>
        </div>
        <div>
            <label class="labelForm" for="nombreApartado">Nombre del apartado:</label>
            <input class="form-control" name="nombreApartado" id="nombreApartado">
        </div>
  
        <div>
            <input class="labelForm btn btn-danger mb-2" id="crear" type="submit" value="Crear">
        </div>
    
</form>
<script src="../moduls/pickr-master/dist/pickr.min.js"></script>
<script type="text/javascript" src="../javascript/crear_tema.js"></script>