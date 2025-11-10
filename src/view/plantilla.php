<?php

session_start();

//paginas de la vista que puede manipular el usuario con los menus (importante poner aqui cada pagina nueva para que funcione el js y el menu)
$paginas_existentes = [
    "dashboard-gerente-view.php",
    "inventario-ver-productos-view.php",
    "inventario-añadir-producto-view.php",
    "inventario-gestionar-categorias-view.php",
    "inventario-ajustes-manuales-stock-view.php",
    "inventario-stock-bajo-view.php",
    "listado-compras-view.php",
    "añadir-compras-view.php",
    "punto-venta-view.php",
    "historial-facturas-view.php",
    "cierre-caja-view.php",
    "clientes-ver-listado-clientes-view.php",
    "clientes-gestionar-clientes-view.php",
    "proveedores-lista-view.php",
    "proveedores-detalles-view.php",
    "proveedores-gestionar-proveedores-view.php",
    "empleados-lista-empleados-view.php",
    "empleado-gestionar-empleado-view.php",
    "sucursales-añadir-view.php",
    "sucursales-listado-view.php",
    "sucursales-detalle-view.php",
    "clientes-listado-view.php",
    "clientes-detalle-view.php",
    "proveedores-listado-view.php",
    "proveedores-añadir-view.php",
    "proveedores-detalle-view.php",
    "empleados-listado-view.php",
    "empleados-añadir-view.php",
    "empleados-detalle-view.php",
    "empleados-añadir-rol-view.php",
    "empleados-lista-roles-view.php",
    "empleados-detalle-rol-view.php",
    "monedas-tasas-activas-view.php",
    "monedas-añadir-tasas-view.php",
    "monedas-historial-view.php",
    "monedas-añadir-view.php",
    "monedas-listado-view.php",
    "ventas-añadir-metodo-pago-view.php",
    "ventas-cierre-caja-view.php",
    "ventas-detalle-metodo-pago-view.php",
    "ventas-historial-facturas-view.php",
    "ventas-lista-metodos-pago-view.php",
    "ventas-productos-populares-view.php",
    "ventas-punto-venta-view.php",
    "compras-historial-view.php",
    "compras-añadir-view.php",
    "compras-detalle-view.php"
];

//paginas que no usan el js de menu lateral
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

//si el rol es Gerente y esta en la pagina de vistas existentes entonces...
if ($_SESSION["sesion_usuario"]["rol"]["nombre_rol"] == "Gerente" && in_array($vista, $paginas_existentes)) {
    include_once("assets/elements/menu-lateral-gerente.php");
    include_once("view/html/" . $vista); // contenido principal
    include_once("assets/elements/scripts.php"); // scripts JS
}

//si el rol es Cajero y esta en la pagina de vistas existentes entonces...
if($_SESSION["sesion_usuario"]["rol"]["nombre_rol"] == "Cajero" && in_array($vista, $paginas_existentes)){
    include_once("assets/elements/menu-lateral-cajero.php");
    include_once("view/html/" . $vista); // contenido principal
    include_once("assets/elements/scripts.php"); // scripts JS
}

//si el rol es Adminstrador y esta en la pagina de vistas existentes entonces...
if ($_SESSION["sesion_usuario"]["rol"]["nombre_rol"] == "Administrador" && in_array($vista, $paginas_existentes)) {
    include_once("assets/elements/menu-lateral-administrador.php");
    include_once("view/html/" . $vista); // contenido principal
    include_once("assets/elements/scripts.php"); // scripts JS
}

// si la vista está en excepciones (ej. 404)
include_once("view/html/" . $vista); // solo se carga el contenido
include_once("assets/elements/scripts.php"); // scripts JS