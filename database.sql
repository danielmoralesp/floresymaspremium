create database harrys

create table usuarios(
id_usuario int not null auto_increment primary key,
email varchar(150),
password varchar(200)

)


create table producto(
id_producto int not null auto_increment primary key,
nombre_del_producto varchar(150),
precio_del_producto varchar(50),
orden_importancia varchar(20),
tipo_de_producto varchar(50),
colores_de_rosas varchar(50),
unidades_de_rosas varchar(20),
tamano_del_producto varchar (50),
en_inventario varchar(10),
producto_incluye varchar(20),
ocasion_del_producto varchar(20),
descripcion_del_producto text,
foto_grande varchar(150),
foto_thumbnail varchar(150)

)


create table pedido(
id_pedido int not null auto_increment primary key,
fecha_de_entrega varchar(20),
hora_de_entrega varchar(20),
nombre_de_quien_llama varchar(75),
telefonos_de_quien_llama varchar(75),
direccion_facturacion varchar(50),
nombre_de_quien_envia varchar(75),
nombre_de_quien_recibe varchar(75),
telefono_de_quien_recibe varchar(75),
direccion_de_entrega text,
barrio_de_entrega varchar(75),
mensaje_para_tarjeta text,
observaciones_comentarios text

)


create table usuarios_callcenter(
id_usuario int not null auto_increment primary key,
email varchar(150),
password varchar(200)

)

create table pedido_manual(
id_pedido_manual int not null auto_increment primary key,
fecha_de_pedido varchar(20),
fecha_de_pago varchar(20),
fecha_de_entrega varchar(20),
hora_de_entrega varchar(20),
tipo_de_producto varchar(50),
atendido_por varchar(50),
nombre_del_producto varchar(350),
precio_del_producto varchar(50),
valor_del_envio varchar(50),
total_compra varchar(50),
metodo_de_contacto varchar(50),
confirmacion_pago varchar(20),
nombre_de_quien_llama varchar(100),
telefonos_de_quien_llama varchar(100),
direccion_facturacion varchar(100),
nombre_de_quien_envia varchar(100),
metodo_pago varchar(100),
nombre_de_quien_recibe varchar(100),
telefono_de_quien_recibe varchar(100),
direccion_de_entrega varchar(350),
barrio_de_entrega varchar(100),
sector_de_entrega varchar(100),
mensaje_para_tarjeta text,
observaciones_comentarios text,
retroalimentacion text,
entregado varchar(40),
estado_pedido varchar(40)

)


create table pedidos(
id_pedidos int not null auto_increment primary key,
nombre_del_producto varchar(250),
total varchar (100),
cantidad varchar(10)

)


ALTER TABLE pedidos ADD COLUMN estado_pedido varchar(40)
ALTER TABLE pedidos ADD COLUMN fecha_de_pedido varchar(40)
ALTER TABLE pedidos ADD COLUMN fecha_de_pago varchar(40)
ALTER TABLE pedidos ADD COLUMN dia_de_entrega varchar(40)
ALTER TABLE pedidos ADD COLUMN mes_de_entrega varchar(40)
ALTER TABLE pedidos ADD COLUMN ano_de_entrega varchar(40)
ALTER TABLE pedidos ADD COLUMN hora_de_entrega varchar(40)
ALTER TABLE pedidos ADD COLUMN dir_1_entrega varchar(100)
ALTER TABLE pedidos ADD COLUMN dir_2_entrega varchar(100)
ALTER TABLE pedidos ADD COLUMN dir_3_entrega varchar(100)
ALTER TABLE pedidos ADD COLUMN barrio varchar(100)
ALTER TABLE pedidos ADD COLUMN ayuda_envio text
ALTER TABLE pedidos ADD COLUMN nombre_de_quien_envia varchar(200)
ALTER TABLE pedidos ADD COLUMN nombre_de_quien_recibe varchar(200)
ALTER TABLE pedidos ADD COLUMN telefono_de_quien_recibe varchar(100)
ALTER TABLE pedidos ADD COLUMN mensaje_para_tarjeta text
ALTER TABLE pedidos ADD COLUMN observaciones_comentarios text
ALTER TABLE pedidos ADD COLUMN nombre_de_quien_llama varchar(100)
ALTER TABLE pedidos ADD COLUMN telefono_de_quien_llama varchar(100)
ALTER TABLE pedidos ADD COLUMN email_de_quien_llama varchar(100)
ALTER TABLE pedidos ADD COLUMN password_de_quien_llama varchar(100)
ALTER TABLE pedidos ADD COLUMN ciudad_de_entrega varchar(50)


create table codigo_inventario(
id_codigo_inventario int not null auto_increment primary key,
codigo_inventario varchar(200),
unidades_codigo_inventario varchar (200)

)


