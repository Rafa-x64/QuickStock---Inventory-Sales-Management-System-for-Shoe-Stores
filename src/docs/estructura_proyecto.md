# Estructura básica del proyecto

Este proyecto sigue una arquitectura modular orientada a la separación de responsabilidades. A continuación se detalla la estructura de carpetas y archivos principales que se refleja en el directorio ```src/```:

estructura basica del proyecto 
```
QuickStock/
│
├── src/                    → Código fuente principal de la aplicación (MVC)
│   ├── api/                → Carpeta reservada para lógica de comunicación con servicios externos (vacía por ahora)
│   │
│   ├── assets/             → Recursos reutilizables para el frontend
│   │   ├── bootstrap/      → Archivos de Bootstrap locales
│   │   │   ├── css/        → Estilos base de Bootstrap
│   │   │   ├── js/         → Scripts JS de Bootstrap (offcanvas, tooltips, etc.)
│   │   │   └── icons/      → Iconos de Bootstrap locales   
│   │   ├── icons/          → Iconos SVG utilizados en la interfaz
│   │   │   ├── QuickStock-logos           → Logotipos principales
│   │   │   └── QuickStock-logos-circular  → Variante circular del logotipo
│   │   ├── images/         → Imágenes generales del proyecto
│   │   └── elements/       → Elementos PHP repetitivos del frontend
│   │       ├── header.php
│   │       ├── footer.php
│   │       ├── menu_volver.php
│   │       ├── menu-lateral.php
│   │       ├── menu-lateral-gerente.php
│   │       └── scripts.php
│   │
│   ├── config/             → Archivos de configuración
│   │   ├── APP.php         → Constantes globales (nombres, rutas, etc.)
│   │   ├── SERVER.php      → Credenciales y claves sensibles. ⚠️ **No modificar sin autorización**
│   │   └── quickstock.sql  → Script de inicialización de base de datos
│   │
│   ├── controller/         → Controladores
│   │   └── vista_controller.php → Controlador principal que gestiona la carga de vistas
│   │
│   ├── docs/               → Documentación técnica y notas internas
│   │   ├── diagrams/       → Diagramas técnicos del sistema
│   │   │   ├── current_system/   → Diagramas del sistema actual
│   │   │   └── proposed_system/  → Diagramas del sistema propuesto
│   │   ├── Changelog.md         → Historial de cambios del proyecto
│   │   ├── Contributing.md      → Guía para colaboradores
│   │   ├── estructura_proyecto.md → Detalle técnico de la arquitectura
│   │   ├── LICENSE.md           → Licencia de uso del proyecto
│   │   ├── manual.desarrollador.md → Manual técnico para desarrolladores
│   │   └── todo.md              → Lista de tareas pendientes
│   │
│   ├── model/              → Modelos (lógica de negocio y datos)
│   │   ├── mainModel.php   → Modelo base con métodos comunes
│   │   └── vista_model.php → Modelo que determina qué vista cargar. ⚠️ **No modificar sin comprender la herencia**
│   │
│   ├── shared/             → Recursos compartidos entre módulos
│   │   ├── traits/         → Traits PHP para reutilización de lógica
│   │   └── helpers/        → Helpers JS para reutilizar logica
│   ├── view/               → Vistas (presentación)
│   │   ├── css/            → Estilos personalizados por vista
│   │   ├── html/           → Vistas estáticas
│   │   ├── js/             → Scripts específicos por vista
│   │   └── plantilla.php   → Plantilla base para renderizado visual
│   │
│   ├── .htaccess           → Configuración de Apache (URLs amigables). ⚠️ **No modificar sin conocimiento técnico**
│   └── index.php           → Punto de entrada principal. ⚠️ **No modificar sin revisar el flujo MVC**
│
├── vendor/                 → Dependencias gestionadas por Composer. ⚠️ **No modificar manualmente**
├── .gitignore              → Exclusiones para control de versiones
├── composer.json           → Declaración de paquetes y configuración de Composer. ⚠️ **No modificar sin revisar compatibilidad**
├── composer.lock           → Registro exacto de versiones instaladas. ⚠️ **No modificar manualmente**
└── README.md               → Descripción general del proyecto (este archivo)

```

## 📌 Notas adicionales

- Este proyecto sigue el patrón **MVC** (Modelo-Vista-Controlador).

- Los archivos marcados con ⚠️ deben ser modificados solo por usuarios con conocimiento técnico o autorización explícita.

- La carpeta `docs/diagrams/` contiene diagramas técnicos generados con herramientas como Draw.io o Code.viz..

- Los recursos en `shared/` permiten reutilizar lógica transversal entre modelos y controladores.
