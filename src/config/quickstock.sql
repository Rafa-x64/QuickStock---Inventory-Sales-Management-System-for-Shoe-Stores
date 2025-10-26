--
-- PostgreSQL database dump
--

\restrict QxrrUda01HEZwc4x5fFtea7e8IOdlJVWcYUGNCVpCZh93d1yCPUnKIoVAVQ2eZ4

-- Dumped from database version 18.0
-- Dumped by pg_dump version 18.0

-- Started on 2025-10-25 19:15:56

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 7 (class 2615 OID 17609)
-- Name: core; Type: SCHEMA; Schema: -; Owner: rafa
--

CREATE SCHEMA core;


ALTER SCHEMA core OWNER TO rafa;

--
-- TOC entry 8 (class 2615 OID 17783)
-- Name: finanzas; Type: SCHEMA; Schema: -; Owner: rafa
--

CREATE SCHEMA finanzas;


ALTER SCHEMA finanzas OWNER TO rafa;

--
-- TOC entry 9 (class 2615 OID 17692)
-- Name: inventario; Type: SCHEMA; Schema: -; Owner: rafa
--

CREATE SCHEMA inventario;


ALTER SCHEMA inventario OWNER TO rafa;

--
-- TOC entry 10 (class 2615 OID 17554)
-- Name: seguridad_acceso; Type: SCHEMA; Schema: -; Owner: rafa
--

CREATE SCHEMA seguridad_acceso;


ALTER SCHEMA seguridad_acceso OWNER TO rafa;

--
-- TOC entry 6 (class 2615 OID 17432)
-- Name: ventas; Type: SCHEMA; Schema: -; Owner: rafa
--

CREATE SCHEMA ventas;


ALTER SCHEMA ventas OWNER TO rafa;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 235 (class 1259 OID 17637)
-- Name: categoria; Type: TABLE; Schema: core; Owner: postgres
--

CREATE TABLE core.categoria (
    id_categoria integer NOT NULL,
    nombre character varying(50) NOT NULL,
    id_categoria_padre integer
);


ALTER TABLE core.categoria OWNER TO postgres;

--
-- TOC entry 234 (class 1259 OID 17636)
-- Name: categoria_id_categoria_seq; Type: SEQUENCE; Schema: core; Owner: postgres
--

CREATE SEQUENCE core.categoria_id_categoria_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE core.categoria_id_categoria_seq OWNER TO postgres;

--
-- TOC entry 5190 (class 0 OID 0)
-- Dependencies: 234
-- Name: categoria_id_categoria_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: postgres
--

ALTER SEQUENCE core.categoria_id_categoria_seq OWNED BY core.categoria.id_categoria;


--
-- TOC entry 241 (class 1259 OID 17675)
-- Name: cliente; Type: TABLE; Schema: core; Owner: postgres
--

CREATE TABLE core.cliente (
    id_cliente bigint NOT NULL,
    cedula_rif character varying(20) NOT NULL,
    nombre_completo character varying(150) NOT NULL,
    direccion character varying(255),
    telefono character varying(50),
    email character varying(100),
    CONSTRAINT cliente_email_check CHECK (((email)::text ~ similar_to_escape('%@%.%'::text)))
);


ALTER TABLE core.cliente OWNER TO postgres;

--
-- TOC entry 240 (class 1259 OID 17674)
-- Name: cliente_id_cliente_seq; Type: SEQUENCE; Schema: core; Owner: postgres
--

CREATE SEQUENCE core.cliente_id_cliente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE core.cliente_id_cliente_seq OWNER TO postgres;

--
-- TOC entry 5191 (class 0 OID 0)
-- Dependencies: 240
-- Name: cliente_id_cliente_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: postgres
--

ALTER SEQUENCE core.cliente_id_cliente_seq OWNED BY core.cliente.id_cliente;


--
-- TOC entry 239 (class 1259 OID 17664)
-- Name: color; Type: TABLE; Schema: core; Owner: postgres
--

CREATE TABLE core.color (
    id_color integer NOT NULL,
    nombre_color character varying(50) NOT NULL
);


ALTER TABLE core.color OWNER TO postgres;

--
-- TOC entry 238 (class 1259 OID 17663)
-- Name: color_id_color_seq; Type: SEQUENCE; Schema: core; Owner: postgres
--

CREATE SEQUENCE core.color_id_color_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE core.color_id_color_seq OWNER TO postgres;

--
-- TOC entry 5192 (class 0 OID 0)
-- Dependencies: 238
-- Name: color_id_color_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: postgres
--

ALTER SEQUENCE core.color_id_color_seq OWNED BY core.color.id_color;


--
-- TOC entry 233 (class 1259 OID 17623)
-- Name: proveedor; Type: TABLE; Schema: core; Owner: postgres
--

CREATE TABLE core.proveedor (
    id_proveedor integer NOT NULL,
    nombre_fiscal character varying(150) NOT NULL,
    rif character varying(20) NOT NULL,
    pais character varying(50),
    direccion character varying(255),
    persona_contacto character varying(255),
    telefono_contacto character varying(50)
);


ALTER TABLE core.proveedor OWNER TO postgres;

--
-- TOC entry 232 (class 1259 OID 17622)
-- Name: proveedor_id_proveedor_seq; Type: SEQUENCE; Schema: core; Owner: postgres
--

CREATE SEQUENCE core.proveedor_id_proveedor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE core.proveedor_id_proveedor_seq OWNER TO postgres;

--
-- TOC entry 5193 (class 0 OID 0)
-- Dependencies: 232
-- Name: proveedor_id_proveedor_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: postgres
--

ALTER SEQUENCE core.proveedor_id_proveedor_seq OWNED BY core.proveedor.id_proveedor;


--
-- TOC entry 231 (class 1259 OID 17611)
-- Name: sucursal; Type: TABLE; Schema: core; Owner: postgres
--

CREATE TABLE core.sucursal (
    id_sucursal integer NOT NULL,
    nombre character varying(100) NOT NULL,
    direccion character varying(255) NOT NULL,
    telefono character varying(50)
);


ALTER TABLE core.sucursal OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 17610)
-- Name: sucursal_id_sucursal_seq; Type: SEQUENCE; Schema: core; Owner: postgres
--

CREATE SEQUENCE core.sucursal_id_sucursal_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE core.sucursal_id_sucursal_seq OWNER TO postgres;

--
-- TOC entry 5194 (class 0 OID 0)
-- Dependencies: 230
-- Name: sucursal_id_sucursal_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: postgres
--

ALTER SEQUENCE core.sucursal_id_sucursal_seq OWNED BY core.sucursal.id_sucursal;


--
-- TOC entry 237 (class 1259 OID 17653)
-- Name: talla; Type: TABLE; Schema: core; Owner: postgres
--

CREATE TABLE core.talla (
    id_talla integer NOT NULL,
    valor_talla character varying(20) NOT NULL
);


ALTER TABLE core.talla OWNER TO postgres;

--
-- TOC entry 236 (class 1259 OID 17652)
-- Name: talla_id_talla_seq; Type: SEQUENCE; Schema: core; Owner: postgres
--

CREATE SEQUENCE core.talla_id_talla_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE core.talla_id_talla_seq OWNER TO postgres;

--
-- TOC entry 5195 (class 0 OID 0)
-- Dependencies: 236
-- Name: talla_id_talla_seq; Type: SEQUENCE OWNED BY; Schema: core; Owner: postgres
--

ALTER SEQUENCE core.talla_id_talla_seq OWNED BY core.talla.id_talla;


--
-- TOC entry 252 (class 1259 OID 17879)
-- Name: caja_turno; Type: TABLE; Schema: finanzas; Owner: postgres
--

