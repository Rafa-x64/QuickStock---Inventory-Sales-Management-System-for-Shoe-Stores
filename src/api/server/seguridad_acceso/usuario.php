<?php
function obtenerNombreApellido()
{
    $nombre_completo = $_SESSION["sesion_usuario"]["usuario"]["nombre"];
    $apellido_completo = $_SESSION["sesion_usuario"]["usuario"]["apellido"];

    $nombre = explode(" ", $nombre_completo);
    $apellido = explode(" ", $apellido_completo);

    if (!$nombre || !$apellido) {
        return ["error" => "Error al filtrar el nombre y apellido"];
    }

    return ["nombre" => $nombre[0], "apellido" => $apellido[0]];
}
?>