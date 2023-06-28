<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index( Router $router ) {
//get(3) es la cantidad que mostraremos
        $propiedades = Propiedad::get(3);
$inicio = true;
        $router->render('paginas/index', [
            //inio muestra la imagen grande
            'inicio' => $inicio,
            'propiedades' => $propiedades
        ]);
    }

    public static function nosotros( Router $router ) {
        $router->render('paginas/nosotros', [

        ]);
    }

    public static function propiedades( Router $router ) {

        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router) {
        $id = validarORedireccionar('/propiedades');

        // Obtener los datos de la propiedad
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog( Router $router ) {

        $router->render('paginas/blog');
    }

    public static function entrada( Router $router ) {
        $router->render('paginas/entrada');
    }


    public static function contacto( Router $router ) {
        // Mensaje de envio de mensaje
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

          

            // Validar 
             $respuestas = $_POST['contacto'];
        
            // create a new object de phpmailer
            $mail = new PHPMailer();
            // configurar an SMTP -- para el envio de email
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'f34f73a7f015ac';
            $mail->Password = '950dbf06e39493';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //configuracion de contenido del email
        
            $mail->setFrom('contacto@almotec.cl', $respuestas['nombre']);
            $mail->addAddress('contacto@almotec.cl', 'almotec.cl');
            $mail->Subject = 'Tienes un Nuevo Email';

            // habilitar HTML 
            $mail->isHTML(TRUE);
            $mail->CharSet = 'UTF-8'; 

            // Definir el contenido

            $contenido = '<html>';
             $contenido .= "<p><strong>Tienes un nuevo mensaje:</strong></p>";
            $contenido .= "<p>Nombre: " . $respuestas['nombre'] . "</p>";
            $contenido .= "<p>Mensaje: " . $respuestas['mensaje'] . "</p>";
            $contenido .= "<p>Servicio: " . $respuestas['tipo'] . "</p>";
            $contenido .= "<p>Tipo Servicio: " . $respuestas['tipo2'] . "</p>";
//condicional de los campos
            if($respuestas['contacto'] === 'telefono') {
                $contenido .= "<p>Eligió ser Contactado por Teléfono:</p>";
                $contenido .= "<p>Su teléfono es: " .  $respuestas['telefono'] ." </p>";
                $contenido .= "<p>En la Fecha y hora: " . $respuestas['fecha'] . " - " . $respuestas['hora']  . " Horas</p>";
            } else {
                $contenido .= "<p>Eligio ser Contactado por Email:</p>";
                $contenido .= "<p>Su Email  es: " .  $respuestas['email'] ." </p>";
            }

             $contenido .= '</html>';
             $mail->Body = $contenido;
             $mail->AltBody = 'Esto es texto alternativo sin html';

            // Enviar el email
            if($mail->send()){ 
      
        $mensaje = 'Mensaje enviado Correctamente';

            } else {
            
             $mensaje = 'Hubo un Error... intente nuevamente';
         
            }

        }
        
        $router->render('paginas/contacto', [
          
             'mensaje' => $mensaje
        ]);
    }

//////////////// Paginas internas///////////
public static function informatica( Router $router ) {

    $router->render('paginasInter/informatica');
}
public static function automatizacion( Router $router ) {

    $router->render('paginasInter/automatizacion');
}
public static function electricidad( Router $router ) {

    $router->render('paginasInter/electricidad');
}
public static function telecomunicaciones( Router $router ) {

    $router->render('paginasInter/telecomunicaciones');
}



}