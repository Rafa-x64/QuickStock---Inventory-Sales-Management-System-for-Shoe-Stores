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

    default:
        $out = ["error" => "Acción no reconocida"];
}

echo json_encode($out);
