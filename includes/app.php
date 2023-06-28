<?php 

//llamamos
//llamamos Propiedad
use Model\ActiveRecord;

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'funciones.php';
require 'config/database.php';



// conectarBD(); importamos la conexion a la BD
//  $db = conectarBD();

//var_dump($propiedad);
//hacemos referencia a Propiedad el atributo setDB()
///////////////
ActiveRecord::setDB($db);
//var_dump($propiedad);
