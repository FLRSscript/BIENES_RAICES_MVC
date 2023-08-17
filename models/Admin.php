<?php

namespace Model;

class Admin extends ActiveRecord
{
    //base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar()
    {
        if (!$this->email) {
            self::$errores[] = 'El email es obligatorio';
        }
        if (!$this->password) {
            self::$errores[] = 'El password es obligatorio';
        }

        return self::$errores;
    }
    public function existeUSuario()
    {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1 ";
        $resultado = self::$db->query($query);
        if (!$resultado->num_rows) {
            self::$errores[] = 'El ususario no existe';
            return;
        }
        return $resultado;
    }
    public function comprobarPass($resultado)
    {
        $usuario = $resultado->fetch_object();
        $autenticado = password_verify($this->password, $usuario->password);
        if (!$autenticado) {
            self::$errores[] = 'El password es Incorrecto';
        }
        return $autenticado;
    }

    public function autenticar(){
        session_start();
        //llenar arreglo de session
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;
        header('location: /admin');
    }
}
