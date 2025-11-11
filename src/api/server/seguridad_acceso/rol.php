<?php
function existeGerente()
{
    $conn = conectar_base_datos();

    $sql = "SELECT COUNT(*) AS total FROM seguridad_acceso.usuario WHERE id_rol = 1";
    $res = pg_query($conn, $sql);

    if (!$res) {
        return ["error" => "Error en la consulta"];
    }

    $data = pg_fetch_assoc($res);

    return ["existe" => ($data["total"] > 0)];
}

function obtenerRoles(){
    $conn = conectar_base_datos();
    pg_prepare($conn, "obtener_roles", "SELECT * FROM seguridad_acceso.rol");
    $res = pg_execute($conn, "obtener_roles", []);
    if(!$res){
        return ["error" => "Error al realizar la consulta de roles"];
    }
    $filas = pg_fetch_all($res);
    if(!$filas){
        return [];
    }
    return ["filas" => $filas ?: []];
}
?>