
<?php

    include_once "sql-connect.php";
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
            echo '<div id="divcoment'.$i.'"><p id="parrafo'.$i.'">'.$comentario['nombre_usuario'] ." ". $comentario['apellido_usuario']." ". '<span id="comentario'.$i.'"  contentEditable = "false">'.$comentario["comentario"].'</span>'.'</p>
            <p id="fecha" style= font-family:"italic"; font-size:"6px";>'.$comentario['fecha'].'</p>'.
                '<form action="editar.php" method="post" onsubmit="return prueba(this)" >
                    <input type="button" class="btn btn-info" name="editar'.$i.'" value="Editar" onclick="comentario(this)"/>
                    <input type="hidden" name="apartado" value="'.$numApartado.'"> 
                    <input type="hidden" name="tema" value="'.$numTema.'">
                    <input type="hidden" name="id" value="'.$comentario['idcomentario'].'">
                    <input type="hidden" name="comenta" id="comenta'.$i.'" value="'.$comentario['idcomentario'].'">
                    <input type="submit" class="btn btn-info" id="guardar'.$i++.'"name="guardar" value="Guardar"/>
                </form></div>';
               
            
        }
        echo '<script>
                function comentario(id){
                    var padre=id.parentNode.parentNode;
                    //alert(padre.childNodes);
                    //alert(padre.getAttribute("id"));
                    var c= padre.childNodes;
                    console.log(c);
                    console.log(c[0]);
                    var d=c[0];
                    var g=c[3];
                    console.log(g);
                    var g2=g.childNodes;
                    console.log(g2);
                    var guardar=g2[11];
                    var v=d.childNodes;
                    console.log(v);
                    var i;
                    for(i=0;1<v.length;i++){
                        if(v[i].nodeName.toLowerCase()=="span"){
                            v[i].contentEditable=true;
                            v[i].focus();
                            console.log(v[i].value);
                            document.getElementById(guardar.getAttribute("id")).style.display="inline-block";
                            
                        }
                    }
                    
                }
                function prueba(id){
                    alert("Aqui funciona");
                    var padre=id.parentNode.parentNode;
                    //alert(padre.childNodes);
                    //alert(padre.getAttribute("id"));
                    var c= padre.childNodes;
                    console.log(c);
                    console.log(c[0]);
                    var d=c[0];
                    var g=c[3];
                    console.log(g);
                    var g2=g.childNodes;
                    console.log(g2);
                    var guardar=g2[11];
                    var v=d.childNodes;
                    console.log(v);
                    var i;
                    for(i=0;1<v.length;i++){
                        if(v[i].nodeName.toLowerCase()=="span"){
                            var s = document.getElementById(g2[9].getAttribute("id"));
                            document.getElementById(s).value = document.getElementById(v[i],getAttribute("id")).innerHTML;
                        } 
                    }
                }
                
                </script>';
        echo '</div>';
    }
?> 
