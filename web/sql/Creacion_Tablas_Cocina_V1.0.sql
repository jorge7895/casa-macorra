-- Script de creación de la base de datos del proyecto final de Jorge Pardo Pacheco


-- Eliminamos, creamos y usamos

DROP DATABASE IF EXISTS cocina;

CREATE DATABASE cocina DEFAULT CHARSET utf8 COLLATE utf8_spanish_ci;

USE cocina;

-- Creacion de la tabla de categorias
create or replace table categorias(
	id int primary key not null auto_increment,
	nombre varchar(200) not null
);

-- Creamos la tabla correspondiente a las guarniciones
CREATE OR REPLACE TABLE guarniciones(
  id int primary key NOT NULL AUTO_INCREMENT,
  nombre varchar(200) NOT NULL,
  coste dec (5,2) DEFAULT 0
);

-- Creamos la tabla correspondiente a los platos
CREATE OR REPLACE TABLE platos(
  id int primary key NOT NULL AUTO_INCREMENT,
  nombre varchar(200) NOT NULL,
  categoria int DEFAULT NULL,
  precio_publico dec(5,2) DEFAULT 0,
  coste dec (5,2) DEFAULT 0,
  constraint fk_categoria_platos foreign key (categoria) references categorias(id) on delete set null on update cascade
);


-- Creamos la tabla correspondiente a las comandas
CREATE OR REPLACE TABLE comandas (
  id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  fecha date DEFAULT NULL,
  precio_total decimal(5, 2) DEFAULT 0,
  id_plato int DEFAULT NULL,
  cantidad int(11) DEFAULT 0,
  constraint fk_comandas_plato foreign key (id_plato) references platos(id) on delete set null on update cascade
); 


-- Creamos la tabla proveedores
CREATE OR REPLACE TABLE proveedores(
  id int primary key NOT NULL AUTO_INCREMENT,
  nif varchar(9) DEFAULT NULL,
  nombre varchar(150) NOT NULL
);

-- Creamos la tabla correspondiente a los productos
CREATE OR REPLACE TABLE productos(
  id int primary key NOT NULL AUTO_INCREMENT,
  stock dec (7,2) DEFAULT 0,
  nombre varchar (200) DEFAULT NULL,
  precio_compra dec(5,2) DEFAULT 0
);


-- Creamos la tabla pedidos
CREATE OR REPLACE TABLE pedidos(
  id int primary key NOT NULL AUTO_INCREMENT,
  fecha date DEFAULT NULL,
  id_producto int,
  id_proveedor int,
  descuento int DEFAULT 0,
  constraint fk_producto_pedidos foreign key (id_producto) references productos(id) on delete set null on update cascade,
  constraint fk_proveedor_pedidos foreign key (id_proveedor) references proveedores(id) on delete set null on update cascade
);



-- Creamos la tabla de la relación entre platos y productos
CREATE OR REPLACE TABLE productos_en_platos(
  id int primary key NOT NULL AUTO_INCREMENT,
  id_plato int,
  id_producto int,
  gramos_producto dec(7,2) DEFAULT 0,
  constraint fk_plato_productosdeplatos foreign key (id_plato) references platos(id) on delete cascade on update cascade,
  constraint fk_producto_productosdeplatos foreign key (id_producto) references productos(id) on delete set null on update cascade
);


-- Creamos la tabla de la relación entre platos y guarniciones
CREATE OR REPLACE TABLE guarniciones_en_platos(
  id int primary key NOT NULL AUTO_INCREMENT,
  id_plato int,
  id_guarnicion int,
  constraint fk_plato_guarnicionesenplatos foreign key (id_plato) references platos(id) on delete cascade on update cascade,
  constraint fk_guarnicion_guarnicionesenplatos foreign key (id_guarnicion) references guarniciones(id) on delete cascade on update cascade
);


-- Creamos la tabla de la relación entre guarniciones y productos
CREATE OR REPLACE TABLE productos_en_guarniciones(
  id int primary key NOT NULL AUTO_INCREMENT,
  id_guarnicion int,
  id_producto int,
  gramos_producto dec(7,2) DEFAULT 0,
  constraint fk_guarnicion_productosenguarniciones foreign key (id_guarnicion) references guarniciones(id) on delete cascade on update cascade,
  constraint fk_producto_productosenguarniciones foreign key (id_producto) references productos(id) on delete set null on update cascade
);

-- Creamos la tabla correspondiente a la realción entre productos y proveedores
CREATE OR REPLACE TABLE productos_de_proveedores(
  id int primary key NOT NULL AUTO_INCREMENT,
  id_producto int,
  id_proveedor int,
  precio_compra dec(5,2) DEFAULT 0,
  constraint fk_producto_productosdeproveedores foreign key (id_producto) references productos(id) on delete cascade on update cascade,
  constraint fk_proveedor_productosdeproveedores foreign key (id_proveedor) references proveedores(id) on delete set null on update cascade
);

-- Creacion de la tabla teléfonos, correspondiente a un atributo multivaluado
CREATE OR REPLACE TABLE telefonos_proveedores(
  id int primary key NOT NULL AUTO_INCREMENT,
  id_proveedor int,
  telefono int,
  constraint fk_proveedor_telefonos foreign key (id_proveedor) references proveedores(id) on delete cascade on update cascade
  );

