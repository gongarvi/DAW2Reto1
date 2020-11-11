<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/barra.css">
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
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