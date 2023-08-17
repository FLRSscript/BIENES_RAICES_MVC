<?php

namespace Model;

class ActiveRecord
{

    //base de datos
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';
    //errores
    protected static $errores = [];

    //deifinir la coneccion a la base de datos
    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function guardar()
    {
        if (!is_null($this->id)) {
            //Actualizar
            $this->actualizar();
        } else {
            //Creando un nuevo registro
            $this->crear();
        }
    }
    //insertar en base  de datos
    public function crear()
    {
        //sanitizar los dato s
        $atributos = $this->sanitizarDatos();
        $query = "INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);
        if ($resultado) header('location: /admin?resultado=1'); //index.php?resultado=1'
    }
    //actualizar
    public function actualizar()
    {

        $atributos = $this->sanitizarDatos();
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query =  "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";
        // debug($query);
        $resultado = self::$db->query($query);
        if ($resultado) header('Location: /admin?resultado=2');
    }
    //eliminar un registro
    public function eliminar()
    {
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado) {
            $this->borrarImagen();
        }
        header('Location: /admin?resultado=3');
    }
    //mapear atributos
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    //sanititzar datos
    public function sanitizarDatos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //subir archivos
    public function setImagen($imagen)
    {
        //eliminar imagen previa
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }

        //asignar atritbuto el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }
    //eliminar imagen
    public function borrarImagen()
    {
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }
    //validacion
    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar()
    {

        static::$errores = [];
        return static::$errores;
    }
    //listar propiedades
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;

        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    //obtiene un numero determinado de registros
    public static function get($cantidad)
    {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    //busca un registro por id
    public static function find($id)
    {
        $query =  "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }
    public static function consultarSQL($query)
    {
        //consultar base de datos
        $resultado = self::$db->query($query);
        //iterar sobre los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }
        $resultado->free();
        return $array;
    }

    public static function crearObjeto($registro)
    {
        $objeto = new static;
        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }
    //sicroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = [])
    {

        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
