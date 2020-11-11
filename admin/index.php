<?php
    include "rule.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Major Mono Display' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./../css/comun.css">
    <link rel="stylesheet" href="./../css/card.css">
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <div id="cabecera">
        <h1><a href="./..">BloG DAW 2</a></h1>
    </div>
    <?php
        include "./../menu/menu.php";
        include "../generic-alert/alert.php";
    ?>
    <div id="contenido">
        <table class="table">
            <tr>
                <td>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-front">
                                <img src="https://www.flaticon.es/svg/static/icons/svg/2405/2405070.svg" alt="">
                            </div>
                            <div class="card-back">
                                <h2> Contenido</h2>
                                <p>Aqui podrás configurar los contenidos de la pagina mediante diferentes formularios</p>
                                <a href="contenido.php?option=crear" class="btn btn-danger">Acceder</a>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-front">
                                <img src="https://www.flaticon.es/svg/static/icons/svg/2878/2878701.svg" alt="">
                            </div>
                            <div class="card-back">
                                <h2>Apartados</h2>
                                <p>Aqui podrás configurar los contenidos de la pagina mediante diferentes formularios</p>
                                <a href="apartado.php?option=crear" class="btn btn-danger">Acceder</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-front">
                                <img src="https://www.flaticon.es/svg/static/icons/svg/3659/3659789.svg" alt="">
                            </div>
                            <div class="card-back">
                            <a href="contenido.php?option=crear">
                                <h2> Temas</h2>
                                <p>Aqui podrás configurar los contenidos de la pagina mediante diferentes formularios</p>
                                <a href="tema.php?option=crear" class="btn btn-danger">Acceder</a>
                            </div>
                            </a>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-front">
                                <img src="https://www.flaticon.es/svg/static/icons/svg/1621/1621561.svg" alt="">
                            </div>
                            <div class="card-back">
                                <h2>Usuarios</h2>
                                <p>Aqui podrás configurar los contenidos de la pagina mediante diferentes formularios</p>
                                <a href="usuarios.php?option=crear" class="btn btn-danger">Acceder</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div id="pie">
      <h1>Lorem Ipsum</h1>
    </div>
</body>
</html>
