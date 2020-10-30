<link rel="stylesheet" href="./../css/crear_contenido.css">
<div id="crearNuevo">
    <h1>Crear contenido</h1>
    <form id="formularioNuevo" enctype="multipart/form-data" name="login" class="from-group" method="post" action="../actualizar_contenido.php">

        <!-- Empieza el SELECT (temas) -->
        <div>
            <label class="labelForm" for="apartado">Tema:</label>
            <select id="selectTema" name="selectTema" class="form-control">
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
        
        <div id="contenidoModificar" style="display:none;">
            <!-- Empieza el input (titulo) -->
            <div>
                <label class="labelForm" for="titulo">Titulo:</label>
                <input class="form-control" id="titulo" name="titulo">
            </div>
            <!-- Acaba el input (titulo) -->

            <!-- Empieza el textarea (texto) -->
            <div>
                <label class="labelForm" for="textArea">Texto:</label>
                <textarea class="form-control" id="textArea" rows="3" name="texto"></textarea>
            </div>
            <!-- Acaba el textArea (texto) -->
            <br>
            <!-- Radio buttons para elegir si iamgen o ruta -->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="archivo">
                <label class="form-check-label" for="inlineRadio1">Archivo</label>
            </div>
            <div class="form-check form-check-inline">
                <input checked class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="ruta">
                <label class="form-check-label" for="inlineRadio2">Ruta</label>
            </div>
            <!-- Fin radio buttons -->

            <!-- Empieza el input file/input (imagen) -->
            
            <div class="custom-file radio1">
                <!-- <label class="labelForm ">Imagen:</label> -->
                <input type="file" class="custom-file-input" id="inputGroupFile01" name="archivo">
                <label class="custom-file-label" for="inputGroupFile01">Seleccione el archivo</label>
            </div>
            
            <!-- Empieza el input para la ruta de la imagen -->
            <div class="radio2">
                <!-- <label class="labelForm" for="rutaImg">Ruta del archivo:</label> -->
                <input class="form-control" id="rutaImg" placeholder="Escriba aqui la url de la imagen" name="ruta_imagen">
            </div>

            <div>
                <input class="labelForm btn btn-warning mb-2" type="submit" value="Modificar">
            </div>
        </div>
    </form>
</div>
<script src="./../javascript/modificar_contenido.js"></script>
