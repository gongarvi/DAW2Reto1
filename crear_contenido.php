<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/crear_contenido.css">
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
        <div id="crearNuevo">
            <h1>Crear contenido</h1>
            <form id="formularioNuevo" name="login" class="from-group" method="post" action="logeo.php">
            <div>
                <label for="email">Email</label>
                <input class="form-control" type="text" name="email" id="login_email" required>
            </div>
            <div>
                <label for="email">Contraseña</label>
                <input class="form-control" type="password" name="password" id="login_password" required>
            </div>
            <input class="btn btn-primary mb-2" type="submit" value="Login">
        </form>
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