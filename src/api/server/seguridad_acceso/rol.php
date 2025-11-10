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
?>