<?php
include_once "model/seguridad_acceso.usuario.php";

class empleados_editar_C extends mainModel
{
    public static function editarEmpleado($formulario)
    {
        // Campos requeridos
        $requeridos = [
            "nombre_empleado",
            "apellido_empleado",
            "cedula_empleado",
            "telefono_empleado",
            "id_rol",
            "email_empleado",
            "direccion_empleado",
            "id_sucursal",
            "estado_empleado",
            "id_email"
        ];

        foreach ($requeridos as $campo) {
            if (!isset($formulario[$campo]) || trim($formulario[$campo]) === "") {
                return ["error" => "Campo faltante: $campo"];
            }
        }

        // Normalización básica (sin tocar validaciones anteriores)
        $data = [
            "nombre"    => trim($formulario["nombre_empleado"]),
            "apellido"  => trim($formulario["apellido_empleado"]),
            "cedula"    => trim($formulario["cedula_empleado"]),
            "telefono"  => trim($formulario["telefono_empleado"]),
            "id_rol"    => (int)$formulario["id_rol"],
            "emailNuevo" => trim($formulario["email_empleado"]),
            "direccion" => trim($formulario["direccion_empleado"]),
            "id_sucursal" => (int)$formulario["id_sucursal"],
            "estado"    => trim($formulario["estado_empleado"]),
            "emailViejo" => trim($formulario["id_email"])
        ];

        // Delegar TODO al modelo
        return usuario::editar($data);
    }
}