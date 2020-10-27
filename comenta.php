<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/contenido.css">
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <div id="cabecera">
        <div class=" cuadrado">
            <h1>Blog DAW2</h1>
        </div>
    </div>
    <?php
        include "./menu/menu.php";
    ?>
    <div id="comentario">

    <?php
        include "comentarios.php";
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