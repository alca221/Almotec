<?php

namespace Model;

class ActiveRecord {

 //Base de datos --  static para no crear instancias nuevas --- al ser protected solo se puede acceder des de la clase
    ///////
    protected static $db;
    //le damos la estructura que van a requerir los datos para insertar a la base de dato desde el hijo
    protected static $columnaDB = [];
    
    protected static $tabla = '';

    //Errores// Arreglo con mensajes de errores, si los campos van vacios
    protected static $errores = [];

   

    // Definir la conexion a la base de datos-- self hace referencia a los atributos estaticos dentro de la clase, ademas lleban $ 
    // static hace referencia a los atributos estaticos de otras clase
    public static function setDB($database) {
        self::$db = $database;
     }
 

    public function guardar() {
    
        if(!is_null($this->id) ){
            // actualizar
            $this->actualizar();
        } else {
            // Crear nuevo registro
            $this->crear();
        }

    }

public function crear() {

        //Snitizar los datos--llamamos atributo sanitizarAtributos();
$atributos = $this->sanitizarAtributos();
// static asimilamos la tabla
$query = " INSERT INTO " . static::$tabla . " ( ";
// .=  -- es para concatenar ---- no olvidar las '   '  cuando es un string
$query .= join(', ', array_keys($atributos));
$query .= " ) VALUES (' ";
// "', '"  para que se inserten sin problemas a la BD
$query .= join("', '", array_values($atributos));
$query .= " ') ";

        //Insertamos a la base de datos-- este codigo realiza en parte lo mismo que el de arriba
// $quer = " INSERT INTO propiedades ( titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id ) 
// VALUES ( '$this->titulo', '$this->precio', '$this->imagen', '$this->descripcion', '$this->habitaciones', '$this->wc',
//  '$this->estacionamiento', '$this->creado', '$this->vendedores_id' ) ";
// ver($quer);  
$resultado = self::$db->query($query);
//nos muestra en la pantalla

// Mensaje de exito o error
if($resultado) {
    // Redireccionar al usuario.// al poner ? y texto se envia este mensaje en la url// & ayuda a concatenar
    header('Location: /admin?resultado=1');
  }
    }

public function actualizar() {
    // Sanitizar los datos
    $atributos = $this->sanitizarAtributos();

    $valores = [];
    foreach( $atributos as $key => $value) {
    $valores[] = "{$key}='{$value}'";
    }
//    ver( $query);

$query = " UPDATE " . static::$tabla . " SET ";
$query .=  join(', ', $valores );
$query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
$query .= " LIMIT 1 ";
 

$resultado = self::$db->query($query);

if($resultado) {
  // Redireccionar al usuario.// al poner ? y texto se envia este mensaje en la url// & ayuda a concatenar
  header('Location: /admin?resultado=2');
}
}
// ESTE CODIGO ES SIMILAR AL DE ARRIBA
// $query = "UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', imagen =
//  '${nombreImagen}', descripcion = '${descripcion}', habitaciones = '${habitaciones}', 
//  wc = '${wc}', estacionamiento = '${estacionamiento}', vendedores_id ='${vendedorId}' WHERE id = '${id}' ";
 
// Eliminar registro
public function eliminar() {
        // Eliminar el registro-- " LIMIT 1" ES PARA QUE AFECTE SOLO UN REGISTRO
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if($resultado) {
            $this->borrarImagen();
            header('location: /admin?resultado=3');
        }
}


    //identificar y unir los atributos a la BD
    public function atributos() {
        $atributos = [];
        foreach(static::$columnaDB as $columna) {
            //este if ignora la aid en la columna, no aparece si se cumple
            if($columna === 'id') continue;
            // aca columna lleva $ ya que es una variable
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

public function sanitizarAtributos() {
$atributos = $this->atributos();
$sanitizado = [];

foreach($atributos as $key => $value ) {
    //$key mantiene los datos en el arreglo, para limpiar la entrada
    $sanitizado[$key] = self::$db->escape_string($value);
}
//retorna los datos sanitizados
return $sanitizado;
}

//Subida de archivos
public function setImagen($imagen) {
 
    //Elimina la imagen previa-- isset --revisa que exista y tenga valor
if(!is_null($this->id) ){
    //Comprobar si existe el archivo
    $this->borrarImagen();
}
//asignar al atributo de imagen el nombre de la imagen
    if($imagen) {
        $this->imagen = $imagen;
    }
}

//Eliminar Archivo
public function borrarImagen() {
     //Comprobar si existe el archivo
     $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
     if($existeArchivo) {
         unlink(CARPETA_IMAGENES . $this->imagen);
     }
}

//Validacion
public static function getErrores() {
    
    return static::$errores;
}

public function validar() {

  static::$errores = [];
    return static::$errores;
}

// Lista todos los registros
public static function all() {
    //concatenamos el atributo tabla para el hijo que herede, static nos ayuda a seleccionar el que llame
    $query = "SELECT * FROM " . static::$tabla;

$resultado = self::consultarSQL($query);

return $resultado;
}

// Obtiene determinado numeros de registros
public static function get($cantidad) {
    //concatenamos el atributo tabla para el hijo que herede, static nos ayuda a seleccionar el que llame
    $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;

$resultado = self::consultarSQL($query);

return $resultado;
}

//Busca registro por su id
public static function find($id) {
    $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";

    $resultado = self::consultarSQL($query);
//array_shift   retorna el primer elemento de un arreglo
  return (array_shift($resultado));
}


public static function consultarSQL($query) {
// consultar base de datos
$resultado = self::$db->query($query);

// iterar los datos
$array = [];
while($registro = $resultado->fetch_assoc()){
    $array[] = static::crearObjeto($registro);
}

//liberar memoria, se libera igual pero esto ayuda
$resultado->free();

//retornar los resultados
return $array;
}
    
protected static function crearObjeto($registro) {
    //creamos un objeto del padre --- class Propiedad 
$objeto = new static;

    foreach($registro as $key => $value) {
    //verifica que una propiedad exista, si tiene un id
    if(property_exists( $objeto, $key )){
            $objeto->$key = $value;
    }
}
return $objeto;
}

// Sincroniza el objeto en memoria con los cambios realizados por el usuario----actualizar
public function sincronizar( $args = [] ) {
foreach($args as $key => $value) {
    if(property_exists($this, $key ) && !is_null($value)) {
        $this->$key = $value;
    }
}
}



}