CREATE TABLE finanzas.caja_turno (
    id_caja_turno bigint NOT NULL,
    id_sucursal integer NOT NULL,
    id_usuario_apertura integer NOT NULL,
    id_usuario_cierre integer,
    fecha_apertura timestamp without time zone DEFAULT now() NOT NULL,
    fecha_cierre timestamp without time zone,
    saldo_inicial numeric(18,2) NOT NULL,
    saldo_final_calculado numeric(18,2),
    saldo_final_real numeric(18,2),
    estado character varying(20) NOT NULL,
    CONSTRAINT caja_turno_estado_check CHECK (((estado)::text = ANY ((ARRAY['ABIERTA'::character varying, 'CERRADA'::character varying, 'CONCILIADA'::character varying])::text[])))
);


ALTER TABLE finanzas.caja_turno OWNER TO postgres;

--
-- TOC entry 251 (class 1259 OID 17878)
-- Name: caja_turno_id_caja_turno_seq; Type: SEQUENCE; Schema: finanzas; Owner: postgres
--

CREATE SEQUENCE finanzas.caja_turno_id_caja_turno_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE finanzas.caja_turno_id_caja_turno_seq OWNER TO postgres;

--
-- TOC entry 5196 (class 0 OID 0)
-- Dependencies: 251
-- Name: caja_turno_id_caja_turno_seq; Type: SEQUENCE OWNED BY; Schema: finanzas; Owner: postgres
--

ALTER SEQUENCE finanzas.caja_turno_id_caja_turno_seq OWNED BY finanzas.caja_turno.id_caja_turno;


--
-- TOC entry 258 (class 1259 OID 18094)
-- Name: comision_venta; Type: TABLE; Schema: finanzas; Owner: postgres
--

CREATE TABLE finanzas.comision_venta (
    id_comision bigint NOT NULL,
    id_venta bigint NOT NULL,
    id_vendedor integer NOT NULL,
    porcentaje_comision numeric(5,2) NOT NULL,
    monto_comision_calculado numeric(18,2) NOT NULL,
    estado_pago character varying(20) DEFAULT 'pendiente'::character varying NOT NULL,
    CONSTRAINT comision_venta_estado_pago_check CHECK (((estado_pago)::text = ANY ((ARRAY['PENDIENTE'::character varying, 'PAGADA'::character varying])::text[]))),
    CONSTRAINT comision_venta_porcentaje_comision_check CHECK ((porcentaje_comision > (0)::numeric))
);


ALTER TABLE finanzas.comision_venta OWNER TO postgres;

--
-- TOC entry 257 (class 1259 OID 18093)
-- Name: comision_venta_id_comision_seq; Type: SEQUENCE; Schema: finanzas; Owner: postgres
--

CREATE SEQUENCE finanzas.comision_venta_id_comision_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE finanzas.comision_venta_id_comision_seq OWNER TO postgres;

--
-- TOC entry 5197 (class 0 OID 0)
-- Dependencies: 257
-- Name: comision_venta_id_comision_seq; Type: SEQUENCE OWNED BY; Schema: finanzas; Owner: postgres
--

ALTER SEQUENCE finanzas.comision_venta_id_comision_seq OWNED BY finanzas.comision_venta.id_comision;


--
-- TOC entry 254 (class 1259 OID 17909)
-- Name: metodo_pago; Type: TABLE; Schema: finanzas; Owner: postgres
--

CREATE TABLE finanzas.metodo_pago (
    id_metodo_pago integer NOT NULL,
    nombre character varying(50) NOT NULL,
    requiere_referencia boolean DEFAULT false NOT NULL
);


ALTER TABLE finanzas.metodo_pago OWNER TO postgres;

--
-- TOC entry 253 (class 1259 OID 17908)
-- Name: metodo_pago_id_metodo_pago_seq; Type: SEQUENCE; Schema: finanzas; Owner: postgres
--

CREATE SEQUENCE finanzas.metodo_pago_id_metodo_pago_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE finanzas.metodo_pago_id_metodo_pago_seq OWNER TO postgres;

--
-- TOC entry 5198 (class 0 OID 0)
-- Dependencies: 253
-- Name: metodo_pago_id_metodo_pago_seq; Type: SEQUENCE OWNED BY; Schema: finanzas; Owner: postgres
--

ALTER SEQUENCE finanzas.metodo_pago_id_metodo_pago_seq OWNED BY finanzas.metodo_pago.id_metodo_pago;


--
-- TOC entry 248 (class 1259 OID 17784)
-- Name: moneda; Type: TABLE; Schema: finanzas; Owner: postgres
--

CREATE TABLE finanzas.moneda (
    id_moneda character(3) NOT NULL,
    nombre_moneda character varying(50) NOT NULL,
    simbolo character varying(5) NOT NULL
);


ALTER TABLE finanzas.moneda OWNER TO postgres;

--
-- TOC entry 250 (class 1259 OID 17795)
-- Name: tasa_cambio; Type: TABLE; Schema: finanzas; Owner: postgres
--

CREATE TABLE finanzas.tasa_cambio (
    id_tasa bigint NOT NULL,
    id_moneda_origen character(3) NOT NULL,
    id_moneda_destino character(3) NOT NULL,
    tasa_conversion numeric(18,8) NOT NULL,
    fecha_vigencia timestamp with time zone DEFAULT now() NOT NULL,
    CONSTRAINT tasa_cambio_tasa_conversion_check CHECK ((tasa_conversion > (6)::numeric))
);


ALTER TABLE finanzas.tasa_cambio OWNER TO postgres;

--
-- TOC entry 249 (class 1259 OID 17794)
-- Name: tasa_cambio_id_tasa_seq; Type: SEQUENCE; Schema: finanzas; Owner: postgres
--

CREATE SEQUENCE finanzas.tasa_cambio_id_tasa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE finanzas.tasa_cambio_id_tasa_seq OWNER TO postgres;

--
-- TOC entry 5199 (class 0 OID 0)
-- Dependencies: 249
-- Name: tasa_cambio_id_tasa_seq; Type: SEQUENCE OWNED BY; Schema: finanzas; Owner: postgres
--

ALTER SEQUENCE finanzas.tasa_cambio_id_tasa_seq OWNED BY finanzas.tasa_cambio.id_tasa;


--
-- TOC entry 247 (class 1259 OID 17756)
-- Name: inventario; Type: TABLE; Schema: inventario; Owner: postgres
--

CREATE TABLE inventario.inventario (
    id_inventario integer NOT NULL,
    id_variante integer NOT NULL,
    id_sucursal integer NOT NULL,
    cantidad_stock integer DEFAULT 0 NOT NULL,
    stock_minimo_alerta integer DEFAULT 5 NOT NULL,
    CONSTRAINT inventario_cantidad_stock_check CHECK ((cantidad_stock >= 0)),
    CONSTRAINT inventario_stock_minimo_alerta_check CHECK ((stock_minimo_alerta >= 0))
);


ALTER TABLE inventario.inventario OWNER TO postgres;

--
-- TOC entry 246 (class 1259 OID 17755)
-- Name: inventario_id_inventario_seq; Type: SEQUENCE; Schema: inventario; Owner: postgres
--

CREATE SEQUENCE inventario.inventario_id_inventario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE inventario.inventario_id_inventario_seq OWNER TO postgres;

--
-- TOC entry 5200 (class 0 OID 0)
-- Dependencies: 246
-- Name: inventario_id_inventario_seq; Type: SEQUENCE OWNED BY; Schema: inventario; Owner: postgres
--

ALTER SEQUENCE inventario.inventario_id_inventario_seq OWNED BY inventario.inventario.id_inventario;


--
-- TOC entry 243 (class 1259 OID 17694)
-- Name: producto; Type: TABLE; Schema: inventario; Owner: postgres
--

CREATE TABLE inventario.producto (
    id_producto bigint NOT NULL,
    id_proveedor integer NOT NULL,
    id_categoria integer NOT NULL,
    nombre_modelo character varying(150) NOT NULL,
    descripcion text,
    codigo_barra_base character varying(100),
    precio_venta_sugerido numeric(18,2) NOT NULL,
    CONSTRAINT producto_precio_venta_sugerido_check CHECK ((precio_venta_sugerido > (0)::numeric))
);


ALTER TABLE inventario.producto OWNER TO postgres;

