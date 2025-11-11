<?php
include_once "model/seguridad_acceso.usuario.php";
class empleados_añadir_C extends mainModel
{
    public static function agregarEmpleado($formulario)
    {

        $nombre = ucwords($formulario["nombre_empleado"]);
        $apellido = ucwords($formulario["apellido_empleado"]);
        $cedula = ucfirst($formulario["cedula_empleado"]);
        $telefono = $formulario["telefono_empleado"];
        $id_rol = $formulario["id_rol"];
        $email = $formulario["email_empleado"];
        $contraseña = parent::hashear_contraseña($formulario["contrasena_empleado"]);
        $direccion = ucwords($formulario["direccion_empleado"]);
        $id_sucursal = $formulario["id_sucursal"];
        $fecha_registro = $formulario["fecha_registro"];

        if (!self::validarCedula($cedula)) {
            return "Esta cedula ya existe";
        }

        if (!self::validarCorreo($email)) {
            return "Este correo ya existe";
        }

        $empleado = new usuario($nombre, $apellido, $cedula, $telefono, $id_rol, $email, $contraseña, $direccion, $id_sucursal, $fecha_registro);

        if (!$empleado->crearEmpleado()) {
            return "Error al registrar el empleado";
        }
        return "sisa mano";
    }

    public static function validarCedula($cedula)
    {
        $conn = parent::conectar_base_datos();
        pg_prepare($conn, "validar_cedula", "
        SELECT cedula FROM seguridad_acceso.usuario WHERE cedula = $1
    ");
        $resultado = pg_execute($conn, "validar_cedula", [$cedula]);
        $fila = pg_fetch_assoc($resultado);

        if ($fila) {
            return false; // ya existe
        }
        return true; // no existe, válido
    }

    public static function validarCorreo($correo)
    {
        $conn = parent::conectar_base_datos();
        pg_prepare($conn, "validar_correo", "
        SELECT email FROM seguridad_acceso.usuario WHERE email = $1
    ");
        $resultado = pg_execute($conn, "validar_correo", [$correo]);
        $fila = pg_fetch_assoc($resultado);

        if ($fila) {
            return false; // ya existe
        }
        return true; // no existe
    }
}
