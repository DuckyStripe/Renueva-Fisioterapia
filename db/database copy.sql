SET NAMES 'utf8';
DROP DATABASE IF EXISTS renueva;
CREATE DATABASE IF NOT EXISTS renueva DEFAULT CHARACTER SET utf8;
DROP database renueva;
create database renueva;
use renueva;

create table categoria(
    id_categoria INTEGER NOT NULL AUTO_INCREMENT,
    nombre_cat varchar(50) not null,
    PRIMARY KEY (id_categoria)
)DEFAULT CHARACTER SET utf8;

create table articulod(
    Ar_id INTEGER NOT NULL AUTO_INCREMENT,
    id_categoria integer,
    Ar_descripcion varchar(200) not null,
    Ar_precioVenta  decimal(11,2) not null,
    Ar_nombre varchar(50) not null,
    Ar_stock integer not null,
    Ar_precioCosto decimal(11,2) not null,
    PRIMARY KEY (Ar_id),
    FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
)DEFAULT CHARACTER SET utf8;

create table pedido(
    idventa INTEGER NOT NULL ,
    fecha_hora varchar(50) not null,
    cantidad INTEGER NOT NULL,
    total decimal (11,2) not null,
    estado varchar(20) not null,
    PRIMARY KEY (idventa)
)DEFAULT CHARACTER SET utf8;

create table rol(
    id_rol int not null auto_increment,
    rol varchar(20) not null,
    primary key (id_rol)
)DEFAULT CHARACTER SET utf8;

create table usuarios(
    iduser INTEGER NOT NULL AUTO_INCREMENT,
    id_rol  INT not null,
    nombre varchar(50) not null,
    apellidos varchar(80) not null,
    correo varchar(50) not null UNIQUE ,
    passwd varchar(255) not null,
    telefono varchar(50) not null UNIQUE ,
    PRIMARY KEY (iduser),
    FOREIGN KEY (id_rol) REFERENCES rol(id_rol)
)DEFAULT CHARACTER SET utf8;

create table servicios(
    id_servicio int not null auto_increment,
    servicio varchar(60) not null,
    primary key (id_servicio)
)DEFAULT CHARACTER SET utf8;

create table hora(
    idhora int not null auto_increment,
    hora time not null,
    primary key (idhora)
)DEFAULT CHARACTER SET utf8;

create table citas(
    id_citas int not null auto_increment,
    iduser int not null,
    fecha varchar(10) not null,
    idhora int not null,
    id_servicio int not null,
    comentario varchar(50) not null,
    primary key (id_citas),
    FOREIGN KEY (iduser) REFERENCES usuarios(iduser),
    FOREIGN KEY (id_servicio) REFERENCES servicios(id_servicio),
    FOREIGN KEY (idhora) REFERENCES hora(idhora)
)DEFAULT CHARACTER SET utf8;



create table Pedido_Articulo(
    pd_id INTEGER NOT NULL AUTO_INCREMENT,
    Ar_id INTEGER NOT NULL,
    iduser INT NOT NULL,
    idventa INTEGER NOT NULL,
    PRIMARY KEY (pd_id),
    FOREIGN KEY (Ar_id) REFERENCES articulod(Ar_id),
    FOREIGN KEY (idventa) REFERENCES pedido(idventa),
    FOREIGN KEY (iduser) REFERENCES usuarios(iduser)
)DEFAULT CHARACTER SET utf8;

create table inventario(
    inv_id INTEGER NOT NULL AUTO_INCREMENT,
    inv_date varchar(14) not null,
    inv_total integer not null,
    Ar_id integer not null,
    PRIMARY KEY (inv_id),
    FOREIGN KEY (Ar_id) REFERENCES articulod(Ar_id)
)DEFAULT CHARACTER SET utf8;


INSERT INTO categoria(nombre_cat) Values ('Test');

INSERT INTO articulod(Ar_descripcion,Ar_precioVenta,Ar_nombre,Ar_stock,Ar_precioCosto) VALUES('Testing',60,'Vendas',20,52);

INSERT INTO pedido(fecha_hora,cantidad,total,estado) VALUES('2000-23-12',12,122,'enviado');
INSERT INTO rol(rol)VALUES('Administrador');
INSERT INTO rol(rol)VALUES('Usuario');
INSERT INTO rol(rol)VALUES('Empleado');
INSERT INTO usuarios(id_rol,nombre,apellidos,correo,passwd,telefono) VALUES (1,'Luis Alejandro','Canchola Pedraza','test@gmail.com','123123123','123123123123');
INSERT INTO servicios (servicio) Values("test1");

INSERT INTO servicios (servicio) Values("test");
INSERT INTO hora (hora) VALUES('08:00');
INSERT INTO hora (hora) VALUES('09:00');
INSERT INTO hora (hora) VALUES('10:00');
INSERT INTO hora (hora) VALUES('11:00');
INSERT INTO hora (hora) VALUES('12:00');
INSERT INTO hora (hora) VALUES('13:00');
INSERT INTO hora (hora) VALUES('14:00');
INSERT INTO hora (hora) VALUES('15:00');
INSERT INTO hora (hora) VALUES('16:00');
INSERT INTO hora (hora) VALUES('17:00');
INSERT INTO hora (hora) VALUES('18:00');
INSERT INTO hora (hora) VALUES('19:00');
INSERT INTO hora (hora) VALUES('20:00');

INSERT INTO citas(iduser,fecha,idhora,id_servicio,comentario) VALUES(1,'2022-12-12',1,1,'Test');

INSERT INTO inventario(inv_date,inv_total,Ar_id) VALUES('2022-12-12',20,1);

