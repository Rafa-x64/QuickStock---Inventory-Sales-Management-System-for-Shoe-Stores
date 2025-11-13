<?php
session_start();
$peticion = json_decode(file_get_contents("php://input"), true);
$accion = $peticion["accion"] ?? null;

include_once __DIR__ . "/index.functions.php";

switch ($accion) {

    case "existe_gerente":
        include_once __DIR__ . "/seguridad_acceso/rol.php";
        $out = existeGerente();
        break;

    case "obtener_nombre_apellido":
        include_once __DIR__ . "/seguridad_acceso/usuario.php";
        $out = obtenerNombreApellido();
        break;

    case "obtener_roles":
        include_once __DIR__ . "/seguridad_acceso/rol.php";
        $out = obtenerRoles();
        break;

    case "obtener_sucursales":
        include_once __DIR__ . "/core/sucursal.php";
        $out = obtenerSucursales();
        break;

    case "obtener_nombre_sucursal":
        $out = obtenerNombreSucursal();
        break;

    case "obtener_todos_los_empleados":
        include_once __DIR__ . "/seguridad_acceso/usuario.php";
        $out = obtenerEmpleados($peticion["sucursal"], $peticion["rol"], $peticion["estado"]);
        break;

    case "obtener_un_usuario":
        include_once __DIR__ . "/seguridad_acceso/usuario.php";
        $out = obtenerUnUsuario($peticion["email"]);
        break;

    default:
        $out = ["error" => "Acción no reconocida"];
}

echo json_encode($out);