--
-- TOC entry 242 (class 1259 OID 17693)
-- Name: producto_id_producto_seq; Type: SEQUENCE; Schema: inventario; Owner: postgres
--

CREATE SEQUENCE inventario.producto_id_producto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE inventario.producto_id_producto_seq OWNER TO postgres;

--
-- TOC entry 5201 (class 0 OID 0)
-- Dependencies: 242
-- Name: producto_id_producto_seq; Type: SEQUENCE OWNED BY; Schema: inventario; Owner: postgres
--

ALTER SEQUENCE inventario.producto_id_producto_seq OWNED BY inventario.producto.id_producto;


--
-- TOC entry 245 (class 1259 OID 17721)
-- Name: producto_variante; Type: TABLE; Schema: inventario; Owner: postgres
--

CREATE TABLE inventario.producto_variante (
    id_variante integer NOT NULL,
    id_producto bigint NOT NULL,
    id_talla integer NOT NULL,
    id_color integer NOT NULL,
    sku_codigo_barras character varying(100) NOT NULL,
    costo_compra numeric(18,2) NOT NULL,
    precio_venta_especifico numeric(18,2) NOT NULL,
    CONSTRAINT producto_variante_costo_compra_check CHECK ((costo_compra > (0)::numeric)),
    CONSTRAINT producto_variante_precio_venta_especifico_check CHECK ((precio_venta_especifico > (0)::numeric))
);


ALTER TABLE inventario.producto_variante OWNER TO postgres;

--
-- TOC entry 244 (class 1259 OID 17720)
-- Name: producto_variante_id_variante_seq; Type: SEQUENCE; Schema: inventario; Owner: postgres
--

CREATE SEQUENCE inventario.producto_variante_id_variante_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE inventario.producto_variante_id_variante_seq OWNER TO postgres;

--
-- TOC entry 5202 (class 0 OID 0)
-- Dependencies: 244
-- Name: producto_variante_id_variante_seq; Type: SEQUENCE OWNED BY; Schema: inventario; Owner: postgres
--

ALTER SEQUENCE inventario.producto_variante_id_variante_seq OWNED BY inventario.producto_variante.id_variante;


--
-- TOC entry 229 (class 1259 OID 17593)
-- Name: auditoria; Type: TABLE; Schema: seguridad_acceso; Owner: postgres
--

CREATE TABLE seguridad_acceso.auditoria (
    id_auditoria bigint NOT NULL,
    id_usuario integer NOT NULL,
    fecha_hora timestamp with time zone DEFAULT now() NOT NULL,
    accion character varying(100) NOT NULL,
    tabla_afectada character varying(50),
    id_registro_afectado bigint,
    direccion_ip_maquina character varying(45)
);


ALTER TABLE seguridad_acceso.auditoria OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 17592)
-- Name: auditoria_id_auditoria_seq; Type: SEQUENCE; Schema: seguridad_acceso; Owner: postgres
--

CREATE SEQUENCE seguridad_acceso.auditoria_id_auditoria_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE seguridad_acceso.auditoria_id_auditoria_seq OWNER TO postgres;

--
-- TOC entry 5203 (class 0 OID 0)
-- Dependencies: 228
-- Name: auditoria_id_auditoria_seq; Type: SEQUENCE OWNED BY; Schema: seguridad_acceso; Owner: postgres
--

ALTER SEQUENCE seguridad_acceso.auditoria_id_auditoria_seq OWNED BY seguridad_acceso.auditoria.id_auditoria;


--
-- TOC entry 225 (class 1259 OID 17556)
-- Name: rol; Type: TABLE; Schema: seguridad_acceso; Owner: postgres
--

CREATE TABLE seguridad_acceso.rol (
    id_rol integer NOT NULL,
    nombre_rol character varying(50) NOT NULL,
    descripcion character varying(255)
);


ALTER TABLE seguridad_acceso.rol OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 17555)
-- Name: rol_id_rol_seq; Type: SEQUENCE; Schema: seguridad_acceso; Owner: postgres
--

CREATE SEQUENCE seguridad_acceso.rol_id_rol_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE seguridad_acceso.rol_id_rol_seq OWNER TO postgres;

--
-- TOC entry 5204 (class 0 OID 0)
-- Dependencies: 224
-- Name: rol_id_rol_seq; Type: SEQUENCE OWNED BY; Schema: seguridad_acceso; Owner: postgres
--

ALTER SEQUENCE seguridad_acceso.rol_id_rol_seq OWNED BY seguridad_acceso.rol.id_rol;


--
-- TOC entry 227 (class 1259 OID 17567)
-- Name: usuario; Type: TABLE; Schema: seguridad_acceso; Owner: postgres
--

CREATE TABLE seguridad_acceso.usuario (
    id_usuario integer NOT NULL,
    id_rol integer NOT NULL,
    nombre character varying(100) NOT NULL,
    apellido character varying(100) NOT NULL,
    cedula character varying(20) NOT NULL,
    email character varying(100) NOT NULL,
    "contraseña" character varying(255) NOT NULL,
    activo boolean DEFAULT true NOT NULL,
    CONSTRAINT usuario_email_check CHECK (((email)::text ~ similar_to_escape('%_@_%._%'::text)))
);


ALTER TABLE seguridad_acceso.usuario OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 17566)
-- Name: usuario_id_usuario_seq; Type: SEQUENCE; Schema: seguridad_acceso; Owner: postgres
--

CREATE SEQUENCE seguridad_acceso.usuario_id_usuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE seguridad_acceso.usuario_id_usuario_seq OWNER TO postgres;

--
-- TOC entry 5205 (class 0 OID 0)
-- Dependencies: 226
-- Name: usuario_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: seguridad_acceso; Owner: postgres
--

ALTER SEQUENCE seguridad_acceso.usuario_id_usuario_seq OWNED BY seguridad_acceso.usuario.id_usuario;


--
-- TOC entry 260 (class 1259 OID 18123)
-- Name: detalle_venta; Type: TABLE; Schema: ventas; Owner: postgres
--

CREATE TABLE ventas.detalle_venta (
    id_detalle_venta bigint NOT NULL,
    id_venta bigint NOT NULL,
    id_variante integer NOT NULL,
    cantidad integer NOT NULL,
    precio_unitario_venta numeric(18,2) NOT NULL,
    descuento_aplicado numeric(18,2) DEFAULT 0 NOT NULL,
    impuesto_aplicado numeric(18,2) DEFAULT 0 NOT NULL,
    CONSTRAINT detalle_venta_cantidad_check CHECK ((cantidad > 0))
);


ALTER TABLE ventas.detalle_venta OWNER TO postgres;

--
-- TOC entry 259 (class 1259 OID 18122)
-- Name: detalle_venta_id_detalle_venta_seq; Type: SEQUENCE; Schema: ventas; Owner: postgres
--

CREATE SEQUENCE ventas.detalle_venta_id_detalle_venta_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE ventas.detalle_venta_id_detalle_venta_seq OWNER TO postgres;

--
-- TOC entry 5206 (class 0 OID 0)
-- Dependencies: 259
-- Name: detalle_venta_id_detalle_venta_seq; Type: SEQUENCE OWNED BY; Schema: ventas; Owner: postgres
--

ALTER SEQUENCE ventas.detalle_venta_id_detalle_venta_seq OWNED BY ventas.detalle_venta.id_detalle_venta;


--
-- TOC entry 262 (class 1259 OID 18150)
-- Name: pago_venta; Type: TABLE; Schema: ventas; Owner: postgres
--

CREATE TABLE ventas.pago_venta (
    id_pago_venta bigint NOT NULL,
    id_venta bigint NOT NULL,
    id_metodo_pago integer NOT NULL,
    monto_pagado numeric(18,2) NOT NULL,
    referencia_pago character varying(100),
    CONSTRAINT pago_venta_monto_pagado_check CHECK ((monto_pagado > (0)::numeric))
);


ALTER TABLE ventas.pago_venta OWNER TO postgres;

