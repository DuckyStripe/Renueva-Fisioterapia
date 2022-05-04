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
    id_categoria integer not null,
    ganancia decimal(11,2) not null,
    Ar_descripcion varchar(200) not null,
    Ar_precioVenta  decimal(11,2) not null,
    Ar_nombre varchar(50) not null,
    Ar_stock integer not null,
    Ar_precioCosto decimal(11,2) not null,
    img longblob NOT NULL,
    inv_date varchar(14) not null,
    lastinv_date varchar(14) not null,
    PRIMARY KEY (Ar_id),
    FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
)DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table rol(
    id_rol int not null auto_increment,
    rol varchar(20) not null,
    primary key (id_rol)
)DEFAULT CHARACTER SET utf8;

create table usuarios(
    iduser int not null auto_increment,
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
    comentario varchar(50),
    primary key (id_citas),
    FOREIGN KEY (iduser) REFERENCES usuarios(iduser),
    FOREIGN KEY (id_servicio) REFERENCES servicios(id_servicio),
    FOREIGN KEY (idhora) REFERENCES hora(idhora)
)DEFAULT CHARACTER SET utf8;

create table estados(
	id_estado int not null auto_increment,
    estado varchar(30)not null,
    primary key (id_estado)
)DEFAULT CHARACTER SET utf8;


CREATE table direccion(
	id_direccion int not null auto_increment,
    iduser int not null unique,
	calle varchar(60) not null,
	exterior varchar(5) not null,
    interior varchar(5),
	id_estado int not null,
	colonia varchar(30) not null,
	codigo_postal int(5) not null,
	primary key(id_direccion),
	FOREIGN KEY (id_estado) REFERENCES estados(id_estado),
    FOREIGN KEY (iduser) REFERENCES usuarios(iduser)
)DEFAULT CHARACTER SET utf8;

create table pedido(
    idventa INTEGER NOT NULL auto_increment,
    iduser INTEGER NOT NULL,
    fecha varchar(50) not null,
    total decimal (11,2) not null,
    estado varchar(20) not null,
    PRIMARY KEY (idventa),
    FOREIGN KEY (iduser) REFERENCES usuarios(iduser)
)DEFAULT CHARACTER SET utf8;

create table Pedido_Articulo(
    pd_id INTEGER NOT NULL AUTO_INCREMENT,
    Ar_id INTEGER NOT NULL,
    cantidad INTEGER NOT NULL,
    idventa INTEGER NOT NULL,
    total_articulo decimal (11,2) not null,
    PRIMARY KEY (pd_id),
    FOREIGN KEY (Ar_id) REFERENCES articulod(Ar_id),
    FOREIGN KEY (idventa) REFERENCES pedido(idventa)
)DEFAULT CHARACTER SET utf8;



/*triggers*/

DELIMITER //
CREATE TRIGGER citas_before_insert
BEFORE INSERT
   ON citas FOR EACH ROW

BEGIN
    DECLARE cuenta_citas INTEGER;
    DECLARE hora INTEGER;
	
    SELECT COUNT(*) FROM citas WHERE  (fecha = NEW.fecha) AND (idhora= NEW.idhora) INTO cuenta_citas;

    IF (New.fecha >= CURDATE()) THEN
		IF (cuenta_citas = 0 )THEN 
			SET NEW.iduser = NEW.iduser;
			SET NEW.fecha = NEW.fecha;
			SET NEW.idhora = NEW.idhora;
			SET NEW.id_servicio = NEW.id_servicio;
            SET NEW.comentario =NEW.comentario;
        END IF;
        IF cuenta_citas>0 THEN
         SIGNAL SQLSTATE '45025' SET MESSAGE_TEXT='Fecha no disponible';
        END IF;
    ELSE 
        SIGNAL SQLSTATE '45005' SET MESSAGE_TEXT='FECHA NO VALIDA';
    END IF;
END; //

DELIMITER ;

/*Insertando Categorias*/
INSERT INTO categoria(nombre_cat) Values ('Electroterapia');
INSERT INTO categoria(nombre_cat) Values ('Ultrasonido');
INSERT INTO categoria(nombre_cat) Values ('Consumibles');
INSERT INTO categoria(nombre_cat) Values ('Termoterapia');
INSERT INTO categoria(nombre_cat) Values ('Mecanoterapia');
INSERT INTO categoria(nombre_cat) Values ('Hidroterapia');
INSERT INTO categoria(nombre_cat) Values ('Vendaje Neuromuscular');

-- Insertando imagenes
-- Insertando articulos
INSERT INTO articulod(id_categoria,Ar_descripcion,Ar_precioVenta,Ar_nombre,Ar_stock,Ar_precioCosto,img,inv_date) VALUES(1,'Testing',60,'Vendas',20,52,"testiing","04-05-2022");
-- Insertando pedido

