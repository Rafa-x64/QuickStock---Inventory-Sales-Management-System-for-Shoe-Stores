<!-- Manual de desarrollador completo para QuickStock -->
# Manual de Desarrollador — QuickStock

> Versión: 1.0
> Ruta base del proyecto: `c:\xampp\htdocs\DEV\PHP\QuickStock\src`

**Índice**
- [Manual de Desarrollador — QuickStock](#manual-de-desarrollador--quickstock)
  - [1. Introducción general](#1-introducción-general)
  - [2. Arquitectura del sistema](#2-arquitectura-del-sistema)
  - [3. Entorno de desarrollo](#3-entorno-de-desarrollo)
  - [4. Estructura del proyecto](#4-estructura-del-proyecto)
  - [5. Flujo completo: vistas, controlador y plantilla](#5-flujo-completo-vistas-controlador-y-plantilla)
  - [6. Peticiones Front → API (api/client → api/server/index.php)](#6-peticiones-front--api-apiclient--apiserverindexphp)
  - [7. Consultas a la base de datos desde `api/server` y formato de respuesta](#7-consultas-a-la-base-de-datos-desde-apiserver-y-formato-de-respuesta)
  - [8. Validaciones: `view/js/*.js` y validación backend](#8-validaciones-viewjsjs-y-validación-backend)
  - [9. Cómo crear un Modelo, una Vista y un Controlador (MVC local)](#9-cómo-crear-un-modelo-una-vista-y-un-controlador-mvc-local)
  - [10. Modificar/Importar la base de datos (pgAdmin4)](#10-modificarimportar-la-base-de-datos-pgadmin4)
  - [11. Buenas prácticas y checklist de despliegue](#11-buenas-prácticas-y-checklist-de-despliegue)
  - [12. Anexos: ejemplos de código y comandos útiles](#12-anexos-ejemplos-de-código-y-comandos-útiles)

---

## 1. Introducción general

Breve: este manual amplía la documentación técnica y muestra patrones prácticos para que un desarrollador nuevo entienda, extienda y despliegue QuickStock.

Audiencia: desarrolladores PHP/JS que trabajarán con la base de código del repositorio.

---

## 2. Arquitectura del sistema

- Monolito con organización estilo MVC: `controller/`, `model/`, `view/`.
- Punto de entrada frontal: `index.php` (instancia `vista_controller`).
- API JSON centralizado en `api/server/index.php` (recibe JSON con `accion` y parámetros).
- Persistencia: PostgreSQL accedido por funciones `pg_*` desde clases en `model/` o funciones en `api/server/*`.

---

## 3. Entorno de desarrollo

- Recomendado: PHP 8+, PostgreSQL 12+, Apache (XAMPP) en Windows.
- Variables sensibles en `.env` (usar `.env.example` como plantilla).
- Conexión a BD centralizada en `config/SERVER.php` (constante `PostgreSQL`) o adaptar para usar dotenv.

Pasos rápidos (PowerShell):
```powershell
# Crear base de datos y cargar dump (si psql está en PATH)
psql -U postgres -d postgres -c "CREATE DATABASE \"QuickStock\";"
psql -U postgres -d QuickStock -f "C:/xampp/htdocs/DEV/PHP/QuickStock/src/config/quickstock.sql"
```

---

## 4. Estructura del proyecto

- `index.php` — front controller que instancia `vista_controller`.
- `controller/` — controladores de vistas (p.ej. `empleados_listado_C.php`).
- `model/` — clases y funciones para acceder a la BD (extienden `mainModel`).
- `view/` — plantillas y vistas (`plantilla.php`, `html/*.php`, `js/*`).
- `api/client/` — scripts JS que realizan peticiones a `api/server/index.php`.
- `api/server/` — funciones PHP que atienden las acciones y devuelven arrays/JSON.
- `config/` — scripts de BD y constantes (ej. `SERVER.php`).

Convención importante: todas las vistas públicas terminan en `-view.php` (ej. `inventario-ver-productos-view.php`).

---

## 5. Flujo completo: vistas, controlador y plantilla

Descripción paso a paso del flujo principal cuando se carga una página:

1. El usuario solicita una URL como `http://.../src/?page=inventario-ver-productos`.
2. `index.php` instancia `vista_controller`.
3. `vista_controller` toma `$_GET['page']` y decide la vista a cargar:
	 - Normaliza el nombre (seguridad: sanitize el string).
	 - Comprueba si existe un archivo en `view/html/<page>-view.php`.
	 - Si existe, delega a `vista_model` para cargar la `plantilla.php` con la vista.
	 - Si no existe, carga `view/html/404-view.php`.

4. `vista_model` prepara cualquier dato necesario (ejecuta llamadas a modelos si la vista requiere datos) y pasa esos datos a la `plantilla.php`.
5. `plantilla.php` contiene el layout (header, footer, menú lateral) y un lugar donde incluir la vista concreta:
	 - Ej. `require_once __DIR__ . '/html/' . $viewFile;`
	 - `plantilla.php` también incluye `elements/header.php`, `elements/menu-lateral.php`, y `elements/footer.php` según permisos.
6. La vista `*-view.php` ejecuta su propio PHP para pintar datos provistos por `vista_model` y enlaza scripts JS específicos (`view/js/...` o `api/client/...`).

Ejemplo simplificado de `vista_controller` (pseudo-PHP):
```php
// controller/vista_controller.php
class vista_controller {
	public function cargarVista(){
		$page = $_GET['page'] ?? 'inicio-view';
		$page = basename($page); // seguridad
		$file = __DIR__ . '/../view/html/' . $page . '-view.php';
		if(file_exists($file)){
			// pasa control a model para preparar datos
			$model = new vista_model();
			$data = $model->prepararDatosPara($page);
			include __DIR__ . '/../view/plantilla.php';
		} else {
			include __DIR__ . '/../view/html/404-view.php';
		}
	}
}
```

Notas:
- Todas las vistas deben terminar en `-view.php` para mantener la convención.
- Cualquier lógica de negocio (consultas SQL, validaciones complejas) debe estar en `model/` o `controller/`, no en la vista.

---

## 6. Peticiones Front → API (api/client → api/server/index.php)

Patrón general usado en el proyecto:

- El frontend usa archivos JS dentro de `api/client/` o `view/js/` para construir un objeto JSON con una propiedad `accion` y otros parámetros.
- Envío: `fetch()` o `XMLHttpRequest` hacia `api/server/index.php` con `Content-Type: application/json`.
- `api/server/index.php` ejecuta `json_decode(file_get_contents('php://input'), true)` y hace un `switch($accion)` para llamar a la función apropiada.

Ejemplo de petición desde `api/client/inventario-ver-productos.js`:
```javascript
import { api } from "/DEV/PHP/QuickStock/src/api/client/index.js";

// 📦 OBJETO GLOBAL PARA GUARDAR EL ESTADO DE LOS FILTROS
let filtrosActivos = {
    nombre: "",
    codigo: "",
    categoria: "",
    proveedor: "",
    sucursal: "",
    estado: "" // Valores posibles: "", "true", "false"
};

// 🔄 FUNCIÓN REUTILIZABLE PARA CARGAR PRODUCTOS APLICANDO LOS FILTROS
function cargarProductos() {
    // La función 'api' enviará 'filtrosActivos' como parámetros GET/POST al index.php
    api({
        accion: "obtener_todos_los_productos",
        ...filtrosActivos // Despliega todos los filtros como parámetros de la petición
    }).then(res => {
        const tabla = document.getElementById("tabla_productos");
        tabla.innerHTML = ""; // Limpia la tabla antes de cargar nuevos datos
        const productos = res.data || [];

        if (productos.length === 0) {
            tabla.innerHTML = '<tr><td colspan="11" class="text-center">No se encontraron productos con estos filtros.</td></tr>';
            return;
        }

        // Mapeo y renderizado de las filas (sin cambios en la lógica de renderizado)
        productos.forEach(prod => {
            const estadoTexto = prod.estado == 1 || prod.estado === "t"
                ? '<span class="badge text-bg-success">Activo</span>'
                : '<span class="badge text-bg-danger">Inactivo</span>';

            const fila = document.createElement("tr");
            fila.innerHTML = `
                <td>${prod.codigo ?? '-'}</td>
                <td>${prod.nombre ?? '-'}</td>
                <td>${prod.categoria_nombre ?? '-'}</td>
                <td>${prod.talla ?? '-'}</td>
                <td>${prod.precio_compra ?? '-'}</td>
                <td>${prod.precio_venta ?? '-'}</td>
                <td>${prod.stock ?? 0}</td>
                <td>${prod.sucursal_nombre ?? 'Sin sucursal'}</td>
                <td>${estadoTexto}</td>
                <td class="text-center">
                    <div class="container-fluid p-0">
                        <div class="row g-1">
                            <div class="col-6">
                                <form action="inventario-editar-producto" method="POST" class="d-inline">
                                    <input type="hidden" name="accion" value="editar">
                                    <input type="hidden" name="id_producto" value="${prod.id_producto}">
                                    <input type="submit" class="btn btn-warning btn-sm w-100" value="Editar">
                                </form>
                            </div>
                            <div class="col-6">
                                <form action="" method="POST" class="d-inline">
                                    <input type="hidden" name="accion" value="eliminar">
                                    <input type="hidden" name="id_producto" value="${prod.id_producto}">
                                    <input type="submit" class="btn btn-danger btn-sm w-100" value="Eliminar">
                                </form>
                            </div>
                            <div class="col-12">
                                <form action="inventario-detalle-producto" method="POST" class="d-inline">
                                    <input type="hidden" name="accion" value="ver_detalle">
                                    <input type="hidden" name="id_producto" value="${prod.id_producto}">
                                    <input type="submit" class="btn btn-primary btn-sm w-100" value="Ver detalle">
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            `;
            tabla.appendChild(fila);
        });
    }).catch(error => {
        console.error("Error al cargar productos:", error);
        document.getElementById("tabla_productos").innerHTML = '<tr><td colspan="11" class="text-center text-danger">Error al cargar los datos.</td></tr>';
    });
}

// 🎛️ FUNCIÓN PARA INICIALIZAR EVENTOS DE FILTRO
function inicializarFiltros() {
    // Función auxiliar para adjuntar eventos a selects e inputs
    const addEventListener = (id, eventType, filterKey) => {
        const element = document.getElementById(id);
        if (element) {
            element.addEventListener(eventType, (e) => {
                filtrosActivos[filterKey] = e.target.value.trim();
                cargarProductos();
            });
        }
    };

    // Filtros de texto (Input event para una búsqueda rápida)
    addEventListener("filtro_nombre", "input", "nombre");
    addEventListener("filtro_codigo", "input", "codigo");

    // Filtros de Select (Change event)
    addEventListener("filtro_sucursal", "change", "sucursal");
    addEventListener("filtro_categoria", "change", "categoria");
    addEventListener("filtro_proveedor", "change", "proveedor");
    addEventListener("filtro_estado", "change", "estado");

    // 🗑️ BOTÓN REESTABLECER FILTROS (ID CORREGIDO: "btn-reestablecer")
    document.getElementById("btn-reestablecer")?.addEventListener("click", () => {
        // 1. Resetear el objeto de filtros
        filtrosActivos = {
            nombre: "",
            codigo: "",
            categoria: "",
            proveedor: "",
            sucursal: "",
            estado: ""
        };

        // 2. Resetear los valores de los elementos de la vista
        document.getElementById("filtro_nombre").value = "";
        document.getElementById("filtro_codigo").value = "";

        // Asignar el valor de la opción por defecto ("") a los selects
        document.getElementById("filtro_categoria").value = "";
        document.getElementById("filtro_proveedor").value = "";
        document.getElementById("filtro_sucursal").value = "";
        document.getElementById("filtro_estado").value = "";

        // 3. Recargar productos sin filtros
        cargarProductos();
    });
}

// ⚙️ FUNCIÓN PARA CARGAR OPCIONES DINÁMICAS EN LOS SELECTS
function cargarOpcionesSelects() {
    // Función auxiliar para cargar opciones
    const cargarOpciones = (selectId, accionApi, valueKey, textKey, resKey) => {
        const select = document.getElementById(selectId);
        if (!select) return;

        api({ accion: accionApi }).then(res => {
            // Manejar diferentes estructuras de respuesta (res.filas, res.categorias, res.proveedores)
            const data = res[resKey] || res.filas || [];
            data.forEach(item => {
                const op = document.createElement("option");
                op.value = item[valueKey];
                op.textContent = item[textKey];
                select.appendChild(op);
            });
        }).catch(error => {
            console.error(`Error al cargar ${selectId}:`, error);
        });
    };

    cargarOpciones("filtro_sucursal", "obtener_sucursales", "id_sucursal", "nombre", "filas");
    cargarOpciones("filtro_categoria", "obtener_categorias", "id_categoria", "nombre", "categorias");
    cargarOpciones("filtro_proveedor", "obtener_proveedores", "id_proveedor", "nombre", "proveedores");
}

// 🚀 CUANDO CARGA LA PÁGINA
document.addEventListener("DOMContentLoaded", () => {
    cargarOpcionesSelects(); // Llenar los selects
    inicializarFiltros();    // Configurar los listeners
    cargarProductos();       // Cargar la lista inicial de productos
});
```

Ejemplo de `api/server/index.php` (simplificado):
```php
session_start();
$peticion = json_decode(file_get_contents('php://input'), true);
$accion = $peticion['accion'] ?? null;
include_once __DIR__ . '/index.functions.php';

switch($accion) {
	case 'obtener_todos_los_productos':
		include __DIR__ . '/inventario/producto.php';
		$out = obtenerTodosLosProductos(
			$peticion['nombre'] ?? null,
			$peticion['codigo'] ?? null,
			$peticion['categoria'] ?? null,
			$peticion['proveedor'] ?? null,
			$peticion['sucursal'] ?? null,
			$peticion['estado'] ?? null
		);
		break;
	// otras acciones...
	default:
		$out = ['error' => 'Accion no reconocida'];
}

echo json_encode($out);
```

Puntos clave:
- Siempre devolver estructuras JSON consistentes: `{ status, data }` o `{ error, message }`.
- Validar y sanitizar los parámetros entrantes antes de usarlos en consultas.

---

## 7. Consultas a la base de datos desde `api/server` y formato de respuesta

Buenas prácticas ya aplicadas en el repo:

- Uso de `conectar_base_datos()` (ver `api/server/index.functions.php`) para obtener conexión `pg_connect`.
- Uso de `pg_prepare` / `pg_execute` o `pg_query_params` para evitar inyección SQL.

Ejemplo de función en `api/server/inventario/producto.php` que consulta la BD y devuelve un array:
```php
function obtenerTodosLosProductos($nombre=null, $codigo=null, $categoria=null, $proveedor=null, $sucursal=null, $estado=null){
	$conn = conectar_base_datos();
	$clauses = []; $params = []; $i = 1;
	if($nombre){ $clauses[] = "p.nombre ILIKE $".$i; $params[] = "%$nombre%"; $i++; }
	// ... construir WHERE dinámico similar al ejemplo existente ...
	$sql = "SELECT p.id_producto, p.nombre FROM inventario.producto p WHERE " . implode(' AND ', $clauses);
	$stmt = 'stmt_' . uniqid();
	pg_prepare($conn, $stmt, $sql);
	$res = pg_execute($conn, $stmt, $params);
	if(!$res) return ['status'=>'error','message'=>pg_last_error($conn)];
	$rows = pg_fetch_all($res) ?: [];
	return ['status'=>'success','data'=>$rows];
}
```

Cómo estructurar la respuesta:
- `['status'=>'success','data'=>[...] ]` en caso OK.
- `['status'=>'error','message'=>'...', 'detalle'=>'...']` en caso de error (ocultar `detalle` en producción).

---

## 8. Validaciones: `view/js/*.js` y validación backend

Estrategia de validación en dos capas:

1. Validación Frontend (`view/js/archivo.js` o `api/client/archivo.js`):
	 - Validaciones UX: campos obligatorios, formatos básicos (email, número), longitudes.
	 - Mostrar errores con Bootstrap: añadir `.is-invalid` al campo y llenar `.invalid-feedback`.
	 - Evitar enviar peticiones inválidas al servidor (mejora UX y reduce tráfico).

Ejemplo de frontend:
```javascript
function validarFormularioProducto(form){
	const nombre = form.querySelector('[name="nombre"]').value.trim();
	const precio = parseFloat(form.querySelector('[name="precio"]').value);
	const errores = [];
	if(!nombre) errores.push('Nombre requerido');
	if(isNaN(precio) || precio <= 0) errores.push('Precio inválido');
	return errores;
}

form.addEventListener('submit', async (e) => {
	e.preventDefault();
	const errores = validarFormularioProducto(e.target);
	if(errores.length) { mostrarErrores(errores); return; }
	// enviar petición a api/server/index.php
});
```

2. Validación Backend (obligatoria):
	 - Siempre volver a validar todo en `controller`/`api/server` y en `model` antes de insertar/actualizar.
	 - Comprobar tipos, rangos, unicidad y permisos del usuario.

Ejemplo en PHP (server/model):
```php
if(empty($data['nombre'])) return ['status'=>'error','message'=>'Nombre requerido'];
if(!is_numeric($data['precio']) || $data['precio'] <= 0) return ['status'=>'error','message'=>'Precio inválido'];
// luego ejecutar prepared statement
```

---

## 9. Cómo crear un Modelo, una Vista y un Controlador (MVC local)

Plantilla mínima para crear cada componente:

- Modelo: `model/nuevo_modelo.php`
	- Debe extender `mainModel` si necesita conexión compartida.
	- Implementar métodos: `crear()`, `editar()`, `eliminar()`, `buscar()`.

Ejemplo:
```php
// model/producto_model.php
class ProductoModel extends mainModel {
	public static function listarProductos($filtros = []){
		$conn = parent::conectar_base_datos();
		$sql = 'SELECT * FROM inventario.producto ORDER BY id_producto';
		$res = pg_query($conn, $sql);
		return pg_fetch_all($res) ?: [];
	}
}
```

- Controlador: `controller/producto_C.php`
	- Recibe POST/GET de la vista, valida, usa el modelo y redirige o devuelve JSON.

Ejemplo:
```php
// controller/producto_C.php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$data = $_POST; // o json_decode(file_get_contents('php://input'), true)
	// validar
	$id = ProductoModel::crear($data);
	header('Location: ?page=inventario-ver-productos');
}
```

- Vista: `view/html/inventario-añadir-producto-view.php`
	- Archivo que contiene el HTML del formulario y enlaza el JS necesario.

Ejemplo (esqueleto):
```php
<form id="formProducto">
	<input name="nombre" />
	<input name="precio" />
	<button type="submit">Guardar</button>
</form>
<script src="/DEV/PHP/QuickStock/src/view/js/inventario-añadir-producto.js"></script>
```

Integración con `plantilla.php`:
- `plantilla.php` debe exponer una variable `$data` o similar, y hacer `require` de la vista correspondiente.

---

## 10. Modificar/Importar la base de datos (pgAdmin4)

Importar `config/quickstock.sql` en pgAdmin4:

1. Abrir pgAdmin4 y conectar al servidor PostgreSQL.
2. Crear nueva base de datos `QuickStock` (clic derecho → Create → Database).
3. Seleccionar la base de datos, ir a la pestaña "Query Tool".
4. Cargar el archivo SQL (`Open File`) o usar el comando `
	 \i 'C:/ruta/a/quickstock.sql'` en la consola psql.

También se puede usar `psql` desde PowerShell:
```powershell
psql -U postgres -d QuickStock -f "C:/xampp/htdocs/DEV/PHP/QuickStock/src/config/quickstock.sql"
```

Si haces cambios en el esquema:
- Mantén migraciones en `config/migrations/` y actualiza `config/quickstock.sql` con el snapshot.

---

## 11. Buenas prácticas y checklist de despliegue

- Validar cambios en un entorno de staging antes de producción.
- Hacer backup de la base de datos antes de correr migraciones.
- Ejecutar tests automatizados y revisar logs.

Checklist mínimo antes de merge/despliegue:
- [ ] Tests locales pasan
- [ ] Migraciones listas y probadas
- [ ] Backup de la BD tomado
- [ ] Documentación (manual y cambios de BD) actualizada

---

## 12. Anexos: ejemplos de código y comandos útiles

- Ejemplo cURL para llamar al endpoint central:
```bash
curl -X POST "http://localhost/DEV/PHP/QuickStock/src/api/server/index.php" \
	-H "Content-Type: application/json" \
	-d '{"accion":"obtener_todos_los_productos","nombre":"camisa"}'
```

- Ejemplo de respuesta consistente (JSON):
```json
{ "status": "success", "data": [ { "id_producto": 1, "nombre": "Camisa" } ] }
```

---

Si quieres, guardo ahora este archivo y puedo también:
- Generar ejemplos concretos por cada acción en `api/server/index.php` (documentar parámetros y respuestas).
- Añadir diagramas MER (archivo SVG/PNG) bajo `docs/diagrams/` si me das permiso para crear imágenes.

Fin del manual.

