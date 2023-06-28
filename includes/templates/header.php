<?php
//verificamos si la sesion esta definida
    if(!isset($_SESSION)) {
        session_start();
    }
//
    $auth = $_SESSION['login'] ?? false;
    // var_dump($auth);
?>

<!-- este header modifica todos los header de las paginas -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <!-- esta direccion debe traerse desde la carpeta inicial en php -->
    <link rel="stylesheet" href="/bienesraices/build/css/app.css">
</head>
<body>
    <!-- con este php, le indicamos si la clase de inicio esta en la pagina, esta la muestre de lo contrario no -->
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">

        <div class="contenedor contenido-header">
            <div class="barra">
                <!-- llamamos la pagina principal -->
                <a href="/bienesraices/index.php">
                    <img src="/bienesraices/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/bienesraices/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/bienesraices/build/img/dark-mode.svg">
                    <nav class="navegacion">
                    
                    <a href="/bienesraices/login.php">Inicio</a>
                        <a href="/bienesraices/anuncios.php">Anuncios</a>
                        <a href="/bienesraices/nosotros.php">Nosotros</a>
                        <a href="/bienesraices/blog.php">Blog</a>
                        <a href="/bienesraices/contacto.php">Contacto</a>
                        <?php if($auth): ?>
                            <a href="cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif; ?>

                    </nav>
                </div>
   
                
            </div> <!--.barra-->
            <!-- si esta la clase inicio se muestra el h1 de lo contrario no -->
<?php if($inicio) { ?>
            <h1>Venta de Casas y Departamentos  Exclusivos de Lujo</h1>
            <?php } ?>
        </div>
    </header>