ALTER TABLE producto ADD COLUMN flor_1_principal varchar(50)
ALTER TABLE producto ADD COLUMN unidades_flor_1_principal varchar(10)
ALTER TABLE producto ADD COLUMN flor_2_principal varchar(50)
ALTER TABLE producto ADD COLUMN unidades_flor_2_principal varchar(10)
ALTER TABLE producto ADD COLUMN flor_3_principal varchar(50)
ALTER TABLE producto ADD COLUMN unidades_flor_3_principal varchar(10)
ALTER TABLE producto ADD COLUMN flor_1_secundaria varchar(50)
ALTER TABLE producto ADD COLUMN unidades_flor_1_secundaria varchar(10)
ALTER TABLE producto ADD COLUMN flor_2_secundaria varchar(50)
ALTER TABLE producto ADD COLUMN unidades_flor_2_secundaria varchar(10)
ALTER TABLE producto ADD COLUMN flor_3_secundaria varchar(50)
ALTER TABLE producto ADD COLUMN unidades_flor_3_secundaria varchar(10)
ALTER TABLE producto ADD COLUMN flor_1_terciaria varchar(50)
ALTER TABLE producto ADD COLUMN unidades_flor_1_terciaria varchar(10)
ALTER TABLE producto ADD COLUMN flor_2_terciaria varchar(50)
ALTER TABLE producto ADD COLUMN unidades_flor_2_terciaria varchar(10)
ALTER TABLE producto ADD COLUMN flor_3_terciaria varchar(50)
ALTER TABLE producto ADD COLUMN unidades_flor_3_terciaria varchar(10)
ALTER TABLE producto ADD COLUMN follaje_1_principal varchar(50)
ALTER TABLE producto ADD COLUMN unidades_follaje_1_principal varchar(10)
ALTER TABLE producto ADD COLUMN follaje_2_principal varchar(50)
ALTER TABLE producto ADD COLUMN unidades_follaje_2_principal varchar(10)
ALTER TABLE producto ADD COLUMN follaje_3_principal varchar(50)
ALTER TABLE producto ADD COLUMN unidades_follaje_3_principal varchar(10)
ALTER TABLE producto ADD COLUMN follaje_1_secundaria varchar(50)
ALTER TABLE producto ADD COLUMN unidades_follaje_1_secundaria varchar(10)
ALTER TABLE producto ADD COLUMN follaje_2_secundaria varchar(50)
ALTER TABLE producto ADD COLUMN unidades_follaje_2_secundaria varchar(10)
ALTER TABLE producto ADD COLUMN follaje_3_secundaria varchar(50)
ALTER TABLE producto ADD COLUMN unidades_follaje_3_secundaria varchar(10)
ALTER TABLE producto ADD COLUMN base_floral varchar(50)
ALTER TABLE producto ADD COLUMN unidades_de_oasis varchar(50)
ALTER TABLE producto ADD COLUMN unidades_de_cinta varchar(50)


create table pedidos_plan_continuidad(
id_pedidos_plan_continuidad int not null auto_increment primary key,
color_de_rosas varchar(100),
unidades_de_rosas varchar (100),
fecha_de_pedido varchar(40),
fecha_de_pago varchar(40),
dia_de_inicio varchar(40),
mes_de_inicio varchar(40),
ano_de_inicio varchar(40),
frecuencia_de_entrega varchar(50),
descuento int,
numero_productos varchar(40),
ciudad_de_entrega varchar(50),
dir_1_entrega varchar(100),
dir_2_entrega varchar(100),
dir_3_entrega varchar(100),
barrio varchar(100),
ayuda_envio text,
nombre_de_quien_llama varchar(100),
telefono_de_quien_llama varchar(100),
email_de_quien_llama varchar(100),
password_de_quien_llama varchar(100)


)

ALTER TABLE pedidos_plan_continuidad ADD COLUMN estado_pedido varchar(50)

ALTER TABLE producto ADD COLUMN menos_de_90_min varchar(50)
ALTER TABLE producto ADD COLUMN producto_padre varchar(50)



create table producto_color(
id_producto_color int not null auto_increment primary key,
nombre_del_producto varchar(150),
precio_del_producto varchar(50),
orden_importancia varchar(20),
tipo_de_producto varchar(50),
colores_de_rosas varchar(50),
unidades_de_rosas varchar(20),
tamano_del_producto varchar (50)
en_inventario varchar(10),
producto_incluye varchar(20),
ocasion_del_producto varchar(20),
descripcion_del_producto text,
foto_grande varchar(150),
foto_thumbnail varchar(150)

)

ALTER TABLE pedidos ADD COLUMN dir_4_entrega varchar(100)
ALTER TABLE pedidos ADD COLUMN dir_5_entrega varchar(100)
ALTER TABLE pedidos ADD COLUMN costo_de_envio varchar(100)

ALTER TABLE usuarios ADD COLUMN permisos int(1)
ALTER TABLE usuarios ADD COLUMN id_pedidos varchar(100)

ALTER TABLE pedidos ADD COLUMN id_usuario varchar(100)

ALTER TABLE usuarios ADD COLUMN id_pedidos_plan_continuidad varchar(100)

ALTER TABLE pedidos_plan_continuidad ADD COLUMN id_usuario varchar(100)

ALTER TABLE pedidos_plan_continuidad ADD COLUMN dir_4_entrega varchar(100)
ALTER TABLE pedidos_plan_continuidad ADD COLUMN dir_5_entrega varchar(100)

ALTER TABLE pedidos ADD COLUMN unidades_de_rosas varchar(50)
ALTER TABLE pedidos ADD COLUMN colores_de_rosas varchar(50)

ALTER TABLE pedidos_plan_continuidad ADD COLUMN total varchar(100)

ALTER TABLE fotos_adicionales ADD COLUMN foto_adicional_6 varchar(100)
ALTER TABLE fotos_adicionales ADD COLUMN foto_adicional_7 varchar(100)
ALTER TABLE fotos_adicionales ADD COLUMN foto_adicional_8 varchar(100)


