<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
// Direccion carpeta de imagenes
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');
// llamamos y comprobamos las variables, por ejemplo si esta la variable $inicio o no
function incluirTemplate( $nombre, $inicio = false){
// function incluirTemplate( string  $nombre, bool $inicio = false ) {
     include TEMPLATES_URL . "/${nombre}.php"; 
 }
// funsion de usuario autenticado
function estaAutenticado() {
    session_start();  
    if(!$_SESSION['login']) {
     header('Location: /index.php');
    }
  
}

function ver($variable) {
    echo "<pre>";
var_dump($variable);
echo "</pre>";
exit;
}

// Escapa / Sanitizar el HTML-- s sanitizar
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

// Valida tipo de petición-- valida que se borre solo lo que esta en este arreglo
function validarTipoContenido($tipo){
    $tipos = ['vendedor', 'propiedad'];
    // que busca y donde esta
    return in_array($tipo, $tipos);
}

// Muestra los mensajes
function mostrarNotificacion($codigo) {
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $mensaje = 'Propiedad Creada Correctamente';
            break;
        case 2:
            $mensaje = 'Propiedad Actualizada Correctamente';
            break;
        case 3:
            $mensaje = 'Propiedad Eliminada Correctamente';
            break;
        case 4:
            $mensaje = 'Vendedor Registrado Correctamente';
            break;
        case 5:
            $mensaje = 'Vendedor Actualizado Correctamente';
            break;
        case 6:
            $mensaje = 'Vendedor Eliminado Correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarORedireccionar (string $url) {
    // Validar la URL por ID válido
  $id = $_GET['id'];
  //tomamos la id del url
  $id = filter_var($id, FILTER_VALIDATE_INT);
//Valida si el id no corresponde envia a actualizar
  if(!$id) {
      header("Location: ${url}");
  }
return $id;
}