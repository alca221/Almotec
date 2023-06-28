<?php

namespace Model;
//heredamos clase con extends ActiveRecord
class Vendedor extends ActiveRecord{

   //hacemos alucion a la tabla que vamos intervenir
    protected static $tabla = 'vendedores';

    protected static $columnaDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        //forma en que van a ir los datos--  constructor
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    
    public function validar() {

        //indicamos el error del formulario
        if(!$this->nombre) {
            self::$errores[] = "Debes añadir NOMBRE";
        }
        if(!$this->apellido) {
            self::$errores[] = "Debes añadir APELLIDO";
        }
        if(!$this->telefono) {
            self::$errores[] = "Debes añadir TELEFONO";
        }

        //exprecion regular, busca un parton dendro de un texto por ejemplo un email 
        if(!preg_match('/[0-9]{9}/', $this->telefono)) {
            self::$errores[] = "Formato TELEFONO no valido";
        }

        return self::$errores;
    }
    
}