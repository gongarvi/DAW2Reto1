<link rel="stylesheet" href="./../css/crear_contenido.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css"/> <!-- 'classic' theme -->
<h1 class="titulo">Crear Tema</h1>
<form action="./../insert_tema.php" method="post" id="crearNuevo" class="from-group">
    
        <div>
            <label class="labelForm" for="nombreTema">Nombre del tema:</label>
            <input class="form-control" name="nombreTema" id="nombreTema">
        </div>
        <div class="form-row">
            <div class="col-6">
                <label class="labelForm" for="colorPrincipal">Color principal:</label>
                <div class="input-group">
                    <input class="form-control" readonly name="colorPrincipal" id="colorPrincipal">
                        <div class="input-group-append">
                            <span class="input-group-text">⠀</span>
                        </div>
                </div>        
            </div>

            <div class="col-6">
                <label class="labelForm" for="colorTexto">Color secundario:</label>               
                <div class="input-group">
                    <input class="form-control" readonly name="colorTexto" id="colorTexto">
                    <div class="input-group-append">
                        <span class="input-group-text">⠀</span>
                    </div>
                </div>                      
            </div>
            

        </div>
        <div>
            <input class="labelForm btn btn-outline-success mb-2" id="crear" type="submit" value="Crear">
        </div>
    
</form>
<script src="../moduls/pickr-master/dist/pickr.min.js"></script>
<script type="text/javascript" src="../javascript/crear_tema.js"></script>
