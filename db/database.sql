SET NAMES 'utf8';
DROP DATABASE IF EXISTS Renueva;
CREATE DATABASE IF NOT EXISTS Renueva DEFAULT CHARACTER SET utf8;
DROP database Renueva;
create database Renueva;
use Renueva;

create table categoria(
    id_categoria integer not null auto_increment PRIMARY KEY,
    nombre_cat varchar(50) not null
)DEFAULT CHARACTER SET utf8;

create table usuario(
    iduser integer  not null auto_increment PRIMARY KEY,
    administrator_b  bit not null,
    nombre varchar(50) not null,
    apellidos varchar(80) not null,
    correo varchar(50) not null,
    passwd varchar(255) not null,
    telefono varchar(50) not null
)DEFAULT CHARACTER SET utf8;

create table articulod(
    Ar_id integer auto_increment not null PRIMARY KEY,
    id_categoria integer ,
    Ar_descripcion varchar(200) not null,
    Ar_precioVenta  decimal(11,2) not null,
    Ar_nombre varchar(50) not null,
    Ar_stock integer not null,
    Ar_precioCosto decimal(11,2) not null,
    FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
)DEFAULT CHARACTER SET utf8;

create table inventario(
    inv_id integer not null auto_increment PRIMARY KEY,
    inv_date varchar(14) not null,
    inv_total integer not null,
    Ar_id integer not null,
    FOREIGN KEY (Ar_id) REFERENCES articulod(Ar_id)
)DEFAULT CHARACTER SET utf8;

create table Pedido_Articulo(
    pd_id integer  auto_increment PRIMARY KEY,
    Ar_id integer ,
    FOREIGN KEY (Ar_id) REFERENCES articulod(Ar_id)
)DEFAULT CHARACTER SET utf8;

create table pedido(
    idventa integer PRIMARY KEY,
    iduser integer ,
    fecha_hora varchar(50) not null,
    cantidad integer not null,
    total decimal (11,2) not null,
    estado varchar(20) not null,
    FOREIGN KEY (iduser) REFERENCES usuario(iduser)
)DEFAULT CHARACTER SET utf8;
INSERT INTO categoria(nombre_cat) Values ('Test');

INSERT INTO usuario(administrator_b,nombre,apellidos,correo,passwd,telefono) VALUES (1,'Luis Alejandro','Canchola Pedraza','lacp532.la@gmail.com','123123123','123123123123');


INSERT INTO articulod(Ar_descripcion,Ar_precioVenta,Ar_nombre,Ar_stock,Ar_precioCosto) VALUES('Testing',60,'Vendas',20,52);

INSERT INTO inventario(inv_date,inv_total,Ar_id) VALUES('14-12-2020',20,1);


INSERT INTO pedido(fecha_hora,cantidad,total,estado) VALUES('2000-23-12',12,122,'enviado');

