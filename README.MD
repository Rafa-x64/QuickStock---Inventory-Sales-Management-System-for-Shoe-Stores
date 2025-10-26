# Sistema de Gestión de Inventario en PHP (MVC)

Aplicación web modular desarrollada bajo el patrón **Modelo-Vista-Controlador (MVC)**, diseñada para facilitar la administración eficiente de inventario en entornos escalables y mantenibles. Este sistema permite separar la lógica de negocio, la presentación y el control de flujo, garantizando una arquitectura clara, reutilizable y segura.

---

## Características principales

- **Arquitectura modular** con controladores, modelos y vistas independientes
- **Carga dinámica de vistas** mediante rutas limpias y control centralizado
- **Sistema de plantillas** con includes reutilizables para encabezado, pie y scripts
- **Validación de rutas** con manejo automático de errores (`404-view.php`)
- **Estilo responsivo y adaptable** con Bootstrap 5 y Offcanvas para navegación lateral
- **Control de inventario en tiempo real**, con vistas como `inicio`, `registro`, `inicio-sesion`
- **Sistema preparado para escalabilidad**, ideal para negocios pequeños o medianos

---
## Tareas

Para ver la **Estructura Completa de Tareas y Pendientes**, visita nuestro [Tablero Kanban aquí ➡️](.kanbn/index.md).

---


## Inicio rápido

Este repositorio corresponde al sistema QuickStock, una aplicación web modular desarrollada en PHP bajo el patrón MVC. Su estructura está diseñada para facilitar la mantenibilidad, escalabilidad y claridad técnica en entornos de desarrollo profesional.

Para conocer el flujo de trabajo, convenciones internas y recomendaciones de implementación, consulta el [manual del desarrollador ➡️](/src/docs/manual_desarrollador.md).

---

## Tecnologías Principales

El proyecto está construido con un stack moderno y enfocado en la seguridad y la modularidad.

| Componente    | Versión / Propósito                   |
| :------------ | :------------------------------------ |
| **PHP**       | 8.0+ (POO, modularidad)               |
| **Composer**  | Gestión de dependencias y autoloading |
| **Bootstrap** | 5 (Estilos y diseño responsivo)       |
| **PDO**       | Acceso seguro a Bases de Datos        |
| **Apache**    | Reescritura de URLs con `.htaccess`   |
| **OpenSSL**   | Encriptación de datos sensibles       |

---

## Instalación y Configuración

Sigue estos pasos para poner en marcha el proyecto en tu entorno local. Requisitos mínimos: PHP 8.0+, Apache y Composer.

### 1. Preparar el entorno de desarrollo

Ubica el directorio raíz de tu servidor web (por ejemplo, `htdocs` en XAMPP) y crea la siguiente estructura:

```bash
cd xampp/htdocs
mkdir -p DEV/PHP
cd DEV/PHP
```

### 2. Clonar el repositorio
Clona el proyecto en la carpeta creada:

```bash
git clone https://github.com/Rafa-x64/QuickStock---Inventory-Sales-Management-System-for-Shoe-Stores.git
cd QuickStock
git init
git remote add origin https://github.com/Rafa-x64/QuickStock---Inventory-Sales-Management-System-for-Shoe-Stores.git
git switch master
git pull origin master
```
### 3. Instalar dependencias
Ejecuta Composer para instalar las librerías necesarias:

> 💡 Presiona ctrl + ñ para abrir el terminal integrado o abre la terminal en la carpeta raiz del proyecto 

```bash
composer install
```

### 4. Verificar configuración de Apache
Asegúrate de que el módulo mod_rewrite esté habilitado y que el archivo .htaccess esté siendo interpretado correctamente. Esto es necesario para la reescritura de URLs.

### 5. Configurar base de datos (MySQL, phpMyAdmin)

Importa el archivo src/config/quickstock.sql en tu gestor de base de datos (por ejemplo, phpMyAdmin) y ajusta las credenciales en src/config/SERVER.php según tu entorno local.

> 💡 En caso de utilizar **PostgreSQL** como manejador de base de datos, sigue estos pasos adicionales:

