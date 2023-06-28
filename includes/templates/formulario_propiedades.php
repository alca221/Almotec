<fieldset>
                <legend>Información General</legend>
<!-- el value = "" nos guarda el valor ------ ?php echo $propiedad->titulo ayuda a que no se borren los datos -->
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo Propiedad" value="<?php echo s($propiedad->titulo); ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio Propiedad" value="<?php echo s($propiedad->precio); ?>">

                <label for="imagen">Imagen:</label>
                <!-- el input typo file, permite seleccionar un archivo, accept indica el tipo de archivo va aceptar -->
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
<!-- llamamos la imagen si es que existe -->
                <?php if($propiedad->imagen) { ?>
                    <!-- sale dos veces para imagen -->
<img src="../../imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
                    <?php } ?>

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion); ?></textarea>

            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>

                <input 
                    type="number" 
                    id="habitaciones" 
                    name="propiedad[habitaciones]" 
                    placeholder="Ej: 3" 
                    min="1"     
                    max="9" 
                    value="<?php echo s($propiedad->habitaciones); ?>">

                <label for="wc">Baños:</label>
                <!-- ingresamos el min y el max -->
                <input type="number" id="wc" name="propiedad[wc]" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($propiedad->wc); ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" 
                placeholder="Ej: 3" min="1" max="9" value="<?php echo s($propiedad->estacionamiento); ?>">

            </fieldset>


            <fieldset>
                <legend>Vendedor</legend>
<label for="vendedor">Vendedor</label>
                <!-- <select name="vendedores_id"> -->
                <select name="propiedad[vendedores_id]" id="vendedor">
                <option selected value="">-- Seleccione Vendedor--</option>
        <?php foreach($vendedores as $vendedor) { ?>
            <!-- nos ayuda a que no se borre a recargar formulario -->
            <option <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : 
            //el s($vendedor->nombre)  es para sanitizar
            '' ?> value="<?php echo s($vendedor->id); ?>"><?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?>
        <?php  } ?>
    </select>

            </fieldset>