/*INSERT INTO pedido(fecha_hora,cantidad,total,estado) VALUES('2000-23-12',12,122,'enviado');*/


-- Insertando roles


INSERT INTO rol(rol)VALUES('Administrador');
INSERT INTO rol(rol)VALUES('Usuario');
INSERT INTO rol(rol)VALUES('Empleado');

-- Insertando Estados
INSERT INTO estados(estado)VALUES('Aguascalientes');
INSERT INTO estados(estado)VALUES('Baja California');
INSERT INTO estados(estado)VALUES('Baja California Sur');
INSERT INTO estados(estado)VALUES('Campeche');
INSERT INTO estados(estado)VALUES('Chiapas');
INSERT INTO estados(estado)VALUES('Chihuahua');
INSERT INTO estados(estado)VALUES('Ciudad de Mexico');
INSERT INTO estados(estado)VALUES('Coahuila de zaragoza');
INSERT INTO estados(estado)VALUES('Colima');
INSERT INTO estados(estado)VALUES('Durango');
INSERT INTO estados(estado)VALUES('Estado de México');
INSERT INTO estados(estado)VALUES('Guanajuato');
INSERT INTO estados(estado)VALUES('Guerrero');
INSERT INTO estados(estado)VALUES('Hidalgo');
INSERT INTO estados(estado)VALUES('Jalisco');
INSERT INTO estados(estado)VALUES('Michoacan de Ocampo');
INSERT INTO estados(estado)VALUES('Morelos');
INSERT INTO estados(estado)VALUES('Nayarit');
INSERT INTO estados(estado)VALUES('Nuevo León');
INSERT INTO estados(estado)VALUES('Oaxaca');
INSERT INTO estados(estado)VALUES('Puebla');
INSERT INTO estados(estado)VALUES('Querétaro');
INSERT INTO estados(estado)VALUES('Quintana Roo');
INSERT INTO estados(estado)VALUES('San Luis Potosí');
INSERT INTO estados(estado)VALUES('Sinaloa');
INSERT INTO estados(estado)VALUES('Sonora');
INSERT INTO estados(estado)VALUES('Tabasco');
INSERT INTO estados(estado)VALUES('Tamaulipas');
INSERT INTO estados(estado)VALUES('Tlaxcala');
INSERT INTO estados(estado)VALUES('Veracruz');
INSERT INTO estados(estado)VALUES('Yucatán');
INSERT INTO estados(estado)VALUES('Zacatecas');


-- Insertando Direccion


INSERT INTO usuarios(id_rol,nombre,apellidos,correo,passwd,telefono) VALUES (1,'Admin','Demo','demo@admin.com','$2y$10$lM53S8PwIrmtNkWXQqCthuuCah1JuhqCYsReajf/1nRyeYc/QNq/a','55-5555-5555');
INSERT INTO usuarios(id_rol,nombre,apellidos,correo,passwd,telefono) VALUES (3,'Empleado','Demo','demo@empleado.com','$2y$10$H5vT7lrjg6y.th/k/UipY.LiQtVflw9FA63JQVZ.CoENjqMPuP9T.','55-5555-5556');
INSERT INTO usuarios(id_rol,nombre,apellidos,correo,passwd,telefono) VALUES (2,'User','Demo','demo@user.com','$2y$10$PS2nGiJbtI3UjfP.mg/4EOazHwcoI9P7GtonhWO4IjBwX5yrR2iBG','55-5555-5557');
INSERT INTO direccion(iduser,calle,exterior,interior,id_estado,colonia,codigo_postal) VALUES(1,'Zacatecas','65','65',1,'Buena vista',07200);

-- Insertando Servicios
INSERT INTO servicios (servicio) Values("Prevención, mantenimiento y recuperación de la funcionalidad del cuerpo.");
INSERT INTO servicios (servicio) Values("Acción preventiva de lesiones.");
INSERT INTO servicios (servicio) Values("Enfoque en la atención personalizada e individualizada del paciente.");
INSERT INTO servicios (servicio) Values("Rehabilitación.");

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


INSERT INTO pedido(iduser,fecha,total,estado) VALUES (1,"2022-04-05",60,"En Espera");
INSERT INTO pedido_articulo(Ar_id,cantidad,idventa,total_articulo)VALUES(1,4,1,cantidad * 60);
INSERT INTO pedido_articulo(Ar_id,cantidad,idventa,total_articulo)VALUES(1,5,1,cantidad * 60);
INSERT INTO pedido_articulo(Ar_id,cantidad,idventa,total_articulo)VALUES(1,2,1,cantidad * 60);
INSERT INTO pedido_articulo(Ar_id,cantidad,idventa,total_articulo)VALUES(1,3,1,cantidad * 60);

