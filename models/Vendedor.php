<?php

namespace Model;

class Vendedor extends ActiveRecord
{
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }
    public function validar()
    {
        //VALIDACIONES
        if (!$this->nombre) {
            self::$errores[] = "Debes agregar un nombre del vendedor";
        }
        if (!$this->apellido) {
            self::$errores[] = "Debes agregar un apellido del vendedor";
        }
        if (!$this->telefono) {
            self::$errores[] = "Debes agregar un telefono";
        }
        if(!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores[] = 'Formato de telefono invalido';
        }
        return self::$errores;
    }
}
