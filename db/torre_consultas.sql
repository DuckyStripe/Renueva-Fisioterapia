SET NAMES 'utf8';
DROP DATABASE IF EXISTS torre_consultas;
CREATE DATABASE IF NOT EXISTS torre_consultas DEFAULT CHARACTER SET utf8;
USE torre_consultas;
CREATE TABLE tipousuarios(
id_tus					INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
tipo_tus				CHAR(13) NOT NULL
)DEFAULT CHARACTER SET utf8;

CREATE TABLE usuarios(
id_uss					INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_tus_uss				INTEGER NOT NULL,
correo_uss		    	VARCHAR(20) NOT NULL,
contrasena_uss			VARCHAR(20) NOT NULL, 
FOREIGN KEY(id_tus_uss) REFERENCES tipousuarios(id_tus),
CONSTRAINT correo_no_valido UNIQUE(correo_uss)
)DEFAULT CHARACTER SET utf8;

INSERT INTO tipousuarios(tipo_tus) VALUES('Administrador');
INSERT INTO tipousuarios(tipo_tus) VALUES('Secretaria');
INSERT INTO tipousuarios(tipo_tus) VALUES('Paciente');
INSERT INTO tipousuarios(tipo_tus) VALUES('Doctor');

INSERT INTO usuarios(id_tus_uss, correo_uss, contrasena_uss) VALUES('1', 'hola@hot.mx','1234');
INSERT INTO usuarios(id_tus_uss, correo_uss, contrasena_uss) VALUES('2', 'hola1@hot.mx','1234');
INSERT INTO usuarios(id_tus_uss, correo_uss, contrasena_uss) VALUES('3', 'hola2@hot.mx','1234');
INSERT INTO usuarios(id_tus_uss, correo_uss, contrasena_uss) VALUES('4', 'hola3@hot.mx','1234');

select a.tipo_tus, b.correo_uss from tipousuarios a inner join usuarios b on a.id_tus = b.id_uss