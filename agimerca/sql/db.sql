use db_product_handler;
create table usuarios(
id int not null auto_increment primary key,
user varchar(150),
clave varchar(255),
f_c date,
f_e date,
u_id_c int,
grupo_id int,
u_id_e int,
estado enum("activo","bloqueado","eliminado")
);

create table grupos(
id int not null primary key auto_increment,
nombre varchar(150),
f_c date,
f_e date,
u_id_c int,
u_id_e int,
estado enum("activo","bloqueado","eliminado")
);

create table seccion(
id int not null primary key auto_increment,
nombre varchar(150),
f_c date,
f_e date
);

create table sub_seccion(
id int not null primary key auto_increment,
nombre varchar(150),
titulo varchar(200),
f_c date,
f_e date
);

create table permisos_sub_seccion(
id int not null primary key auto_increment,
sub_seccion_id int,
f_c date,
u_id_c int,
leer int(1),
escribir int(1),
editar int(1),
borrar int(1),
bloquear int(1),
grupo_id int
);

create table productos(
id int not null primary key auto_increment,
inventario_id int,
f_c date,
f_e date,
u_id_c int,
u_id_e int,
cantidad int,
precio_compra decimal(20,2),
e_p enum("activo","anulado")
);

create table inventarios(
id int not null primary key auto_increment,
nombre varchar(200),
f_c date,
f_e date,
cantidad_vigente int,
codigo int,
u_id_c int,
u_id_e int,
precio_venta decimal(20,2),
e_p enum("activo","agotado","eliminado")
);

create table facturas(
id int not null primary key auto_increment,
f_c date,
f_e date,
u_id_c int,
u_id_e int,
monto decimal(20,2),
itbs decimal(20,2),
total decimal(20,2),
e_f enum("activa","anulada"),
cliente_id int,
cuadrado int(1),
u_id_ca int,
f_ca date,
u_id_a int,
f_a date
);

create table cotizaciones(
id int not null primary key auto_increment,
f_c date,
f_e date,
u_id_c int,
u_id_e int,
monto decimal(20,2),
itbs decimal(20,2),
total decimal(20,2),
e_c enum("pendiente","procesado","anulado"),
cliente_id int,
u_id_a int,
f_a date
);

create table detalle_cotizacion(
id int not null primary key auto_increment,
cotizacion_id int,
inventario_id int,
f_c date,
f_e date,
u_id_c int,
u_id_e int,
precio decimal(20,2),
sub_total decimal(20,2),
e_c enum("pendiente","procesado","anulado"),
cliente_id int,
cantidad int,
u_id_a int,
f_a date
);

create table clientes(
id int not null primary key auto_increment,
nombre_completo varchar(255),
identificacion varchar(30),
f_c date,
f_e date,
u_id_c int,
u_id_e int
);