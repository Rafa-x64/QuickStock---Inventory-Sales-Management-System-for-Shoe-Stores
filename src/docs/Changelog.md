# Changelog

Este archivo documenta los cambios y avances realizados en el desarrollo del sistema **QuickStock**. Actualmente se encuentra en fase de construcción de vistas, con enfoque en diseño responsivo, modularidad y cumplimiento del modelo entidad-relación (MER).

---

## [v0.1.0] - Estructura inicial y vistas base  
**Fecha:** 2025-10-25  
**Estado:** En desarrollo

### Añadido
- Estructura de carpetas bajo patrón MVC:
  - `controller/`, `model/`, `view/`, `assets/`, `config/`, `shared/`, `docs/`
- Sistema de vistas con archivos `.php` organizados por módulo funcional:
  - Inventario, compras, clientes, empleados, proveedores, punto de venta, sesión de usuario
- Plantilla base (`plantilla.php`) para renderizado visual
- Archivos `.htaccess` e `index.php` configurados para flujo MVC

### Implementado en vistas
- Carruseles visuales para presentación de contenido destacado
- Formularios tipo wizard (por pasos) para procesos como registro, compras y gestión de productos
- Diseño responsivo compatible con Bootstrap y adaptable a múltiples resoluciones
- Validación estructural de formularios conforme al modelo entidad-relación (MER)
- Separación modular de componentes visuales (`<boton-accion>`, menús, cabeceras, pie de página)
- Inclusión de Web Components registrados globalmente
- Integración de iconografía SVG y logotipos en variantes estándar y circular

### Documentación

- [Manual del desarrollador](src/docs/manual.desarrollador.md)
- [Estructura técnica del proyecto](src/docs/estructura_proyecto.md)
- Diagramas del sistema actual y propuesto:
  - [current_system](src/docs/diagrams/current_system/)
  - [proposed_system](src/docs/diagrams/proposed_system/)
- [Registro de tareas](src/docs/todo.md)
- [Licencia de uso](src/docs/LICENSE.md)


---

## Próximos pasos
- Implementar lógica de controladores y modelos
- Adaptar conexión a base de datos (MySQL/PostgreSQL)
- Integrar validaciones dinámicas y seguridad en formularios
- Desarrollar flujo de autenticación y roles de usuario
- Extender documentación técnica y diagramas UML