#### a. Importar la base de datos

Utiliza tu gestor de base de datos (por ejemplo, pgAdmin o la terminal) para importar el archivo `src/config/quickstock.sql` a tu instancia de PostgreSQL. Asegúrate de crear previamente la base de datos con el nombre correspondiente.

```bash
psql -U tu_usuario -d nombre_base_datos -f src/config/quickstock.sql
```

#### b. Modificar la conexión en el código

Edita el archivo src/config/SERVER.php para adaptar la conexión a PostgreSQL utilizando pg_connect. Asegúrate de que el formato sea compatible. Ejemplo:

```php
define('DB_CONNECTION', pg_connect("host=localhost port=5432 dbname=nombre_base_datos user=tu_usuario password=tu_clave"));
```

> 💡 Por lo general el usuario por defecto es 'postgres' y en caso de no haber configurado una contraseña se omite el campo 'password=' del DSN

#### c. Validar compatibilidad
Verifica que los modelos y funciones que interactúan con la base de datos estén adaptados para PostgreSQL. Si originalmente fueron escritos para MySQL (por ejemplo, usando mysqli_* o PDO con mysql:), será necesario refactorizar las llamadas para usar funciones compatibles con pg_*.

#### d. Revisión adicional
Asegúrate de que los tipos de datos en el script SQL sean compatibles con PostgreSQL.

Revisa el uso de comillas, funciones específicas (NOW(), AUTO_INCREMENT, etc.) y sintaxis de claves primarias/foráneas.

---


## Estructura del Proyecto (MVC)

El núcleo del sistema sigue el patrón **Modelo-Vista-Controlador (MVC)**, garantizando la separación de responsabilidades:

| Carpeta         | Rol dentro del MVC     | Descripción                                                                 |
| :-------------- | :--------------------- | :-------------------------------------------------------------------------- |
| `controller/`   | **Controlador (C)**    | Gestiona el flujo de la aplicación e invoca las vistas según la URL.        |
| `model/`        | **Modelo (M)**         | Lógica de negocio, conexión a la base de datos, encriptación y validaciones.|
| `view/`         | **Vista (V)**          | Archivos de presentación: HTML, CSS, JS y plantilla base.                   |
| `assets/`       | **Recursos visuales**  | Bootstrap, componentes, imágenes, iconos y elementos PHP reutilizables.     |
| `shared/`       | **Lógica compartida**  | Traits PHP reutilizables entre modelos y controladores.                     |
| `config/`       | **Configuración**      | Constantes globales, credenciales y script de base de datos.                |
| `docs/`         | **Documentación**      | Manuales técnicos, changelog, estructura y diagramas del sistema.           |

### Referencia a estructura del proyecto

>[Estructura del proyecto ➡️](src/docs/estructura_proyecto.md)

---

## Contribución

**¡Las contribuciones son bienvenidas!** Para colaborar en el desarrollo:

1.  Clona el repositorio y crea una rama a partir de `master`: 

```bash
git checkout -b feature/nombre-funcionalidad
```

2.  Sigue las **Convenciones de Desarrollo**.
3.  Asegúrate de que tus cambios pasen las pruebas.
4.  Realiza un `commit` descriptivo y abre un **Pull Request (PR)**.
``` bash
git add .
git commit -m "commit descriptivo"
```

5. Borrar la rama que creaste luego de hacer pull request con:

```bash
git branch -D feature/nombre-funcionalidad
```

### Referencia a Guia de contribucion

>[Contributing.md ➡️](src/docs/Contributing.md)

---

## Seguridad

La seguridad es una prioridad. Por favor, asegúrate de:

* Usar siempre **consultas preparadas (PDO)** para interactuar con la base de datos.
* **Hashear contraseñas** con `password_hash`.
* **No modificar** archivos críticos como `config/SERVER` o `.htaccess`.

---

## Licencia

Este proyecto está bajo la Licencia **MIT** - ver el archivo [LICENSE.md ➡️](src/docs/LICENSE.MD) para más detalles.
