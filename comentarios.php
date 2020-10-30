
<?php

    include "sql-connect.php";
    if (isset($_GET["apartado.id"])) {
        $numApartado = $_GET["apartado.id"];
    }
    if (isset($_GET["apartado.id_tema"])) {
        $numTema = $_GET["apartado.id_tema"];
    }


    $query="SELECT usuario.nombre as nombre_usuario, usuario.apellido as apellido_usuario,comentario.texto as comentario, comentario.fecha as fecha,
        comentario.padre as padre, comentario.id as idcomentario FROM usuario INNER JOIN comentario ON comentario.id_usuario=usuario.id  
        INNER JOIN apartado ON apartado.id=comentario.id_apartado WHERE apartado.id=? AND apartado.id_tema=?";
    $query=$conn->prepare($query);
    $query->execute(array($numApartado,$numTema));
    $comentarios=$query->fetchAll();
    if($comentarios!=null || count($comentarios)>0){
        echo '<div class="divContenido">';
        $i=1;
        foreach($comentarios as $comentario){
            echo'<style>
                        #guardar'.$i.'{
                        display:none;
                        }
                </style>';
            echo '<div id="divcoment'.$i.'"><p>'.$comentario['nombre_usuario'] ." ". $comentario['apellido_usuario']." ". '<span id="comentario'.$i.'"  contentEditable = "false">'.$comentario["comentario"].'</span>'.'</p>
            <p id="fecha" style= font-family:"italic"; font-size:"6px";>'.$comentario['fecha'].'</p>'.
                '<form action="editar.php" method="post">
                    <input type="button" class="btn btn-info" name="editar'.$i.'" value="editar" onclick="comentario(this)"/>
                    <input type="hidden" name="apartado" value="'.$numApartado.'"> 
                    <input type="hidden" name="tema" value="'.$numTema.'">
                    <input type="hidden" name="id" value="'.$comentario['idcomentario'].'">
                    <input type="submit" class="btn btn-info" id="guardar'.$i++.'"name="guardar" value="Guardar"/>
                </form></div>';
               
                echo '<script>
                function comentario(e){
                    alert("Funciona");
                    document.getElementById("guardar'.$i.'").style.display="inline-block";
                var c=document.getElementById("divcoment'.$i.'").childNodes;
                   var i;
                   for(i=0;i<c.length;i++){
                       if(c[i].nodeName.tpLowerCase()=="span"){
                           alert(encontrado);
                           c[i].contentEditable=true;
                           c[i].focus();
                           document.getElementById("guardar").style.display="inline-block";}
                       }
                }
                </script>';
            
        }
        echo '</div>';
    }
?> 
