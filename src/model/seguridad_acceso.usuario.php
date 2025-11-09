<?php
class usuario extends mainModel
{
    public static function crearGerente($nombre, $apellido, $cedula, $email, $contraseña, $telefono)
    {
        $conn = parent::conectar_base_datos();
        pg_prepare($conn, "agregar_gerente", "insert into seguridad_acceso.usuario (id_usuario, id_rol, nombre, apellido, cedula, email, contraseña, activo, id_sucursal, telefono) values (1, 1, $1, $2, $3, $4, $5, true, 1, $6)");
        $resultado = pg_execute($conn, "agregar_gerente", [$nombre, $apellido, $cedula, $email, $contraseña, $telefono]);
        if (!$resultado) {
            return false;
        }
        return true;
    }
}
