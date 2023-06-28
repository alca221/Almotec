<?php 

//  function conectarBD() : mysqli {
   //   $db = new mysqli('localhost', 'root', 'admin', 'bienesraices_crud' )
    $db = mysqli_connect( 
    $_ENV['DB_HOST'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS'],
    $_ENV['DB_BD'])
;
//para el idioma
$db->set_charset('utf8');
//        if(!$db) {          
//         echo "Conexión OK";
//      }else {
//          echo "Error no se pudo conectar";

//   } 

     if(!$db) {
         echo "Error no se pudo conectar";
         exit;
      } 

//  return $db;
    
//     }



