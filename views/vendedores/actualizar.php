<main class="contenedor seccion">
        <h1>Actualizar Vendedor</h1>
<!-- mostramos cada uno de los errores -->
        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>
           
       <a href="/admin" class="boton boton-verde">Volver</a>
       
<!-- la clase formulario esta en scss layout _formularios.scss------enctype="multipart/form-data" es importante para que envie la info de la imagen -->
   <!-- esto se agrega si quieres dar imagen al vendedor --   enctype="multipart/form-data"    -->
<form class="formulario" method="POST"> 
       
<?php include 'formulario.php'; ?>
<!-- botn de enviar -->
            <input type="submit" value="Guardar Cambios" class="boton boton-verde">

            </form>

    </main>