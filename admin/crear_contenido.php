<link rel="stylesheet" href="./../css/crear_contenido.css">
<div id="crearNuevo">
    <h1>Crear contenido</h1>
    <form id="formularioNuevo" enctype="multipart/form-data" name="login" class="from-group" method="post" action="./../insert_contenido.php">
        <!-- Empieza el SELECT (temas) -->
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
                    echo '<option id="0" value="0">Crear nuevo tema...</option>';
                ?>
            </select>
        </div>

        <div id="inputTema">
            <input type="text" class="form-control" placeholder="Nombre del nuevo tema" name="inputTema" aria-describedby="basic-addon1">
        </div>
        <!-- Acaba el SELECT (tema) -->

        <!-- Empieza el SELECT (apartados) -->
        <div >
            <label class="labelForm" for="apartado">Apartado:</label>
            <select id="selectApartado" name="selectApartado" class="form-control">
                    <option disabled selected value="">Seleccione un tema por favor</option>
            </select>
        </div>

        <div >
            <input id="inputApartado" type="text" class="form-control" placeholder="Nombre del nuevo apartado" name="inputApartado" aria-describedby="basic-addon1">
        </div>
        

        <!-- Empieza el input (titulo) -->
        <div>
            <label class="labelForm" for="titulo">Titulo:</label>
            <input class="form-control" type="text" name="titulo" id="titulo">
        </div>
        <!-- Acaba el input (titulo) -->

        <!-- Empieza el textarea (texto) -->
        <div>
            <label class="labelForm" for="texto">Texto:</label>
            <textarea class="form-control" name="texto" id="texto" rows="3"></textarea>
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
            <input type="file" name="archivo" class="custom-file-input" id="archivo">
            <label class="custom-file-label" for="archivo">Seleccione el archivo</label>
        </div>
        
        <!-- Empieza el input para la ruta de la imagen -->
        <div class="radio2">
            <!-- <label class="labelForm" for="rutaImg">Ruta del archivo:</label> -->
            <input class="form-control" name="rutaImg" id="rutaImg" placeholder="Escriba aqui la url de la imagen">
        </div>

        <div>
            <input class="labelForm btn btn-danger mb-2" id="crear" type="submit" value="Crear">
        </div>
    </form>
    <script src="../javascript/crear_contenido.js"></script>
</div>
<script type="text/javascript" src="./../javascript/crear_contenido.js"></script>
