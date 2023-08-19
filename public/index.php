<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;
use Controllers\LoginController;
use Controllers\InscripcionController;

$router = new Router();

//formulario
$router->get('/inscripcion/crear', [InscripcionController::class, 'crear']);
 $router->post('/inscripcion/crear', [InscripcionController::class, 'crear']);
//se traspasa para ver en que clase esta el metodo-- index-crear-actualizar son metodos de PropiedadController
// Zona admin
$router->get('/admin', [PropiedadController::class, 'index']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);

// Zona publica
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/propiedades', [PaginasController::class, 'propiedades']);
$router->get('/propiedad', [PaginasController::class, 'propiedad']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

// Paginas internas
$router->get('/informatica', [PaginasController::class, 'informatica']);
$router->get('/automatizacion', [PaginasController::class, 'automatizacion']);
$router->get('/electricidad', [PaginasController::class, 'electricidad']);
$router->get('/telecomunicaciones', [PaginasController::class, 'telecomunicaciones']);


// Zona login y autenticacion
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
// Metodo para cerrar sesion
$router->get('/logout', [LoginController::class, 'logout']);


$router->comprobarRutas();