<main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>
    
        <?php 
        if($resultado) {
              // llamamos las notificaciones de error desde funciones
            $mensaje = mostrarNotificacion( intval($resultado) );
            if($mensaje) { ?>
                <p class="alerta exito"><?php echo s($mensaje); ?></p>
            <?php }   
      
            
        }?>
     

        <a href="/propiedades/crear" class="boton boton-verde">Crear Propiedad</a>
        <a href="/vendedores/crear" class="boton boton-amarillo">Crear Vendedor</a>

<h2>Propiedades</h2>


        <table class="propiedades ">
        <thead>
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>IMAGEN</th>
                    
                    <th>PRECIO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>

            
            <tbody> <!-- Mostrar los Resultados -->
                <!-- foreach itera los arreglos -->
                <?php foreach( $propiedades as $propiedad ): ?> 
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td> <img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"> </td>
                    <td>$ <?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/propiedades/eliminar">
<!-- este input envia datos ocultos y nos sirve para eliminar -->
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">

                            <input type="submit" class="boton-rojo-block" value="Eliminar">

                        </form>
                        
                        <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; 
                        ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?> 
            </tbody>  <!--mostrar los resultados -->
        </table>

        
    <h2>Vendedores</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar los Resultados -->
            <?php foreach( $vendedores as $vendedor ): ?>
            <tr>
                <td><?php echo $vendedor->id; ?></td>
                <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                <td><?php echo $vendedor->telefono; ?></td>
                <td>
                    <form method="POST" class="w-100" action="/vendedores/eliminar">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    
                    <a href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        

                </main>