<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/contenido.css">
</head>
<body>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <div id="cabecera">
        <div class=" cuadrado">
            <h1>Blog DAW2</h1>
        </div>
    </div>
    <?php
        include "menu.php";
    ?>
    <div id="contenido">
        <h1 class="tituloTutorial">Como meter una web en un servidor Ubuntu</h1>
        
        <div class="divContenido">
            <h1 style="margin-left: 3%; margin-bottom: 3%;" class="pasoTutorial">Paso 1</h1>
        <!-- Imagen del contenido -->
        <?php
            include "sql-connect.php";
            if (isset($_GET["apartado"])) {
                $numApartado = $_GET["apartado"];
            }
            $query="SELECT contenido.ruta_imagen FROM contenido WHERE contenido.id_apartado=?";
            $query=$conn->prepare($query);
            $query->execute([$numApartado]);
            $ruta=$query->fetch();
            echo '<img class="imgTutorial" src="'.$ruta['ruta'].'" alt="">';   
        ?>

        <!-- Texto del contenido -->
        <?php
            include "sql-connect.php";
            if (isset($_GET["apartado"])) {
                $numApartado = $_GET["apartado"];
            }
            $query="SELECT contenido.texto FROM contenido WHERE contenido.id_apartado=?";
            $query=$conn->prepare($query);
            $query->execute([$numApartado]);
            $texto=$query->fetch();
            echo '<p class="textoTutorial">'.$texto['texto'].'</p>';   
        ?>
        </div>
    </div>
    <div id="pie">
      <h1>Lorem Ipsum</h1>
    </div>
    <?php
        include "alert.php";
    ?>
</body>
</html>