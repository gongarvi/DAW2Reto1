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
		<!-- <a href="index.php">Atras</a> -->
		<!-- <div id="opciones">
			<a href="tema.php?option=crear">Crear</a>
			<a href="tema.php?option=modificar">Modificar</a>
			<a href="tema.php?option=eliminar">Eliminar</a>
		</div> -->
		<div class="icon-bar">
			<a href="index.php" class="icon blue"><i class="material-icons">undo</i></a>
			<a href="tema.php?option=crear" class="icon green"><i class="material-icons">add</i></a>
			<a href="tema.php?option=modificar" class="icon yellow"><i class="material-icons">create</i></a>
			<a href="tema.php?option=eliminar" class="icon red"><i class="material-icons">delete</i></a>
		</div>
      <?php
	  	if(isset($_GET["option"])){
			switch($_GET["option"]){
				case "crear":
					include "crear_tema.php";
					break;
				case "modificar":
						include "modificar_tema.php";
						break;
				case "eliminar":
					include "eliminar_tema.php";
					break;
			}
		}
      ?>
    </div>
    <div id="pie">
      	<h1>Lorem Ipsum</h1>
    </div>
</body>
</html>