<?php

namespace  Model;

class Propiedad extends ActiveRecord
{
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];

    
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
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }
    public function validar()
    {
        //VALIDACIONES
        if (!$this->titulo) {
            self::$errores[] = "Debes agregar un titulo de la propiedad";
        }
        if (!$this->precio) {
            self::$errores[] = "Debes agregar un precio de la propiedad";
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "Debes agregar un descripcion de minimo 50 caracteres";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "Debes agregar un habitaciones de la propiedad";
        }
        if (!$this->wc) {
            self::$errores[] = "Debes agregar un wc de la propiedad";
        }
        if (!$this->estacionamiento) {
            self::$errores[] = "Debes agregar un estacionamiento de la propiedad";
        }
        if (!$this->vendedores_id) {
            self::$errores[] = "Debes agregar un vendedor de la propiedad";
        }
        if (!$this->imagen) {
            self::$errores[] = 'La imagen es obligatoria';
        }

        return self::$errores;
    }
}
