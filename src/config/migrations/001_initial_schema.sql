-- Migración inicial (esqueleto) para PostgreSQL
-- Revisa y adapta los tipos, constraints y nombres según tu `config/quickstock.sql`

BEGIN;

-- Schema core
CREATE SCHEMA IF NOT EXISTS core;

CREATE TABLE IF NOT EXISTS core.categoria (
    id_categoria SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255),
    id_categoria_padre INT NULL,
    activo BOOLEAN DEFAULT TRUE
);

CREATE TABLE IF NOT EXISTS core.color (
    id_color SERIAL PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    activo BOOLEAN DEFAULT TRUE
);

CREATE TABLE IF NOT EXISTS core.talla (
    id_talla SERIAL PRIMARY KEY,
    rango_talla VARCHAR(20) NOT NULL,
    activo BOOLEAN DEFAULT TRUE
);

CREATE TABLE IF NOT EXISTS core.proveedor (
    id_proveedor SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    contacto VARCHAR(255),
    telefono VARCHAR(50),
    activo BOOLEAN DEFAULT TRUE
);

CREATE TABLE IF NOT EXISTS core.sucursal (
    id_sucursal SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    direccion TEXT,
    telefono VARCHAR(50),
    rif VARCHAR(50),
    activo BOOLEAN DEFAULT TRUE
);

-- Schema seguridad_acceso
CREATE SCHEMA IF NOT EXISTS seguridad_acceso;

CREATE TABLE IF NOT EXISTS seguridad_acceso.rol (
    id_rol SERIAL PRIMARY KEY,
    nombre_rol VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS seguridad_acceso.usuario (
    id_usuario SERIAL PRIMARY KEY,
    id_rol INT REFERENCES seguridad_acceso.rol(id_rol),
    id_sucursal INT REFERENCES core.sucursal(id_sucursal),
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    cedula VARCHAR(100),
    email VARCHAR(255) UNIQUE,
    contraseña VARCHAR(255),
    activo BOOLEAN DEFAULT TRUE,
    telefono VARCHAR(50),
    direccion TEXT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Schema inventario
CREATE SCHEMA IF NOT EXISTS inventario;

CREATE TABLE IF NOT EXISTS inventario.producto (
    id_producto SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    codigo_barra VARCHAR(100),
    precio_compra NUMERIC(12,2) DEFAULT 0,
    precio_venta NUMERIC(12,2) DEFAULT 0,
    id_categoria INT REFERENCES core.categoria(id_categoria),
    id_color INT REFERENCES core.color(id_color),
    id_talla INT REFERENCES core.talla(id_talla),
    id_proveedor INT REFERENCES core.proveedor(id_proveedor),
    activo BOOLEAN DEFAULT TRUE
);

CREATE TABLE IF NOT EXISTS inventario.inventario (
    id_inventario SERIAL PRIMARY KEY,
    id_producto INT REFERENCES inventario.producto(id_producto),
    id_sucursal INT REFERENCES core.sucursal(id_sucursal),
    cantidad INT DEFAULT 0,
    minimo INT DEFAULT 0,
    activo BOOLEAN DEFAULT TRUE
);

COMMIT;
