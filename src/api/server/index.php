<?php

$peticion = json_decode(file_get_contents("php://input"), true);
$accion = $peticion["accion"] ?? null;

include_once __DIR__ . "/index.functions.php";

switch ($accion) {

    case "datos":
        $out = ["usuarios" => ["Ana", "Luis"]];
        break;

    case "existe_gerente":
        $out = existeGerente();
        break;

    default:
        $out = ["error" => "Acción no reconocida"];
}

echo json_encode($out);
