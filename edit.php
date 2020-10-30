<?php 
    session_start();
?>
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
        include "./menu/menu.php";
        include "./generic-alert/alert.php";

    ?>
    <div id="contenido">
        <?php  include "sql-connect.php";
        $apartadoid=$_POST['apartado'];
        $temaid=$_POST['tema'];
        $id=$_POST['id'];
        ?>
        <div class="divContenido">
            <h2 style="text-align:center">Edita</h2>
            <form name="coment" class="from-group" method="post" action="editar.php">
                <label for="comentario">Edita el comentario</label>
                <input class="form-control" type="text" name="comenta" id="comenta" required>
                <input type="hidden" name="apartado" value="<?php echo $apartadoid;?>"> 
                <input type="hidden" name="tema" value="<?php echo $temaid;?>">   
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input class="btn btn-primary mb-2" type="submit" value="Añadir">
            </form>
        </div>
        
    </div>
    </div>
    
    <div id="pie">
      <h1>Lorem Ipsum</h1>
    </div>
</body>
</html>