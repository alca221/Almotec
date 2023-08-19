<main class="contenedor seccion contenido-centrado">
        <h1>Formulario Ingreso</h1>

        <?php 

include_once __DIR__ . "/../templates/alertas.php";

?>
        
       <!-- <a href="/adminTuves" class="boton boton-verde">Volver</a> -->
       

         <form class="formulario" method="POST" enctype="multipart/form-data"> <!--// ESTE ES EL CODIGO PARA INGRESAR IMAGENESenctype="multipart/form-data -->
    
        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Enviar Formulario" class="boton boton-verde">
    </form>
       
</main>