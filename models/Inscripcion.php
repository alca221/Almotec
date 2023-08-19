<?php

namespace Model;

class Usuario extends ActiveRecord {
       // Base de datos
       protected static $tabla = 'usuarios';
       protected static $columnasDB = ['id', 'nombre', 'apellido', 'direccion', 'telefono', 
       'email', 'password', 'admin', 'confirmado', 'token', 'comunas_id', 'regiones_id'];

       public $id;
       public $nombre;
       public $apellido;
       public $direccion;
       public $telefono;
       public $email;
       public $password;
       public $admin;
       public $confirmado;
       public $token;
       public $comunas_id;
       public $regiones_id;

       public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->admin = $args['admin'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';
        $this->comunas_id = $args['comunas_id'] ?? '';
        $this->regiones_id = $args['regiones_id'] ?? '';
}

 // Mensajes de validación para la creación de una cuenta
 public function validarNuevaCuenta() {
    if(!$this->nombre) {
        self::$alertas['error'][] = 'El Nombre es Obligatorio';
    }
    if(!$this->apellido) {
        self::$alertas['error'][] = 'El Apellido es Obligatorio';
    }
    if(!$this->direccion) {
        self::$alertas['error'][] = 'La Dirección es Obligatoria';
        
    }
    if(!$this->comunas_id) {
        self::$alertas['error'][] = 'Falta ingresar Comuna';
    }
    if(!$this->regiones_id) {
        self::$alertas['error'][] = 'Falta ingresar Región';
    }
 
    if(!$this->email) {
        self::$alertas['error'][] = 'El E-mail es Obligatorio';
    }
    if(!$this->password) {
        self::$alertas['error'][] = 'El Password es Obligatorio';
    }
//     strlen, le damos un minimo de caracteres del password
    if(strlen($this->password) < 6) {
        self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
    }

    return self::$alertas;
}

//validamos si el usuario ingreso los datos necesarios
public function validarLogin() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es Obligatorio';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'El Password es Obligatorio';
        }

        return self::$alertas;
    }

    public function validarEmail() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es Obligatorio';
        }
        return self::$alertas;
    }

    public function validarPassword() {
        if(!$this->password) {
            self::$alertas['error'][] = 'El Password es obligatorio';
        }
        if(strlen($this->password) < 6) {
            self::$alertas['error'][] = 'El Password debe tener al menos 6 caracteres';
        }

        return self::$alertas;
    }

    // Revisa si el usuario ya existe
    public function existeUsuario() {
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado->num_rows) {
            self::$alertas['error'][] = 'El Usuario ya esta registrado';
        }
//ver($resultado);
        return $resultado;
    }
// encriptamos el password
    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
// creamos el token de usuario para crear cuenta, uniqid() lo crea
    public function crearToken() {
        $this->token = uniqid();
    }

   public function comprobarPasswordAndVerificado($password) {
        $resultado = password_verify($password, $this->password);
        // revisamos si usuario existe y si esta confirmado
        if(!$resultado || !$this->confirmado) {
            self::$alertas['error'][] = 'Password Incorrecto o tu cuenta no ha sido confirmada';
        } else {
            return true;
        }
     }
}