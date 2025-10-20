<?php

session_start();

$dashboard = ["dashboard-gerente-view.php"];
$excepciones = ["404-view.php", "inicio-sesion-usuario-view.php", "registro-usuario-view.php"];

// siempre se incluyen los enlaces al inicio
include_once("assets/elements/links.php");

// si la vista es la página de inicio
if ($vista === "inicio-view.php") {
    include_once("assets/elements/header.php"); // encabezado
    include_once("assets/elements/menu-lateral.php"); // menú lateral exclusivo de inicio
    include_once("view/html/" . $vista); // contenido principal
    include_once("assets/elements/footer.php"); // pie de página
    include_once("assets/elements/scripts.php"); // scripts JS
    exit();
}

//si la vista es del registro o del inicio de sesion se carga un menu exclusivo de volver al inico
if ($vista === "inicio-sesion-usuario-view.php" || $vista === "registro-usuario-view.php") {
    include_once("assets/elements/menu_volver.php"); // menu para regresar exclusivo de registro y del inicio de sesion
    include_once("view/html/" . $vista); // contenido principal
    include_once("assets/elements/scripts.php"); // scripts JS
}

//is es dashboard admin
if (in_array($vista, $dashboard)) {
    include_once("assets/elements/dashboard-gerente.php"); // encabezado
    include_once("view/html/" . $vista); // contenido principal
    include_once("assets/elements/scripts.php"); // scripts JS
}

// si la vista está en excepciones (ej. 404)
include_once("view/html/" . $vista); // solo se carga el contenido
include_once("assets/elements/scripts.php"); // scripts JS