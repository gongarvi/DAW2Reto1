<?php
    include "rule.php"
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
		<h1><a href="./..">BLoG sERviDoR</a></h1>
    </div>
    <?php
		include "./../menu/menu.php";
        include "../generic-alert/alert.php";
    ?>
    <div id="contenido">
		<a href="index.php">Atras</a>
		<div id="opciones">
			<a href="apartado.php?option=crear">Crear</a>
			<a href="apartado.php?option=modificar">Modificar</a>
			<a href="apartado.php?option=eliminar">Eliminar</a>
		</div>
      <?php
	  	if(isset($_GET["option"])){
			switch($_GET["option"]){
				case "crear":
					include "crear_apartado.php";
					break;
				case "modificar":
						include "modificar_apartado.php";
						break;
				case "eliminar":
					include "eliminar_apartado.php";
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