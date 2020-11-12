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
    </div>
    <div id="pie">
        <ul>
            <li><h1>Jon Ander Aristimuño</h1></li>
            <li><h1>Eric Eguskizaga</h1></li>
            <li><h1>Unai Martin</h1></li>
        </ul>
    </div>
</body>
</html>