<?php
include_once "model/seguridad_acceso.usuario.php";
class empleados_editar_C extends mainModel
{
    public static function editarEmpleado($formulario)
    {
        // Validar campos obligatorios
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

        // Normalización de datos
        $nombre     = trim($formulario["nombre_empleado"]);
        $apellido   = trim($formulario["apellido_empleado"]);
        $cedula     = trim($formulario["cedula_empleado"]);
        $telefono   = trim($formulario["telefono_empleado"]);
        $id_rol     = (int)$formulario["id_rol"];
        $emailNuevo = trim($formulario["email_empleado"]);
        $direccion  = trim($formulario["direccion_empleado"]);
        $sucursal   = (int)$formulario["id_sucursal"];
        $emailViejo = trim($formulario["id_email"]); // clave original

        // ------------------------------
        // ✅ Normalización segura del estado
        // ------------------------------
        $estadoTexto = strtolower(trim($formulario["estado_empleado"] ?? ""));

        // Si viene vacío o con valor inválido, recuperar estado real de BD
        if ($estadoTexto !== "activo" && $estadoTexto !== "inactivo") {
            $estadoTexto = self::obtenerEstadoActual($emailViejo) ? "activo" : "inactivo";
        }

        $estado = ($estadoTexto === "activo");
        // ------------------------------

        // Conexión
        $conn = parent::conectar_base_datos();

        // Query UPDATE
        $sql = "
            UPDATE seguridad_acceso.usuario
            SET 
                nombre = $1,
                apellido = $2,
                cedula = $3,
                telefono = $4,
                id_rol = $5,
                email = $6,
                direccion = $7,
                id_sucursal = $8,
                activo = $9
            WHERE email = $10
        ";

        $params = [
            $nombre,
            $apellido,
            $cedula,
            $telefono,
            $id_rol,
            $emailNuevo,
            $direccion,
            $sucursal,
            $estado,
            $emailViejo
        ];

        $res = pg_query_params($conn, $sql, $params);

        if (!$res) {
            return ["error" => "Error actualizando usuario"];
        }

        if (pg_affected_rows($res) === 0) {
            return ["error" => "No se encontró el empleado o no hubo cambios"];
        }

        return ["success" => true];
    }

    // -------------------------------------------------------------------
    // ✅ Recupera el estado real del empleado desde la base de datos
    // -------------------------------------------------------------------
    private static function obtenerEstadoActual($email)
    {
        if (!$email || trim($email) === "") {
            return true; // por defecto, evitar errores
        }

        $conn = parent::conectar_base_datos();

        $sql = "SELECT activo FROM seguridad_acceso.usuario WHERE email = $1 LIMIT 1";
        $res = pg_query_params($conn, $sql, [$email]);

        if (!$res) {
            return true;
        }

        $fila = pg_fetch_assoc($res);
        if (!$fila) {
            return true;
        }

        return filter_var($fila["activo"], FILTER_VALIDATE_BOOLEAN);
    }
}
