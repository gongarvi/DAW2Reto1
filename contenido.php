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
    ?>
    <div id="contenido">
        
        <?php
            include "sql-connect.php";
            if (isset($_GET["apartado"])) {
                $numApartado = $_GET["apartado"];
            }
            $query2="SELECT nombre FROM apartado WHERE id=?";
            $query2=$conn->prepare($query2);
            $query2->execute([$numApartado]);
            $tituloApartado=$query2->fetch();
            echo '<h1 class="tituloTutorial">'.$tituloApartado['nombre'].'</h1>';

            $query="SELECT ruta_imagen, texto, titulo FROM contenido WHERE contenido.id_apartado=?";
            $query=$conn->prepare($query);
            $query->execute([$numApartado]);
            $datos=$query->fetchall();
            foreach($datos as $dato){
                echo '<div class="divContenido">';
                echo '<h1 class="pasoTutorial">'.$dato['titulo'].'</h1>';
                echo '<img class="imgTutorial" src="'.$dato['ruta_imagen'].'" alt="">';
                echo '<p class="textoTutorial">'.$dato['texto'].'</p>';    
                echo '</div>';
            }
        ?>
        
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