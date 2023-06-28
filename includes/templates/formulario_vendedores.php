<fieldset>
                <legend>Información General</legend>
<!-- el value = "" nos guarda el valor ------ ?php echo $propiedad->titulo ayuda a que no se borren los datos -->
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="vendedor[nombre]" 
                placeholder="Ingrese nombre" value="<?php echo s($vendedor->nombre); ?>">

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="vendedor[apellido]" 
                placeholder="Ingrese apellido" value="<?php echo s($vendedor->apellido); ?>">
</fieldset>
<fieldset>


                <legend>Información Extra</legend>
<!-- el value = "" nos guarda el valor ------ ?php echo $propiedad->titulo ayuda a que no se borren los datos -->
                <label for="telefono">Telefono:</label>
                <input type="text" id="telefono" name="vendedor[telefono]" 
                placeholder="Ingrese telefono" value="<?php echo s($vendedor->telefono); ?>">

</fieldset>