--
-- TOC entry 261 (class 1259 OID 18149)
-- Name: pago_venta_id_pago_venta_seq; Type: SEQUENCE; Schema: ventas; Owner: postgres
--

CREATE SEQUENCE ventas.pago_venta_id_pago_venta_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE ventas.pago_venta_id_pago_venta_seq OWNER TO postgres;

--
-- TOC entry 5207 (class 0 OID 0)
-- Dependencies: 261
-- Name: pago_venta_id_pago_venta_seq; Type: SEQUENCE OWNED BY; Schema: ventas; Owner: postgres
--

ALTER SEQUENCE ventas.pago_venta_id_pago_venta_seq OWNED BY ventas.pago_venta.id_pago_venta;


--
-- TOC entry 256 (class 1259 OID 18021)
-- Name: venta; Type: TABLE; Schema: ventas; Owner: postgres
--

CREATE TABLE ventas.venta (
    id_venta bigint NOT NULL,
    id_cliente bigint NOT NULL,
    id_vendedor integer NOT NULL,
    id_caja_turno bigint NOT NULL,
    id_sucursal integer NOT NULL,
    fecha_hora timestamp without time zone DEFAULT now() NOT NULL,
    id_moneda_venta character(3) NOT NULL,
    tasa_cambio_aplicada numeric(18,6) NOT NULL,
    sub_total numeric(18,2) NOT NULL,
    total_impuestos numeric(18,2) DEFAULT 0 NOT NULL,
    total_descuento numeric(18,2) DEFAULT 0 NOT NULL,
    total_neto numeric(18,2) NOT NULL,
    estado_factura character varying(20) DEFAULT 'PAGADA'::character varying NOT NULL,
    CONSTRAINT venta_estado_factura_check CHECK (((estado_factura)::text = ANY ((ARRAY['PAGADA'::character varying, 'ANULADA'::character varying, 'PENDIENTE'::character varying])::text[])))
);


ALTER TABLE ventas.venta OWNER TO postgres;

--
-- TOC entry 255 (class 1259 OID 18020)
-- Name: venta_id_venta_seq; Type: SEQUENCE; Schema: ventas; Owner: postgres
--

CREATE SEQUENCE ventas.venta_id_venta_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE ventas.venta_id_venta_seq OWNER TO postgres;

--
-- TOC entry 5208 (class 0 OID 0)
-- Dependencies: 255
-- Name: venta_id_venta_seq; Type: SEQUENCE OWNED BY; Schema: ventas; Owner: postgres
--

ALTER SEQUENCE ventas.venta_id_venta_seq OWNED BY ventas.venta.id_venta;


--
-- TOC entry 4861 (class 2604 OID 17640)
-- Name: categoria id_categoria; Type: DEFAULT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.categoria ALTER COLUMN id_categoria SET DEFAULT nextval('core.categoria_id_categoria_seq'::regclass);


--
-- TOC entry 4864 (class 2604 OID 17678)
-- Name: cliente id_cliente; Type: DEFAULT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.cliente ALTER COLUMN id_cliente SET DEFAULT nextval('core.cliente_id_cliente_seq'::regclass);


--
-- TOC entry 4863 (class 2604 OID 17667)
-- Name: color id_color; Type: DEFAULT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.color ALTER COLUMN id_color SET DEFAULT nextval('core.color_id_color_seq'::regclass);


--
-- TOC entry 4860 (class 2604 OID 17626)
-- Name: proveedor id_proveedor; Type: DEFAULT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.proveedor ALTER COLUMN id_proveedor SET DEFAULT nextval('core.proveedor_id_proveedor_seq'::regclass);


--
-- TOC entry 4859 (class 2604 OID 17614)
-- Name: sucursal id_sucursal; Type: DEFAULT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.sucursal ALTER COLUMN id_sucursal SET DEFAULT nextval('core.sucursal_id_sucursal_seq'::regclass);


--
-- TOC entry 4862 (class 2604 OID 17656)
-- Name: talla id_talla; Type: DEFAULT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.talla ALTER COLUMN id_talla SET DEFAULT nextval('core.talla_id_talla_seq'::regclass);


--
-- TOC entry 4872 (class 2604 OID 17882)
-- Name: caja_turno id_caja_turno; Type: DEFAULT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.caja_turno ALTER COLUMN id_caja_turno SET DEFAULT nextval('finanzas.caja_turno_id_caja_turno_seq'::regclass);


--
-- TOC entry 4881 (class 2604 OID 18097)
-- Name: comision_venta id_comision; Type: DEFAULT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.comision_venta ALTER COLUMN id_comision SET DEFAULT nextval('finanzas.comision_venta_id_comision_seq'::regclass);


--
-- TOC entry 4874 (class 2604 OID 17912)
-- Name: metodo_pago id_metodo_pago; Type: DEFAULT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.metodo_pago ALTER COLUMN id_metodo_pago SET DEFAULT nextval('finanzas.metodo_pago_id_metodo_pago_seq'::regclass);


--
-- TOC entry 4870 (class 2604 OID 17798)
-- Name: tasa_cambio id_tasa; Type: DEFAULT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.tasa_cambio ALTER COLUMN id_tasa SET DEFAULT nextval('finanzas.tasa_cambio_id_tasa_seq'::regclass);


--
-- TOC entry 4867 (class 2604 OID 17759)
-- Name: inventario id_inventario; Type: DEFAULT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.inventario ALTER COLUMN id_inventario SET DEFAULT nextval('inventario.inventario_id_inventario_seq'::regclass);


--
-- TOC entry 4865 (class 2604 OID 17697)
-- Name: producto id_producto; Type: DEFAULT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.producto ALTER COLUMN id_producto SET DEFAULT nextval('inventario.producto_id_producto_seq'::regclass);


--
-- TOC entry 4866 (class 2604 OID 17724)
-- Name: producto_variante id_variante; Type: DEFAULT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.producto_variante ALTER COLUMN id_variante SET DEFAULT nextval('inventario.producto_variante_id_variante_seq'::regclass);


--
-- TOC entry 4857 (class 2604 OID 17596)
-- Name: auditoria id_auditoria; Type: DEFAULT; Schema: seguridad_acceso; Owner: postgres
--

ALTER TABLE ONLY seguridad_acceso.auditoria ALTER COLUMN id_auditoria SET DEFAULT nextval('seguridad_acceso.auditoria_id_auditoria_seq'::regclass);


--
-- TOC entry 4854 (class 2604 OID 17559)
-- Name: rol id_rol; Type: DEFAULT; Schema: seguridad_acceso; Owner: postgres
--

ALTER TABLE ONLY seguridad_acceso.rol ALTER COLUMN id_rol SET DEFAULT nextval('seguridad_acceso.rol_id_rol_seq'::regclass);


--
-- TOC entry 4855 (class 2604 OID 17570)
-- Name: usuario id_usuario; Type: DEFAULT; Schema: seguridad_acceso; Owner: postgres
--

ALTER TABLE ONLY seguridad_acceso.usuario ALTER COLUMN id_usuario SET DEFAULT nextval('seguridad_acceso.usuario_id_usuario_seq'::regclass);


--
-- TOC entry 4883 (class 2604 OID 18126)
-- Name: detalle_venta id_detalle_venta; Type: DEFAULT; Schema: ventas; Owner: postgres
--

ALTER TABLE ONLY ventas.detalle_venta ALTER COLUMN id_detalle_venta SET DEFAULT nextval('ventas.detalle_venta_id_detalle_venta_seq'::regclass);


--
-- TOC entry 4886 (class 2604 OID 18153)
-- Name: pago_venta id_pago_venta; Type: DEFAULT; Schema: ventas; Owner: postgres
--

ALTER TABLE ONLY ventas.pago_venta ALTER COLUMN id_pago_venta SET DEFAULT nextval('ventas.pago_venta_id_pago_venta_seq'::regclass);


--
-- TOC entry 4876 (class 2604 OID 18024)
-- Name: venta id_venta; Type: DEFAULT; Schema: ventas; Owner: postgres
--

