<link rel="stylesheet" href="./../css/crear_contenido.css">
<h1 class="titulo">Eliminar contenido</h1>
<div id="crearNuevo">
    <form id="formularioNuevo" name="login" class="from-group" method="post" action="../delete_contenido.php">

        <!-- Empieza el SELECT (temas) -->
        <div>
            <label class="labelForm" for="apartado">Tema:</label>
            <select id="selectTema" name="selectTema" class="form-control">
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

        <!-- Acaba el SELECT (tema) -->

        <!-- Empieza el SELECT (apartados) -->
        <div >
            <label class="labelForm" for="apartado">Apartado:</label>
            <select id="selectApartados" class="form-control" name="selectApartados">
                <option value="" disabled selected>Seleccione un tema por favor</option>
            </select>
        </div>
        <!-- Acaba el SELECT (contenido) -->
        <div >
            <label class="labelForm" for="apartado">Contenido:</label>
            <select id="selectContenido" class="form-control" name="selectContenido">
                <option value="" disabled selected>Seleccione un tema por favor</option>
            </select>
        </div>
        <!-- Acaba el select (contenido) -->
        <div>
            <input class="labelForm btn btn-outline-danger mb-2" type="submit" value="Eliminar">
        </div>
    </form>
</div>
<script src="./../javascript/eliminar_contenido.js"></script>
