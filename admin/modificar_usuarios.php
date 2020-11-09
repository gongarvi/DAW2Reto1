<link rel="stylesheet" href="./../css/crear_contenido.css">
<link rel="stylesheet" href="./../css/modificar_usuarios.css">
<h1 class="titulo">Administrar Usuarios</h1>
<form action="./../actualizar_usuarios.php" method="post" id="crearNuevo" class="from-group">
    
    <div>
        <table class="table table-hover">
        <tr>
            <th>NOMBRE</th>
            <th>APELLIDO</th> 
            <th>ADMIN</th>
            <th>ELIMINAR</th>
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
                        echo '<td><input type="text" tabindex="-1" readonly name="nombreUsu['.$dato["id"].']" value="'.$dato["nombre"].'"></td>';
                        echo '<td><input type="text" tabindex="-1" readonly name="apellidoUsu['.$dato["id"].']" value="'.$dato["apellido"].'"></td>';
                        if ($dato["administrador"] == 1) {
                            echo '<td style="display:none"><input type="hidden" value="0" name="adminUsu['.$dato["id"].']"></td>';
                            echo '<td><input tabindex="-1" value="1" type="checkbox" checked name="adminUsu['.$dato["id"].']"/></td>';
                        }else{
                            echo '<td style="display:none"><input type="hidden" value="0" name="adminUsu['.$dato["id"].']"></td>';
                            echo '<td><input tabindex="-1" value="1" type="checkbox" name="adminUsu['.$dato["id"].']"/></td>';
                        }
                        echo '<td><button class="btn prueba papelera" id="borrar" text="X" name="boton" type="submit" value=""><img class="papelera" src="https://icons.iconarchive.com/icons/papirus-team/papirus-status/256/user-trash-full-icon.png" alt=""></button></td>';
                        echo '<input type="hidden" tabindex="-1" readonly name="elId" value="'.$dato["id"].'">';

                    echo '</tr>';               
                }
                
            ?>
        </table>
    </div>
    
    <div>
        <input class="labelForm btn btn-outline-success" id="crear" name="boton" type="submit" value="Modificar">
    </div>
    
</form>
<script type="text/javascript" src="../javascript/modificar_usuarios.js"></script>