ALTER TABLE ONLY ventas.venta ALTER COLUMN id_venta SET DEFAULT nextval('ventas.venta_id_venta_seq'::regclass);


--
-- TOC entry 5157 (class 0 OID 17637)
-- Dependencies: 235
-- Data for Name: categoria; Type: TABLE DATA; Schema: core; Owner: postgres
--

COPY core.categoria (id_categoria, nombre, id_categoria_padre) FROM stdin;
\.


--
-- TOC entry 5163 (class 0 OID 17675)
-- Dependencies: 241
-- Data for Name: cliente; Type: TABLE DATA; Schema: core; Owner: postgres
--

COPY core.cliente (id_cliente, cedula_rif, nombre_completo, direccion, telefono, email) FROM stdin;
\.


--
-- TOC entry 5161 (class 0 OID 17664)
-- Dependencies: 239
-- Data for Name: color; Type: TABLE DATA; Schema: core; Owner: postgres
--

COPY core.color (id_color, nombre_color) FROM stdin;
\.


--
-- TOC entry 5155 (class 0 OID 17623)
-- Dependencies: 233
-- Data for Name: proveedor; Type: TABLE DATA; Schema: core; Owner: postgres
--

COPY core.proveedor (id_proveedor, nombre_fiscal, rif, pais, direccion, persona_contacto, telefono_contacto) FROM stdin;
\.


--
-- TOC entry 5153 (class 0 OID 17611)
-- Dependencies: 231
-- Data for Name: sucursal; Type: TABLE DATA; Schema: core; Owner: postgres
--

COPY core.sucursal (id_sucursal, nombre, direccion, telefono) FROM stdin;
\.


--
-- TOC entry 5159 (class 0 OID 17653)
-- Dependencies: 237
-- Data for Name: talla; Type: TABLE DATA; Schema: core; Owner: postgres
--

COPY core.talla (id_talla, valor_talla) FROM stdin;
\.


--
-- TOC entry 5174 (class 0 OID 17879)
-- Dependencies: 252
-- Data for Name: caja_turno; Type: TABLE DATA; Schema: finanzas; Owner: postgres
--

COPY finanzas.caja_turno (id_caja_turno, id_sucursal, id_usuario_apertura, id_usuario_cierre, fecha_apertura, fecha_cierre, saldo_inicial, saldo_final_calculado, saldo_final_real, estado) FROM stdin;
\.


--
-- TOC entry 5180 (class 0 OID 18094)
-- Dependencies: 258
-- Data for Name: comision_venta; Type: TABLE DATA; Schema: finanzas; Owner: postgres
--

COPY finanzas.comision_venta (id_comision, id_venta, id_vendedor, porcentaje_comision, monto_comision_calculado, estado_pago) FROM stdin;
\.


--
-- TOC entry 5176 (class 0 OID 17909)
-- Dependencies: 254
-- Data for Name: metodo_pago; Type: TABLE DATA; Schema: finanzas; Owner: postgres
--

COPY finanzas.metodo_pago (id_metodo_pago, nombre, requiere_referencia) FROM stdin;
\.


--
-- TOC entry 5170 (class 0 OID 17784)
-- Dependencies: 248
-- Data for Name: moneda; Type: TABLE DATA; Schema: finanzas; Owner: postgres
--

COPY finanzas.moneda (id_moneda, nombre_moneda, simbolo) FROM stdin;
\.


--
-- TOC entry 5172 (class 0 OID 17795)
-- Dependencies: 250
-- Data for Name: tasa_cambio; Type: TABLE DATA; Schema: finanzas; Owner: postgres
--

COPY finanzas.tasa_cambio (id_tasa, id_moneda_origen, id_moneda_destino, tasa_conversion, fecha_vigencia) FROM stdin;
\.


--
-- TOC entry 5169 (class 0 OID 17756)
-- Dependencies: 247
-- Data for Name: inventario; Type: TABLE DATA; Schema: inventario; Owner: postgres
--

COPY inventario.inventario (id_inventario, id_variante, id_sucursal, cantidad_stock, stock_minimo_alerta) FROM stdin;
\.


--
-- TOC entry 5165 (class 0 OID 17694)
-- Dependencies: 243
-- Data for Name: producto; Type: TABLE DATA; Schema: inventario; Owner: postgres
--

COPY inventario.producto (id_producto, id_proveedor, id_categoria, nombre_modelo, descripcion, codigo_barra_base, precio_venta_sugerido) FROM stdin;
\.


--
-- TOC entry 5167 (class 0 OID 17721)
-- Dependencies: 245
-- Data for Name: producto_variante; Type: TABLE DATA; Schema: inventario; Owner: postgres
--

COPY inventario.producto_variante (id_variante, id_producto, id_talla, id_color, sku_codigo_barras, costo_compra, precio_venta_especifico) FROM stdin;
\.


--
-- TOC entry 5151 (class 0 OID 17593)
-- Dependencies: 229
-- Data for Name: auditoria; Type: TABLE DATA; Schema: seguridad_acceso; Owner: postgres
--

COPY seguridad_acceso.auditoria (id_auditoria, id_usuario, fecha_hora, accion, tabla_afectada, id_registro_afectado, direccion_ip_maquina) FROM stdin;
\.


--
-- TOC entry 5147 (class 0 OID 17556)
-- Dependencies: 225
-- Data for Name: rol; Type: TABLE DATA; Schema: seguridad_acceso; Owner: postgres
--

COPY seguridad_acceso.rol (id_rol, nombre_rol, descripcion) FROM stdin;
\.


--
-- TOC entry 5149 (class 0 OID 17567)
-- Dependencies: 227
-- Data for Name: usuario; Type: TABLE DATA; Schema: seguridad_acceso; Owner: postgres
--

COPY seguridad_acceso.usuario (id_usuario, id_rol, nombre, apellido, cedula, email, "contraseña", activo) FROM stdin;
\.


--
-- TOC entry 5182 (class 0 OID 18123)
-- Dependencies: 260
-- Data for Name: detalle_venta; Type: TABLE DATA; Schema: ventas; Owner: postgres
--

COPY ventas.detalle_venta (id_detalle_venta, id_venta, id_variante, cantidad, precio_unitario_venta, descuento_aplicado, impuesto_aplicado) FROM stdin;
\.


--
-- TOC entry 5184 (class 0 OID 18150)
-- Dependencies: 262
-- Data for Name: pago_venta; Type: TABLE DATA; Schema: ventas; Owner: postgres
--

COPY ventas.pago_venta (id_pago_venta, id_venta, id_metodo_pago, monto_pagado, referencia_pago) FROM stdin;
\.


--
-- TOC entry 5178 (class 0 OID 18021)
-- Dependencies: 256
-- Data for Name: venta; Type: TABLE DATA; Schema: ventas; Owner: postgres
--

COPY ventas.venta (id_venta, id_cliente, id_vendedor, id_caja_turno, id_sucursal, fecha_hora, id_moneda_venta, tasa_cambio_aplicada, sub_total, total_impuestos, total_descuento, total_neto, estado_factura) FROM stdin;
\.


--
-- TOC entry 5209 (class 0 OID 0)
-- Dependencies: 234
-- Name: categoria_id_categoria_seq; Type: SEQUENCE SET; Schema: core; Owner: postgres
--

SELECT pg_catalog.setval('core.categoria_id_categoria_seq', 1, false);


--
-- TOC entry 5210 (class 0 OID 0)
-- Dependencies: 240
-- Name: cliente_id_cliente_seq; Type: SEQUENCE SET; Schema: core; Owner: postgres
--

SELECT pg_catalog.setval('core.cliente_id_cliente_seq', 1, false);


--
-- TOC entry 5211 (class 0 OID 0)
-- Dependencies: 238
-- Name: color_id_color_seq; Type: SEQUENCE SET; Schema: core; Owner: postgres
--

SELECT pg_catalog.setval('core.color_id_color_seq', 1, false);


--
-- TOC entry 5212 (class 0 OID 0)
-- Dependencies: 232
-- Name: proveedor_id_proveedor_seq; Type: SEQUENCE SET; Schema: core; Owner: postgres
--

