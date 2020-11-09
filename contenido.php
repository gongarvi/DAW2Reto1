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
    <?php
        include_once "sql-connect.php";
        $idtema = $_GET["tema"];
        $sql="SELECT color_asociado, color_texto FROM tema WHERE id=?";
        $sql=$conn->prepare($sql);
        $sql->execute([$idtema]);
        $colores=$sql->fetch();
    ?>
    <style>
        :root{
            --colorPrincipal:<?php echo $colores["color_asociado"]; ?>!important;
            --colorTexto:<?php echo $colores["color_texto"]; ?>!important;
        }

    </style>
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/contenido.css">

</head>
<body>  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <div id="cabecera">
		<h1><a href="./..">BloG sERviDoR</a></h1>
    </div>
    <?php
        include "./menu/menu.php";
        include "./generic-alert/alert.php";
    ?>
    <div id="contenido">
        
        <?php
            include_once "sql-connect.php";
            if (isset($_GET["apartado"])) {
                $numApartado = $_GET["apartado"];
            }
            if (isset($_GET["tema"])) {
                $numTema = $_GET["tema"];
            }
            $query2="SELECT nombre FROM apartado WHERE id=? AND id_tema=?";
            $query2=$conn->prepare($query2);
            $query2->execute([$numApartado, $numTema]);
            $tituloApartado=$query2->fetch();
            echo '<h1 class="tituloTutorial">'.$tituloApartado['nombre'].'</h1>';

            $query="SELECT ruta_imagen, texto, titulo FROM contenido WHERE id_apartado=? AND id_tema=?";
            $query=$conn->prepare($query);
            $query->execute([$numApartado, $numTema]);
            $datos=$query->fetchall();
            foreach($datos as $dato){
                echo '<div class="divContenido">';
                echo '<h1 class="pasoTutorial">'.$dato['titulo'].'</h1>';
                echo '<img class="imgTutorial" src="'.$dato['ruta_imagen'].'" alt="">';
                echo '<p class="textoTutorial">'.$dato['texto'].'</p>';    
                echo '</div>';
            }


            
        ?>
        <div id="comentarios">
            <?php
                include "comentarios.php";
                
                if(isset($_SESSION["name"]) && isset($_SESSION["surname"]) && isset($_SESSION["email"])
                && $_SESSION["name"]!="" && $_SESSION["surname"]!="" && $_SESSION["email"]!=""){
                    include "crear_comentarios.php";
                }
            ?>
        </div>
    </div>
    </div>
    
    <div id="pie">
        <!--Pringaos todos-->
      <h1>Menuda basura de footer</h1>
        <?php
            include "./pie.php";
        ?>
    </div>
</body>
</html>