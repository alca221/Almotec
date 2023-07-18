<?php

namespace MVC;

class Router {

    public array $getRoutes = [];
    public array $postRoutes = [];

    // public $rutasGET = [];
    // public $rutasPOST = [];
   
// AYUDA A LLAMAR LAS URL EN EL INDEX Y EL METODO QUE CORRESPONDA
public function get($url, $fn) {
    $this->getRoutes[$url] = $fn;
}

public function post($url, $fn) {
    $this->postRoutes[$url] = $fn;
}

public function comprobarRutas() {

    session_start();
// verificamos que exista usuario autenticado
    //$auth = $_SESSION['login'] ?? null;

// arreglo de rutas protegidas, no pueden ingresar si no estan autenticadas
$rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar',
'/vendedores/crear', '/vendedores/actualizar','/vendedores/eliminar' ];
// $currentUrl es url actual
    // $currentUrl = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'] ;
    $currentUrl = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method === 'GET') {
        $fn = $this->getRoutes[$currentUrl] ?? null;
    } else {
        $fn = $this->postRoutes[$currentUrl] ?? null;
    }
// Proteger las rutas-- in_array() permite buscar un elemento en un arreglo
if(in_array($currentUrl, $rutas_protegidas) && !$auth) {
   header('Location: /');
}

//     $fn = $this->postRoutes[$currentUrl] ?? null;
if ( $fn ) {
    // Call user fn va a llamar una función cuando no sabemos cual sera
    call_user_func($fn, $this); // This es para pasar argumentos
} else {
    echo "Página No Encontrada o Ruta no válida";
}
}
    
    //Muestra una vista
    public function render($view, $datos = [] ) {
//crea un almacenamiento en memoria durante un momento
foreach($datos as $key => $value) {
    //el signo de $$ significa variable de variable
    $$key = $value;
}
ob_start();
// aca de damos el formato a la pagina que vamos a mostrar gracias a Router
       include __DIR__ . "/views/$view.php";
//limpia la memoria-- buffer
       $contenido = ob_get_clean();

       include __DIR__ . "/views/layout.php";

    }
}