SELECT pg_catalog.setval('core.proveedor_id_proveedor_seq', 1, false);


--
-- TOC entry 5213 (class 0 OID 0)
-- Dependencies: 230
-- Name: sucursal_id_sucursal_seq; Type: SEQUENCE SET; Schema: core; Owner: postgres
--

SELECT pg_catalog.setval('core.sucursal_id_sucursal_seq', 1, false);


--
-- TOC entry 5214 (class 0 OID 0)
-- Dependencies: 236
-- Name: talla_id_talla_seq; Type: SEQUENCE SET; Schema: core; Owner: postgres
--

SELECT pg_catalog.setval('core.talla_id_talla_seq', 1, false);


--
-- TOC entry 5215 (class 0 OID 0)
-- Dependencies: 251
-- Name: caja_turno_id_caja_turno_seq; Type: SEQUENCE SET; Schema: finanzas; Owner: postgres
--

SELECT pg_catalog.setval('finanzas.caja_turno_id_caja_turno_seq', 1, false);


--
-- TOC entry 5216 (class 0 OID 0)
-- Dependencies: 257
-- Name: comision_venta_id_comision_seq; Type: SEQUENCE SET; Schema: finanzas; Owner: postgres
--

SELECT pg_catalog.setval('finanzas.comision_venta_id_comision_seq', 1, false);


--
-- TOC entry 5217 (class 0 OID 0)
-- Dependencies: 253
-- Name: metodo_pago_id_metodo_pago_seq; Type: SEQUENCE SET; Schema: finanzas; Owner: postgres
--

SELECT pg_catalog.setval('finanzas.metodo_pago_id_metodo_pago_seq', 1, false);


--
-- TOC entry 5218 (class 0 OID 0)
-- Dependencies: 249
-- Name: tasa_cambio_id_tasa_seq; Type: SEQUENCE SET; Schema: finanzas; Owner: postgres
--

SELECT pg_catalog.setval('finanzas.tasa_cambio_id_tasa_seq', 1, false);


--
-- TOC entry 5219 (class 0 OID 0)
-- Dependencies: 246
-- Name: inventario_id_inventario_seq; Type: SEQUENCE SET; Schema: inventario; Owner: postgres
--

SELECT pg_catalog.setval('inventario.inventario_id_inventario_seq', 1, false);


--
-- TOC entry 5220 (class 0 OID 0)
-- Dependencies: 242
-- Name: producto_id_producto_seq; Type: SEQUENCE SET; Schema: inventario; Owner: postgres
--

SELECT pg_catalog.setval('inventario.producto_id_producto_seq', 1, false);


--
-- TOC entry 5221 (class 0 OID 0)
-- Dependencies: 244
-- Name: producto_variante_id_variante_seq; Type: SEQUENCE SET; Schema: inventario; Owner: postgres
--

SELECT pg_catalog.setval('inventario.producto_variante_id_variante_seq', 1, false);


--
-- TOC entry 5222 (class 0 OID 0)
-- Dependencies: 228
-- Name: auditoria_id_auditoria_seq; Type: SEQUENCE SET; Schema: seguridad_acceso; Owner: postgres
--

SELECT pg_catalog.setval('seguridad_acceso.auditoria_id_auditoria_seq', 1, false);


--
-- TOC entry 5223 (class 0 OID 0)
-- Dependencies: 224
-- Name: rol_id_rol_seq; Type: SEQUENCE SET; Schema: seguridad_acceso; Owner: postgres
--

SELECT pg_catalog.setval('seguridad_acceso.rol_id_rol_seq', 1, false);


--
-- TOC entry 5224 (class 0 OID 0)
-- Dependencies: 226
-- Name: usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: seguridad_acceso; Owner: postgres
--

SELECT pg_catalog.setval('seguridad_acceso.usuario_id_usuario_seq', 1, false);


--
-- TOC entry 5225 (class 0 OID 0)
-- Dependencies: 259
-- Name: detalle_venta_id_detalle_venta_seq; Type: SEQUENCE SET; Schema: ventas; Owner: postgres
--

SELECT pg_catalog.setval('ventas.detalle_venta_id_detalle_venta_seq', 1, false);


--
-- TOC entry 5226 (class 0 OID 0)
-- Dependencies: 261
-- Name: pago_venta_id_pago_venta_seq; Type: SEQUENCE SET; Schema: ventas; Owner: postgres
--

SELECT pg_catalog.setval('ventas.pago_venta_id_pago_venta_seq', 1, false);


--
-- TOC entry 5227 (class 0 OID 0)
-- Dependencies: 255
-- Name: venta_id_venta_seq; Type: SEQUENCE SET; Schema: ventas; Owner: postgres
--

SELECT pg_catalog.setval('ventas.venta_id_venta_seq', 1, false);


--
-- TOC entry 4920 (class 2606 OID 17646)
-- Name: categoria categoria_nombre_key; Type: CONSTRAINT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.categoria
    ADD CONSTRAINT categoria_nombre_key UNIQUE (nombre);


--
-- TOC entry 4922 (class 2606 OID 17644)
-- Name: categoria categoria_pkey; Type: CONSTRAINT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.categoria
    ADD CONSTRAINT categoria_pkey PRIMARY KEY (id_categoria);


--
-- TOC entry 4932 (class 2606 OID 17688)
-- Name: cliente cliente_cedula_rif_key; Type: CONSTRAINT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.cliente
    ADD CONSTRAINT cliente_cedula_rif_key UNIQUE (cedula_rif);


--
-- TOC entry 4934 (class 2606 OID 17690)
-- Name: cliente cliente_email_key; Type: CONSTRAINT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.cliente
    ADD CONSTRAINT cliente_email_key UNIQUE (email);


--
-- TOC entry 4936 (class 2606 OID 17686)
-- Name: cliente cliente_pkey; Type: CONSTRAINT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id_cliente);


--
-- TOC entry 4928 (class 2606 OID 17673)
-- Name: color color_nombre_color_key; Type: CONSTRAINT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.color
    ADD CONSTRAINT color_nombre_color_key UNIQUE (nombre_color);


--
-- TOC entry 4930 (class 2606 OID 17671)
-- Name: color color_pkey; Type: CONSTRAINT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.color
    ADD CONSTRAINT color_pkey PRIMARY KEY (id_color);


--
-- TOC entry 4916 (class 2606 OID 17633)
-- Name: proveedor proveedor_pkey; Type: CONSTRAINT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.proveedor
    ADD CONSTRAINT proveedor_pkey PRIMARY KEY (id_proveedor);


--
-- TOC entry 4918 (class 2606 OID 17635)
-- Name: proveedor proveedor_rif_key; Type: CONSTRAINT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.proveedor
    ADD CONSTRAINT proveedor_rif_key UNIQUE (rif);


--
-- TOC entry 4912 (class 2606 OID 17621)
-- Name: sucursal sucursal_nombre_key; Type: CONSTRAINT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.sucursal
    ADD CONSTRAINT sucursal_nombre_key UNIQUE (nombre);


--
-- TOC entry 4914 (class 2606 OID 17619)
-- Name: sucursal sucursal_pkey; Type: CONSTRAINT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.sucursal
    ADD CONSTRAINT sucursal_pkey PRIMARY KEY (id_sucursal);


--
-- TOC entry 4924 (class 2606 OID 17660)
-- Name: talla talla_pkey; Type: CONSTRAINT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.talla
    ADD CONSTRAINT talla_pkey PRIMARY KEY (id_talla);


--
-- TOC entry 4926 (class 2606 OID 17662)
-- Name: talla talla_valor_talla_key; Type: CONSTRAINT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.talla
    ADD CONSTRAINT talla_valor_talla_key UNIQUE (valor_talla);


--
-- TOC entry 4958 (class 2606 OID 17892)
-- Name: caja_turno caja_turno_pkey; Type: CONSTRAINT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.caja_turno
    ADD CONSTRAINT caja_turno_pkey PRIMARY KEY (id_caja_turno);