INSERT INTO pedido(iduser,fecha,total,estado) VALUES (2,"2022-04-05",60,"En Espera");
INSERT INTO pedido_articulo(Ar_id,cantidad,idventa,total_articulo)VALUES(1,8,2,cantidad * 60);
INSERT INTO pedido_articulo(Ar_id,cantidad,idventa,total_articulo)VALUES(1,5,2,cantidad * 60);
INSERT INTO pedido_articulo(Ar_id,cantidad,idventa,total_articulo)VALUES(1,8,2,cantidad * 60);
INSERT INTO pedido_articulo(Ar_id,cantidad,idventa,total_articulo)VALUES(1,3,2,cantidad * 60);
INSERT INTO articulod(id_categoria,Ar_descripcion,Ar_precioVenta,Ar_nombre,Ar_stock,Ar_precioCosto,img,inv_date,ganancia) VALUES(1,'$descripcion',$precioVenta,$nombre,$invtotal,$precioCosto,'$img','$fechainv',$ganancia);
select * from articulod ;
Select SUM(Ar_precioCosto)AND SUM(Ar_stock) FROM articulod;
SELECT * FROM articulod a INNER JOIN categoria b ON a.id_categoria = a.id_categoria WHERE a.Ar_id=1;
SELECT * FROM articulod a INNER JOIN categoria b ON a.id_categoria = b.id_categoria WHERE a.Ar_id=2;

SELECT a.Ar_id,a.ganancia,a.Ar_descripcion,a.precioVenta,a.Ar_nombre,a.Ar_stock,a.Ar_precioCosto,a.img,a.inv_date,b.nombre_cat FROM articulod a INNER JOIN categoria b WHERE a.Ar_id=2;
/*
INSERT INTO citas(iduser,fecha,idhora,id_servicio,comentario) VALUES(1,'2022-12-12',1,1,'Test');
INSERT INTO citas(iduser,fecha,idhora,id_servicio,comentario) VALUES(1,'2022-12-12',2,1,'Test');
INSERT INTO citas(iduser,fecha,idhora,id_servicio,comentario) VALUES(1,'2022-12-12',3,1,'Test');
INSERT INTO citas(iduser,fecha,idhora,id_servicio,comentario) VALUES(1,'2022-12-12',4,1,'Test');
INSERT INTO citas(iduser,fecha,idhora,id_servicio,comentario) VALUES(1,'2022-12-12',5,1,'Test');
INSERT INTO citas(iduser,fecha,idhora,id_servicio,comentario) VALUES(1,'2022-12-12',6,1,'Test');

INSERT INTO citas(iduser,fecha,idhora,id_servicio,comentario) VALUES(1,'2022-04-28 ',1,1,'Test');
INSERT INTO citas(iduser,fecha,idhora,id_servicio,comentario) VALUES(1,'2022-04-28 ',2,1,'Test');
INSERT INTO citas(iduser,fecha,idhora,id_servicio,comentario) VALUES(1,'2022-04-28 ',12,1,'Test');
INSERT INTO citas(iduser,fecha,idhora,id_servicio,comentario) VALUES(1,'2022-12-13',5,1,'Test');

INSERT INTO inventario(inv_date,inv_total,Ar_id) VALUES('2022-12-12',20,1);

SELECT * FROM direccion WHERE iduser=5;

SELECT a.calle,a.exterior,a.interior,b.estado,a.colonia,a.codigo_postal FROM direccion a INNER JOIN estados b ON a.id_estado = b.id_estado WHERE  ( a.id_direccion=1);
/*SELECT a.calle,a.exterior,a.interior,b.estado,a.colonia,a.codigo_postal FROM direccion a INNER JOIN estados b ON a.id_estado = b.id_estado WHERE  ( a.id_direccion=1)

SELECT COUNT(id_direccion)  FROM usuarios WHERE iduser=2;
/*
SELECT * FROM citas WHERE id_citas = 1;
SELECT a.iduser,b.nombre,b.apellidos, a.fecha, a.idhora, c.hora , d.id_servicio ,d.servicio, a.comentario FROM citas a INNER JOIN usuarios b ON  a.iduser= b.iduser INNER JOIN hora c ON a.idhora= c.idhora INNER JOIN servicios d ON a.id_servicio = d.id_servicio WHERE (a.iduser= 1) ;
/*SELECT * FROM citas WHERE (iduser= 1);
SELECT * FROM citas WHERE (iduser= $id);
SELECT COUNT(*) FROM citas WHERE  (fecha = '2022-12-13') AND (idhora= 1) ;
SELECT idhora, hora FROM hora WHERE idhora NOT IN (SELECT a.idhora from hora a inner JOIN citas b ON a.idhora = b.idhora WHERE b.fecha = '2022-04-27');
SELECT * FROM citas WHERE fecha='2022-12-12';
SELECT * FROM citas a INNER JOIN hora b ON a.idhora = b.idhora WHERE a.fecha='2022-04-29';
SELECT * FROM hora;*/