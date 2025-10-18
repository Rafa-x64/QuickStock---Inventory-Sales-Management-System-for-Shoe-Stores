<?php

session_start();

$excepciones = ["404-view.php"];

// siempre se incluyen los enlaces al inicio
include_once("assets/elements/links.php");

// si la vista es la página de inicio
if ($vista === "inicio-view.php") {
    include_once("assets/elements/header.php"); // encabezado
    include_once("assets/elements/menu-lateral.php"); // menú lateral exclusivo de inicio
    include_once("html/" . $vista); // contenido principal
    include_once("assets/elements/footer.php"); // pie de página
    include_once("assets/elements/scripts.php"); // scripts JS
    exit();
}

// si la vista no está en la lista de excepciones
if (!in_array($vista, $excepciones)) {
    include_once("assets/elements/header.php"); // encabezado
    include_once("html/" . $vista); // contenido principal
    include_once("assets/elements/footer.php"); // pie de página
    include_once("assets/elements/scripts.php"); // scripts JS
    exit();
}

// si la vista está en excepciones (ej. 404)
include_once("html/" . $vista); // solo se carga el contenido
include_once("assets/elements/scripts.php"); // scripts JS