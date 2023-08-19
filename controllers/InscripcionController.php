<?php 

namespace Controllers;

use MVC\Router;
use Model\Admin;
use Classes\Email;
use Model\Usuario;


class InscripcionController {


    public static function crear (Router $router) {
 
        $usuario = new Usuario;
    
       // Alertas vacias
       $alertas = [];
    
       if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    //sincroniza los datos en memoria del formulario, declarados en crear-cuenta
             $usuario->sincronizar($_POST);
        
        //     // alertas desde uasuario
             $alertas = $usuario->validarNuevaCuenta();
    //ver(  $usuario);
        //     // Revisar si el arreglo esta vacio
             if(empty($alertas)) {
        //         // Verificar que el usuario no este registrado
                $resultado = $usuario->existeUsuario();
    
                if($resultado->num_rows) {
                      
                     $alertas = Usuario::getAlertas();
                } else {
                  
        //             // Hashear el Password
                 $usuario->hashPassword();
     
        //             // Generar un Token único
                    $usuario->crearToken();
      
        //             // Enviamos el email para comprobacion
                     $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
               
        //             //se envia la confirmación
                    $email->enviarConfirmacion();
       
        //             // Crear el usuario
                    $resultado = $usuario->guardar();
          // ver("no esta registrado");
    
                    if($resultado) {
                       
     header('Location: /mensaje');
                    }
                  
                 }
              
            }
        }
        
        $router->render('inscripcion/crear', [
             'usuario' => $usuario,
           'alertas' => $alertas
        ]);
    }
    

}