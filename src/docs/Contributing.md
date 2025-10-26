## 🧩 Estructura profesional de trabajo colaborativo

---

### 1. Ramas temporales por funcionalidad

Cada colaborador debe trabajar en una **rama temporal y descriptiva**, basada en `main`.

**Ejemplo:**

```bash
git checkout main
git pull origin main
git checkout -b feat/login-form
```
| Prefijo     | Propósito                                       | Descripción                                                                                              |
| :---------- | :---------------------------------------------- | :------------------------------------------------------------------------------------------------------- |
| `feat/`     | Nueva funcionalidad                             | Implementación de una nueva característica o mejora.                                                     |
| `fix/`      | Corrección de errores                           | Solución a un error de comportamiento en el código.                                                      |
| `refactor/` | Reestructuración sin cambio funcional           | Cambios en el código que no alteran su lógica ni su funcionalidad externa (p. ej., renombrar variables). |
| `hotfix/`   | Corrección crítica en producción                | Corrección urgente y crítica aplicada directamente a la rama principal/producción.                       |
| `docs/`     | Cambios en documentación                        | Adición o modificación de archivos de documentación (`README.md`, manuales, comentarios, etc.).          |
| `test/`     | Creación o corrección de pruebas                | Adición o modificación de pruebas unitarias o de integración.                                            |
| `style/`    | Ajustes de formato                              | Cambios que no afectan la lógica del código (espacios, indentación, punto y coma, etc.).                 |
| `chore/`    | Mantenimiento o configuración                   | Tareas de mantenimiento general, como actualizar dependencias o cambios en configuración del proyecto.   |
| `perf/`     | Mejoras de rendimiento                          | Cambios de código que optimizan la velocidad o eficiencia.                                               |
| `ci/`       | Cambios en integración continua                 | Modificaciones en archivos de configuración de CI (p. ej., Jenkins, GitHub Actions).                     |
| `build/`    | Cambios en scripts de compilación o empaquetado | Modificaciones en *scripts* de *build*, herramientas externas o dependencias de compilación.             |

---

### 2. Mantener la rama main actualizada
- Antes de crear una rama o hacer un merge, sincroniza con main:

```bash
git checkout main
git pull origin main
```

- Para actualizar tu rama temporal con los últimos cambios:

```bash
git checkout feat/login-form
git fetch origin
git rebase origin/main
```

- Si hay conflictos:

```bash
git add .
git rebase --continue
```

---

### 3. Subir cambios y evitar sobrescribir trabajo ajeno

Nunca hagas push `--force a ramas` compartidas. Para subir tu rama:

```bash
git push origin feat/login-form
```

---

## 4. Crear Pull Request en GitHub

1. Ve al repositorio en GitHub.

2. Haz clic en "Compare & pull request".

3. Escribe un título claro y una descripción que incluya:

   - Qué se hizo

   - Por qué se hizo

   - Cómo probarlo

4. Asigna revisores si aplica.

5. Haz clic en "Create pull request".

---

### 5. Revisión y aceptación de Pull Request

a. Revisión técnica
Verifica que la rama esté actualizada con main.

> Revisa estilo, seguridad y lógica.

> Ejecuta pruebas locales si aplica.

b. Revisar PR localmente

```bash
git fetch origin pull/ID/head:pr-branch
git checkout pr-branch
```

> Reemplaza ID con el número del PR.

c. Merge profesional

```bash
git checkout main
git pull origin main
git merge --squash feat/login-form
git commit -m "feat: login form implementation"
git push origin main
```

---

### 6. Limpieza post-merge

Una vez aceptado el PR:

```
bash
git switch master
git branch -D feat/login-form
git pull origin master
```

---

### 7. Convención de mensajes de commit
Formato: <tipo>(ámbito opcional): <descripción breve>

| Tipo       | Propósito                             | Ejemplo                                          |
| :--------- | :------------------------------------ | :----------------------------------------------- |
| `feat`     | Nueva característica                  | `feat: agregar validación de email en registro`  |
| `fix`      | Corrección de error                   | `fix(login): corregir error de credenciales`     |
| `docs`     | Documentación                         | `docs: actualizar guía de contribución`          |
| `style`    | Formatos                              | `style: aplicar formato de prettier`             |
| `refactor` | Reestructuración sin cambio funcional | `refactor: modularizar componente de perfil`     |
| `test`     | Pruebas                               | `test: agregar tests unitarios para modelo User` |
| `chore`    | Mantenimiento/configuración           | `chore(deps): actualizar versión de Bootstrap`   |
| `perf`     | Rendimiento                           | `perf: optimizar carga de dashboard`             |
| `ci`       | Integración continua                  | `ci: configurar workflow de GitHub Actions`      |
| `build`    | Scripts de compilación                | `build: agregar script de empaquetado`           |

---

Reglas clave:

- Usar el verbo en **modo imperativo**: por ejemplo, `agregar validación`, no `agregué validación`.
- La primera línea del commit debe tener **menos de 50 caracteres**.
- No usar punto final en el asunto del commit.
- Si se requiere más detalle, agregar una segunda línea separada por un salto de línea.
- Evitar mensajes genéricos como `update`, `cambios`, `arreglos`.

---

## 📦 Comandos clave resumen

| Acción                   | Comando                                      |
| :----------------------- | :------------------------------------------- |
| Crear rama temporal      | `git checkout -b feat/nombre`                |
| Actualizar rama con main | `git fetch origin && git rebase origin/main` |
| Subir cambios            | `git push origin feat/nombre`                |
| Revisar PR localmente    | `git fetch origin pull/ID/head:pr-branch`    |
| Hacer merge limpio       | `git merge --squash feat/nombre`             |
| Eliminar rama local      | `git branch -d feat/nombre`                  |
| Sincronizar main         | `git checkout main && git pull origin main`  |
