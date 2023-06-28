<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController {

    public static function crear(Router $router) {

        $errores = Vendedor::getErrores();
        $vendedor = new Vendedor;
    
        if($_SERVER['REQUEST_METHOD'] == 'POST' ) {

            // crear una nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);
            
            // Validar que no haya campos vacios
            $errores = $vendedor->validar();
            
            // no hay errores--- empty verifica que el arreglo este vacio
            if(empty($errores)) {
                    $vendedor->guardar();    
            }
            }
// Vista
$router->render('vendedores/crear', [
    'errores' => $errores,
    'vendedor' =>  $vendedor
]);
  }

  public static function actualizar(Router $router) {

    $errores = Vendedor::getErrores();
       
    $id = validarORedireccionar('/admin');
//Obtener datos de vendedor a actualizar
     $vendedor = Vendedor::find($id);

     if($_SERVER['REQUEST_METHOD'] === 'POST') {
        //asignar los valores
$args = $_POST['vendedor'];
//SINCRONIZAR LOS DATOS NUEVOS INGRESADOS
$vendedor->sincronizar($args);

//validamos errores desde propiedad
$errores = $vendedor->validar();
if(empty($errores)) {
       $vendedor->guardar();
}
}

// // Vista
 $router->render('vendedores/actualizar', [
    'errores' => $errores,
 'vendedor' =>  $vendedor
 ]);
}

public static function eliminar() {
 
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = $_POST['id'];
        //filtramos el id, para que no eliminentodo
        $id = filter_var($id, FILTER_VALIDATE_INT);
    
        if($id) {
    
            $tipo = $_POST['tipo'];
    //permite que el usario no borre lo que no debe
            if(validarTipoContenido($tipo)) {
                $vendedor = Vendedor::find($id);
                $vendedor->eliminar();
            }
        }  
    }
}
}

