<?php
//verificamos si la sesion esta definida
    if(!isset($_SESSION)) {
        session_start();
    }
//
    $auth = $_SESSION['login'] ?? false;
    // var_dump($auth);
    if(!isset($inicio)) {
        $inicio = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almotec Spa</title>
    <!-- esta direccion debe traerse desde la carpeta inicial en php -->
    <link rel="stylesheet" href="../build/css/app.css">

</head>
<body>
    <!-- con este php, le indicamos si la clase de inicio esta en la pagina, esta la muestre de lo contrario no -->
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">

        <div class="contenedor contenido-header">
            <div class="barra">
                <!-- llamamos la pagina principal -->
                <a href="/">
                    <img src="/build/img/logoAlmotec.svg" alt="Logotipo Almotec">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                    <nav class="navegacion">
                    <!-- //  arreglar para que se vea inicio u o login -->
                    <!-- <a href="/login.php">Inicio</a> -->
                           <a href="/nosotros">Nosotros</a> 
                           <!-- <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a> -->
                        <a href="/contacto">Contacto</a>
                        <?php if($auth){  ?>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php } else {  ?>
                            <a href="/login">Admin</a>
                            <?php }   ?>
                    </nav>
                </div>
   
                
            </div> <!--.barra-->
            <!-- si esta la clase inicio se muestra el h1 de lo contrario no -->
<?php if($inicio) { ?>
            <h1>Damos solución a tus problemas tecnológicos </h1>
            <?php } ?>
        </div>
    </header>

    <?php
    // es instanciada en PropiedadController
echo $contenido;
    ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
            <a href="/nosotros">Nosotros</a> 
            <!-- <a href="/propiedades">Anuncios</a>
            <a href="/blog">Blog</a> -->
            <a href="/contacto">Contacto</a>
                     
            </nav>
        </div>
        <!-- declaramos fecha -->
<!-- <?php 
// $fecha = date('d-m-Y');
//echo $fecha;
?> -->
        <p class="copyright">Todos los derechos Reservados Almotec SPA <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src="../build/js/bundle.min.js"></script>
    
</body>
</html>