--
-- TOC entry 4966 (class 2606 OID 18110)
-- Name: comision_venta comision_venta_id_venta_key; Type: CONSTRAINT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.comision_venta
    ADD CONSTRAINT comision_venta_id_venta_key UNIQUE (id_venta);


--
-- TOC entry 4968 (class 2606 OID 18108)
-- Name: comision_venta comision_venta_pkey; Type: CONSTRAINT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.comision_venta
    ADD CONSTRAINT comision_venta_pkey PRIMARY KEY (id_comision);


--
-- TOC entry 4960 (class 2606 OID 17920)
-- Name: metodo_pago metodo_pago_nombre_key; Type: CONSTRAINT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.metodo_pago
    ADD CONSTRAINT metodo_pago_nombre_key UNIQUE (nombre);


--
-- TOC entry 4962 (class 2606 OID 17918)
-- Name: metodo_pago metodo_pago_pkey; Type: CONSTRAINT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.metodo_pago
    ADD CONSTRAINT metodo_pago_pkey PRIMARY KEY (id_metodo_pago);


--
-- TOC entry 4952 (class 2606 OID 17793)
-- Name: moneda moneda_nombre_moneda_key; Type: CONSTRAINT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.moneda
    ADD CONSTRAINT moneda_nombre_moneda_key UNIQUE (nombre_moneda);


--
-- TOC entry 4954 (class 2606 OID 17791)
-- Name: moneda moneda_pkey; Type: CONSTRAINT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.moneda
    ADD CONSTRAINT moneda_pkey PRIMARY KEY (id_moneda);


--
-- TOC entry 4956 (class 2606 OID 17807)
-- Name: tasa_cambio tasa_cambio_pkey; Type: CONSTRAINT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.tasa_cambio
    ADD CONSTRAINT tasa_cambio_pkey PRIMARY KEY (id_tasa);


--
-- TOC entry 4948 (class 2606 OID 17770)
-- Name: inventario inventario_pkey; Type: CONSTRAINT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.inventario
    ADD CONSTRAINT inventario_pkey PRIMARY KEY (id_inventario);


--
-- TOC entry 4938 (class 2606 OID 17709)
-- Name: producto producto_codigo_barra_base_key; Type: CONSTRAINT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.producto
    ADD CONSTRAINT producto_codigo_barra_base_key UNIQUE (codigo_barra_base);


--
-- TOC entry 4940 (class 2606 OID 17707)
-- Name: producto producto_pkey; Type: CONSTRAINT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.producto
    ADD CONSTRAINT producto_pkey PRIMARY KEY (id_producto);


--
-- TOC entry 4942 (class 2606 OID 17735)
-- Name: producto_variante producto_variante_pkey; Type: CONSTRAINT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.producto_variante
    ADD CONSTRAINT producto_variante_pkey PRIMARY KEY (id_variante);


--
-- TOC entry 4944 (class 2606 OID 17737)
-- Name: producto_variante producto_variante_sku_codigo_barras_key; Type: CONSTRAINT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.producto_variante
    ADD CONSTRAINT producto_variante_sku_codigo_barras_key UNIQUE (sku_codigo_barras);


--
-- TOC entry 4950 (class 2606 OID 17772)
-- Name: inventario uq_inventario_combinacion; Type: CONSTRAINT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.inventario
    ADD CONSTRAINT uq_inventario_combinacion UNIQUE (id_variante, id_sucursal);


--
-- TOC entry 4946 (class 2606 OID 17739)
-- Name: producto_variante uq_variante_combinacion; Type: CONSTRAINT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.producto_variante
    ADD CONSTRAINT uq_variante_combinacion UNIQUE (id_producto, id_talla, id_color);


--
-- TOC entry 4910 (class 2606 OID 17602)
-- Name: auditoria auditoria_pkey; Type: CONSTRAINT; Schema: seguridad_acceso; Owner: postgres
--

ALTER TABLE ONLY seguridad_acceso.auditoria
    ADD CONSTRAINT auditoria_pkey PRIMARY KEY (id_auditoria);


--
-- TOC entry 4902 (class 2606 OID 17565)
-- Name: rol rol_nombre_rol_key; Type: CONSTRAINT; Schema: seguridad_acceso; Owner: postgres
--

ALTER TABLE ONLY seguridad_acceso.rol
    ADD CONSTRAINT rol_nombre_rol_key UNIQUE (nombre_rol);


--
-- TOC entry 4904 (class 2606 OID 17563)
-- Name: rol rol_pkey; Type: CONSTRAINT; Schema: seguridad_acceso; Owner: postgres
--

ALTER TABLE ONLY seguridad_acceso.rol
    ADD CONSTRAINT rol_pkey PRIMARY KEY (id_rol);


--
-- TOC entry 4906 (class 2606 OID 17586)
-- Name: usuario usuario_cedula_key; Type: CONSTRAINT; Schema: seguridad_acceso; Owner: postgres
--

ALTER TABLE ONLY seguridad_acceso.usuario
    ADD CONSTRAINT usuario_cedula_key UNIQUE (cedula);


--
-- TOC entry 4908 (class 2606 OID 17584)
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: seguridad_acceso; Owner: postgres
--

ALTER TABLE ONLY seguridad_acceso.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario);


--
-- TOC entry 4970 (class 2606 OID 18138)
-- Name: detalle_venta detalle_venta_pkey; Type: CONSTRAINT; Schema: ventas; Owner: postgres
--

ALTER TABLE ONLY ventas.detalle_venta
    ADD CONSTRAINT detalle_venta_pkey PRIMARY KEY (id_detalle_venta);


--
-- TOC entry 4972 (class 2606 OID 18160)
-- Name: pago_venta pago_venta_pkey; Type: CONSTRAINT; Schema: ventas; Owner: postgres
--

ALTER TABLE ONLY ventas.pago_venta
    ADD CONSTRAINT pago_venta_pkey PRIMARY KEY (id_pago_venta);


--
-- TOC entry 4964 (class 2606 OID 18044)
-- Name: venta venta_pkey; Type: CONSTRAINT; Schema: ventas; Owner: postgres
--

ALTER TABLE ONLY ventas.venta
    ADD CONSTRAINT venta_pkey PRIMARY KEY (id_venta);


--
-- TOC entry 4975 (class 2606 OID 17647)
-- Name: categoria fk_categoria_categoria; Type: FK CONSTRAINT; Schema: core; Owner: postgres
--

ALTER TABLE ONLY core.categoria
    ADD CONSTRAINT fk_categoria_categoria FOREIGN KEY (id_categoria_padre) REFERENCES core.categoria(id_categoria) ON UPDATE CASCADE ON DELETE SET NULL;


--
-- TOC entry 4985 (class 2606 OID 17893)
-- Name: caja_turno fk_caja_turno_sucursal; Type: FK CONSTRAINT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.caja_turno
    ADD CONSTRAINT fk_caja_turno_sucursal FOREIGN KEY (id_sucursal) REFERENCES core.sucursal(id_sucursal);


--
-- TOC entry 4986 (class 2606 OID 17898)
-- Name: caja_turno fk_caja_turno_usuario_apertura; Type: FK CONSTRAINT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.caja_turno
    ADD CONSTRAINT fk_caja_turno_usuario_apertura FOREIGN KEY (id_usuario_apertura) REFERENCES seguridad_acceso.usuario(id_usuario);


--
-- TOC entry 4987 (class 2606 OID 17903)
-- Name: caja_turno fk_caja_turno_usuario_cierre; Type: FK CONSTRAINT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.caja_turno
    ADD CONSTRAINT fk_caja_turno_usuario_cierre FOREIGN KEY (id_usuario_cierre) REFERENCES seguridad_acceso.usuario(id_usuario);


--
-- TOC entry 4983 (class 2606 OID 17813)
-- Name: tasa_cambio fk_tasa_cambio_moneda_destino; Type: FK CONSTRAINT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.tasa_cambio
    ADD CONSTRAINT fk_tasa_cambio_moneda_destino FOREIGN KEY (id_moneda_destino) REFERENCES finanzas.moneda(id_moneda) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 4984 (class 2606 OID 17808)
