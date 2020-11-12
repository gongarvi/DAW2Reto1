<?php
    include "rule.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../moduls/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/comun.css">
    <link rel="stylesheet" href="./../css/card.css">
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
        <?php
            include "../pie.php"
        ?>
    </div>
</body>
</html>
