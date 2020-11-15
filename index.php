<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="moduls/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/barra.css">
</head>
<body>
    <script src="moduls/jquery/jquery.min.js"></script>
    <script src="moduls/bootstrap/js/bootstrap.min.js"></script>
    <div id="cabecera">
        <h1><a href="#">BloG DAW 2</a></h1>
    </div>
    <div id="contenido">
        <?php
            include "./menu/menu.php";
            include "./generic-alert/alert.php";
        
            if(isset($_SESSION["administrador"]) && $_SESSION["administrador"]==true){
                ?>
                <div class="icon-bar">
                    <a href="admin/index.php" class="icon blue"><i class="material-icons">settings</i></a>
                </div>
                
                <?php
            }
        ?>
        <div id="documentacion">
            <a class="github" href="https://github.com/gongarvi/DAW2Reto1"><img src="media/github.png" alt="Github"></a>
            <iframe src="https://prezi.com/p/7iguq5i3crvh/embed/" id="iframe_container" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" allow="autoplay; fullscreen" height="315" width="560"></iframe>
        </div>
    </div>
    <div id="pie">
        <?php
            include "pie.php"
        ?>
    </div>
</body>
</html>