-- Name: tasa_cambio fk_tasa_cambio_moneda_origen; Type: FK CONSTRAINT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.tasa_cambio
    ADD CONSTRAINT fk_tasa_cambio_moneda_origen FOREIGN KEY (id_moneda_origen) REFERENCES finanzas.moneda(id_moneda) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 4993 (class 2606 OID 18116)
-- Name: comision_venta pk_comision_venta_usuario; Type: FK CONSTRAINT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.comision_venta
    ADD CONSTRAINT pk_comision_venta_usuario FOREIGN KEY (id_vendedor) REFERENCES seguridad_acceso.usuario(id_usuario);


--
-- TOC entry 4994 (class 2606 OID 18111)
-- Name: comision_venta pk_comision_venta_venta; Type: FK CONSTRAINT; Schema: finanzas; Owner: postgres
--

ALTER TABLE ONLY finanzas.comision_venta
    ADD CONSTRAINT pk_comision_venta_venta FOREIGN KEY (id_venta) REFERENCES ventas.venta(id_venta);


--
-- TOC entry 4981 (class 2606 OID 17773)
-- Name: inventario fk_inventario_producto_variante; Type: FK CONSTRAINT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.inventario
    ADD CONSTRAINT fk_inventario_producto_variante FOREIGN KEY (id_variante) REFERENCES inventario.producto_variante(id_variante) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 4982 (class 2606 OID 17778)
-- Name: inventario fk_inventario_sucursal; Type: FK CONSTRAINT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.inventario
    ADD CONSTRAINT fk_inventario_sucursal FOREIGN KEY (id_sucursal) REFERENCES core.sucursal(id_sucursal) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 4976 (class 2606 OID 17715)
-- Name: producto fk_producto_categoria; Type: FK CONSTRAINT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.producto
    ADD CONSTRAINT fk_producto_categoria FOREIGN KEY (id_categoria) REFERENCES core.categoria(id_categoria);


--
-- TOC entry 4977 (class 2606 OID 17710)
-- Name: producto fk_producto_proveedor; Type: FK CONSTRAINT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.producto
    ADD CONSTRAINT fk_producto_proveedor FOREIGN KEY (id_proveedor) REFERENCES core.proveedor(id_proveedor);


--
-- TOC entry 4978 (class 2606 OID 17750)
-- Name: producto_variante fk_producto_variante_color; Type: FK CONSTRAINT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.producto_variante
    ADD CONSTRAINT fk_producto_variante_color FOREIGN KEY (id_color) REFERENCES core.color(id_color) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 4979 (class 2606 OID 17740)
-- Name: producto_variante fk_producto_variante_producto; Type: FK CONSTRAINT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.producto_variante
    ADD CONSTRAINT fk_producto_variante_producto FOREIGN KEY (id_producto) REFERENCES inventario.producto(id_producto) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 4980 (class 2606 OID 17745)
-- Name: producto_variante fk_producto_variante_talla; Type: FK CONSTRAINT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.producto_variante
    ADD CONSTRAINT fk_producto_variante_talla FOREIGN KEY (id_talla) REFERENCES core.talla(id_talla) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 4974 (class 2606 OID 17603)
-- Name: auditoria fk_auditoria_usuario; Type: FK CONSTRAINT; Schema: seguridad_acceso; Owner: postgres
--

ALTER TABLE ONLY seguridad_acceso.auditoria
    ADD CONSTRAINT fk_auditoria_usuario FOREIGN KEY (id_usuario) REFERENCES seguridad_acceso.usuario(id_usuario) ON UPDATE CASCADE ON DELETE SET NULL;


--
-- TOC entry 4973 (class 2606 OID 17587)
-- Name: usuario fk_usuario_rol; Type: FK CONSTRAINT; Schema: seguridad_acceso; Owner: postgres
--

ALTER TABLE ONLY seguridad_acceso.usuario
    ADD CONSTRAINT fk_usuario_rol FOREIGN KEY (id_rol) REFERENCES seguridad_acceso.rol(id_rol) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 4995 (class 2606 OID 18144)
-- Name: detalle_venta fk_detalle_venta_variante; Type: FK CONSTRAINT; Schema: ventas; Owner: postgres
--

ALTER TABLE ONLY ventas.detalle_venta
    ADD CONSTRAINT fk_detalle_venta_variante FOREIGN KEY (id_variante) REFERENCES inventario.producto_variante(id_variante);


--
-- TOC entry 4996 (class 2606 OID 18139)
-- Name: detalle_venta fk_detalle_venta_venta; Type: FK CONSTRAINT; Schema: ventas; Owner: postgres
--

ALTER TABLE ONLY ventas.detalle_venta
    ADD CONSTRAINT fk_detalle_venta_venta FOREIGN KEY (id_venta) REFERENCES ventas.venta(id_venta) ON DELETE CASCADE;


--
-- TOC entry 4997 (class 2606 OID 18166)
-- Name: pago_venta fk_pago_venta_metodo_pago; Type: FK CONSTRAINT; Schema: ventas; Owner: postgres
--

ALTER TABLE ONLY ventas.pago_venta
    ADD CONSTRAINT fk_pago_venta_metodo_pago FOREIGN KEY (id_metodo_pago) REFERENCES finanzas.metodo_pago(id_metodo_pago);


--
-- TOC entry 4998 (class 2606 OID 18161)
-- Name: pago_venta fk_pago_venta_venta; Type: FK CONSTRAINT; Schema: ventas; Owner: postgres
--

ALTER TABLE ONLY ventas.pago_venta
    ADD CONSTRAINT fk_pago_venta_venta FOREIGN KEY (id_venta) REFERENCES ventas.venta(id_venta) ON DELETE CASCADE;


--
-- TOC entry 4988 (class 2606 OID 18055)
-- Name: venta pk_venta_caja_turno; Type: FK CONSTRAINT; Schema: ventas; Owner: postgres
--

ALTER TABLE ONLY ventas.venta
    ADD CONSTRAINT pk_venta_caja_turno FOREIGN KEY (id_caja_turno) REFERENCES finanzas.caja_turno(id_caja_turno);


--
-- TOC entry 4989 (class 2606 OID 18045)
-- Name: venta pk_venta_cliente; Type: FK CONSTRAINT; Schema: ventas; Owner: postgres
--

ALTER TABLE ONLY ventas.venta
    ADD CONSTRAINT pk_venta_cliente FOREIGN KEY (id_cliente) REFERENCES core.cliente(id_cliente);


--
-- TOC entry 4990 (class 2606 OID 18065)
-- Name: venta pk_venta_moneda; Type: FK CONSTRAINT; Schema: ventas; Owner: postgres
--

ALTER TABLE ONLY ventas.venta
    ADD CONSTRAINT pk_venta_moneda FOREIGN KEY (id_moneda_venta) REFERENCES finanzas.moneda(id_moneda);


--
-- TOC entry 4991 (class 2606 OID 18060)
-- Name: venta pk_venta_sucursal; Type: FK CONSTRAINT; Schema: ventas; Owner: postgres
--

ALTER TABLE ONLY ventas.venta
    ADD CONSTRAINT pk_venta_sucursal FOREIGN KEY (id_sucursal) REFERENCES core.sucursal(id_sucursal);


--
-- TOC entry 4992 (class 2606 OID 18050)
-- Name: venta pk_venta_usuario; Type: FK CONSTRAINT; Schema: ventas; Owner: postgres
--

ALTER TABLE ONLY ventas.venta
    ADD CONSTRAINT pk_venta_usuario FOREIGN KEY (id_vendedor) REFERENCES seguridad_acceso.usuario(id_usuario);


-- Completed on 2025-10-25 19:15:56

--
-- PostgreSQL database dump complete
--

\unrestrict QxrrUda01HEZwc4x5fFtea7e8IOdlJVWcYUGNCVpCZh93d1yCPUnKIoVAVQ2eZ4

