<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {
    public static function index(Router $router) {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $resultado = $_GET['resultado'] ?? null ;
        
// Vista
$router->render('propiedades/admin', [
 'propiedades' => $propiedades,
 'resultado' => $resultado,
 'vendedores' =>  $vendedores
]);
  }


  public static function crear(Router $router) {

    $propiedad = new Propiedad;
    $vendedores = Vendedor::all();
   
//arreglo de mensajes de errores
$errores = Propiedad::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST' ) {
 //crea una nueva instancia a propiedad y asignar los atributos desde el formulario_propiedades con estas caracteristicas --propiedad[habitaciones]
 $propiedad = new Propiedad($_POST['propiedad']);
 // ver($_FILES['propiedad']);
            /** SUBIDA DE ARCHIVOS */
                             // Generar un nombre único a la imagen
             $nombreImagen = md5( uniqid( rand(), true ) ). ".jpg" ;
 
     // Setear la imagen
      //Realiza un resize a la imagen con intervention----['tmp_name'] guarda la imagen en memoria del servidor
         // tipo y porte de la imagen fit(800,600)
         if($_FILES['propiedad']['tmp_name']['imagen']) {
               $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
         $propiedad->setImagen($nombreImagen);
         }
   
         //Validamos 
     $errores = $propiedad->validar();
     
     if(empty($errores)) {
 //crear carpeta subir imagenes
          if(!is_dir(CARPETA_IMAGENES)) {
                 mkdir(CARPETA_IMAGENES);
             }

  // Revisar que el array de errores este vacio
         //Guarda la imagen el el servidor
 $image->save(CARPETA_IMAGENES . $nombreImagen);
 
 // Guarda en la base de datos
 $propiedad->guardar();
            }
    }

      $router->render('propiedades/crear', [
        'propiedad' => $propiedad,
        'vendedores' => $vendedores,
        'errores' => $errores 
       ]);
 
        }


  


            public static function actualizar(Router $router) {
                
                $id = validarORedireccionar('/admin');
 // Obtener los datos de la propiedad-- el objeto completo
 $propiedad = Propiedad::find($id);
 $vendedores = Vendedor::all();
//arreglo de mensajes de errores
$errores = Propiedad::getErrores();

// metodo pos para actualizar
if($_SERVER['REQUEST_METHOD'] === 'POST' ) {

    //asignar los atributos desde el formulario_propiedades con estas caracteristicas --propiedad[habitaciones]
$args = $_POST['propiedad'];
// la linea anterior nos evita escribir todos estos atributos por cada casilla
// $args['titulo'] = $_POST['titulo'] ?? null;
// $args['precio'] = $_POST['precio'] ?? null;

//AYUDA A SINCRONIZAR LOS DATOS NUEVOS INGRESADOS
$propiedad->sincronizar($args);
//validamos errores desde propiedad

$errores = $propiedad->validar();

//Subida de archivos
// Generar un nombre único a la imagen
$nombreImagen = md5( uniqid( rand(), true ) ). ".jpg" ;

if($_FILES['propiedad']['tmp_name']['imagen']) {
    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
$propiedad->setImagen($nombreImagen);
}
 // Revisar que el array de errores este vacio
 if(empty($errores)) {
// ALMACENAR IMAGEN

// Almacenar la imagen
if($_FILES['propiedad']['tmp_name']['imagen']) {
    $image->save(CARPETA_IMAGENES . $nombreImagen);
  
}
//instanciamos propiedad
$propiedad->guardar();
//Insertamos a la base de datos---- las '' indican que son string
 }
}
 $router->render('/propiedades/actualizar', [
    'propiedad' => $propiedad,
    'errores' => $errores,
      'vendedores' => $vendedores
   ]);
                    }


public static function eliminar(Router $router) {
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = $_POST['id'];
        //filtramos el id, para que no eliminentodo
        $id = filter_var($id, FILTER_VALIDATE_INT);
    
        if($id) {
    
            $tipo = $_POST['tipo'];
    //permite que el usario no borre lo que no debe
            if(validarTipoContenido($tipo)) {
                $propiedad = Propiedad::find($id);
                $propiedad->eliminar();
            }
            
    
             // Obtener los datos de la propiedad-- el objeto completo
    
    
        }  
    }

}

}