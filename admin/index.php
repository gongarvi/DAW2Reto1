<?php
    include "rule.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./../css/comun.css">
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <div id="cabecera">
        <h1><a href="./..">Blog Servidor</a></h1>
    </div>
    <?php
        include "./../menu/menu.php";
    ?>
    <div id="contenido">
        <!-- Aqui apareceran las distintas opciones para crear  -->
        <ul>
            <li><a href="contenido.php">Administrar Contenido</a></li>
            <li><a href="usuarios.php">Administrar Usuarios</a></li>
        </ul>
    </div>
    <div id="pie">
      <h1>Lorem Ipsum</h1>
    </div>
    <?php
        include "../generic-alert/alert.php";
    ?>
</body>
</html>
