<?php

include_once "model/seguridad_acceso.usuario.php";
include_once "model/core.sucursal.php";

class registro_usuario_C extends mainModel
{
    public static function agregarSucursal($formulario)
    {
        $rif = ucfirst($formulario["sucursal_rif"]);
        $nombre = ucwords($formulario["sucursal_nombre"]);
        $direccion = ucwords($formulario["sucursal_direccion"]);
        $telefono = $formulario["sucursal_telefono"];
        if (!sucursal::crearSucursal($rif, $nombre, $direccion, $telefono)) {
            return false;
        }
        return true;
    }

    public static function agregarGerente($formulario)
    {
        $nombre = ucwords($formulario["gerente_nombre"]);
        $apellido = ucwords($formulario["gerente_apellido"]);
        $cedula = ucfirst($formulario["gerente_cedula"]);
        $email = $formulario["gerente_email"];
        $contraseña = parent::hashear_contraseña($formulario["gerente_contraseña"]);
        $telefono = $formulario["gerente_telefono"];
        if (!usuario::crearGerente($nombre, $apellido, $cedula, $email, $contraseña, $telefono)) {
            return false;
        }
        return true;
    }

    public static function iniciarSesionGerente()
    {
        $conn = parent::conectar_base_datos();
        pg_prepare(
            $conn,
            "iniciar_sesion_gerente",
            "
            SELECT 
                U.id_usuario,
                U.nombre,
                U.apellido,
                U.cedula,
                U.email,
                U.telefono AS telefono_usuario,
                U.activo,

                R.id_rol,
                R.nombre_rol,
                R.descripcion AS descripcion_rol,

                S.id_sucursal,
                S.nombre AS nombre_sucursal,
                S.direccion,
                S.telefono AS telefono_sucursal,
                S.rif

            FROM seguridad_acceso.usuario U
            LEFT JOIN seguridad_acceso.rol R ON U.id_rol = R.id_rol
            LEFT JOIN core.sucursal S ON U.id_sucursal = S.id_sucursal
            WHERE U.id_rol = 1"
        );
        $resultado = pg_execute($conn, "iniciar_sesion_gerente", []);

        $fila = pg_fetch_assoc($resultado);

        $_SESSION["sesion_usuario"] =
            [
                "usuario" => [
                    "id_usuario" => $fila["id_usuario"],
                    "nombre" => $fila["nombre"],
                    "apellido" => $fila["apellido"],
                    "cedula" => $fila["cedula"],
                    "email" => $fila["email"],
                    "telefono" => $fila["telefono_usuario"],
                    "activo" => $fila["activo"]
                ],
                "rol" => [
                    "id_rol" => $fila["id_rol"],
                    "nombre_rol" => $fila["nombre_rol"],
                    "descripcion" => $fila["descripcion_rol"]
                ],
                "sucursal" => [
                    "id_sucursal" => $fila["id_sucursal"],
                    "nombre_sucursal" => $fila["nombre_sucursal"],
                    "direccion" => $fila["direccion"],
                    "telefono_sucursal" => $fila["telefono_sucursal"],
                    "rif" => $fila["rif"]
                ]
            ];
    }
}
