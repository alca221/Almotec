<?php

namespace Model;
//heredamos clase con extends ActiveRecord
class Propiedad extends ActiveRecord{

    //hacemos alucion a la tabla que vamos intervenir
    protected static $tabla = 'propiedades';

    protected static $columnaDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 
    'estacionamiento', 'creado', 'vendedores_id'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    public function __construct($args = [])
    {
        //forma en que van a ir los datos--  constructor
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        //date nos da el dato de la fecha de cambio
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }

    public function validar() {

        //indicamos el error del formulario
        if(!$this->titulo) {
            self::$errores[] = "Debes añadir un TITULO";
        }
         if(!$this->precio) {
            self::$errores[] = 'El Precio es Obligatorio';
        }
        if( strlen( $this->descripcion ) < 50 ) {
            self::$errores[] = 'La descripción es obligatoria y debe tener al menos 50 caracteres';
        }
        if(!$this->habitaciones) {
            self::$errores[] = 'El Número de habitaciones es obligatorio';
        }
        if(!$this->wc) {
            self::$errores[] = 'El Número de Baños es obligatorio';
        }
        if(!$this->estacionamiento) {
            self::$errores[] = 'El Número de lugares de Estacionamiento es obligatorio';
        }
        if(!$this->vendedores_id) {
            self::$errores[] = 'Elige un vendedor';
        }
        if(!$this->imagen) {
            self::$errores[] = 'La Imagen es Obligatoria';
        }

        return self::$errores;
    }
    
}