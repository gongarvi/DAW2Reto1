<link rel="stylesheet" href="./../css/crear_contenido.css">
<link rel="stylesheet" href="./../css/modificar_usuarios.css">
<form action="./../actualizar_usuarios.php" method="post" id="crearNuevo" class="from-group">
    <h1>Modificar Usuarios</h1>
    <div>
        <table style="width:100%;">
        <tr>
            <th>NOMBRE</th>
            <th>APELLIDO</th> 
            <th>ADMIN</th>
        </tr>
            <?php
                include_once "../sql-connect.php";
                $query="SELECT id,nombre, apellido, administrador FROM usuario ORDER BY nombre ASC";
                $query=$conn->prepare($query);
                $query->execute();
                $datos=$query->fetchall();
                foreach($datos as $dato){
                    echo '<tr>';
                        echo '<td style="display:none"><input type="hidden" name="id[]" value="'.$dato["id"].'">'.$dato["id"].'</td>';
                        echo '<td><input type="hidden" name="nombreUsu['.$dato["id"].']" value="'.$dato["nombre"].'">'.$dato["nombre"].'</td>';
                        echo '<td><input type="hidden" name="apellidoUsu['.$dato["id"].']" value="'.$dato["apellido"].'">'.$dato["apellido"].'</td>';
                        if ($dato["administrador"] == 1) {
                            echo '<td style="display:none"><input type="hidden" value="0" name="adminUsu['.$dato["id"].']"></td>';
                            echo '<td><input value="1" type="checkbox" checked name="adminUsu['.$dato["id"].']"/></td>';
                        }else{
                            echo '<td style="display:none"><input type="hidden" value="0" name="adminUsu['.$dato["id"].']"></td>';
                            echo '<td><input value="1" type="checkbox" name="adminUsu['.$dato["id"].']"/></td>';
                        }
                    echo '</tr>';               
                }
                
            ?>
        </table>
    </div>
    
    <div>
        <input class="labelForm btn btn-danger mb-2" id="crear" type="submit" value="Modificar">
    </div>
    
</form>
<script type="text/javascript" src="../javascript/modificar_usuarios.js"></script>