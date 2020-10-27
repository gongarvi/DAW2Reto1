<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./../css/comun.css">
    <link rel="stylesheet" href="./../css/crear_contenido.css">
</head>
<body>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="./../javascript/crear_contenido.js"></script>
    <div id="cabecera">
        <div class=" cuadrado">
            <h1>Blog DAW2</h1>
        </div>
    </div>
    <?php
        include "./../menu/menu.php";
    ?>
    <div id="contenido">
        <div id="crearNuevo">
            <h1>Crear contenido</h1>
            <form id="formularioNuevo" name="login" class="from-group" method="post" action="insert_contenido.php">

            <!-- Empieza el SELECT (temas) -->
            <div>
                <label class="labelForm" for="apartado">Tema:</label>
                <select id="inputState" class="form-control selectTema">
                    <!-- <option value="0">Crear un nuevo tema</option> -->
                    <?php
                        include "sql-connect.php";
                        $query="SELECT id, nombre FROM tema";
                        $query=$conn->prepare($query);
                        $query->execute();
                        $datos=$query->fetchall();
                        foreach($datos as $dato){
                            echo '<option id="opcionTema" value="'.$dato['id'].'">'.$dato['nombre'].'</option>';
                        }
                        echo '<option id="0" value="0">Crear nuevo tema...</option>';
                    ?>
                </select>
            </div>

            <div id="inputTema">
                <input type="text" class="form-control" placeholder="Nombre del nuevo tema" aria-label="" aria-describedby="basic-addon1">
            </div>
            <!-- Acaba el SELECT (tema) -->

            <!-- Empieza el SELECT (apartados) -->
            <div >
                <label class="labelForm" for="apartado">Apartado:</label>
                <select id="selectApartados" class="form-control selectApartado">
                        <option value="">Seleccione un tema por favor</option>
                </select>
            </div>

            <div >
                <input id="inputApartado" type="text" class="form-control" placeholder="Nombre del nuevo apartado" aria-label="" aria-describedby="basic-addon1">
            </div>
            
            <!-- Acaba el SELECT (apartados) -->


            <!-- Empieza el input (texto) -->
            <div>
                <label class="labelForm" for="titulo">Titulo:</label>
                <input class="form-control" id="titulo">
            </div>
            <!-- Acaba el input (titulo) -->

            <!-- Empieza el textarea (texto) -->
            <div>
                <label class="labelForm" for="textArea">Texto:</label>
                <textarea class="form-control" id="textArea" rows="3"></textarea>
            </div>
            <!-- Acaba el textArea (texto) -->
            <br>
            <!-- Radio buttons para elegir si iamgen o ruta -->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">Archivo</label>
            </div>
            <div class="form-check form-check-inline">
                <input checked class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">Ruta</label>
            </div>
            <!-- Fin radio buttons -->

            <!-- Empieza el input file/input (imagen) -->
            
            <div class="custom-file radio1">
                <!-- <label class="labelForm ">Imagen:</label> -->
                <input type="file" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Seleccione el archivo</label>
            </div>
            
            <!-- Empieza el input para la ruta de la imagen -->
            <div class="radio2">
                <!-- <label class="labelForm" for="rutaImg">Ruta del archivo:</label> -->
                <input class="form-control" id="rutaImg" placeholder="Escriba aqui la url de la imagen">
            </div>

            <div>
                <input class="labelForm btn btn-danger mb-2" type="submit" value="Crear">
            </div>
            
        </form>
        </div>
    </div>

    <div id="pie">
      <h1>Lorem Ipsum</h1>
    </div>
    <?php
        define(__DIR__,"./");
        include __DIR__."/../generic-alert/alert.php";
    ?>
</body>
</html>