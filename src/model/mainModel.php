<?php

include_once("./config/SERVER.php");

class mainModel
{

    //--------------------conexion a la base de datos-------------------------
    protected static function conectar_base_datos()
    {
        //instaciar el objeto pdo usando las constantes de SERVER.php
        $con = pg_connect(PostgreSQL);
        if (!$con) {
            die("error de conexion a la base de datos");
        }

        return $con; //retornar la conexion
    }

    //--------------------hacer una consulta simple-------------------------
    protected static function consulta($sentenciaSQL, $valores = [])
    {
        //valida si el parametro es un string
        if (!is_string($sentenciaSQL)) {
            throw new InvalidArgumentException("el parametro debe ser un string");
        }

        //realiza la conexion y le asigna un nombre unico a la consulta preparada
        $conexion = self::conectar_base_datos();
        $nombre_consulta = "consulta_" . md5($sentenciaSQL);

        //prepara la consulta 
        if (!pg_prepare($conexion, $nombre_consulta, $sentenciaSQL)) {
            die("error en la preparacion de la consulta");
        }

        //ejecuta la consulta con los valores proporcionados
        $resultado = pg_execute($conexion, $nombre_consulta, $valores);
        if (!$resultado) {
            die("error en la ejecucion de la consulta");
        }

        //retorna el resultado de la consulta
        return $resultado;
    }

    //------------------desencriptar la matriz sesion---------------------
    protected static function desencriptar_sesion()
    {
        //desencriptar datos de la sesion en el controlador del dashboard para poder mostrar los datos del usuario
        $datos = self::desencriptar_varios_datos($_SESSION);
        return $datos;
    }

    //----------------hashear una contraseña------------------------
    protected static function hashear_contraseña($contraseña): string
    {
        if (!is_string($contraseña)) {
            throw new InvalidArgumentException("el parametro debe ser un string");
        }

        $options = ["cost" => 12];
        $contraseña = password_hash($contraseña, PASSWORD_DEFAULT, $options);

        return $contraseña;
    }

    //--------validar si una contraseña coincide con la de la base de datos----------
    protected static function verificar_contraseña($contraseña, $contraseña_hasheada): bool
    {
        if (!is_string($contraseña)) {
            throw new InvalidArgumentException("el parametro debe ser un string");
        }

        if (password_verify($contraseña, $contraseña_hasheada) == true) {
            return true; //contraseña valida
        } else {
            return false; //contraseña incorrecta
        };
    }

    //----------------encriptar varios datos------------------------
    protected static function encriptar_varios_datos($datos): array
    {
        if (!is_array($datos)) {
            throw new InvalidArgumentException("el parametro debe ser un array asociativo");
        }

        $resultado = [];

        foreach ($datos as $key => $value) {
            $valor_encriptado = self::encriptar_dato($value);
            $resultado[$key] = $valor_encriptado;
        }

        return $resultado;
    }

    //----------------desencriptar varios datos------------------------
    protected static function desencriptar_varios_datos($datos): array
    {
        if (!is_array($datos)) {
            throw new InvalidArgumentException("el parametro debe ser un array asociativo");
        }

        $resultado = [];

        foreach ($datos as $key => $value) {
            $valor_desencriptado = self::desencriptar_dato($value);
            $resultado[$key] = $valor_desencriptado;
        }

        return $resultado;
    }

    //----------------encriptar un dato------------------------
    protected static function encriptar_dato($dato)
    {
        return openssl_encrypt($dato, METHOD, CLAVE, 0, IV);
    }

    //----------------desencriptar un dato------------------------
    public static function desencriptar_dato($dato)
    {
        if (!is_string($dato)) {
            throw new InvalidArgumentException("el parametro debe ser un string");
        }

        return openssl_decrypt($dato, METHOD, CLAVE, 0, IV);
    }
}
