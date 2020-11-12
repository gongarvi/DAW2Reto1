<?php
    include "rule.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../moduls/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/comun.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link rel="stylesheet" href="./../css/barra.css">
</head>
<body>
    <script src="./../moduls/jquery/jquery.min.js"></script>
    <script src="./../moduls/bootstrap/js/bootstrap.min.js"></script>
    <div id="cabecera">
		<h1><a href="./..">BloG DAW 2</a></h1>
    </div>
    <?php
		include "./../menu/menu.php";
        include "../generic-alert/alert.php";
    ?>
    <div id="contenido">
    <div class="icon-bar">
			<a href="index.php" class="icon blue"><i class="material-icons">undo</i></a>
		</div>
      <?php
        include "modificar_usuarios.php";
      ?>
    </div>
    <div id="pie">
        <?php
            include "../pie.php"
        ?>
    </div>
</body>
</html>